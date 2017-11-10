<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	static $model = array();
	static $helper = array();


	public function __construct()
    {
        parent::__construct();
        $this->load->model(self::$model);
        $this->load->helper(self::$helper);
        $this->load->library('email');
        $this->load->library('session');
        $this->load->library('upload');
    }


	public function index()
	{
		$this->load->view('register');
	}


	public function registerAction()
    {


        $data['name']   	  = $this->input->post('name');
        $data['email']    	  = $this->input->post('email');
        $data['mobile']   	  = $this->input->post('mobile');
        $data['age_date']     = $this->input->post('age_date');
        $data['age_month']    = $this->input->post('age_month');
        $data['age_year']     = $this->input->post('age_year');
        $data['status']       = '2';
        $data['password']     = md5($this->input->post('password'));
        $data['re_password']  = md5($this->input->post('re_password'));

        $img_field = array('image');
        foreach ($img_field as $v) {
            
            $config['upload_path']      = './images/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['file_name']        = time();
            $this->upload->initialize($config);

            if ($this->upload->do_upload($v)) {

                $upload_data = $this->upload->data();
                $data[$v]    = $upload_data['file_name'];


            }

        }


        $current    = date('d/m/Y');
        $expl       = explode('/', $current);

        $currYear   = $expl['2'];
        $currMonth  = $expl['1'];

        $userYear   = $this->input->post('age_Year');
        $dbMonth    = $this->input->post('age_month');

        if ($dbMonth == 'January'):
            $userMonth = '1';
        elseif ($dbMonth == 'February'):
            $userMonth = '2';
        elseif ($dbMonth == 'March'):
            $userMonth = '3';
        elseif ($dbMonth == 'April'):
            $userMonth = '4';
        elseif ($dbMonth == 'May'):
            $userMonth = '5';
        elseif ($dbMonth == 'June'):
            $userMonth = '6';
        elseif ($dbMonth == 'July'):
            $userMonth = '7';
        elseif ($dbMonth == 'August'):
            $userMonth = '8';
        elseif ($dbMonth == 'September'):
            $userMonth = '9';
        elseif ($dbMonth == 'October'):
            $userMonth = '10';
        elseif ($dbMonth == 'November'):
            $userMonth = '11';
        elseif ($dbMonth == 'December'):
            $userMonth = '12';
        endif;

        $birthMonth  = 12 - $userMonth;

        $mainYear    = $currYear - $userYear + 1 - 2;

        $tempAge     = $mainYear * 12;
        $tempMonth   = $tempAge + $currMonth + $birthMonth;
        $originalAge = $tempMonth / 12;
        $explYear    = explode('.', $originalAge);
        $data['current_age'] = $explYear['0'];

        $findemail    = $this->Common->query('register', array('email'  => $data['email']));
        $findmobile   = $this->Common->query('register', array('mobile' => $data['mobile']));
        $email        = $findemail->email;
        $mobile       = $findmobile->mobile;

        if ($data['email'] == $email && $data['mobile'] == $mobile) {
        	$this->session->set_flashdata('ms', 'opps ! Email and Mobile already exists ');
        redirect('home');
        }
        elseif ($data['email'] == $email) {
        	$this->session->set_flashdata('msgg', 'opps ! Email already exists ');
        redirect('home');
        }
        elseif ($data['mobile'] == $mobile) {
        	$this->session->set_flashdata('msggg', 'opps ! Mobile Number already exists ');
        redirect('home');
        }
        elseif ($data['password'] != $data['re_password']) {
            $this->session->set_flashdata('err', 'opps ! Password did not match ');
        redirect('home');
        }
        else {
        $data['code'] 		= rand('100000', '999999');
        $save = $this->Common->save('register', $data);

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'sorwar3226@gmail.com';
        $config['smtp_pass']    = 'x231676x';
        $config['charset']      = 'utf-8';
        $config['newline']      = "\r\n";
        $config['mailtype']     = 'html'; 
        $config['validation']   = TRUE;      

        $this->email->initialize($config);

	    $this->email->from('sorwar3226@gmail.com', 'Conformation mail from Task');
	    $address = $data['email'];
	    $subject="Conformation code";
	    $message=
	        'Thanks for signing up, '.$data['name'].'!
	      
	        <br>please conform your email address
	                        
	        <h1>Your confirmation code is : '. $data['code'] .'</h1>
	        ' ;      
	    $this->email->to($address);
	    $this->email->subject($subject);
	    $this->email->message($message);
	    $this->email->send();
        $this->session->set_flashdata('msg', ' Success !Thanks for registration');
        redirect('home');
        }

      }

      public function mailConform()
    {


        $code           = $this->input->post('code');
        $data['status'] = '1';

        $findcode   = $this->Common->query('register', array('code' => $code));

        $dbcode        = $findcode->code;

        if ($code == $dbcode) {
            $this->Common->edit('register', $data, array('code' => $code));

        	$this->session->set_flashdata('conformed', 'Email conformed successfully !! You can Login Now ');
        redirect('home');

        }
        else {
           $this->session->set_flashdata('msg', 'Code Did not match !! ');
           redirect('home');

        }
    }


    public function login()
    {
        login();
    }

   

    
}
