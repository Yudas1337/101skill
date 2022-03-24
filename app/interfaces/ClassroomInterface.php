<?php

interface ClassroomInterface
{
    /**
     * count if classroom is already purchased by user
     * 
     * @param int $id
     * @return int
     */

    public function isPurchasedClassroom(int $id): int;

    /**
     * delete all modules if classroom is deleted
     * 
     * @param int $id
     * @return int
     */

    public function massDeleteModules(int $id): void;

    /**
     * delete specified classroom using id and user sesssion
     * 
     * @param int $id
     * @param int $created_by
     * @return void
     */

    public function deleteSpecifiedClassroom(int $id, int $created_by): void;
}
