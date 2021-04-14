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
			data.level,
			data.username,
			data.nama,
			data.telepon,
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
		$table.cell(row, 0).data(data.level)
		$table.cell(row, 1).data(data.username)
		$table.cell(row, 2).data(data.nama)
		$table.cell(row, 3).data(data.telepon)
		$table.cell(row, 4).data(data.status)
	}

	// Delete Row
	const deleteRow = (id) => {
		$table.row('[data-id=' + id + ']').remove().draw()
	}





	// Ulang password
	$('#upassword').on('change', () => {
		let password = $('#password').val()
		let upassword = $('#upassword').val()

		if (upassword != password) {
			$.failMessage('Password tidak sama.', 'Pengaturan Pengguna')

			$('#submit').prop('disabled', 'disabled')
		}
		else {
			$.doneMessage('Password sama.', 'Pengaturan Pengguna')

			$('#submit').prop('disabled', false)
		}
	})

	// Fungsi simpan
	$('#form').submit((ev) => {
		ev.preventDefault()

		let id = $('#id').val()
		let level = $('#level').val()
		let nama = $('#nama').val()
		let telepon = $('#phone').val()
		let username = $('#username').val()
		let password = $('#password').val()
		let status = $('#status').val()

		if (id == 0) {

			// Insert

			window.apiClient.pengaturanPengguna.insert(level, nama, telepon, username, password, status)
				.done((data) => {
					$.doneMessage('Berhasil ditambahkan.', 'Pengaturan Pengguna')
					addRow(data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal ditambahkan.', 'Pengaturan Pengguna')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
		else {

			// Update

			window.apiClient.pengaturanPengguna.update(id, level, nama, telepon, username, password, status)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'Pengaturan Pengguna')
					editRow(id, data)

				})
				.fail(($xhr) => {
					$.failMessage('Gagal diubah.', 'Pengaturan Pengguna')
				}).
				always(() => {
					$('#myModal').modal('toggle')
				})
		}
	})

	// Fungsi Delete
	$('#OkCheck').click(() => {

		let id = $("#idCheck").val()

		window.apiClient.pengaturanPengguna.delete(id)
			.done((data) => {
				$.doneMessage('Berhasil dihapus.', 'Pengaturan Pengguna')
				deleteRow(id)

			})
			.fail(($xhr) => {
				$.failMessage('Gagal dihapus.', 'Pengaturan Pengguna')
			}).
			always(() => {
				$('#ModalCheck').modal('toggle')
			})
	})

	// Clik Tambah
	$('#tambah').on('click', () => {
		$('#myModalLabel').html('Tambah Pengguna')
		$('#id').val('')
		$('#level').val('')
		$('#nama').val('')
		$('#phone').val('')
		$('#username').val('')
		$('#password').val('')
		$('#upassword').val('')
		$('#status').val('')

		$('#myModal').modal('toggle')
	})

})

// Click Hapus
const Hapus = (id) => {
	$("#idCheck").val(id)
	$("#LabelCheck").text('Hapus data santri')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus data ini?')
	$('#ModalCheck').modal('toggle')
}

// Click Ubah
const Ubah = (id) => {
	window.apiClient.pengaturanPengguna.detail(id)
		.done((data) => {

			$('#myModalLabel').html('Ubah Pengguna')
			$('#id').val(data.id)
			$('#level').val(data.level)
			$('#nama').val(data.nama)
			$('#phone').val(data.phone)
			$('#username').val(data.username)
			$('#status').val(data.status)

			$('#myModal').modal('toggle')
		})
		.fail(($xhr) => {
			$.failMessage('Gagal mendapatkan data.', 'Pengaturan Pengguna')
		})
}