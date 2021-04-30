<div id="content">
	<div class="row">
		<div class="col-xs-12 col-sm-7 col-md-7 col-lg-4">
			<h1 class="page-title txt-color-blueDark"> <i class="fa-fw fa fa-table"></i> <?= $title ?></h1>
		</div>
	</div>
	<section id="widget-grid" class="">
		<div class="row">
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="jarviswidget" id="wid-id-0" data-widget-colorbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
					<header> <span class="widget-icon"> <i class="fa fa-table"></i> </span> </header>
					<div>
						<div class="jarviswidget-editbox">
							<input class="form-control" type="text">
						</div>
						<div class="widget-body">
							<div class="pull-right">
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah"> <i class="fa fa-plus"></i> Tambah </button>
							</div>
							<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
								<thead>
									<tr>
										<th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Divisi</th>
										<th data-class="expand"><i class="fa fa-fw fa-info text-muted hidden-md hidden-sm hidden-xs"></i> Keterangan</th>
										<th><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($divisi as $d) : ?>
										<tr data-id="<?= $d['id'] ?>">
											<td><?php echo $d['nama']; ?></td>
											<td><?php echo $d['keterangan']; ?></td>
											<td>
												<div id="btn-ubah-<?= $d['id'] ?>">
													<button class="btn btn-primary btn-sm" data-id="<?= $d['id'] ?>" data-nama="<?php echo $d['nama']; ?>" data-keterangan="<?php echo $d['keterangan']; ?>" onclick="Ubah(this)" data-toggle="modal" data-target="#modalUbah">
														<i class="fa fa-edit"></i> Ubah
													</button>
													<button class="btn btn-danger btn-sm" onclick="Hapus(<?= $d['id'] ?>)">
														<i class="fa fa-trash"></i> Hapus
													</button>
												</div>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</article>
		</div>
		<div class="row">
			<div class="col-sm-12"> </div>
		</div>
	</section>
</div>

<!-- Modal tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="form-tambah">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Divisi</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama">Nama Divisi</label>
								<input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Divisi" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="keterangan">Keterangan</label>
								<input type="text" id="keterangan" class="form-control" name="keterangan" placeholder="Keterangan" required />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="submit"> Simpan </button> <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal </button>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- modal ubah -->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form id="form-ubah">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalUbahLabel">Ubah Data Divisi</h5> <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="nama">Nama Divisi</label>
								<input type="text" id="id-ubah" name="id-ubah" style="display:none" />
								<input type="text" id="nama-ubah" class="form-control" name="nama-ubah" placeholder="Nama Divisi" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="form-group">
								<label for="keterangan-ubah">Keterangan</label>
								<input type="text" id="keterangan-ubah" class="form-control" name="keterangan-ubah" placeholder="Keterangan-ubah" required />
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary" id="submit-ubah"> Simpan </button> <button type="button" class="btn btn-danger" data-dismiss="modal"> Batal </button>
				</div>
			</div>
		</form>
	</div>
</div>
