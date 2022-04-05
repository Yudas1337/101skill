<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/InvoiceController.php";
$invoice = new InvoiceController();
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
                        <h4 class="card-title">List History Klaim</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Id Invoice</th>
                                        <th>Tanggal Klaim</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($invoice->getInvoice() as $inv) : ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $inv->invoice_id ?></td>
                                            <td><?= $inv->created_at ?></td>
                                            <td>
                                                <a href="<?= $uriHelper->baseUrl('index.php?page=dashboard&content=myhistory&menu=detail&id=' . $inv->invoice_id) ?>" class="btn btn-info light btn-sm">Detail klaim</a>
                                            </td>
                                        </tr>
                                    <?php $no++;
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