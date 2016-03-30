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
    
    function update()
    {
        $field = $this->input->post('field');
        $editedValue = $this->input->post('editedValue');
        $id = $this->input->post('id');
         
        $this->Model_Treatment_Courses->inlineEdit( $field, $editedValue, $id );
        return;
    }
    
        
    function addCourseForm()
    {
        $this->data['title'] = 'Create Course';
        
        $this->form_validation->set_rules('course_name', 'Course Name', 'trim|required|is_unique[treatment_courses.course_name]');
        $this->form_validation->set_rules('length', 'Length', 'trim|required|is_natural');
        $this->form_validation->set_rules('best_practice', 'Best Practice', 'integer');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->_render_page('add_course_view');
        }
        else 
        {
            $data['course_name'] = $this->input->post('course_name');
            $data['length'] = $this->input->post('length');
            $data['NHS_best_practice'] = ($this->input->post('best_practice')!== FALSE ? '0':'1'); //If false set to 0 otherwise 1
            $data['description'] = $this->input->post('description');
           
            $this->Model_Treatment_Courses->insertCourse($data);
            
            // $this->session->set_flashdata('message', $this->ion_auth->messages())
            redirect("admin/treatment_courses",'refresh');
        }
                
    }
}
