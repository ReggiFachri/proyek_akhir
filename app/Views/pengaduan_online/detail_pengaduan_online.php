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
                                            <?= $customer['Nama']; ?><br>
                                            <?= $customer['NIK']; ?><br>
                                            <?= $customer['Email']; ?><br>
                                        </address>
                                    </div>
                                    <div class="col-6">
                                        <?php //getNamaKategori
                                        $k = '';
                                        foreach ($kategori as $a) {
                                            if ($pengaduan['idKategori'] == $a['idKategori']) {
                                                $k = $a['namaKategori'];
                                            }
                                        }
                                        ?>
                                        <address>
                                            <strong>Kode Tiket P-<?= $pengaduan['idPengaduan']; ?></strong><br>
                                            <?= $k; ?><br>
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

                <?php elseif ($pengaduan['Status'] == 'Sedang diproses') : ?>
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
                                            sudah mulai diproses sejak tgl sekian
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