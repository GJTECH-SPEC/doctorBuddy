@extends('layouts.adminlayout')
@section('content')

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Admin Staff</h3>
        </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    
                    <h3 class="pagehd">Admin Staff</h3>
                    <h2 class="pagehdbtn"><a href="../admin/add-staff">Add Admin Staff</a> </h2>
                    <div class="clearfix">  </div>
                    
                </div>
                <div class="x_content">
                    <table id="example" class="table table-striped responsive-utilities jambo_table">
                        <thead>
                            <tr class="headings">
                                <th>SL No.</th>                               
                                <th>Staff Email</th>
                                <th>Username</th>
                                <th>Admin Type</th>
<!--                                <th>Added Date</th>-->
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php 
                            $i = 0;
                            foreach($staffs as $staff){ 
                            ?>

                                <tr class="even pointer">
                                    <td class=" ">{{++$i}}</td>
                                    <td class=" ">{{$staff->admin_email_id}}</td>
                                    <td class=" ">{{$staff->username}}</td>                                    
<!--                                    <td class=" last"> @if(!$staff->admin_type){{$staff->username}}@endif</td> -->
                                    <td class=" "><?php echo $type =  ($staff->admin_type == '0') ?  'Admin': 'Staff';?> </td> 
<!--                                    <td class=" ">{{$staff->created_date}} </td>-->                                    
                                    <td><?php if($staff->admin_id>1){?><a href="../admin/edit-staff/{{$staff->admin_id}}"><button type="button" class="btn btn-primary">Edit</button></a><?php }?></td>
                                    <td><?php if($staff->admin_id>1){?>
                                    <a href="../admin/del-staff/{{$staff->admin_id}}" onclick="return confirm('Are you sure to delete this Staff?')"><button type="button" class="btn btn-delete">Delete</button></a><?php }?></td>
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

@stop