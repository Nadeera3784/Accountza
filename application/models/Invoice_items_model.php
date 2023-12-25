<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Invoice_items_model extends CI_Model {

    public function add_invoice_items($form_data){
        $this->db->insert('invoice_items', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_invoice_items_by_invoice_id($agent_id, $invoice_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('invoice_id', $invoice_id);
        $query = $this->db->get('invoice_items');
        return $query->result();
    }

    public function get_admin_invoice_items_by_invoice_id($invoice_id){
        $this->db->where('invoice_id', $invoice_id);
        $query = $this->db->get('invoice_items');
        return $query->result();
    }

    public function get_invoice_items_by_id($agent_id, $invoice_item_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('invoice_item_id ', $invoice_item_id );
        $query = $this->db->get('invoice_items');
        return $query->row();
    }

    public function update_invoice_items($invoice_item_id, $agent_id, $form_data){
        $this->db->where(' invoice_item_id', $invoice_item_id);
        $this->db->where('agent_id', $agent_id);
        $this->db->update('invoice_items', $form_data); 
    }

    public function delete_invoice_item($invoice_item_id){
        $this->db->where('invoice_item_id', $invoice_item_id);   
        $this->db->delete('invoice_items');
    }

    public function delete_invoice_items_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('invoice_items');
    }

    public function delete_invoice_item_by_invoice_id($invoice_id){
        $this->db->where('invoice_id', $invoice_id);   
        $this->db->delete('invoice_items');
    }
}