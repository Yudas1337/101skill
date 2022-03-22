<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
// require_once __DIR__ . "/../../../controllers/ProductController.php";
require_once __DIR__ . "/../../../app/controllers/CategoryController.php";
$main = new CategoryController();
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
        <br><br>
        <div class="container shadow p-3 mb-5 bg-white rounded">
        <div class="row justify-content-center">
            <div class="col-4">
            <img width="150" height="150" src="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
            <h2>100+ Materi</h2>
            </div>
            <div class="col-4">
            <img width="150" height="150" src="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
            <h2>100+ Materi</h2>
            </div>
            <div class="col-4">
            <img width="150" height="150" src="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
            <h2>100+ Materi</h2>
            </div>
        </div>
        </div>
        <div class="shadow-sm bg-white rounded" style="width: 200px; height: 50px;">
        <h3>Category</h3>
        

        <div class="col-md-12">
            <div class="row">
                <?php foreach ($main->getAlli() as $categories) : ?>
                    <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                        <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=category&id=' . $categories->id) ?>">
                            <div class="card item-card">
                                <div class="card-body">
                                    <img src="<?= $uriHelper->baseUrl('assets/images/categories/' . $categories->icon) ?>" class="img-fluid" alt="">
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
            <h3 class="title mb-4">Top Products</h3>
        </div>

        <div class="col-md-12">
            <div class="row">
                <!-- ini foreach-->
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">IPA</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/IPS.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">IPS</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/Math.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">Math</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/OR.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">Sport</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- endforeach -->
            </div>
        </div>

        <div class="col-md-12 mt-5">
            <h3 class="title mb-4">New Products</h3>
        </div>

        <div class="col-md-12">
            <div class="row">

            <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">IPA</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/IPS.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">IPS</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/Math.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">Math</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                    <a href="<?= $uriHelper->baseUrl('assets/images/ipa.jpg') ?>">
                        <div class="card item-card">
                            <div class="card-body">
                                <img src="<?= $uriHelper->baseUrl('assets/images/OR.jpg') ?>" class="img-fluid" alt="">
                                <div class="info">
                                    <h5 class="name"><? ?></h5>
                                    <h6 class="mb-0 price">Sport</h6>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>


            </div>
        </div>
    </div>

</div>

<!--**********************************
            Content body end
        ***********************************-->

<?php
require_once __DIR__ . "/../../layouts/main/footer.php";
?>