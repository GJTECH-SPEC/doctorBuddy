@extends('layouts.healthcarelayout')
@section('content')
<div class="cd-main-header">		
    <a class="cd-nav-trigger" href="#0">
        <span></span>
    </a>		
</div>
<main class="cd-main-content">
    @include('healthcare_professional.dashboardmenu')
    <div class="content-wrapper col-lg-9 col-sm-9 col-xs-12">
        
        <?php if($hpObj->healthcare_professional_status ==4) : ?>
            <div class="col-lg-12 col-sm-12 col-xs-12 ">
                <div class="warning-alert">Warning : Please complete your registration to access other areas.</div>
            </div>
        <?php endif ?>  
        
        <div class="col-lg-12 col-sm-12 col-xs-12 ">
        <div class="m-b">
          <h3>Assigned Cases</h3>
        </div>
        
        <div class="table-responsive">
            <table class="table display" width="100%" cellspacing="0" id="customer_casefile">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nick Name</th>
                    <!--<th>Sex</th>                    
                    <th>Country</th>-->
                    <th>Date</th>
                    <th>Status</th>
                    <th>Options</th>
                </tr>
            </thead>
            <tbody>
                <?php $i =0 ;?>
                <?php if(isset($data['caseFileObjs'])&& count($data['caseFileObjs']) > 0){ ?>
                    <?php foreach($data['caseFileObjs'] as $caseFileObj){ ?>
                <?php //echo '<pre>';print_r($customerinfo);?>
                        <tr>
                            <td><?php echo ++$i ?></td>
                            <td><?php echo ucfirst($caseFileObj->customer_nickname) ;?></td>
                           <!-- <td><?php echo $caseFileObj->customer_sex ?></td> 
                            <td><?php echo $caseFileObj->countryname ?></td>-->
                            <td><?php echo date(Config::get('constants.DATE_FORMAT'),strtotime($caseFileObj->created_at));?></td>
<!--                            <td><?php //echo $caseFileObj->healthcare_comment ?></td>  -->
<!--                            <td><?php if($caseFileObj->healthcare_charge) { echo "$ ". $caseFileObj->healthcare_charge; } ?></td> -->
                            <td><?php if($caseFileObj->payment_status) { echo "<span style='color:blue'>PAID</span>"; } ?></td>
                            
                            <td class="links">
                                <?php
                                 // just reusing already existing view  page
                                 $casefileToHealthcareId = $caseFileObj->casefile_to_healthcare_id;
                                 $val = 'casefile_id='.$casefileToHealthcareId;
                                 $key = urlencode(base64_encode($val));
                                 $link = asset('healthcare_professional/casefileview?key='.$key);
                                ?>
                                <a href="<?php echo $link ?>">Case file</a>
                                <br>
                                <a href="<?php echo asset('healthcare_professional/conversation/'.$casefileToHealthcareId) ?>">Conversation</a>
                            </td>
                        </tr>
                    <?php } ?>                        
                <?php }else{ ?>
                       <tr><td colspan="6" class="text-center">No reports to View</td></tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
        </div>      
        
    </div>
</main>

<script>
$(document).ready(function() {
    $('#customer_casefile').DataTable();
} );
</script>
@stop
