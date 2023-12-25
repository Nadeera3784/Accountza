<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Estimate_model extends CI_Model {

    public function add_estimate($form_data){
        $this->db->insert('estimates', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_estimate_by_id($agent_id, $estimate_id){
        $this->db->select('estimates.*,clients.*');
        $this->db->from('estimates');
        $this->db->where('estimates.agent_id', $agent_id);
        $this->db->where('estimates.estimate_id', $estimate_id);
        $this->db->join('clients', 'clients.client_id = estimates.client_id');
        $query = $this->db->get();
        return $query->row();
    }

    public function get_estimates($agent_id){
        $this->db->where('agent_id', $agent_id);
        $query = $this->db->get('estimates');
        return $query->result();
    }

    public function get_estimate_by_id_readonly($estimate_id){
        $this->db->select('estimates.*,clients.*');
        $this->db->from('estimates');
        $this->db->where('estimates.estimate_id', $estimate_id);
        $this->db->join('clients', 'clients.client_id = estimates.client_id');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_estimate_amount($agent_id, $estimate_id, $estimate_subtotal, $estimate_total){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('estimate_id', $estimate_id);
        $this->db->set('estimate_subtotal', 'estimate_subtotal  - ' . $estimate_subtotal, FALSE);
        $this->db->set('estimate_total', 'estimate_total - ' . $estimate_total, FALSE);
        $this->db->update('estimates'); 
    }

    public function update_estimate($estimate_id, $agent_id, $form_data){
        $this->db->where('estimate_id', $estimate_id);
        $this->db->where('agent_id', $agent_id);
        $this->db->update('estimates', $form_data); 
    }

    public function update_estimate_readonly($estimate_id, $form_data){
        $this->db->where('estimate_id', $estimate_id);
        $this->db->update('estimates', $form_data); 
    }

    public function delete_agent_estimate($agent_id, $estimate_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('estimate_id', $estimate_id);
        $this->db->delete('estimates');
    }

    public function delete_estimate_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('estimates');
    }

    public function get_estimate_agent_details($estimate_id){
        $this->db->where('estimate_id', $estimate_id);
        $query = $this->db->get('estimates');
        return $query->row();
    }

    public function get_estimates_by_client_id($client_id){
        $this->db->where('client_id ', $client_id );
        $query = $this->db->get('estimates');
        return $query->result();
    }

    public function get_estimates_count($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->select('COUNT(estimate_id) as total');
        return  $this->db->get('estimates')->row();
    }

    public function check_estimate_id($estimate_id){
        $this->db->select('estimate_id');
        $this->db->from('estimates');
        $this->db->where('estimate_id', $estimate_id); 
        $this->db->limit(1);
        $query = $this->db->get();
        if($query->num_rows() == 1) {                 
            return 1;
        }else{
            return 0;
        }
    }

}