@extends('layouts.healthcarelayout')
@section('content')

<h3>Provider Registration</h3>

<form action="javascript:void(0);" id="hpform" name="hpform" class="form-label-left" method="post"  role="form" >
        <div class="col-lg-12 col-sm-12  col-sx-12 m-t-xl registration-wrap left no-pad">
            <div id="message"  class="hide col-lg-12 col-sm-12 col-sx-12">
                <div id="message-text"></div>
            </div> 
           <p>
               Are you an authorised healthcare provider in your area? If yes register here and get clients from around the world. Get the clients from your local area or seeking help in the area of your expertise.
<!--               You or your receptionist can talk to-->
           </p>
            <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                    <label>First Name</label> 
                    <input  id="healthcare_professional_first_name" name="healthcare_professional_first_name"  required="required" title="First Name" class="form-control" type="text">
                </div>
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad  left-pad">
                    <label>Middle Name</label> 
                    <input  id="healthcare_professional_middle_name" name="healthcare_professional_middle_name"   title="Middle Name" class="form-control" type="text">
                </div>
                
            </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                    <label>Last name</label> 
                    <input  id="healthcare_professional_last_name" name="healthcare_professional_last_name"  required="required" title="Last Name" class="form-control" type="text">
                </div>           
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item left-pad">
                    <label>Email Address</label> 
                    <input id="healthcare_professional_email_address" name="healthcare_professional_email_address" required="required" title="Email" class="form-control" type="email">
                 </div>               
           </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                    <label>Password</label> 
                    <input id="healthcare_professional_password" name="healthcare_professional_password" required="required" title="Password" class="form-control" type="password">
                </div>
                 <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item left-pad">
                    <label>Repeat Password</label> 
                    <input  id="healthcare_professional_password2"  data-validate-linked="healthcare_professional_password" name="healthcare_professional_password2"  required="required" title="Repeat Password" class="form-control"  type="password">
                </div> 
           </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                    <label>Country</label> 
                    <?php if(count($country)>0){ ?>
                     <select class="form-control required" name="healthcare_professional_country" title="Country"  id="healthcare_professional_country" onchange="javascript:getCountryState(this);">
                                 <option value="" >Select Country</option>
                                <?php 
                                foreach($country as $val){  ?>
                                <option value="<?php echo $val['country_id'];?>" phone_code="<?php echo $val['phone_code'];?>"><?php echo $val['countryname'];?></option>
                           <?php } ?>
                    </select>
                    <?php } ?>
                </div>  
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad  left-pad">
                    <label>State</label>
                    <div  id="state_1" class="item">
                        <select class="form-control required" name="healthcare_professional_state_select" title="State"  id="healthcare_professional_state_select"></select>
                    </div>                                       
                    <div style="display:none" id="state_2" class="item"></div>
                </div>               
           </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                   <label>City/Area</label> 
                   <input  id="healthcare_professional_city" name="healthcare_professional_city"   title="City" class="form-control"  type="text" required="required">
                </div>               
                <div class="form-group col-lg-6 col-sm-6 col-xs-12 no-pad  left-pad">
                    <label>Phone</label> 
                    <div class="col-lg-12 col-sm-12 col-xs-12 no-pad">
                        <div class="col-lg-4 col-sm-4 col-xs-4 item no-pad">
                            <input id="healthcare_professional_phone_code" name="healthcare_professional_phone_code" value=""   maxlength="13" required="required" title="code" class="form-control" type="text"> 
                        </div>
                        <div class="col-lg-8 col-sm-8 col-xs-8 item left-padr0">
                            <input id="healthcare_professional_phone_number" name="healthcare_professional_phone_number" value="" max="9999999999999"  maxlength="13" required="required" title="Phone" class="form-control" type="number"> 
                        </div>

                    </div>


                </div>               
           </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad item right-pad">
                    <label>Zipcode</label> 
                    <input  id="healthcare_professional_zip_code" name="healthcare_professional_zip_code"  required="required" title="Zipcode" class="form-control"  maxlength="11"  type="text">
                </div>
                <div class="form-group col-lg-6 col-sm-6 col-sx-12 no-pad left-pad">
                   <!-- <label>                                            
                   Can't read the image? click <a href='javascript: refreshCaptcha();'>here</a> to refresh.
               </label> -->
               <div class="item">
               <input id="token" name="recap_token" type="hidden" >
               </div>
               <!-- <span class="col-lg-12 col-sm-12 col-sx-12 m-t no-pad">
                  <img src="<?php echo asset('js/captcha.php?rand='.rand()); ?>" id='captchaimg'> 
               </span>

               <div class="alertuck col-lg-12 col-sm-12 col-sx-12" id="captcher" ></div> -->
                </div>                
           </div>
           <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
            <div class="col-lg-12 col-sm-12 col-sx-12 no-pad">
               <div class="form-group col-lg-12 col-sm-12 col-sx-12 no-pad item right-pad">    
                   <input  id="terms" name="terms" value="1" required="required" title="Terms & Conditions" type="checkbox" />  
                   <span>I agree to Doctorbuddy 
                       <a href="javascript:void(0);"  onclick='window.open("<?php echo asset('home/contents/terms-conditions-provider'); ?>");'>Terms & Conditions</a>
                       , 
                       <a href="javascript:void(0);"  onclick='window.open("<?php echo asset('home/contents/privacy-policy'); ?>");'>Privacy Policy</a> 
                   </span>
               </div>
            </div>
               <div class="col-lg-12 col-sm-12 col-xs-12 no-pad">
                    <button type="submit"  onclick="return validate_hp();" title="Register"  class="btn btn-red" role="button">Register</button>                   
               </div>   
               
           </div>
        </div>                                    
                    
    </form>    

<script src="<?php echo asset('js/healthcare_professional/register.js'); ?>"></script>


<!-- recaptcha -->
<script>
        grecaptcha.ready(function() {
                grecaptcha.execute('6LcVZLoZAAAAADPgYh-VCDLK1BV3DV3vO8zF8kLB', {action: 'customer'}).then(function(token) {
                    console.log(token);    
                    document.getElementById('token').value = token;
                });
        });
</script>
<!-- end -->

@stop
