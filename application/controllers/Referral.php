<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Referral extends Auth_Controller {
    
    function __construct()
    {
      parent::__construct();        
        $this->load->model(array('Model_Referral','Model_Patient'));
        $this->load->library(array('form_validation','ion_auth'));
        $this->load->helper(array('form','url'));
        
        
        //$this->data['load_custom_css'] = "scrollDiv.css";
    }
    
    public function index()
    {
        $this->getUserReferrals();        
    }
    
    function getUserReferrals($user=null)
    {
        if(isset($user))
        {
            $current_username = $user;
        }
        else
        {
            $current_user = $this->ion_auth->users()->row();
            $current_username = $current_user->username;
        }
        
        $this->data['title'] = 'My Referrals';
        $this->data['user_referrals'] = $this->Model_Referral->getUserReferrals($current_username)->result();
        
        foreach ($this->data['user_referrals'] as $key => $referral)
        {
                $this->data['user_referrals'][$key]->patient = $this->Model_Patient->getPatient($referral->patient_nid);
                $this->data['user_referrals'][$key]->urgency = $this->Model_Referral->getUrgency($referral->urgency_id);
                $this->data['user_referrals'][$key]->outcome = $this->Model_Referral->getOutcome($referral->outcome_id);
        }			
        
        $this->_render_page('referrals_view',$this->data);
    }    
    
    function addReferralForm()
    {
      
        $this->data['title'] = 'Referral';
        
        $this->form_validation->set_rules('patient_nid', 'Patient NID', 'trim|required|is_unique[referrals.patient_nid]');
        $this->form_validation->set_rules('diagnosis_name', 'Diagnosis', 'trim|required');
        $this->form_validation->set_rules('username', 'Consultant Username', 'trim|required');
        $this->form_validation->set_rules('type', 'Urgency', 'trim|required');
        $this->form_validation->set_rules('redirected_to', 'Redirect To', 'trim');
        //$this->form_validation->set_rules('open', 'open bool', 'trim|required');
        

        if ($this->form_validation->run() === FALSE)
        {
            $this->data['patient_nid'] = array(
                'name'  => 'patient_nid',
                'id'    => 'patient_nid',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('patient_nid'),
            );
            $this->data['diagnosis_name'] = array(
                'name'  => 'diagnosis_name',
                'id'    => 'diagnosis_name',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('diagnosis_name'),
            );
            $this->data['username'] = array(
                'name'  => 'username',
                'id'    => 'username',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('username'),
            );
            $this->data['type'] = array(
                'name'  => 'type',
                'id'    => 'type',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('type'),
            );
            $this->data['redirected_to'] = array(
                'name'  => 'redirected_to',
                'id'    => 'redirected_to',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('redirected_to'),
            );
            $this->data['comment'] = array(
                'name'  => 'comment',
                'id'    => 'comment',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('comment'),
            );
            
            
            $this->_render_page('add_referral_view');
        }
        else 
        {
            $data['patient_nid'] = $this->input->post('patient_nid');
            $data['diagnosis_id'] = $this->input->post('diagnosis_name');
            $data['users_username'] = $this->input->post('username');
            $data['type_id'] = $this->input->post('type');
            if(null !== $this->input->post('redirected_to')){$data['redirected_to'] = $this->input->post('redirected_to');};
            $data['comment'] = $this->input->post('comment');
           
            $this->Model_Referral->insertReferral($data);
            
            redirect("referral",'refresh');
        }
    }
}