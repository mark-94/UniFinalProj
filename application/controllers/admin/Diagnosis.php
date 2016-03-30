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
        $this->data['load_custom_js'] = "inlineEdit.js";
    }
    
    public function index()
    {
        $this->getAllDiagnosis();        
    }
    
    function getAllDiagnosis()
    {        
        $this->data['title'] = 'Diagnosis List';
        $this->data['controller'] = 'diagnosis';
        $this->data['update'] = 'updateDiagnosis';
        $this->data['treatment'] = $this->Model_Treatment_Courses->getTreatmentCourses();
        //$this->data['diagnosis_courses'] = $this->Model_Diagnosis->getDiagnosisCourses();        
        $this->data['diagnosis'] = $this->Model_Diagnosis->getDiagnosis(); 
        
        foreach ($this->data['diagnosis'] as $key => $diagnosis_course)
        {
                $this->data['diagnosis'][$key]->courses = $this->Model_Diagnosis->getDiagnosisCourses($diagnosis_course->id);
        }

			
        
        $this->_render_page('diagnosis_view',$this->data);
    }
    
//    function getDiagnosisCourses()
//    {
//        $diagnosisID = $this->input->post('diagnosisID');
//        $this->Model_Diagnosis->getCourses($diagnosisID);
//        return;
//    }
    
    function update()
    {
        $field = $this->input->post('field');
        $editedValue = $this->input->post('editedValue');
        $id = $this->input->post('id');

                         
        $this->Model_Diagnosis->inlineEdit( $field, $editedValue, $id );
        return;
    }
    
        
    function addDiagnosisForm()
    {
        $this->data['title'] = 'Create Diagnosis';
        
        $this->form_validation->set_rules('diagnosis_name', 'Diagnosis Name', 'trim|required|is_unique[diagnosis.diagnosis_name]');
        //$this->form_validation->set_rules('links', 'Links', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->_render_page('add_diagnosis_view');
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
