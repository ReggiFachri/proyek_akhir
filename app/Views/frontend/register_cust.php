<?= $this->extend('frontend/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid p-0">
	<div class="row no-gutters row-height">
		<div class="col-lg-6 background-image" data-background="url(/login_regis/img/main_bg_2.jpg)">
			<div class="content-left-wrapper opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.6)">
				<a href="/" id="logo"><img src="/login_regis/img/logo.svg" alt="" width="46" height="40"></a>
				<div id="social">
					<ul>
						<li><a href="#0"><i class="social_facebook"></i></a></li>
						<li><a href="#0"><i class="social_twitter"></i></a></li>
						<li><a href="#0"><i class="social_instagram"></i></a></li>
					</ul>
				</div>
				<!-- /social -->
				<div>
					<h1>Registrasi APT Bersama</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Home</button></a>
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto position-relative">
						<h4 class="mb-3">Registrasi</h4>

						<?= session()->get('pesan'); ?>

						<form class="input_style_1" method="post" action="AuthCust/register" id="regis_cust">

							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" name="nama" id="nama" class="form-control " required>
							</div>
							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="number" name="nik" id="nik" class="form-control <?= ($validation->hasError('nik')) ?>" required>
							</div>
							<div class="form-group">
								<label for="email">Email </label>
								<input type="email" name="email" id="email" class="form-control <?= ($validation->hasError('email')) ?>" required>
							</div>
							<div class="form-group">
								<label for="pekerjaan">Pekerjaan</label>
								<input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control" required>
							</div>
							<!-- <div class="form-group">
								<label for="password2">Confirm Password</label>
								<input type="password" name="password2" id="password2" class="form-control">
							</div> -->
							<div id="pass-info" class="clearfix"></div>

							<?php
							if ($validation->hasError('nik') && $validation->hasError('email')) {
							?>
								<div class="alert alert-danger" role="alert">
									<?= $validation->getError('nik'); ?><br>
									<?= $validation->getError('email'); ?>

								</div>
							<?php
							} elseif ($validation->hasError('email')) {
							?>
								<div class="alert alert-danger" role="alert">
									<?= $validation->getError('email'); ?>
								</div>
							<?php
							} elseif ($validation->hasError('nik')) {
							?>
								<div class="alert alert-danger" role="alert">
									<?= $validation->getError('nik'); ?>
								</div>
							<?php
							}
							?>
							<button type=" submit" class="btn_1 full-width" id="submit">Daftar</button>

						</form>
						<p class="text-center mt-3 mb-0">Sudah punya akun? <a href="/login_cust">Login</a></p>
					</div>
				</div>
			</div>
			<div class="container pb-3 copy">&copy; Hak Cipta Direktorat Jenderal Kekayaan Negara 2022</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->



<!-- COMMON SCRIPTS -->
<script src="/login_regis/js/common_scripts.js" type="text/javascript"></script>
<script src="/login_regis/js/common_func.js" type="text/javascript"></script>

<!-- SPECIFIC SCRIPTS -->
<script src="/login_regis/js/jquery.validate.js" type="text/javascript"></script>
<script src="/login_regis/js/register_cust.js" type="text/javascript"></script>
<script src="/login_regis/js/pw_strenght.js" type="text/javascript"></script>


<script>
	$('#regis_cust').validate();
</script>

<?= $this->endSection(); ?>