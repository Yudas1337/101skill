<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../app/controllers/CategoryController.php";
$main      = new CategoryController();
$classroom = new ClassroomController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">
    <div class="listcontent-area" style="padding: 60px">
        <div class="row">
            <div class="col-md-12" style="height: 60vh">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="position:static">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" style="position:static; height: 60vh">
                        <div class="carousel-item active" style="position:static">
                            <img src="<?= $uriHelper->assetUrl('images/slider/slider_1.png') ?>" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Slide satu</h5>
                            </div>
                        </div>
                        <div class="carousel-item" style="position:static">
                            <img src="<?= $uriHelper->assetUrl('images/slider/slider_2.png') ?>" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Slide dua</h5>
                            </div>
                        </div>
                        <div class="carousel-item" style="position:static">
                            <img src="<?= $uriHelper->assetUrl('images/slider/slider_3.png') ?>" class="d-block w-100">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Slide tiga</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h3 class="title mb-4">Kategori</h3>
        </div>


        <div class="col-md-12">
            <div class="row">
                <?php foreach ($main->getAll() as $categories) : ?>
                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                        <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=category&id=' . $categories->id) ?>">
                            <div class="card item-card">
                                <div class="card-body">
                                    <img src="<?= $uriHelper->assetUrl('images/categories/' . $categories->icon) ?>" class="img-fluid" alt="">
                                    <div class="info">
                                        <h5 class="name"><?= $categories->name ?></h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h3 class="title mb-4">Kelas Favorit</h3>
        </div>

        <div class="col-md-12">
            <div class="row">
                <!-- ini foreach-->
                <?php foreach ($classroom->getFavoriteClassroom() as $favorite) : ?>
                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                        <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detailCourse&slug=' . $favorite->slug . "&id=" . $favorite->id) ?>">
                            <div class="card item-card">
                                <div class="card-body">
                                    <img src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $favorite->thumbnail) ?>" class="img-fluid" alt="">
                                    <div class="info">
                                        <h5 class="name"><?= $favorite->title ?></h5>
                                        <h6 class="mb-0 price"><?= substr($favorite->description, 0, 50) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
                <!-- endforeach -->
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h3 class="title mb-4">Kelas Terbaru</h3>
        </div>

        <div class="col-md-12">
            <div class="row">
                <?php foreach ($classroom->getLatestClassroom() as $latest) : ?>
                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                        <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detailCourse&slug=' . $latest->slug . "&id=" . $latest->id) ?>">
                            <div class="card item-card">
                                <div class="card-body">
                                    <img src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $latest->thumbnail) ?>" class="img-fluid" alt="">
                                    <div class="info">
                                        <h5 class="name"><?= $latest->title ?></h5>
                                        <h6 class="mb-0 price"><?= substr($latest->description, 0, 50) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!--**********************************
            Content body end
        ***********************************-->

    <?php
    require_once __DIR__ . "/../../layouts/main/footer.php";
    ?>