<?php

require_once __DIR__ . "/../../models/SearchModel.php";

class SearchController
{

    private $searchModel;

    function __construct()
    {
        $this->searchModel = new SearchModel();
    }

    /**
     * search classroom
     * 
     * @param mixed $key
     * @return array
     */

    public function search($key): array
    {
        return $this->searchModel->search($key);
    }

    /**
     * filter classroom
     * 
     * @param mixed $key
     * @return array
     */

    public function filter($key): array
    {
        return $this->searchModel->filter($key);
    }
}
