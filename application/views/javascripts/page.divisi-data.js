$(() => {
	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable();
	$table.columns(0)
		.order('asc')
		.draw()

	// Add Row
	const addRow = (data) => {
		let row = [
			data.nama,
			data.keterangan,
			`
            <div id="btn-ubah-${data.id}">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUbah" data-id="${data.id}" data-nama="${data.nama}" onclick="Ubah(this)">
                <i class="fa fa-edit"></i> Ubah
            </button>
            <button class="btn btn-danger btn-sm" onclick="Hapus(${data.id})">
                <i class="fa fa-trash"></i> Hapus
            </button>
            </div>
            `
		]

		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id)
	}

	// Edit Row
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index();

		$($table.row(row).node()).attr('data-id', id);
		$table.cell(row, 0).data(data.nama);
		$table.cell(row, 1).data(data.keterangan);
		let btn = $(`#btn-ubah-${data.id}`);
		btn.html(`
        <div id="btn-ubah-${data.id}">
        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalUbah" data-id="${data.id}" data-nama="${data.nama}" data-keterangan="${data.keterangan}" onclick="Ubah(this)">
            <i class="fa fa-edit"></i> Ubah
        </button>
        <button class="btn btn-danger btn-sm" onclick="Hapus(${data.id})">
            <i class="fa fa-trash"></i> Hapus
        </button>
        </div>
        `);
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}

	// Fungsi simpan tambah
	$('#form-tambah').submit((ev) => {
		ev.preventDefault();

		let nama = $("#nama").val();
		let keterangan = $("#keterangan").val();

		window.apiClient.divisiData.insert(nama, keterangan)
			.done((data) => {
				$.doneMessage('Berhasil ditambahkan.', 'Data Divisi')
				addRow(data)
			})
			.fail(($xhr) => {
				$.failMessage('Gagal ditambahkan. data mungkin sudah ada.', 'Data Divisi')
			}).
			always(() => {
				$('#modalTambah').modal('toggle')
			})
	})


	// Fungsi Update
	$('#form-ubah').submit((ev) => {
		ev.preventDefault();

		let id = $("#id-ubah").val();
		let nama = $("#nama-ubah").val();
		let keterangan = $("#keterangan-ubah").val();

		window.apiClient.divisiData.update(id, nama, keterangan)
			.done((data) => {
				$.doneMessage('Berhasil diubah.', 'Data Divisi')
				editRow(id, data)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal diubah. data mungkin sudah ada.', 'Data Divisi')
			}).
			always(() => {
				$('#modalUbah').modal('toggle')
			})
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()
		window.apiClient.divisiData.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Data Divisi')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Data Divisi')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

})

// Click Hapus
const Hapus = (id) => {
	$("#idCheck").val(id)
	$("#LabelCheck").text('Hapus Kelas Santri')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
	$('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (data) => {
	$("#id-ubah").val(data.dataset.id);
	$("#nama-ubah").val(data.dataset.nama);
	$("#keterangan-ubah").val(data.dataset.keterangan);
}
