<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
    protected $data = array();
    
            function __construct()
    {
        parent::__construct();
        
    }
    
    /*  
     *  -The main method that decides how to load a view and
     *  -functionality for loading alternative content types
     */
    function _render_page($the_view, $data=array(), $template='main_content')
    {
        if(is_null($template))
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

/*  
 *  -Core controller for authenticated users. 
 *  -Loads custom CSS and JS
 *  -gets current users username
 */
class Auth_Controller extends My_Controller 
{
     
    function __construct() 
    {
        parent::__construct();
        
        if(!$this->ion_auth->logged_in())
        {
            redirect('login');
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

/*  
 *  -Core controller for Administrative users
 */
class Admin_Controller extends Auth_Controller
{
     
    function __construct() 
    {
        parent::__construct();
        
        if (!$this->ion_auth->is_admin()) 
        {
            redirect('welcome');
            return;
        }
    }
    
    function _render_page($the_view, $data=array(), $template='auth_main_content')
    {
        $the_Adminview = "admin/$the_view";
        parent::_render_page($the_Adminview, $data, $template);
    }
    
    
}
