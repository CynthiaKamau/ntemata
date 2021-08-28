<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-qrcode"></i> <?=$this->lang->line('panel_title')?></h3>


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
                   if(permissionChecker('question_bank_add')) {
                ?>
                <h5 class="page-header">
                    <a href="<?php echo base_url('question_bank/add') ?>">
                        <i class="fa fa-plus"></i>
                        <?=$this->lang->line('add_title')?>
                    </a>
                </h5>
                <?php } ?>
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th><?=$this->lang->line('slno')?></th>
                                 <th><?=$this->lang->line('question_bank_class')?></th>
                                
                                <th ><?=$this->lang->line('question_bank_question')?></th>
                                <th><?=$this->lang->line('question_bank_level')?></th>
                                <th ><?=$this->lang->line('question_bank_group')?></th>
                               <!-- <th ><?=$this->lang->line('question_bank_type')?></th>-->
                                <?php if(permissionChecker('question_bank_edit') || permissionChecker('question_bank_delete') || permissionChecker('question_bank_view')) { ?>
                                    <th><?=$this->lang->line('action')?></th>
                                <?php } ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(inicompute($question_banks)) {$i = 1; foreach($question_banks as $question_bank) { ?>
                                <tr>
                                    <td data-title="<?=$this->lang->line('slno')?>" >
                                        <?php echo $i; ?>
                                    </td>
                                     <td data-title="<?=$this->lang->line('question_bank_class')?>" >
                                       <?php 
                                       
                                       $class_stream=$question_bank->class_stream;
                                       $getclass=$this->db->query("select * from section where sectionID='$class_stream'")->result_array();
                                       echo $getclass[0]['section'];
                                       
                                       ?>
                                    </td>
                                   
                                    <td data-title="<?=$this->lang->line('question_bank_question')?>">
                                         <?php
                                            if(strlen($question_bank->question) > 60)
                                                echo substr(strip_tags($question_bank->question), 0, 60)."...";
                                            else
                                                echo strip_tags($question_bank->question);
                                        ?>
                                    </td>
                                     <td data-title="<?=$this->lang->line('question_bank_level')?>" >
                                        <?=isset($levels[$question_bank->levelID]) ? $levels[$question_bank->levelID]->name : ''; ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('question_bank_group')?>" class="white-space-nowrap">
                                        <?=isset($groups[$question_bank->groupID]) ? $groups[$question_bank->groupID]->title : ''; ?>
                                    </td>
                                    <!--<td data-title="<?=$this->lang->line('question_bank_type')?>" class="white-space-nowrap">
                                        <?=isset($types[$question_bank->typeNumber]) ? $types[$question_bank->typeNumber]->name : ''; ?>
                                    </td>--->
                                    <?php if(permissionChecker('question_bank_edit') || permissionChecker('question_bank_delete') || permissionChecker('question_bank_view')) { ?>

                                        <td data-title="<?=$this->lang->line('action')?>" class="white-space-nowrap">
                                            <?php echo btn_view('question_bank/view/'.$question_bank->questionBankID, $this->lang->line('view')) ?>
                                            <?php echo btn_edit('question_bank/edit/'.$question_bank->questionBankID, $this->lang->line('edit')) ?>
                                            <?php echo btn_delete('question_bank/delete/'.$question_bank->questionBankID, $this->lang->line('delete')) ?>
                                        </td>
                                    <?php } ?>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>