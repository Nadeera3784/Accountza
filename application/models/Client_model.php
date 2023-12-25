<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Client_model extends CI_Model {

    public function add_client($form_data){
        $this->db->insert('clients', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_agent_client_list($agent_id){
        $this->db->where('agent_id', $agent_id);
        $query = $this->db->get('clients');
        return $query->result();
    }

    public function get_client_email_by_id($client_id){
        $this->db->where('client_id', $client_id);
        $result = $this->db->get('clients');
        return $result->row()->email;
    }

    public function get_agent_client_by_id($agent_id, $client_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('client_id', $client_id);
        $result = $this->db->get('clients');
        return $result->row();
    }

    public function get_admin_client_by_id($client_id){
        $this->db->where('client_id', $client_id);
        $result = $this->db->get('clients');
        return $result->row();
    }

    public function update_client($client_id, $form_data){
        $this->db->where('client_id', $client_id);
        $this->db->update('clients', $form_data);
    }

    public function delete_client($agent_id, $client_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('client_id', $client_id);   
        $this->db->delete('clients');
    }

    public function delete_admin_client($client_id){
        $this->db->where('client_id', $client_id);   
        $this->db->delete('clients');
    }

    public function get_clients_count($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->select('COUNT(client_id) as total');
        return  $this->db->get('clients')->row();
    }

}