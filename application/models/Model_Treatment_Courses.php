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
    
    function insertSelection($data=array())
    {
        $this->db->insert('treatment_medication',$data);
        
    }
    
    function deleteSelection($data=array())
    {
        $this->db->where($data);
        $this->db->delete('treatment_medication');
        return;
    }
    
    //returns all medicationss where medication id and treatment_course id are associated
    function getCourseMedications($id,$in)
    {
            $query = $this->db->query("SELECT * FROM medication WHERE id "
                    . "$in (SELECT medication_id FROM treatment_medication WHERE treatment_course_id=$id)");
            
            return $query;
    }
}