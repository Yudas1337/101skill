<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/benefitModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/FormInterface.php";

class BenefitController extends Controller implements FormInterface
{
    private $redirect = "index.php?page=dashboard&content=classroom&menu=detail&id=";

    private $benefitModel;

    /**
     * Define a CategoryController constructor .
     */

    function __construct()
    {
        $this->benefitModel = new BenefitModel();
    }

    /**
     * Get All Benefit .
     * 
     * @return array
     */

    public function getAll(): array
    {
        return $this->benefitModel->getAll();
    }

    /**
     * Get Benefit By Id .
     * 
     * @param int $id
     * @return array
     */

    public function getById(int $id): array
    {
        return $this->benefitModel->getById($id);
    }

    /**
     * Insert new Benefit .
     * 
     * @return void
     */

    public function save(): void
    {
        $this->filterForm();
        $this->benefitModel->save();
        $this->redirect .= $_POST['class_id'];
        alertHelper::successAndRedirect("Berhasil tambah benefit", $this->redirect);
    }

    /**
     * update current Benefit .
     * 
     * @param int $id
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->benefitModel->update($id);
        $this->redirect .= $_POST['class_id'];
        alertHelper::successAndRedirect("Berhasil update benefit", $this->redirect);
    }

    /**
     * delete Benefit .
     * 
     * @param int $id
     * @return void
     */

    public function delete(int $id): void
    {
        $this->benefitModel->delete($id);
    }

    /**
     * Filter Form .
     * 
     * @return void
     */

    public function filterForm(): void
    {
        formHelper::isNotNull(['name']);
        formHelper::validString("Nama Benefit", $_POST['name']);
    }
}
