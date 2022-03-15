<?php
require_once __DIR__ . "/Controller.php";
require_once __DIR__ . "/../../models/ClassroomModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/IForm.php";

class ClassroomController extends Controller implements FormInterface
{
    private $redirect = "index.php?page=dashboard&content=classroom&menu=list";

    private $classroomModel;

    function __construct()
    {
        $this->classroomModel = new ClassroomModel();
    }

    /**
     * Get All Category .
     * @return array
     */
    public function getAll(): array
    {
        return $this->classroomModel->show();
    }

    /**
     * Get Category By Id .
     * @return array
     */
    public function getById(int $id): array
    {
        return $this->classroomModel->getById($id);
    }

    /**
     * Insert new Category .
     * @return void
     */
    public function save(): void
    {
        $this->filterForm();
        formHelper::shouldUpload($_FILES['thumbnail']['name'], "Foto Produk");

        $this->classroomModel->save();
        alertHelper::successAndRedirect("Berhasil tambah Produk", $this->redirect);
    }

    /**
     * update current Category .
     * @return void
     */

    public function update(int $id): void
    {
        $this->filterForm();
        $this->classroomModel->update($id);
        alertHelper::successAndRedirect("Berhasil update Produk", $this->redirect);
    }

    /**
     * delete Category .
     * @return void
     */

    public function delete(int $id): void
    {
        $redirect = $this->redirect;
        $this->classroomModel->delete($id);
        header("location: $redirect");
    }

    /**
     * Count Product
     * @return int
     */

    public function countRows(): int
    {
        return $this->classroomModel->countRows();
    }


    /**
     * Get the latest product
     * @return array
     */

    public function getLatestProduct(): array
    {
        return $this->classroomModel->getLatestProduct();
    }

    /**
     * Get the favorite product
     * @return array
     */
    public function getFavoriteProduct(): array
    {
        return $this->classroomModel->getFavoriteProduct();
    }

    /**
     * Filter Form .
     * @return void
     */
    public function filterForm(): void
    {
        formHelper::isNotNull(['product_id', 'name', 'category_id', 'description', 'supplier_id', 'merk', 'price', 'stock']);
        formHelper::digitAndChar('Kode Produk', $_POST['product_id']);
        formHelper::validDigit($_POST['category_id']);
        formHelper::validDigit($_POST['supplier_id']);
        formHelper::validDigit($_POST['price']);
        formHelper::validDigit($_POST['stock']);
    }
}
