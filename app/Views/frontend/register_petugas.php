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
					<h1>Registrasi Petugas <br> Landing Page</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<!-- <a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Home</button></a> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto">
						<h4 class="mb-3">Registrasi</h4>
						<?= session()->get('pesan'); ?>
						<form class="input_style_1" method="post" action="AuthPetugas/register">
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" name="nama" id="nama" class="form-control " required>
							</div>
							<div class="form-group">
								<label for="nip">NIP</label>
								<input type="text" name="nip" id="nip" class="form-control ">
							</div>
							<div class="form-group">
								<label for="email">Email Kemenkeu</label>
								<input type="email" name="email" id="email" class="form-control ">
							</div>
							<!-- <div class="form-group">
								<label for="kantor">Kantor</label>
								<input type="text" name="kantor" id="kantor" class="form-control ">
							</div> -->
							<div class="form-group">
								<label for="unit">Unit</label>
								`<select name="unit" class="form-control" aria-label="Default select example">
									<?php foreach ($kategori as $a) : ?>
										<option value="<?= $a['idKategori'] ?>"><?= $a['namaKategori']; ?></option>
									<?php endforeach ?>
								</select>`
							</div>
							<div class="form-group">
								<label for="level">Level</label>
								<select name="level" class="form-control" aria-label="Default select example">
									<?php foreach ($level as $b) : ?>
										<option value="<?= $b['idLevel'] ?>"><?= $b['Level']; ?></option>
									<?php endforeach ?>
								</select>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
							</div>
							<!-- <div class="form-group">
									<label for="password2">Confirm Password</label>
									<input type="password" name="password2" id="password2" class="form-control">
								</div> -->
							<div id="pass-info" class="clearfix"></div>
							<button type="submit" class="btn_1 full-width">Daftar</button>
						</form>
						<p class="text-center mt-3 mb-0">Sudah punya akun? <a href="/login_petugas">Login</a></p>
					</div>
				</div>
			</div>
			<div class="container pb-3 copy">&copy; Hak Cipta Direktorat Jenderal Kekayaan Negara 2022</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<!-- SPECIFIC SCRIPTS -->
<script src="/login_regis/js/register_petugas.js"></script>

<?= $this->endSection(); ?>