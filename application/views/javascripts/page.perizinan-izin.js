$(() => {
    // initialize responsive datatable
    $.initBasicTable('#dt_basic')
    const $table = $('#dt_basic').DataTable();
    $table.columns(4)
        .order('asc')
        .draw()

    // Fungsi cari
    $('#nama').select2({
        minimumInputLength: 1,
        ajax: {
            method: 'post',
            url: '<?= base_url() ?>perizinan/izin/cari',
            dataType: 'json',
            data: function (params) {
                return {
                    q: params.term
                }
            }
        }
    })

    const addRow = (data) => {
        let row = [
            data.nama,
            data.keterangan,
            data.tanggal_izin,
            data.tanggal_selesai,
            data.tanggal_kembali,
            `<div id="status-text-${data.id}">
            <span class="text-success">izin</span>
            </div>`,
            `
            <div id="btn-ubah-${data.id}">
            <button class="btn btn-primary btn-sm" onclick="Selesai(${data.id})">
                <i class="fa fa-edit"></i> Selesai
            </button>
            `
        ]

        let $node = $($table.row.add(row).draw().node())
        $node.attr('data-id', data.id)
    }

    // Edit Row
    const editRow = (id, data) => {
        let row = $table.row('[data-id=' + id + ']').index();

        $($table.row(row).node()).attr('data-id', id);
        $table.cell(row, 4).data(data.tanggal_kembali);


        $(`#btn-ubah-${data.id}`).html(`
            <button class="btn btn-primary btn-sm"  disabled>
            <i class="fa fa-edit"></i> Selesai
            </button>
        `);


        // status
        let color_status = "";
        if (data.status == 'izin') color_status = "text-success";
        else if (data.status == 'selesai') color_status = "text-primary";
        else color_status = "text-danger";
        let status = data.status;
        if (data.hitung > 0) {
            status = data.status + " " + data.hitung + " hari lebih awal";
        } else if (data.hitung < 0) {
            status = data.status + " " + Math.abs(Number(data.hitung)) + " hari";
        }

        $(`#status-text-${data.id}`).html(`
            <td class="${color_status}">${status}</td>
        `);
    }

    // Fungsi simpan tambah
    $('#form-tambah').submit((ev) => {
        ev.preventDefault();

        let nama = $("#nama").val();
        if (nama) {
            let id_santri = nama[0];
            let tanggal_izin = $('#tanggal_izin').val();
            let tanggal_selesai = $('#tanggal_selesai').val();
            let keterangan = $('#keterangan').val();
            window.apiClient.perizinanIzin.insert(id_santri, tanggal_izin, tanggal_selesai, keterangan)
                .done((data) => {
                    $.doneMessage('Berhasil ditambahkan.', 'Perizinan Santri')
                    addRow(data)

                })
                .fail(($xhr) => {
                    $.failMessage('Gagal ditambahkan. data mungkin sudah ada.', 'Perizinan Santri')
                }).
                always(() => {
                    $('#modalTambah').modal('toggle')
                })
        } else {
            $.failMessage('Gagal ditambahkan. Nama santri belum ditentukan', 'Perizinan Santri')
        }

    })


    // validasi nama
    $('#nama').on('change', function () {
        if (this.value) {
            $('#tanggal_selesai').attr("disabled", false);
            $('#tanggal_izin').attr("disabled", false);
            $('#keterangan').attr("disabled", false);
        } else {
            $('#tanggal_selesai').attr("disabled", true);
            $('#tanggal_izin').attr("disabled", true);
            $('#keterangan').attr("disabled", true);

        }
    })

    // Fungsi Selesai
    $('#OkCheck').click(() => {
        let id = $("#idCheck").val()
        window.apiClient.perizinanIzin.selesai(id)
            .done((data) => {
                $.doneMessage('Berhasil diubah.', 'Perizinan Santri')
                editRow(id, data);

            })
            .fail(($xhr) => {
                $.failMessage('Gagal diubah.', 'Perizinan Santri')
            }).
            always(() => {
                $('#ModalCheck').modal('toggle')
            })
    })
})

// Click Hapus
const Selesai = (id) => {
    $("#idCheck").val(id)
    $("#LabelCheck").text('Ubah data izin')
    $("#ContentCheck").text('Apakah anda yakin akan mengubah data ini?')
    $('#ModalCheck').modal('toggle')
}