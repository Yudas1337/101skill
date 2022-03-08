<?php

/**
 * Abstract class for CRUD Controller .
 */

abstract class Controller
{
    /**
     * Fetch and get all data from specified table
     * 
     * @return array
     */

    abstract public function getAll(): array;

    /**
     * Fetch and get specified data by id from table
     * 
     * @return array
     */

    abstract public function getById(int $id): array;

    /**
     * save new data into specified table
     * 
     * @return void
     */

    abstract public function save(): void;

    /**
     * update specified data by id from table
     * 
     * @return void
     */

    abstract public function update(int $id): void;

    /**
     * delete specified data by id from table
     * 
     * @return void
     */

    abstract public function delete(int $id): void;
}
