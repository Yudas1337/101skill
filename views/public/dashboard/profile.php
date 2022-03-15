<?php
require_once __DIR__ . "/../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../app/controllers/UserController.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->

    <form method="POST" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="profile card card-body px-3 pt-3 pb-0">
                        <div class="profile-head">
                            <div class="profile-info">
                                <div class="profile-photo">
                                    <img src="<?= $uriHelper->assetUrl('images/profile/' . $getUser['photo']) ?>" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="profile-details">
                                    <div class="profile-name px-3 pt-2">
                                        <h4 class="text-primary mb-0"><?= $getUser['name'] ?></h4>
                                        <p><?= $getUser['email'] ?></p>
                                        <p>Nomor Telepon: <?= $getUser['phone_number'] ?></p>
                                    </div>
                                    <div class="profile-email px-2 pt-2">
                                        <p><input type="file" name="photo" accept="image/*"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" style="min-width: 845px">
                                    <tbody>
                                        <tr>
                                            <td>Nama<span class="text-danger">*</span></td>
                                            <td><input type="text" class="form-control solid" name="name" value="<?= $getUser['name'] ?>" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Telepon<span class="text-danger">*</span></td>
                                            <td><input type="number" class="form-control solid" name="phone_number" value="<?= $getUser['phone_number'] ?>" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat<span class="text-danger">*</span></td>
                                            <td><textarea class="form-control solid" name="address" autocomplete="off"><?= $getUser['address'] ?></textarea></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-primary light btn-md" name="submit" type="submit">Update Profile</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </form>
</div>

<?php
require_once __DIR__ . "/../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $user = new UserController();
    $user->updateProfile();
}
?>