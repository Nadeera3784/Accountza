<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Supprt_tickets_model extends CI_Model {
       
    public function get_agent_tickets($agent_id){
        $this->db->where('agent_id ', $agent_id);
        $query = $this->db->get('supprt_tickets');
        return $query->result();
    }

    public function get_admin_tickets(){
        $query = $this->db->get('supprt_tickets');
        return $query->result();
    }

    public function add_ticket($form_data){
        $this->db->insert('supprt_tickets', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function add_ticket_replies($form_data){
        $this->db->insert('supprt_ticket_replies', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_single_ticket_replies($ticket_id){
        $this->db->where('ticket_id ', $ticket_id);
        $query = $this->db->get('supprt_ticket_replies');
        return $query->result();
    }

    public function get_ticket_by_id($supprt_ticket_id){
        $this->db->where('supprt_ticket_id ', $supprt_ticket_id);
        $query = $this->db->get('supprt_tickets');
        return $query->row();
    }

    public function update_ticket($supprt_ticket_id, $form_data){
        $this->db->where('supprt_ticket_id', $supprt_ticket_id);   
        $this->db->update('supprt_tickets', $form_data); 
    }
    
}