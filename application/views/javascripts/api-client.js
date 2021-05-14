$(() => {

	const initAjax = () => {
		$.ajaxSetup({
			accepts: ['application/json'],
			dataType: 'json'
		})
	}

	window.apiClient =
	{
		login:
		{

			cekLogin(username, password) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>login/doLogin',
					data:
					{
						username: username,
						password: password
					}
				})
			}

		},
		pengaturanLevel:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/jabatan/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/jabatan/insert',
					data:
					{
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, nama, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/jabatan/update',
					data:
					{
						id: id,
						nama: nama,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/jabatan/delete',
					data:
					{
						id: id
					}
				})
			},
			deleteHakAkses(level, menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/HakAksesLevel/delete',
					data:
					{
						level: level,
						menu: menu
					}
				})
			},
			insertHakAkses(level, menu) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/HakAksesLevel/insert',
					data:
					{
						level: level,
						menu: menu
					}
				})
			}

		},
		pengaturanMenu:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/insert',
					data:
					{
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			update(id, menu_menu_id, nama, index, icon, url, keterangan, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/update',
					data:
					{
						id: id,
						menu_menu_id: menu_menu_id,
						nama: nama,
						index: index,
						icon: icon,
						url: url,
						keterangan: keterangan,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/menu/delete',
					data:
					{
						id: id
					}
				})
			},

		},
		pengaturanPengguna:
		{

			detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/getDataDetail',
					data:
					{
						id: id
					}
				})
			},

			insert(level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/insert',
					data:
					{
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			update(id, level, nama, telepon, username, password, status) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/update',
					data:
					{
						id: id,
						level: level,
						nama: nama,
						telepon: telepon,
						username: username,
						password: password,
						status: status
					}
				})
			},

			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/pengguna/delete',
					data:
					{
						id: id
					}
				})
			},

		},
		pengaturanAplikasi: {
			app_name(value) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/aplikasi/app_name',
					data:
					{
						value: value
					}
				})
			},
			copyright(value) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/aplikasi/copyright',
					data:
					{
						value: value
					}
				})
			},
			page_setting(value) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/aplikasi/page_setting',
					data:
					{
						value: value
					}
				})
			},
			template_type(value) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>pengaturan/aplikasi/template_type',
					data:
					{
						value: value
					}
				})
			}


		},
		spk: {
			simpan(id_user, masa_kerja, kinerja, prilaku) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>/spk/inputnilai/simpan',
					data:
					{
						id_user: id_user,
						masa_kerja: masa_kerja,
						kinerja: kinerja,
						prilaku: prilaku,
					}
				})
			},
		},
		format:
		{

			number(angka, prefix) {
				if (angka) {
					let number_string = angka.toString().replace(/[^,\d]/g, '').toString(),
						split = number_string.split(','),
						sisa = split[0].length % 3,
						rupiah = split[0].substr(0, sisa),
						ribuan = split[0].substr(sisa).match(/\d{3}/gi)

					// tambahkan titik jika yang di input sudah menjadi angka ribuan
					if (ribuan) {
						separator = sisa ? '.' : ''
						rupiah += separator + ribuan.join('.')
					}

					rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah

					// return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '')
					return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '')
				}
				else {
					return 0
				}
			},

			splitString(stringToSplit, separator) {
				let arrayOfStrings = stringToSplit.split(separator)

				return arrayOfStrings.join('')
			},

			terbilang(nilai) {
				var bilangan = nilai
				var kalimat = ""
				var angka = new Array('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')
				var kata = new Array('', 'Satu', 'Dua', 'Tiga', 'Empat', 'Lima', 'Enam', 'Tujuh', 'Delapan', 'Sembilan')
				var tingkat = new Array('', 'Ribu', 'Juta', 'Milyar', 'Triliun')
				var panjang_bilangan = bilangan.length

				// panjang_bilangan = 14
				/* pengujian panjang bilangan */
				if (panjang_bilangan > 15) {
					kalimat = "Diluar Batas"
				}
				else {
					/* mengambil angka-angka yang ada dalam bilangan, dimasukkan ke dalam array */
					for (i = 1; i <= panjang_bilangan; i++) {
						angka[i] = bilangan.substr(-(i), 1)
					}

					var i = 1
					var j = 0

					/* mulai proses iterasi terhadap array angka */
					while (i <= panjang_bilangan) {
						subkalimat = ""
						kata1 = ""
						kata2 = ""
						kata3 = ""

						/* untuk Ratusan */
						if (angka[i + 2] != "0") {
							if (angka[i + 2] == "1") {
								kata1 = "Seratus"
							}
							else {
								kata1 = kata[angka[i + 2]] + " Ratus"
							}
						}

						/* untuk Puluhan atau Belasan */
						if (angka[i + 1] != "0") {
							if (angka[i + 1] == "1") {
								if (angka[i] == "0") {
									kata2 = "Sepuluh"
								}
								else if (angka[i] == "1") {
									kata2 = "Sebelas"
								}
								else {
									kata2 = kata[angka[i]] + " Belas"
								}
							}
							else {
								kata2 = kata[angka[i + 1]] + " Puluh"
							}
						}

						/* untuk Satuan */
						if (angka[i] != "0") {
							if (angka[i + 1] != "1") {
								kata3 = kata[angka[i]]
							}
						}

						/* pengujian angka apakah tidak nol semua, lalu ditambahkan tingkat */
						if ((angka[i] != "0") || (angka[i + 1] != "0") || (angka[i + 2] != "0")) {
							subkalimat = kata1 + " " + kata2 + " " + kata3 + " " + tingkat[j] + " "
						}

						/* gabungkan variabe sub kalimat (untuk Satu blok 3 angka) ke variabel kalimat */
						kalimat = subkalimat + kalimat
						i = i + 3
						j = j + 1
					}

					/* mengganti Satu Ribu jadi Seribu jika diperlukan */
					if ((angka[5] == "0") && (angka[6] == "0")) {
						kalimat = kalimat.replace("Satu Ribu", "Seribu")
					}
				}

				return kalimat
			}

		},
		santriSantri: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/santri/delete',
					data:
					{
						id: id
					}
				})
			},

			insert(tingkat_id, kelas_id, ruang_id, tahun_ajaran_id, nama, jenis_kelamin, alamat, status, tanggal_lahir, no_hp) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/santri/insert',
					data:
					{
						tingkat_id: tingkat_id,
						kelas_id: kelas_id,
						ruang_id: ruang_id,
						tahun_ajaran_id: tahun_ajaran_id,
						jenis_kelamin: jenis_kelamin,
						alamat: alamat,
						nama: nama,
						status: status,
						tanggal_lahir: tanggal_lahir,
						no_hp: no_hp,
					}
				})
			},

			update(id_santri, tingkat_id, kelas_id, ruang_id, tahun_ajaran_id, nama, jenis_kelamin, alamat, status, tanggal_lahir, no_hp) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/santri/update',
					data:
					{
						id_santri: id_santri,
						tingkat_id: tingkat_id,
						kelas_id: kelas_id,
						ruang_id: ruang_id,
						tahun_ajaran_id: tahun_ajaran_id,
						jenis_kelamin: jenis_kelamin,
						alamat: alamat,
						nama: nama,
						status: status,
						tanggal_lahir: tanggal_lahir,
						no_hp: no_hp,
					}
				})
			}, detail(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/santri/getDataDetail',
					data:
					{
						id: id
					}
				})
			},
		},
		santriKelas: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/kelas/delete',
					data:
					{
						id: id
					}
				})
			}, insert(nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/kelas/insert',
					data:
					{
						nama: nama
					}
				})
			},
			update(id, nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/kelas/update',
					data:
					{
						id: id,
						nama: nama,
					}
				})
			},
		},
		santriTahunAjaran: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tahunajaran/delete',
					data:
					{
						id: id
					}
				})
			}, insert(nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tahunajaran/insert',
					data:
					{
						nama: nama
					}
				})
			},
			update(id, nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tahunajaran/update',
					data:
					{
						id: id,
						nama: nama,
					}
				})
			},
		},
		santriTingkat: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tingkat/delete',
					data:
					{
						id: id
					}
				})
			}, insert(nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tingkat/insert',
					data:
					{
						nama: nama
					}
				})
			},
			update(id, nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/tingkat/update',
					data:
					{
						id: id,
						nama: nama,
					}
				})
			},
		},
		santriRuang: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/ruang/delete',
					data:
					{
						id: id
					}
				})
			}, insert(nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/ruang/insert',
					data:
					{
						nama: nama
					}
				})
			},
			update(id, nama) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>santri/ruang/update',
					data:
					{
						id: id,
						nama: nama,
					}
				})
			},
		},
		perizinanIzin: {
			insert(id_santri, tanggal_izin, tanggal_selesai, keterangan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>perizinan/izin/insert',
					data:
					{
						id_santri: id_santri,
						tanggal_izin: tanggal_izin,
						tanggal_selesai: tanggal_selesai,
						keterangan: keterangan
					}
				})
			}, selesai(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>perizinan/izin/selesai',
					data:
					{
						id: id
					}
				})
			}
		},
		divisiData: {
			delete(id) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>divisi/data/delete',
					data:
					{
						id: id
					}
				})
			}, insert(nama, keterangan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>divisi/data/insert',
					data:
					{
						nama: nama,
						keterangan: keterangan
					}
				})
			},
			update(id, nama, keterangan) {
				return $.ajax({
					method: 'post',
					url: '<?= base_url() ?>divisi/data/update',
					data:
					{
						id: id,
						nama: nama,
						keterangan: keterangan
					}
				})
			},
		}

	}

	initAjax()
})
