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
							<div class="pull-right"><button class="btn btn-primary" onclick="simpan_kunci()" id="btn-simpan" <?= $status ? "disabled" : ""; ?>>Kunci Input Dan Umumkan</button></div>
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
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
							<br>
							<div class="text-center">
								<button type="button" class="btn btn-danger" onclick="reset_data()">Reset Data Nilai</button>
								<button type="button" class="btn btn-warning" id="btn-lepas" onclick="buka_kunci()" <?= $status ? "" : "disabled"; ?>>Lepas Kunci dan Tarik pengumuman</button>
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
		<div class="row">

			<!-- NEW WIDGET START -->
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

				<!-- Widget ID (each widget will need unique ID)-->
				<div class="jarviswidget" id="wid-id-1" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
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
							<div class="text-center">
								<h2>Tahapan Perhitungan</h2>
							</div>
							<!-- 1. Pnenentuan Kriteria dan Bobot Prefensi Kriteria -->
							<h3>1. Pnenentuan Kriteria dan Bobot Prefensi Kriteria</h3>
							<table class="table table-striped table-bordered table-hover tabel" width="100%">
								<thead>
									<tr>
										<th>Kriteria</th>
										<th>Bobot</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>W1 = Masa Kerja (25%)</td>
										<td>0.25</td>
									</tr>
									<tr>
										<td>W2 = Penilaian Kinerja (50%)</td>
										<td>0.5</td>
									</tr>
									<tr>
										<td>W3 = Penilaian Perilaku (25%)</td>
										<td>0.25</td>
									</tr>
								</tbody>
							</table>
							<hr>

							<!-- 2. Penentuan benefit atau cost -->
							<h3>2. Penentuan benefit atau cost</h3>
							<table class="table table-striped table-bordered table-hover tabel" width="100%">
								<thead>
									<tr>
										<th>Kriteria</th>
										<th>Benefit</th>
										<th>Cost</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Masa Kerja</td>
										<td>v</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Penilaian Kinerja</td>
										<td>v</td>
										<td>-</td>
									</tr>
									<tr>
										<td>Penilaian Perilaku</td>
										<td>v</td>
										<td>-</td>
									</tr>
								</tbody>
							</table>
							<hr>

							<!-- 3. Nilai dari masing-masing kriteria -->
							<h3>3. Nilai dari masing-masing kriteria</h3>
							<table class="table table-striped table-bordered table-hover tabel" width="100%">
								<thead>
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No Karyawan</th>
										<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Nama Lengkap</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Masa Kerja</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Kinerja</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Prilaku</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($records as $q) : ?>
										<tr data-id="<?= $q['user_id'] ?>">
											<td><?= $q['user_id'] ?></td>
											<td><?= $q['user_nama'] ?></td>
											<td style="text-align:right"><?= $q['masa_kerja'] ? $q['masa_kerja'] . " Tahun" : "0 Tahun" ?></td>
											<td><?= $q['kinerja'] ? $q['kinerja'] : 0 ?></td>
											<td><?= $q['prilaku'] ? $q['prilaku'] : 0 ?></td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<hr>

						<!-- 4. Rating kecocokan -->
						<h3>4. Rating kecocokan</h3>
						<table class="table table-striped table-bordered table-hover tabel" width="100%">
							<thead>
								<tr>
									<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No Karyawan</th>
									<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Nama Lengkap</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Masa Kerja</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Kinerja</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Prilaku</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result['rating_kecocokan'] as $q) : ?>
									<tr data-id="<?= $q['user_id'] ?>">
										<td><?= $q['user_id'] ?></td>
										<td><?= $q['user_nama'] ?></td>
										<td><?= $q['masa_kerja'] ?></td>
										<td><?= $q['kinerja'] ?></td>
										<td><?= $q['prilaku'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<hr>

						<!-- 5. Normalisasi Matriks Untuk Kriteria -->
						<h3>5. Normalisasi Matriks Untuk Kriteria</h3>
						<table class="table table-striped table-bordered table-hover tabel" width="100%">
							<thead>
								<tr>
									<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No Karyawan</th>
									<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Nama Lengkap</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Masa Kerja</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Kinerja</th>
									<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Prilaku</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($result['normalisasi'] as $q) : ?>
									<tr data-id="<?= $q['user_id'] ?>">
										<td><?= $q['user_id'] ?></td>
										<td><?= $q['user_nama'] ?></td>
										<td><?= $q['masa_kerja'] ?></td>
										<td><?= $q['kinerja'] ?></td>
										<td><?= $q['prilaku'] ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<hr>

						<!-- 6. Menentukan Rangking -->
						<h3>6. Menentukan Rangking</h3>
						<table class="table table-striped table-bordered table-hover tabel" width="100%">
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
					</div>
					<!-- end widget content -->

				</div>
				<!-- end widget div -->

		</div>
		<!-- end widget -->

		</article>
		<!-- WIDGET END -->
	</section>



</div>
