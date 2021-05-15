$(() => {
	// initialize responsive datatable
	$.initBasicTable('#dt_basic')
	const $table = $('#dt_basic').DataTable()
	$table.columns(4)
		.order('asc')
		.draw()
})
