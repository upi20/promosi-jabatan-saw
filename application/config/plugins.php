<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['number'] = array(
	'scripts' => array(
		'assets/autoNumeric.js'
	)
);

$config['datatables'] = array(
	'scripts' => array(
		'assets/js/plugin/datatables/jquery.dataTables.min.js',
		'assets/js/plugin/datatables/dataTables.colVis.min.js',
		'assets/js/plugin/datatables/dataTables.tableTools.min.js',
		'assets/js/plugin/datatables/dataTables.bootstrap.min.js',
		'assets/js/plugin/datatable-responsive/datatables.responsive.min.js',
	)
);

// Hapus tab index di modal
$config['select2'] = array(
	'scripts' => array(
		'assets/js/plugin/select2/select2.min.js',
	)
);

$config['multiselect'] = array(
	'scripts' => array(
		'assets/js/plugin/multiselect/js/bootstrap-multiselect.js',
	)
);
