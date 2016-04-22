<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
 
class Verify extends Admin_Controller
{
  public function __construct()
  {
    parent::__construct();
    
//    if(ENVIRONMENT!=='development' || $_SERVER['REMOTE_ADDR']!=='localhost')
//    {
//      $this->load->helper('url');
//      redirect('/');
//    }
  }
  
  public function index()
  {
    // we should retrieve the environment we are into
    $this->data['environment'] = ENVIRONMENT;
    
    //get_loaded_classes() is a method from MY_Loader. It retrieves the list of classes that are loaded (which in Loader.php is actually protected)
    $this->data['loaded_classes'] = $this->load->get_loaded_classes();
    // same as before, a method from MY_Loader that retrieves helpers
    $this->data['loaded_helpers'] = $this->load->get_loaded_helpers();
    // same as before, a method from MY_Loader that retrieves the models loaded
    $this->data['loaded_models'] = $this->load->get_loaded_models();
    
    // retrieves the config data
    $this->data['config'] = $this->config->config;
    
    $this->data['loaded_database'] = 'Database is not loaded';
    if (isset($this->db) && $this->db->conn_id !== FALSE) 
    {
        $this->data['loaded_database'] = 'Database is loaded and connected';
        $this->data['db_settings'] = array(
        'dsn' => $this->db->dsn,
        'hostname' => $this->db->hostname,
        'port' => $this->db->port,
        'username' => '***',
        'password' => '***',
        'database' => '***',
        'username' => $this->db->username,
        'password' => $this->db->password,
        'database' => $this->db->database,
        'driver' => $this->db->dbdriver,
        'dbprefix' => $this->db->dbprefix,
        'pconnect' => $this->db->pconnect,
        'db_debug' => $this->db->db_debug,
        'cache_on' => $this->db->cache_on,
        'cachedir' => $this->db->cachedir,
        'char_set' => $this->db->char_set,
        'dbcollat' => $this->db->dbcollat,
        'swap_pre' => $this->db->swap_pre,
       // 'autoinit' => $this->db->autoinit,
        'encrypt' => $this->db->encrypt,
        'compress' => $this->db->compress,
        'stricton' => $this->db->stricton,
        'failover' => $this->db->failover,
        'save_queries' => $this->db->save_queries
      );
    }
    
    // look for the cache path
    $cache_path = ($this->config->item('cache_path') === '') ? APPPATH.'cache/' : $this->config->item('cache_path');
    // and verify that it is writable
    if(is_really_writable($cache_path))
    {
      $this->data['writable_cache'] = TRUE;
    }
    // also look for the logs path
    $log_path = ($this->config->item('log_path') === '') ? APPPATH.'logs/' : $this->config->item('log_path');
    // and verify if is writable
    if(is_really_writable($log_path))
    {
       $this->data['writable_logs'] = TRUE;
    }
    
//    // optionally you can look for other writable directories. 
//    $this->load->helper('url');
//    $OPTIONAL_NAME = base_url().'OPTIONAL_NAME';
//    if(is_really_writable($OPTIONAL_NAME))
//    {
//      $data['writable_OPTIONAL_NAME'] = $OPTIONAL_NAME.' is writable';
//    }
//    else
//    {
//      $data['writable_OPTIONAL_NAME'] = '<span class="red"><strong>'.$OPTIONAL_NAME.'</strong> is not writable</span>';
//    }
    
    //$this->load->view('verify_view', $data);
    $this->_render_page('verify_view', $this->data);
  }
}
    