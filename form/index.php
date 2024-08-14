<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Wizard V2</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css?v=003">
	<link rel="stylesheet" href="assets/css/animate.min.css?v=003">
	<link rel="stylesheet" href="assets/css/fontawesome-all.css?v=003">
	<link rel="stylesheet" href="assets/css/style.css?v=003">
	<link rel="stylesheet" type="text/css" href="assets/css/colors/switch.css?v=003">
	<!-- Color Alternatives -->
	<link href="assets/css/colors/color-2.css?v=003" rel="alternate stylesheet" type="text/css" title="color-2">
	<link href="assets/css/colors/color-3.css?v=003" rel="alternate stylesheet" type="text/css" title="color-3">
	<link href="assets/css/colors/color-4.css?v=003" rel="alternate stylesheet" type="text/css" title="color-4">
	<link href="assets/css/colors/color-5.css?v=003" rel="alternate stylesheet" type="text/css" title="color-5">
	<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js?v=003"></script>
	<style>
		.form-control.error {
			border-color: red;
		}

		.form-control.error::placeholder {
			color: red;
		}
	</style>
</head>

<body>


	<div class="wrapper clearfix">


		<!--multisteps-form-->
		<div class="multisteps-form">
			<?php error_reporting(E_ALL & ~E_NOTICE);
			$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
			if (isset(parse_url($url)['query'])) {
				parse_str(parse_url($url)['query'], $params);
				if ($params['q'] == 'basarili') {
					echo ('<div class="alert alert-success text-center" id="mydiv21" role="alert" style="margin-top: 20px;">Form Gönderme İşlemi Başarılı</div>');
				}
				if ($params['q'] == 'basarisiz') {
					echo ('<div class="alert alert-danger text-center" id="mydiv22" role="alert" style="margin-top: 20px;">Form Gönderme İşlemi Başarısız</div>');
				}
				if ($params['q'] == 'eksik') {
					echo ('<div class="alert alert-warning text-center" id="mydiv23" role="alert" style="margin-top: 20px;">Form Alanları eksik</div>');
				}
				if (isset($params['fields'])) {
					echo "<script>";
					$item = null;
					foreach ($params['fields'] as $item) {
						echo ("document.addEventListener('DOMContentLoaded', function () {addErrorClassToInputByName('" . $item . "');});");
					}
					echo "</script>";
				}
			}
			?>
			<!--form panels-->
			<div class="row">
				<div class="col-12 col-lg-10 col-xl-8 m-auto">
					<div class="text-center">
						<a href="doc/eptbrochure.pdf?v=001" target="_blank">
							<img loading="lazy" decoding="async" width="1024" height="768" src="../doc/balkanEPT16_9kapak.jpg">
						</a>
					</div>
					<div class="wizard-content-item" style="text-align: justify;">
						<h2 style="text-align: center;">Balkan EPT Meeting Registration</h2>

						<p><b>Dear Colleagues,</b></p>
						<p>On behalf of the HLA Immunogenetics and Transplantation Immunology Society
							(HİTİD), we are pleased to announce the Balkan EPT Meeting scheduled to take place
							at Istanbul Marriott Hotel Şişli on November 15-16, 2024. We believe this meeting will
							be a significant gathering of scientific and academic importance, and we cordially
							invite you to join us.</p>
						<p>The meeting will feature contributions from esteemed national and international experts,
							offering insights from a diverse array of specialized speakers.</p>
						<p>We look forward to sharing knowledge, exchanging experiences, and fostering meaningful
							discussions. Your participation will undoubtedly enrich the meeting.</p>
						<p>We hope to welcome you to the vibrant city of Istanbul this autumn for our meeting
							that promises to leave a lasting impact both scientifically and socially.</p>
						<p>Best regards, <br>
							Balkan EPT Meeting 2024 Organizing Committee </p>

					</div>
					<form class="multisteps-form__form clearfix" action="form-validate.php" method="post" id="wizard">



						<!--single form panel-->
						<div class="" data-animation="slideVert">
							<div class="wizard-content-form">
								<div class="wizard-form-field">
									<div class="row">
										<div class="col-md-3">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" name="title" class="form-control" placeholder="Title" required>
												<label>Title</label>
											</div>
										</div>
										<div class="col-md-9">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" name="full_name" class="form-control" placeholder="First and Last Name" required>
												<label>First and Last Name</label>
											</div>
										</div>

									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="wizard-form-input position-relative form-group has-float-label mt-0 n-select-option">
												<select id="gender" name="gender" class="form-control" required>
													<option value="" disabled selected hidden>Gender</option>
													<option value="Female">Female</option>
													<option value="Male">Male</option>
													<option value="Prefer not to Say">Prefer not to Say</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="department" placeholder="Department" required>
												<label>Department</label>
											</div>
										</div>
									</div>
									<div class="wizard-form-input position-relative form-group has-float-label">
										<!--	<i data-toggle="tooltip" data-placement="bottom" title="If you want your invoice address to a compnay. Leave blank to use full name" class="fa fa-info"></i> -->
										<input type="text" class="form-control" name="institute" placeholder="Institute" required>
										<label>Institute</label>
									</div>
									<div class="wizard-form-input position-relative form-group has-float-label">
										<textarea class="form-control" name="address" placeholder="Address" cols="30" rows="3" required></textarea><label>Address</label>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="city" placeholder="City" required>
												<label>City</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="country" placeholder="Country" required>
												<label>Country</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="postalCode" placeholder="Zip/Postal Code" required>
												<label>Zip/Postal Code</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="phone" placeholder="Phone">
												<label>Phone</label>
											</div>
										</div>
										<div class="col-md-6">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="text" class="form-control" name="mobilPhone" placeholder="Mobile" required>
												<label>Mobile</label>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-8">
											<div class="wizard-form-input position-relative form-group has-float-label">
												<input type="email" class="form-control" name="email" placeholder="Email Address" required>
												<label>Email Address</label>
											</div>
										</div>
										<div class="col-md-4">
											<div class="wizard-form-input position-relative form-group has-float-label mt-0 n-select-option" x-data="{ selectedOption: '', showOther: false }">
												<select id="country" name="registration" class="form-control" required x-model="selectedOption" @change="showOther = (selectedOption === 'Other')">
													<option value="" disabled selected hidden>Registration Type</option>
													<option value="Physican">Physican</option>
													<option value="Resident">Resident</option>
													<option value="Company Representative">Company Representative</option>
													<option value="Other">Other</option>
												</select>
												<div x-show="showOther" x-transition>
													<input id="otherText" type="text" x-bind:required="showOther" placeholder="Specify other..." />
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="wizard-footer" style="min-height: 110px">
									<div class="actions">
										<ul class="mobile-center">
											<li><button type="submit" title="Submit">Submit <i class="fa fa-arrow-right"></i></button></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>

	</div>
	<script src="assets/js/jquery-3.3.1.min.js?v=003"></script>
	<script src="assets/js/popper.min.js?v=003"></script>
	<script src="assets/js/bootstrap.min.js?v=003"></script>
	<script src="assets/js/switch.js?v=003"></script>
	<script src="assets/js/main.js?v=003"></script>
	<script>
		$("#files").change(function() {
			filename = this.files[0].name
			console.log(filename);
		});
	</script>
	<script>
		function addErrorClassToInputByName(inputName) {
			// name özelliği verilen input öğesini seçin
			var inputElement = document.querySelector('input[name="' + inputName + '"]');

			// Eğer input öğesi mevcutsa, ona 'error' sınıfını ekleyin
			if (inputElement) {
				inputElement.classList.add('error');
			}
		}
	</script>
</body>

</html>