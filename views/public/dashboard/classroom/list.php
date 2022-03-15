<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";
$classroom = new ClassroomController();
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
                        <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=product&menu=add") ?>" class="btn btn-primary light btn-md"><i class="fa fa-plus-circle"></i> Tambah Produk</a>
                    </div>
                </div>
            </div>
            <?php foreach ($classroom->getAll() as $list) : ?>
                <div class="col-xl-3 col-lg-6 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=product&menu=detail&id=' . $list->id) ?>">
                        <div class="card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="<?= $uriHelper->baseUrl('assets/images/product/' . $list->thumbnail) ?>" alt="<?= $list->name ?>">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><?= $list->name ?></h4>
                                        <span class="price"><?= formHelper::rupiah($list->price) ?></span>
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