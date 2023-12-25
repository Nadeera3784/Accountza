<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Expense_model extends CI_Model {
 
    public function add_expense($form_data){
        $this->db->insert('expenses', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_agent_expense_list($agent_id){
        $this->db->where('agent_id', $agent_id);
        $query = $this->db->get('expenses');
        return $query->result();
    }

    public function get_expense_by_category_id($category_id){
        $this->db->where('category_id', $category_id);
        $query = $this->db->get('expenses');
        return $query->result();
    }

    public function delete_expense_category($agent_id, $expense_category_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_category_id', $expense_category_id);   
        $this->db->delete('expense_category');
    }

    public function get_expense($agent_id, $expense_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_id', $expense_id);   
        $query = $this->db->get('expenses');
        return $query->row();
    }

    public function update_expense($agent_id, $expense_id , $form_data){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_id ', $expense_id );   
        $this->db->update('expenses', $form_data); 
    }

    public function update_expense_amount($agent_id, $expense_id, $expense_subtotal, $expense_total){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_id', $expense_id);
        $this->db->set('subtotal ', 'subtotal  - ' . $expense_subtotal, FALSE);
        $this->db->set('total ', 'total  - ' . $expense_total, FALSE);
        $this->db->update('expenses'); 
    }

    public function delete_expense($agent_id, $expense_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('expense_id ', $expense_id );   
        $this->db->delete('expenses');
    }    

    public function delete_expense_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('expenses');
    }

    
    public function get_expense_agent_details($expense_id){
        $this->db->where('expense_id', $expense_id);
        $query = $this->db->get('expenses');
        return $query->row();
    }

    public function get_expenses_count($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->select('COUNT(expense_id) as total');
        return  $this->db->get('expenses')->row();
    }

}