<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Patient extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getPatient($nid)
    {
        $query = $this->db->get_where('patient', array('nid'=>$nid));
        return $query;                
    }
    
    function insertPatient($data=array())
    {
        $this->db->insert('patient',$data);        
    }
    
}
