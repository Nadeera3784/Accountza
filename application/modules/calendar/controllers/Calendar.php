<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends MX_Controller{

    public function __construct(){
		parent::__construct();
    $this->load->database();
		$this->load->library(array(
			'ion_auth',
			'hasher', 
			'config_manager'
		));

    $this->load->model(array(
			'Company_settings_model',
			'Plugin_model'
		));

    $agent = $this->ion_auth->user()->row();

    $this->agent_settings = $this->Company_settings_model->get_company_setting($agent->id);

    }

    public function index(){
      $data['css'] = array(
         'backend/css/default.css',
         'backend/css/app.css',
         'backend/css/dialog.css'
       );

      $data['js'] = array(
        'backend/js/dialog.js',
        'backend/js/app.js'
      );
  
      $agent = $this->ion_auth->user()->row();
  
      $data['settings'] = $this->agent_settings;
  
      $data['plugin_list'] = $this->Plugin_model->activated_plugin_list($agent->id);
  
      $this->load->view('agent/header', $data);
      $this->load->view('calendar', $data);
      $this->load->view('agent/footer', $data);
    }
}