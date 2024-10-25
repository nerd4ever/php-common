<?php
/**
 * Created by Sileno de Oliveira Brito on 25/10/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Model;

use DateTime;
use Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

trait FilterTrait
{
    /**
     * @throws Exception
     */
    protected function validateSortDirection(?string $sortDirection): void
    {
        if (!empty($sortDirection) && !in_array($sortDirection, ['asc', 'desc'], true)) {
            throw new Exception('Invalid sort direction. Allowed values: "asc", "desc".', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @throws Exception
     */
    protected function validatePageValues(int $pageIndex, int $pageSize): void
    {
        if ($pageIndex < 1) {
            throw new Exception('Page index must be 1 or greater.', Response::HTTP_BAD_REQUEST);
        }

        if ($pageSize < 1) {
            throw new Exception('Page size must be 1 or greater.', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @throws Exception
     */
    protected function getFilter(Request $request): Filter
    {
        $sortDirection = $request->query->get('sortDirection');
        $this->validateSortDirection($sortDirection);
        $pageIndex = max($request->query->getInt('pageIndex', 1), 0) + 1;
        $pageSize = $request->query->getInt('pageSize', 10);
        $dateStartStr = $request->query->get('dateStart');
        $dateEndStr = $request->query->get('dateEnd');

        if ($dateStartStr) {
            $dateStart = new DateTime($dateStartStr);
        }
        if ($dateEndStr) {
            $dateEnd = new DateTime($dateEndStr);
        }
        return new Filter(
            $request->query->get('search'),
            $pageIndex,
            $pageSize,
            $request->query->get('sortActive'),
            $sortDirection,
            $dateStart ?? null,
            $dateEnd ?? null
        );
    }
}