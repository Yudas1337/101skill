<?php
require_once __DIR__ . "/../../../app/helpers/uriHelper.php";
require_once __DIR__ . "/../../../app/helpers/formHelper.php";
require_once __DIR__ . "/../../../app/controllers/UserController.php";
require_once __DIR__ . "/../../../app/middleware/sessionMiddleware.php";

$user = new UserController();
$getUser = $user->getUser();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="101Skill - Platform belajar secara gratis" />
    <meta name="author" content="Yudas Malabi" />
    <meta name="description" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:title" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:description" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:image" content="<?= $uriHelper->assetUrl("images/logo.png") ?>" />
    <title>101Skill - Platform belajar secara gratis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $uriHelper->assetUrl("images/logo.png") ?>">
    <link href="<?= $uriHelper->assetUrl("vendor/jqvmap/css/jqvmap.min.css") ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= $uriHelper->assetUrl("vendor/chartist/css/chartist.min.css") ?>">
    <link href="<?= $uriHelper->assetUrl("vendor/datatables/css/jquery.dataTables.min.css") ?>" rel="stylesheet">
    <link href="<?= $uriHelper->assetUrl("vendor/bootstrap-select/dist/css/bootstrap-select.min.css") ?>" rel="stylesheet">
    <link href="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <link href="<?= $uriHelper->assetUrl("vendor/select2/css/select2.min.css") ?>" rel="stylesheet">


    <link href="<?= $uriHelper->assetUrl("css/style.css") ?>" rel="stylesheet">
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