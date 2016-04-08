<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Referral extends Auth_Controller {
    
    function __construct()
    {
      parent::__construct();        
        $this->load->model(array('Model_Referral','Model_Patient','Model_Diagnosis'));
        $this->load->library(array('form_validation','ion_auth'));
        $this->load->helper(array('form','url'));
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    }
    
    public function index()
    {
        $this->getUserReferrals();        
    }
    
    function getUserReferrals($user=null)
    {
        //sets username to supplied name otherwise username is that of currently logged in
        if(isset($user))
        {
            $logged_in_username = $user;
        }
        else
        {
            $logged_in_user = $this->ion_auth->user()->row();
            $logged_in_username = $logged_in_user->username;
        }
        
        $this->data['title'] = 'My Referrals';
        $this->data['user_referrals'] = $this->Model_Referral->getUserReferrals($logged_in_username)->result();
        
        foreach ($this->data['user_referrals'] as $key => $referral)
        {
                $this->data['user_referrals'][$key]->patient = $this->Model_Patient->getPatient($referral->patient_nid)->result();
                $this->data['user_referrals'][$key]->urgency = $this->Model_Referral->getUrgency($referral->urgency_id)->row('urgency');
                $this->data['user_referrals'][$key]->outcome = $this->Model_Referral->getOutcome($referral->outcome_id)->row('outcome');
                
                //if-else to highlight importance of referral
                if($this->Model_Referral->getUrgency($referral->urgency_id)->row('urgency') == 'Emergency')
                {
                    $this->data['user_referrals'][$key]->urgency_class = 'alert-danger';
                }
                elseif($this->Model_Referral->getUrgency($referral->urgency_id)->row('urgency') == 'Urgent')
                {
                    $this->data['user_referrals'][$key]->urgency_class = 'alert-warning';
                }
                elseif($this->Model_Referral->getUrgency($referral->urgency_id)->row('urgency') == 'Consultation')
                {
                    $this->data['user_referrals'][$key]->urgency_class = 'alert-info';
                }
                else
                {
                    $this->data['user_referrals'][$key]->urgency_class = 'alert-success';
                }
        }			
        $this->_render_page('referrals_view',$this->data);
    }    
    
    
    function patient_referral($id)
    {
        $this->data['patient_referral'] = $this->Model_Referral->getSingleReferral($id)->row();
        $referral = $this->data['patient_referral'];
        
        $this->data['patient_details'] = $this->Model_Patient->getPatient($referral->patient_nid)->row();
        $patient = $this->data['patient_details'];
        
        $this->data['diagnosis'] = $this->Model_Diagnosis->getSingleDiagnosis($referral->diagnosis_id)->row();
        $this->data['treatment_courses'] = $this->Model_Diagnosis->getDiagnosisCourses($referral->diagnosis_id,'IN')->result();
        
        $urgency = $this->Model_Referral->getUrgency($referral->urgency_id)->row('urgency');
        $this->data['urgency'] = $urgency;
        if($urgency == 'Emergency')
        {
            $this->data['urgency_class'] = 'alert-danger';
        }
        elseif($urgency == 'Urgent')
        {
            $this->data['urgency_class'] = 'alert-warning';
        }
        elseif($urgency == 'Consultation')
        {
            $this->data['urgency_class'] = 'alert-info';
        }
        else
        {
            $this->data['urgency_class'] = 'alert-success';
        }
        $this->data['outcome'] = $this->Model_Referral->getOutcome($referral->outcome_id)->row('outcome');
        
        $this->data['title'] = "Referral for $patient->first_name $patient->last_name";
        
        $this->_render_page('single_referral_view',$this->data);
    }
    
    function addReferralForm()
    {
        $this->data['title'] = 'Referral';
        
        $this->form_validation->set_rules('patient_nid', 'Patient NID', 'numeric|trim|required|is_unique[referrals.patient_nid]');
        $this->form_validation->set_rules('first_name', 'Forename', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Surname', 'trim|required');
        $this->form_validation->set_rules('DOB', 'DOB', 'required');
        $this->form_validation->set_rules('diagnosis_names', 'Diagnosis Name', 'required');
        $this->form_validation->set_rules('usernames', 'Consultant Username', 'required');
        $this->form_validation->set_rules('urgencies', 'Urgency', 'required');
        $this->form_validation->set_rules('redirected_to', 'Redirect To', 'trim');
        $this->form_validation->set_rules('comment','Comment','trim|required');
        
        $users_array = $this->ion_auth->users()->result();
        $urgencies_array = $this->Model_Referral->getUrgency()->result();
        $diagnoses_array = $this->Model_Diagnosis->getDiagnosis()->result();

        if ($this->form_validation->run() === FALSE)
        {
            $this->data['patient_nid'] = array(
                'name'  => 'patient_nid',
                'id'    => 'patient_nid',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('patient_nid'),
            );
            $this->data['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('first_name'),
            );
            $this->data['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('last_name'),
            );
            $this->data['DOB'] = array(
                'name'  => 'DOB',
                'id'    => 'DOB',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('DOB'),
            );
            $diagnosis = array();
            foreach($diagnoses_array as $row)
            {
                $diagnosis[$row->id] = $row->diagnosis_name;
            }
            $this->data['diagnosis_names'] = $diagnosis;
            
            $user = array();
            foreach($users_array as $row)
            {
                $user[$row->username] = $row->username;
            }
            $this->data['usernames'] = $user;
                
            $urgency = array();
            foreach($urgencies_array as $row)
            {
                $urgency[$row->id] = $row->urgency;
            }
            $this->data['urgencies'] = $urgency;
            
            $this->data['redirected_to'] = array(
                'name'  => 'redirected_to',
                'id'    => 'redirected_to',
                'class' => 'form-control',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('redirected_to'),
            );
            $this->data['comment'] = array(
                'name'  => 'comment',
                'id'    => 'comment',
                'class' => 'form-control',
                'type'  => 'textarea',
                'rows' => '10',
                'value' => $this->form_validation->set_value('comment'),
            );
            
            $this->_render_page('add_referral_view',$this->data);
        }
        else 
        {
            $pData['nid'] = $this->input->post('patient_nid');
            $pData['first_name'] = $this->input->post('first_name');
            $pData['last_name'] = $this->input->post('last_name');
            $pData['DOB'] = $this->input->post('DOB');
            $data['patient_nid'] = $this->input->post('patient_nid');
            $data['diagnosis_id'] = $this->input->post('diagnosis_names');
            $data['users_username'] = $this->input->post('usernames');
            $data['urgency_id'] = $this->input->post('urgencies');
            //if(null !== $this->input->post('redirected_to')){$data['redirected_to'] = $this->input->post('redirected_to');};
            $data['comment'] = $this->input->post('comment');
            
            $this->Model_Patient->insertPatient($pData);
            $this->Model_Referral->insertReferral($data);
            
            redirect("referral",'refresh');
        }
    }
}