<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_Courses extends Auth_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Treatment_Courses');
        $this->data['load_custom_css'] = 'scrollDiv.css';
    }
    
    public function index()
    {
        $this->getAllCourses();        
    }
    
    function getAllCourses()
    {
        $this->data['title'] = "Treatment Courses";
        $this->data['treatment_courses'] = $this->Model_Treatment_Courses->getTreatmentCourses()->result();
        
        $this->_render_page('treatment_courses_view',$this->data);
    }
}
