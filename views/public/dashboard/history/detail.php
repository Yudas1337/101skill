<?php
require_once __DIR__ . "/../../../layouts/dashboard/sidebar.php";
require_once __DIR__ . "/../../../../app/controllers/InvoiceController.php";
$invoice = new InvoiceController();

$idInvoice = trim($_GET['id']);
$inv = $invoice->getById($idInvoice);
$detail = $invoice->getDetailOrder($idInvoice);

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
                        Kode Unik Klaim : <?= $inv->invoice_id ?>
                        <span class="float-right badge badge-success">
                            <strong>Status:</strong> Klaim Berhasil</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th class="center">NO</th>
                                        <th>Judul Kelas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($detail as $cart) : ?>
                                        <tr>
                                            <td class="center"><?= $i; ?></td>
                                            <td class="left"><?= $cart->title ?></td>
                                            <td class="center">
                                                <a href="<?= $uriHelper->baseUrl('index.php?page=main&content=detail&id=' . $cart->id) ?>" class="badge badge-primary">Lihat Kelas</a>
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