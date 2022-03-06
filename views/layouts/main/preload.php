<?php
require_once __DIR__ . "/../../../helpers/uriHelper.php";
require_once __DIR__ . "/../../../controllers/UserController.php";

if (isset($_SESSION['user_id'])) {
    $user = new UserController();
    $user = $user->getUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="MalangSnack, Gudang Oleh-oleh, Malang" />
    <meta name="author" content="Yudas Malabi" />
    <meta name="description" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:title" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:description" content="MalangSnack - Gudangnya oleh-oleh khas Malang" />
    <meta property="og:image" content="<?= $uriHelper->assetUrl("images/logo_1.png") ?>" />
    <title>MalangSnack - Gudangnya oleh-oleh khas Malang</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $uriHelper->assetUrl("images/logo_1.png") ?>">
    <link href="<?= $uriHelper->baseUrl('assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css') ?>" rel="stylesheet">
    <link href="<?= $uriHelper->baseUrl('assets/vendor/owl-carousel/owl.carousel.css') ?>" rel="stylesheet">
    <link href="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">

    <link rel="stylesheet" href="<?= $uriHelper->assetUrl('vendor/jquery-smartwizard/dist/css/smart_wizard.min.css') ?>">
    <link href="<?= $uriHelper->baseUrl('assets/css/style.css') ?>" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->