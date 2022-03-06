<?php
require_once __DIR__ . "/../../helpers/uriHelper.php";
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
    <title>404 Page not found</title>
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
                        <h1 class="error-text  font-weight-bold">404</h1>
                        <h4><i class="fa fa-exclamation-triangle text-warning"></i> Page Not Found</h4>
                        <p>Halaman yang anda cari tidak ditemukan atau mungkin sudah dihapus</p>
                        <div>
                            <a class="btn btn-success" href="<?= $uriHelper->baseUrl("index.php?page=main") ?>">Kembali ke home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>