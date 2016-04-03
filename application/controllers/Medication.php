<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Medication extends Auth_Controller {

    function __construct()
    {
      parent::__construct();        
        $this->load->model('Model_Medication');
        $this->data['load_custom_css'] = "scrollDiv.css";
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