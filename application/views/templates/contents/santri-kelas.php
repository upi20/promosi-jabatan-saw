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
                                        <th><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($Kelas as $q) : ?>
                                        <tr data-id="<?= $q['id'] ?>">
                                            <td><?= $q['nama'] ?></td>
                                            <td>
                                                <div id="btn-ubah-<?= $q['id'] ?>">
                                                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUbah" data-id="<?= $q['id'] ?>" data-nama="<?= $q['nama'] ?>" onclick="Ubah(this)">
                                                        <i class="fa fa-edit"></i> Ubah
                                                    </button>
                                                    <button class="btn btn-danger btn-sm" onclick="Hapus(<?= $q['id'] ?>)">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Kelas</label>
                                <input type="text" id="nama" class="form-control" name="nama" placeholder="Nama Kelas" required />
                            </div>
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
                    <h5 class="modal-title" id="modalUbahLabel">Ubah Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Kelas</label>
                                <input type="text" id="id-ubah" name="id-ubah" style="display:none" />
                                <input type="text" id="nama-ubah" class="form-control" name="nama-ubah" placeholder="Nama Kelas" required />
                            </div>
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
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->