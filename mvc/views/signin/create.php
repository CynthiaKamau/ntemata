<?php echo doctype("html5"); ?>
<html class="white-bg-login" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title>Create Account</title>

    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url('assets/bootstrap/bootstrap.min.css'); ?>" rel="stylesheet"  type="text/css">
    <link href="<?php echo base_url('assets/bootstrap/bootstrap-grid.min.css'); ?>" rel="stylesheet"  type="text/css">
    <!-- font Awesome -->
    <link href="<?php echo base_url('assets/fonts/font-awesome.css'); ?>" rel="stylesheet"  type="text/css">
    <!-- Style -->
    <link href="<?php echo base_url('assets/inilabs/style.css'); ?>" rel="stylesheet"  type="text/css">
    <!-- iNilabs css -->
    <link href="<?php echo base_url('assets/inilabs/inilabs.css'); ?>" rel="stylesheet"  type="text/css">
    <link href="<?php echo base_url('assets/inilabs/responsive.css'); ?>" rel="stylesheet"  type="text/css">
</head>

<body style="height: 100%">

    <div class="container" style="height: 100%">
        <br>
         <div class="row">

             <div class="col-sm" style="display: flex; justify-content: center; align-items: center;">
                   <img src="uploads/images/site.png">
             </div>

             <div class="col-sm" style="background-color: darkblue; padding: 20px;">
<!--                     sign up form-->
                 <form method="post" action="<?= base_url() ?>CreateAccount/index" enctype="multipart/form-data">
                     <h4 style="color: #fff; font-weight: bold; padding: 20px;">School SignUp</h4>
                     <div class="form-group">
                        <input class="form-control" placeholder="Name of School" name="schoolName" type="text">
                     </div>
                     <div class="form-group">
                         <input class="form-control" placeholder="Email Address" name="schoolEmail" type="text">
                     </div>
                     <div class="form-group">
                         <input class="form-control" placeholder="Add Number of Teachers" name="schoolTeachers" type="text">
                     </div>
                     <div class="form-group">
                         <input class="form-control" placeholder="Add Number of Learners" name="schoolLearners" type="text">
                     </div>
                       <label style=" color: #fff;  font-weight: bold;">School Curriculum</label>
                     <div class="form-group">
                         <input type="checkbox"  name="schoolCurriculum[]" value="IGSCE " ><label style=" color: #fff;  font-weight: bold;"> &nbsp;&nbsp; IGSCE</label> &nbsp;
                        <input type="checkbox"  name="schoolCurriculum[]" value="8-4-4 " ><label style=" color: #fff;  font-weight: bold;"> &nbsp;&nbsp; 8-4-4</label>&nbsp;
                        <input type="checkbox"  name="schoolCurriculum[]" value="CBC   " ><label style=" color: #fff;  font-weight: bold;"> &nbsp;&nbsp; CBC</label>&nbsp;
                     </div>
                     <div class="form-group">
                         <label style="padding: 5px; color: #fff; padding: 20px; font-weight: bold;">Upload School Logo</label>
                         <input class="form-control"  name="schoolLogo" type="file">
                     </div>
                     <div class="form-group">
                         <label style="padding: 5px; color: #fff; padding: 20px; font-weight: bold;">Preferred Payment Method</label>
                         <select class="form-control" onchange="getpaytype();" id="payMethod" name="payMethod">
                             <option value="Visa">Visa</option>
                             <option value="M-Pesa">M-Pesa</option>
                             <option value="i-Pay">i-Pay</option>
                         </select>
                         <p id="paymentmethodtext" style="color:white; padding: 20px; font-weight: bold">This is Visa method</p>
                         
                     </div>
                     <div class="form-group">
                         <input class="btn btn-primary btn-block btn-lg" value="CREATE ACCOUNT" name="schoolSave" type="submit">
                     </div>
                     <div class="form-group">
                         <input class="btn btn-danger btn-block btn-lg" value="RESET" name=schoolSave type="reset">
                     </div>
                 </form>
             </div>

         </div>

    </div>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function getpaytype()
    {
        var value =$("#payMethod").val()
         if(value=='M-Pesa')
        {
             
            $("#paymentmethodtext").html('This Is M-Pesa method');
        }
         else  if(value=='i-Pay')
        {
         
            $("#paymentmethodtext").html('This Is i-Paya method');
        }
     
         else if(value=='Visa')
        {
          
            $("#paymentmethodtext").html('This Is visa method');
        }
        else 
        {
            
             $("#paymentmethodtext").html('This Is visa method');
        }
        
        
        
    }
</script>