<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Signup_model extends CI_Model {
		
	
        public function insert($data = [])
        {
            $result = $this->db->insert('user', $data);
            return $result;
        }

    
    }
