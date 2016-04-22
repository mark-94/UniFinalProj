<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Model_Referral extends CI_Model
{
    function __construct() 
    {
        parent::__construct();
    }
    
    function getUserReferrals($username)
    {
        $this->db->where('users_username', $username);
        $this->db->order_by('urgency_id','ASC');
        $query = $this->db->get('referrals');
        return $query;                
    }
    
    function getUrgency($id = null)
    {
        if($id !== null)
        {
            $this->db->select('urgency');
            $query = $this->db->get_where('referral_urgency',array('id' => $id));
        }
        elseif($id == null)
        {
            $query = $this->db->get('referral_urgency');
        }
        return $query;                
    }
    
    function inlineEdit($field, $editedValue, $id )
    {
        $data[$field] = $editedValue;
        $this->db->where('id',$id);
        $this->db->update('referrals',$data);
    }
    
    function getOutcome($id)
    {
        $this->db->select('outcome');
        if($id !== null)
        {
            $query = $this->db->get_where('referral_outcome',array('id' => $id));
        }
        elseif($id == null)
        {
            $query = $this->db->get('referral_outcome');
        }
        return $query; 
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