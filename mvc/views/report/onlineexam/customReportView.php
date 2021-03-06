<div class="box">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-user"></i> <?php echo $groups->title ?> Report</h3>
        <ol class="breadcrumb">
            <li><a href="<?=base_url("dashboard/index")?>"><i class="fa fa-laptop"></i> <?=$this->lang->line('menu_dashboard')?></a></li>
        </ol>
    </div><!-- /.box-header -->
    <!-- form start -->
    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div id="hide-table">
                    <table id="example1" class="table table-striped table-bordered table-hover dataTable no-footer">
                        <thead>
                            <tr>
                                <th class="col-sm-1">#</th>
                                <th class="col-sm-2">name</th>
                                <th class="col-sm-2"><?php echo $groups->title ?></th>
                                <th class="col-sm-1">image</th>
                                <th class="col-sm-1">Score</th>
                                <th class="col-sm-1">Total Mark</th>
                                <th class="col-sm-1">file</th>
                                <th class="col-sm-1">link</th>
                                <th class="col-sm-2"><?=$this->lang->line('action')?></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if(inicompute($onlineexams)) {$i = 1; foreach($onlineexams as $parent) { ?>
                                
                                <tr>

                                    <td data-title="<?=$this->lang->line('slno')?>">
                                        <?php echo $i; ?>
                                    </td>
                                    <td data-title="name">
                                        <?php if($parent->name){ ?>
                                            <?php echo $parent->name; ?>
                                        <?php } ?>
                                    </td>
                                    <td data-title="Essay">
                                        <?php if($parent->text){ ?>
                                            <?php echo $parent->text; ?>
                                        <?php } ?>
                                    </td>
                                    <td data-title="image">
                                        <?php if($parent->image){ ?>
                                            <?=profileimage($parent->image); ?>
                                        <?php } ?>
                                    </td>
                                    <td data-title="score">
                                        <?php if($parent->score){ ?>
                                            <?php echo $parent->score;  ?>
                                        <?php } ?>
                                    </td>
                                    <td data-title="score">
                                        <?php if($parent->totalMark){ ?>
                                            <?php echo $parent->totalMark; ?>
                                        <?php } ?>
                                    </td>
                                    <td data-title="file">
                                        <?php if($parent->file){ ?>
                                            <a class="btn btn-primary btn-xs" href="<?php echo base_url('uploads/images/'.$parent->file); ?>" target="_blank">Download</a>
                                        <?php } ?>
                                    </td>
                                    <td data-title="link">
                                        <?php if($parent->link){ ?>
                                            <a class="btn btn-primary btn-xs" href="<?php echo $parent->link ?>" target="_blank">Link</a>
                                        <?php } ?>
                                    </td>
                                    <td data-title="<?=$this->lang->line('action')?>">
                                        <?php if($parent){ ?>
                                            <button class="btn btn-success btn-xs mrg" onclick="newModal(<?php echo $parent->onlineExamUserStatus; ?>,<?php echo $parent->totalMark; ?>)" >Asses Essay</button>
                                            <a href="<?php echo base_url('report/custom_view/'.$parent->onlineExamUserStatus); ?>" class="btn btn-success btn-xs mrg">View</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php $i++; }} ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<form class="form-horizontal" style="display: none;" action="<?php echo base_url()?>report/custom/marked/" role="form" method="post" id="essays" enctype="multipart/form-data">
    <div class="modal fade in" aria-hidden="false" style="display: block;">
    <div class="modal-dialog " >
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close closeModal"  data-dismiss="modal"><span aria-hidden="true">??</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Add Marking</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="to" class="col-sm-4 control-label">
                        Award Marks
                    </label>
                    <div class="col-sm-2">
                        <input type="text" disabled class="form-control" id="totalMarking" name="totalMarking" value="">
                    </div>
                    <div class="col-sm-6">
                        <input type="text"  class="form-control" id="score" name="score" value="">
                        <input type="hidden"  class="form-control" id="onlineExamUserStatus" name="onlineExamUserStatus" value="">
                        <input type="hidden"  class="form-control" id="onlineExamTotalMark" name="onlineExamTotalMark" value="<?php echo $parent->totalMark; ?>">
                        <input type="hidden"  class="form-control" id="onlineExamPassMark" name="onlineExamPassMark" value="<?php echo $parent->percentage; ?>">
                        <input type="hidden"  class="form-control" id="groudId" name="groudId" value="<?php echo $groudId; ?>">
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="message" class="col-sm-4 control-label">Status</label>
                    <div class="col-sm-8">
                        <select class="form-control" name="status">
                            <option value="Pass">Pass</option>
                            <option value="fail">Fail</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default closeModal" style="margin-bottom:0px;" data-dismiss="modal">Close</button>
                <input type="submit"  class="btn btn-success" value="Send">
            </div>
        </div>
    </div>
    </div>
</form>
<script>
    function newModal(id,mark) {
        $('#essays').show();
        $('#onlineExamUserStatus').val(id);
        $('#totalMarking').val(mark);
        
    }
    $('.closeModal').click(function(){
        $('#essays').hide();
    });
  var status = '';
  var id = 0;
  $('.onoffswitch-small-checkbox').click(function() {
      if($(this).prop('checked')) {
          status = 'chacked';
          id = $(this).parent().attr("id");
      } else {
          status = 'unchacked';
          id = $(this).parent().attr("id");
      }

      if((status != '' || status != null) && (id !='')) {
          $.ajax({
              type: 'POST',
              url: "<?=base_url('parents/active')?>",
              data: "id=" + id + "&status=" + status,
              dataType: "html",
              success: function(data) {
                  if(data == 'Success') {
                      toastr["success"]("Success")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  } else {
                      toastr["error"]("Error")
                      toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": false,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "500",
                        "hideDuration": "500",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }
                  }
              }
          });
      }
  });
</script>