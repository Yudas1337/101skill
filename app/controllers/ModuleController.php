<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/ModuleModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/FormInterface.php";

class ModuleController extends Controller implements FormInterface
{
    private $redirect = "index.php?page=dashboard&content=classroom&menu=detail&id=";

    private $moduleModel;

    function __construct()
    {
        $this->moduleModel = new ModuleModel();
    }

    /**
     * Get All module .
     * @return array
     */

    public function getAll(): array
    {
        return $this->moduleModel->getAll();
    }

    /**
     * Get module By Id .
     * @return array
     */

    public function getById(int $id): array
    {
        return $this->moduleModel->getById($id);
    }

    /**
     * Insert new module .
     * @return void
     */

    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['thumbnail']['name'], "Thumbnail Materi");

        $this->moduleModel->save();
        $this->redirect .= abs($_GET['class_id']);
        alertHelper::successAndRedirect("Berhasil tambah Materi", $this->redirect);
    }

    /**
     * update current module .
     * 
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->moduleModel->update($id);
        alertHelper::successAndRedirect("Berhasil update Kelas", $this->redirect);
    }

    /**
     * delete module .
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $redirect = $this->redirect;
        $this->moduleModel->delete($id);
        header("location: $redirect");
    }

    /**
     * Count module
     * @return int
     */

    public function countRows(): int
    {
        return $this->moduleModel->countRows();
    }

    /**
     * Filter Form .
     * @return void
     */

    public function filterForm(): void
    {
        formHelper::isNotNull(['title', 'description', 'content']);
    }
}
