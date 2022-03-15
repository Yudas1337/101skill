<?php
require_once __DIR__ . "/../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../app/controllers/UserController.php";
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Ubah Password</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="example" style="min-width: 845px">
                                    <tbody>
                                        <tr>
                                            <td>Password lama<span class="text-danger">*</span></td>
                                            <td><input type="password" class="form-control solid" name="old_password" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Password baru<span class="text-danger">*</span></td>
                                            <td><input type="password" class="form-control solid" name="new_password" autocomplete="off"></td>
                                        </tr>
                                        <tr>
                                            <td>Ulangi password<span class="text-danger">*</span></td>
                                            <td><input type="password" class="form-control solid" name="repeat_password" autocomplete="off"></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-primary light btn-md" name="submit" type="submit">Ubah Password</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<?php
require_once __DIR__ . "/../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $user = new UserController();
    $user->changePassword();
}
?>