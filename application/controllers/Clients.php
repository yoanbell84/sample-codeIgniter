<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Clients
 *
 * @author yoan
 */
class Clients extends CI_Controller { 
    //put your code here

    
    public function index(){
        
        $data['title'] = ucfirst('CodeIgniter App clients');
       
        $this->load->view('templates/header');
        $this->load->view('clients/index', $data);
        $this->load->view('templates/footer');
    }
    
    function get_clients(){  
           
            $limit = $this->input->post('length');
            $start = $this->input->post('start');
            $order = $this->input->post('order')[0]['column'];
            $dir = $this->input->post('order')[0]['dir'];
            $search = $this->input->post('search')['value'];
            $draw = $this->input->post('draw');
        
          
           $fetch_data = $this->client_model->make_datatables($limit,$start,$search,$order,$dir);  
           $data = array();  
           foreach($fetch_data as $row)  
           {  
                $sub_array = array(); 
                $sub_array['clientId'] = $row->clientId;  
                $sub_array['name'] = $row->name;  
                $sub_array['email'] = $row->email;  
                $sub_array['dob'] = $row->dob; 
                $sub_array['favColor'] = $row->favColor;
                $sub_array['createdAt'] = $row->created_at; 
                $data[] = $sub_array;  
           }  
           
      
           $output = array(  
                "draw"                    =>     intval($draw),  
                "recordsTotal"          =>      $this->client_model->get_filtered_data($search,$order,$dir),  
                "recordsFiltered"     =>     $this->client_model->get_filtered_data($search,$order,$dir),  
                "data"                    =>     $data  
           );  
           echo json_encode($output);  
      } 
      
      function delete_action(){
             $clientId = $this->input->post('clientid');
             $rows = $this->client_model->delete_client($clientId); 
             echo json_encode( $rows > 0 ? 1 : 0);
      }
      function client_action(){ 
    
          $action = 0;
         
          if($this->input->post('clientId'))
          $action = $this->input->post('clientId');
          if( $action == 0){
               
                $insert_data = array(  
                     'name'          =>     $this->input->post('name'),  
                     'email'               =>     $this->input->post("email"),
                     'dob'               =>     date("Y-m-d", strtotime($this->input->post("dob"))) ,
                     'favColor'               =>     $this->input->post("color"),
                     'created_at'               =>    date('Y-m-d H:m:s', time())
                   
                );  
                
                
                $this->client_model->insert_client($insert_data);  
                echo json_encode(array("status" => TRUE));
               
           }else{
                    $update_data = array(  
                     'name'          =>     $this->input->post('name'),  
                     'email'               =>     $this->input->post("email"),
                     'dob'               =>      date("Y-m-d", strtotime($this->input->post("dob"))) ,
                     'favColor'               =>     $this->input->post("color")
                   
                ); 
                   
               
		$this->client_model->update_client(array('clientId' => $this->input->post('clientId')), $update_data);
                echo json_encode(array("status" => TRUE));
           }  
      }
    
    
    function checkDateFormat($str) {
        $stamp = strtotime( $str );
      
            if (!is_numeric($stamp)) 
            { 
                 $this->form_validation->set_message('checkDateFormat', 'This is not a valid date format');
                return FALSE;
            } 
      
        $month = date( 'm', $stamp );
        $day   = date( 'd', $stamp );
        $year  = date( 'Y', $stamp );

        if (checkdate($month, $day, $year)) 
        {
           return $year.'-'.$month.'-'.$day;
        }

        $this->form_validation->set_message('checkDateFormat', 'This is not a valid date format');
        return false;
    }
    
    function chck_email(){
        
        $results = true;
        $clientId = $this->input->post('client');
        $email = $this->input->post('email');
        $fromEdit = isset($clientId) && $clientId != '' ? $clientId : null;

        $objClient = $this->client_model->check_email($email);
        if(count($objClient) > 0 && $fromEdit == null){
           $results = true ;
        }elseif(count($objClient) > 0 && $fromEdit != null){
            if($objClient[0]['clientId'] == $fromEdit)
            $results = false;
            else 
            $results = true;
        }
        echo $results;
   
        
    }
    
}
