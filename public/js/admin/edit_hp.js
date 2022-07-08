var loadingIcon ='<div class="sk-spinner sk-spinner-three-bounce pull-left"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div>';

function edit_hp()
 {    
    
    if (!validator.checkAll($("#edit_hp_form"))) {   
        return false;
    }else{
        $("#message").removeClass('hide');
        $("#message-text").html(loadingIcon);
        $('button').prop('disabled', true);  
        $.ajax({
        type: "POST",    
        data: $("#edit_hp_form").serialize(),
        dataType: "json",
        url :SITE_URL+"/admin/healthcareprofessional/edit/"+hpId,
        success : function(response) { 
            if(response.error == 1){
                $("#message-text").html('<i class="fa-fw fa fa-times"></i><strong>Error!</strong>'+ response.err_msg);
                $("#message").removeClass('hide');
                $("#message").addClass('alert alert-danger');
                $('button').prop('disabled', false);
            }else{
                window.location.href= SITE_URL+"/admin/healthcareprofessional";
            }
            
        },
        error : function(){
        $('button').prop('disabled', false);    
        $("#message-text").html('<i class="fa-fw fa fa-times"></i><strong>Error!</strong> Something went wrong, please try again.');
        $("#message").removeClass('hide');
        $("#message").addClass('alert alert-danger');
        },
        });
        
    }     
}  

function getCountryState(country){
 
 // First  display the phone code   
 var phoneCode = $(country).find(":selected").attr('phone_code');
 if(phoneCode !='undefined')
    $('#healthcare_professional_phone_code').val(phoneCode);

 var cnty = country.value;
 $('#healthcare_professional_state_select').html('');
 $('#healthcare_professional_state_text').val('');
  $.ajax({
        type: "GET",
        url: SITE_URL+"/admin/state",
        dataType: "json",
        data: {cnty: cnty},
        
        success: function(data) {  
            if(data.state_exist){
                $("#state_1").show();
                $("#state_2").html('');
                $("#state_2").hide();
                states = data.state_arr;                 
                $.each(states, function(i,item) {
                     $('#healthcare_professional_state_select').append($('<option/>', { 
                        value: item,
                        text : item 
                    }));
                });
       
            }else{
               $("#state_1").hide();
               $("#state_2").html('<input  id="healthcare_professional_state_text" name="healthcare_professional_state_text"  title="State" class="form-control" type="text" required="required">');
               $("#state_2").show();
            }
        }
        });  
}

function remove_stored_image (){
        $.ajax({
        dataType: "json",
        url :SITE_URL+"/admin/healthcareprofessional/remove_stored_image/"+hpId,
        success : function(response) { 
            if(response.error == 1){
                alert(response.err_msg);
                return false;
            }else{
                 window.location = SITE_URL+ '/admin/healthcareprofessional/edit/'+hpId; 
            }
            
        },
        error : function(){
            alert("Error! Something went wrong, please try again.");
            return false;
        },
        }); 
}
function remove_stored_biodata (){
        $.ajax({
        dataType: "json",
        url :SITE_URL+"/admin/healthcareprofessional/remove_stored_biodata/"+hpId,
        success : function(response) { 
            if(response.error == 1){
                alert(response.err_msg);
                return false;
            }else{
                  window.location = SITE_URL+ '/admin/healthcareprofessional/edit/'+hpId; 
            }
            
        },
        error : function(){
            alert("Error! Something went wrong, please try again.");
            return false;
        },
        }); 
}


$(document).ready(function(){

        //Date Picker
        
         $( "#healthcare_professional_dob" ).datepicker({
           changeMonth: true,
           changeYear: true,
           dateFormat: 'mm-dd-yy',   
           yearRange: "-100:+0",
           maxDate: new Date(),
        }); 
                            
                     
                            
      $.ajax({
        type: "GET",
        url: SITE_URL+"/admin/state",
        dataType: "json",
        data: {cnty: countryId},
        
        success: function(data) {  
            if(data.state_exist){
                $("#state_1").show();
                $("#state_2").html('');
                $("#state_2").hide();
                states = data.state_arr;                 
                $.each(states, function(i,item) {
                     $('#healthcare_professional_state_select').append($('<option/>', { 
                        value: item,
                        text : item 
                    }));
                });
                
                $('#healthcare_professional_state_select').val(stateName);
       
            }else{
               $("#state_1").hide();
               $("#state_2").html('<input  id="healthcare_professional_state_text" name="healthcare_professional_state_text"  title="State" class="form-control" type="text" required="required" value="'+stateName+'">');
               $("#state_2").show();
            }
        }
        }); 
    
});


$('form')
    .on('blur', 'input[required],textarea[required], input.optional, select.required', validator.checkField)
    .on('change', 'select.required', validator.checkField)
    .on('keypress', 'input[required][pattern]', validator.keypress);

$('.multi.required')
    .on('keyup blur', 'input', function () {
        validator.checkField.apply($(this).siblings().last()[0]);
    });
$('form').submit(function (e) {
        e.preventDefault();
        var submit = true;
        // evaluate the form using generic validaing
        if (!validator.checkAll($(this))) {
            submit = false;
        }

        if (submit)
            this.submit();
        return false;
 });