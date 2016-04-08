<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Treatment_Courses extends Admin_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Treatment_Courses');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
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
        $csrf_hash = $this->security->get_csrf_hash();
        echo $csrf_hash;
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
            $this->data['course_name'] = array(
                'name'  => 'course_name',
                'id'    => 'course_name',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('course_name'),
            );
            $this->data['length'] = array(
                'name'  => 'length',
                'id'    => 'length',
                'class' => 'form-control',
                'type'  => 'number',
                'min' => '0',
                'value' => $this->form_validation->set_value('length'),
            );
            $this->data['best_practice'] = array(
                'name'  => 'best_practice',
                'id'    => 'best_practice',
                'class' => 'form-control',
                'type'  => 'checkbox',
                'value' => $this->form_validation->set_value('best_practice'),
            );
            $this->data['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
                'class' => 'form-control',
                'type'  => 'textarea',
                'rows' => '10',
                'value' => $this->form_validation->set_value('description'),
            );
            $this->_render_page('add_course_view', $this->data);
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
