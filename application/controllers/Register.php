<?php 

	class Register extends CI_Controller
	{
		public function index()
		{
			$data = new stdClass();

			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			// gumamit tayo dito ng is_unique kailangan to para kung existing na yung ininput na username mag show sya ng error 
			// dapat walang mag kaparehong username sa database okay [tbl_users.username] tbl_users yun yung table name 
			// then yung users yun yung field kung saan naka store yung mga username
			$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tbl_users.username]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			// gumamit tayo dito ng matches[password] kasi diba dun sa input field sa RegisterView kailangan mag match
			// yung password at password confirm so eto yung validation nya
			$this->form_validation->set_rules('confirm_pass', 'Confirm Password', 'trim|required|matches[password]');

			if($this->form_validation->run() == false)
			{	
				// pay may isang nag false sa taas eto ang iloload nya with errors
				$this->load->view('Header');
				$this->load->view('RegisterView', $data);
				$this->load->view('Footer');
			}
			else
			{
				$email = $_POST['email'];
				$username = $_POST['username'];
				// I use password BCRYPT technique
				// hihahash neto yung password para sa database hindi sya readable or plain text one of the security yun
				$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
				$is_activated = $_POST['is_activated'];

				$this->UserModel->RegisterAccount($email, $username, $password, $is_activated);
				// kapag nag true yung RegisterAccount or nakapag insert ng data mag reredirect sya sa login pag nag redirect means 
				// successful ang pag register
				redirect('Login');
			}
		}
	}
?>