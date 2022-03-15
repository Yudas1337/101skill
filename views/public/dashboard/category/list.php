<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/CategoryController.php";
$category = new CategoryController();
?>

<!--**********************************
            Content body start
        ***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">List Kategori</h4>
                        <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=add") ?>" class="btn btn-primary light btn-md"><i class="fa fa-plus-circle"></i> Tambah Kategori</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Icon</th>
                                        <th>Nama Kategori</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($category->getAll() as $list) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><img height="100" width="100" src="<?= $uriHelper->baseUrl('assets/images/categories/' . $list->icon) ?>" alt="<?= $list->name; ?>"></td>
                                            <td><?= $list->name ?></td>
                                            <td>
                                                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=edit&id=" . $list->id) ?>" class="badge badge-warning"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= $uriHelper->baseUrl("index.php?page=dashboard&content=category&menu=delete&id=" . $list->id) ?>" class="badge badge-danger hapus"><i class="fa fa-trash"></i> Hapus</a>
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

<?php
require_once __DIR__ . "/../../../layouts/dashboard/footer.php";
?>