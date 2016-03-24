<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_Course extends Auth_Controller {

    function __construct()
    {
      parent::__construct();
      $this->load->model('Model_Treatment_Courses');
    }
    
    public function index()
    {
        $this->getAllCourses();
    }
    
    function getAllCourses()
    {
        $data['treatment_courses'] = $this->treatment_courses->getTreatmentCourses();
        $data['title'] = "Treatment Courses";
        $this->render('treatment_courses', $data);
    }
}
