<?php
require_once __DIR__ . "/../../configs/Config.php";
require_once __DIR__ . "/../helpers/alertHelper.php";

class formHelper extends Config
{
    /**
     * Convert number to rupiah
     *
     * @return string
     */
    public static function rupiah(int $input): string
    {

        $value = "Rp " . number_format($input, 2, ',', '.');
        return $value;
    }

    /**
     * Change phone number format to 62.
     *
     * @return string
     */

    public static function changePhoneFormat(string $phone_number): string
    {
        $phone_number = str_replace(" ", "", $phone_number);
        $phone_number = str_replace("(", "", $phone_number);
        $phone_number = str_replace(")", "", $phone_number);
        $phone_number = str_replace(".", "", $phone_number);
        if (!preg_match('/[^+0-9]/', trim($phone_number))) {
            if (substr(trim($phone_number), 0, 2) == '62') {
                return trim($phone_number);
            } elseif (substr(trim($phone_number), 0, 1) == '0') {
                return '62' . substr(trim($phone_number), 1);
            }
        }
        return $phone_number;
    }

    /**
     * Check if the form should not null
     *
     * @return array
     */
    public static function isNotNull(array $arr): array
    {
        foreach ($arr as $list) {
            if (empty($_POST[$list])) {
                alertHelper::failedActions("input $list tidak boleh kosong");
            }
        }

        return $arr;
    }

    /**
     * Sanitize form input from malicious code
     *
     * @return string
     */
    public function sanitizeInput(string $input): string
    {
        $sanitized = trim(htmlspecialchars($input));
        $sanitized = $this->db->real_escape_string($sanitized);
        return $sanitized;
    }

    /**
     * Check valid Email address
     *
     * @return string
     */
    public static function validEmail(string $email): string
    {
        $sanitized = filter_var($email, FILTER_VALIDATE_EMAIL);
        if (!$sanitized) {
            alertHelper::failedActions("Email tidak valid");
        }
        return $sanitized;
    }

    /**
     * Check input only characters
     *
     * @return string
     */
    public static function validString(string $fieldName, string $input): string
    {
        $sanitized = preg_match("/^[a-z-A-Z_\s]*$/", $input);
        if (!$sanitized) {
            alertHelper::failedActions("$fieldName hanya boleh huruf");
        }
        return $sanitized;
    }


    /**
     * Check input only digits
     *
     * @return int
     */
    public static function validDigit(int $digit): int
    {
        $sanitized = preg_match("/^[0-9]*$/", $digit);
        if (!$sanitized) {
            alertHelper::failedActions("$digit hanya boleh angka");
        }
        return $sanitized;
    }

    /**
     * Check if input should contains <= $lengths
     *
     * @return void
     */
    public static function maximumLength(string $fieldName, string $input, int $length): void
    {
        $sanitized = trim(strlen($input));
        if ($sanitized >= $length) {
            alertHelper::failedActions("$fieldName maksimal $length karakter");
        }
    }

    /**
     * Check if input should contains >= $lengths
     *
     * @return void
     */
    public static function minimumLength(string $fieldName, string $input, int $length): void
    {
        $sanitized = trim(strlen($input));
        if ($sanitized < $length) {
            alertHelper::failedActions("$fieldName minimal $length karakter");
        }
    }

    /**
     * Check and compare passwords
     *
     * @return void
     */
    public static function comparePassword(string $input_1, string $input_2): void
    {
        $sanitized = strcmp($input_1, $input_2);
        if ($sanitized != 0) {
            alertHelper::failedActions("Password tidak cocok");
        }
    }

    /**
     * Check if email or phone is already registered
     *
     * @return void
     */
    public function checkUnique(string $tableName, string $fieldName, string $value, string $message): void
    {
        $sanitized = $this->db->query("SELECT $fieldName FROM $tableName WHERE $fieldName = '$value'")->num_rows;
        if ($sanitized > 0) {
            alertHelper::failedActions("$message telah digunakan");
        }
    }

    /**
     * Should upload files
     *
     * @return void
     */
    public static function shouldUpload(string $files, string $message): void
    {
        if (empty($files)) {
            alertHelper::failedActions("$message tidak boleh kosong");
        }
    }

    /**
     * Check if input must contains character and digits combination
     *
     * @return void
     */
    public static function digitAndChar(string $fieldName, string $input): void
    {
        $sanitized = preg_match("/^[0-9a-zA-Z]*[0-9][0-9a-zA-Z]*$/", $input);
        if (!$sanitized) {
            alertHelper::failedActions("$fieldName harus kombinasi angka dan huruf");
        }
    }
}
