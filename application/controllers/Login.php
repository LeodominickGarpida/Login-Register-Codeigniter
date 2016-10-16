<?php
	
	/**
	* 
	*/
	class Login extends CI_Controller
	{
		
		public function index()
		{
			$data = new stdClass();

			// nirerequired nating yung dalawang input field
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');

			if($this->form_validation->run() == false)
			{
				$this->load->view('Header');
				$this->load->view('LoginView', $data);
				$this->load->view('Footer');
			}
			else
			{
				$username = $_POST['username'];
				$password = $_POST['password'];

				if($this->UserModel->resolve_user_login($username, $password))
				{
					// if nag true yung resolve_user_login eto yung gagawin nya function yun sa model ha
					// function reretrive natin dito yugn userid gamit yung username
					$user_id = $this->UserModel->get_user_id_from_username($username);
                    // reretrive naman nating dito yung usermismo
                    $user = $this->UserModel->get_user($user_id);

                    // set session user data
                    // importante tong session
					$_SESSION['user_id']      = (int)$user->id;
					$_SESSION['username']     = (string)$user->username;
					$_SESSION['logged_in']    = (bool)true;
					$_SESSION['is_admin']     = (int)$user->is_admin;

					// is_admin dalawang value lang pwedeng maging laman neto either 1 or 0 1 means admin sya then 0 normal user lang
					// so 0 normal user lang yung binigyan natin nang condition dito ikaw na bahala sa amdin
					if($user->is_admin == 0)
					{
						redirect('Home');
					}
				}
				 else 
                {
				
					// login failed
					// if nag false yung resolve_user_login punta sya dito eto loload nya
					// kapag isa sa input field ang may mali ito ang iloload nya
					$data->error = "Wrong username or password.";
				
					// send error to the view
					$this->load->view('Header');
					$this->load->view('LoginView', $data);
					$this->load->view('Footer');
				
				}
			}
		}
	}
?>