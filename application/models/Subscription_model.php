<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Subscription_model extends CI_Model {
       
    public function get_subscriptions(){
        $query = $this->db->get('subscriptions');
        return $query->result();
    }

    public function add_subscription($form_data){
        $this->db->insert('subscriptions', $form_data);
        $last_id = $this->db->insert_id();
        return  $last_id;
    }

    public function delete_subscription($subscription_id){
        $this->db->where('subscription_id', $subscription_id);
        $this->db->delete('subscriptions');
    }

    public function get_subscription($subscription_id){
        $this->db->where('subscription_id', $subscription_id);
        $query = $this->db->get('subscriptions');
        return $query->row();
    }

    public function get_subscription_by_slug($slug){
        $this->db->where('slug', $slug);
        $query = $this->db->get('subscriptions');
        return $query->row();
    }

    public function update_subscription($subscription_id, $form_data){
        $this->db->where('subscription_id', $subscription_id);   
        $this->db->update('subscriptions', $form_data); 
    }
    
}