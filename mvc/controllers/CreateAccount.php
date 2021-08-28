<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class CreateAccount extends CI_Controller{


    public function __construct()
    {
          parent:: __construct();
          //loading database
        $this->load->database();
        //load model
        $this->load->model('CreateAccountModel');
        //sessions
        $this->load->library('session');
        	$this->load->model("systemadmin_m");

    }
    //inserting data
    public function index() {
        //loading view
        $this->load->view('signin/create');

        //checking submit button
        if ($this->input->post('schoolSave')){

              $image_name  = $_FILES['schoolLogo']['name'];
              $new_name = time()."".str_replace('','-',$image_name);
              $config = [
                   'upload_path' => './uploads/images',
                   'allowed_types' => 'gif|jpg|png|jpeg',
                   'file_name' => $new_name,

              ];
              $this->load->library('upload',$config);
              if (! $this->upload->do_upload('schoolLogo')){
                  $imageError = array('imageError' => $this->upload->display_errors());
                  echo $imageError;
              } else {
                  $schoolLogo = $this->upload->data('file_name');
                 $schoolCurriculum= $this->input->post('schoolCurriculum');
                $schoolName= $this->input->post('schoolName');
                 $schoolEmail=$this->input->post('schoolEmail');
                 $Curriculum=implode(",",$schoolCurriculum);
                 $currentdate=date('Y-m-d');
                 $currentdatetime=date('Y-m-d h:i:s');
                  $schoolLearners=$this->input->post('schoolLearners');
                  /* to set your amount calculation with learners */
                  
                  
                  $payableamount=$schoolLearners*1500;
                  
                  /* to set your amount calculation with learners end */
                  
                  $data = [
                      'schoolName' => $this->input->post('schoolName'),
                      'schoolEmail' => $schoolEmail,
                      'schoolTeachers' => $this->input->post('schoolTeachers'),
                      'schoolLearners' => $this->input->post('schoolLearners'),
                      'schoolCurriculum' => $Curriculum,
                      'payMethod' => $this->input->post('payMethod'),
                      'schoolLogo' => $schoolLogo,
                       'totalpayable_amount' => $payableamount
                  ];
                  
                  
                  
                  $schoolAccount = new CreateAccountModel;
                   $res = $schoolAccount->saveSchool($data);
               
                
                
                
                  if ($res == true){
                      
                      
                      $username="root_".$res;
                      
                      $password=$this->systemadmin_m->hash($username);
                      
                       $data2=[
                     'name' => $this->input->post('schoolName'),
                      'dob' =>'2020-01-01',
                      'sex' => 'Male',
                      'religion' => 'Christian',
                       'email' => $schoolEmail,
                         'phone' => '1234567890',
                         'address' => 'test address',
                         'jod' => $currentdate,
                          'address' => 'test address',
                          'photo' => 'default.png',
                          'username'=>$username,
                          'password'=>$password,
                           'usertypeID'=>'1',
                           'create_username'=>'root',
                            'create_date'=>$currentdatetime,
                            'modify_date'=>$currentdatetime,
                            'schoolid'=>$res,
                            'create_username'=>'root',
                            'create_userID'=>'1',
                            'create_usertype'=>'Admin',
							'active'=>'0',
                      ];
                      
                      
                      
                     $sysyadmindata = $this->CreateAccountModel->savesystemadmin($data2);
                    
                     
                      //send mail start
                      
                      
                      $config = array( 
			    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
			     'smtp_host' => 'mail.ntemata.io', 
			    'smtp_port' => 465,
			    'smtp_user' => 'support@ntemata.io',
			    'smtp_pass' => 'support2021?',
			   'mailtype' => 'html', //plaintext 'text' mails or 'html'
			 'charset' => 'iso-8859-1',
			    'wordwrap' => TRUE
			);
		           $this->load->library('email', $config);
		            $this->email->set_mailtype("html");
		            $this->email->set_newline("\r\n");
            $from_email = "support@ntemata.io";  

                //Email content
               
                
        // $messg = 'Wellcome, '. $firstname . ' ' . $lastname . '! Click the <strong><a href="'.base_url('/home/activeLogin/'. $verification_key).'">confirmation link</a></strong> to confirm your account.';
		
	$messg='
		<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular|"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
   
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#3aaff2" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size:35px; font-weight: 350; ">Welcome!</h1> <img src="https://dashboard.ntemata.io/uploads/images/site.png" width="200" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				
					 <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <b style="margin: 0;padding: 20px;    font-size: 21px;">Hello '.$schoolName.'</b>
                        </td>
                    </tr>
					<tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <br/>
                           <table  width="100%">
<tr>
<th align="left"  style="padding: 20px 30px 40px 30px;">Thank you for creating your ntemata account. <br> Please use the following details to make payments:  <br>                             
ACCOUNT NAME: FIREFLY EDTECH SOLUTIONS LIMITED  <br>
Account Number: 0100008352865 (KES)  <br>
Swift Code: SBICKENX  <br>
Bank & Branch Name: STANBIC BANK, THE HUB BRANCH  <br>
Bank & Branch Code:31030  <br>
PAYBILL: '.$payableamount.'  <br>
                     Once payment has been done use the following default credentials to login<br/>
                       username - '.$username.'</br/>
                      password -'.$username.'.
</th>

</tr>


</table>
                        </td>
                    </tr>
				
                    
                
                
					 <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
						 <p style="margin: 0;padding: 20px;font-size: 14px;">Thanks!
                           </p>
						    <b style="margin: 0;padding: 20px;font-size: 14px;">Support Team, Karibu@ntemata.io
                           </b>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#3aaff2" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="https://www.ntemata.io/" target="_blank" style="color: #ffffff;">talk with us</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
</body>

</html>
";';
		
		
		 

                $this->email->to($schoolEmail);  
                $this->email->from($from_email, 'Activate your ntemata account');
                $this->email->subject('Activate your ntemata account');
                $this->email->message($messg);
                      
                      
                      //send mail end
                      
                      
                      if($this->email->send())
				{
                      
                      $this->session->set_flashdata('status', '<div class="alert alert-info" style="background-color: #00388f;
    color: white;">Your account has been created successfully. Kindly check Your email and follow the instruction given.</div>' );
                      redirect('signin/index', 'refresh');
				}
                  } else {
                      echo "<h4 style='color: red;' padding: 20px;>Insert Error. Try again</h4>";

                  }


              }

        }
    }
     public function send_mail() { 
               //$this->load->library('email');   
            
   $config = array( 
			    'protocol' => 'mail', // 'mail', 'sendmail', or 'smtp'
			     'smtp_host' => 'mail.ntemata.io', 
			    'smtp_port' => 465,
			    'smtp_user' => 'support@ntemata.io',
			    'smtp_pass' => 'support2021?',
			   'mailtype' => 'html', //plaintext 'text' mails or 'html'
			 'charset' => 'iso-8859-1',
			    'wordwrap' => TRUE
			);
		           $this->load->library('email', $config);
		            $this->email->set_mailtype("html");
		            $this->email->set_newline("\r\n");
            $from_email = "support@ntemata.io";  

                //Email content
               
                
        // $messg = 'Wellcome, '. $firstname . ' ' . $lastname . '! Click the <strong><a href="'.base_url('/home/activeLogin/'. $verification_key).'">confirmation link</a></strong> to confirm your account.';
		
	$messg='
		<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <style type="text/css">
        @media screen {
            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 400;
                src: local("Lato Regular"), local("Lato-Regular|"), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: normal;
                font-weight: 700;
                src: local("Lato Bold"), local("Lato-Bold"), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 400;
                src: local("Lato Italic"), local("Lato-Italic"), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format("woff");
            }

            @font-face {
                font-family: "Lato";
                font-style: italic;
                font-weight: 700;
                src: local("Lato Bold Italic"), local("Lato-BoldItalic"), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format("woff");
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>
</head>

<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">
    <!-- HIDDEN PREHEADER TEXT -->
   
    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <!-- LOGO -->
        <tr>
            <td bgcolor="" align="center">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td align="center" valign="top" style="padding: 40px 10px 40px 10px;"> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#3aaff2" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                            <h1 style="font-size:35px; font-weight: 350; ">Welcome!</h1> <img src="https://dashboard.ntemata.io/uploads/images/site.png" width="200" height="120" style="display: block; border: 0px;" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
				
					 <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <b style="margin: 0;padding: 20px;    font-size: 21px;">Hello Mr. William Bandi, Principal.</b>
                        </td>
                    </tr>
					<tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                        <br/>
                           <table  width="100%">
<tr>
<th>Thank you for creating you ntemata account, Please use the following details to                               
                     make payments  MPESA Paybill 560980  Account Name Ntemata.
                     Once payment has been done use the following default credentials to login<br/>
                       username - admin</br/>
                      password -RHSF5678JHGDF
</th>

</tr>


</table>
                        </td>
                    </tr>
				
                    
                
                
					 <tr>
                        <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
						 <p style="margin: 0;padding: 20px;font-size: 14px;">Thanks!
                           </p>
						    <b style="margin: 0;padding: 20px;font-size: 14px;">the dashboard.ntemata.io team
                           </b>
                        </td>
                    </tr>
                    
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor="#f4f4f4" align="center" style="padding: 30px 10px 0px 10px;">
                <table border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width: 600px;">
                    <tr>
                        <td bgcolor="#3aaff2" align="center" style="padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: "Lato", Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;">
                            <h2 style="font-size: 20px; font-weight: 400; color: #111111; margin: 0;">Need more help?</h2>
                            <p style="margin: 0;"><a href="'.base_url().'" target="_blank" style="color: #ffffff;">We&rsquo;re here to help you out</a></p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        
    </table>
</body>

</html>
";';
		
		
		 

                $this->email->to('oderathegreat@gmail.com');  
                $this->email->from($from_email, 'Registraion Mail');
                $this->email->subject('Registraion Mail');
                $this->email->message($messg);
				if($this->email->send())
				{
				    echo "succee";
				}
				else
				{
				     echo $this->email->print_debugger();
				}
				
 
	
      } 

}