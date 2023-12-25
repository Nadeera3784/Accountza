<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class TDAgent_estimate_model extends CI_Model {

    var $table = 'estimates';
    var $column_order = array(null, 'estimate_no'); 
    var $column_search = array('estimate_no'); 
    var $order = array('estimates.estimate_created_date' => 'desc'); 
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
        $this->db->select("estimates.*, clients.name");
        $this->db->where('estimates.agent_id', $this->agent_id);
        if($this->input->post('start_date') && $this->input->post('end_date')){
            $this->db->where('estimates.estimate_created_date  >=', $this->input->post('start_date')); 
            $this->db->where('estimates.estimate_created_date  <=', $this->input->post('end_date'));
        }
        if($this->input->post('client_id')){
            $this->db->where('clients.client_id', $this->input->post('client_id')); 
        }
        if($this->input->post('status')){
            $this->db->where('estimates.estimates_status', $this->input->post('status')); 
        }
        $this->db->from($this->table);
        $i = 0;
        foreach ($this->column_search as $item) {
            if($_POST['search']['value']) {
                if($i===0) {
                    $this->db->group_start(); 
                    $this->db->like("estimates.".$item, $_POST['search']['value']);
                }else{
                    $this->db->or_like("estimates.".$item, $_POST['search']['value']);
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
        $this->db->join('clients', 'estimates.client_id = clients.client_id', 'INNER');
        $query = $this->db->get();
        return $query->result();
    }
 
    public function count_filtered(){
        $this->_get_datatables_query();
        $this->db->join('clients', 'estimates.client_id = clients.client_id', 'INNER');
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all(){
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
}