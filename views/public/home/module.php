<?php
require_once __DIR__ . "/../../layouts/main/navbar.php";
require_once __DIR__ . "/../../../app/controllers/ModuleController.php";
require_once __DIR__ . "/../../../app/controllers/ClassroomController.php";



if (isset($_GET['id'])) {
    $id             = trim(abs($_GET['id']));
    $module         = new ModuleController();
    $getModule      = $module->getById($id);
    $main           = new ClassroomController();

    $category = $main->getPublicById($getModule['classrooms_id']);

    $isPurchased = (isset($_SESSION['user_id']) ? $main->isPurchasedClassroom($id, $_SESSION['user_id']) : 0);

    if ($isPurchased > 0 || $_SESSION['role'] == 'admin') {
    } else {
        echo 'Anda belum membeli kelas ini';
        exit;
    }
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
                <li class="breadcrumb-item"><a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&slug=' . $getModule["classrooms_slug"] . '&id=' . $id) ?>"><?= $getModule['classrooms_title'] ?></a></li>
                <li class="breadcrumb-item"><a href="<?= $uriHelper->baseUrl('index.php?page=main&content=module&slug=' . $getModule["slug"] . '&id=' . $id) ?>"><?= $getModule['title'] ?></a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="post-details">
                            <h3 class="mb-2 text-black"><?= $getModule['title'] ?></h3>
                            <ul class="mb-4 post-meta d-flex flex-wrap">
                                <li class="post-date me-3"><i class="far fa-calendar-plus me-2"></i>Dibuat pada tanggal : <?= $getModule['created_at'] ?></li>
                            </ul>
                            <img src="<?= $uriHelper->assetUrl('images/module_thumbnails/' . $getModule['thumbnail']) ?>" alt="" class="mx-auto d-block img-fluid mb-3 rounded">
                            <div class="profile-skills mt-5 mb-5">
                                <h4 class="text-primary mb-2">Kategori Materi</h4>
                                <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=course&filter=' . $category['category_id']) ?>" class="btn btn-primary light btn-xs mb-1"><?= $category['category_name'] ?></a>
                            </div>
                            <p>
                            <h6 class="mb-0 price">Deskripsi Materi: <br></h6>
                            <?= $getModule['description'] ?>
                            </p>
                            <p class="mt-5"><?= $getModule['content'] ?></p>
                        </div>
                    </div>
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