<?php
require_once __DIR__ . "/../../configs/Config.php";
require_once __DIR__ . "/../../models/UserModel.php";

class UserController
{
    private $userModel;

    function __construct()
    {
        $this->userModel = new UserModel();
    }

    /**
     * Logout current session.
     * 
     * @return void
     */

    public static function logout(): void
    {
        $_SESSION['user'] = FALSE;
        unset($_SESSION['user_id']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);

        header('location: index.php?page=login');
    }

    /**
     * Get current user session.
     * 
     * @return array
     */

    public function getUser(): array
    {
        return $this->userModel->getCurrentUser();
    }

    /**
     * Change password from the current user session
     * 
     * @return void
     */

    public function changePassword(): void
    {

        formHelper::isNotNull(['old_password', 'new_password', 'repeat_password']);
        formHelper::minimumLength("Password baru", $_POST['new_password'], 6);
        formHelper::comparePassword($_POST['new_password'], $_POST['repeat_password']);

        $this->userModel->changePassword();
        alertHelper::successAndRedirect("Berhasil ubah password", "index.php?page=dashboard&content=changePass");
    }

    /**
     * Update profile from the current user session
     * 
     * @return void
     */

    public function updateProfile(): void
    {
        formHelper::isNotNull(['name', 'phone_number', 'address']);
        formHelper::validString('Nama', $_POST['name']);
        formHelper::validDigit($_POST['phone_number']);

        $this->userModel->updateProfile();
        alertHelper::successAndRedirect("Berhasil update profile", "index.php?page=dashboard&content=profile");
    }
}
