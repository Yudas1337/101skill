<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/ModuleController.php";

if (isset($_GET['class_id']) && isset($_GET['id'])) {
    $id       = abs($_GET['id']);
    $class_id = abs($_GET['class_id']);
    $module   = new ModuleController();
    $data     = $module->getById($id);
}

?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <form method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xl-12 col-md-9">
                    <div class="row">
                        <div class="col-xl-7 col-lg-7 col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Materi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Judul Materi <span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" class="form-control solid" placeholder="Instalasi composer dan komponen lainnya" name="title" value="<?= $data['title'] ?>">
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Deskripsi Materi <span class="text-danger">*</span></label>
                                        <textarea placeholder="Pada materi ini kita akan belajar untuk melakukan instalasi laravel melalui package composer" autocomplete="off" name="description" rows="5" class="form-control solid"><?= $data['description'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-w600">Konten Materi <span class="text-danger">*</span></label>
                                        <textarea id="ckeditor1" autocomplete="off" name="content" rows="5" class="form-control solid"><?= $data['content'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="card h-auto">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Materi</h4>
                                </div>
                                <div class="card-body">
                                    <div class="loadmore-content" id="uploadItemContent">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group mb-3 pb-3">
                                                    <img class="mb-3" style="width: 100%;" src="<?= $uriHelper->assetUrl('images/module_thumbnails/' . $data['thumbnail']) ?>" alt="<?= $data['title'] ?>" />
                                                    <label class="font-w600">Thumbnail Materi <span class="text-danger">*</span></label>
                                                    <input type="file" name="thumbnail" class="form-control solid" accept="image/*"></input>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary light btn-block rounded">Update Materi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </form>
</div>
</div>
<script src="<?= $uriHelper->assetUrl('js/ckeditor/ckeditor.js') ?>"></script>
<script>
    CKEDITOR.replace('ckeditor1');
</script>
<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $module = new ModuleController();
    $module->update($id);
}
?>