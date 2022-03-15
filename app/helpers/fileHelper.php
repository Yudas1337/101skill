<?php

class fileHelper
{
    /**
     * file helper for uploading to filesystem
     * 
     * @param string $upload_path
     * @param array $files
     * @return string
     */

    public static function _doUpload(string $upload_path, array $files): string
    {
        $extension = array("jpg", "jpeg", "png");
        $foto = time() . $files['name'];
        $path_foto = $files['tmp_name'];
        $pecah = explode(".", $foto);
        $end = strtolower(end($pecah));

        if (in_array($end, $extension)) {
            move_uploaded_file($path_foto, $upload_path . $foto);
        } else {
            alertHelper::failedActions("Ekstensi gambar tidak valid");
        }

        return $foto;
    }

    /**
     * file helper for removing image from filesystem
     * 
     * @param string $upload_path
     * @param array $files
     * @return void
     */

    public static function _removeImage(string $upload_path, string $files): void
    {
        unlink($upload_path . $files);
    }
}
