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
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar akun baru</h4>
                        </div>
                        <div class="card-body">

                            <form method="POST" id="formRegister">
                                <div id="smartwizard" class="form-wizard order-create sw sw-theme-default sw-justified">
                                    <div class="tab-content" style="height: 100%;">
                                        <div id="step_1" class="tab-pane" role="tabpanel" style="display: block;">
                                            <div class="row">
                                                <div class="col-lg-12 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Nama lengkap <span class="text-danger">*</span></label>
                                                        <input autofocus type="text" value="<?= (isset($_POST['name']) ? $_POST['name'] : '') ?>" name="name" class="form-control" placeholder="John Doe" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Email Address <span class="text-danger">*</span></label>
                                                        <input type="text" name="email" class="form-control" value="<?= (isset($_POST['email']) ? $_POST['email'] : '') ?>" placeholder="johndoe@example.com" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-2">
                                                    <div class="form-group">
                                                        <label class="text-label">Phone Number <span class="text-danger">*</span></label>
                                                        <input value="<?= (isset($_POST['phone_number']) ? $_POST['phone_number'] : '') ?>" autocomplete="off" name="phone_number" type="number" class="form-control" placeholder="6282257181297">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Alamat <span class="text-danger">*</span></label>
                                                        <textarea name="address" placeholder="Politeknik Negeri Malang" class="form-control" autocomplete="off"><?= (isset($_POST['address']) ? $_POST['address'] : '') ?></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Password <span class="text-danger">*</span></label>
                                                        <input name="password" type="password" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-3">
                                                    <div class="form-group">
                                                        <label class="text-label">Ulangi password <span class="text-danger">*</span></label>
                                                        <input name="repeat_password" type="password" class="form-control" autocomplete="off">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: left;">
                                        <span>Sudah punya akun? <a href="<?= $uriHelper->baseUrl("index.php?page=login") ?>" class="text-primary">Login</a></span>
                                    </div>
                                    <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                        <button class="btn btn-primary" name="submit" type="submit">Daftarkan akun</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?= $uriHelper->assetUrl("js/jquery.min.js") ?>" type="text/javascript"></script>
    <script src="<?= $uriHelper->assetUrl("vendor/sweetalert2/dist/sweetalert2.min.js") ?>"></script>
</body>

<?php
if (isset($_POST['submit'])) {
    $authController = new AuthController();
    $authController->register();
}
?>

</html>