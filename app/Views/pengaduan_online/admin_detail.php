<?= $this->include('partials/main') ?>

<head>

    <?= $title ?>

    <?= $this->include('partials/head-css') ?>

</head>


<?= $this->include('partials/body') ?>

<div class="container-fluid">
    <!-- Begin page -->
    <div id="layout-wrapper">

        <?= $this->include('partials/menu') ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="invoice-title">
                                    <h3><?= $title ?></h3>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-6">
                                        <address>
                                            <strong>Identitas pengaju</strong><br>
                                            John Smith<br>
                                            1234 Main<br>
                                            Apt. 4B<br>
                                            Springfield, ST 54321
                                        </address>
                                    </div>
                                    <div class="col-6">
                                        <address>
                                            <strong>Kode Tiket P-<?= $pengaduan['idPengaduan']; ?></strong><br>
                                            <?= $pengaduan['Kategori']; ?><br>
                                            <?= $pengaduan['Judul']; ?><br>
                                            <?= $pengaduan['Isi']; ?><br>
                                            Lampiran : <a href="/lampiran/<?= $pengaduan['Lampiran']; ?>">Lampiran</a><br>
                                            <?= $pengaduan['Status']; ?>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">

                                    </div>
                                    <div class="col-6 mt-3">
                                        <address>
                                            <strong>Tanggal Masuk</strong><br>
                                            <?= $pengaduan['created_at']; ?><br><br>
                                        </address>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 mt-3">
                                        <?php if ($pengaduan['Status'] == 'Belum diproses') : ?>
                                            <a href="/admin/proses/<?= $pengaduan['idPengaduan']; ?>" class="btn btn-primary btn-sm w-xs"> Mulai Proses</a>
                                        <?php elseif ($pengaduan['Status'] == 'Sedang diproses') : ?>
                                            <a href="/admin/tanggapan/<?= $pengaduan['idPengaduan']; ?>" class="btn btn-info btn-sm w-xs">Tanggapan</a>
                                        <?php endif ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                <?php if ($pengaduan['Status'] == 'Selesai diproses') : ?>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="invoice-title">
                                        <h4 class="float-end font-size-16"><?= $pengaduan['Judul']; ?></h4>
                                        <div class="mb-4">
                                            <h5>Tanggapan</h1>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6">
                                            <address>
                                                dibalas oleh<br>
                                                balasan<br>
                                                lampiran
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif ?>

            </div>
            <!-- End Page-content -->

            <?= $this->include('partials/footer') ?>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

</div>
<!-- end container-fluid -->

<?= $this->include('partials/right-sidebar') ?>

<!-- JAVASCRIPT -->
<?= $this->include('partials/vendor-scripts') ?>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>