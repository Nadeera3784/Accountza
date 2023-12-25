<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends BASE_Controller {

	protected $cached_data = array();

    public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library(array(
			'ion_auth',
			'form_validation',
			'session', 
			'email', 
			'hasher', 
			'component',
			'config_manager'
		));

		$this->load->model(array(
			'TDAdmin_invoice_model',
			'TDAdmin_expense_model',
			'TDAdmin_estimate_model',
			'TDAdmin_client_model',
			'Invoice_model',
			'Invoice_items_model',
			'Company_settings_model',
			'Client_model',
			'Expense_model',
			'Expense_items_model',
			'Expense_category_model',
			'Estimate_items_model',
			'Estimate_model',
			'Company_settings_model',
			'Mindmap_model',
			'Subscription_model',
			'Supprt_tickets_model',
			'Reports_model'
		));

		$this->load->helper(array('string','app_helper', 'date', 'text'));
		$this->config->load('app');
		$this->lang->load('auth');
		$this->access_level_verifier();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
    }


	public function index(){
		$data['css'] = array(
			'/css/app.css',
			'/css/morris.css'
		);

		$data['js'] = array(
			'/js/Chartjs.js',
			'/js/raphael.min.js',
			'/js/morris.min.js',
			'/js/app.js',
		);

		$data['weekly_tickets_opening_statistics'] = json_encode($this->Reports_model->get_weekly_tickets_opening_statistics());
		
		$data['invoice_count'] = $this->Reports_model->get_admin_invoice_count();

		$data['estimates_count'] = $this->Reports_model->get_admin_estimates_count();

		$data['expenses_count'] = $this->Reports_model->get_admin_expenses_count();

		$data['users_count'] = $this->Reports_model->get_admin_users_count();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/footer', $data);
	}

	public function invoices(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$data['agents'] = $this->ion_auth->users(array('agent'))->result(); 
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/invoices', $data);
		$this->load->view('admin/footer', $data);

	}

	public function invoice_list(){
		if($this->input->is_ajax_request()){
            $list = $this->TDAdmin_invoice_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $invoice) {
				$settings = $this->Company_settings_model->get_company_setting($invoice->agent_id);
                $no++;
                $row = array();
                $row[] = $invoice->invoice_no;
                $row[] = ucwords($invoice->first_name . " " . $invoice->last_name);
                $row[] = get_currency_symbol($settings->company_currency) . "" .currency_format($invoice->invoice_total);
                $row[] = $invoice->invoice_issue;
				$row[] = $invoice->invoice_due;
				$row[] = $invoice->invoice_status;
                $row[] = $this->hasher->encrypt($invoice->invoice_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAdmin_invoice_model->count_all(),
                "recordsFiltered" => $this->TDAdmin_invoice_model->count_filtered(),
                "data" => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($output);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}
	
	public function delete_invoice(){
		if($this->input->is_ajax_request()){
			$invoice_id   = $this->hasher->decrypt($this->input->post('invoice_id', TRUE));
			$invoice_items = $this->Invoice_items_model->get_admin_invoice_items_by_invoice_id($invoice_id);
			foreach($invoice_items as $invoice_item){
				$this->Invoice_items_model->delete_invoice_item_by_invoice_id($invoice_id);
			}
			$this->Invoice_model->delete_admin_invoice($invoice_id);
			$response  =  array('type' => 'success', 'message' =>  "Invoice has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function view_invoice($invoice_id){

		$data['css'] = array(
			'/css/app.css',
			'/css/daterangepicker.css',
			'/css/select2.css',
			'/css/dialog.css',
		);
		$data['js'] = array(
			'/js/dialog.js',
			'/js/daterangepicker.js',
			'/js/validator.js',
			'/js/select2.js',
			'/js/app.js',
		);

		$agent = $this->Invoice_model->get_invoice_agent_details($this->hasher->decrypt($invoice_id));
		$data['invoice'] = $this->Invoice_model->get_invoice_by_id($agent->agent_id, $this->hasher->decrypt($invoice_id));
		$data['invoice_items'] = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->agent_id, $this->hasher->decrypt($invoice_id));
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->agent_id);
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->agent_id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_invoice', $data);
		$this->load->view('admin/footer', $data);
	}

	public function expenses(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$data['agents'] = $this->ion_auth->users(array('agent'))->result(); 
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/expenses', $data);
		$this->load->view('admin/footer', $data);
	}

	public function expense_list(){
		if($this->input->is_ajax_request()){
            $list = $this->TDAdmin_expense_model->get_datatables();
            $data = array();
            $no = $_POST['start'];
			
			foreach ($list as $expense) {
				$settings = $this->Company_settings_model->get_company_setting($expense->agent_id);
                $no++;
                $row = array();
                $row[] = $expense->title;
				$row[] = ucwords($expense->name);
				$row[] = ucwords($expense->first_name . " " . $expense->last_name);
                $row[] = $expense->created_date;
                $row[] = get_currency_symbol($settings->company_currency) . "" . currency_format($expense->total);
				$row[] = $expense->status;
                $row[] = $this->hasher->encrypt($expense->expense_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAdmin_expense_model->count_all(),
                "recordsFiltered" => $this->TDAdmin_expense_model->count_filtered(),
                "data" => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($output);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function view_expense($expense_id){

		$data['css'] = array(
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/app.js'
		);

		$agent = $this->Expense_model->get_expense_agent_details($this->hasher->decrypt($expense_id));

		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->agent_id);

		$data['expense'] = $this->Expense_model->get_expense($agent->agent_id, $this->hasher->decrypt($expense_id));

		$data['expense_items'] =  $this->Expense_items_model->get_expense_items_by_expenses_id($agent->agent_id, $this->hasher->decrypt($expense_id));

		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->agent_id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_expense', $data);
		$this->load->view('admin/footer', $data);
	}

	public function delete_expense(){
		if($this->input->is_ajax_request()){
            $expense_id   = $this->hasher->decrypt($this->input->post('expense_id', TRUE));
			$agent = $this->Expense_model->get_expense_agent_details($expense_id);
			$this->Expense_model->delete_expense($agent->agent_id, $expense_id);
			$this->Expense_items_model->delete_expense_item_by_expense_id($expense_id);
			$response  =  array('type' => 'success', 'message' =>  "Expense has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function estimates(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$data['agents'] = $this->ion_auth->users(array('agent'))->result(); 
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/estimates', $data);
		$this->load->view('admin/footer', $data);
	}
	
	public function estimate_list(){
		if($this->input->is_ajax_request()){
            $list = $this->TDAdmin_estimate_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $estimate) {
				$settings = $this->Company_settings_model->get_company_setting($estimate->agent_id);
                $no++;
                $row = array();
                $row[] = $estimate->estimate_no;
				$row[] = ucwords($estimate->name);
				$row[] = ucwords($estimate->first_name . " " . $estimate->last_name);
                $row[] = get_currency_symbol($settings->company_currency) . "" . currency_format($estimate->estimate_total);
                $row[] = $estimate->estimate_created_date;
				$row[] = $estimate->estimate_valid_unil_date;
				$row[] = ucfirst($estimate->estimates_status);
                $row[] = $this->hasher->encrypt($estimate->estimate_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAdmin_estimate_model->count_all(),
                "recordsFiltered" => $this->TDAdmin_estimate_model->count_filtered(),
                "data" => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($output);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function view_estimate($estimate_id){
		$data['css'] = array(
			'/css/app.css',
		);
		$data['js'] = array(
			'/js/print.js',
			'/js/app.js',
		);

		$agent = $this->Estimate_model->get_estimate_agent_details($this->hasher->decrypt($estimate_id));

		$data['estimate'] = $this->Estimate_model->get_estimate_by_id($agent->agent_id, $this->hasher->decrypt($estimate_id));
		$data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->agent_id, $this->hasher->decrypt($estimate_id));
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->agent_id);
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->agent_id);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_estimate', $data);
		$this->load->view('admin/footer', $data);
	}

	public function delete_estimate(){
		if($this->input->is_ajax_request()){
			$estimate_id   = $this->hasher->decrypt($this->input->post('estimate_id', TRUE));
			$agent = $this->Estimate_model->get_estimate_agent_details($estimate_id);
			$estimate_items = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->agent_id, $estimate_id);
			foreach($estimate_items as $estimate_item){
				$this->Estimate_items_model->delete_estimate_item($estimate_id);
			}
			$this->Estimate_model->delete_agent_estimate($agent->agent_id, $estimate_id);
			$response  =  array('type' => 'success', 'message' =>  "Estimate has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}
	
	public function clients(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$data['agents'] = $this->ion_auth->users(array('agent'))->result(); 
		
		$this->load->view('admin/header', $data);
		$this->load->view('admin/clients', $data);
		$this->load->view('admin/footer', $data);
	}

	public function client_list(){
		if($this->input->is_ajax_request()){
            $list = $this->TDAdmin_client_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $client) {
                $no++;
                $row = array();
                $row[] = ucfirst($client->name);
				$row[] = $client->email;
                $row[] = $client->discount;
				$row[] = ucwords($client->first_name . " " . $client->last_name);
				$row[] = nice_date($client->created_date, 'Y-m-d');
                $row[] = $this->hasher->encrypt($client->client_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAdmin_client_model->count_all(),
                "recordsFiltered" => $this->TDAdmin_client_model->count_filtered(),
                "data" => $data,
            );
            header('Content-Type: application/json');
            echo json_encode($output);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function delete_client(){
        if($this->input->is_ajax_request()){
			$client_id   = $this->hasher->decrypt($this->input->post('client_id', TRUE));
			
			$invoices = $this->Invoice_model->get_invoices_by_client_id($client_id);

			if($invoices){
				foreach($invoices as $invoice){
					$invoice_items = $this->Invoice_items_model->get_invoice_items_by_invoice_id($invoice->agent_id, $invoice->invoice_id);
					if($invoice_items){
						foreach($invoice_items as $invoice_item){
							$this->Invoice_items_model->delete_invoice_item_by_invoice_id($invoice->invoice_id);
						}
					}  
					$this->Invoice_model->delete_agent_invoice($invoice->agent_id, $invoice->invoice_id);
				}
			 }
			 
			 $estimates = $this->Estimate_model->get_estimates_by_client_id($client_id);
			
			 if($estimates){
				 foreach($estimates as $estimate){
					 $estimate_items = $this->Estimate_items_model->get_estimate_items_by_estimate_id($estimate->agent_id, $estimate->estimate_id);
					 if($estimate_items){
						 foreach($estimate_items as $estimate_item){
							 $this->Estimate_items_model->delete_estimate_item($estimate->estimate_id);
						 }
					 } 
					 $this->Estimate_model->delete_agent_estimate($estimate->agent_id, $estimate->estimate_id);
				 }
			 }

			$this->Client_model->delete_admin_client($client_id);
            $response  =  array('type' => 'success', 'message' =>  "Client has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function view_client($client_id){
		$data['client'] = $this->Client_model->get_admin_client_by_id($this->hasher->decrypt($client_id));
		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_client', $data);
		$this->load->view('admin/footer', $data);
	}

	public function agents(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);


		$data['agents'] = $this->ion_auth->users(array('agent'))->result(); 
		
		$data['subscriptions'] = $this->Subscription_model->get_subscriptions();

		foreach ($data['subscriptions'] as $key => $value) {
			$data['subscription_id'][$value->subscription_id] = $value;
		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/agents', $data);
		$this->load->view('admin/footer', $data);

	}
	
	public function update_agent($id){
		$data['css'] = array(
			'/css/app.css'
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/app.js',
		);

		$data['user'] = $this->ion_auth->user($this->hasher->decrypt($id))->row();
		$data['subscriptions'] = $this->Subscription_model->get_subscriptions();
		$this->load->view('admin/header', $data);
		$this->load->view('admin/update_agent', $data);
		$this->load->view('admin/footer', $data);
	}

	public function save_agent(){
		$user_id = $this->input->post('id');

		//$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		//$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('subscription_id', 'Subscription' , 'required');
		// if($this->input->post('email')){
		// 	$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]',  array('is_unique' => 'This %s already exists.'));
		// }

		
		if ($this->input->post('password')){
			$this->form_validation->set_rules('password', 'Password' , 'required|min_length[5]|matches[password_confirm]');
			$this->form_validation->set_rules('password_confirm', 'Password Confirm' , 'required');
		}

		if ($this->form_validation->run() == FALSE){
			$this->update_agent($user_id);
		}else{
			if($this->input->post('first_name', TRUE)){
		    	$form_data['first_name'] = $this->input->post('first_name', TRUE);
			}
			if($this->input->post('last_name', TRUE)){
			    $form_data['last_name']  = $this->input->post('last_name', TRUE);
			}
			
			$form_data['email']      = $this->input->post('email', TRUE);
			$form_data['subscription_id']  = $this->input->post('subscription_id', TRUE);
			$form_data['active']     =  ($this->input->post('active', TRUE) == "on")? "1" : "0";
			if($this->input->post('phone')){
				$form_data['phone']      = $this->input->post('phone', TRUE);
			}

			if ($this->input->post('password')){
				$form_data['password']  =  $this->input->post('password', TRUE);
			}

			if($this->ion_auth->update($this->hasher->decrypt($user_id), $form_data)){
				$this->session->set_flashdata('success', "User has been updated successfully");
				redirect('admin/agents', 'refresh');
			}else{
				$this->session->set_flashdata('danger', "Something went wrong, Please try again later");
				redirect('admin/agents', 'refresh');
			}
		}
	}

	public function add_agent(){

		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[users.email]',  array('is_unique' => 'This %s already exists.'));
		$this->form_validation->set_rules('password', 'Password' , 'required|min_length[5]|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirm' , 'required');
        $this->form_validation->set_rules('subscription_id', 'Subscription' , 'required');

		if ($this->form_validation->run() == FALSE){
		
			$data['css'] = array(
				'/css/app.css'
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js',
			);

			$data['subscriptions'] = $this->Subscription_model->get_subscriptions();
	
			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_agent', $data);
			$this->load->view('admin/footer', $data);
		}else{
			$form_data['first_name'] = $this->input->post('first_name', TRUE);
			$form_data['last_name']  = $this->input->post('last_name', TRUE);
			$form_data['phone']      = $this->input->post('phone', TRUE);
			$form_data['active']     =  ($this->input->post('active', TRUE) == "on")? "1" : "0";
			$form_data['subscription_id']  = $this->input->post('subscription_id', TRUE);

			$identity =   $this->input->post('email', TRUE);
			$email    =   $this->input->post('email', TRUE);
			$password =   $this->input->post('password', TRUE);

			if($this->ion_auth->register($identity, $password, $email, $form_data)){
				$this->session->set_flashdata('success', "User has been added successfully");
				redirect('admin/agents', 'refresh');
			}else{
				$this->session->set_flashdata('danger', "Something went wrong, Please try again later");
				redirect('admin/agents', 'refresh');
			}
		}
	}

	public function delete_agent(){
		if($this->input->is_ajax_request()){
			$agent_id   = $this->hasher->decrypt($this->input->post('agent_id', TRUE));

			$agent = $this->ion_auth->user($agent_id)->row();

			$settings = $this->Company_settings_model->get_company_setting($agent->id);

			if($settings->company_logo != ""){					 
				if (file_exists('./backend/images/logos/'.$settings->company_logo)){
					unlink('./backend/images/logos/'.$settings->company_logo);
				}
			}

			$this->Company_settings_model->delete_company_setting($agent->id);

			$this->Invoice_model->delete_invoice_by_agent_id($agent->id);

			$this->Invoice_items_model->delete_invoice_items_by_agent_id($agent->id);

			$this->Estimate_model->delete_estimate_by_agent_id($agent->id);

			$this->Estimate_items_model->delete_estimate_items_by_agent_id($agent->id);

			$this->Expense_model->delete_expense_by_agent_id($agent->id);

			$this->Expense_items_model->delete_expense_item_by_agent_id($agent->id);

			$this->Expense_category_model->delete_expense_category_by_agent_id($agent->id);

			$this->Mindmap_model->delete_mindmap_by_agent_id($agent->id);

			if($this->ion_auth->delete_user($agent->id)){
				$response  =  array('type' => 'success', 'message' =>  "User has been deleted successfully!");
				header("Content-type: application/json");	
				echo json_encode($response);
			}else{
				$response  =  array('type' => 'error', 'message' =>  "Something went wrong");
				header("Content-type: application/json");	
				echo json_encode($response);
			}
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function subscriptions(){

		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$data['subscriptions'] = $this->Subscription_model->get_subscriptions();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/subscriptions', $data);
		$this->load->view('admin/footer', $data);
	}

	public function add_subscription(){
		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/app.css'
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js',
			);

			$this->load->view('admin/header', $data);
			$this->load->view('admin/add_subscription', $data);
			$this->load->view('admin/footer', $data);
		}else{
			$form_data['title'] = $this->input->post('title', TRUE);
			$form_data['email'] = $this->input->post('email', TRUE);
			$form_data['price'] = $this->input->post('price', TRUE);
			$form_data['slug']  = slugify($this->input->post('title', TRUE));

			$this->Subscription_model->add_subscription($form_data);

			$this->session->set_flashdata('success', "Subscription has been added successfully");
			redirect('admin/subscriptions', 'refresh');
		}
	}

	public function update_subscription($subscription_id){

		$data['subscription'] = $this->Subscription_model->get_subscription($this->hasher->decrypt($subscription_id));

		$data['css'] = array(
			'/css/app.css'
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/app.js',
		);

		$this->load->view('admin/header', $data);
		$this->load->view('admin/update_subscription', $data);
		$this->load->view('admin/footer', $data);

	}

	public function save_subscription(){

		$subscription_id = $this->input->post('id', TRUE);

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('price', 'Price', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->update_subscription($subscription_id);
		}else{
			$form_data['title'] = $this->input->post('title', TRUE);
			$form_data['email'] = $this->input->post('email', TRUE);
			$form_data['price'] = $this->input->post('price', TRUE);
			$form_data['slug']  = slugify($this->input->post('title', TRUE));
			
			$this->Subscription_model->update_subscription($this->hasher->decrypt($subscription_id), $form_data);

			$this->session->set_flashdata('success', "Subscription has been updated successfully");
			redirect('admin/subscriptions', 'refresh');
		}
	}

	public function delete_subscription(){
		if($this->input->is_ajax_request()){
			$subscription_id   = $this->hasher->decrypt($this->input->post('subscription_id', TRUE));
			$this->Subscription_model->delete_subscription($subscription_id);
			$response  =  array('type' => 'success', 'message' =>  "Subscription has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function support(){

		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
			'/css/bootstrap-select-min.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
			'/js/dialog.js',
			'/js/bootstrap-select.js',
            '/js/app.js',
		);

		$data['tickets'] = $this->Supprt_tickets_model->get_admin_tickets();

		$this->load->view('admin/header', $data);
		$this->load->view('admin/support', $data);
		$this->load->view('admin/footer', $data);

	}

	public function view_ticket($ticket_id){

		$data['css'] = array(
			'/css/dialog.css',
			'/css/app.css'
        );
        $data['js'] = array(
			'/js/dialog.js',
            '/js/app.js',
		);


		$data['tickets'] = $this->Supprt_tickets_model->get_single_ticket_replies($this->hasher->decrypt($ticket_id));

		$data['ticket_details'] = $this->Supprt_tickets_model->get_ticket_by_id($this->hasher->decrypt($ticket_id));

		$this->load->view('admin/header', $data);
		$this->load->view('admin/view_ticket', $data);
		$this->load->view('admin/footer', $data);
	}

	public function upload_photo($fieldname) {

		$config['upload_path'] = './backend/images/support/';
		$config['allowed_types'] = 'png|gif|jpeg|jpg';
		//$config['max_width'] = '500'; 
		$config['encrypt_name']         = TRUE;
		$this->load->library('upload', $config);
		$this->upload->initialize($config);
	
		if (!$this->upload->do_upload($fieldname)) {
			$data = array('success' => false, 'message' => $this->upload->display_errors());
		}else{ 
			$upload_details = $this->upload->data(); 

			$data = array('success' => true, 'upload_data' => $upload_details, 'message' => "Upload success!");
		}
		return $data;
	}

	public function change_password(){

		$this->form_validation->set_rules('old', $this->lang->line('change_password_validation_old_password_label'), 'required');
		$this->form_validation->set_rules('new', $this->lang->line('change_password_validation_new_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|matches[new_confirm]');
		$this->form_validation->set_rules('new_confirm', $this->lang->line('change_password_validation_new_password_confirm_label'), 'required');

		if ($this->form_validation->run() === FALSE){
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			$data['css'] = array(
				'/css/app.css',
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js',
			);
	
			$user = $this->ion_auth->user()->row();
	
			$data['user_id'] = $user->id;
	
			$this->load->view('admin/header', $data);
			$this->load->view('admin/change_password', $data);
			$this->load->view('admin/footer', $data);
		}else{
			$identity = $this->session->userdata('identity');
			$change = $this->ion_auth->change_password($identity, $this->input->post('old'), $this->input->post('new'));
			if ($change){
				$this->ion_auth->logout();
				$this->session->set_flashdata('message', $this->ion_auth->messages());
				redirect('auth/login');
			}else{
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('agent/change_password', 'refresh');
			}
		}
	}

	public function add_reply(){
		if($this->input->is_ajax_request()){

			$ticket_id   = $this->hasher->decrypt($this->input->post('ticket_id', TRUE));

			$ticket_details = $this->Supprt_tickets_model->get_ticket_by_id($ticket_id);
		   
			$errors= array();

			$details = array(
				'description'	=>  $this->input->post('send-msg'),
			);

			if(!empty($_FILES['attachment']['name'])){
				$upload_response = $this->upload_photo('attachment');
				if($upload_response['success']){
					$details['attachment'] = $upload_response['upload_data']['file_name'];
				}else{
					$errors['attachment_error'] = $upload_response['message'];
				}
			}
			
			if(empty($errors)){
				$details['agent_id ']           = $ticket_details->agent_id;
				$details['ticket_id ']          = $ticket_details->supprt_ticket_id;
				$details['identity ']           = 'admin';
				$this->Supprt_tickets_model->add_ticket_replies($details);
			}
			
			$response = array(
				'success' => true,
				'errors'  => $errors
			);

			header('Content-Type: application/json');
			echo json_encode( $response );
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function update_ticket_state(){
		$state = $this->input->get('state', TRUE);
		$ticket_id = $this->input->get('ticket_id', TRUE);

		$form_data['status']    = ucwords($state);

		$this->Supprt_tickets_model->update_ticket($this->hasher->decrypt($ticket_id), $form_data);

		$this->session->set_flashdata('success', "Ticket has been updated successfully");
		redirect('admin/support', 'refresh');
	}
	
	public function get_customer_week_report(){
        if ($this->ion_auth->logged_in()){
            if($this->input->is_ajax_request()){
                
        		$data['weekdata']	=	array();
        		$weekstart	=	date("Y-m-d", strtotime("- 6 DAYS"));
        		$wbegin = new DateTime($weekstart);
        		$wend = new DateTime(date('Y-m-d', strtotime("+ 1 DAYS")));
        		
        		$winterval = DateInterval::createFromDateString('1 day');
        		$wperiod = new DatePeriod($wbegin, $winterval, $wend);
        		$i=0;
        		foreach($wperiod as $dt){
        			$date		=	 $dt->format( "Y-m-d" );	
        			$dayno		=	 $dt->format( "N" );
        			$day		=	 $dt->format( "D" );
        			$day		=	strtolower($day);
        			$weekdata	=	$this->Reports_model->get_week_customer_report($date);
        			$data['weekdata'][$i]['date']	=	date('d M', strtotime($date));
        			$data['weekdata'][$i]['total']	=	@$weekdata->total;
        		$i++;
        		}     

                $response  =  array('type' => 'success', 'message' =>  $data);
                header("Content-type: application/json");	
                echo json_encode($response);                
            }else{
               $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
                header("Content-type: application/json");	
                echo json_encode($response); 
            }

		}else{
            $response  =  array('type' => 'error', 'message' =>  "Unauthorized access");
            header("Content-type: application/json");	
            echo json_encode($response); 
        } 
	}
        

	public function access_level_verifier(){
        if ($this->ion_auth->logged_in() && $this->ion_auth->in_group("admin")){
            return true;
        }else{
			$this->ion_auth->logout();
            $this->session->set_flashdata('message', "You must be an agent to view this page");
            redirect('auth/login');
        }
	}
}
