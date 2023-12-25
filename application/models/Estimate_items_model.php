<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Estimate_items_model extends CI_Model {

    public function add_estimate_items($form_data){
        $this->db->insert('estimate_items', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_estimate_items_by_estimate_id($agent_id, $estimate_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('estimate_id', $estimate_id);
        $query = $this->db->get('estimate_items');
        return $query->result();
    }

    public function get_estimate_items_by_estimate_id_readonly($estimate_id){
        $this->db->where('estimate_id', $estimate_id);
        $query = $this->db->get('estimate_items');
        return $query->result();
    }

    public function get_estimate_items_by_id($agent_id, $estimate_item_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('estimate_item_id ', $estimate_item_id );
        $query = $this->db->get('estimate_items');
        return $query->row();
    }

    public function update_estimate_items($estimate_item_id, $agent_id, $form_data){
        $this->db->where('estimate_item_id', $estimate_item_id);
        $this->db->where('agent_id', $agent_id);
        $this->db->update('estimate_items', $form_data); 
    }

    public function delete_estimate_items_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('estimate_items');
    }

    public function delete_estimate_item($estimate_id){
        $this->db->where('estimate_id', $estimate_id);   
        $this->db->delete('estimate_items');
    }
}