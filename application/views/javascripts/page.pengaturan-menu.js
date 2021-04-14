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
			data.parent,
			data.nama,
			data.keterangan,
			data.index,
			'<i class="' + data.icon + '"></i> ' + data.icon,
			data.url,
			data.status,
			'<div>'
			+ '<button class="btn btn-primary btn-sm" onclick="Ubah(' + data.id + ')"><i class="fa fa-edit"></i> Ubah</button>'
			+ '<button class="btn btn-danger btn-sm" onclick="Hapus(' + data.id + ')"><i class="fa fa-trash"></i> Hapus</button>'
			+ '</div>'
		]

		let $node = $($table.row.add(row).draw().node())
		$node.attr('data-id', data.id)
	}

	// Edit Row
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index()

		$($table.row(row).node()).attr('data-id', id)
		$table.cell(row, 0).data(data.parent)
		$table.cell(row, 1).data(data.nama)
		$table.cell(row, 2).data(data.keterangan)
		$table.cell(row, 3).data(data.index)
		$table.cell(row, 4).data('<i class="' + data.icon + '"></i> ' + data.icon)
		$table.cell(row, 5).data(data.url)
		$table.cell(row, 6).data(data.status)
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}





	// Fungsi simpan
	$('#form').submit((ev) => {
		ev.preventDefault()

		let id = $('#id').val()
		let menu_menu_id = $('#menu_menu_id').val()
		let nama = $('#nama').val()
		let index = $('#index').val()
		let icon = $('#icon').val()
		let url = $('#url').val()
		let keterangan = $('#keterangan').val()
		let status = $('#status').val()

		if (id == 0) {

			// Insert

			window.apiClient.pengaturanMenu.insert(menu_menu_id, nama, index, icon, url, keterangan, status)
				.done((data) => {
					$.doneMessage('Berhasil ditambahkan.', 'Pengaturan Menu')
					addRow(data)
					console.log(data);

				})
				.fail(($xhr) => {
					$.failMessage('Gagal ditambahkan.', 'Pengaturan Menu')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
		else {

			// Update

			window.apiClient.pengaturanMenu.update(id, menu_menu_id, nama, index, icon, url, keterangan, status)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'Pengaturan Menu')
					editRow(id, data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal diubah.', 'Pengaturan Menu')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()

		window.apiClient.pengaturanMenu.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Pengaturan Menu')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Pengaturan Menu')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

	// Clik Tambah
	$('#tambah').on('click', () => {
		$('#myModalLabel').html('Tambah Menu')
		$('#id').val('')
		$('#menu_menu_id').val('')
		$('#nama').val('')
		$('#index').val('')
		$('#icon').val('')
		$('#url').val('')
		$('#keterangan').val('')
		$('#status').val('')

		$('#myModal').modal('toggle')
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
	window.apiClient.pengaturanMenu.detail(id)
		.done((data) => {

			$('#myModalLabel').html('Ubah Menu')
			$('#id').val(data.id)
			$('#menu_menu_id').val(data.parent)
			$('#nama').val(data.nama)
			$('#index').val(data.index)
			$('#icon').val(data.icon)
			$('#url').val(data.url)
			$('#keterangan').val(data.keterangan)
			$('#status').val(data.status)

			$('#myModal').modal('toggle')
		})
		.fail(($xhr) => {
			$.failMessage('Gagal mendapatkan data.', 'Pengaturan Menu')
		})
}