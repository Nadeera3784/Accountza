<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Plugin_model extends CI_Model {
 
    public function activete_plugin($form_data, $agent_id, $plugin_name){
        $this->db->select('name');
        $this->db->from('plugins');
        $this->db->where('agent_id', $agent_id); 
        $this->db->where('name', $plugin_name); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            $this->db->where('agent_id', $agent_id);
            $this->db->where('name', $plugin_name);
            $this->db->update('plugins', $form_data); 
        }else{
            $this->db->insert('plugins', $form_data);
            $last_id = $this->db->insert_id();
            return  $last_id;
        }

    }

    public function activated_plugin_list($agent_id){
        $this->db->select('name, slug, icon');
        $this->db->from('plugins');
        $this->db->where('agent_id', $agent_id); 
        $this->db->where('status', "1"); 
        $query = $this->db->get();
        return $query->result();
	}

}