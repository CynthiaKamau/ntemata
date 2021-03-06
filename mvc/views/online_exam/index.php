<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-slideshare"></i> <?=$this->lang->line('panel_title')?></h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
            <li class="active"><?=$this->lang->line('panel_title')?></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <?php
                    if(permissionChecker('online_exam_add')) {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('online_exam/add') ?>">
                        <i class="fa fa-plus"></i>
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>
                <?php } ?>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th ><?=$this->lang->line('slno')?></th>
                                <th ><?=$this->lang->line('online_exam_name')?></th>
                                <th><?=$this->lang->line('online_exam_published')?></th>
                                <th ><?=$this->lang->line('online_exam_payment_status')?></th>
                                <th ><?=$this->lang->line('online_exam_cost')?></th>
                                <?php if(permissionChecker('online_exam_edit') || permissionChecker('online_exam_delete') || permissionChecker('online_exam_view')) { ?>
                                    <th ><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($online_exams)) {$i = 0; foreach($online_exams as $online_exam) {
                                $showStatus = FALSE; 
                                if($usertypeID == '3') {
                                    if(inicompute($student)) {
                                        if((($student->classesID == $online_exam->classID) || ($online_exam->classID == '0')) && (($student->sectionID == $online_exam->sectionID) || ($online_exam->sectionID == '0')) && (($student->studentgroupID == $online_exam->studentGroupID) || ($online_exam->studentGroupID == '0')) && ($online_exam->published == '1') && (($online_exam->subjectID == '0') || (in_array($online_exam->subjectID, $userSubjectPluck)))) {
                                            $showStatus = TRUE;
                                            $i++; 
                                        }
                                    }
                                } else { 
                                    $i++; 
                                    $showStatus = TRUE;
                                }

                                if($showStatus) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>" >
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('online_exam_name')?>" >
                                        <?php
                                            if(strlen($online_exam->name) > 25)
                                                echo strip_tags(substr($online_exam->name, 0, 25)."...");
                                            else
                                                echo strip_tags(substr($online_exam->name, 0, 25));
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('online_exam_published')?>">
                                        <?php 
                                            if($online_exam->published == '1') {
                                                echo "<span class='btn btn-success btn-xs'>".$this->lang->line('online_exam_yes')."</span>";
                                            } else {
                                                echo "<span class='btn btn-danger btn-xs'>".$this->lang->line('online_exam_no')."</span>";
                                            } 
                                        ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('online_exam_payment_status')?>" class="white-space-nowrap">
                                        <?=($online_exam->paid == 1) ? $this->lang->line('online_exam_paid') : $this->lang->line('online_exam_free') ;?>
                                    </td> 
                                    <td data-title="<?=$this->lang->line('online_exam_cost')?>" class="white-space-nowrap">
                                        <?=($online_exam->paid == 1) ? number_format($online_exam->cost, '2') : number_format($online_exam->cost, '2');?> <?=$siteinfos->currency_code?>
                                    </td>
                                    <?php if(permissionChecker('online_exam_edit') || permissionChecker('online_exam_delete') || permissionChecker('online_exam_view')) { ?>
                                        <td data-title="<?=$this->lang->line('action')?>" class="white-space-nowrap">
                                            <?php echo btn_extra('online_exam/addquestion/'.$online_exam->onlineExamID, $this->lang->line('addquestion'), 'online_exam_add'); ?>
                                            <?php echo btn_edit('online_exam/edit/'.$online_exam->onlineExamID, $this->lang->line('edit')); ?>
                                            <?php echo btn_delete('online_exam/delete/'.$online_exam->onlineExamID, $this->lang->line('delete')); ?>
                                        </td>
                                    <?php } ?>
                                </tr> 
                            <?php } } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>