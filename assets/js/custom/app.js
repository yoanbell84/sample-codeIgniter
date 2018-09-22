/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var clients = function () {
    return {
        initClients: function () {
          buildClientTable();
          attachEvents();
        },
        settings: {
        dt_url:'',
        action_url:'',
        dtClients:'',
        clientForm:''

        }
    };
    
    
    function buildClientTable(){
    
           clients.settings.dtClients = $('#client_data').DataTable({  
           processing:false,  
           serverSide:true,  
           order:[],  
           ajax:{  
                url:clients.settings.dt_url,  
                type:"POST" 
               
           }, 
           columns: [ 
                    {"data": "clientId" , searchable: false,sortable: true,visible : false },
                    { sTitle: "Name", "data": "name" , searchable: false,sortable: true,visible : true },
                    { sTitle: "Email", "data": "email" , searchable: false,sortable: true,visible : true },
                    { sTitle: "Date of Birth", "data": "dob" , searchable: false,sortable: true,visible : true },
                    { sTitle: "Fav Color", "data": "favColor" , searchable: false,sortable: false,visible : true , 
                        render : function(data,row){
                        
                            return '<input name="favColor" value="'+data+'" readonly style="background-color : #'+data+';"></input>';
                         
                        }
                    },
                    { sTitle: "Actions",data: null,className:"actions",sortable: false,searchable: false,visible: true,
                        render: function (data,row){
                        return ['<button type="button" name="update" node-id="'+data.clientId+'" class="btn btn-warning btn-xs">Update</button>'+' '+ '<button type="button" name="delete" node-id="'+data.clientId+'" class="btn btn-danger btn-xs">Delete</button>' ];
                        }
                    }
           ]
           
      });  
    }
    function attachEvents(){
        
        $("#color").colorpicker();
        $("input[name='dob']").datepicker();

        $(document).on('click', 'button[name="update"]', function(event){            
          
          var data = getRowData($(this),'#client_data');
          $('#client_form')[0].reset(); 
          $('.modal-title').text('Update Client');
          $('#clientId').val(data.clientId);
          $('input[name="name"]').val(data.name);
          $('input[name="email"]').val(data.email);
          $('input[name="dob"]').val(data.dob);
          $('input[name="color"]').val(data.favColor);
          $('#clientModal').modal('show');           
            
        });       
        
    
        
        $(document).on('click', 'button[name="delete"]', function(event){  
            swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
            }).then((result) => {
                if (result.value) {
                   
                    $.ajax({  
                        url: clients.settings.del_url,  
                        method:'POST',  
                        data:{clientid:$(this).attr('node-id')}, 
                        dataType: 'html', 
                        success:function(data) {  
                             $('#clientId').val('');
                             $('#client_form')[0].reset();  
                             $('#clientModal').modal('hide');  
                             clients.settings.dtClients.ajax.reload();  
                            parseInt(data) != 0 ? 
                            swal('Deleted!','Your file has been deleted.','success') :  
                            swal('OPS!','Something went wrong. try again','error')
                        }  
                    }); 
                }
                
            });
        });
        
        
        
        $("#clientModal").on("hidden.bs.modal", function () {
            $(this).find('form')[0].reset();
            $('#clientId').val('');  
            $(clients.settings.clientForm).find('.form-control.error.is-invalid').removeClass('error').removeClass('is-invalid');
            $(clients.settings.clientForm).find('div.invalid-feedback').remove();
      
        });
        $("#client_form").validate({
            rules: {
                    name: {required : true},
                    email: {
                      required: true,                      
                      email: true,
                      remote:  {
                            url:clients.settings.chck_url,
                            type: "post",
                            data: {
                                    client : function(){ 
                                     return $('#clientId').val();
                                }  
                              },
                            dataFilter: function(data) {
                                if(data == 1){
                                  return false;
                                }else{
                                  return true;
                                }
                            }
                        }
                    }

            },
            messages: {
              name: "This field is required",
              email: {
                required:"Please enter a valid email address",
                remote:"This email address is already registered."
              }
            },
            errorPlacement:function (error,element){
                element.removeClass('is-invalid');
                element.next('div.invalid-feedback').remove();
                element.addClass('is-invalid');
                element.after('<div class="invalid-feedback">'+$(error).html()+'</div>');
            },
            unhighlight: function(element, errorClass, validClass){
               $(element).removeClass('is-invalid');
               $(element).next().remove(errorClass);                
            },
            submitHandler: function(form) {
                
                
                var data = $(form).serializeArray(); 
                data.push({name: "clientId", value:  $('#clientId').val()});
                
               
                $.ajax({  
                 url: clients.settings.action_url,  
                 method:'POST',  
                 dataType: 'JSON',
                 data:$.param(data),                 
                 success:function(result) {  
                  
                      $('#clientId').val('');
                      $('#client_form')[0].reset();  
                      $('#clientModal').modal('hide');  
                      if(result.status == true){
                         swal('Successfully!','Operation successfully completed','success'); 
                         clients.settings.dtClients.ajax.reload();  
                      }else
                      swal('OPS!','Something went wrong. try again','error');
                 }  
                }); 
            }
        });
    }
    
    function getRowData(elem,table){
        var current_row = $(elem).parents('tr'); 
        if (current_row.hasClass('child')) {//Check if the current row is a child row          
            current_row = current_row.prev();//If it is, then point to the row before it (its 'parent')           
        }
        var aData = $(table).DataTable().row(current_row).data();
        return aData;    
    }         
     
}();