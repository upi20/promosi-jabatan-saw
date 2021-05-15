$(() => {
	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(1)
		.order('asc')
		.draw()

	// Edit Row
	const editRow = (id, data) => {
		let row = $table.row('[data-id=' + id + ']').index()

		$($table.row(row).node()).attr('data-id', id)
		$table.cell(row, 2).data(data.masa_kerja + " Tahun")
		$table.cell(row, 3).data(data.kinerja)
		$table.cell(row, 4).data(data.prilaku)
	}


	$('#inp_data').submit((ev) => {
		ev.preventDefault()
		let id_user = $("#inp_id_user").val();
		let masa_kerja = $("#masa_kerja").val();
		let kinerja = $("#kinerja").val();
		let prilaku = $("#prilaku").val();
		if (id_user) {
			$(ev.target[6]).attr("disabled", "")
			window.apiClient.spk.simpan(id_user, masa_kerja, kinerja, prilaku)
				.done((data) => {
					$.doneMessage('Berhasil diubah.', 'SPK Input Nilai')
					editRow(data.id_user, data)
					$(ev.target[6]).removeAttr("disabled")
				})
				.fail(($xhr) => {
					$(ev.target[6]).removeAttr("disabled")
					$.failMessage('Gagal diubah.', 'SPK Input Nilai')
				})
		} else {
			$.failMessage('Gagal diubah. Pilih Karyawan terlebih dahulu', 'SPK Input Nilai')
		}
	})

	$("#OkCheck").click(() => {
		window.apiClient.spk.buka_kunci()
			.done((data) => {
				$("#btn-simpan").removeAttr("disabled");
				$.doneMessage('Berhasil, kunci dilepas dan pengumuman ditarik.', 'SPK Input Nilai')
				window.apiClient.spk.reset()
					.done((data) => {
						$("#btn-simpan").removeAttr("disabled");
						$.doneMessage('Berhasil, Reset data nilai karyawan', 'SPK Input Nilai')
						setTimeout(function () {
							location.reload();
						}, 1000)
					})
					.fail(($xhr) => {
						$("#btn-lepas").removeAttr("disabled");
						$("#btn-simpan").attr("disabled", "");
						$.failMessage('Gagal, Reset data nilai karyawan', 'SPK Input Nilai')
					})
			})
			.fail(($xhr) => {
				$("#btn-lepas").removeAttr("disabled");
				$("#btn-simpan").attr("disabled", "");
				$.failMessage('Gagal, kunci dilepas dan pengumuman ditarik.', 'SPK Input Nilai')
			})
		$('#ModalCheck').modal('toggle')
	});
})

// Click Ubah
const Ubah = (data) => {
	$("#inp_id_user").val(data.dataset.id);
	$("#inp_user_nama").val(data.dataset.nama);
	$("#masa_kerja").val(data.dataset.masa_kerja);
	$("#kinerja").val(data.dataset.kinerja);
	$("#prilaku").val(data.dataset.prilaku);
	$("#masa_kerja").focus();
}

const reset_data = () => {
	$("#idCheck").val(1)
	$("#LabelCheck").text('Reset Data Nilai')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus semua data nilai ?')
	$('#ModalCheck').modal('toggle')
}
