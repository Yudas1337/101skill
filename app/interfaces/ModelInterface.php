<?php

interface ModelInterface
{
    /**
     * Get all data from table
     *
     * @return array
     */

    public function getAll(): array;

    /**
     * save new data into the table
     *
     * @return void
     */

    public function save(): void;

    /**
     * update specified data by id from the table
     *
     * @param int $id
     * @return void
     */

    public function update(int $id): void;

    /**
     * delete specified data by id from the table
     *
     * @param int $id
     * @return void
     */

    public function delete(int $id): void;

    /**
     * show specified data by id from the table
     *
     * @param int $id
     * @return array
     */

    public function getById(int $id): array;
}
