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

							<div class="pull-right">
								<button class="btn btn-success btn-sm" id="tambah">
									<i class="fa fa-plus"></i> Tambah
								</button>
							</div>

							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Parent</th>
										<th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> Nama</th>
										<th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Keterangan</th>
										<th data-class="expand"><i class="fa fa-fw fa-list-ol text-muted hidden-md hidden-sm hidden-xs"></i> Index</th>
										<th data-class="expand"><i class="fa fa-fw fa-desktop text-muted hidden-md hidden-sm hidden-xs"></i> Icon</th>
										<th data-class="expand"><i class="fa fa-fw fa-link text-muted hidden-md hidden-sm hidden-xs"></i> Url</th>
										<th data-hide="phone"><i class="fa fa-fw fa-star-half-o text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
										<th><i class="fa fa-fw fa-thumb-tack text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1;
									foreach ($records as $q) : ?>
										<tr data-id="<?= $q['menu_id'] ?>">
											<td><?= $q['parent'] ?></td>
											<td><?= $q['menu_nama'] ?></td>
											<td><?= $q['menu_keterangan'] ?></td>
											<td><?= $q['menu_index'] ?></td>
											<td><i class="<?= $q['menu_icon'] ?>"></i> <?= $q['menu_icon'] ?></td>
											<td><?= $q['menu_url'] ?></td>
											<td><?= $q['menu_status'] ?></td>
											<td>
												<div>
													<button class="btn btn-primary btn-sm" onclick="Ubah(<?= $q['menu_id'] ?>)">
														<i class="fa fa-edit"></i> Ubah
													</button>
													<button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['menu_id'] ?>)">
														<i class="fa fa-trash"></i> Hapus
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
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="form">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;
					</button>
					<h4 class="modal-title" id="myModalLabel"></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" name="id" id="id">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Parent</label>
								<select class="form-control" name="menu_menu_id" id="menu_menu_id">
									<option value="">--Pilih Menu--</option>
									<?php foreach ($parent as $p) : ?>
										<option value="<?= $p['menu_id'] ?>"><?= $p['menu_nama'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Menu</label>
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Menu" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Index</label>
								<input type="number" id="index" class="form-control" name="index" placeholder="Index ke" required />
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Icon</label>
								<input type="text" id="icon" class="form-control" name="icon" placeholder="Icon" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama"> Status</label>
								<select class="form-control" required id="status">
									<option value="">--Pilih Status--</option>
									<option value="Aktif">Aktif</option>
									<option value="Tidak Aktif">Tidak Aktif</option>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="tanggal">Url</label>
								<input type="text" id="url" class="form-control" name="url" placeholder="Hyperlink" required />
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama"> Keterangan</label>
								<textarea class="form-control" id="keterangan" placeholder="Keterangan" rows="3" required></textarea>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">
						Submit
					</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">
						Cancel
					</button>
				</div>
			</div><!-- /.modal-content -->
		</form>
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->