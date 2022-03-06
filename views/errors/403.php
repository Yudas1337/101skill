<?php
require_once __DIR__ . "/../../app/helpers/uriHelper.php";
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
    <meta property="og:image" content="<?= $uriHelper->assetUrl("images/logo_1.png") ?>" />
    <title>403 Forbidden</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $uriHelper->assetUrl("images/logo_1.png") ?>">
    <link href="<?= $uriHelper->assetUrl("css/style.css") ?>" rel="stylesheet">

</head>

<body class="mt-5">
    <div class="authincation">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12">
                    <div class="form-input-content text-center error-page">
                        <h1 class="error-text  font-weight-bold">403</h1>
                        <h4><i class="fa fa-times-circle text-danger"></i> Forbidden Error</h4>
                        <p>Anda tidak punya akses untuk halaman ini</p>
                        <div>
                            <a class="btn btn-primary" href="<?= $uriHelper->baseUrl("index.php?page=main") ?>">Kembali ke home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>