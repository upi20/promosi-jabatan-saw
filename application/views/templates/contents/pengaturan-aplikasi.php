<!-- MAIN CONTENT -->
<div id="content">

	<!-- row -->
	<div class="row">

		<!-- col -->
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark">
				<!-- PAGE HEADER -->
				<i class="fa-fw fa fa-table"></i>

				<?= $title ?>
			</h1>
		</div>
		<!-- end col -->

	</div>
	<!-- end row -->

	<!--
		The ID "widget-grid" will start to initialize all widgets below
		You do not need to use widgets if you dont want to. Simply remove
		the <section></section> and you can use wells or panels instead
		-->

	<!-- widget grid -->
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header>
						<span class="widget-icon"> <i class="fa fa-table"></i> </span>
					</header>

					<!-- widget div-->
					<div>

						<!-- widget edit box -->
						<div class="jarviswidget-editbox">
							<!-- This area used as dropdown edit box -->
							<input class="form-control" type="text">
						</div>
						<!-- end widget edit box -->

						<!-- widget content -->
						<div class="widget-body">
							<div class="row">
								<div class="col-lg-6">
									<h3>APPLICATION NAME</h3>
									<form action="" id="app_name">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Nama Aplikasi" id="app_name_input" value="<?= $display['app_name']; ?>">
											<span class="input-group-btn">
												<button class="btn btn-default" type="submint">Simpan</button>
											</span>
										</div>
									</form>
									<hr>

									<h3>COPYRIGHT</h3>
									<form action="" id="copyright">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Copyright" id="copyright_input" value="<?= $display['copyright']; ?>">
											<span class="input-group-btn">
												<button class="btn btn-default" type="submint">Simpan</button>
											</span>
										</div>
									</form>
									<hr>

									<h3>TEMPLATE TYPE</h3>
									<select class="form-control" id="template_type">
										<option value="0">Default</option>
										<option value="1">Dark elegance</option>
										<option value="2">Ultra light</option>
										<option value="3">Google</option>
										<option value="4">Pixel smash</option>
										<option value="5">Glass</option>
										<option value="6">Material designs</option>
									</select>
									<hr>
								</div>
								<div class="col-lg-6">
									<h3>PAGE LAYOUT OPTION</h3>
									<blockquote>
										fixed-navigation
										<br> fixed-ribbon
										<br> fixed-header
										<br> fixed-footer
										<br> container
										<br> smart-rtl
										<br> minified | sidebar |
										<br> menu-on-top
										<br> colorblind-friendly

										<br><br> <strong>Example:</strong>
										<br> "fixed-navigation menu-on-top fixed-header"
									</blockquote>
									<form action="" id="page_setting">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Page Layout Option" id="page_setting_input" value="<?= $display['page_setting']; ?>">
											<span class="input-group-btn">
												<button class="btn btn-default" type="submint">Simpan</button>
											</span>
										</div>
									</form>
								</div>
							</div>

						</div>
						<!-- end widget content -->
					</div>
					<!-- end widget div -->

				</div>
				<!-- end widget -->

			</article>
			<!-- WIDGET END -->

		</div>

		<!-- end row -->

		<!-- row -->

		<div class="row">

			<!-- a blank row to get started -->
			<div class="col-sm-12">
				<!-- your contents here -->
			</div>

		</div>

		<!-- end row -->

	</section>
	<!-- end widget grid -->

</div>
<!-- END MAIN CONTENT -->

<script>
	document.getElementById('template_type').value = <?= $display['template_type']; ?>;
</script>
