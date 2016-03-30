<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Diagnosis extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getDiagnosis()
    {
        $query = $this->db->get('diagnosis');
        return $query->result();                
    }
    
    function inlineEdit($field, $editedValue, $id )
    {
        $data[$field] = $editedValue;
        //$result = mysql_query("UPDATE users set $field = $editedValue WHERE  id=$id");
        $this->db->where('id',$id);
        $this->db->update('diagnosis',$data);
        
    }
    
    function insertDiagnosis($data=array())
    {
        $this->db->insert('diagnosis',$data);
    }
    
    //returns all treatment course names where treatment id and diagnosis id are associated
    function getDiagnosisCourses($id)
    {
        //$query = $this->db->get('diagnosis_treatment');
//        foreach ($diagnosis as $value) 
//        {
            $query = $this->db->query("SELECT id,course_name FROM treatment_courses WHERE id IN (SELECT treatment_course_id FROM diagnosis_treatment WHERE diagnosis_id=$id)");
                                // ."(SELECT treatment_course_id FROM diagnosis_treatment WHERE diagnosis_id =1)", NULL, FALSE);
        
        //SELECT id,course_name FROM treatment_courses WHERE id IN (SELECT treatment_course_id FROM diagnosis_treatment WHERE diagnosis_id = 1)
        return $query->result();
    }
    
}