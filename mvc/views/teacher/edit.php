
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa icon-teacher"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li><a href="<?=base_url("teacher/index")?>"><?=$this->lang->line('menu_teacher')?></a></li>
            <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_teacher')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
                   
                    <?php 
                        if(form_error('name')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacher_name" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_name")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" value="<?=set_value('name', $teacher->name)?>" >

                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('name'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('designation')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="designation" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_designation")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="designation"  placeholder="e.g. Head of STEM activities" name="designation" value="<?=set_value('designation', $teacher->designation)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('designation'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('dob')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="dob" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_dob")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="dob" name="dob" value="<?=set_value('dob', date("d-m-Y", strtotime($teacher->dob)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('dob'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('sex')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sex" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_sex")?>
                        </label>
                        <div class="col-sm-6">
                            <?php 
                                echo form_dropdown("sex", array($this->lang->line('teacher_sex_male') => $this->lang->line('teacher_sex_male'), $this->lang->line('teacher_sex_female') => $this->lang->line('teacher_sex_female')), set_value("sex", $teacher->sex), "id='sex' class='form-control'"); 
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('sex'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('religion')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="religion" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_religion")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="religion" name="religion" value="<?=set_value('religion', $teacher->religion)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('religion'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('email')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="email" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_email")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="email" name="email" value="<?=set_value('email', $teacher->email)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('email'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('phone')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="phone" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_phone")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone" name="phone" value="<?=set_value('phone', $teacher->phone)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('phone'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('address')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="address" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_address")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="address" name="address" value="<?=set_value('address', $teacher->address)?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('address'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('jod')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="jod" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_jod")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jod" name="jod" value="<?=set_value('jod', date("d-m-Y", strtotime($teacher->jod)))?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('jod'); ?>
                        </span>
                    </div>

                    <?php
                        if(form_error('photo'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="photo" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_photo")?>
                        </label>
                        <div class="col-sm-6">
                            <div class="input-group image-preview">
                                <input type="text" class="form-control image-preview-filename" disabled="disabled">
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                        <span class="fa fa-remove"></span>
                                        <?=$this->lang->line('teacher_clear')?>
                                    </button>
                                    <div class="btn btn-success image-preview-input">
                                        <span class="fa fa-repeat"></span>
                                        <span class="image-preview-input-title">
                                        <?=$this->lang->line('teacher_file_browse')?></span>
                                        <input type="file" accept="image/png, image/jpeg, image/gif" name="photo"/>
                                    </div>
                                </span>
                            </div>
                        </div>

                        <span class="col-sm-4">
                            <?php echo form_error('photo'); ?>
                        </span>
                    </div>
                    
                    
                    
                     <?php
                        if(form_error('sectionID'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="sectionID" class="col-sm-2 control-label">
                            <?=$this->lang->line("class_stream")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                        <select class="form-control select2" name="sectionID[]" id="sectionID" multiple>
                            
                            <option value="">Select Class & Stream</option>
                            <?php
                            
                            $section_list=$teacher->section_list;
                          $sectionlist=explode(',',$section_list);
                             foreach ($class_streams as $class_streams) {
                                 $sectionID=$class_streams->sectionID;
                                 ?>
                                 <option <?php if (in_array($sectionID, $sectionlist)) { ?> selected <?php } else {  ?> <?php } ?>  value="<?php echo $class_streams->sectionID; ?>"><?php echo $class_streams->section;  ?></option>
                                 
                            <?php
                             }
                             ?>
                        </select>           
                    
                         
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('sectionID'); ?>
                        </span>
                    </div>
                    
                      <?php
                        if(form_error('subjectID'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjectID" class="col-sm-2 control-label">
                            <?=$this->lang->line("subjects_name")?> <span class="text-red">*</span>
                        </label>
                        <div class="col-sm-6">
                            <select class="form-control select2" name="subjectID[]" id="subjectID" multiple>
                            
                            <option value="">Select Subject</option>
                            <?php
                            
                            $subjects_list=$teacher->subjects_list;
                          $subjectslist=explode(',',$subjects_list);
                             foreach ($subjectlist as $subjectlist) {
                                 $subjectID=$subjectlist->subjectID;
                                 ?>
                                 <option <?php if (in_array($subjectID, $subjectslist)) { ?> selected <?php } else {  ?> <?php } ?>  value="<?php echo $subjectlist->subjectID; ?>"><?php echo $subjectlist->subject;  ?></option>
                                 
                            <?php
                             }
                             ?>
                        </select> 
                            
                            
                            
                         
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('subjectID'); ?>
                        </span>
                    </div>
                    
                    
                        <?php
                        if(form_error('subjects_type'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjects_type" class="col-sm-2 control-label">
                            <?=$this->lang->line("subjects_type")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subjects_type" name="subjects_type" value="<?=set_value('subjects_type',$teacher->subjects_type)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('subjects_type'); ?>
                        </span>
                    </div>
                    
                    
                    
                    <?php
                        if(form_error('subjects_code'))
                            echo "<div class='form-group has-error' >";
                        else
                            echo "<div class='form-group' >";
                    ?>
                        <label for="subjects_code" class="col-sm-2 control-label">
                            <?=$this->lang->line("subjects_code")?> 
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="subjects_code" name="subjects_code" value="<?=set_value('subjects_code',$teacher->subjects_code)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('subjects_code'); ?>
                        </span>
                    </div>
                    
                    

                    <?php 
                        if(form_error('username')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="username" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_username")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="username" name="username" value="<?=set_value('username', $teacher->username)?>" >
                        </div>
                         <span class="col-sm-4 control-label">
                            <?php echo form_error('username'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input type="submit" class="btn btn-success" value="<?=$this->lang->line("update_teacher")?>" >
                        </div>
                    </div>

                </form>
            </div><!-- col-sm-8 --> 
        </div>
    </div>
</div>
<script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
</script>

<script type="text/javascript">
$('#dob').datepicker({ startView: 2 });
$('#jod').datepicker();

$(document).on('click', '#close-preview', function(){ 
    $('.image-preview').popover('hide');
    // Hover befor close the preview

    $('.image-preview').hover(
        function () {
           $('.image-preview').popover('show');
           $('.content').css('padding-bottom', '120px');
        }, 
         function () {
           $('.image-preview').popover('hide');
           $('.content').css('padding-bottom', '20px');
        }
    );    
});

$(function() {
    // Create the close button
    var closebtn = $('<button/>', {
        type:"button",
        text: 'x',
        id: 'close-preview',
        style: 'font-size: initial;',
    });
    closebtn.attr("class","close pull-right");
    // Set the popover default content
    $('.image-preview').popover({
        trigger:'manual',
        html:true,
        title: "<strong>Preview</strong>"+$(closebtn)[0].outerHTML,
        content: "There's no image",
        placement:'bottom'
    });
    // Clear event
    $('.image-preview-clear').click(function(){
        $('.image-preview').attr("data-content","").popover('hide');
        $('.image-preview-filename').val("");
        $('.image-preview-clear').hide();
        $('.image-preview-input input:file').val("");
        $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
    }); 
    // Create the preview image
    $(".image-preview-input input:file").change(function (){     
        var img = $('<img/>', {
            id: 'dynamic',
            width:250,
            height:200,
            overflow:'hidden'
        });      
        var file = this.files[0];
        var reader = new FileReader();
        // Set preview image into the popover data-content
        reader.onload = function (e) {
            $(".image-preview-input-title").text("<?=$this->lang->line('teacher_file_browse')?>");
            $(".image-preview-clear").show();
            $(".image-preview-filename").val(file.name);            
            img.attr('src', e.target.result);
            $(".image-preview").attr("data-content",$(img)[0].outerHTML).popover("show");
            $('.content').css('padding-bottom', '120px');
        }        
        reader.readAsDataURL(file);
    });  
});
</script>
