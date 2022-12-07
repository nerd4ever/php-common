<?php

namespace Nerd4ever\Common\Model;
use Exception;
interface IDataAdapter
{
    /**
     * Create an element and save in database
     * @param string $className,
     * @param $entity
     * @return mixed
     * @throws Exception
     */
    public function create(string $className, $entity): object;

    /**
     * Update an element, find by id
     * @param string $className,
     * @param $id
     * @param $entity
     * @return mixed
     * @throws Exception
     */
    public function update(string $className, $id, $entity): object;

    /**
     * Read an element from database, find by id
     * @param string $className,
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function read(string $className, $id): ?object;

    /**
     * Delete an element from database, find by id
     * @param string $className,
     * @param $id
     * @return mixed
     * @throws Exception
     */
    public function delete(string $className, $id) : bool;

    /**
     * Get all elements from database
     * @param string $className,
     * @param array $filter
     * @return mixed
     * @throws Exception
     */
    public function list(string $className, array $filter = []): array;
}