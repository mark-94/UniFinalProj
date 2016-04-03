<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = array();
    
            function __construct()
    {
        parent::__construct();
        
    }
    
    function _render_page($the_view, $data=array(), $returnhtml=false, $template='auth_main_content')
    {
        //if it's decided/need to use json files for any content
        if($template == 'json' || $this->input->is_ajax_request())
        {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        }
        //if its need for page to have no template
        elseif(is_null($template))
        {
            $this->load->view($the_view,$this->data);
        }
        else
        {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
            $this->data['the_head_content'] = $this->load->view('common/_parts/auth_header_view',$this->data, TRUE);
            $view_html = $this->load->view('common/'.$template.'_view', $this->data, $returnhtml);
            
            //reutrns view_html if returnhtml is true
            if ($returnhtml){ return $view_html;} 
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
            redirect('auth/login');
        }
        $user = $this->ion_auth->users()->row();
        $this->data['current_username'] = $user->username;
    }
    
    
}

class Admin_Controller extends MY_Controller
{
     
    function __construct() 
    {
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===FALSE)
        {
            redirect('auth/login');
        }
        elseif ($this->ion_auth->is_admin()===FALSE) 
        {
            redirect('welcome');
        }
        $user = $this->ion_auth->users()->row();
        $this->data['current_username'] = $user->username;
    }
    
    function _render_page($the_view, $data=array(), $returnhtml=false, $template='auth_main_content')
    {
        $the_Nview = "admin/$the_view";
        parent::_render_page($the_Nview, $data, $returnhtml, $template);
    }
    
    
}
