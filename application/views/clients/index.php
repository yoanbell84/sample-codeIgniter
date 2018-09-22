<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if($this->session->userdata('logged_in')) : ?>   
   

 <div class="container box">  
           <h3 align="center"><?php echo $title; ?></h3><br />  
           <div class="table-responsive">  
                <button type="button" id="addClient" style="margin-bottom: 0.5em;" data-toggle="modal" data-target="#clientModal" class="btn btn-info"><i class="fa fa-plus"></i>  New Client</button>  
                <br />
                <table id="client_data" class="table table-bordered table-striped">  </table>  
           </div>  
      </div>  

<div id="clientModal" class="modal fade">  
    <div class="modal-dialog" role="document"> 
        <?php echo form_open('clients/create' ,array('id'=>'client_form')); ?>
         
                <div class="modal-content">  
                     <div class="modal-header">  
                          <h4 class="modal-title" >Add Client</h4>  
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                     </div>  
                     <div class="modal-body">  
                         <div class="container col-md-12">
                        <div class="form-group">
                            <label for="name">Client Name</label>
                            <input type="input" name="name" placeholder="Name" class="form-control"></input><br />
                            <?php echo form_error('name'); ?>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input name="email" placeholder='someone@example.com' class="form-control"></input><br />
                            <?php echo form_error('email'); ?>
                        </div> 
                        <div class="form-group c">
                            <label for="dob">Date of Birth</label>
                            <input name="dob" class="form-control" autocomplete="off"</input><br />
                            <?php echo form_error('dob'); ?>
                        </div>
                        <div class="form-group ">
                            <label for="color">Color</label> 
                            <input id="color" name="color" autocomplete="off" class="form-control"></input><br />
                        </div>
                                             
                            <input type="hidden" id="clientId"></input><br/>
                       
                     </div>  
                  </div>
          
                     <div class="modal-footer">  
                          <input type="submit" name="action" class="btn btn-success" value="Save" />  
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                     </div> 
                      </div>
                </div>  
           <?php echo form_close(); ?>
      </div>  


<script src="<?php echo base_url(); ?>assets/js/custom/app.js"></script>
<script>
    $(document).ready(function() {
        clients.settings.dt_url= "<?php echo base_url() . 'clients/get_clients'; ?>";
        clients.settings.action_url= "<?php echo base_url() . 'clients/client_action'; ?>";
        clients.settings.chck_url= "<?php echo base_url() . 'clients/chck_email'; ?>";
        clients.settings.del_url= "<?php echo base_url() . 'clients/delete_action'; ?>";
        clients.settings.clientForm = '#client_form';        
        clients.initClients();
});
</script>

<?php else : redirect('users/login');?> 
<?php endif; ?>
