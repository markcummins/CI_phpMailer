<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		
		$this->load->view('new_mail');
		
		if(isset($_POST)){

			$this->load->model('email_model');
			
			$recipient = $_POST['recipient'];
			$fullname = '';
			$subject = $_POST['subject'];
			$message =  $_POST['message'];
			$filename =  $_POST['filename'];
			$fileUrl = $_FILES['attach_file']['tmp_name'];
			$fileType = $_FILES['attach_file']['type'];
			
			$ret = $this->email_model->send_email($recipient, $fullname, $subject, $message, $filename, $fileUrl, $fileType);
			echo $ret;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */