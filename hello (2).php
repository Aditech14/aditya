
<?php 
include 'Includes/dbcon.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/attnlg.jpg" rel="icon">
  <title>AMS - Login</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="css/ruang-admin.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <img src="img/logo/attnlg.jpg" style="width:100px;height:100px">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form class="user" method="Post" action="">
                    <div class="form-group">
                      <input type="text" class="form-control" required name="username" id="exampleInputEmail" placeholder="Enter Email Address">
                    </div>
                    <div class="form-group">
                      <input type="password" name = "password" required class="form-control" id="exampleInputPassword" placeholder="Enter Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <!-- <label class="custom-control-label" for="customCheck">Remember
                          Me</label> -->
                      </div>
                    </div>
                    <div class="form-group">
                        <input type="submit"  class="btn btn-primary btn-block" value="Login" name="login" />
                    </div>
                     </form>

<?php

  if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $password = md5($password);

    $query = "SELECT * FROM tblclassteacher WHERE emailAddress = '$username' AND password = '$password'";
    $rs = $conn->query($query);
    $num = $rs->num_rows;
    $rows = $rs->fetch_assoc();

    if($num > 0){

      $_SESSION['userId'] = $rows['Id'];
      $_SESSION['firstName'] = $rows['firstName'];
      $_SESSION['lastName'] = $rows['lastName'];
      $_SESSION['emailAddress'] = $rows['emailAddress'];
      $_SESSION['classId'] = $rows['classId'];
      $_SESSION['classArmId'] = $rows['classArmId'];

      echo "<script type = \"text/javascript\">
      window.location = (\"ClassTeacher/index.php\")
      </script>";
    }

    else{

      echo "<div class='alert alert-danger' role='alert'>
      Invalid Username/Password!
      </div>";

    }
  }
?>

                    <!-- <hr>
                    <a href="index.html" class="btn btn-google btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.html" class="btn btn-facebook btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  <hr>
                  <div class="text-center">
                    <a class="font-weight-bold small" href="classTeacherLogin.php">Class Teacher Login!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <a class="font-weight-bold small" href=".php">Cooperative Account!</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="font-weight-bold small" href="forgotPassword.php">Forgot Password?</a> -->

                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="js/ruang-admin.min.js"></script>
<!-- Code injected by live-server -->
<script type="text/javascript">
	// <![CDATA[  <-- For SVG support
	if ('WebSocket' in window) {
		(function () {
			function refreshCSS() {
				var sheets = [].slice.call(document.getElementsByTagName("link"));
				var head = document.getElementsByTagName("head")[0];
				for (var i = 0; i < sheets.length; ++i) {
					var elem = sheets[i];
					var parent = elem.parentElement || head;
					parent.removeChild(elem);
					var rel = elem.rel;
					if (elem.href && typeof rel != "string" || rel.length == 0 || rel.toLowerCase() == "stylesheet") {
						var url = elem.href.replace(/(&|\?)_cacheOverride=\d+/, '');
						elem.href = url + (url.indexOf('?') >= 0 ? '&' : '?') + '_cacheOverride=' + (new Date().valueOf());
					}
					parent.appendChild(elem);
				}
			}
			var protocol = window.location.protocol === 'http:' ? 'ws://' : 'wss://';
			var address = protocol + window.location.host + window.location.pathname + '/ws';
			var socket = new WebSocket(address);
			socket.onmessage = function (msg) {
				if (msg.data == 'reload') window.location.reload();
				else if (msg.data == 'refreshcss') refreshCSS();
			};
			if (sessionStorage && !sessionStorage.getItem('IsThisFirstTime_Log_From_LiveServer')) {
				console.log('Live reload enabled.');
				sessionStorage.setItem('IsThisFirstTime_Log_From_LiveServer', true);
			}
		})();
	}
	else {
		console.error('Upgrade your browser. This Browser is NOT supported WebSocket for Live-Reloading.');
	}
	// ]]>
</script></body>

</html>