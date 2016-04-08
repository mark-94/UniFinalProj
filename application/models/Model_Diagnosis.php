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
        return $query;                
    }
    
    function getSingleDiagnosis($id)
    {
        $query = $this->db->get_where('diagnosis',array('id'=>$id));
        return $query;
    }
    
    
    function insertDiagnosis($data=array())
    {
        $this->db->insert('diagnosis',$data);
    }
    
    function inlineEdit($field, $editedValue, $id )
    {
        $data[$field] = $editedValue;
       
        $this->db->where('id',$id);
        $this->db->update('diagnosis',$data);
        
    }
    
    function insertSelection($data=array())
    {
        $this->db->insert('diagnosis_treatment',$data);
        
    }
    
    function deleteSelection($data=array())
    {
        $this->db->where($data);
        $this->db->delete('diagnosis_treatment');
        return;
    }
    
    //returns all treatment courses where treatment id and diagnosis id are associated
    function getDiagnosisCourses($id,$in)
    {
            $query = $this->db->query("SELECT * FROM treatment_courses WHERE id $in (SELECT treatment_course_id FROM diagnosis_treatment WHERE diagnosis_id=$id)");
            
            return $query;
    }
    
}