
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-sitemap"></i> <?=$this->lang->line('panel_title')?></h3>

       
        <ol class="breadcrumb">
            <?php if($siteinfos->school_type == 'classbase') { ?>
                <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li><a href="<?=base_url("classes/index")?>"> <?=$this->lang->line('menu_classes')?></a></li>
                <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_classes')?></li>
            <?php } else { ?>
                <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
                <li><a href="<?=base_url("classes/index")?>"> <?=$this->lang->line('menu_department')?></a></li>
                <li class="active"><?=$this->lang->line('menu_edit')?> <?=$this->lang->line('menu_department')?></li>
            <?php } ?>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-10">
                <form class="form-horizontal" role="form" method="post">

                    <?php 
                        if(form_error('classes')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        
                        <label for="classes" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_name")?>
                        </label>
                        <div class="col-sm-6">
                            
                            <!--<select class="form-control select2" id="classes" name="classes">
                                <option  <?php if($classes->classes=='Lower Primary') { ?> selected <?php } ?> value="Lower Primary">Lower Primary</option>
                                 <option <?php if($classes->classes=='Upper Primary') { ?> selected <?php } ?> value="Upper Primary">Upper Primary</option>
                                  <option <?php if($classes->classes=='High School') { ?> selected <?php } ?> value="High School">High School</option>
                                   <option <?php if($classes->classes=='Tertiary') { ?> selected <?php } ?> value="Tertiary">Tertiary</option>
                                
                                
                            </select>-->
                            
                            <input type="text" class="form-control" id="classes" name="classes" value="<?=set_value('classes', $classes->classes);?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classes'); ?>
                        </span>
                    </div>

                    <?php 
                        if(form_error('classes_numeric')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="classes_numeric" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_numeric")?>
                        </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="classes_numeric" name="classes_numeric" value="<?=set_value('classes_numeric', $classes->classes_numeric);?>" >
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('classes_numeric'); ?>
                        </span>

                    </div>

                    <?php 
                        if(form_error('teacherID')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="teacherID" class="col-sm-2 control-label">
                            <?=$this->lang->line("teacher_name")?>
                        </label>
                        <div class="col-sm-6">
                            
                            <?php
                                $array = array();
                                $array[0] = $this->lang->line("classes_select_teacher");
                                foreach ($teachers as $teacher) {
                                    $array[$teacher->teacherID] = $teacher->name;
                                }
                                echo form_dropdown("teacherID", $array, set_value("teacherID", $classes->teacherID), "id='teacherID' class='form-control select2'");
                            ?>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('teacherID'); ?>
                        </span>
                    </div>


                    <?php 
                        if(form_error('note')) 
                            echo "<div class='form-group has-error' >";
                        else     
                            echo "<div class='form-group' >";
                    ?>
                        <label for="note" class="col-sm-2 control-label">
                            <?=$this->lang->line("classes_note")?>
                        </label>
                        <div class="col-sm-6">
                            <textarea style="resize:none;" class="form-control" id="note" name="note"><?=set_value('note', $classes->note);?></textarea>
                        </div>
                        <span class="col-sm-4 control-label">
                            <?php echo form_error('note'); ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <input id="updateclass" type="submit" class="btn btn-success" value="<?=$this->lang->line("update_class")?>" >
                        </div>
                    </div>

                </form>
            </div>    
        </div>
    </div>
</div>


<script>
$( ".select2" ).select2( { placeholder: "", maximumSelectionSize: 6 } );
</script>

