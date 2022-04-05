<?php
require_once __DIR__ . "/../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";
$classroom = new ClassroomController();
$getProduct = $classroom->getMyClassroom();
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
                        <h4 class="card-title">Kelas Saya</h4>
                    </div>
                </div>
            </div>
            <?php if (count($getProduct) > 0) : ?>
                <?php foreach ($getProduct as $product) : ?>
                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                        <a target="_blank" href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $product->id) ?>">
                            <div class="card item-card">
                                <div class="card-body p-0">
                                    <img src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $product->thumbnail) ?>" class="img-fluid" alt="">
                                    <div class="info">
                                        <h5 class="name"><?= $product->title ?></h5>
                                        <h6 class="mb-0 price"><?= substr($product->description, 0, 50) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            <?php else : ?>
                <h3>Anda Belum punya kelas.</h3>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../layouts/dashboard/footer.php";
?>