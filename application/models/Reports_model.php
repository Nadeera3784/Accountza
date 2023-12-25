<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Reports_model extends CI_Model {

    public function get_distinct_payments_years(){
        return $this->db->query('SELECT DISTINCT(YEAR(invoice_issue)) as year FROM app_invoice')->result_array();
    }

    public function get_expenses_years(){
        return $this->db->query('SELECT DISTINCT(YEAR(created_date)) as year FROM app_expenses ORDER by year DESC')->result_array();
    }

    public function total_income_report($agent_id){
        //$year = $this->input->post('year');
        $year = date("Y");
        $this->db->select('invoice_total,invoice_issue');
        $this->db->from('app_invoice');
        $this->db->where('YEAR(invoice_issue)', $year);
        $this->db->where('agent_id', $agent_id);
        $this->db->where('invoice_status', 'paid');

        $payments    = $this->db->get()->result_array();
        $data           = [];
        $data['months'] = [];
        $data['temp']   = [];
        $data['total']  = [];
        $data['labels'] = [];

        foreach ($payments as $payment) {
            $month   = date('m', strtotime($payment['invoice_issue']));
            $dateObj = DateTime::createFromFormat('!m', $month);
            $month   = $dateObj->format('F');
            if (!isset($data['months'][$month])) {
                $data['months'][$month] = $month;
            }
        }
        
        usort($data['months'], function ($a, $b) {
            $month1 = date_parse($a);
            $month2 = date_parse($b);

            return $month1['month'] - $month2['month'];
        });

        foreach ($data['months'] as $month) {
            foreach ($payments as $payment) {
                $_month  = date('m', strtotime($payment['invoice_issue']));
                $dateObj = DateTime::createFromFormat('!m', $_month);
                $_month  = $dateObj->format('F');
                if ($month == $_month) {
                    $data['temp'][$month][] = $payment['invoice_total'];
                }
            }
            array_push($data['labels'], $month . ' - ' . $year);
            $data['total'][] = array_sum($data['temp'][$month]);
        }

        // $chart = [
        //     'labels'   => $data['labels'],
        //     'datasets' => [
        //         [
        //             'label'           => 'Total Income',
        //             'backgroundColor' => 'rgba(50, 36, 245, 0.37)',
        //             'borderColor'     => '#3324f5',
        //             'tension'         => false,
        //             'borderWidth'     => 1,
        //             'data'            => $data['total'],
        //         ],
        //     ],
        // ];

        $chart = [
            'labels'   => $data['labels'],
            'datasets' => [
                [
                    'label'           => 'Total Income',
                    'tension'=> '.4',
                    'backgroundColor'=> "transparent",
                    'borderColor'=> "#3324f5",
                    'pointBorderColor'=> "#3324f5",
                    'pointBackgroundColor'=> "#fff",
                    'pointBorderWidth'=> '2',
                    'pointHoverRadius'=> '6',
                    'pointHoverBackgroundColor'=> "#fff",
                    'pointHoverBorderColor'=> "#3324f5",
                    'pointHoverBorderWidth'=> '2',
                    'pointRadius'=> '6',
                    'pointHitRadius'=> '6',
                    'data'            => $data['total'],
                ],
            ],
        ];

        return $chart;

    }

    public function get_expenses_vs_income_report($agent_id){

        $this->load->model('Expense_model');
        
        $year = date("Y");

        $months_labels  = [];
        $total_expenses = [];
        $total_income   = [];
        $i              = 0;
        if (!is_numeric($year)) {
            $year = date('Y');
        }

        for ($m = 1; $m <= 12; $m++) {
            array_push($months_labels, date('F', mktime(0, 0, 0, $m, 1)));
            $this->db->select('expense_id')->from('app_expenses')->where('agent_id', $agent_id)->where('MONTH(created_date)', $m)->where('YEAR(created_date)', $year);
            $expenses = $this->db->get()->result_array();
            if (!isset($total_expenses[$i])) {
                $total_expenses[$i] = [];
            }

            if (count($expenses) > 0) {
                foreach ($expenses as $expense) {
                    $expense = $this->Expense_model->get_expense($agent_id, $expense['expense_id']);
                    $total   = $expense->total;
                    $total_expenses[$i][] = $total;
                }
            } else {
                $total_expenses[$i][] = 0;
            }
            $total_expenses[$i] = array_sum($total_expenses[$i]);
            $this->db->select('invoice_total ');
            $this->db->from('invoice');
            $this->db->where('MONTH(invoice_issue)', $m);
            $this->db->where('YEAR(invoice_issue)', $year);
            $this->db->where('agent_id', $agent_id);
            $payments = $this->db->get()->result_array();
            if (!isset($total_income[$m])) {
                $total_income[$i] = [];
            }
            if (count($payments) > 0) {
                foreach ($payments as $payment) {
                    $total_income[$i][] = $payment['invoice_total'];
                }
            } else {
                $total_income[$i][] = 0;
            }
            $total_income[$i] = array_sum($total_income[$i]);
            $i++;
        }

         $chart = [
            'labels'   => $months_labels,
            'datasets' => [
                [
                    'label'           => 'income',
                    'backgroundColor' => 'rgba(50, 36, 245, 0.37)',
                    'borderColor'     => '#3324f5',
                    'borderWidth'     => 1,
                    'tension'         => false,
                    'borderRadius'    => 10,
                    'data'            => $total_income,
                ],
                [
                    'label'           => 'expenses',
                    'backgroundColor' => 'rgba(252,45,66,0.4)',
                    'borderColor'     => '#fc2d42',
                    'borderWidth'     => 1,
                    'borderRadius'    => 10,
                    'tension'         => false,
                    'data'            => $total_expenses,
                ],
            ],
        ]; 

        return $chart;
    }

    public function get_weekly_tickets_opening_statistics(){
        $departments_ids = [];

        $chart = [
            'labels'   => get_weekdays(),
            'datasets' => [
                [
                    'label'           => 'Tickets',
                    'backgroundColor' => 'rgba(50, 36, 245, 0.37)',
                    'borderColor'     => '#3324f5',
                    'borderWidth'     => 1,
                    'tension'         => false,
                    'data'            => [
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                        0,
                    ],
                ],
            ],
        ];

        $monday = new DateTime(date('Y-m-d', strtotime('monday this week')));
        $sunday = new DateTime(date('Y-m-d', strtotime('sunday this week')));

        $thisWeekDays = get_weekdays_between_dates($monday, $sunday);

        if (isset($thisWeekDays[1])) {
            $i = 0;
            foreach ($thisWeekDays[1] as $weekDate) {
                $this->db->like('DATE(created_date)', $weekDate, 'after');
                $chart['datasets'][0]['data'][$i] = $this->db->count_all_results('supprt_tickets');

                $i++;
            }
        }

        return $chart;
    }

    public function get_profit_and_lost_paid_expenses_reports($agent_id, $start_date, $end_date, $type){
        $query = $this->db->query("SELECT SUM(total) AS sum FROM `app_expenses` WHERE `status`='".$type."' AND `agent_id`='".$agent_id."' AND  `created_date` BETWEEN '".$start_date."' AND '".$end_date."'");
        $data = $query->row_array();
        return  $data;
    }

    public function get_profit_and_lost_paid_invoices_reports($agent_id, $start_date, $end_date, $type){
        $query = $this->db->query("SELECT SUM(invoice_total) AS sum FROM `app_invoice` WHERE `invoice_status`='".$type."' AND `agent_id`='".$agent_id."' AND  `invoice_issue` BETWEEN '".$start_date."' AND '".$end_date."'");
        $data = $query->row_array();
        return  $data;
    }

    public function get_profit_and_lost_paid_unpaid_expenses_reports($agent_id, $start_date, $end_date){
        $query = $this->db->query("SELECT SUM(total) AS sum FROM `app_expenses` WHERE (`status`= 'paid'  OR `status`= 'not-paid') AND `agent_id`='".$agent_id."' AND  `created_date` BETWEEN '".$start_date."' AND '".$end_date."'");
        $data = $query->row_array();
        return  $data;
    }

    public function get_profit_and_lost_paid_unpaid_invoices_reports($agent_id, $start_date, $end_date){
        $query = $this->db->query("SELECT SUM(invoice_total) AS sum FROM `app_invoice` WHERE (`invoice_status`='paid' OR `invoice_status`='pending' OR `invoice_status`='overdue')  AND `agent_id`='".$agent_id."' AND  `invoice_issue` BETWEEN '".$start_date."' AND '".$end_date."'");
        $data = $query->row_array();
        return  $data;
    }

    public function get_admin_invoice_count(){
        $this->db->select('COUNT(invoice_id) as total');
        return  $this->db->get('invoice')->row();
    }

    public function get_admin_estimates_count(){
        $this->db->select('COUNT(estimate_id) as total');
        return  $this->db->get('estimates')->row();
    }

    public function get_admin_expenses_count(){
        $this->db->select('COUNT(expense_id) as total');
        return  $this->db->get('expenses')->row();
    }
 
    public function get_admin_users_count(){
        $this->db->select('COUNT(id) as total');
        return  $this->db->get('users')->row();
    }

    public function get_customer_reports($agent_id){
		$this->db->select('i.client_id, c.name');
        $this->db->from('invoice i');
		$this->db->join('clients as c', 'c.client_id = i.client_id', 'LEFT');
        $this->db->where('i.agent_id', $agent_id);

		if (!empty($_POST['start_date'] ) || !empty($_POST['end_date'])) {
            $this->db->where("i.invoice_issue >=", $_POST['start_date']);
            $this->db->where("i.invoice_issue <=", $_POST['end_date']);
        }else{
            $this->db->where("i.invoice_issue >=", date('Y').'-01-01');
            $this->db->where("i.invoice_issue <=", date('Y-m-d')); 
        }

		if (!empty($_POST['client'])) {
            $this->db->where('i.client_id', $_POST['client']);
        }

        $this->db->group_by('i.client_id');
        $this->db->order_by('i.invoice_id', 'DESC');
        $query = $this->db->get();
        $query = $query->result();
        return $query;
	}
	
    public function get_week_customer_report($date){
        $this->db->group_by(array('MONTH(original_date)'));
        $this->db->where('DATE(original_date)', $date);
        $this->db->select('COUNT(id) as total');
        return  $this->db->get('users')->row();
    }

}