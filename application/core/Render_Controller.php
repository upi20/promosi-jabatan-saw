<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Render_Controller extends CI_Controller
{


	protected $default_template;
	protected $title;
	protected $template_type;
	protected $page_setting;
	protected $app_name;
	protected $copyright;
	protected $breadcrumb_1;
	protected $breadcrumb_1_url;
	protected $breadcrumb_2;
	protected $breadcrumb_2_url;
	protected $breadcrumb_3;
	protected $breadcrumb_3_url;
	protected $breadcrumb_4;
	protected $breadcrumb_4_url;
	protected $content;

	protected $navigation		= array();
	protected $data 			= array();
	protected $plugins 			= array();
	private   $plugin_scripts 	= array();
	private   $plugin_styles 	= array();


	protected function preRender()
	{
	}


	protected function render($template = NULL)
	{
		$this->preRender();
		$this->loadPlugins();

		if ($template == NULL) {
			$template = $this->default_template;
		}

		$data = array(
			// Application
			'template_type' 	=> $this->template_type,
			'page_setting' 		=> $this->page_setting,
			'app_name' 			=> $this->app_name,
			'copyright' 		=> $this->copyright,


			// Breadcrumb
			'breadcrumb_1' 		=> $this->breadcrumb_1,
			'breadcrumb_2' 		=> $this->breadcrumb_2,
			'breadcrumb_3' 		=> $this->breadcrumb_3,
			'breadcrumb_4' 		=> $this->breadcrumb_4,
			'breadcrumb_1_url' 	=> $this->breadcrumb_1_url,
			'breadcrumb_2_url' 	=> $this->breadcrumb_2_url,
			'breadcrumb_3_url' 	=> $this->breadcrumb_3_url,
			'breadcrumb_4_url' 	=> $this->breadcrumb_4_url,


			// Content
			'plugin_styles' 	=> $this->plugin_styles,
			'plugin_scripts' 	=> $this->plugin_scripts,
			'title' 			=> $this->title,
			'navigation' 		=> $this->navigation,
			'content' 			=> $this->content,
		);

		$data = array_merge($data, $this->data);
		$this->load->view($template, $data);
	}


	protected function output_json($data)
	{
		$this->output->set_content_type('application/json');
		$this->output->set_output(json_encode($data));
	}


	private function loadPlugins()
	{
		if (empty($this->plugins)) return;

		$result 				= $this->plugin->load_plugins($this->plugins);

		$this->plugin_styles 	= $result['styles'];
		$this->plugin_scripts 	= $result['scripts'];
	}


	function __construct()
	{
		parent::__construct();

		$this->app_name 		= $this->config->item('app_name');
		$this->copyright 		= $this->config->item('copyright');
		$this->page_setting 	= $this->config->item('page_setting');
		$this->template_type 	= $this->config->item('template_type');

		$this->load->library('plugin');
	}
}
