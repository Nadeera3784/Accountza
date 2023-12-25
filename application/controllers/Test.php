<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Test extends BASE_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->library(array(
			'ion_auth'
		));
        $this->lang->load('auth');
		$this->load->model(array(
			'Client_model'
        ));
        $this->load->helper('string');
    }

    public function index(){
        echo "test page";
    }

    public function seeder(){
        $faker = Faker\Factory::create();

        for ($i=0; $i < 22; $i++) {

            $form_data['name']    = $faker->name;
			$form_data['position']   = $faker->jobTitle;
			$form_data['email']   = $faker->email;
			$form_data['phone']   = $faker->phoneNumber;
			$form_data['address']   = $faker->address;
			$form_data['city']   = $faker->city;
			$form_data['state']   = $faker->state;
            $form_data['notes']   = $faker->city;
            $form_data['postal_code']   = $faker->postcode;
            $form_data['payment_info']   = "Due Payment";
            $form_data['discount']   =  rand(1, 10);
			$user = $this->ion_auth->user()->row();
			$form_data['agent_id ']   = $user->id;
            $this->Client_model->add_client($form_data);
        }

    }

    public function test2(){

        $actual_price = 194;


        $selling_price = $actual_price - ($actual_price * (1 / 100));

        echo  $selling_price;
    }

}