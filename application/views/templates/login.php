<!DOCTYPE html>
<html lang="en-us" id="extr-page">

<head>
	<meta charset="utf-8">
	<title>SPK Metode SAW</title>
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- #CSS Links -->
	<!-- Basic Styles -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/font-awesome.min.css">

	<!-- SmartAdmin Styles : Caution! DO NOT change the order -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/smartadmin-production-plugins.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/smartadmin-production.min.css">
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/smartadmin-skins.min.css">

	<!-- SmartAdmin RTL Support -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/smartadmin-rtl.min.css">

	<!-- We recommend you use "your_style.css" to override SmartAdmin
		     specific styles this will also ensure you retrain your customization with each SmartAdmin update.
		<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/your_style.css"> -->

	<!-- Demo purpose only: goes with demo.js, you can delete this css when designing your own WebApp -->
	<link rel="stylesheet" type="text/css" media="screen" href="<?= base_url() ?>assets/css/demo.min.css">

	<!-- #FAVICONS -->
	<link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" type="image/x-icon">

	<!-- #GOOGLE FONT -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	<!-- #APP SCREEN / ICONS -->
	<!-- Specifying a Webpage Icon for Web Clip
			 Ref: https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html -->
	<link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/splash/sptouch-icon-iphone.png">
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url() ?>assets/img/splash/touch-icon-ipad.png">
	<link rel="apple-touch-icon" sizes="120x120" href="<?= base_url() ?>assets/img/splash/touch-icon-iphone-retina.png">
	<link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/img/splash/touch-icon-ipad-retina.png">

	<!-- iOS web-app metas : hides Safari UI Components and Changes Status Bar Appearance -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="<?= base_url() ?>assets/img/splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="<?= base_url() ?>assets/img/splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="<?= base_url() ?>assets/img/splash/iphone.png" media="screen and (max-device-width: 320px)">

</head>

<body class="animated fadeInDown">

	<header id="header">
		<div id="logo-group">
			<span id="logo"> <img src="<?= base_url() ?>assets/img/logo.png" alt="SmartAdmin"> </span>
		</div>
	</header>

	<div id="main" role="main">
		<div id="content" class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<h1 class="txt-color-red login-header-big">SPK Metode SAW</h1>
					<div class="hero">
						<div class="pull-left login-desc-box-l">
							<h4 class="paragraph-header">Penerapan metode simple additive weight (SAW) Dalam system pendukung keputusan promosi kenaikan jabatan.</h4>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="well no-padding">
						<form id="form" class="smart-form client-form" id="login-form">
							<header>
								LOGIN
							</header>

							<fieldset>

								<section>
									<label class="label">Username</label>
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" id="username" name="username" required="">
										<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
								</section>

								<section>
									<label class="label">Password</label>
									<label class="input"> <i class="icon-append fa fa-lock"></i>
										<input type="password" id="password" name="password" required="">
										<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
								</section>
							</fieldset>
							<footer>
								<button type="submit" class="btn btn-primary">
									LOGIN
								</button>
							</footer>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--================================================== -->

	<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
	<script src="<?= base_url() ?>assets/js/plugin/pace/pace.min.js"></script>

	<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	<script src="ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script>
		if (!window.jQuery) {
			document.write('<script src="<?= base_url() ?>assets/js/libs/jquery-2.1.1.min.js"><\/script>');
		}
	</script>

	<script src="ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
		if (!window.jQuery.ui) {
			document.write('<script src="<?= base_url() ?>assets/js/libs/jquery-ui-1.10.3.min.js"><\/script>');
		}
	</script>

	<!-- IMPORTANT: APP CONFIG -->
	<script src="<?= base_url() ?>assets/js/app.config.js"></script>

	<!-- BOOTSTRAP JS -->
	<script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>

	<!-- CUSTOM NOTIFICATION -->
	<script src="<?= base_url() ?>assets/js/notification/SmartNotification.min.js"></script>

	<!-- JQUERY VALIDATE -->
	<script src="<?= base_url() ?>assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

	<!-- JQUERY MASKED INPUT -->
	<script src="<?= base_url() ?>assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

	<!--[if IE 8]>

			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>

		<![endif]-->

	<!-- MAIN APP JS FILE -->
	<script src="<?= base_url() ?>assets/js/app.min.js"></script>

	<script src="<?= $this->plugin->build_url("javascripts/api-client.js", FALSE, 'site') ?>" type="text/javascript"></script>
	<script src="<?= $this->plugin->build_url("javascripts/application.js", FALSE, 'site') ?>" type="text/javascript"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$.sound_path = '<?= base_url() ?>assets/sound/';
			pageSetUp();
		});
	</script>

	<?php if (file_exists(VIEWPATH . "javascripts/page.$content.js")) : ?>
		<script src="<?= $this->plugin->build_url("javascripts/page.$content.js") ?>" type="text/javascript"></script>
	<?php endif; ?>

	<script type="text/javascript">
		runAllForms();

		$(function() {
			// Validation
			$("#login-form").validate({
				// Rules for form validation
				rules: {
					username: {
						required: true,
						email: true
					},
					password: {
						required: true,
						minlength: 3,
						maxlength: 20
					}
				},

				// Messages for form validation
				messages: {
					email: {
						required: 'Please enter your email address',
						email: 'Please enter a VALID email address'
					},
					password: {
						required: 'Please enter your password'
					}
				},

				// Do not change code below
				errorPlacement: function(error, element) {
					error.insertAfter(element.parent());
				}
			});
		});
	</script>
</body>

</html>
