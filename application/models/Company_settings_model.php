<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Company_settings_model extends CI_Model {
 
    public function required_company_setting_update($agent_id){
        $this->db->where('agent_id', $agent_id);
        $result = $this->db->get('company_settings')->num_rows();
        if($result > 0){
          return false;
        }else{
          return true;
        }
    }

    public function get_company_setting($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->limit(1);
        $query = $this->db->get('company_settings');
        return $query->row();
    }

    public function add_company_setting($form_data){
        $this->db->insert('company_settings', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_user_company_logo($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->limit(1);
        $result = $this->db->get('company_settings');
        if($result->row()){
            return $result->row()->company_logo;
        }else{
           return false;
        }

    }

    public function update_company_setting($agent_id, $form_data){
        $this->db->where('agent_id', $agent_id);
        $this->db->update('company_settings', $form_data);
    }

    public function delete_company_setting($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('company_settings');
    }
}