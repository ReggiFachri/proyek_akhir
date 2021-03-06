<?= $this->include('partials/main') ?>

<head>

    <?= $title ?>

    <!-- Plugins css -->
    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.css">
    <link rel="stylesheet" href="/assets/libs/dropify/css/dropify.min.css">

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

                <?= $title ?>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title"><?= $title; ?></h4>

                                <form action="/Pengaduan_online/update/<?= $pengaduan['idPengaduan']; ?>" method="POST" enctype="multipart/form-data">

                                    <div class="my-3">
                                        <label for="kategori">Kategori</label>
                                        <select name="kategori" class="form-select" aria-label="Default select example">
                                            <?php foreach ($kategori as $a) : ?>
                                                <option value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="judul">Judul</label>
                                        <div>
                                            <input class="form-control" required minlength="5" type="text" name="judul" placeholder="Masukkan judul" value="<?= (old('judul')) ? old('judul') : $pengaduan['Judul'] ?>">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="isi">Isi</label>
                                        <textarea name="isi" class="form-control" required minlength="5" rows="3" placeholder="Masukkan Isi"><?= (old('Isi')) ? old('Isi') : $pengaduan['Isi'] ?></textarea>
                                        <input type="hidden" name="idCustomer" value="<?= session('idCustomer'); ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="lampiran">Lampiran</label>: <a href="/lampiran/<?= $pengaduan['Lampiran'] ?>">Lampiran</a>
                                        <input type="file" name="lampiran" class="dropify" />
                                    </div>

                                    <div class="mb-3 text-end">
                                        <button type="reset" class="btn btn-danger me-3">Reset</button>
                                        <button type="submit" class="btn btn-primary" name="input_PO">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
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

<!-- Plugins js -->
<!-- validation -->
<script src="/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="/assets/js/pages/form-validation.init.js"></script>
<!-- drag n drop file -->
<script src="/assets/libs/dropify/js/dropify.js"></script>
<script src="/assets/libs/dropify/js/dropify.min.js"></script>
<script src="/assets/js/custom-dropify.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>