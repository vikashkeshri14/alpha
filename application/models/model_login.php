<?php

//include('model_log.php');
	class Model_login extends CI_Model {
  
	public function __construct()
	{
	  parent::__construct();
	  $this->load->library('session');
	  $this->load->helper('url');	
	  $this->load->database();		
	}


	 public function validate(){
        if($this->input->post('username') && $this->input->post('password'))
	{
		$username = trim($this->input->post('username'));
                $password = trim($this->input->post('password'));
		$query=$this->db->query("select *from user where username='".$username."' and password='".$password."' and status=1");
		$result=$query->result();
		//print_r($result); exit;
		if($result)
		{
		   $data = array(
                    'username' => $result[0]->username,
                    'validated' => true,
					'id' => $result[0]->user_id,
					'name' => $result[0]->name,
					
                    );
                   $this->session->set_userdata('userdata',$data);
			return true;
		}
		else
		{
			return false;
		}
	}
        else
	{
		return false;
	}
	 }
      /*  // grab user input
        $username = trim($this->input->post('username'));
        $password = trim($this->input->post('password'));
        
        // Prep the query
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        
        // Run the query
        $query = $this->db->get('user');
        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    }*/
}

?>
