<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medication extends Auth_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Medication');
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
}?>