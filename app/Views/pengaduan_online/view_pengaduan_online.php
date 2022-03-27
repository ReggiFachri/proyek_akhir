<?= $this->include('partials/main') ?>

<head>

    <?= $title; ?>

    <!-- DataTables -->
    <link href="/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <?= $this->include("partials/head-css"); ?>

</head>

<?= $this->include("partials/body"); ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?= $this->include("partials/menu"); ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?= $title; ?></h4>
                                <?php if (session()->getFlashdata('pesan')) : ?>
                                    <div class="alert alert-success" role="alert"><?= session()->getFlashdata('pesan'); ?></div>
                                <?php endif; ?>

                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Tanggal</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php foreach ($pengaduan->getResult() as $a) : ?>
                                            <?php //getNamaKategori
                                            $k = '';
                                            foreach ($kategori as $b) {
                                                if ($a->idKategori == $b['idKategori']) {
                                                    $k = $b['namaKategori'];
                                                }
                                            }
                                            ?>
                                            <tr>
                                                <td><?= $a->Judul; ?></td>
                                                <td><?= $k; ?></td>
                                                <td><?= $a->created_at; ?></td>
                                                <td><?= $a->Status; ?></td>
                                                <td>
                                                    <a href="/Pengaduan_online/detail/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Detail</a>
                                                    <?php if ($a->Status == 'Belum diproses') : ?>
                                                        <a href="/Pengaduan_online/edit/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                        <a href="/Pengaduan_online/cancel/<?= $a->idPengaduan; ?>" class="btn btn-warning btn-sm w-xs">Batalkan</a>
                                                    <?php elseif ($a->Status == 'Dibatalkan') : ?>
                                                        <a href="/Pengaduan_online/edit/<?= $a->idPengaduan; ?>" class="btn btn-primary btn-sm w-xs">Ubah</a>
                                                        <a href="/Pengaduan_online/delete/<?= $a->idPengaduan; ?>" class="btn btn-danger btn-sm w-xs">Hapus</a>
                                                    <?php elseif ($a->Status == 'Selesai diproses') : ?>
                                                        <a href="/Pengaduan_online/rating/<?= $a->idPengaduan; ?>" class="btn btn-success btn-sm w-xs">Rating</a>
                                                        <a href="/Pengaduan_online/tanggapan/<?= $a->idPengaduan; ?>" class="btn btn-success btn-sm w-xs">Tanggapan</a>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?= $this->include("partials/footer"); ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include("partials/right-sidebar"); ?>
<?= $this->include("partials/vendor-scripts"); ?>

<!-- Required datatable js -->
<script src="/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="/assets/libs/jszip/jszip.min.js"></script>
<script src="/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<script src="/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="/assets/libs/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Responsive examples -->
<script src="/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="/assets/js/pages/datatables.init.js"></script>

<script src="/assets/js/app.js"></script>

</body>

</html>