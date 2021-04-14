$(() => {
    // initialize responsive datatable
    $.initBasicTable('#dt_basic')
    const $table = $('#dt_basic').DataTable()
    $table.columns(0)
        .order('asc')
        .draw()

    // Add Row
    const addRow = (data) => {
        let row = [
            data.nama,
            data.jenis_kelamin,
            data.tanggal_lahir,
            data.alamat,
            data.no_hp,
            data.kelas,
            data.tingkat,
            data.ruang,
            data.tahun_ajaran,
            data.status,
            '<div>'
            + '<button class="btn btn-primary btn-sm" onclick="Ubah(' + data.id_santri + ')"><i class="fa fa-edit"></i> Ubah</button>'
            + '<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id_santri + ')"><i class="fa fa-trash"></i> Hapus</button>'
            + '</div>'
        ]

        let $node = $($table.row.add(row).draw().node())
        $node.attr('data-id', data.id_santri)
    }

    // Edit Row
    const editRow = (id, data) => {
        let row = $table.row('[data-id=' + id + ']').index()

        $($table.row(row).node()).attr('data-id', id)
        $table.cell(row, 0).data(data.nama)
        $table.cell(row, 1).data(data.jenis_kelamin)
        $table.cell(row, 2).data(data.tanggal_lahir)
        $table.cell(row, 3).data(data.alamat)
        $table.cell(row, 4).data(data.no_hp)
        $table.cell(row, 5).data(data.kelas)
        $table.cell(row, 6).data(data.ringkat)
        $table.cell(row, 7).data(data.ruang)
        $table.cell(row, 8).data(data.tahun_ajaran)
        $table.cell(row, 9).data(data.status)
    }

    // Delete Row
    const deleteRow = (id) => {
        $table.row('[data-id=' + id + ']').remove().draw()
    }

    // Fungsi simpan tambah
    $('#form-tambah').submit((ev) => {
        ev.preventDefault();
        let tingkat_id = $("#tingkat").val();
        let kelas_id = $("#kelas").val();
        let ruang_id = $("#ruang").val();
        let tahun_ajaran_id = $("#tahun_ajaran").val();
        let nama = $("#nama").val();
        let jenis_kelamin = $("#jenis_kelamin").val();
        let alamat = $("#alamat_lengkap").val();
        let status = $("#status").val();
        let tanggal_lahir = $("#tanggal_lahir").val();
        let no_hp = $("#no_telepon").val();

        window.apiClient.santriSantri.insert(tingkat_id, kelas_id, ruang_id, tahun_ajaran_id, nama, jenis_kelamin, alamat, status, tanggal_lahir, no_hp)
            .done((data) => {
                $.doneMessage('Berhasil ditambahkan.', 'Santri Santri')
                addRow(data)
            })
            .fail(($xhr) => {
                $.failMessage('Gagal ditambahkan.', 'Santri Santri')
            }).
            always(() => {
                $('#modalTambah').modal('toggle')
            })
    })

    // Fungsi simpan tambah
    $('#form-ubah').submit((ev) => {
        ev.preventDefault();
        let id_santri = $("#ubah-id_santri").val();
        let alamat = $("#ubah-alamat").val();
        let jenis_kelamin = $("#ubah-jenis_kelamin").val();
        let nama = $("#ubah-nama").val();
        let no_hp = $("#ubah-no_hp").val();
        let status = $("#ubah-status").val();
        let tanggal_lahir = $("#ubah-tanggal_lahir").val();
        let tahun_ajaran_id = $("#ubah-tahun_ajaran").val();
        let kelas_id = $("#ubah-kelas").val();
        let ruang_id = $("#ubah-ruang").val();
        let tingkat_id = $("#ubah-tingkat").val();

        window.apiClient.santriSantri.update(id_santri, tingkat_id, kelas_id, ruang_id, tahun_ajaran_id, nama, jenis_kelamin, alamat, status, tanggal_lahir, no_hp)
            .done((data) => {
                editRow(id_santri, data);
                $.doneMessage('Berhasil Diubah.', 'Santri Santri')
            })
            .fail(($xhr) => {
                $.failMessage('Gagal Diubah.', 'Santri Santri')
            }).
            always(() => {
                $('#modalUbah').modal('toggle')
            })
    })

    // Fungsi Delete
    $('#OkCheck').click(() => {

        let id = $("#idCheck").val()
        window.apiClient.santriSantri.delete(id)
            .done((data) => {
                $.doneMessage('Berhasil dihapus.', 'Santri Santri')
                deleteRow(id)

            })
            .fail(($xhr) => {
                $.failMessage('Gagal dihapus.', 'Santri Santri')
            }).
            always(() => {
                $('#ModalCheck').modal('toggle')
            })
    })
})

// Click Hapus
const Hapus = (id) => {
    $("#idCheck").val(id)
    $("#LabelCheck").text('Form Hapus')
    $("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
    $('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (id) => {
    window.apiClient.santriSantri.detail(id)
        .done((data) => {
            $("#ubah-alamat").val(data.alamat);
            $("#ubah-id_santri").val(data.id_santri);
            $("#ubah-jenis_kelamin").val(data.jenis_kelamin);
            $("#ubah-nama").val(data.nama);
            $("#ubah-no_hp").val(data.no_hp);
            $("#ubah-status").val(data.status);
            $("#ubah-tanggal_lahir").val(data.tanggal_lahir);
            $("#ubah-tahun_ajaran").val(data.id_tahun_ajaran);
            $("#ubah-kelas").val(data.id_kelas);
            $("#ubah-ruang").val(data.id_ruang);
            $("#ubah-tingkat").val(data.id_tingkat);
            $('#modalUbah').modal('toggle')
        })
        .fail(($xhr) => {
            $.failMessage('Gagal mendapatkan data.', 'Santri Santri')
        })
}