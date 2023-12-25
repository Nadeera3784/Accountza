<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Expense_items_model extends CI_Model {

    public function add_expense_items($form_data){
        $this->db->insert('expense_items', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_expense_items_by_expenses_id($agent_id, $expense_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_id', $expense_id);
        $query = $this->db->get('expense_items');
        return $query->result();
    }

    public function get_expense_items_by_id($agent_id, $expense_item_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_item_id ', $expense_item_id );
        $query = $this->db->get('expense_items');
        return $query->row();
    }

    public function update_expense_items($expense_item_id, $agent_id, $form_data){
        $this->db->where('expense_item_id', $expense_item_id);
        $this->db->where('agent_id', $agent_id);
        $this->db->update('expense_items', $form_data); 
    }

    public function delete_expense_item($expense_item_id){
        $this->db->where('expense_item_id', $expense_item_id);   
        $this->db->delete('expense_items');
    }

    public function delete_expense_item_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('expense_items');
    }

    public function delete_expense_item_by_expense_id($expense_id){
        $this->db->where('expense_id', $expense_id);   
        $this->db->delete('expense_items');
    }
}