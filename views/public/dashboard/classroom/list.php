<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";
$classroom = new ClassroomController();
$category = new CategoryController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Kelas</h4>
                        <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=classroom&menu=add") ?>" class="btn btn-primary light btn-md"><i class="fa fa-plus-circle"></i> Tambah Kelas</a>
                    </div>
                </div>
            </div>
            <?php foreach ($classroom->getAll() as $list) :
                $status = $list->is_visible;
            ?>
                <div class="col-xl-4 col-lg-6 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=classroom&menu=detail&id=' . $list->id) ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img style="width: 100%;" class="img-fluid" src="<?= $uriHelper->baseUrl('assets/images/classroom_thumbnails/' . $list->thumbnail) ?>" alt="<?= $list->title ?>">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?= $list->title ?></h4>
                                        <span class="badge <?= ($status == 1 ? 'badge-success' : 'badge-danger') ?>"><?= ($status == 1 ? 'Telah dipublikasi' : 'Belum dipublikasi') ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>