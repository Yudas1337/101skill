<?php

class alertHelper
{

    /**
     * Show sweetAlert2 popup if actions failed
     *
     * @return void
     */
    public static function failedActions(string $str): void
    {
        die("<script> swal({
            title: 'Gagal',
            text: '$str',
            icon: 'error',
            dangerMode: true,
        })</script>");
    }

    /**
     * Show sweetAlert2 popup if actions failed
     *
     * @return void
     */
    public static function failedAndRedirect(string $str, string $redirect): void
    {
        echo "<script>
        swal({
            title: 'Gagal',
            text: '$str',
            icon: 'error',
            dangerMode: true,
        })
        .then((result) => {
            window.location = '$redirect'
        })</script>";
    }

    /**
     * Show sweetAlert2 popup if actions success
     *
     * @return void
     */
    public static function successActions(string $str): void
    {
        echo "<script> swal({
            title: 'Berhasil',
            text: '$str',
            icon: 'success',
            buttons: {
                confirm : 'OK',
            }
        })</script>";
    }

    /**
     * Show sweetAlert2 popup if actions success and redirect
     *
     * @return void
     */
    public static function successAndRedirect(string $str, string $redirect): void
    {
        echo "<script>
        swal({
            title: 'Berhasil',
            text: '$str',
            icon: 'success',
            buttons: {
                confirm : 'OK',
            }
        })
        .then((result) => {
            window.location = '$redirect'
        })</script>";
    }
}
