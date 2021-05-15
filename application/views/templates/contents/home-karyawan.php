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
							<?php if (!$status) : ?>
								<div class="text-center">
									<h3>Pengumuman Belum Tersedia</h3>
								</div>
							<?php else : ?>
								<table id="dt_basic" class="table table-striped table-bordered table-hover tabel" width="100%">
									<thead>
										<tr>
											<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No Karyawan</th>
											<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Nama Lengkap</th>
											<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Nilai</th>
											<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Presentase</th>
											<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Rangking</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($result['rangking'] as $q) : ?>
											<tr>
												<td><?= $q['user_id'] ?></td>
												<td><?= $q['user_nama'] ?></td>
												<td><?= round($q['nilai'], 2) ?></td>
												<td><?= $q['presentase'] ?>%</td>
												<td><?= $q['rangking'] ?></td>
											</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							<?php endif; ?>
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
