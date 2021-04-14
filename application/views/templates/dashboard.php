<!DOCTYPE html>
<html lang="id-id" class="smart-style-<?= $template_type ?>">
	<head>
		<meta charset="utf-8">
		<title> <?= $app_name ?> | <?= $title ?> </title>
		<meta name="description" content="">
		<meta name="author" content="">
			
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
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

		<!-- #FAVICONS -->
		<link rel="shortcut icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" type="image/x-icon">
		<link rel="icon" href="<?= base_url() ?>assets/img/favicon/favicon.ico" type="image/x-icon">

		<!-- #GOOGLE FONT -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">

	    <?php if(!empty($plugin_styles)): ?>
		    <!-- BEGIN PAGE LEVEL PLUGINS -->
		    <?php foreach($plugin_styles as $style): ?>
			    <link href="<?= $style ?>" rel="stylesheet" type="text/css" />
		    <?php endforeach; ?>
		    <!-- END PAGE LEVEL PLUGINS -->
	    <?php endif; ?>

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
		<style type="text/css">
			/* Scroll bar */
			::-webkit-scrollbar {
			  width: 10px;
			}

			::-webkit-scrollbar-track {
			  background: #f1f1f1;
			}

			::-webkit-scrollbar-thumb {
			  transition: 0.2s ease;
			  -webkit-transition: 0.2s ease;
			  -o-transition: 0.2s ease;
			  background: #343a40;
			}

			::-webkit-scrollbar-thumb:hover {
			  transition: 0.2s ease;
			  -webkit-transition: 0.2s ease;
			  -o-transition: 0.2s ease;
			  background: #555;
			}
		</style>

	</head>
	<!-- #BODY -->
	<body class="desktop-detected pace-done smart-style-<?= $template_type ?> <?= $page_setting ?>">

		<!-- #HEADER -->
		<header id="header">
			<div id="logo-group">
				<!-- PLACE YOUR LOGO HERE -->
				<span id="logo"> <img src="<?= base_url() ?>assets/img/logo-white.png" alt="SmartAdmin"> </span>
				<!-- END LOGO PLACEHOLDER -->

			</div>

			<!-- #TOGGLE LAYOUT BUTTONS -->
			<!-- pulled right: nav area -->
			<div class="pull-right">
				<!-- collapse menu button -->
				<div id="hide-menu" class="btn-header pull-right">
					<span> <a href="javascript:;" data-action="toggleMenu" title="Collapse Menu"><i class="fa fa-reorder"></i></a> </span>
				</div>
				<!-- end collapse menu -->
				
				<!-- #MOBILE -->
				<!-- Top menu profile link : this shows only when top menu is active -->
				<ul id="mobile-profile-img" class="header-dropdown-list hidden-xs padding-5">
					<li class="">
						<a href="#" class="dropdown-toggle no-margin userdropdown" data-toggle="dropdown"> 
							<img src="<?= base_url() ?>assets/img/avatars/sunny.png" class="online" alt="#">

							<?= $this->session->userdata('data')['nama'] ?>
						</a>
						<ul class="dropdown-menu pull-right">
							<li>
								<a href="javascript:void(0);" class="padding-10 padding-top-0 padding-bottom-0" data-action="launchFullscreen"><i class="fa fa-arrows-alt"></i> <strong>Fullscreen</strong></a>
							</li>
							<li class="divider"></li>
							<li>
								<a href="<?= base_url() ?>login/logout" class="padding-10 padding-top-5 padding-bottom-5" data-action="userLogout"><i class="fa fa-sign-out fa-lg"></i> <strong>Logout</strong></a>
							</li>
						</ul>
					</li>
				</ul>

				<!-- logout button -->
				<div id="logout" class="btn-header transparent pull-right">
					<span> <a href="<?= base_url() ?>login/logout" title="Sign Out" data-action="userLogout" data-logout-msg="Apakah anda yakin ingin logout ?"><i class="fa fa-sign-out"></i></a> </span>
				</div>
				<!-- end logout button -->

				<!-- fullscreen button -->				
				<div id="hide-menu" class="btn-header transparent pull-right">
					<span> <a href="javascript:;" data-action="launchFullscreen" title="Full Screen"><i class="fa fa-arrows-alt"></i></a> </span>
				</div>
				<!-- end fullscreen button -->

			</div>
			<!-- end pulled right: nav area -->

		</header>
		<!-- END HEADER -->

		<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<aside id="left-panel">

			<!-- User info -->
			<div class="login-info">
				<span> <!-- User image size is adjusted inside CSS, it should stay as it --> 
					
					<a href="javascript:;" id="show-shortcut" data-action="toggleShortcut">
						<img src="<?= base_url() ?>assets/img/avatars/sunny.png" alt="me" class="online" /> 
						<span>
							<?= $this->session->userdata('data')['nama'] ?>
						</span>
						<!-- <i class="fa fa-angle-down"></i> -->
					</a> 
					
				</span>
			</div>
			<!-- end user info -->

			<?php $this->load->view('templates/navigation'); ?>

		</aside>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			<!-- RIBBON -->
			<div id="ribbon">

				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<?php if($breadcrumb_1 !== null): ?>
						<li><a href="<?= $breadcrumb_1_url ?>"><?= $breadcrumb_1 ?></a></li>
					<?php endif; ?>

					<?php if($breadcrumb_2 !== null): ?>
						<li><a href="<?= $breadcrumb_2_url ?>"><?= $breadcrumb_2 ?></a></li>
					<?php endif; ?>

					<?php if($breadcrumb_3 !== null): ?>
						<li><a href="<?= $breadcrumb_3_url ?>"><?= $breadcrumb_3 ?></a></li>
					<?php endif; ?>

					<?php if($breadcrumb_4 !== null): ?>
						<li><a href="<?= $breadcrumb_4_url ?>"><?= $breadcrumb_4 ?></a></li>
					<?php endif; ?>
				</ol>
				<!-- end breadcrumb -->

			</div>
			<!-- END RIBBON -->

			<?php if(file_exists(VIEWPATH."templates/contents/{$content}.php")): ?>
				<?php $this->load->view("templates/contents/{$content}.php"); ?>
			<?php endif; ?>

		</div>
		<!-- END MAIN PANEL -->

		<!-- PAGE FOOTER -->
		<div class="page-footer">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<span class="txt-color-white">Copyright © <?= $copyright ?></span>
				</div>
			</div>
		</div>
		<!-- END PAGE FOOTER -->


		<!-- CHECK MODAL -->
		<div class="modal fade" id="ModalCheck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog modal-sm">
			  	<div class="modal-content">
				  	<div class="modal-header">
					  	<h3 class="modal-title custom-font" id="LabelCheck"></h3>
				  	</div>
				  	<div class="modal-body" id="ContentCheck">
				  	</div>
				  	<div class="modal-footer">
					  	<button id="OkCheck" class="btn btn-success btn-ef btn-ef-3 btn-ef-3c"><i class="fa fa-arrow-right"></i> Ya</button>

					 	<button class="btn btn-danger btn-ef btn-ef-4 btn-ef-4c" data-dismiss="modal"><i class="fa fa-arrow-left"></i> Tidak</button>
					 </div>
				  	<input type="hidden" id="idCheck" name="">
			  	</div>
		  	</div>
		</div>

		<!--================================================== -->

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script data-pace-options='{ "restartOnRequestAfter": true }' src="<?= base_url() ?>assets/js/plugin/pace/pace.min.js"></script>

		<!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
		<script src="<?= base_url() ?>assets/js/libs/jquery-2.1.1.min.js"></script>

		<script src="<?= base_url() ?>assets/js/libs/jquery-ui-1.10.3.min.js"></script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="<?= base_url() ?>assets/js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events-->
		<script src="<?= base_url() ?>assets/js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> 

		<!-- BOOTSTRAP JS -->
		<script src="<?= base_url() ?>assets/js/bootstrap/bootstrap.min.js"></script>

		<!-- CUSTOM NOTIFICATION -->
		<script src="<?= base_url() ?>assets/js/notification/SmartNotification.min.js"></script>

		<!-- JARVIS WIDGETS -->
		<script src="<?= base_url() ?>assets/js/smartwidgets/jarvis.widget.min.js"></script>

		<!-- EASY PIE CHARTS -->
		<script src="<?= base_url() ?>assets/js/plugin/easy-pie-chart/jquery.easy-pie-chart.min.js"></script>

		<!-- SPARKLINES -->
		<script src="<?= base_url() ?>assets/js/plugin/sparkline/jquery.sparkline.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="<?= base_url() ?>assets/js/plugin/jquery-validate/jquery.validate.min.js"></script>

		<!-- JQUERY MASKED INPUT -->
		<script src="<?= base_url() ?>assets/js/plugin/masked-input/jquery.maskedinput.min.js"></script>

		<!-- JQUERY UI + Bootstrap Slider -->
		<script src="<?= base_url() ?>assets/js/plugin/bootstrap-slider/bootstrap-slider.min.js"></script>

		<!-- browser msie issue fix -->
		<script src="<?= base_url() ?>assets/js/plugin/msie-fix/jquery.mb.browser.min.js"></script>

		<!-- FastClick: For mobile devices -->
		<script src="<?= base_url() ?>assets/js/plugin/fastclick/fastclick.min.js"></script>

		<!-- MAIN APP JS FILE -->
		<script src="<?= base_url() ?>assets/js/app.min.js"></script>
		<!-- PAGE RELATED PLUGIN(S) -->
	    <?php if(!empty($plugin_scripts)): ?>
		    <!-- BEGIN PAGE LEVEL PLUGINS -->
		    <?php foreach($plugin_scripts as $script): ?>
		    	<script src="<?= $script ?>" type="text/javascript"></script>
		    <?php endforeach; ?>
		    <!-- END PAGE LEVEL PLUGINS -->
	    <?php endif; ?>

		<script type="text/javascript">
			$(document).ready(() => 
			{
				$.sound_path = '<?= base_url() ?>assets/sound/'
				
				pageSetUp()
			})
		</script>
		
		<script src="<?= $this->plugin->build_url('javascripts/api-client.js', FALSE, 'site') ?>" type="text/javascript"></script>
		<script src="<?= $this->plugin->build_url('javascripts/application.js', FALSE, 'site') ?>" type="text/javascript"></script>	
		<script src="<?= $this->plugin->build_url('javascripts/dt.helper.js', FALSE, 'site') ?>" type="text/javascript"></script>	
		
	    <?php if(file_exists(VIEWPATH."javascripts/page.{$content}.js")): ?>
	      	<script src="<?= $this->plugin->build_url("javascripts/page.{$content}.js") ?>" type="text/javascript"></script>
	    <?php endif; ?>
	    
	</body>

</html>