<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Treatment_Courses extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getTreatmentCourses()
    {
        $query = $this->db->get('treatment_courses');
        return $query;                
    }
    
    function inlineEdit($field, $editedValue, $id )
    {
        $data[$field] = $editedValue;
        //$result = mysql_query("UPDATE users set $field = $editedValue WHERE  id=$id");
        $this->db->where('id',$id);
        $this->db->update('treatment_courses',$data);
        
    }
    
    function insertCourse($data=array())
    {
        $this->db->insert('treatment_courses',$data);
        
    }
    
}