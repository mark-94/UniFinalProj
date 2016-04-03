<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Patient extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getPatient($nid)
    {
        $this->db->select('first_name','last_name');
        $query = $this->db->get_where('patient', array('nid'=>$nid));
        return $query->result();                
    }
    
    function insertPatient($data=array())
    {
        $this->db->insert('patient',$data);        
    }
    
}
