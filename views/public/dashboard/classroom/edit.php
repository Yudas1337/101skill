<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";

if (isset($_GET['id'])) {
    $id = trim(abs($_GET['id']));
    $product = new ClassroomController();
    $data = $product->getById($id);
    $category = new CategoryController();
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
                                    <h4 class="card-title">Detail Kelas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Judul Kelas <span class="text-danger">*</span></label>
                                        <input autocomplete="off" type="text" class="form-control solid" placeholder="Tutorial Laravel untuk Pemula" name="title" value="<?= $data['title'] ?>">
                                    </div>
                                    <div class="form-group mb-3 pb-3">
                                        <label class="font-w600">Kategori Kelas <span class="text-danger">*</span></label>
                                        <select required name="category_id" id="category-select" class="form-control" aria-hidden="true">
                                            <?php foreach ($category->getAll() as $list) : ?>
                                                <option value="<?= $list->id ?>" <?= $list->id == $data['category_id'] ? 'selected' : ''  ?>><?= $list->name ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-w600">Deskripsi Kelas <span class="text-danger">*</span></label>
                                        <textarea placeholder="Kelas laravel untuk pemula secara gratis dengan modul lengkap" autocomplete="off" name="description" rows="5" class="form-control solid"><?= $data['description'] ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-6">
                            <div class="card h-auto">
                                <div class="card-header">
                                    <h4 class="card-title">Detail Kelas</h4>
                                </div>
                                <div class="card-body">
                                    <div class="loadmore-content" id="uploadItemContent">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group mb-3 pb-3">
                                                    <img style="width: 100%;" src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $data['thumbnail']) ?>" alt="<?= $data['title'] ?>" />
                                                </div>
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Thumbnail Kelas <span class="text-danger">*</span></label>
                                                    <input type="file" name="thumbnail" class="form-control solid" accept="image/*"></input>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <div class="form-group mb-3 pb-3">
                                                    <label class="font-w600">Status Kelas <span class=text-danger>*</span></label>
                                                    <select required name="is_visible" id="category-select" class="form-control" aria-hidden="true">
                                                        <option value="1" <?= $data['is_visible'] == 1 ? 'selected' : '' ?>>Publish Kelas</option>
                                                        <option value="0" <?= $data['is_visible'] == 0 ? 'selected' : '' ?>>Simpan Kelas</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="card-footer">
                                                <button type="submit" name="submit" class="btn btn-primary light btn-block rounded">Update Kelas</button>
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

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $classroom = new ClassroomController();
    $classroom->update($id);
}
?>