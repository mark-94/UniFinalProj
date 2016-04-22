<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Diagnosis extends Auth_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Diagnosis');
        $this->load->model('Model_Treatment_Courses');
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
        $this->data['diagnosis'] = $this->Model_Diagnosis->getDiagnosis()->result(); 
        
        foreach ($this->data['diagnosis'] as $key => $diagnosis_course)
        {
                $this->data['diagnosis'][$key]->courses = 
                        $this->Model_Diagnosis->getDiagnosisCourses($diagnosis_course->id,'IN')->result();
                $this->data['diagnosis'][$key]->unselected_courses = 
                        $this->Model_Diagnosis->getDiagnosisCourses($diagnosis_course->id,'NOT IN')->result();
        }			
        
        $this->_render_page('diagnosis_view',$this->data);
    }
} ?>
    