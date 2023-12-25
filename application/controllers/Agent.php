<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Agent extends BASE_Controller {

    protected $cached_data = array();
	 
	protected $agent_settings = array();
	
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
			'Client_model',
			'Company_settings_model',
			'Invoice_model',
			'Invoice_items_model',
			'TDAgent_invoice_model',
			'TDAgent_expense_model',
			'TDAgent_estimate_model',
			'TDAgent_mindmap_model',
			'Expense_category_model',
			'Expense_model',
			'Expense_items_model',
			'Estimate_model',
			'Estimate_items_model',
			'Reports_model',
			'Mindmap_model',
			'Supprt_tickets_model',
		));
		$this->load->helper(array(
			'string',
			'app_helper',
			'text',
			'email'
		));
		$this->config->load('app');
		$this->lang->load('auth');
		$this->access_level_verifier();
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
		$agent = $this->ion_auth->user()->row();
		$this->agent_settings = $this->Company_settings_model->get_company_setting($agent->id);
    }

    public function index(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
            '/css/app.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/Chartjs.js',
            '/js/app.js',
		);

		$agent = $this->ion_auth->user()->row();

		$data['invoice_count'] = $this->Invoice_model->get_invoice_count($agent->id);

		$data['invoices'] = $this->Invoice_model->get_pending_invoices($agent->id);

		$data['expensee_count'] = $this->Expense_model->get_expenses_count($agent->id);

		$data['estimates_count'] = $this->Estimate_model->get_estimates_count($agent->id);

		$data['client_count'] = $this->Client_model->get_clients_count($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/dashboard', $data);
		$this->load->view('agent/footer', $data);
    }

	public function clients(){

		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
            '/css/responsive.dataTables.min.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
            '/js/responsive.dataTables.min.js',
            '/js/dialog.js',
            '/js/app.js',
		);
		

		$agent = $this->ion_auth->user()->row();

		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/clients', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_client(){
		
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('notes', 'Notes', 'trim|required');
		$this->form_validation->set_rules('payment_info', 'Payment info', 'trim|required');
		//$this->form_validation->set_rules('postal_code', 'Postal code', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/app.css'
			);
	
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js'
			);

			$data['settings'] = $this->agent_settings;

			$agent = $this->ion_auth->user()->row();
			
	

			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_client', $data);
			$this->load->view('agent/footer', $data);
		}else{
			$form_data['name']   = $this->input->post('name', TRUE);
			$form_data['position']   = $this->input->post('position', TRUE);
			$form_data['email']   = $this->input->post('email', TRUE);
			$form_data['phone']   = $this->input->post('phone', TRUE);
			$form_data['address']   = $this->input->post('address', TRUE);
			$form_data['city']   = $this->input->post('city', TRUE);
			$form_data['state']   = $this->input->post('state', TRUE);
			$form_data['notes']   = $this->input->post('notes', TRUE);
			$form_data['payment_info']   = $this->input->post('payment_info', TRUE);
			if($this->input->post('postal_code', TRUE)){
				$form_data['postal_code']   = $this->input->post('postal_code', TRUE);
			}
			$form_data['discount']   = ($this->input->post('discount', TRUE)) ? $this->input->post('discount', TRUE) : '0' ;
			$user = $this->ion_auth->user()->row();
			$form_data['agent_id ']   = $user->id;
			$id = $this->Client_model->add_client($form_data);
			if($id){
				$this->session->set_flashdata('success', "Client has been added successfully");
				redirect('agent/clients/', 'refresh');
			}else{
				$this->session->set_flashdata('danger', "Something went wrong! Please try again");
				redirect('agent/clients/', 'refresh');
			}

		}

	}

	public function update_client($client_id){
		$data['css'] = array(
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/validator.js',
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();

		$data['client'] = $this->Client_model->get_agent_client_by_id($agent->id, $this->hasher->decrypt($client_id));
		
		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_client', $data);
		$this->load->view('agent/footer', $data);
	}

	public function save_client(){

		$id = $this->input->post('id', TRUE);

		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('position', 'Position', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('state', 'State', 'trim|required');
		$this->form_validation->set_rules('notes', 'Notes', 'trim|required');
		$this->form_validation->set_rules('payment_info', 'Payment info', 'trim|required');
		//$this->form_validation->set_rules('postal_code', 'Postal code', 'trim|required');
		if ($this->form_validation->run() == FALSE){
			$this->update_client($id);
		}else{
			$form_data['name']   = $this->input->post('name', TRUE);
			$form_data['position']   = $this->input->post('position', TRUE);
			$form_data['email']   = $this->input->post('email', TRUE);
			$form_data['phone']   = $this->input->post('phone', TRUE);
			$form_data['address']   = $this->input->post('address', TRUE);
			$form_data['city']   = $this->input->post('city', TRUE);
			$form_data['state']   = $this->input->post('state', TRUE);
			$form_data['notes']   = $this->input->post('notes', TRUE);
			$form_data['payment_info']   = $this->input->post('payment_info', TRUE);
			if($this->input->post('postal_code', TRUE)){
			   $form_data['postal_code']   = $this->input->post('postal_code', TRUE);
			}
			$form_data['discount']   = ($this->input->post('discount', TRUE)) ? $this->input->post('discount', TRUE) : '0' ;

			$agent = $this->ion_auth->user()->row();
			$form_data['agent_id ']   = $agent->id;
			$this->Client_model->update_client($this->hasher->decrypt($id), $form_data);
			$this->session->set_flashdata('success', "Client has been updated successfully");
			redirect('agent/clients/', 'refresh');
		}
	}

    public function delete_client(){
        if($this->input->is_ajax_request()){
			$client_id   = $this->hasher->decrypt($this->input->post('client_id', TRUE));
			
			$agent = $this->ion_auth->user()->row();

			$invoices = $this->Invoice_model->get_invoices_by_client_id($client_id);

			if($invoices){
				foreach($invoices as $invoice){
					$invoice_items = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $invoice->invoice_id);
					if($invoice_items){
						foreach($invoice_items as $invoice_item){
							$this->Invoice_items_model->delete_invoice_item_by_invoice_id($invoice->invoice_id);
						}
					}  
					$this->Invoice_model->delete_agent_invoice($agent->id, $invoice->invoice_id);
				}
	     	}

			$estimates = $this->Estimate_model->get_estimates_by_client_id($client_id);
			
            if($estimates){
				foreach($estimates as $estimate){
					$estimate_items = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $estimate->estimate_id);
					if($estimate_items){
						foreach($estimate_items as $estimate_item){
							$this->Estimate_items_model->delete_estimate_item($estimate->estimate_id);
						}
					} 
					$this->Estimate_model->delete_agent_estimate($agent->id, $estimate->estimate_id);
				}
		    }
	
			$this->Client_model->delete_client($agent->id, $client_id);

            $response  =  array('type' => 'success', 'message' =>  "Agent has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
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

		$agent = $this->ion_auth->user()->row();

		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/invoices', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_invoice(){
		
		$this->form_validation->set_rules('client_id', 'Client', 'trim|required');
		$this->form_validation->set_rules('issue', 'Issue Date', 'trim|required');
		$this->form_validation->set_rules('due', 'Due Date', 'trim|required');

		$this->form_validation->set_rules('amountsubtotal', 'Items', 'trim|required', array('required' => "Please add some invoice items"));

		if ($this->form_validation->run() == FALSE){
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
	
			$agent = $this->ion_auth->user()->row();
	
			$data['settings'] = $this->agent_settings;
			
			$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);
	
			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_invoice', $data);
			$this->load->view('agent/footer', $data);
		}else{
			$agent = $this->ion_auth->user()->row();
			
			$this->check_settings($agent->id, 'add_invoice');

			$item_name     =  $this->input->post('item', TRUE);
			$item_price    =  $this->input->post('price', TRUE);
			$item_quantity =  $this->input->post('quantity', TRUE);
			$item_totals   =  $this->input->post('totals', TRUE);

			$form_data['agent_id ']           = $agent->id;
			$form_data['client_id']           = $this->input->post('client_id', TRUE);
			$form_data['invoice_no']          = 'INV-'.random_string('numeric', 6);
			$form_data['invoice_status']      = $this->input->post('status', TRUE);
			$form_data['invoice_subtotal']    = $this->input->post('amountsubtotal', TRUE);
			$form_data['invoice_total']       = $this->input->post('amounttotal', TRUE);
			$form_data['invoice_issue']       = $this->input->post('issue', TRUE);
			$form_data['invoice_due']         = $this->input->post('due', TRUE);
			$form_data['invoice_discount']    = $this->input->post('amountdiscount', TRUE);

			$invoice_id = $this->Invoice_model->add_invoice($form_data);

			if(!empty($item_name)){
				foreach($item_name as $key => $k ) {
					$form_data2 = array(
						'invoice_id'              => $invoice_id,
						'invoice_item_name'       => $k,
						'agent_id '               =>  $agent->id,
						'invoice_item_unit_price' =>  $item_price[$key],
						'invoice_item_qty'        =>  $item_quantity[$key],
						'invoice_item_total'      =>  $item_totals[$key],
					);
					$this->Invoice_items_model->add_invoice_items($form_data2);
				}
			}
			
			$this->session->set_flashdata('success', "Invoice has been added successfully");
			redirect('agent/invoices/', 'refresh');

		}

	}

	public function update_invoice($invoice_id){

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

		$agent = $this->ion_auth->user()->row();
		$data['invoice'] = $this->Invoice_model->get_invoice_by_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['invoice_items'] = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['settings'] = $this->agent_settings;
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_invoice', $data);
		$this->load->view('agent/footer', $data);
	}

	public function save_invoice(){

		$id   =  $this->input->post('id', TRUE);

		$this->form_validation->set_rules('client_id', 'Client', 'trim|required');
		$this->form_validation->set_rules('issue', 'Issue Date', 'trim|required');
		$this->form_validation->set_rules('due', 'Due Date', 'trim|required');
		$this->form_validation->set_rules('amountsubtotal', 'Items', 'trim|required', array('required' => "Please add some invoice items"));

		if ($this->form_validation->run() == FALSE){
          $this->update_invoice($id);
		}else{
		   $agent = $this->ion_auth->user()->row();

		   $form_data['client_id']           = $this->input->post('client_id', TRUE);
		   $form_data['invoice_status']      = $this->input->post('status', TRUE);
		   $form_data['invoice_subtotal']    = $this->input->post('amountsubtotal', TRUE);
		   $form_data['invoice_total']       = $this->input->post('amounttotal', TRUE);
		   $form_data['invoice_issue']       = $this->input->post('issue', TRUE);
		   $form_data['invoice_due']         = $this->input->post('due', TRUE);
		   $form_data['invoice_discount']    = $this->input->post('amountdiscount', TRUE);

		   $this->Invoice_model->update_invoice($this->hasher->decrypt($id), $agent->id, $form_data);
			
			$item_name     =  $this->input->post('item', TRUE);
			$item_price    =  $this->input->post('price', TRUE);
			$item_quantity =  $this->input->post('quantity', TRUE);
			$item_totals   =  $this->input->post('totals', TRUE);
			$item_id       =  $this->input->post('invoice_item_id', TRUE);

			if(!empty($item_name)){
				//$invoice_items_array = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $this->hasher->decrypt($id));
				foreach($item_name as $key => $k ) {
					if(isset($item_id[$key])){
						$form_data2 = array(
							'invoice_item_name'       => $k,
							'agent_id '               =>  $agent->id,
							'invoice_item_unit_price' =>  $item_price[$key],
							'invoice_item_qty'        =>  $item_quantity[$key],
							'invoice_item_total'      =>  $item_totals[$key],
						);
						$this->Invoice_items_model->update_invoice_items($item_id[$key], $agent->id, $form_data2);
					}else{
						$form_data3 = array(
							'invoice_id'              =>  $this->hasher->decrypt($id),
							'invoice_item_name'       =>  $k,
							'agent_id '               =>  $agent->id,
							'invoice_item_unit_price' =>  $item_price[$key],
							'invoice_item_qty'        =>  $item_quantity[$key],
							'invoice_item_total'      =>  $item_totals[$key],
						);
						$this->Invoice_items_model->add_invoice_items($form_data3);
					}
				}
			}

			$this->session->set_flashdata('success','Invoice has been updated successfully!!!');
            redirect('agent/invoices', 'refresh');
		}
	}

	public function  view_invoice($invoice_id){
		
		$data['css'] = array(
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/print.js',
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();
		$data['invoice'] = $this->Invoice_model->get_invoice_by_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['invoice_items'] = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['settings'] = $this->agent_settings;
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$this->load->view('agent/header', $data);
		$this->load->view('agent/view_invoice', $data);
		$this->load->view('agent/footer', $data);
	}

	public function download_invoice($invoice_id){
	    
        $agent = $this->ion_auth->user()->row();
		$data['invoice'] = $this->Invoice_model->get_invoice_by_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['invoice_items'] = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $this->hasher->decrypt($invoice_id));
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);
		
	    $this->load->helper('app_helper');
		$viewfile = $this->load->view('agent/pdf_invoice', $data, TRUE);
		
		$this->load->helper('dompdf');
		
		$date = date('Y_m_d_h_i_s');
		
		pdf_create($viewfile, "Invoice".$date, 1, 1);
	}

	public function delete_invoice_items(){
		if($this->input->is_ajax_request()){
            $invoice_item_id   = $this->hasher->decrypt($this->input->post('invoice_item_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$invoice_item = $this->Invoice_items_model->get_invoice_items_by_id($agent->id, $invoice_item_id);
			$invoice = $this->Invoice_model->get_invoice_by_id($agent->id, $invoice_item->invoice_id);
			$invoice_total = $invoice_item->invoice_item_total - ($invoice_item->invoice_item_total * ($invoice->invoice_discount/100));
			$this->Invoice_model->update_invoice_amount($agent->id, $invoice_item->invoice_id, number_format($invoice_item->invoice_item_total, 2, '.', ''), number_format($invoice_total, 2, '.', ''));
			$this->Invoice_items_model->delete_invoice_item($invoice_item_id);
			$response  =  array('type' => 'success', 'message' =>  "Invoice has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function invoice_list(){
        if($this->input->is_ajax_request()){
            $list = $this->TDAgent_invoice_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $invoice) {
                $no++;
                $row = array();
                $row[] = $invoice->invoice_no;
                $row[] = ucwords($invoice->name);
                $row[] = get_currency_symbol($this->agent_settings->company_currency) . "" .currency_format($invoice->invoice_total);
                $row[] = $invoice->invoice_issue;
				$row[] = $invoice->invoice_due;
				$row[] = ucfirst($invoice->invoice_status);
                $row[] = $this->hasher->encrypt($invoice->invoice_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAgent_invoice_model->count_all(),
                "recordsFiltered" => $this->TDAgent_invoice_model->count_filtered(),
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
			$agent = $this->ion_auth->user()->row();
			$invoice_items = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $invoice_id);
			foreach($invoice_items as $invoice_item){
				$this->Invoice_items_model->delete_invoice_item_by_invoice_id($invoice_id);
			}
			$this->Invoice_model->delete_agent_invoice($agent->id, $invoice_id);
			$response  =  array('type' => 'success', 'message' =>  "Invoice has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function company_settings(){
		$data['css'] = array(
			'/css/select2.css',
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/select2.js',
			'/js/validator.js',
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);

		$this->load->view('agent/header', $data);
		$this->load->view('agent/company_settings', $data);
		$this->load->view('agent/footer', $data);
	}

	public function update_company_settings(){

		$agent = $this->ion_auth->user()->row();

		$this->form_validation->set_rules('company_name', 'Name', 'trim|required');
		$this->form_validation->set_rules('company_street_01', 'Street 01', 'trim|required');
		$this->form_validation->set_rules('company_email_address', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('company_city', 'City', 'trim|required');
		$this->form_validation->set_rules('company_phone', 'Phone', 'trim|required');
		$this->form_validation->set_rules('company_state', 'State', 'trim|required');
		$this->form_validation->set_rules('company_postal_code', 'Postal Code', 'trim|required');
		$this->form_validation->set_rules('currency', 'Currency', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->company_settings();
		}else{

			if($_FILES['company_logo']['name'] != ""){
				$config['upload_path']          = './backend/images/logos/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 1000;
                $config['encrypt_name']         = TRUE;
                $this->load->library('upload', $config);
				$this->upload->initialize($config);
				
				if(!$this->upload->do_upload('company_logo')){
                    $this->session->set_flashdata('danger', $this->upload->display_errors());
                    $this->company_settings();
				}else{
				    
					$current_logo = $this->Company_settings_model->get_user_company_logo($agent->id);
					

					if($current_logo){
    					if (file_exists('./backend/images/logos/'.$current_logo)){
    						unlink('./backend/images/logos/'.$current_logo);						 
    					}
					}
					$form_data['company_logo']          = $this->upload->data()['file_name'];
					$form_data['company_name']          = $this->input->post('company_name', TRUE);
					$form_data['company_street_01']     = $this->input->post('company_street_01', TRUE);
					if($this->input->post('company_street_02', TRUE)){
					  $form_data['company_street_02']     = $this->input->post('company_street_02', TRUE);
					}
					$form_data['company_email_address'] = $this->input->post('company_email_address', TRUE);
					$form_data['company_city']          = $this->input->post('company_city', TRUE);
					$form_data['company_state']         = $this->input->post('company_state', TRUE);
					$form_data['company_postal_code']   = $this->input->post('company_postal_code', TRUE);
					$form_data['company_phone']         = $this->input->post('company_phone', TRUE);
					$form_data['company_currency']      = $this->input->post('currency', TRUE);

					if($this->Company_settings_model->required_company_setting_update($agent->id)){
						$form_data['agent_id']  = $agent->id;
						$this->Company_settings_model->add_company_setting($form_data);
						$this->session->set_flashdata('success', "Settings has been updated successfully");
						redirect('agent/company_settings/', 'refresh');
					}else{
						$this->Company_settings_model->update_company_setting($agent->id, $form_data);
						$this->session->set_flashdata('success', "Settings has been updated successfully");
						redirect('agent/company_settings/', 'refresh');
					}
				}
			}else{
			    
				$form_data['company_name']          = $this->input->post('company_name', TRUE);
				$form_data['company_street_01']     = $this->input->post('company_street_01', TRUE);
				if($this->input->post('company_street_02', TRUE)){
				  $form_data['company_street_02']     = $this->input->post('company_street_02', TRUE);
				}
				$form_data['company_email_address'] = $this->input->post('company_email_address', TRUE);
				$form_data['company_city']          = $this->input->post('company_city', TRUE);
				$form_data['company_state']         = $this->input->post('company_state', TRUE);
				$form_data['company_postal_code']   = $this->input->post('company_postal_code', TRUE);
				$form_data['company_phone']         = $this->input->post('company_phone', TRUE);
				$form_data['company_currency']         = $this->input->post('currency', TRUE);

				if($this->Company_settings_model->required_company_setting_update($agent->id)){
					$form_data['agent_id']  = $agent->id;
					$this->Company_settings_model->add_company_setting($form_data);
					$this->session->set_flashdata('success', "Settings has been updated successfully");
					redirect('agent/company_settings/', 'refresh');
				}else{
					$this->Company_settings_model->update_company_setting($agent->id, $form_data);
					$this->session->set_flashdata('success', "Settings has been updated successfully");
					redirect('agent/company_settings/', 'refresh');
				}
			}
		}

	}

	public function get_client_details(){
		if($this->input->is_ajax_request()){
			$client_id = $this->input->get('client_id');
			$agent = $this->ion_auth->user()->row();
			$data['client'] = $this->Client_model->get_agent_client_by_id($agent->id, $client_id);
            $response  =  array('type' => 'success', 'message' => $data);
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function expenses(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
			'/css/select2.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
			'/js/dialog.js',
			'/js/select2.js',
            '/js/app.js',
		);

		$agent = $this->ion_auth->user()->row();

		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

		$data['expenses'] = $this->Expense_model->get_agent_expense_list($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/expenses', $data);
		$this->load->view('agent/footer', $data);
	}

	public function expense_list(){
        if($this->input->is_ajax_request()){
            $list = $this->TDAgent_expense_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $expense) {
                $no++;
                $row = array();
                $row[] = $expense->title;
                $row[] = ucwords($expense->name);
                $row[] = $expense->created_date;
                $row[] = get_currency_symbol($this->agent_settings->company_currency) . "" . currency_format($expense->total);
				$row[] = ucfirst($expense->status);
                $row[] = $this->hasher->encrypt($expense->expense_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAgent_expense_model->count_all(),
                "recordsFiltered" => $this->TDAgent_expense_model->count_filtered(),
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

	public function add_expense(){

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('created', 'Created Date', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required');
		$this->form_validation->set_rules('expense_amounttotal', 'expense_amounttotal', 'trim|required', array('required' => "Please add some items"));

		if ($this->form_validation->run() == FALSE){
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
	
			$agent = $this->ion_auth->user()->row();
	
			$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

	        $data['settings'] = $this->agent_settings;
						
	

			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_expense', $data);
			$this->load->view('agent/footer', $data);
		}else{

			$agent = $this->ion_auth->user()->row();
			
			$this->check_settings($agent->id, 'add_expense');

			$form_data['agent_id ']        = $agent->id;
			$form_data['title']            = $this->input->post('title', TRUE);
			$form_data['category_id']      = $this->input->post('category_id', TRUE);
			$form_data['created_date']     = $this->input->post('created', TRUE);
			if($this->input->post('vat', TRUE)){
		    	$form_data['vat']          = $this->input->post('vat', TRUE);
			}
			if($this->input->post('comments', TRUE)){
		    	$form_data['comments']          = $this->input->post('comments', TRUE);
			}
			$form_data['payment_method']   = $this->input->post('payment_method', TRUE);
			$form_data['status']           = $this->input->post('status', TRUE);
			$form_data['total']            = $this->input->post('expense_amounttotal', TRUE);
			$form_data['subtotal']         = $this->input->post('expense_amountsubtotal', TRUE);

			$expense_id = $this->Expense_model->add_expense($form_data);

			$item_name     =  $this->input->post('expense_item', TRUE);
			$item_price    =  $this->input->post('expense_price', TRUE);
			$item_quantity =  $this->input->post('expense_quantity', TRUE);
			$item_totals   =  $this->input->post('expense_totals', TRUE);

			if(!empty($item_name)){
				foreach($item_name as $key => $k ) {
					$form_data2 = array(
						'expense_id'              => $expense_id,
						'expense_item_title'      => $k,
						'agent_id '               =>  $agent->id,
						'expense_item_unit_price' =>  $item_price[$key],
						'expense_item_qty'        =>  $item_quantity[$key],
						'expense_item_total'      =>  $item_totals[$key],
					);
					$this->Expense_items_model->add_expense_items($form_data2);
				}
			}

			$this->session->set_flashdata('success', "Expense has been added successfully");
			redirect('agent/expenses', 'refresh');

		}
	}

	public function update_expense($expense_id){

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

		$agent = $this->ion_auth->user()->row();
	
		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

		$data['expense'] = $this->Expense_model->get_expense($agent->id, $this->hasher->decrypt($expense_id));

		$data['expense_items'] =  $this->Expense_items_model->get_expense_items_by_expenses_id($agent->id, $this->hasher->decrypt($expense_id));

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_expense', $data);
		$this->load->view('agent/footer', $data);

	}

	public function save_expense(){

		$expense_id   =  $this->input->post('id', TRUE);

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('category_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('created', 'Created Date', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('payment_method', 'Payment Method', 'trim|required');
		$this->form_validation->set_rules('expense_amounttotal', 'Due Date', 'trim|required', array('required' => "Please add some items"));
	
	    if ($this->form_validation->run() == FALSE){
			$this->update_expense($expense_id);
		}else{
			$agent = $this->ion_auth->user()->row();

			$form_data['category_id']      = $this->input->post('category_id', TRUE);
			$form_data['title']            = $this->input->post('title', TRUE);
			$form_data['created_date']     = $this->input->post('created', TRUE);
			if($this->input->post('vat', TRUE)){
		    	$form_data['vat']          = $this->input->post('vat', TRUE);
			}
			if($this->input->post('comments', TRUE)){
		    	$form_data['comments']          = $this->input->post('comments', TRUE);
			}
			$form_data['payment_method']   = $this->input->post('payment_method', TRUE);
			$form_data['status']           = $this->input->post('status', TRUE);
			$form_data['total']            = $this->input->post('expense_amounttotal', TRUE);
			$form_data['subtotal']         = $this->input->post('expense_amountsubtotal', TRUE);

			$this->Expense_model->update_expense($agent->id, $this->hasher->decrypt($expense_id), $form_data);

			$item_name     =  $this->input->post('expense_item', TRUE);
			$item_price    =  $this->input->post('expense_price', TRUE);
			$item_quantity =  $this->input->post('expense_quantity', TRUE);
			$item_totals   =  $this->input->post('expense_totals', TRUE);
			$item_id       =  $this->input->post('expense_item_id', TRUE);

			if(!empty($item_name)){
				foreach($item_name as $key => $k ) {
					if(isset($item_id[$key])){
						$form_data2 = array(
							'expense_item_title'      => $k,
							'agent_id '               =>  $agent->id,
							'expense_item_unit_price' =>  $item_price[$key],
							'expense_item_qty'        =>  $item_quantity[$key],
							'expense_item_total'      =>  $item_totals[$key],
						);
						$this->Expense_items_model->update_expense_items($item_id[$key], $agent->id, $form_data2);
					}else{
						$form_data3 = array(
							'expense_id'              => $this->hasher->decrypt($expense_id),
							'expense_item_title'      => $k,
							'agent_id '               =>  $agent->id,
							'expense_item_unit_price' =>  $item_price[$key],
							'expense_item_qty'        =>  $item_quantity[$key],
							'expense_item_total'      =>  $item_totals[$key],
						);
						$this->Expense_items_model->add_expense_items($form_data3);
					}
				}
			}

			$this->session->set_flashdata('success', "Expense has been updated successfully");
			redirect('agent/expenses', 'refresh');
		}
	}

	public function delete_expense(){
		if($this->input->is_ajax_request()){
            $expense_id   = $this->hasher->decrypt($this->input->post('expense_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$this->Expense_model->delete_expense($agent->id, $expense_id);
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

	public function view_expense($expense_id){

		$data['css'] = array(
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();
	
		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

		$data['expense'] = $this->Expense_model->get_expense($agent->id, $this->hasher->decrypt($expense_id));

		$data['expense_items'] =  $this->Expense_items_model->get_expense_items_by_expenses_id($agent->id, $this->hasher->decrypt($expense_id));

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/view_expense', $data);
		$this->load->view('agent/footer', $data);

	}

	public function download_expense($expense_id){
		$agent = $this->ion_auth->user()->row();
		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);
		$data['expense'] = $this->Expense_model->get_expense($agent->id, $this->hasher->decrypt($expense_id));
		$data['expense_items'] =  $this->Expense_items_model->get_expense_items_by_expenses_id($agent->id, $this->hasher->decrypt($expense_id));
		$data['settings'] = $this->agent_settings;
		$this->load->helper('app_helper');
		$viewfile = $this->load->view('agent/pdf_expense', $data, TRUE);

		$this->load->helper('dompdf');
		$date = date('Y_m_d_h_i_s');
		pdf_create($viewfile, "Expense".$date, 1, 1);
	}

	public function delete_expense_item(){
		if($this->input->is_ajax_request()){
			$expense_item_id   = $this->hasher->decrypt($this->input->post('expense_item_id', TRUE));
			
			$agent = $this->ion_auth->user()->row();

			$expense_item = $this->Expense_items_model->get_expense_items_by_id($agent->id, $expense_item_id);

			$expense = $this->Expense_model->get_expense($agent->id, $expense_item->expense_id);

			$vatToPay = ($expense_item->expense_item_total / 100) * $expense->vat;

			$total_deduct_amount = $expense_item->expense_item_total + $vatToPay;

			$this->Expense_model->update_expense_amount($agent->id, $expense_item->expense_id, number_format($expense_item->expense_item_total, 2, '.', ''), number_format($total_deduct_amount, 2, '.', ''));
			
			$this->Expense_items_model->delete_expense_item($expense_item_id);
			
			$response  =  array('type' => 'success', 'message' =>  "Expense has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function expense_categories(){
		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
            '/js/dialog.js',
            '/js/app.js',
		);

		$agent = $this->ion_auth->user()->row();

		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/expense_categories', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_expense_category(){

		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/app.css'
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js',
			);
	
			$data['settings'] = $this->agent_settings;
			
	

			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_expense_category', $data);
			$this->load->view('agent/footer', $data);
		}else{
			$agent = $this->ion_auth->user()->row();

			$form_data['agent_id ']  = $agent->id;
			$form_data['name']       = $this->input->post('name', TRUE);	

			$is_inserted = $this->Expense_category_model->add_expense_category($form_data);

			if($is_inserted){
				$this->session->set_flashdata('success', "Category has been added successfully");
				redirect('agent/expense_categories/', 'refresh');
			}else{
				$this->session->set_flashdata('danger', "Something went wrong, please try again later");
				redirect('agent/expense_categories/', 'refresh');
			}


		}
	}

	public function update_expense_category($category_id){

		$data['css'] = array(
			'/css/app.css'
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/app.js',
		);

		$expense_category_id   = $this->hasher->decrypt($category_id);

		$agent = $this->ion_auth->user()->row();

		$data['category'] = $this->Expense_category_model->get_expense_category($agent->id, $expense_category_id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_expense_category', $data);
		$this->load->view('agent/footer', $data);
	}

	public function save_expense_category(){
		$expense_category_id   = $this->input->post('id', TRUE);

		$this->form_validation->set_rules('name', 'Name', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->update_expense_category($expense_category_id);
		}else{
			$agent = $this->ion_auth->user()->row();
			$form_data['name']       = $this->input->post('name', TRUE);
			$this->Expense_category_model->update_expense_category($agent->id, $this->hasher->decrypt($expense_category_id), $form_data);
			$this->session->set_flashdata('success', "Category has been updated successfully");
			redirect('agent/expense_categories/', 'refresh');
		}

	}

	public function delete_expense_category(){
		if($this->input->is_ajax_request()){
            $expense_category_id   = $this->hasher->decrypt($this->input->post('category_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$expenses = $this->Expense_model->get_expense_by_category_id($expense_category_id);
            if($expenses){
               foreach($expenses as $expense){
				if($expense){
					$expense_items = $this->Expense_items_model->get_expense_items_by_expenses_id($agent->id, $expense->expense_id);
                    if($expense_items){
                      foreach($expense_items as $expense_item){
						$this->Expense_items_model->delete_expense_item_by_expense_id($expense->expense_id);
					  }
					}
				}
				$this->Expense_model->delete_expense($agent->id, $expense->expense_id);
			   }
			}
			$this->Expense_category_model->delete_expense_category($agent->id, $expense_category_id);
			$response  =  array('type' => 'success', 'message' =>  "Invoice has been deleted successfully");
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
			'/css/select2.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
			'/js/dialog.js',
			'/js/select2.js',
            '/js/app.js',
		);


		$agent = $this->ion_auth->user()->row();

		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/estimates', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_estimate(){

		$this->form_validation->set_rules('client_id', 'Client', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('valid', 'Valid', 'trim|required');
		$this->form_validation->set_rules('amountsubtotal', 'amountsubtotal', 'trim|required', array('required' => "Please add some items"));

		if ($this->form_validation->run() == FALSE){
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
			$agent = $this->ion_auth->user()->row();
			$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);
			$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
	
			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_estimate', $data);
			$this->load->view('agent/footer', $data);
		}else{
		    

			$agent = $this->ion_auth->user()->row();
			
			$this->check_settings($agent->id, 'add_estimate');

			$form_data['agent_id ']                 = $agent->id;
			$form_data['client_id']                 = $this->input->post('client_id', TRUE);
			$form_data['estimate_created_date']     = $this->input->post('date', TRUE);
			$form_data['estimate_valid_unil_date']  = $this->input->post('valid', TRUE);
		    $form_data['estimate_discount']         = $this->input->post('amountdiscount', TRUE);
			
			if($this->input->post('estimate_no', TRUE)){
		    	$form_data['estimate_no']     = $this->input->post('estimate_no', TRUE);
			}else{
				$form_data['estimate_no']     = 'EST-'.random_string('numeric', 6);
			}
			$form_data['estimate_subtotal']   = $this->input->post('amountsubtotal', TRUE);
			$form_data['estimate_total']      = $this->input->post('amounttotal', TRUE);

			$estimate_id = $this->Estimate_model->add_estimate($form_data);

			$item_name     =  $this->input->post('item', TRUE);
			$item_price    =  $this->input->post('price', TRUE);
			$item_quantity =  $this->input->post('quantity', TRUE);
			$item_totals   =  $this->input->post('totals', TRUE);

			if(!empty($item_name)){
				foreach($item_name as $key => $k ) {
					$form_data2 = array(
						'estimate_id'               => $estimate_id,
						'estimate_item_name'        => $k,
						'agent_id '                 =>  $agent->id,
						'estimate_item_unit_price'  =>  $item_price[$key],
						'estimate_item_qty'         =>  $item_quantity[$key],
						'estimate_item_total'       =>  $item_totals[$key],
					);
					$this->Estimate_items_model->add_estimate_items($form_data2);
				}
			}
			$this->session->set_flashdata('success', "Estimate has been added successfully");
			redirect('agent/estimates/', 'refresh');
		}
	}

	public function estimate_list(){
		if($this->input->is_ajax_request()){
            $list = $this->TDAgent_estimate_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $estimate) {
                $no++;
                $row = array();
                $row[] = $estimate->estimate_no;
                $row[] = ucwords($estimate->name);
                $row[] = get_currency_symbol($this->agent_settings->company_currency) . "" . currency_format($estimate->estimate_total);
                $row[] = $estimate->estimate_created_date;
				$row[] = $estimate->estimate_valid_unil_date;
				$row[] = ucfirst($estimate->estimates_status);
                $row[] = $this->hasher->encrypt($estimate->estimate_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAgent_estimate_model->count_all(),
                "recordsFiltered" => $this->TDAgent_estimate_model->count_filtered(),
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

	public function delete_estimate(){
		if($this->input->is_ajax_request()){
			$estimate_id   = $this->hasher->decrypt($this->input->post('estimate_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$estimate_items = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $estimate_id);
			foreach($estimate_items as $estimate_item){
				$this->Estimate_items_model->delete_estimate_item($estimate_id);
			}
			$this->Estimate_model->delete_agent_estimate($agent->id, $estimate_id);
			$response  =  array('type' => 'success', 'message' =>  "Estimate has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
        }
	}

	public function update_estimate($estimate_id){
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

		$agent = $this->ion_auth->user()->row();
		$data['estimate'] = $this->Estimate_model->get_estimate_by_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);			

		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_estimate', $data);
		$this->load->view('agent/footer', $data);
	}

	public function save_estimate(){

		$id   =  $this->input->post('id', TRUE);

		$this->form_validation->set_rules('client_id', 'Client', 'trim|required');
		$this->form_validation->set_rules('date', 'Date', 'trim|required');
		$this->form_validation->set_rules('valid', 'Valid', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required');
		$this->form_validation->set_rules('amountsubtotal', 'amountsubtotal', 'trim|required', array('required' => "Please add some items"));

		if ($this->form_validation->run() == FALSE){
			$this->update_estimate($id);
		}else{
			$agent = $this->ion_auth->user()->row();

			$form_data['client_id']                 = $this->input->post('client_id', TRUE);
			$form_data['estimate_created_date']     = $this->input->post('date', TRUE);
			$form_data['estimate_valid_unil_date']  = $this->input->post('valid', TRUE);
			$form_data['estimate_discount']         = $this->input->post('amountdiscount', TRUE);
			$form_data['estimate_subtotal']         = $this->input->post('amountsubtotal', TRUE);
			$form_data['estimate_total']            = $this->input->post('amounttotal', TRUE);
			$form_data['estimates_status']          = $this->input->post('status', TRUE);
			$this->Estimate_model->update_estimate($this->hasher->decrypt($id), $agent->id, $form_data);

			$item_name     =  $this->input->post('item', TRUE);
			$item_price    =  $this->input->post('price', TRUE);
			$item_quantity =  $this->input->post('quantity', TRUE);
			$item_totals   =  $this->input->post('totals', TRUE);
			$item_id       =  $this->input->post('item_id', TRUE);

			if(!empty($item_name)){
				foreach($item_name as $key => $k ) {
					if(isset($item_id[$key])){
						$form_data2 = array(
							'estimate_item_name'        => $k,
							'agent_id '                 =>  $agent->id,
							'estimate_item_unit_price'  =>  $item_price[$key],
							'estimate_item_qty'         =>  $item_quantity[$key],
							'estimate_item_total'       =>  $item_totals[$key],
						);
						$this->Estimate_items_model->update_estimate_items($item_id[$key], $agent->id, $form_data2);
					}else{
						$form_data3 = array(
							'estimate_id'               => $this->hasher->decrypt($id),
							'estimate_item_name'        => $k,
							'agent_id '                 =>  $agent->id,
							'estimate_item_unit_price'  =>  $item_price[$key],
							'estimate_item_qty'         =>  $item_quantity[$key],
							'estimate_item_total'       =>  $item_totals[$key],
						);
						$this->Estimate_items_model->add_estimate_items($form_data3);
					}
				}
			}

			$this->session->set_flashdata('success','Estimate has been updated successfully!!!');
            redirect('agent/estimates', 'refresh');
		}

	}

	public function delete_estimate_item(){
		if($this->input->is_ajax_request()){
            $estimate_item_id   = $this->hasher->decrypt($this->input->post('estimate_item_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$estimate_item = $this->Estimate_items_model->get_estimate_items_by_id($agent->id, $estimate_item_id);
			$estimate = $this->Estimate_model->get_estimate_by_id($agent->id, $estimate_item->estimate_id);
			$estimate_total = $estimate_item->estimate_item_total - ($estimate_item->estimate_item_total * ($estimate->estimate_discount/100));
			$this->Estimate_model->update_estimate_amount($agent->id, $estimate_item->estimate_id, number_format($estimate_item->estimate_item_total, 2, '.', ''), number_format($estimate_total, 2, '.', ''));
			$this->Estimate_items_model->delete_estimate_item($estimate_item_id);
			$response  =  array('type' => 'success', 'message' =>  "Estimate has been deleted successfully");
			header("Content-type: application/json");	
			echo json_encode($response);
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

		$agent = $this->ion_auth->user()->row();
		$data['estimate'] = $this->Estimate_model->get_estimate_by_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);
		$data['settings'] = $this->agent_settings;

		$this->load->view('agent/header', $data);
		$this->load->view('agent/view_estimate', $data);
		$this->load->view('agent/footer', $data);
	}

	public function download_estimate($estimate_id){
        $agent = $this->ion_auth->user()->row();
		$data['estimate'] = $this->Estimate_model->get_estimate_by_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $this->hasher->decrypt($estimate_id));
		$data['settings'] = $this->agent_settings;
		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);
	
		$this->load->helper('app_helper');
		    
		$viewfile = $this->load->view('agent/pdf_estimate', $data, TRUE);
		
		$this->load->helper('dompdf');
		
		$date = date('Y_m_d_h_i_s');
		
		pdf_create($viewfile, "Estimate".$date, 1, 1);

	}

	public function get_total_income_report(){
	  $agent = $this->ion_auth->user()->row();
	  echo json_encode($this->Reports_model->total_income_report($agent->id));
	}

	public function get_expenses_vs_income(){
		$agent = $this->ion_auth->user()->row();
		echo json_encode($this->Reports_model->get_expenses_vs_income_report($agent->id));
	}

	public function report_expenses_vs_income(){
		$data['css'] = array(
			'/css/datepicker.css',
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/datepicker.js',
			'/js/Chartjs.js',
			'/js/app.js'
		);

		$data['settings'] = $this->agent_settings;

		$agent = $this->ion_auth->user()->row();
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/report_expenses_vs_income', $data);
		$this->load->view('agent/footer', $data);
	}

	public function report_expenses(){
		$data['css'] = array(
			'/css/app.css'
		);

		$data['js'] = array(
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();

		$data['categories'] = $this->Expense_category_model->get_agent_expense_category_list($agent->id);

		$data['settings'] = $this->agent_settings;

		$data['agent_id'] = $agent->id;
			


		$data['current_year']  = date('Y');

		$this->load->view('agent/header', $data);
		$this->load->view('agent/report_expenses', $data);
		$this->load->view('agent/footer', $data);
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
	
			$data['settings'] = $this->agent_settings;
			


			$this->load->view('agent/header', $data);
			$this->load->view('agent/change_password', $data);
			$this->load->view('agent/footer', $data);
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

	public function estimate_invoice($estimate_id){
		$agent = $this->ion_auth->user()->row();
		$estimate = $this->Estimate_model->get_estimate_by_id($agent->id, $this->hasher->decrypt($estimate_id));
		$estimate_items = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $this->hasher->decrypt($estimate_id));

		$form_data['agent_id ']           = $agent->id;
		$form_data['client_id']           = $estimate->client_id;
		$form_data['invoice_no']          = 'INV-'.random_string('numeric', 6);
		$form_data['invoice_status']      = 'pending';
		$form_data['invoice_subtotal']    = $estimate->estimate_subtotal;
		$form_data['invoice_total']       = $estimate->estimate_total;
		$form_data['invoice_issue']       = $estimate->estimate_created_date;
		$form_data['invoice_due']         = $estimate->estimate_valid_unil_date;
		$form_data['invoice_discount']    = $estimate->estimate_discount;

		$invoice_id = $this->Invoice_model->add_invoice($form_data);
        if($estimate_items){
			foreach($estimate_items as $estimate_item) {
				$form_data2 = array(
					'invoice_id'              => $invoice_id,
					'invoice_item_name'       => $estimate_item->estimate_item_name,
					'agent_id '               =>  $agent->id,
					'invoice_item_unit_price' =>  $estimate_item->estimate_item_unit_price,
					'invoice_item_qty'        =>  $estimate_item->estimate_item_qty ,
					'invoice_item_total'      =>  $estimate_item->estimate_item_total,
				);
				$this->Invoice_items_model->add_invoice_items($form_data2);
			}
		}
		
		$this->session->set_flashdata('success', "Invoice has been added successfully");
		redirect('agent/invoices/', 'refresh');
	}

	public function mindmap(){

		$data['css'] = array(
            '/css/jquery.dataTables.min.css',
			'/css/responsive.dataTables.min.css',
			'/css/datepicker.css',
			'/css/select2.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
			'/js/dialog.js',
			'/js/select2.js',
            '/js/app.js',
		);

		$agent = $this->ion_auth->user()->row();

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/mindmap', $data);
		$this->load->view('agent/footer', $data);
	}

	public function mindmap_list(){
        if($this->input->is_ajax_request()){
            $list = $this->TDAgent_mindmap_model->get_datatables();
            $data = array();
            $no = $_POST['start'];

            foreach ($list as $mindmap) {
                $no++;
                $row = array();
                $row[] = word_limiter(ucwords($mindmap->mindmap_title), 4, '...');
                $row[] = $mindmap->mindmap_created;
                $row[] = $this->hasher->encrypt($mindmap->mindmap_id);
                $data[] = $row;
            }
    
            $output = array(
                "draw" => $_POST['draw'],
                "recordsTotal" => $this->TDAgent_mindmap_model->count_all(),
                "recordsFiltered" => $this->TDAgent_mindmap_model->count_filtered(),
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

	public function add_mindmap(){

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('mindmap_content', 'Mindmap', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/app.css',
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/mind-elexir.js',
				'/js/app.js',
			);			

			$data['settings'] = $this->agent_settings;

			$agent = $this->ion_auth->user()->row();
			
	

			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_mindmap', $data);
			$this->load->view('agent/footer', $data);
		}else{

			$agent = $this->ion_auth->user()->row();
			
			$form_data['agent_id ']               = $agent->id;
			$form_data['mindmap_title']           = $this->input->post('title', TRUE);
			$form_data['mindmap_description']     = $this->input->post('description', TRUE);
			$form_data['mindmap_content']         = $this->input->post('mindmap_content', TRUE);
			$form_data['mindmap_created']         = date('Y-m-d');

			$this->Mindmap_model->add_mindmap($form_data);

			$this->session->set_flashdata('success', "Mindmap has been added successfully");
			redirect('agent/mindmap/', 'refresh');
		}
	}

	public function update_mindmap($mindmap_id){

		$data['css'] = array(
			'/css/app.css',
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/mind-elexir.js',
			'/js/app.js',
		);	

		$agent = $this->ion_auth->user()->row();

		$data['mindmap'] = $this->Mindmap_model->get_mindmap($agent->id, $this->hasher->decrypt($mindmap_id));

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/update_mindmap', $data);
		$this->load->view('agent/footer', $data);

	}

	public function view_mindmap($mindmap_id){
		$data['css'] = array(
			'/css/app.css',
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/mind-elexir.js',
			'/js/app.js',
		);	

		$agent = $this->ion_auth->user()->row();

		$data['mindmap'] = $this->Mindmap_model->get_mindmap($agent->id, $this->hasher->decrypt($mindmap_id));

		$data['settings'] = $this->agent_settings;
					


		$this->load->view('agent/header', $data);
		$this->load->view('agent/view_mindmap', $data);
		$this->load->view('agent/footer', $data);
	}

	public function save_mindmap(){

		$mindmap_id = $this->input->post('id', TRUE);

		$this->form_validation->set_rules('title', 'Title', 'trim|required');
		$this->form_validation->set_rules('description', 'Description', 'trim|required');
		$this->form_validation->set_rules('mindmap_content', 'Mindmap', 'trim|required');

		if ($this->form_validation->run() == FALSE){
		   $this->update_mindmap($mindmap_id);
		}else{
			$agent = $this->ion_auth->user()->row();
			$form_data['mindmap_title']           = $this->input->post('title', TRUE);
			$form_data['mindmap_description']     = $this->input->post('description', TRUE);
			$form_data['mindmap_content']         = $this->input->post('mindmap_content', TRUE);

			$this->Mindmap_model->update_mindmap($agent->id, $this->hasher->decrypt($mindmap_id), $form_data);

			$this->session->set_flashdata('success', "Mindmap has been updated successfully");
			redirect('agent/mindmap/', 'refresh');
		}
	}

	public function delete_mindmap(){
		if($this->input->is_ajax_request()){
			$mindmap_id   = $this->hasher->decrypt($this->input->post('mindmap_id', TRUE));
			$agent = $this->ion_auth->user()->row();
			$this->Mindmap_model->delete_mindmap($agent->id, $mindmap_id);
			$response  =  array('type' => 'success', 'message' =>  "Mindmap has been deleted successfully");
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
			'/css/select2.css',
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/jquery.dataTables.min.js',
			'/js/dataTables.bootstrap.min.js',
			'/js/responsive.dataTables.min.js',
			'/js/datepicker.js',
			'/js/dialog.js',
			'/js/select2.js',
            '/js/app.js',
		);

		$agent = $this->ion_auth->user()->row();

		$data['tickets'] = $this->Supprt_tickets_model->get_agent_tickets($agent->id);

		$data['settings'] = $this->agent_settings;
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/support', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_ticket(){

		$this->form_validation->set_rules('description', 'Description', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/app.css',
			);
			$data['js'] = array(
				'/js/validator.js',
				'/js/app.js'
			);	
	
			$agent = $this->ion_auth->user()->row();
			
	

			$data['settings'] = $this->agent_settings;
	
			$this->load->view('agent/header', $data);
			$this->load->view('agent/add_ticket', $data);
			$this->load->view('agent/footer', $data);
		}else{

			if(!empty($_FILES['attachment']['name'])){
				$upload_response = $this->upload_photo('attachment');
				if($upload_response['success']){
					$form_data['attachment'] = $upload_response['upload_data']['file_name'];
					$form_data2['attachment'] = $upload_response['upload_data']['file_name'];
				}else{
					$this->session->set_flashdata('danger', $upload_response['message']);
					redirect('agent/add_ticket/', 'refresh');
				}
			}

			$agent = $this->ion_auth->user()->row();

			$form_data['agent_id ']           = $agent->id;
			$form_data['ticket_id']           = 'TKID-'.random_string('numeric', 6);
			$form_data['description']         = $this->input->post('description', TRUE);
			$form_data['status']              = "Open";
			$form_data['created_date']       = date('Y-m-d');

			$ticket_id = $this->Supprt_tickets_model->add_ticket($form_data);

			$form_data2['agent_id ']           = $agent->id;
			$form_data2['ticket_id ']          = $ticket_id;
			$form_data2['identity ']           = 'agent';
			$form_data2['description ']        = $this->input->post('description', TRUE);

			$this->Supprt_tickets_model->add_ticket_replies($form_data2);

			$this->session->set_flashdata('success', "Ticket has been added successfully");
			redirect('agent/support/', 'refresh');
		}
	}

	public function view_ticket($ticket_id){

		$data['css'] = array(
            '/css/dialog.css',
        );
        $data['js'] = array(
			'/js/dialog.js',
            '/js/app.js',
		);


		$data['tickets'] = $this->Supprt_tickets_model->get_single_ticket_replies($this->hasher->decrypt($ticket_id));

		$data['ticket_details'] = $this->Supprt_tickets_model->get_ticket_by_id($this->hasher->decrypt($ticket_id));

		$data['settings'] = $this->agent_settings;

		$agent = $this->ion_auth->user()->row();
			


		$this->load->view('agent/header', $data);
		$this->load->view('agent/view_ticket', $data);
		$this->load->view('agent/footer', $data);
	}

	public function add_reply(){
		if($this->input->is_ajax_request()){

			$ticket_id   = $this->hasher->decrypt($this->input->post('ticket_id', TRUE));

			$agent = $this->ion_auth->user()->row();

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
				$details['agent_id ']           = $agent->id;
				$details['ticket_id ']          = $ticket_details->supprt_ticket_id;
				$details['identity ']           = 'agent';
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

	public function send_invoice($invoice_id){
		$agent = $this->ion_auth->user()->row();
		
		$data['invoice'] = $this->Invoice_model->get_invoice_by_id($agent->id, $this->hasher->decrypt($invoice_id));

		$data['invoice_items'] = $this->Invoice_items_model->get_invoice_items_by_invoice_id($agent->id, $this->hasher->decrypt($invoice_id));
		
		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
		
		$data['user'] = $agent;
		
		$client_data = $this->Client_model->get_agent_client_by_id($agent->id, $data['invoice']->client_id);
		
		$data['client_data'] = $client_data;


		$viewfile = $this->load->view('agent/pdf_invoice', $data, TRUE);
		
		$this->load->helper('dompdf');
		
	    $date = date('Y_m_d_h_i_s');
		
		pdf_create($viewfile, "Invoice".$date, TRUE, '',  1, null);
		
        $to = $client_data->email; 
         
		$from = 'noreply@accountza.io'; 
		
        $fromName = $data['settings']->company_name; 
         
        $subject = 'Invoice';  
         
		$file = "backend/store/Invoice".$date.".pdf";; 
		
    	$invoiceTempate = $this->load->view('emails/invoice', $data, TRUE);
         
        $htmlContent =  $invoiceTempate;
        
        $headers = "From: $fromName"." <".$from.">";     
  
		$semi_rand = md5(time());  
		
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
         
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
         
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

        if(!empty($file) > 0){ 
            if(is_file($file)){ 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($file,"rb"); 
                $data =  @fread($fp,filesize($file)); 
         
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
                "Content-Description: ".basename($file)."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            } 
		} 
		
        $message .= "--{$mime_boundary}--"; 
        $returnpath = "-f" . $from; 
          
        $mail = @mail($to, $subject, $message, $headers, $returnpath);  
		 
		if($mail){
			        
			if(file_exists("backend/store/Invoice".$date.".pdf")){
				unlink("backend/store/Invoice".$date.".pdf");
			 }

			$this->session->set_flashdata('success', "Invoice has been sent successfully");
			redirect('agent/invoices/', 'refresh');
		}

	}

	public function send_estimate($estimate_id){

		$agent = $this->ion_auth->user()->row();

		$data['settings'] = $this->Company_settings_model->get_company_setting($agent->id);
		
		$data['estimate'] = $this->Estimate_model->get_estimate_by_id($agent->id, $this->hasher->decrypt($estimate_id));

		$data['estimate_items'] = $this->Estimate_items_model->get_estimate_items_by_estimate_id($agent->id, $this->hasher->decrypt($estimate_id));

		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$client_data = $this->Client_model->get_agent_client_by_id($agent->id, $data['estimate']->client_id);

		$data['client_data'] = $client_data;
		
		$viewfile = $this->load->view('agent/pdf_estimate', $data, TRUE);
		
		$this->load->helper('dompdf');
		
		$date = date('Y_m_d_h_i_s');
		
		pdf_create($viewfile, "Estimate".$date, TRUE, '',  1, null);

		$data['user'] = $agent;

		$to = $client_data->email; 
         
		$from = 'noreply@accountza.io'; 
		
        $fromName = $data['settings']->company_name; 
         
        $subject = 'Estimate';  
         
		$file = "backend/store/Estimate".$date.".pdf";; 
		
    	$invoiceTempate = $this->load->view('emails/estimate', $data, TRUE);
         
        $htmlContent =  $invoiceTempate;
        
        $headers = "From: $fromName"." <".$from.">";     
  
		$semi_rand = md5(time());  
		
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
         
        $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
         
        $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
        "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  

        if(!empty($file) > 0){ 
            if(is_file($file)){ 
                $message .= "--{$mime_boundary}\n"; 
                $fp =    @fopen($file,"rb"); 
                $data =  @fread($fp,filesize($file)); 
         
                @fclose($fp); 
                $data = chunk_split(base64_encode($data)); 
                $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
                "Content-Description: ".basename($file)."\n" . 
                "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
                "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
            } 
		} 
		
        $message .= "--{$mime_boundary}--"; 
        $returnpath = "-f" . $from; 
          
        $mail = @mail($to, $subject, $message, $headers, $returnpath);  
		 
		if($mail){
			        
			if(file_exists("backend/store/Estimate".$date.".pdf")){
				unlink("backend/store/Estimate".$date.".pdf");
			 }

			$this->session->set_flashdata('success', "Estimate has been sent successfully");
			redirect('agent/estimates/', 'refresh');
		}

	}

	public function get_due_date($value){   

		if($this->input->is_ajax_request()){
			$result = date('Y-m-d', strtotime('+'.$value.' days'));
			$response  =  array('type' => 'success', 'message' =>  $result);
			header("Content-type: application/json");	
			echo json_encode($response);
        }else{
            $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
            header("Content-type: application/json");	
            echo json_encode($response);
		}
		
		
	}

	public function profit_loss(){

		$this->form_validation->set_rules('report_type', 'Report type', 'trim|required');
		$this->form_validation->set_rules('start_date', 'Start date', 'trim|required');
		$this->form_validation->set_rules('end_date', 'End date', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$data['css'] = array(
				'/css/datepicker.css'
			);
			$data['js'] = array(
				'/js/datepicker.js',
				'/js/validator.js',
				'/js/app.js'
			);

			$data['type'] =  "";
	
			$data['settings'] = $this->agent_settings;
	
			$agent = $this->ion_auth->user()->row();

			$this->load->view('agent/header', $data);
			$this->load->view('agent/profit_loss', $data);
			$this->load->view('agent/footer', $data);
		}else{
			$agent = $this->ion_auth->user()->row();
			$start_date = $this->input->post('start_date', TRUE);
			$end_date = $this->input->post('end_date', TRUE);

			if($this->input->post('report_type', TRUE) == "1"){
				$expenses = $this->Reports_model->get_profit_and_lost_paid_unpaid_expenses_reports($agent->id, $start_date, $end_date);
				$invoices = $this->Reports_model->get_profit_and_lost_paid_unpaid_invoices_reports($agent->id, $start_date, $end_date);
			}else{
				$type = "paid";
				$expenses = $this->Reports_model->get_profit_and_lost_paid_expenses_reports($agent->id, $start_date, $end_date, $type);
				$invoices = $this->Reports_model->get_profit_and_lost_paid_invoices_reports($agent->id, $start_date, $end_date, $type);
			}


			$data['css'] = array(
				'/css/datepicker.css'
			);
			$data['js'] = array(
				'/js/datepicker.js',
				'/js/validator.js',
				'/js/app.js'
			);
	
			$data['settings'] = $this->agent_settings;
	
			$data['expenses'] = $expenses;

			$data['invoices'] = $invoices;

			$data['start_date'] = $start_date;

			$data['end_date'] = $end_date;

			$data['type'] =  $this->input->post('report_type', TRUE);

			$this->load->view('agent/header', $data);
			$this->load->view('agent/profit_loss', $data);
			$this->load->view('agent/footer', $data);

		}

	}

	public function get_calendar_events(){
		// if($this->input->is_ajax_request()){
           
		// 	$agent = $this->ion_auth->user()->row();

		// 	$invoice = $this->Invoice_model->get_invoices($agent->id);



		// 	$response  =  array('type' => 'success', 'message' =>  "Estimate has been deleted successfully");
		// 	header("Content-type: application/json");	
		// 	echo json_encode($response);
        // }else{
        //     $response  =  array('type' => 'error', 'message' =>  "No direct script access allowed");
        //     header("Content-type: application/json");	
        //     echo json_encode($response);
        // }

		$agent = $this->ion_auth->user()->row();

		$invoices = $this->Invoice_model->get_invoices($agent->id);

		$estimates = $this->Estimate_model->get_estimates($agent->id);

		$expenses = $this->Expense_model->get_agent_expense_list($agent->id);

		$events = [];

		foreach($invoices as $invoice){
			array_push($events, array(
				'id' => $invoice->invoice_id, 
				'title' =>  $invoice->invoice_no, 
				'start' => $invoice->invoice_issue, 
				'end' => $invoice->invoice_due,
				'color' => '#D5E4FF'
				)
			);
		}

		foreach($estimates as $estimate){
			array_push($events, array(
				'id' => $estimate->estimate_id, 
				'title' =>  $estimate->estimate_no, 
				'start' => $estimate->estimate_created_date, 
				'end' => $estimate->estimate_valid_unil_date,
				'color' => '#DCF4EE'
				)
			);
		}

		foreach($expenses as $expense){
			array_push($events, array(
				'id' => $expense->expense_id, 
				'title' =>  $expense->title, 
				'start' => $expense->created_date, 
				'color' => '#FFF9E6'
				)
			);
		}



		echo json_encode($events);
	}

	public function calendar(){
		$data['css'] = array(
			'/css/app.css',
			'/css/fullcalendar.css',
            '/css/dialog.css'
        );
        $data['js'] = array(
			'/js/dialog.js',
			'/js/fullcalendar.js',
            '/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();

		$data['settings'] = $this->agent_settings;

		$this->load->view('agent/header', $data);
		$this->load->view('agent/calendar', $data);
		$this->load->view('agent/footer', $data);
	}

	public function emails(){

		$data['css'] = array(
			'/css/app.css',
			'/css/select2.css',
			'/css/dialog.css',
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/select2.js',
			'/js/app.js',
		);
	

		$agent = $this->ion_auth->user()->row();

		$data['settings'] = $this->agent_settings;

		$data['clients'] = $this->Client_model->get_agent_client_list($agent->id);

		$this->load->view('agent/header', $data);
		$this->load->view('agent/emails', $data);
		$this->load->view('agent/footer', $data);
	}

	public function send_mails(){
		$this->form_validation->set_rules('clients[]', 'To', 'trim|required');
		$this->form_validation->set_rules('subject', 'Subject', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'trim|required');

		if ($this->form_validation->run() == FALSE){
			$this->emails();
		}else{
			$clients = $this->input->post('clients', TRUE);
			foreach ($clients as $client) {
				$client_mail = $this->Client_model->get_client_email_by_id($client);
				if($client_mail){
				    
				     $to = $client_mail;
				     
                     $subject = $this->input->post('subject', TRUE);
                     
                     $message = "<p>Message : ".$this->input->post('message', TRUE)."</p>";
                      
                     $header = "From:noreply@accountza.io \r\n";
                     $header .= "Cc:noreply@accountza.io \r\n";
                     $header .= "MIME-Version: 1.0\r\n";
                     $header .= "Content-type: text/html\r\n";
                     
                     mail ($to,$subject,$message,$header);
         
				}
			}
			
			$this->session->set_flashdata('success', "Mail has been sent successfully!");
			redirect('agent/emails', 'refresh');
		}
	}
	
	public function update_profile_settings(){
		$this->form_validation->set_rules('first_name', 'First name', 'trim|required');
		$this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone', 'trim|required');

		if ($this->form_validation->run() == FALSE){

			$agent = $this->ion_auth->user()->row();

			$data['agent'] = $agent;
	
			$this->load->view('agent/header', $data);

			$this->load->view('agent/profile', $data);

			$this->load->view('agent/footer', $data);

		}else{

			$agent = $this->ion_auth->user()->row();

			$data = array(
				'first_name' => $this->input->post('first_name', TRUE),
				'last_name'  => $this->input->post('last_name', TRUE),
				'phone'      => $this->input->post('phone', TRUE),
			);

			$this->ion_auth->update($agent->id, $data);

			$this->session->set_flashdata('success', "Profile has been updated successfully");
			redirect('agent/profile', 'refresh');

		}
	}

	public function profile(){

		$data['css'] = array(
			'/css/app.css'
		);
		$data['js'] = array(
			'/js/validator.js',
			'/js/app.js'
		);

		$agent = $this->ion_auth->user()->row();

		$data['agent'] = $agent;

		$this->load->view('agent/header', $data);
		$this->load->view('agent/profile', $data);
		$this->load->view('agent/footer', $data);

	}
	
	
	public function check_settings($agent_id, $url){
	   $data = $this->Company_settings_model->get_company_setting($agent_id);
	   if($data){
	      return true; 
	   }else{
	     	$this->session->set_flashdata('danger', "Please update your company details");
			redirect('agent/'.$url, 'refresh');  
	   }
	}


    public function access_level_verifier(){
        if ($this->ion_auth->logged_in() && $this->ion_auth->in_group("agent")){
            return true;
        }else{
            $this->ion_auth->logout();
            $this->session->set_flashdata('message', "You must be an agent to view this page");
            redirect('auth/login');
        }
	}

}