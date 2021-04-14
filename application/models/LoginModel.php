<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends Render_Model {

	public function cekLogin($username,$password)
	{
		$where = array(
			'user_email'		=> $username
		);

		$query = $this->query($where);

		if($query->num_rows() == 1)
		{
			$cek = $this->b_password->verify($password,$query->result_array()[0]['user_password']);

			if($cek == true)
			{
				$return['status'] = 0;
				$return['data'] 	= $query->result_array();
			}else
			{
				$return['status'] = 1;
				$return['data'] 	= null;
			}
		}else
		{
			$return['status'] 	= 2;
			$return['data'] 	= null;
		}
		
		return $return;
	}

	public function query($where)
	{
		return $this->db->select('user_id,user_nama,user_password,user_email,c.lev_nama')->join('role_users b', 'b.role_user_id = a.user_id')->join('level c','c.lev_id = b.role_lev_id')->get_where('users a', $where);
	}

}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */