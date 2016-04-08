<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medication extends Admin_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Medication');
        $this->load->library('form_validation');
        $this->load->helper(array('form','url'));
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
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
        $csrf_hash = $this->security->get_csrf_hash();
        echo $csrf_hash;
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
            $this->data['medication_name'] = array(
                'name'  => 'medication_name',
                'id'    => 'medication_name',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('medication_name'),
            );
            $this->data['dosage_adult'] = array(
                'name'  => 'dosage_adult',
                'id'    => 'dosage_adult',
                'class' => 'form-control',
                'type'  => 'number',
                'min' => '0',
                'value' => $this->form_validation->set_value('dosage_adult'),
            );
            $this->data['dosage_child'] = array(
                'name'  => 'dosage_child',
                'id'    => 'dosage_child',
                'class' => 'form-control',
                'type'  => 'number',
                'min' => '0',
                'value' => $this->form_validation->set_value('dosage_child'),
            );
            $this->data['per_num_hours'] = array(
                'name'  => 'per_num_hours',
                'id'    => 'per_num_hours',
                'class' => 'form-control',
                'type'  => 'number',
                'min' => '0',
                'value' => $this->form_validation->set_value('per_num_hours'),
            );
            $this->data['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
                'class' => 'form-control',
                'type'  => 'textarea',
                'rows' => '10',
                'value' => $this->form_validation->set_value('description'),
            );
            $this->_render_page('add_medication_view', $this->data);
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
