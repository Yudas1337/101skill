<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/CategoryModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/FormInterface.php";

class CategoryController extends Controller implements FormInterface
{
    private $redirect = "index.php?page=dashboard&content=category&menu=list";

    private $categoryModel;

    /**
     * Define a CategoryController constructor .
     */

    function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    /**
     * Get All Category .
     * 
     * @return array
     */

    public function getAll(): array
    {
        return $this->categoryModel->getAll();
    }

    /**
     * Get Category By Id .
     * 
     * @param int $id
     * @return array
     */

    public function getById(int $id): array
    {
        return $this->categoryModel->getById($id);
    }

    /**
     * Insert new Category .
     * 
     * @return void
     */

    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['icon']['name'], "Icon Kategori");

        $this->categoryModel->save();
        alertHelper::successAndRedirect("Berhasil tambah kategori", $this->redirect);
    }

    /**
     * update current Category .
     * 
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->categoryModel->update($id);
        alertHelper::successAndRedirect("Berhasil update kategori", $this->redirect);
    }

    /**
     * delete Category .
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $this->categoryModel->delete($id);
    }

    /**
     * Filter Form .
     * 
     * @return void
     */

    public function filterForm(): void
    {
        formHelper::isNotNull(['name']);
        formHelper::validString("Nama Kategori", $_POST['name']);
    }
}
