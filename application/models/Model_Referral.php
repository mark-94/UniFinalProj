<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Referral extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getUserReferrals($username)
    {
        $query = $this->db->get_where('referrals',array('users_username' => $username));
        return $query;                
    }
    
    function getUrgency($id)
    {
        $this->db->select('urgency');
        $query = $this->db->get_where('referral_urgency',array('id' => $id));
        return $query->result();                
    }
    
    function getOutcome($id)
    {
        $this->db->select('outcome');
        $query = $this->db->get_where('referral_outcome',array('id' => $id));
        return $query->result();                
    }
    
    function getSingleReferral($id)
    {
        
        $query = $this->db->get_where('referrals',array('id' => $id));
        return $query;
    }
        
    function insertReferral($data=array())
    {
        $this->db->insert('referrals',$data);        
    }
    
}