<?php
/**
 * Created by Sileno de Oliveira Brito on 05/07/2024.
 * Copyright (c) 2024 Nerd4ever All rights reserved.
 */

namespace Nerd4ever\Common\Adapter;

use Doctrine\ORM\EntityManagerInterface;
use InvalidArgumentException;
use Nerd4ever\Common\Model\Filter;
use Nerd4ever\Common\Model\NameFinder;
use Symfony\Component\HttpFoundation\Response;
use Exception;

abstract class AdapterDefault implements
    AdapterCreateInterface,
    AdapterReadInterface,
    AdapterUpdateInterface,
    AdapterDeleteInterface,
    AdapterListInterface,
    AdapterNameFinderInterface
{
    abstract function getClass(): string;

    abstract function getManager(): EntityManagerInterface;


    abstract function copy(object $entity, ?object $r = null): object;

    public function create(object $object): object
    {

        if (!is_a($object, $this->getClass())) {
            throw new InvalidArgumentException('The object must be an instance of ' . $this->shortClassName());
        }
        $columnName = $this->nameFinderColumn();
        if (!empty($columnName)) {
            $tmp = $this->findByName($this->nameFinderValue($object));
            if (is_a($tmp, $this->getClass()) && $object->getId() !== $tmp->getId()) {
                throw new InvalidArgumentException($this->shortClassName() . ' already exists', Response::HTTP_CONFLICT);
            }
        }
        $r = $this->copy($object);
        $this->getManager()->persist($r);
        $this->getManager()->flush();
        return $r;
    }

    public function read(string $id): object
    {
        $e = $this->getManager()->getRepository($this->getClass())->find($id);
        if (!is_a($e, $this->getClass())) {
            throw new InvalidArgumentException($this->shortClassName() . ' not found', Response::HTTP_NOT_FOUND);
        }
        return $e;
    }

    public function update(object $object, string $id): object
    {
        if (!is_a($object, $this->getClass())) {
            throw new InvalidArgumentException('The object must be an instance of ' . $this->shortClassName());
        }
        $e = $this->read($id);

        $columnName = $this->nameFinderColumn();
        if (!empty($columnName)) {
            $tmp = $this->findByName($this->nameFinderValue($object));
            if (is_a($tmp, $this->getClass()) && $e->getId() !== $tmp->getId()) {
                throw new InvalidArgumentException($this->shortClassName() . ' already exists', Response::HTTP_CONFLICT);
            }
        }

        $e = $this->copy($object, $e);
        $this->getManager()->flush();
        return $e;
    }

    public function delete(string $id): void
    {
        $e = $this->read($id);
        try {
            $this->getManager()->remove($e);
            $this->getManager()->flush();
        } catch (Exception $ex) {
            error_log($ex->getMessage());
            throw new InvalidArgumentException($this->shortClassName() . ' cannot be deleted', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function list(?Filter $filter = null): array
    {
        return $this->getManager()->getRepository($this->getClass())->findAll();
    }

    protected function findByName(string $name): ?object
    {
        $columnName = $this->nameFinderColumn();
        if (empty($columnName)) return null;
        return $this->getManager()->getRepository($this->getClass())->findOneBy([$columnName => $name]);
    }

    public function nameFinder(NameFinder $nameFinder): bool
    {
        $e = $this->findByName($nameFinder->getName());
        return is_a($e, $this->getClass()) && $e->getId() !== $nameFinder->getId();
    }

    private function shortClassName(): string
    {
        return basename(str_replace('\\', '/', $this->getClass()));
    }

    protected function nameFinderColumn(): ?string
    {
        return null;
    }

    protected function nameFinderValue(object $object): ?string
    {
        return null;
    }

}