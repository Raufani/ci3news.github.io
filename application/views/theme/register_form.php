<!doctype html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register Akun</title>
  </head>
  <body>

    <div class="container" style="margin-top: 50px">
      <div class="row">
        <div class="col-md-5 offset-md-3">
          <div class="card">
            <div class="card-body">
              <h2 class="form-signin-heading">Account Register</h2>
              <hr>
              <form class="form-signin" id=register-form action="<?php echo base_url('news/register'); ?>" method="post">
                <div class="form-group">
                  <label>Email</label>
                  <input type="Email" class="form-control" name="username" id="username" placeholder="Type your email" value="<?= set_value('username') ?>">
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?= set_value('password') ?>" required>
                  <p class="text-red"><?= form_error ('password'); ?></p>
                </div>
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="password" class="form-control" name="confpassword" id="confpassword" placeholder="Confirm Password" required>
                </div>
                
                <button class="btn btn-register btn-block btn-success">REGISTER</button>
              </form>
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
            Already have account? please<a href="<?php echo base_url() ?>news/login"> Login</a>
          </div>

        </div>
      </div>
    </div>

    

    <script>
      $(document).ready(function() {
        

       
        $("#register-form").validate({
          rules: {
            username:{
                required: true,
                email: true,
                minlength: 6,
                remote:{
                  async:false,
                  url: "<?= base_url() . 'news/username_validation'?>",
                  data: {
                      field: 'username',
                      value_current: function() { return $("input[name=username]").val(); }
                  }
                }
            },
            password:{
                required: true,
                minlength: 6,
                maxlength: 24,
            },
            confpassword : {
                //require : true, 
                equalTo : '#password'
            }
          },
          messages: {
            username: {
                required: "Please, input username",
                email: "Username must email",
                minlength: "Username at least 6 characters",
                remote: "Username already exits"
            },
            password: {
                required: "Please input password",
                minlength: "Password at least 6 characters",
                maxlength: "Password max length 24 characters"
            },
            confpassword : {
                  //required : "Please re-type your password",
                  equalTo : "Password unmatach"
            }

          },
          onfocusout: function(elem) {
              return this.element(elem);
          }
          
        });
        
        
        $(".btn-register").click( function() {
          if ($("#register-form").valid()) {


            var username = $("#username").val();
            var password = $("#password").val();
            //function validateEmail($username) {
            //  var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
            //  return emailReg.test( $username );
            //}

            $.ajax({

              url: "<?php echo base_url() ?>news/register_act",
              type: "POST",
              data: {
                  "username": username,
                  "password": password
              },

              success:function(response){

                if (response == "success") {

                  Swal.fire({
                    type: 'success',
                    title: 'Register Succesfull!',
                    text: 'Please login!',
                    timer: 3000
                    
                  });

                  $("#username").val('');
                  $("#password").val('');

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Register Fail!',
                    text: 'Please try again !'
                  });

                }

                //console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });
              }

            })
          }else{
            Swal.fire({
                  type: 'error',
                  title: 'Opps!',
                  text: 'Invalidate'
            });
          }
        
          //var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
          

        }); 
        $("#register-form .form-control").blur(function() {
            $("#register-form").valid();
        })
      });
    </script>

  </body>
</html>