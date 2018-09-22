<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Client
 *
 * @author yoan
 */
class Client_model extends CI_Model {
    //put your code here
        public $table = "clients";  
        public $select_column = array("clientId", "name", "email", "dob", "favColor", "created_at");  
        public $order_column = array(null, "name", null, null, null,"created_at");  
        
      
      function make_query($search,$order,$dir)  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table);  
           if(isset($search) && $search !="")  
           {  
                $this->db->like("name", $search);  
                $this->db->or_like("email",$search);  
                
           }  
           if(isset($order))  
           {  
                $this->db->order_by($this->order_column[$order], $dir);  
           }  
           else  
           {  
                $this->db->order_by('clientId', 'DESC');  
           }  
      }  
      function make_datatables($limit,$start,$search,$order,$dir){ 
          
           $this->make_query($search,$order,$dir);  
           
           if($limit != -1)  
           {  
                $this->db->limit($limit, $start);  
           }  
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data($search,$order,$dir){  
           $this->make_query($search,$order,$dir);  
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data()  
      {  
           $this->db->select("*");  
           $this->db->from($this->table);  
           return $this->db->count_all_results();  
      }  
      function insert_client($data)  
      {  
           $this->db->insert('clients', $data);  
      }  
      
      function update_client($where, $data){
          	
         
          $this->db->update($this->table, $data, $where);
          return $this->db->affected_rows();
      }
      
      function delete_client($id){
          	
          $this->db->delete($this->table , array('clientId' => $id));
          return $this->db->affected_rows();
      }
   
    function get_clients(){
        $query = $this->db->get('clients');
        return $query->result_array();
    }
    
    function check_email($email){        
        $query = $this->db->get_where($this->table,array('email' => $email));
        return $query->result_array();
    }
    
    
}
