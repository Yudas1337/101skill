<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../app/controllers/SearchController.php";
require_once __DIR__ . "/../../../app/controllers/CategoryController.php";
$main           = new ClassroomController();
$getCategory    = new CategoryController();

$getProduct = $main->getAll();

if (isset($_POST['search'])) {
    $searchController = new SearchController();
    $getProduct = $searchController->search($_POST['search']);
}

if (isset($_GET['filter'])) {
    $searchController = new SearchController();
    $getProduct = $searchController->filter($_GET['filter']);
}
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?= $uriHelper->assetUrl('images/cart.png') ?>" class="img-fluid mb-5" width="50%">
                        <h3 class="title mb-4">Pesanan anda akan ada di keranjang</h3>
                        <p>Setelah anda klik tambahkan, kelas akan tampil di dalam keranjang dan siap untuk checkout.</p>
                        <a href="<?= $uriHelper->baseUrl("index.php?page=main&content=cart") ?>" class="btn btn-warning light btn-rounded">Cek Keranjang</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="owl-carousel item-carousel">
                    <?php foreach ($getCategory->getAll() as $category) : ?>
                        <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=course&filter=' . $category->id) ?>">
                            <div class="items ">
                                <div class="item-box <?= (isset($_GET['filter']) && $_GET['filter'] == $category->id ? 'active' : '') ?>">
                                    <img src="<?= $uriHelper->assetUrl('images/categories/' . $category->icon) ?>" alt="">
                                    <h5 class="title mb-0"><?= $category->name ?></h5>
                                </div>
                            </div>
                        </a>
                    <?php endforeach ?>
                </div>
                <form action="<?= $uriHelper->baseUrl('index.php?page=main&content=course') ?>" method="POST" class="input-group search-area style-1 mb-4">
                    <input autocomplete="off" type="text" name="search" class="form-control" value="<?= (isset($_POST['search']) ? $_POST['search'] : '') ?>" placeholder="Search here...">
                    <div class="input-group-append">
                        <button class=" btn btn-primary btn-rounded">Search</button>
                    </div>
                </form>
                <div class="row">
                    <?php foreach ($getProduct as $product) : ?>

                        <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
                            <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $product->id) ?>">
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
                </div>
            </div>
        </div>
    </div>
    <!-- row -->

</div>
<!--**********************************
            Content body end
        ***********************************-->

<?php
require_once __DIR__ . "/../../layouts/main/footer.php";
?>