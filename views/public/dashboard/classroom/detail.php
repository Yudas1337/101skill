<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/ClassroomController.php";
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";
require_once __DIR__ . "/../../../../app/controllers/BenefitController.php";
require_once __DIR__ . "/../../../../app/controllers/ModuleController.php";


if (isset($_GET['id'])) {
    $product = new ClassroomController();
    $id = trim(abs($_GET['id']));
    $data = $product->getById($id);

    $benefit        = new BenefitController();
    $getBenefit     = $benefit->getById($id);

    $module         = new ModuleController();
    $getModule      = $module->getByClassroomId($id);
}

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
                        <h4 class="card-title">Detail Kelas</h4>
                        <a href="#" class="btn btn-primary light btn-md" data-toggle="modal" data-target="#benefitsModal" data-backdrop="static"><i class="fa fa-plus-circle"></i> Tambah Benefit Kelas</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade show active" id="first">
                                        <img class="img-fluid" src="<?= $uriHelper->assetUrl('images/classroom_thumbnails/' . $data['thumbnail']) ?>" alt="<?= $data['title'] ?>">
                                    </div>
                                </div>
                            </div>
                            <!--Tab slider End-->
                            <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                <div class="product-detail-content">
                                    <!--Product details-->
                                    <div class="new-arrival-content pr">
                                        <h4><?= $data['title'] ?></h4>
                                        <div class="d-table mb-2">
                                            <p class="price float-start d-block"><?= $data['category_name'] ?></p>
                                        </div>
                                        <p>Status kelas: <span class="item">
                                                <?php if (isset($data['is_visible']) && $data['is_visible'] == 1) : ?>
                                                    <span class="badge badge-success light">Dipublikasi</span>
                                                <?php else : ?>
                                                    <span class="badge badge-danger light">Belum dipublikasi</span>
                                                <?php endif; ?>
                                            </span>
                                        </p>
                                        <p class="text-content"><span class="font-weight-bold">Deskripsi Kelas :</span> <br><?= $data['description'] ?></p>

                                        <p class="text-content"><span class="font-weight-bold">Apa yang didapatkan? :</span>
                                        <ul>
                                            <?php
                                            $no = 1;
                                            foreach ($getBenefit as $listBenefit) : ?>
                                                <li>
                                                    <p><a id="id-benefit" data-benefit="<?= $listBenefit->name ?>"><?= $no . ". " . $listBenefit->name ?></a></p>
                                                </li>
                                            <?php $no++;
                                            endforeach; ?>
                                        </ul>
                                        </p>

                                        <div class="d-flex align-items-end flex-wrap mt-4">

                                            <div class="shopping-cart  mb-2 me-3">
                                                <a class="btn btn-warning light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=classroom&menu=edit&id=' . $data['id']) ?>"><i class="fa fa-edit me-2"></i>
                                                    Edit Kelas</a>
                                                <a onclick="return confirm('Apa anda yakin ingin menghapus data?')" class="btn btn-danger light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=classroom&menu=delete&id=' . $data['id']) ?>"><i class="fa fa-trash me-2"></i>
                                                    Hapus Kelas</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Materi</h4>
                        <a href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=module&menu=add&class_id=' . $data['id']) ?>" class="btn btn-primary light btn-md"><i class="fa fa-plus-circle"></i> Tambah Materi Kelas</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Deskripsi</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($getModule as $list) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $list->title; ?></td>
                                            <td><?= $list->description ?></td>
                                            <td><img style="width: 100%;" src="<?= $uriHelper->baseUrl('assets/images/module_thumbnails/' . $list->thumbnail) ?>" alt="<?= $list->title; ?>"></td>
                                            <td>
                                                <a style="width: 100%;" class="badge badge-success light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=module&menu=edit&class_id=' . $data['id'] . "&id=" . $list->id) ?>"><i class="fa fa-edit me-2"></i>
                                                    Edit</a>
                                                <a style="width: 100%;" class="hapusProduk badge badge-danger mt-3 light" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=module&menu=delete&class_id=' . $data['id'] . "&id=" . $list->id) ?>"><i class="fa fa-trash me-2"></i>
                                                    Hapus</a>
                                            </td>

                                        </tr>
                                    <?php $i++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="benefitsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Benefit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST">
                            <div class="form-group mb-3 pb-3" hidden>
                                <label class="font-w600">ID Kelas<span class="text-danger">*</span></label>
                                <input readonly autocomplete="off" type="text" class="form-control solid" name="class_id" value="<?= $data['id'] ?>">
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <label class="font-w600">Nama Kelas<span class="text-danger">*</span></label>
                                <input readonly autocomplete="off" type="text" class="form-control solid" name="class_name" value="<?= $data['title'] ?>">
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <label class="font-w600">Benefit<span class="text-danger">*</span></label>
                                <input autocomplete="off" type="text" class="form-control solid" placeholder="Mendapatkan ilmu yang bermanfaat" name="name">
                            </div>
                            <div class="form-group mb-3 pb-3">
                                <button name="submit" type="submit" class="btn btn-danger">Tambah Data</button>
                            </div>

                        </form>
                        <div class="form-group mb-3 pb-3">
                            <label class="font-w600">Benefit yang terdaftar<span class="text-danger">*</span></label>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Benefit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($getBenefit as $list) : ?>
                                        <form method="POST">
                                            <tr>
                                                <td hidden><input readonly autocomplete="off" type="text" class="form-control solid" name="class_id" value="<?= $data['id'] ?>"></td>
                                                <td hidden><input readonly name="id_benefit" type="number" class="form-control" value="<?= $list->id ?>"></td>
                                                <td><input autocomplete="off" name="name" type="text" class="form-control" value="<?= $list->name; ?>"></td>
                                                <td>
                                                    <button type="submit" name="updateBenefit" class="badge badge-success">Update</button>
                                                    <a onclick="return confirm('Apa anda yakin ingin menghapus data?')" href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=benefit&menu=delete&id=' . $list->id . '&class_id=' . $data['id']) ?>" class="badge badge-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";

if (isset($_POST['submit'])) {
    $benefit->save();
}

if (isset($_POST['updateBenefit'])) {
    $id_benefit = $_POST['id_benefit'];
    $benefit->update($id_benefit);
}
?>