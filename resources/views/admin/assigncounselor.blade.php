@extends('layouts.adminlayout')
@section('content')
<?php
$caseFileObj =$data['caseFileObj'] ;
$counObjs =$data['counObjs'] ;
$alreadyAssignedCounsIds = $data['alreadyAssignedCounsIds'] ;
?>
<div class="">

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Assign Counselor(s) for the case <i><?php echo $caseFileObj->customer_nickname ?></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    
                    <div id="message"  class="hide item form-group">
                        <div id="message-text"></div>
                    </div>
                    <form action="javascript:void(0);" class="form-horizontal form-label-left" novalidate  method="post"  id="assign_counselor_form">
                        <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>    
                                <th></th>
                                <th>Name</th>                                
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Location</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($counObjs as $hpObj){ 
                            ?>

                                <tr class="even pointer">
                                    <td ><?php echo ++$i?></td>
                                    <td>
                                        <?php
                                        if(in_array($hpObj->counselors_id,$alreadyAssignedCounsIds)){
                                            $checked = "checked";
                                        }else{
                                            $checked = "";
                                        }

                                        ?>
                                        <input type="checkbox" name="counselors[]" id="counselors" value="<?php echo $hpObj->counselors_id ?>" <?php echo $checked ?>>
                                    </td>
                                    <td>
                                        <?php 
                                        $name = $hpObj->counselors_firstname;
                                        if($hpObj->counselors_firstname !=''){
                                            $name .= " ".$hpObj->counselors_middlename;
                                        }
                                        $name .= " ".$hpObj->counselors_lastname;
                                        echo $name;
                                        ?>
                                    </td>
                                    <td ><?php echo $hpObj->counselors_email_id; ?></td>   
                                    <td ><?php echo $hpObj->counselors_phone_code.$hpObj->counselors_phone; ?></td>
                                    <td ><?php echo $hpObj->counselors_designation; ?></td>  
                                    <td >
                                        <?php
                                        $address =array();
                                        if($hpObj->counselors_city !='')
                                            $address[] = $hpObj->counselors_city;
                                        
                                        if($hpObj->counselors_state !='')
                                            $address[] = $hpObj->counselors_state;
                                        
                                        $address[] = $hpObj->countryname;
                                        $addressStr = implode(",", $address);
                                        
                                         if($hpObj->counselors_zip !='')
                                            $addressStr .=  "<br/>".$hpObj->counselors_zip;
                                         echo $addressStr;

                                        ?>
                                    </td>  
                                    <td>
                                        <a href="<?php echo asset('admin/viewcounselor/'.$hpObj->counselors_id)?>" target="_blank">
                                            <i class="fa fa-eye fa-4" aria-hidden="true" title="More Details"></i>
                                        </a>
                                        &nbsp;
                                    </td>
                                   
                                </tr>   
                            <?php } ?>
                        </tbody>

                    </table>
                        
                        

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo $data['site_url'] ?>/admin/casefiles"><button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button></a>
                                <button type="submit" class="btn btn-success" name="assign" id="assign" onclick="return assign_counselor();">Assign</button>
                                <input type="hidden" name="form_submit" value="save">
                                <input type="hidden" name="case_file_id"  id="case_file_id" value="<?php echo $caseFileObj->customer_detail_id ?>">
                               
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

        <br />
        <br />
        <br />

    </div>
</div>
<script>
 var SITE_URL = "<?php echo $data['site_url'] ?>";
</script>
<script src="<?php echo asset('js/admin/assign_counselor.js'); ?>"></script>

@stop
