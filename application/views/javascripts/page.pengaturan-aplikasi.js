$(() => {
	// Save application name
	$('#app_name').submit((ev) => {
		ev.preventDefault()
		let inp = $("#app_name_input");
		inp.attr("disabled", "true");
		window.apiClient.pengaturanAplikasi.app_name(inp.val())
			.done((data) => {
				inp.removeAttr("disabled")
				$.doneMessage('Berhasil diubah.', 'Pengaturan Aplikasi')
			})
			.fail(($xhr) => {
				inp.removeAttr("disabled")
				$.failMessage('Gagal diubah.', 'Pengaturan Aplikasi')
			})

	})

	// Save copyhright
	$('#copyright').submit((ev) => {
		ev.preventDefault()
		let inp = $("#copyright_input");
		inp.attr("disabled", "true");
		window.apiClient.pengaturanAplikasi.copyright(inp.val())
			.done((data) => {
				inp.removeAttr("disabled")
				$.doneMessage('Berhasil diubah.', 'Pengaturan Aplikasi')
			})
			.fail(($xhr) => {
				inp.removeAttr("disabled")
				$.failMessage('Gagal diubah.', 'Pengaturan Aplikasi')
			})

	})

	// Save page layout option
	$('#page_setting').submit((ev) => {
		ev.preventDefault()
		let inp = $("#page_setting_input");
		inp.attr("disabled", "true");
		window.apiClient.pengaturanAplikasi.page_setting(inp.val())
			.done((data) => {
				inp.removeAttr("disabled")
				$.doneMessage('Berhasil diubah.', 'Pengaturan Aplikasi')
			})
			.fail(($xhr) => {
				inp.removeAttr("disabled")
				$.failMessage('Gagal diubah.', 'Pengaturan Aplikasi')
			})

	})


	// Save template type
	$("#template_type").change(function () {
		let inp = $(this);
		inp.attr("disabled", "true");
		window.apiClient.pengaturanAplikasi.template_type(inp.val())
			.done((data) => {
				inp.removeAttr("disabled")
				$.doneMessage('Berhasil diubah.', 'Pengaturan Aplikasi')
			})
			.fail(($xhr) => {
				inp.removeAttr("disabled")
				$.failMessage('Gagal diubah.', 'Pengaturan Aplikasi')
			})
	});

})
