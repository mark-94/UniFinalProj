<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosis extends Admin_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Diagnosis');
        $this->load->model('Model_Treatment_Courses');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }
    
    public function index()
    {
        $this->getAllDiagnosis();        
    }
    
    //Gets a list of all diagnosis and courses
    function getAllDiagnosis()
    {        
        $this->data['title'] = 'Diagnosis List';
        $this->data['treatment'] = $this->Model_Treatment_Courses->getTreatmentCourses();
        $this->data['diagnosis'] = $this->Model_Diagnosis->getDiagnosis()->result(); 
        
        //filters course into seperate arrays based on association
        foreach ($this->data['diagnosis'] as $key => $diagnosis_course)
        {
                $this->data['diagnosis'][$key]->courses = $this->Model_Diagnosis->getDiagnosisCourses($diagnosis_course->id,'IN')->result();
                $this->data['diagnosis'][$key]->unselected_courses = $this->Model_Diagnosis->getDiagnosisCourses($diagnosis_course->id,'NOT IN')->result();
        }			
        
        $this->_render_page('diagnosis_view',$this->data);
    }
    
    
    //updates the diagnosis with value inputed inline. called via js
    function update()
    {
        $field = $this->input->post('field');
        $editedValue = $this->input->post('editedValue');
        $id = $this->input->post('id');

                         
        $this->Model_Diagnosis->inlineEdit( $field, $editedValue, $id );
        $csrf_hash = $this->security->get_csrf_hash();
        echo $csrf_hash;
    }
    
    //adds an association between a diagnosis & treatment course. caled via js
    function addSelection()
    {
        $data['diagnosis_id'] = $this->input->post('diag_or_treat_id');
        $data['treatment_course_id'] = $this->input->post('treat_or_med_id');
                                 
        $this->Model_Diagnosis->insertSelection( $data );
        $csrf_hash = $this->security->get_csrf_hash();
        echo $csrf_hash;
    }
    
    //deletes an association between a diagnosis & treatment course. caled via js
    function deleteSelection()
    {
        $data['diagnosis_id'] = $this->input->post('diag_or_treat_id');
        $data['treatment_course_id'] = $this->input->post('treat_or_med_id');
                                 
        $this->Model_Diagnosis->deleteSelection( $data );
        $csrf_hash = $this->security->get_csrf_hash();
        echo $csrf_hash;
    }
    
    //sets form validation
    function addDiagnosisForm()
    {
        $this->data['title'] = 'Create Diagnosis';
        
        $this->form_validation->set_rules('diagnosis_name', 'Diagnosis Name', 'trim|required|is_unique[diagnosis.diagnosis_name]');
        //$this->form_validation->set_rules('links', 'Links', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->data['diagnosis_name'] = array(
                'name'  => 'diagnosis_name',
                'id'    => 'diagnosis_name',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('diagnosis_name'),
            );
            $this->data['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
                'class' => 'form-control',
                'type'  => 'textarea',
                'rows' => '10',
                'value' => $this->form_validation->set_value('description'),
            );
            $this->_render_page('add_diagnosis_view', $this->data);
        }
        else 
        {
            $data['diagnosis_name'] = $this->input->post('diagnosis_name');
            //$data['links'] = $this->input->post('links');
            $data['description'] = $this->input->post('description');
           
            $this->Model_Diagnosis->insertDiagnosis($data);
            
            // $this->session->set_flashdata('message', $this->ion_auth->messages())
            redirect("admin/diagnosis",'refresh');
        }
                
    }
}
