<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = array();
    function __construct()
    {
        parent::__construct();
        $this->data['pagetitle'] = 'Treatment App';
    }
        
    protected function render($the_view = NULL, $template = 'main_content') 
    {
        if($template == 'json' || $this->input->is_ajax_request())
        {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        }
        elseif(is_null($template))
        {
          $this->load->view($the_view,$this->data);
        }
        else
        {
          $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);;
          $this->load->view('common/'.$template.'_view', $this->data);
        }
        
    }
}

class Auth_Controller extends MY_Controller 
{
    function __construct() 
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===FALSE)
        {
            redirect('user/login');
        }
    }
    protected function render($the_view = NULL, $template = 'auth_main_content')
    {
        parent::render($the_view, $template);
    }
}
