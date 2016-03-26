<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_Courses extends Admin_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Treatment_Courses');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->data['load_custom_js'] = "inlineEdit.js";
    }
    
    public function index()
    {
        $this->getAllCourses();        
    }
    
    function getAllCourses()
    {        
        $this->data['title'] = 'Treatment Courses';
        $this->data['treatment_courses'] = $this->Model_Treatment_Courses->getTreatmentCourses()->result();       
        
        $this->_render_page('treatment_courses_view',$this->data);
    }
    
    function updateCourses()
    {
        $field = $this->input->post('field');
        $editedValue = $this->input->post('editedValue');
        $id = $this->input->post('id');

        //$this->load->model('user_m');                     
        $this->Model_Treatment_Courses->inlineEdit( $field, $editedValue, $id );
        return;
    }
    
    function addCourse()
    {
        $this->data['title'] = 'Create Course';
        
        $this->form_validation->set_rules('course_name', 'Course Name', 'required|is_unique[treatment_course.course_name]');
        $this->form_validation->set_rules('length', 'Length', 'required');
        $this->form_validation->set_rules('best_practice', 'Best Practice', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() == FALSE)
        {
                $this->load->view('myform');
        }
        else
        {
                $this->load->view('formsuccess');
        }
        
    }
}
