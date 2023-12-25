<?php defined('BASEPATH') OR exit('No direct script access allowed');


class App extends BASE_Controller {

    public function __construct(){
      parent::__construct();
      $this->load->database();
      $this->load->library(['ion_auth', 'form_validation', 'config_manager']);
      $this->load->helper(['url', 'language']);
  
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert">', '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button></div>');
      $this->lang->load('auth');
      $this->config->load('app');
    }

    public function index(){
      $data['faker'] = Faker\Factory::create();
	   	$this->load->view('home', $data);
    }

    public function sign_up(){

      $this->form_validation->set_rules('username', 'Username', 'trim|required');
      $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', array('is_unique' => 'This %s already exists. Please choose a different one'));
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[password_confirm]');
      $this->form_validation->set_rules('password_confirm', 'Password Confirm', 'required');
      $this->form_validation->set_rules('accept_terms', 'Accept terms', 'callback_accept_terms');
    
      if ($this->form_validation->run() == FALSE){
        $this->load->view('sign_up');
      }else{

        $this->load->model('Subscription_model');
    
        $subscription = $this->Subscription_model->get_subscription_by_slug('free');

        $additional_data = [
          'username' => $this->input->post('username', TRUE),
          'subscription_id' =>  $subscription->subscription_id,
        ];

        $identity =  $this->input->post('email', TRUE);

        $password = $this->input->post('password', TRUE);
  
        $email = strtolower($this->input->post('email', TRUE));
  
        $this->ion_auth->register($identity, $password, $email, $additional_data);
      

        $this->session->set_flashdata('message', $this->ion_auth->messages());
  
        redirect("auth/login", 'refresh');

      }
    }

    public function error_404(){
      $this->load->view('error_404');
    }

    public function privacy_policy(){
      $this->load->view('privacy_policy');
    }

    public function terms(){
      $this->load->view('terms');
    }

    public function contact(){
      $this->load->view('contact');
    }
    
    public function frequently_asked_questions(){
      $this->load->view('faq');
    }

    public function accept_terms() {
      if (isset($_POST['accept_terms'])) return true;
      $this->form_validation->set_message('accept_terms', 'Please read and accept our terms and conditions.');
      return false;
    }

    public function contact_processor(){
      $this->form_validation->set_rules('name', 'Name', 'trim|required',  array('required' => 'come on, you have a name, don\'t you?'));
      $this->form_validation->set_rules('email', 'Email', 'trim|required', array('required' => 'no email, no message'));
      $this->form_validation->set_rules('message', 'Message', 'trim|required', array('required' => 'um...yea, you have to write something to send this form.'));

      if($this->form_validation->run() == FALSE){
         $this->load->view('contact');
      }else{
          
         $to = "nadeera3784@gmail.com";
         $subject = "someone is trying to contact you";
         
         $message =  "<p>Name : ".$this->input->post('name', TRUE)."</p></br>";
         $message .= "<p>Email : ".$this->input->post('email', TRUE)."</p></br>";
         $message .= "<p>Message : ".$this->input->post('message', TRUE)."</p>";
          
         $header = "From:hello@accountza.io \r\n";
         $header .= "Cc:hello@accountza.io \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         mail ($to,$subject,$message,$header);

        $this->session->set_flashdata('success', "Your message has been successfully sent. We will contact you very soon!");
        redirect("app/contact", 'refresh');
      }

    }

}