<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";

if (isset($_GET['id'])) {
    $category = new CategoryController();
    $id = abs($_GET['id']);
    $data = $category->getById($id);
}

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
                        <h4 class="card-title">Update Kategori</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="example" style="min-width: 845px">
                                    <tbody>
                                        <tr>
                                            <td>Nama Kategori <span class="text-danger">*</span></td>
                                            <td><input type="text" placeholder="Web Development" class="form-control" name="name" autocomplete="off" value="<?= $data['name'] ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Icon</td>
                                            <td><img height="100" width="100" src="<?= $uriHelper->baseUrl('assets/images/categories/' . $data['icon']) ?>" alt="<?= $data['name']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <td>Icon Kategori <span class="text-danger">*</span></td>
                                            <td><input type="file" name="icon" accept="image/*"></td>
                                        </tr>
                                        <tr>
                                            <td><span class="text-danger">Format: jpg, png, jpeg</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="toolbar toolbar-bottom" role="toolbar" style="text-align: right;">
                                    <button class="btn btn-warning light btn-md" name="submit" type="submit">Update Data</button>
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
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $category = new CategoryController();
    $category->update($id);
}
?>