<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Dashboard extends Admin_Controller {
 
    public function index()
    {
        $this->data['title'] = 'Admin Dashboard';
        $this->_render_page('dashboard_view');
    }
}