<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Invoice_model extends CI_Model {

    public function add_invoice($form_data){
        $this->db->insert('invoice', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function get_invoices($agent_id){
        $this->db->where('agent_id', $agent_id);
        $query = $this->db->get('invoice');
        return $query->result();
    }

    public function get_pending_invoices($agent_id){
        $this->db->select('invoice.*,clients.name');
        $this->db->from('invoice');
        $this->db->where('invoice.agent_id', $agent_id);
        $this->db->where('invoice.invoice_status', 'pending');
        $this->db->join('clients', 'clients.client_id = invoice.client_id');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_invoices_by_client_id($client_id){
        $this->db->where('client_id ', $client_id );
        $query = $this->db->get('invoice');
        return $query->result();
    }

    public function get_invoice_by_id($agent_id, $invoice_id){
        $this->db->select('invoice.*,clients.*');
        $this->db->from('invoice');
        $this->db->where('invoice.agent_id', $agent_id);
        $this->db->where('invoice.invoice_id', $invoice_id);
        $this->db->join('clients', 'clients.client_id = invoice.client_id');
        $query = $this->db->get();
        return $query->row();
    }

    public function update_invoice($invoice_id, $agent_id, $form_data){
        $this->db->where('invoice_id', $invoice_id);
        $this->db->where('agent_id', $agent_id);
        $this->db->update('invoice', $form_data); 
    }

    public function update_invoice_amount($agent_id, $invoice_id, $invoice_subtotal, $invoice_total){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('invoice_id', $invoice_id);
        $this->db->set('invoice_subtotal ', 'invoice_subtotal  - ' . $invoice_subtotal, FALSE);
        $this->db->set('invoice_total ', 'invoice_total  - ' . $invoice_total, FALSE);
        $this->db->update('invoice'); 
    }

    public function delete_agent_invoice($agent_id, $invoice_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('invoice');
    }

    public function delete_invoice_by_agent_id($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->delete('invoice');
    }

    public function delete_admin_invoice($invoice_id){
        $this->db->where('invoice_id', $invoice_id);
        $this->db->delete('invoice');
    }

    public function get_invoice_agent_details($invoice_id){
        $this->db->where('invoice_id', $invoice_id);
        $query = $this->db->get('invoice');
        return $query->row();
    }

    public function get_invoice_count($agent_id){
        $this->db->where('agent_id', $agent_id);
        $this->db->select('COUNT(invoice_id) as total');
        return  $this->db->get('invoice')->row();
    }
}