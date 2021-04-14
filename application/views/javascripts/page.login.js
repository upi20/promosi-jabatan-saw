
$(() =>
{

	$('#form').submit((ev) =>
	{
		ev.preventDefault()

		let username 	= $('#username').val()
		let password 	= $('#password').val()

		window.apiClient.login.cekLogin(username, password)
		.done((data) =>
		{
			if(data.status == 1)
			{
				$.failMessage('Password salah.','LOGIN')

				$('#password').val('')

				$('#password').focus()
			}
			else if(data.status == 2)
			{
				$.failMessage('Akun tidak ditemukan.','LOGIN')

				$('#username').val('')
				$('#password').val('')

				$('#username').focus()		
			}
			else
			{
				$.doneMessage('Login success.','LOGIN')

				setInterval(() => { window.location.href = '<?= base_url() ?>dashboard' }, 1000)
			}
		})
	})
})