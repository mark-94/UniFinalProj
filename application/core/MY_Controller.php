<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = array();
    
            function __construct()
    {
        parent::__construct();
        
    }
    
    function _render_page($the_view, $data=array(), $template='main_content')
    {
        //if it's decided/need to use json files for any content
        if($template == 'json' || $this->input->is_ajax_request())
        {
            header('Content-Type: application/json');
            echo json_encode($this->data);
        }
        //if its decided/need for page to have no template
        elseif(is_null($template))
        {
            $this->load->view($the_view,$this->data);
        }
        else
        {
            $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($the_view,$this->data, TRUE);
            if($template=='main_content')
            {
                $this->data['the_head_content'] = $this->load->view('common/_parts/header_view',$this->data, TRUE);
            }
            elseif($template=='auth_main_content')
            {
                $this->data['the_head_content'] = $this->load->view('common/_parts/auth_header_view',$this->data, TRUE);
            }
            $this->load->view('common/'.$template.'_view', $this->data);
            
        }
    }
    
}

class Auth_Controller extends MY_Controller 
{
     
    function __construct() 
    {
        parent::__construct();
        
        if($this->ion_auth->logged_in()===FALSE)
        {
            redirect('auth/login');
            return;
        }
        $user = $this->ion_auth->user()->row();
        $this->data['current_username'] = $user->username;
        $this->data['load_custom_js'] = "customJS.js";
        $this->data['load_custom_css'] = "customCSS.css";
    }
    
    function _render_page($the_view, $data=array(), $template='auth_main_content')
    {
        parent::_render_page($the_view, $data, $template);
    }
    
    
}

class Admin_Controller extends Auth_Controller
{
     
    function __construct() 
    {
        parent::__construct();
        
        if ($this->ion_auth->is_admin()===FALSE) 
        {
            redirect('welcome');
            return;
        }
    }
    
    function _render_page($the_view, $data=array(), $template='auth_main_content')
    {
        $the_Nview = "admin/$the_view";
        parent::_render_page($the_Nview, $data, $template);
    }
    
    
}
