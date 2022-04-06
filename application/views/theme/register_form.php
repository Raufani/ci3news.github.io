<!doctype html>
<html lang="en">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
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

                <div class="form-group">
                  <label>Email</label>
                  <input type="Email" class="form-control" id="username" placeholder="Type your email" >
                </div>

                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                
                <button class="btn btn-register btn-block btn-success">REGISTER</button>
              
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
      
        $(".btn-register").click( function() {
        
          //var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
          var username = $("#username").val();
          var password = $("#password").val();
          function validateEmail($username) {
            var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,6})+$/;
            return emailReg.test( $username );
          }

          if(username.length == "") {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Email must be fulfill !'
            });

          } else if (!validateEmail(username)){
  
            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Username must be email, include "@" char!'
            });
          } else if(password.length < 6) {

            Swal.fire({
              type: 'warning',
              title: 'Oops...',
              text: 'Password less than 6 character !'
            });

          } else {

            //ajax
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
                    text: 'Please login!'
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

                console.log(response);

              },

              error:function(response){
                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });
              }

            })

          }

        }); 

      });
    </script>

  </body>
</html>