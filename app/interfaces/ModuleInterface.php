<?php

interface ModuleInterface
{
    /**
     * show specified data by id from the table
     *
     * @param int $id
     * @return array
     */

    public function getByClassroomId(int $id): array;
}
