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
							<div class="row">
								<div class="col-lg-4">
									<div class="form-group">
										<label for="inp_id_user">Nomor Pegawai</label>
										<input type="text" readonly class="form-control" placeholder="Nomor Pegawai" id="inp_id_user" required>
									</div>
									<div class="form-group">
										<label for="inp_user_nama">Nama Pegawai</label>
										<input type="text" readonly class="form-control" placeholder="Nama Pegawain" id="inp_user_nama" required>
									</div>
								</div>
								<div class="col-lg-6">
									<form action="" id="inp_data">
										<label for="masa_kerja">Nilai Kriteria Masa Kerja</label>
										<div class="input-group">
											<input type="number" class="form-control" placeholder="Masa Kerja satuan tahun" id="masa_kerja" min="2" required>
											<span class="input-group-btn">
												<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalMasaKerja">Info</button>
											</span>
										</div>
										<label for="kinerja">Nilai Kriteria Penilaian Kinerja</label>
										<div class="input-group">
											<input type="number" class="form-control" placeholder="Kinerja nilai 1 s/d 6" id="kinerja" max="6" min="1" required step="0.01">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalKinerja">Info</button>
											</span>
										</div>
										<label for="prilaku">Nilai Kriteria Penilaian Prilaku</label>
										<div class="input-group">
											<input type="number" class="form-control" placeholder="Prilaku  nilai 1 s/d 6" id="prilaku" max="6" min="1" required step="0.01">
											<span class="input-group-btn">
												<button class="btn btn-default" type="button" data-toggle="modal" data-target="#modalPrilaku">Info</button>
											</span>
										</div>
										<br>
										<div class="pull-right">
											<button class="btn btn-primary btn-sm" type="submit">
												Simpan
											</button>
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
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> No Karyawan</th>
										<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Nama Lengkap</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Masa Kerja</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Kinerja</th>
										<th data-class="expand"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Prilaku</th>
										<th><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($records as $q) : ?>
										<tr data-id="<?= $q['user_id'] ?>">
											<td><?= $q['user_id'] ?></td>
											<td><?= $q['user_nama'] ?></td>
											<td style="text-align:right"><?= $q['masa_kerja'] ? $q['masa_kerja'] . " Tahun" : "" ?></td>
											<td><?= $q['kinerja'] ?></td>
											<td><?= $q['prilaku'] ?></td>
											<td>
												<div>
													<button class="btn btn-primary btn-sm" data-id="<?= $q['user_id'] ?>" data-nama="<?= $q['user_nama'] ?>" data-masa_kerja="<?= $q['masa_kerja'] ?>" data-kinerja="<?= $q['kinerja'] ?>" data-prilaku="<?= $q['prilaku'] ?>" onclick="Ubah(this)">
														<i class="fa fa-edit"></i> Ubah Nilai
													</button>
												</div>
											</td>
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

<!-- Modal masa kerja -->
<div class="modal fade" id="modalMasaKerja" tabindex="-1" role="dialog" aria-labelledby="modalMasaKerjaLabel" aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="modalMasaKerjaLabel">Tabel Kriteria Masa kerja</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th data-class="expand">Kriteria</th>
							<th data-class="expand">Range</th>
							<th data-class="expand">Bobot</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td rowspan="5">Masa kerja</td>
							<td>2 Tahun</td>
							<td>0,2</td>
						</tr>
						<tr>
							<td>3 Tahun</td>
							<td>0,4</td>
						</tr>
						<tr>
							<td>4 Tahun</td>
							<td>0,6</td>
						</tr>
						<tr>
							<td>5 Tahun</td>
							<td>0,8</td>
						</tr>
						<tr>
							<td>>5 Tahun</td>
							<td>1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Kinerja -->
<div class="modal fade" id="modalKinerja" tabindex="-1" role="dialog" aria-labelledby="modalMasaKerjaLabel" aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="modalMasaKerjaLabel">Tabel Kriteria Penilaian Kienrja</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th data-class="expand">Kriteria</th>
							<th data-class="expand">Range</th>
							<th data-class="expand">Skala</th>
							<th data-class="expand">Bobot</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td rowspan="6">Penilaian pencapaian target kinerja karyawan</td>
							<td>
								<60% (Tidak Baik) </td>
							<td>1</td>
							<td>0,2</td>
						</tr>
						<tr>
							<td>60% - <75% (Perlu Perbaikan) </td>
							<td>2</td>
							<td>0,3</td>
						</tr>
						<tr>
							<td>75% - <90% (Baik)</td>
							<td>3</td>
							<td>0,5</td>
						</tr>
						<tr>
							<td>90% - <105% (Lebih Baik)</td>
							<td>4</td>
							<td>0,7</td>
						</tr>
						<tr>
							<td>105 - <120% (Sangat Baik)</td>
							<td>5</td>
							<td>0,8</td>
						</tr>
						<tr>
							<td>>=120% (Istimewa)</td>
							<td>6</td>
							<td>1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Prilaku -->
<div class="modal fade" id="modalPrilaku" tabindex="-1" role="dialog" aria-labelledby="modalMasaKerjaLabel" aria-hidden="true">
	<div class="modal-dialog">

		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title" id="modalMasaKerjaLabel">Tabel Kriteria Penilaian Prilaku</h4>
			</div>
			<div class="modal-body">
				<table class="table table-striped table-bordered table-hover" width="100%">
					<thead>
						<tr>
							<th data-class="expand">Kriteria</th>
							<th data-class="expand">Range</th>
							<th data-class="expand">Skala</th>
							<th data-class="expand">Bobot</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td rowspan="6">Penilaian Prilaku</td>
							<td>Prilaku yang ditunjukkan <40% (Tidak Baik) </td>
							<td>1</td>
							<td>0,2</td>
						</tr>
						<tr>
							<td>Prilaku yang ditunjukkan 40% - <60% (Perlu Perbaikan) </td>
							<td>2</td>
							<td>0,3</td>
						</tr>
						<tr>
							<td>Prilaku yang ditunjukkan 60% - <80% (Baik)</td>
							<td>3</td>
							<td>0,5</td>
						</tr>
						<tr>
							<td>Prilaku yang ditunjukkan 80% - <100% (Lebih Baik)</td>
							<td>4</td>
							<td>0,7</td>
						</tr>
						<tr>
							<td>Prilaku yang ditunjukkan <=100% dan menjadi panutan (Sangat Baik)</td>
							<td>5</td>
							<td>0,8</td>
						</tr>
						<tr>
							<td>Prilaku yang ditunjukkan <=100% dan panutan seta agen perubahan (Istimewa)</td>
							<td>6</td>
							<td>1</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">
					Cancel
				</button>
			</div>
		</div>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->




<script>
	const ___base_url = "<?= base_url() ?>";
</script>
