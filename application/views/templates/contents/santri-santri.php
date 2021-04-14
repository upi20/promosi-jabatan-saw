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
                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalTambah">
                                    <i class="fa fa-plus"></i> Tambah
                                </button>
                            </div>

                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                <thead>
                                    <tr>
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> JK</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> Tgl Lahir</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> Alamat</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-child text-muted hidden-md hidden-sm hidden-xs"></i> No Telepon</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Kelas</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Tingkat</th>
                                        <th data-hide="expand"><i class="fa fa-fw fa-star-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Ruang</th>
                                        <th data-hide="expand"><i class="fa fa-fw fa-star-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Tahun Ajaran</th>
                                        <th data-hide="expand"><i class="fa fa-fw fa-star-align-justify text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                                        <th><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($records as $q) : ?>
                                        <tr data-id="<?= $q['id_santri'] ?>">
                                            <td><?= $q['nama'] ?></td>
                                            <td><?= $q['jenis_kelamin'] ?></td>
                                            <td><?= $q['tanggal_lahir'] ?></td>
                                            <td><?= $q['alamat'] ?></td>
                                            <td><?= $q['no_hp'] ?></td>
                                            <td><?= $q['kelas'] ?></td>
                                            <td><?= $q['tingkat'] ?></td>
                                            <td><?= $q['ruang'] ?></td>
                                            <td><?= $q['tahun_ajaran'] ?></td>
                                            <td><?= $q['status'] ?></td>
                                            <td>
                                                <div>
                                                    <button class="btn btn-primary btn-sm" onclick="Ubah(<?= $q['id_santri'] ?>)">
                                                        <i class="fa fa-edit"></i> Ubah
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['id_santri'] ?>)">
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


<!-- Modal Tambah -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-tambah">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Lengkap" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="tanggal_lahir" class="form-control" name="tanggal_lahir" placeholder="Tanggal Lahir" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="no_telepon">Nomor Telepon</label>
                            <input type="number" id="no_telepon" class="form-control" name="no_telepon" placeholder="Nomor Telepon" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat_lengkap">Alamat Lengkap</label>
                                <textarea class="form-control" id="alamat_lengkap" rows="3" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tahun_ajaran">Tahun Ajaran</label>
                            <select class="form-control" name="tahun_ajaran" id="tahun_ajaran">
                                <?php foreach ($TahunAjaran as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="tingkat">Tingkat</label>
                            <select class="form-control" name="tingkat" id="tingkat">
                                <?php foreach ($Tingkat as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kelas">Kelas</label>
                            <select class="form-control" name="kelas" id="kelas">
                                <?php foreach ($Kelas as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ruang">Ruang</label>
                            <select class="form-control" name="ruang" id="ruang">
                                <?php foreach ($Ruang as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Modal Tambah -->
<div class="modal fade" id="modalUbah" tabindex="-1" role="dialog" aria-labelledby="modalUbahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="form-ubah">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Data Santri</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ubah-nama">Nama Lengkap</label>
                                <input type="text" id="ubah-id_santri" class="form-control" style="display:none" />
                                <input type="text" id="ubah-nama" class="form-control" name="nama" placeholder="Nama Lengkap" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ubah-jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" name="ubah-jenis_kelamin" id="ubah-jenis_kelamin">
                                <option value="laki-laki">Laki-Laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ubah-tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" id="ubah-tanggal_lahir" class="form-control" name="ubah-tanggal_lahir" placeholder="Tanggal Lahir" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ubah-no_hp">Nomor Telepon</label>
                            <input type="number" id="ubah-no_hp" class="form-control" name="ubah-no_hp" placeholder="Nomor Telepon" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="ubah-alamat">Alamat Lengkap</label>
                                <textarea class="form-control" id="ubah-alamat" rows="3" name="alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ubah-tahun_ajaran">Tahun Ajaran</label>
                            <select class="form-control" name="ubah-tahun_ajaran" id="ubah-tahun_ajaran">
                                <?php foreach ($TahunAjaran as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ubah-tingkat">Tingkat</label>
                            <select class="form-control" name="ubah-tingkat" id="ubah-tingkat">
                                <?php foreach ($Tingkat as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="ubah-kelas">Kelas</label>
                            <select class="form-control" name="ubah-kelas" id="ubah-kelas">
                                <?php foreach ($Kelas as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="ubah-ruang">Ruang</label>
                            <select class="form-control" name="ubah-ruang" id="ubah-ruang">
                                <?php foreach ($Ruang as $k) : ?>
                                    <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="ubah-status">Status</label>
                            <select class="form-control" name="ubah-status" id="ubah-status">
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit-ubah">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>