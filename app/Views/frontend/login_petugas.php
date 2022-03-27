<?= $this->extend('frontend/template'); ?>

<?= $this->section('content'); ?>

<div class="container-fluid p-0">
	<div class="row no-gutters row-height">
		<div class="col-lg-6 background-image" data-background="url(/login_regis/img/main_bg.jpg)">
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
					<h1>Login <br> Petugas Landing Page</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<!-- <a href="/"><button type="submit" class="btn_1 half-width">Kembali ke Home</button></a> -->
				</div>
			</div>
		</div>
		<div class="col-lg-6 d-flex flex-column content-right">
			<div class="container my-auto py-5">
				<div class="row">
					<div class="col-lg-9 col-xl-7 mx-auto">
						<h4 class="mb-3">Login</h4>
						<?= session()->get('pesan'); ?>
						<form class="input_style_1" method="post" action="AuthPetugas/login">
							<div class="form-group">
								<label for="email_address">Email</label>
								<input type="email" name="email" id="email_address" class="form-control ">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" name="password" id="password" class="form-control">
								
							</div>
							<div class="clearfix mb-3">
								<!-- <div class="float-left">
										<label class="container_check">Remember Me
											<input type="checkbox">
											<span class="checkmark"></span>
										</label>
									</div> -->
								<div class="float-right">
									<a id="forgot" href="javascript:void(0);">Lupa Password?</a>
								</div>
							</div>
							<button type="submit" class="btn_1 full-width">Login</button>
						</form>
						<p class="text-center mt-3 mb-0">Belum punya akun? <a href="/register_petugas">Registrasi</a></p>
						<form class="input_style_1" method="post" action="">
							<div id="forgot_pw">
								<h4 class="mb-3">Reset Password</h4>
								<div class="form-group">
									<label for="email_forgot">Email Terdaftar</label>
									<input type="email" class="form-control" name="email_forgot" id="email_forgot">
								</div>
								<p>Silakan memasukkan email yang terdaftar untuk mengatur ulang password Anda ke password yang baru.</p>
								<div class="text-center"><input type="submit" value="Reset Password" class="btn_1"></div>
								<p class="text-center mt-3 mb-0">Kembali ke <a href="/login_petugas">Login</a> </p>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="container pb-3 copy">&copy; Hak Cipta Direktorat Jenderal Kekayaan Negara 2022</div>
		</div>
	</div>
	<!-- /row -->
</div>
<!-- /container -->

<?= $this->endSection(); ?>