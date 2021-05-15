$(() => {
	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(4)
		.order('asc')
		.draw()
	let tbl = $('.tabel');
	for (let i = 0; i < tbl.length; i++) {
		$(tbl[i]).DataTable();
	}

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

const simpan_kunci = () => {
	$("#btn-simpan").attr("disabled", "");
	window.apiClient.spk.simpan_kunci()
		.done((data) => {
			$("#btn-lepas").removeAttr("disabled");
			$.doneMessage('Berhasil dikunci dan diumumkan.', 'SPK Input Nilai')
		})
		.fail(($xhr) => {
			$("#btn-simpan").removeAttr("disabled");
			$("#btn-lepas").attr("disabled", "");
			$.failMessage('Gagal dikunci dan diumumkan.', 'SPK Input Nilai')
		})
}

const buka_kunci = () => {
	$("#btn-lepas").attr("disabled", "");
	window.apiClient.spk.buka_kunci()
		.done((data) => {
			$("#btn-simpan").removeAttr("disabled");
			$.doneMessage('Berhasil, kunci dilepas dan pengumuman ditarik.', 'SPK Input Nilai')
		})
		.fail(($xhr) => {
			$("#btn-lepas").removeAttr("disabled");
			$("#btn-simpan").attr("disabled", "");
			$.failMessage('Gagal, kunci dilepas dan pengumuman ditarik.', 'SPK Input Nilai')
		})
}

const reset_data = () => {
	$("#idCheck").val(1)
	$("#LabelCheck").text('Reset Data Nilai')
	$("#ContentCheck").text('Apakah anda yakin akan menghapus semua data nilai ?')
	$('#ModalCheck').modal('toggle')
}
