<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Mindmap_model extends CI_Model {
 
    public function add_mindmap($form_data){
        $this->db->insert('mindmap', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_mindmap($agent_id, $mindmap_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('mindmap_id', $mindmap_id);   
        $query = $this->db->get('mindmap');
        return $query->row();
    }

    public function update_mindmap($agent_id, $mindmap_id , $form_data){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('mindmap_id ', $mindmap_id );   
        $this->db->update('mindmap', $form_data); 
    }

    public function delete_mindmap_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('mindmap');
    }

    public function delete_mindmap($agent_id, $mindmap_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('mindmap_id', $mindmap_id);
        $this->db->delete('mindmap');
    }
}