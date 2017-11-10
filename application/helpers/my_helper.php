<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('login'))
{
	function login()
	{
		$_this = &get_instance();
		
		$email     = $_this->input->post('email');
        $password  = $_this->input->post('password');

        $info  = $_this->Common->query('register', array('email' => $email, 'status' => '1'));

        if( !empty($info) && $info->password == md5($password)){

        	setData($email);
            redirect("dashboard");

        }
        else {
        $_this->session->set_flashdata('mx', 'opps ! Email or Password Did not match. ');
        redirect('home');
        }
	}
}



if ( ! function_exists('setData'))
{
	function setData($email)
	{
		$_this = &get_instance();
		$data	= array(
			'email' => $email
		);
		$_this->session->set_userdata($data);
	}
}


if ( ! function_exists('active'))
{
	function active()
	{
		$_this = &get_instance();
		$email = $_this->session->userData('email');
		
		if( $email == NULL ) {
			redirect("home");
		}
		return true;
	}
}


if ( ! function_exists('logout'))
{
	function logout()
	{
		setData(NULL);
		
		if(!active()){
			redirect("home");
		}
	}
}



// ------------------------------------------------------------------------
/* End of file authentication_helper.php */
/* Location: ./application/helpers/authentication_helper.php */