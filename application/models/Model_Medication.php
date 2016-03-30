<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Medication extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getMedication()
    {
        $query = $this->db->get('medication');
        return $query;                
    }
    
    function inlineEdit($field, $editedValue, $id )
    {
        $data[$field] = $editedValue;
        //$result = mysql_query("UPDATE users set $field = $editedValue WHERE  id=$id");
        $this->db->where('id',$id);
        $this->db->update('medication',$data);
        
    }
    
    function insertMedication($data=array())
    {
        $this->db->insert('medication',$data);
        
    }
    
}