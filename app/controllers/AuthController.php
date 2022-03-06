<?php
require_once __DIR__ . "/../../models/AuthModel.php";
require_once __DIR__ . "/../helpers/formHelper.php";
require_once __DIR__ . "/../interfaces/FormInterface.php";

class AuthController implements FormInterface
{
    private $authModel, $formHelper;

    function __construct()
    {
        $this->authModel        = new AuthModel();
        $this->formHelper       = new formHelper();
    }

    /**
     * Define login method.
     *
     * @return void
     */

    public function login(): void
    {
        formHelper::isNotNull(["email", "password"]);
        formHelper::validEmail($_POST['email']);

        $email      = $this->formHelper->sanitizeInput($_POST['email']);
        $password   = $this->formHelper->sanitizeInput($_POST['password']);

        $this->authModel->_doLogin($email, $password);

        alertHelper::successAndRedirect("Berhasil login. selamat datang " . $_SESSION['name'], "index.php?page=dashboard&content=main");
    }

    /**
     * Define register method.
     *
     * @return void
     */

    public function register(): void
    {
        $this->filterForm();

        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $email          = $this->formHelper->sanitizeInput($_POST['email']);
        $phone_number   = formHelper::changePhoneFormat($this->formHelper->sanitizeInput($_POST['phone_number']));
        $address        = $this->formHelper->sanitizeInput($_POST['address']);
        $password       = $this->formHelper->sanitizeInput($_POST['password']);

        $this->authModel->_doRegister($name, $email, $phone_number, $address, $password);

        alertHelper::successAndRedirect("Berhasil registrasi akun", "index.php?page=login");
    }

    /**
     * Filter Registration Form
     *
     * @return void
     */

    public function filterForm(): void
    {
        formHelper::isNotNull(["name", "email", "phone_number", "address", "password", "repeat_password"]);

        $phone_number = formHelper::changePhoneFormat($this->formHelper->sanitizeInput($_POST['phone_number']));
        $email = $_POST['email'];
        $name = $_POST['name'];

        formHelper::validString("Nama Lengkap", $name);
        formHelper::maximumLength("Nama lengkap", $name, 50);
        formHelper::minimumLength("Nama lengkap", $name, 3);
        formHelper::validEmail($email);
        $this->formHelper->checkUnique("user", "email", $email, 'Email');
        formHelper::validDigit($phone_number);
        $this->formHelper->checkUnique("user", "phone_number", $phone_number, 'Nomor Telepon');
        formHelper::minimumLength("Nomor Telepon", $phone_number, 10);
        formHelper::maximumLength("Nomor Telepon", $phone_number, 15);
        formHelper::minimumLength("Password", $_POST['password'], 6);
        formHelper::comparePassword($_POST['password'], $_POST['repeat_password']);
    }
}
