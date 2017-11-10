<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary extends CI_Controller {

	static $model = array();
	static $helper = array();


	public function __construct()
    {
        parent::__construct();
        $this->load->model(self::$model);
        $this->load->helper(self::$helper);
    }


	public function index()
	{

        $data['employer']    = $this->Common->queryAll('salary', array());

		$this->load->view('salary', $data);
	}

    public function add()
    {


        $data['name']         = $this->input->post('name');
        $data['email']        = $this->input->post('email');
        $data['mobile']       = $this->input->post('mobile');
        $data['basic']        = $this->input->post('basic');
        $data['rent']         = $this->input->post('rent');
        $data['medical']      = $this->input->post('medical');
        $data['tax']          = $this->input->post('tax');

        $data['main']         = $data['basic'] + $data['rent'] + $data['medical'];

        $save = $this->Common->save('salary', $data);
        $this->session->set_flashdata('msg', 'success ');
        redirect('salary');



    }

    public function delete($id)
    {
        $this->Common->delete('salary', array('id' => $id));
        redirect($_SERVER['HTTP_REFERER']);
    }

	
   

    
}