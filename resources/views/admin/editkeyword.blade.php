@extends('layouts.adminlayout')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Edit Keyword</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Keyword <small></small></h2>
                    <div class="clearfix"> </div>
                </div>
                <div class="x_content">
                    <br><br>
                    <form action="javascript:edit_keyword();" class="form-horizontal form-label-left" novalidate  method="post"  id="edit_keyword_form">
                        
                        <div id="message"  class="hide item form-group">
                            <div id="message-text"></div>
                        </div>
                        
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Keyword <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="keyword_name" class="form-control col-md-7 col-xs-12"  name="keyword_name" title="keyword_name" required="required" type="text" value="<?php echo $data['keywordObj']->keyword_name ?>">
                            </div>
                        </div>
                        <div class="form-group">
                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Status <span class="required">*</span>
                             </label>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                 <div class="radio">
                                     <label>
                                         <input <?php if($data['keywordObj']->keyword_status == 1){?>checked="checked" <?php } ?>value="1" id="keyword_status" name="keyword_status" type="radio"> Enable</label><label>
                                         <input <?php if($data['keywordObj']->keyword_status == 0){?>checked="checked" <?php } ?> value="0" id="keyword_status" name="keyword_status" type="radio"> Disable</label>
                                 </div>

                             </div>
                         </div>
                        
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <a href="<?php echo $data['site_url'] ?>/admin/keyword"><button type="button" class="btn btn-primary" name="cancel" id="cancel">Cancel</button></a>
                                <button type="submit" class="btn btn-success" name="edit" id="edit" href="edit_keyword">Update</button>
                                
                                <input type="hidden" name="form_submit" value="save">
                                <input type="hidden" name="keyword_id" id="keyword_id" value="<?php echo $data['keywordObj']->keyword_id ?>">
                                
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
<script src="<?php echo asset('js/admin/edit_keyword.js'); ?>"></script>

@stop
