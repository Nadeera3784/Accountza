<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class TDAgent_invoice_model extends CI_Model {

    var $table = 'invoice';
    var $column_order = array(null, 'invoice_no'); 
    var $column_search = array('invoice_no'); 
    var $order = array('invoice.invoice_issue' => 'desc'); 
    var $agent_id = "";

    public function __construct(){
        parent::__construct();
        $this->load->library('ion_auth');
        $this->load->database();
        $this->lang->load('auth');
        $user = $this->ion_auth->user()->row();
        $this->agent_id = $user->id;
    }
 
    private function _get_datatables_query(){
        $this->db->select("invoice.*, clients.name");
        $this->db->where('invoice.agent_id', $this->agent_id);
        if($this->input->post('start_date') && $this->input->post('end_date')){
            $this->db->where('invoice.invoice_issue  >=', $this->input->post('start_date')); 
            $this->db->where('invoice.invoice_issue  <=', $this->input->post('end_date'));
        }
        if($this->input->post('client_id')){
            $this->db->where('clients.client_id', $this->input->post('client_id')); 
        }
        if($this->input->post('status')){
            $this->db->where('invoice.invoice_status', $this->input->post('status')); 
        }
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like("invoice.".$item, $_POST['search']['value']);
                }else{
                    $this->db->or_like("invoice.".$item, $_POST['search']['value']);
                }
 
                if(count($this->column_search) - 1 == $i) 
                    $this->db->group_end(); 
            }
            $i++;
        }
         
        if(isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
 
    public function get_datatables(){
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $this->db->join('clients', 'invoice.client_id = clients.client_id', 'INNER');
        //$this->db->where('invoice.agent_id', $this->agent_id);
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered(){
        $this->_get_datatables_query();
        $this->db->join('clients', 'invoice.client_id = clients.client_id', 'INNER');
        //$this->db->where('invoice.agent_id', $this->agent_id);
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}