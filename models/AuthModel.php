<?php
require_once __DIR__ . "/../configs/Config.php";
require_once __DIR__ . "/../app/interfaces/AuthInterface.php";


class AuthModel extends Config implements AuthInterface
{
    /**
     * Override register method from AuthInterface.
     *
     * @return void
     */

    public function _doRegister($name, $email, $phone_number, $address, $password): void
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $photo = 'default.png';
        $role = 'public';

        $this->db->query("INSERT INTO user VALUES(NULL, '$email', '$password', '$name', '$phone_number', '$address', '$photo', '$role', NOW(), NOW())");
    }

    /**
     * Override login method from IAuth
     *
     * @return void
     */
    public function _doLogin($email, $password): void
    {
        $sql = $this->db->query("SELECT * FROM user WHERE email = '$email'");
        $fetch = $sql->fetch_object();
        $rowCount = $sql->num_rows;

        if ($rowCount > 0) {
            if (password_verify($password, $fetch->password)) {
                $_SESSION['user'] = TRUE;
                $_SESSION['user_id'] = $fetch->id;
                $_SESSION['name'] = $fetch->name;
                $_SESSION['role'] = $fetch->role;
            } else {
                alertHelper::failedActions("Email atau password salah");
            }
        } else {
            alertHelper::failedActions("Akun tidak ditemukan");
        }
    }
}
