<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../app/controllers/CartController.php";
require_once __DIR__ . "/../../../app/controllers/BenefitController.php";
require_once __DIR__ . "/../../../app/controllers/ModuleController.php";



if (isset($_GET['id'])) {
    $id             = trim(abs($_GET['id']));
    $main           = new ClassroomController();
    $product        = $main->getPublicById($id);
    $benefit        = new BenefitController();
    $courseBenefit  = $benefit->getById($id);

    $module         = new ModuleController();
    $allModule      = $module->getByClassroomId($id);

    $isPurchased = (isset($_SESSION['user_id']) ? $main->isPurchasedClassroom($id, $_SESSION['user_id']) : 0);
} else {
    exit;
}

?>

<!--**********************************
Content body start
***********************************-->
<div class="content-body" style="margin-left: 0">
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="<?= $uriHelper->baseUrl('index.php?page=main&content=course') ?>">Kelas</a></li>
                <li class="breadcrumb-item"><a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&slug=' . $product["slug"] . '&id=' . $id) ?>"><?= $product['title'] ?></a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $product['thumbnail']) ?>">
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <form method="POST">
                                            <h2><?= $product['title'] ?></h2>
                                            <p><span class="badge badge-success"><?= $product['category_name'] ?></span></p>
                                            <p class="text-content"><span class="font-weight-bold">Deskripsi Kelas :</span> <br><?= $product['description'] ?></p>
                                            <p class="text-content">
                                                <span class="font-weight-bold">Benefit yang didapatkan :</span> <br>
                                            <ul>
                                                <?php $i = 1;
                                                foreach ($courseBenefit as $list) : ?>
                                                    <li>
                                                        <p><a id="id-benefit" data-benefit="Mendapatkan ilmu yang bermanfaat"><?= $i . " " . $list->name ?></a></p>
                                                    </li>
                                                <?php $i++;
                                                endforeach; ?>
                                            </ul>
                                            </p>
                                            <?php if ($isPurchased == 0) : ?>
                                                <div class="d-flex align-items-end flex-wrap mt-4">
                                                    <div class="shopping-cart  mb-2 me-3">
                                                        <button type="submit" name="submit" class="btn btn-danger light"><i class="fa fa-shopping-basket me-2"></i> Tambahkan ke keranjang</button>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-5">
                <h3 class="title mb-4">Materi Kelas</h3>
            </div>
            <div class="col-lg-12">
                <?php if ($isPurchased > 0 || isset($_SESSION['user_id']) && $_SESSION['role'] == 'admin') : ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-sm mb-0">
                                    <thead>
                                        <tr>
                                            <th class="align-middle">NO</th>
                                            <th class="align-middle text-center">Thumbnail</th>
                                            <th class="align-middle text-center">Judul</th>
                                            <th class="align-middle text-center">Deskripsi</th>
                                            <th class="align-middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="orders">
                                        <?php $i = 1;
                                        foreach ($allModule as $module) : ?>
                                            <tr class="btn-reveal-trigger">
                                                <td><?= $i ?></td>
                                                <td class="text-center">
                                                    <img width="250" height="150" src="<?= $uriHelper->assetUrl('images/module_thumbnails/' . $module->thumbnail) ?>"><br><br>
                                                    <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $data['id']) ?>">
                                                    </a>
                                                </td>
                                                <td class="text-center"><strong><?= $module->title ?> </strong></td>
                                                <td class="text-center"><?= substr($module->description, 0, 100)  ?></td>
                                                <td>
                                                    <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=module&slug=' . $module->slug . '&id=' . $module->id) ?>" class="btn btn-success btn-sm light"><i class="fa fa-eye"></i> Lihat Materi</a>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        endforeach; ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="col-md-12 mt-5">
                        <h3 class="title mb-4">Anda harus membeli kelas ini terlebih dahulu</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!--**********************************
Content body end
***********************************-->
<?php
require_once __DIR__ . "/../../layouts/main/footer.php";

if (isset($_POST['submit'])) {
    $cart = new CartController();
    $cart->add($id);
}
?>