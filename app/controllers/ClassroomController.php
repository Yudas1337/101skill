<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/ClassroomModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/FormInterface.php";

class ClassroomController extends Controller implements FormInterface
{
    private $redirect = "index.php?page=dashboard&content=classroom&menu=list";

    private $classroomModel;

    function __construct()
    {
        $this->classroomModel = new ClassroomModel();
    }

    /**
     * Get All classroom .
     * @return array
     */

    public function getAll(): array
    {
        return $this->classroomModel->getAll();
    }

    /**
     * Get classroom By Id .
     * @return array
     */

    public function getById(int $id): array
    {
        return $this->classroomModel->getById($id);
    }

    /**
     * Insert new classroom .
     * @return void
     */

    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['thumbnail']['name'], "Foto Kelas");

        $this->classroomModel->save();
        alertHelper::successAndRedirect("Berhasil tambah kelas", $this->redirect);
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
        $this->classroomModel->update($id);
        alertHelper::successAndRedirect("Berhasil update Kelas", $this->redirect);
    }

    /**
     * delete classroom .
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $this->classroomModel->delete($id);
    }

    /**
     * Count classroom
     * @return int
     */

    public function countRows(): int
    {
        return $this->classroomModel->countRows();
    }


    /**
     * Get the latest classroom
     * @return array
     */

    public function getLatestClassroom(): array
    {
        return $this->classroomModel->getLatestClassroom();
    }

    /**
     * Get the favorite product
     * @return array
     */

    public function getFavoriteClassroom(): array
    {
        return $this->classroomModel->getFavoriteClassroom();
    }

    /**
     * Filter Form .
     * @return void
     */

    public function filterForm(): void
    {
        formHelper::isNotNull(['title', 'category_id', 'description', 'is_visible']);
        formHelper::validDigit($_POST['category_id']);
    }
}
