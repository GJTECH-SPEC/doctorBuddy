<div class="rightoverlay-style-toggle">
    <i class="fa fa-indent" aria-hidden="true"></i>
</div>
<div class="rightoverlay-text-wrap">
    <div class="col-lg-12 left"><h4>Basic Info</h4></div>
    <div class="basic-wrap col-lg-12 no-pad">
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">Nickname</label>
        <label class="col-lg-7 ans"><?php if(isset($customer_data['customer_nickname'])){ echo $customer_data['customer_nickname'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">Gender(Sex) </label>
        <label class="col-lg-7 ans"><?php if(isset($customer_data['customer_sex'])){ echo $customer_data['customer_sex'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">Age Group</label>
        <label class="col-lg-7 ans"><?php if(isset($customer_data['customer_age'])){ echo $customer_data['customer_age'];}?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">I am here</label>
        <label class="col-lg-7 ans"><?php if(isset($customer_data['customer_for_whom'])){ echo $customer_data['customer_for_whom'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">Customer Height</label>
        <label class="col-lg-7 ans">
            <?php if(isset($customer_data['customer_height'])){ echo $customer_data['customer_height'];} ?>
            &nbsp;
            <?php if(isset($customer_data['customer_height_unit'])){ echo $customer_data['customer_height_unit'];} ?>
        </label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-5">Customer Weight</label>
        <label class="col-lg-7 ans">
            <?php if(isset($customer_data['customer_weight'])){ echo $customer_data['customer_weight'];} ?>
            &nbsp;
            <?php if(isset($customer_data['customer_weight_unit'])){ echo $customer_data['customer_weight_unit'];} ?>
        </label>
        </div>        

    </div>
    
    
    <div class="col-lg-12 left"><h4>symptoms</h4></div>
    <div class="symptom-box">
    	<div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">Known Disease</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['known_disease'])){ echo $customer_data['known_disease'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">Present medication</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['customer_present_medication'])){ echo $customer_data['customer_present_medication'];} ?></label>
        </div>
 
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">History of allergic reactions</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['customer_allergic_reaction'])){ echo $customer_data['customer_allergic_reaction'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">History of past illness</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['customer_past_illness_history'])){ echo $customer_data['customer_past_illness_history'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">Hereditary diseases</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['customer_hereditary_disease'])){ echo $customer_data['customer_hereditary_disease'];} ?></label>
        </div>
        <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">Medical Report</label>
        <label class="col-lg-12 ans"><?php if(isset($customer_data['customer_medicalreport'])){ echo $customer_data['customer_medicalreport'];} ?></label>
        </div>        
        
        
        <?php if(isset($sel_symptom) && count($sel_symptom)>0){ ?>
        <div class="col-lg-12 no-pad b1 tbp">
            <label class="col-lg-12 phy">Physical Symptoms </label>
             <?php foreach($sel_symptom as $key=>$symptoms){ ?>
            <div class="part-sep">
                <label class="col-lg-12 ans"><?php if(isset($symptoms['symptom_name'])) { echo $symptoms['symptom_name']; } ?></label>
                <label class="col-lg-12 ans med"><?php if(isset($symptoms['symptom_rate'])) { echo $symptoms['symptom_rate'];} ?></label>
                <label class="col-lg-12 ans"><?php if(isset($symptoms['customer_note'])) { echo $symptoms['customer_note']; } ?></label>
            </div>
             <?php  } ?>
        </div>
        <?php } ?>
        
    </div>
    <?php if(isset($customer_ans)&& count($customer_ans)>0){ ?>
    <div class="col-lg-12 left title-head"><h3>Intake for Psychosocial Assessment </h3></div>
    <?php foreach($customer_ans as $grp=>$ans){ ?>
    <div class="qus-box">
    <div class="col-lg-12 left"><h4><?php echo $grp;?></h4></div>
    <?php foreach($ans as $k=>$result){ ?>
    <div class="col-lg-12 no-pad b1 tbp">
        <label class="col-lg-12">
        <?php 
            $qn_remaindisp ='';
            if (strpos($result['question'],'OPTION') !== false) {
                $pos = strpos($result['question'],'OPTION');
                echo substr($result['question'],0,$pos-1);
                $qn_remaindisp = substr($result['question'],$pos+8);
            }else{
                echo $result['question'].":";  
            }
        ?> 
        </label>
        <label class="col-lg-12 ans-qus"> <?php echo $result['ans'];?> <?php if($qn_remaindisp != ''){ echo $qn_remaindisp; } ?></label>
        </div>
   </div>
    <?php } ?>
    <?php } ?> 
    <?php }?>
</div>     