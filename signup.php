<?php
/**
 * Created by IntelliJ IDEA.
 * User: Vondieki27gmail.com
 * Date: 4/22/2018
 * Time: 7:55 PM
 */
include 'includes/inc.php';
if(isset($_POST['register']))
{   $activation_code=rand();
    $membership_status='0';
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $idno=$_POST['idno'];
    $mobile=$_POST['mobile'];
    $residence=$_POST['residence'];
    $email=$_POST['email'];
    $pwd=$_POST['pwd'];
    $encrypted_pwd=md5($pwd);
    $register="INSERT INTO members(fname,lname,idno,mobile,residence,email,pwd,membership_status,activation_code)VALUES('$fname','$lname','$idno','$mobile','$residence','$email','$encrypted_pwd','$membership_status','$activation_code')";
    if(mysqli_query($connect,$register))
    {
//        $message = "Your Activation Code is ".$activation_code."";
//        $to=$email;
//        $subject="Activation Code For Tourguide.org";
//        $from = 'ondiekistephen5@gmail.com';
//        $body='Your Activation Code is '.$activation_code.' Please Click On This link <a href="verification.php">Verify.php?code='.$activation_code.'</a>to activate your account.';
//        $headers = "From:".$from;
//        mail($to,$subject,$body,$headers);
//        echo "<div class='btn btn-success btn-block'>An Activation Code has been Sent To Your Email. Check your email to complete the registration</div>";
        echo "<div class='btn btn-success btn-block'>Conngratutions <b style='color: yellow'>".$fname. "</b> Your Account has been created successfully</div>";
    }
    else
    {
        echo "Oops! we are sorry an error occured in registration please try again";
    }

}
?>
    <div class="row" style="margin-top: 50px;">
        <div class="col-sm-2">

        </div><!--End of row-->
        <div class="col-sm-8">
            <form method="POST"action="index.php?signup"class="well"style="box-shadow: 4px 4px 6px 6px grey;" id="signupForm">
                <div class="row">
                    <div style="text-align: center;position: relative;top: -70px;">
                        <div class="panel-heading">
                            <div class="well"style="background-color:#4cb320;color: white;font-family: 'Lucida Bright';">
                                <h4>Register</h4>
                                <p>Please provide your personal information</p>
                            </div><!--End of well-->
                        </div><!--End of panel heading-->
                        <div class="panel-body"style="box-shadow: 2px 6px 6px 3px grey;margin: 10px;">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="fname"class="control-label">First Name</label>
                                    <input type="text"name="fname"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="lname"class="control-label">Last Name</label>
                                    <input type="text"name="lname"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="idno"class="control-label">Id Number</label>
                                    <input type="text"name="idno"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="mobile"class="control-label">Mobile Number</label>
                                    <input type="text"name="mobile"class="form-control"/>
                                </div><!--End of form group-->

                            </div><!--End of row-->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="residence"class="control-label">Place of Residence</label>
                                    <input type="text"name="residence"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="email"class="control-label">Email</label>
                                    <input type="email"name="email"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="password"class="control-label">Password</label>
                                    <input type="password"name="pwd"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <label for="cpassword"class="control-label">Confirm Password</label>
                                    <input type="password"name="cpwd"class="form-control"/>
                                </div><!--End of form group-->
                                <div class="form-group">
                                    <input type="submit"name="register"value="REGISTER"class="btn pull-right"style="background-color: #4cb320;padding: 15px 30px;color: white;margin-right: 20px;"/>
                                </div><!--End of form group-->

                            </div><!--End of col 6-->
                        </div><!--End of panel body-->
                    </div><!--End of div-->
                </div><!--End of row-->
            </form>
        </div><!--End of col-->
    </div><!--End of row-->