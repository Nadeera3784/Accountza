<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Readonly extends BASE_Controller{

    public function __construct(){
		parent::__construct();
        $this->load->database();
        $this->load->library(array(
            'ion_auth',
			'hasher', 
			'config_manager'
		));

        $this->load->model(array(
			'Client_model',
			'Company_settings_model',
			'Estimate_model',
			'Estimate_items_model',
		));

        $this->load->helper(array(
			'string',
			'app_helper',
			'text',
		));

    }

    public function view_estimate($estimate_id){
        if($this->Estimate_model->check_estimate_id($this->hasher->decrypt($estimate_id))){
            $data['estimate'] = $this->Estimate_model->get_estimate_by_id_readonly($this->hasher->decrypt($estimate_id));
            $data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id_readonly($this->hasher->decrypt($estimate_id));
            $data['settings'] = $this->Company_settings_model->get_company_setting($data['estimate']->agent_id);
            $data['clients'] = $this->Client_model->get_agent_client_list($data['estimate']->agent_id);
            $this->load->view('view_estimate_readonly', $data);
        }else{
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function reject_estimate($estimate_id){
        if($this->Estimate_model->check_estimate_id($this->hasher->decrypt($estimate_id))){
            $form_data['estimates_status']   = 'declined';
            $this->Estimate_model->update_estimate_readonly($this->hasher->decrypt($estimate_id), $form_data);
            redirect('readonly/view_estimate/'.$estimate_id, 'refresh');
        }else{
            redirect($_SERVER['HTTP_REFERER']); 
        }
    }

    public function approve_estimate($estimate_id){
        if($this->Estimate_model->check_estimate_id($this->hasher->decrypt($estimate_id))){
            $form_data['estimates_status']   = 'accepted';
            $this->Estimate_model->update_estimate_readonly($this->hasher->decrypt($estimate_id), $form_data);
            redirect('readonly/view_estimate/'.$estimate_id, 'refresh');
        }else{
            redirect($_SERVER['HTTP_REFERER']); 
        }
    }

}