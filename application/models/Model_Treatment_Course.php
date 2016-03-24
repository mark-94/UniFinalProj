<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Treatment_Course extends CI_Model
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
}