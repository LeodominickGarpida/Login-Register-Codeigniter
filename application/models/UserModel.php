<?php
	
	/**
	* 
	*/
	class UserModel extends CI_Model
	{
		
		public function RegisterAccount($email, $username, $password, $is_activated)
		{
			$data = array(
				'email' => $email,
				'username' => $username,
				'password' => $password,
				'is_activated' => $is_activated, 
				);
			$this->db->insert('tbl_users', $data);
		}

		public function resolve_user_login($username, $password)
		{
			$this->db->select('password');
			$this->db->from('tbl_users');
			$this->db->where('username', $username);
			$hash = $this->db->get()->row('password');
		
			return $this->verify_password_hash($password, $hash);
		}

		private function verify_password_hash($password, $hash) 
		{
        
            return password_verify($password, $hash);
        
        }

        /**
		 * get_user_id_from_username function.
		 * 
		 * @access public
		 * @param mixed $username
		 * @return int the user id
		 * sineselect natin yung id gamit yung username na binigay ni user
		 */
		public function get_user_id_from_username($username)
		 {
		
			$this->db->select('id');
			$this->db->from('tbl_users');
			$this->db->where('username', $username);

			return $this->db->get()->row('id');
		
		}

		/**
	 	* get_user function.
	 	* 
	 	* @access public
		 * @param mixed $user_id
		 * @return object the user object
		 * 
	 	*/
		public function get_user($user_id) 
		{
		
			$this->db->from('tbl_users');
			$this->db->where('id', $user_id);
			return $this->db->get()->row();
		
		}
         
	
	}
?>