<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Expense_category_model extends CI_Model {
 
    public function add_expense_category($form_data){
        $this->db->insert('expense_category', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_agent_expense_category_list($agent_id){
        $this->db->where('agent_id', $agent_id);
        $query = $this->db->get('expense_category');
        return $query->result();
    }

    public function delete_expense_category($agent_id, $expense_category_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_category_id', $expense_category_id);   
        $this->db->delete('expense_category');
    }

    public function delete_expense_category_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('expense_category');
    }

    public function get_expense_category($agent_id, $expense_category_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_category_id', $expense_category_id);   
        $query = $this->db->get('expense_category');
        return $query->row();
    }

    public function update_expense_category($agent_id, $expense_category_id, $form_data){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_category_id', $expense_category_id);   
        $this->db->update('expense_category', $form_data); 
    }

}