<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/helpers/formHelper.php";
require_once __DIR__ . "/../app/helpers/fileHelper.php";

class UserModel extends Config
{
    private $formHelper;
    private $upload_path = "assets/images/profile/";

    function __construct()
    {
        parent::__construct();
        $this->formHelper = new formHelper();
    }

    /**
     * get current user session
     * 
     * @return array
     */

    public function getCurrentUser(): array
    {
        $arr        = array();
        $id         = $_SESSION['user_id'];
        $fetch      = $this->db->query("SELECT * FROM user WHERE id = '$id'")->fetch_object();

        $arr['user_id']         = $fetch->id;
        $arr['address']         = $fetch->address;
        $arr['email']           = $fetch->email;
        $arr['name']            = $fetch->name;
        $arr['phone_number']    = $fetch->phone_number;
        $arr['photo']           = $fetch->photo;

        return $arr;
    }

    /**
     * update password by current user session
     * 
     * @return void
     */

    public function changePassword(): void
    {
        $id = $_SESSION['user_id'];

        $oldPassword    = $this->formHelper->sanitizeInput($_POST['old_password']);
        $newPassword    = $this->formHelper->sanitizeInput($_POST['new_password']);

        $sql = $this->db->query("SELECT * FROM user WHERE id = '$id'")->fetch_object();

        if (password_verify($oldPassword, $sql->password)) {
            if (!password_verify($newPassword, $sql->password)) {
                $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $this->db->query("UPDATE user SET password = '$newPassword' WHERE id = '$id'");
            } else {
                alertHelper::failedActions("Password tidak boleh sama dengan password lama");
            }
        } else {
            alertHelper::failedActions("Password lama tidak cocok");
        }
    }

    /**
     * update profile by current user session
     * 
     * @return void
     */

    public function updateProfile(): void
    {
        $id             = $_SESSION['user_id'];
        $name           = $this->formHelper->sanitizeInput($_POST['name']);
        $address        = $this->formHelper->sanitizeInput($_POST['address']);
        $phone_number   = formHelper::changePhoneFormat($this->formHelper->sanitizeInput($_POST['phone_number']));

        $sql = $this->db->query("SELECT * FROM user WHERE id = '$id'")->fetch_object();
        $photo = $sql->photo;

        if (!empty($_FILES['photo']['name'])) {
            if ($photo != 'default.png') {
                fileHelper::_removeImage($this->upload_path, $photo);
            }
            $photo = $_FILES['photo'];
            $photo = fileHelper::_doUpload($this->upload_path, $photo);
        }

        $this->db->query("UPDATE user SET name = '$name', photo = '$photo', address = '$address', phone_number = '$phone_number' WHERE id = '$id'");
    }
}
