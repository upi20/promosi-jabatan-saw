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
                                        <th data-class="expand"><i class="fa fa-fw fa-user text-muted hidden-md hidden-sm hidden-xs"></i> Nama Santri</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-info text-muted hidden-md hidden-sm hidden-xs"></i> Keterangan</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal Izin</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal Selesai</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-calendar text-muted hidden-md hidden-sm hidden-xs"></i> Tanggal kembali</th>
                                        <th data-class="expand"><i class="fa fa-fw fa-info text-muted hidden-md hidden-sm hidden-xs"></i> Status</th>
                                        <th><i class="fa fa-fw fa-align-justify text-muted hidden-md hidden-sm hidden-xs"></i>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($records as $q) :
                                        if ($q['status'] == 'izin') $color_status = "text-success";
                                        else if ($q['status'] == 'selesai') $color_status = "text-primary";
                                        else $color_status = "text-danger";
                                        $status = $q['status'];
                                        if ($q['hitung'] > 0) {
                                            $status = $q['status'] . " " . $q['hitung'] . " hari lebih awal";
                                        } else if ($q['hitung'] < 0) {
                                            $status = $q['status'] . " " . abs($q['hitung']) . " hari";
                                        }


                                    ?>
                                        <tr data-id="<?= $q['id'] ?>">
                                            <td><?= $q['nama'] ?></td>
                                            <td><?= $q['keterangan'] ?></td>
                                            <td><?= $q['tanggal_izin'] ?></td>
                                            <td><?= $q['tanggal_selesai'] ?></td>
                                            <td><?= $q['tanggal_kembali'] ?></td>
                                            <td>
                                                <div id="status-text-<?= $q['id'] ?>">
                                                    <span class="<?= $color_status ?>"><?= $status ?></span>
                                                </div>
                                            </td>
                                            <td>
                                                <div id="btn-ubah-<?= $q['id'] ?>">
                                                    <?php if ($q['status'] != 'izin') : ?>
                                                        <button class="btn btn-primary btn-sm" onclick="Selesai(<?= $q['id'] ?>)" disabled>
                                                            <i class="fa fa-edit"></i> Selesai
                                                        </button>
                                                    <?php else : ?>
                                                        <button class="btn btn-primary btn-sm" onclick="Selesai(<?= $q['id'] ?>)">
                                                            <i class="fa fa-edit"></i> Selesai
                                                        </button>
                                                    <?php endif; ?>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Perizinan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="nama">Nama Santri</label>
                                <select id="nama" multiple style="width:100%" class="select2" data-select-search="true">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_izin">Tanggal Izin</label>
                                <input type="date" id="tanggal_izin" class="form-control" name="tanggal_izin" placeholder="Tanggal Izin" required disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" id="tanggal_selesai" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai" required disabled />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan Izin</label>
                                <input type="text" id="keterangan" class="form-control" name="keterangan" placeholder="Keterangan Izin" required disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit-tambah">
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