<?php
require_once __DIR__ . "/../../../app/helpers/uriHelper.php";
require_once __DIR__ . "/../../../app/middleware/sessionMiddleware.php";
require_once __DIR__ . "/../../../app/controllers/AuthController.php";
sessionMiddleware::isLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="101Skill, Platform belajar secara gratis" />
    <meta name="author" content="Yudas Malabi" />
    <meta name="description" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:title" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:description" content="101Skill - Platform belajar secara gratis" />
    <meta property="og:image" content="<?= $uriHelper->assetUrl("images/logo.png") ?>" />
    <title>101Skill - Platform belajar secara gratis</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= $uriHelper->assetUrl("images/logo.png") ?>">
    <link href="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.css") ?>" rel="stylesheet">
    <link href="<?= $uriHelper->assetUrl("css/style.css") ?>" rel="stylesheet">

</head>

<body class="mt-5">
    <div class="authincation">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="<?= $uriHelper->baseUrl('index.php?page=main') ?>"><img src="<?= $uriHelper->assetUrl("images/logo.png") ?>" width="80%"></a>
                                    </div>
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Email</strong></label>
                                            <input type="text" autofocus class="form-control" placeholder="johndoe@example.com" name="email" autocomplete="off" value="<?= (isset($_POST['submit']) ? $_POST['email'] : '') ?>">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                        <div class="text-center mt-5">
                                            <button type="submit" name="submit" class="btn btn-primary btn-block">Masuk</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-4 text-center">
                                        <p>Belum punya akun? <a class="text-primary" href="<?= $uriHelper->baseUrl("index.php?page=register") ?>">Daftar</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
</body>

<?php
if (isset($_POST['submit'])) {
    $authController = new AuthController();
    $authController->login();
}
?>

</html>