<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/CustomerController.php";
$customer = new CustomerController();
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
                        <h4 class="card-title">List Pengguna</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th style="width: 100%;">Nama</th>
                                        <th>Email</th>
                                        <th>Telepon</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($customer->getAll() as $list) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><img height="50" width="50" src="<?= $uriHelper->baseUrl('assets/images/profile/' . $list->photo) ?>" alt="<?= $list->name; ?>"> <?= $list->name ?></td>
                                            <td><?= $list->email; ?></td>
                                            <td><?= $list->phone_number ?></td>
                                            <td><?= $list->address ?></td>

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