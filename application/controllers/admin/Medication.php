<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medication extends Admin_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Medication');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        $this->data['load_custom_js'] = "inlineEdit.js";
    }
    
    public function index()
    {
        $this->getAllMedication();        
    }
    
    function getAllMedication()
    {        
        $this->data['title'] = 'Medication';
        $this->data['medication'] = $this->Model_Medication->getMedication()->result();       
        
        $this->_render_page('medication_view',$this->data);
    }
    
    function update()
    {
        $field = $this->input->post('field');
        $editedValue = $this->input->post('editedValue');
        $id = $this->input->post('id');
         
        $this->Model_Medication->inlineEdit( $field, $editedValue, $id );
        return;
    }
    
        
    function addMedicationForm()
    {
        $this->data['title'] = 'Create Medication';
        
        $this->form_validation->set_rules('medication_name', 'Medication Name', 'trim|required|is_unique[medication.medication_name]');
        $this->form_validation->set_rules('dosage_adult', 'Dosage Adult', 'trim|required|is_natural');
        $this->form_validation->set_rules('dosage_child', 'Dosage Child', 'trim|required|is_natural');
        $this->form_validation->set_rules('per_num_hours', 'Per Number of Hours', 'trim|required|is_natural');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->_render_page('add_medication_view');
        }
        else 
        {
            $data['medication_name'] = $this->input->post('medication_name');
            $data['dosage_adult'] = $this->input->post('dosage_adult');
            $data['dosage_child'] = $this->input->post('dosage_child');
            $data['per_num_hours'] = $this->input->post('per_num_hours');
            $data['description'] = $this->input->post('description');
           
            $this->Model_Medication->insertMedication($data);
            
            // $this->session->set_flashdata('message', $this->ion_auth->messages())
            redirect("admin/medication",'refresh');
        }
                
    }
}
