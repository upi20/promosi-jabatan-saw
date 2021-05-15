<style>
	.card-container {
		position: relative;
	}

	.card-container .card {
		min-height: 110px;
		margin-bottom: 20px;
		position: relative;
		-webkit-perspective: 600px;
		-moz-perspective: 600px;
		perspective: 600px;
		width: 100%;
		cursor: pointer;
		z-index: 9;
	}


	.card-tagihan {
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
		transition: all 0.3s cubic-bezier(.25, .8, .25, 1);
		margin: 3px;
	}

	.card-tagihan:hover {
		box-shadow: 0 5px 5px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
	}

	.tbox {
		display: table;
		width: 100%;
		height: 100%;
		border-spacing: 0;
		table-layout: fixed;
	}

	.tile {
		position: relative;
		margin-bottom: 20px;
		color: #616f77;
		background-color: white;
		filter: alpha(opacity=100);
		opacity: 1;
		-webkit-transition: opacity 0.25s ease-out;
		-moz-transition: opacity 0.25s ease-out;
		transition: opacity 0.25s ease-out;
	}

	.tbox>.tcol {
		display: table-cell;
		float: none;
		height: 100%;
		vertical-align: top;
	}

	.tile .tile-header,
	.tile .tile-widget,
	.tile .tile-body,
	.tile .tile-footer {
		position: relative;
		padding: 15px;
	}

	.p-30 {
		padding: 30px !important;
	}

	.bg-blue {
		background-color: #418bca !important;
		color: white !important;
	}

	*[class*='bg-']:not(.bg-default):not(.bg-white):not(.bg-tr-white) a:not(.ui-select-choices-row-inner):not(.event-remove) {
		color: rgba(255, 255, 255, 0.7);
	}

	.myIcon.icon-drank:after,
	.myIcon.icon-drank.hover-color:hover,
	.myIcon.icon-drank.icon-color {
		color: #A40778;
	}

	.myIcon.icon-drank {
		background-color: #A40778;
		color: white;
	}

	.myIcon.icon-ef-8 {
		background: transparent !important;
		-webkit-transition: -webkit-transform ease-out 0.1s, background 0.2s;
		-moz-transition: -moz-transform ease-out 0.1s, background 0.2s;
		transition: transform ease-out 0.1s, background 0.2s;
	}

	.myIcon {
		display: inline-block;
		font-size: 0px;
		cursor: pointer;
		margin: 10px;
		width: 50px;
		height: 50px;
		border-radius: 50%;
		text-align: center;
		position: relative;
		z-index: 1;
		color: #fff;
	}

	.myIcon>.fa {
		font-size: 26px;
		line-height: 50px;
		display: block;
	}
</style>
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
	<section id="widget-grid" class="">

		<!-- row -->
		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="true" data-widget-editbutton="true" data-widget-deletebutton="true">
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
								<!-- col -->
								<div class="col-md-12">
									<div class="card-container col-lg-3 col-sm-6 col-sm-12">
										<div class="card shadow-sm card-tagihan">
											<!-- tile -->
											<section class="tile tile-simple tbox">
												<!-- tile widget -->
												<div class="tile-widget bg-blue text-center p-30 tcol">
													<a href="" class="myIcon icon-drank icon-ef-8 icon-color"><i class="fa fa-home"></i></a>
												</div>
												<!-- /tile widget -->
												<!-- tile body -->
												<div class="tile-body text-center tcol"><br>
													<p style="text-align:center">
													</p>
													<h4 class="m-0"><?= $jml_admin; ?></h4>
													<span class="text-muted">Administrator</span>
													<p></p>
												</div>
												<!-- /tile body -->
											</section>
											<!-- /tile -->
										</div>
									</div>
									<div class="card-container col-lg-3 col-sm-6 col-sm-12">
										<div class="card shadow-sm card-tagihan">
											<!-- tile -->
											<section class="tile tile-simple tbox">
												<!-- tile widget -->
												<div class="tile-widget bg-blue text-center p-30 tcol">
													<a href="" class="myIcon icon-drank icon-ef-8 icon-color"><i class="fa fa-home"></i></a>
												</div>
												<!-- /tile widget -->
												<!-- tile body -->
												<div class="tile-body text-center tcol"><br>
													<p style="text-align:center">
													</p>
													<h4 class="m-0"><?= $jml_karyawan; ?></h4>
													<span class="text-muted">Karyawan</span>
													<p></p>
												</div>
												<!-- /tile body -->
											</section>
											<!-- /tile -->
										</div>
									</div>
									<div class="card-container col-lg-3 col-sm-6 col-sm-12">
										<div class="card shadow-sm card-tagihan">
											<!-- tile -->
											<section class="tile tile-simple tbox">
												<!-- tile widget -->
												<div class="tile-widget bg-blue text-center p-30 tcol">
													<a href="" class="myIcon icon-drank icon-ef-8 icon-color"><i class="fa fa-home"></i></a>
												</div>
												<!-- /tile widget -->
												<!-- tile body -->
												<div class="tile-body text-center tcol"><br>
													<p style="text-align:center">
													</p>
													<h4 class="m-0"><?= $belum_isi; ?> Karyawan</h4>
													<span class="text-muted">Belum Dinilai</span>
													<p></p>
												</div>
												<!-- /tile body -->
											</section>
											<!-- /tile -->
										</div>
									</div>
									<div class="card-container col-lg-3 col-sm-6 col-sm-12">
										<div class="card shadow-sm card-tagihan">
											<!-- tile -->
											<section class="tile tile-simple tbox">
												<!-- tile widget -->
												<div class="tile-widget bg-blue text-center p-30 tcol">
													<a href="" class="myIcon icon-drank icon-ef-8 icon-color"><i class="fa fa-home"></i></a>
												</div>
												<!-- /tile widget -->
												<!-- tile body -->
												<div class="tile-body text-center tcol"><br>
													<p style="text-align:center">
													</p>
													<h4 class="m-0"><?= $sudah_isi; ?> Karyawan</h4>
													<span class="text-muted">Sudah Dinilai</span>
													<p></p>
												</div>
												<!-- /tile body -->
											</section>
											<!-- /tile -->
										</div>
									</div>
									<div class="card-container col-lg-3 col-sm-6 col-sm-12">
										<div class="card shadow-sm card-tagihan">
											<!-- tile -->
											<section class="tile tile-simple tbox">
												<!-- tile widget -->
												<div class="tile-widget bg-blue text-center p-30 tcol">
													<a href="" class="myIcon icon-drank icon-ef-8 icon-color"><i class="fa fa-home"></i></a>
												</div>
												<!-- /tile widget -->
												<!-- tile body -->
												<div class="tile-body text-center tcol"><br>
													<p style="text-align:center">
													</p>
													<h4 class="m-0"><?= $status ? "Sudah Diumumkan" : "Belum Dimumkan"; ?></h4>
													<span class="text-muted">Status</span>
													<p></p>
												</div>
												<!-- /tile body -->
											</section>
											<!-- /tile -->
										</div>
									</div>
									<!-- /col -->
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
		<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</section>



</div>
