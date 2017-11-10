<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	static $model = array();
	static $helper = array();


	public function __construct()
    {
        parent::__construct();
        $this->load->model(self::$model);
        $this->load->helper(self::$helper);
        $this->load->library('session');

        active();
    }


	public function index()
	{
        $email       = $this->session->userData('email');
        $query       = $this->Common->query('register', array('email' => $email, 'status' => '1'));
        $id          = $query->id;
        $data['user']    = $this->Common->query('register', array('status' => '1', 'id' => $id));
		$this->load->view('profile', $data);
	}

    public function logout()
    {
        logout();
    }




	
   

    
}
