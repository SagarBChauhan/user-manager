<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Material Dashboard by Creative Tim
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.js" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
      <div class="logo">
        <a href="#" class="simple-text logo-normal">
          User Management
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item   ">
              <a class="nav-link" href='Home.php'>
              <i class="material-icons">dashboard</i>
              <p>Home</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="View.php">
               <i class="fas fa-users"></i>
              <p>View Users data</p>
            </a>
          </li>
          <li class="nav-item active">
              <a class="nav-link" href="Add.php">
              <i class="fas fa-user-plus"></i>
              <p>Add User</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="User_Status.php">
             <i class="fas fa-user-times"></i>
              <p>Active-Deactive/Delete User</p>
            </a>
          </li>
          <li class="nav-item ">
              <a class="nav-link" href="Update.php">
             <i class="fas fa-user-edit"></i>
              <p>Update User</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="#pablo">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
              <li>
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a> 
              </li>
              <li class="nav-item dropdown">
                  <a class="dropdown-item" href="#"><i class="material-icons">logout</i> Log out</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add user</h4>
                  <p class="card-category">Complete profile</p>
                  <?php
                      if ($_SERVER["REQUEST_METHOD"] == "POST") 
                      {
                          if (isset($_POST["btn_Add"]))
                          {
                              if($_POST["gender"]=="Male")
                              {
                                  $gen=1;
                              }
                              elseif ($_POST["gender"]=="Female") 
                              {
                                  $gen=0;
                              }
                              include_once './Connection.php';
                              echo $fname=$_POST["fname"];
                              echo $mname=$_POST["mname"];
                              echo $lname=$_POST["lname"];
                              echo $city=$_POST["city"];
                              echo $gen."<br>";
                              echo $pin=$_POST["pin"];
                              echo $DOB=$_POST["DOB"];
                              echo $email=$_POST["emailid"];
                              echo $contact=$_POST["contact"];
                              echo $pass=$_POST["pass"];
                              //$query="INSERT INTO tbl_user (fName, mName, lName, gender, city, pincode, birthdate, email, contactNo, password) VALUES (Sagar, Bharatbhai, Chauhan, 1,Navsari, 472697, 2019-01-07, 16mscit006@gmail.com, 1234567891, sagar123);";
                             //$query="INSERT INTO tbl_user (fName, mName, lName, gender, city, pincode, birthdate, email, contactNo, password) VALUES ('$fname', '$mname', '$lname', '$gen', '$city', '$pin', '$DOB', '$email', '$contact', '$pass');";
                              $query="INSERT INTO tbl_user (fName, mName, lName, gender, city, pincode, birthdate, email, contactNo, password,status) VALUES ('".$_POST["fname"]."', '".$_POST["mname"]."', '".$_POST["lname"]."', '".$gen."', '".$_POST["city"]."', '".$_POST["pin"]."', '".$_POST["DOB"]."', '".$_POST["emailid"]."', '".$_POST["contact"]."', '".$_POST["pass"]."',1);";
                              $sql_insert = mysqli_query($con, $query);
                              if ($sql_insert)
                              {
                                  $last=$con->insert_id;
                                  
                                  echo "<p class='card-category text-success text-capitalize font-weight-bold'><i class='fab fa-connectdevelop'></i> Data Inserted <i class='fas fa-flag-checkered'></i></p>";
                                  header("location:view.php?id=".$last);
                              }
                              else
                              {
                                  echo ("<p class='card-category  text-warning text-capitalize font-weight-bold'><i class='fab fa-connectdevelop'></i> Data Insertion Failed <i class='fas fa-times'></i></p>").  mysqli_error($con);
                              }
                          }         
                      }
                  ?>
               </div>
                <div class="card-body">
                  <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" class="form-control" name="fname">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Middel Name</label>
                          <input type="text" class="form-control" name="mname">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" name="lname">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">Gender</label><br>
                          <input type="radio" name="gender" value="Male" >Male
                          <input type="radio" name="gender" value="Female" >Female
                        </div>
                      </div>
                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="bmd-label-floating">DOB</label>
                          <input type="date" class="form-control" name="DOB">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email" class="form-control" name="emailid">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Contact number</label>
                          <input type="text" class="form-control" name="contact">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" class="form-control" name="city">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" class="form-control" name="pin">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" class="form-control" name="pass">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" class="form-control" name="conPass">
                        </div>
                      </div>
                    </div>
                      <button type="submit" class="btn btn-primary pull-right" name="btn_Add">Add Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
      <footer class="footer">
        <div class="container-fluid">

          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="#" target="_blank">User</a>.
          </div>
        </div>
      </footer>
    </div>
  </div>
</body>

</html>
