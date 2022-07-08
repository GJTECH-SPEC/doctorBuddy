@extends('layouts.adminlayout')
@section('content')

<?php
$templateObjs =$data['templateObjs'];
?>
<div class="">

    <div class="clearfix"></div>

    <div class="row">

        
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                
                <div class="x_title">
                    <?php if(isset($data['particularHpObj'])&& $data['particularHpObj'] !=''): ?>
                        <h3 class="pagehd"><?php echo $data['particularHpObj']->healthcare_professional_first_name." ".$data['particularHpObj']->healthcare_professional_last_name ?>'s Templates</h3>
                    <?php else: ?>
                        <h3 class="pagehd">Provider Templates</h3>
                    <?php endif ;?>
                    
                    <h2 class="pagehdbtn">
                        <a href="<?php echo $data['site_url'] ?>/admin/templates/add">
                            <i class="fa fa-plus fa-6" aria-hidden="true">&nbsp;Add Template</i>
                        </a> 
                        
                    </h2>
                    <div class="clearfix">  </div>

                </div>
                <?php if(Session::get('flash_msg') != ''){?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-success" id="" ><?php echo Session::get('flash_msg');?></div>
                </div>                               
                <?php } ?>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>
                                <th>Title</th>
                                <th>Assigned Provider(s)</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Option</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($templateObjs as $templateObj){ 

                                $hpObjs = DB::table('healthcare_professional_to_templates')
                                         ->leftjoin('healthcare_professional','healthcare_professional_to_templates.healthcare_professional_id','=','healthcare_professional.healthcare_professional_id')
                                         ->where('healthcare_professional_to_templates.communication_template_id','=',$templateObj->communication_template_id)
                                         ->get();
                                
                                $hpArr = array();
                                foreach ($hpObjs as $hpObj){
                                    $name = $hpObj->healthcare_professional_first_name;
                                    if($hpObj->healthcare_professional_middle_name !='')
                                        $name.=" ".$hpObj->healthcare_professional_middle_name;
                                    $name.=" ".$hpObj->healthcare_professional_last_name;
                                        
                                    $hpArr[] = $name;
                                }
                            ?>

                                <tr class="even pointer">
                                    <td>{{++$i}}</td>
                                    <td>{{$templateObj->template_title}}</td>
                                    <td><?php if(count($hpArr) >0) { echo implode("<br/>",$hpArr); } ?></td>
                                    <?php if($templateObj->template_status): ?>
                                    <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$templateObj->communication_template_id}}" title="Change Status" >
                                            <img src="<?php echo $data['site_url'] ?>/images/active.png"></a>    
                                    </td>
                                    <?php else : ?>
                                     <td class=" ">
                                        <a href="javascript:void(0);" class="status-change" record_id ="{{$templateObj->communication_template_id}}" title="Change Status" >
                                            <img src="<?php echo $data['site_url'] ?>/images/inactive.png"></a>    
                                    </td>
                                    <?php endif ?>
                                    
                                    <td><?php echo date(Config::get('constants.DATE_FORMAT'),strtotime($templateObj->create_date));?></td>
                                    <td>
                                        <a href="<?php echo $data['site_url'] ?>/admin/templates/edit/{{$templateObj->communication_template_id}}">
                                             <i aria-hidden="true" class="fa fa-pencil fa-4" title="Edit"></i>
                                        </a>
                                        
                                    <!-- Templates created by admin can assign to health care professions.
                                    But the templates created by healthcare profession can't able to assign to others -->    
                                    <?php if($templateObj->create_user_type =='ADMIN'): ?>                                        
                                        &nbsp;
                                        <a href="<?php echo $data['site_url'] ?>/admin/templates/assign_to_provider/{{$templateObj->communication_template_id}}">
                                             <i class="fa fa-hand-o-up fa-4" aria-hidden="true" title="Assign To Provider"></i>
                                        </a>
                                        &nbsp;
                                    <?php endif;?>   
                                        
                                        
                                        <a href="javascript:void(0);" delete_id ="{{$templateObj->communication_template_id}}" class="link-delete">
                                            <i class="fa fa-trash-o fa-4" aria-hidden="true" title="Delete"></i>
                                        </a>
                                    </td>
                                </tr>   
                            <?php } ?>
                        </tbody>

                    </table>
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
<script src="<?php echo asset('js/admin/provider_templates.js'); ?>"></script>
@stop

