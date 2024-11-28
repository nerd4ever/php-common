<?php
/**
 * Created by Sileno de Oliveira Brito on 25/10/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use Doctrine\ORM\QueryBuilder;
use RuntimeException;
use Symfony\Component\HttpFoundation\Response;

class Paginator
{
    /**
     * @param QueryBuilder $queryBuilder QueryBuilder instance with the query to paginate
     * @param Filter $filter Filter instance with the filter values
     * @param PaginatorColumn $count PaginatorColumn instance with the column to count the total records
     * @param array $columns Array with the columns to search or sort
     * @return DataTableResult The paginated data
     */
    static public function paginate(
        QueryBuilder    $queryBuilder,
        Filter          $filter,
        PaginatorColumn $count,
        array           $columns,
        callable        $fnCount = null
    ): DataTableResult
    {
        if ($filter->getSearch()) {
            $search = '%' . strtolower($filter->getSearch()) . '%';
            $orX = $queryBuilder->expr()->orX();

            foreach ($columns as $c) {
                if (!$c instanceof PaginatorColumn) {
                    throw new RuntimeException('Invalid column name: ' . $c, Response::HTTP_UNPROCESSABLE_ENTITY);
                }
                $orX->add(
                    $queryBuilder->expr()->like($queryBuilder->expr()->lower($c->getField()), ':search')
                );
            }

            $queryBuilder->andWhere($orX)->setParameter('search', $search);
        }
        $countQueryBuilder = clone $queryBuilder;
        if ($fnCount) {
            $totalRecords = (int)$fnCount($count, $countQueryBuilder);
        } else {
            $totalRecords = (int)$countQueryBuilder
                ->select(sprintf('COUNT(DISTINCT %s)', $count->getField()))
                ->getQuery()
                ->getSingleScalarResult();
        }

        $pageIndex = $filter->getPageIndex() ?? 1;
        $pageSize = $filter->getPageSize() ?? 10;
        $queryBuilder->setFirstResult(($pageIndex - 1) * $pageSize)
            ->setMaxResults($pageSize);

        if ($filter->getSortActive()) {
            $sortColumnAlias = $filter->getSortActive();
            $sortDirection = strtoupper($filter->getSortDirection()) === 'DESC' ? 'DESC' : 'ASC';

            $sortColumn = array_filter($columns, fn($col) => $col->getAlias() === $sortColumnAlias);
            if (!$sortColumn) {
                throw new RuntimeException('Invalid sort column: ' . $sortColumnAlias, Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $queryBuilder->orderBy(current($sortColumn)->getField(), $sortDirection);
        }

        $rows = $queryBuilder->getQuery()->getResult();

        $result = new DataTableResult();
        $result
            ->setData($rows)
            ->setTotalRecords($totalRecords)
            ->setCurrentPage($filter?->getPageIndex() ?? 1)
            ->setPageSize($filter?->getPageSize() ?? 10)
            ->setTotalPages(ceil($totalRecords / ($filter?->getPageSize() ?? 10)));

        return $result;
    }
}