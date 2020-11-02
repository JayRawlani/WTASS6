<?php
  include("connection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Insert Data</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- bootstrap css -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
      .form-container{
          background-color: #eaeaea;
          padding: 50px 20px; 
          -webkit-box-shadow: 1px 3px 10px -4px rgba(0,0,0,0.75);
          -moz-box-shadow: 1px 3px 10px -4px rgba(0,0,0,0.75);
          box-shadow: 1px 3px 10px -4px rgba(0,0,0,0.75);
          margin-top: 12vh;
      }

      input[type="text"]{
        padding:14px;
      }

      .success-text{
        color:green;
      }

      .error-text{
        color:red;
      }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><strong>Student's form</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="read.php">Registrant list</a>
      </li>
    </ul>
  </div>
</nav>
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
       <div class="col-lg-4 form-container">
         <h4 class="text-center">Student form</h4>
         <!-- form start here -->
          <form method="post" action="" enctype="multipart/form-data">
          <div class="form-group">
           <label>*Roll no:</label>
           <input class="form-control"  type="text" name="rollno" placeholder="enter your roll no..">
          </div>
          
          <div class="form-group">
           <label>*Name:</label>
           <input class="form-control"  type="text" name="name" placeholder="enter your name..">
          </div>

          <div class="form-group">
           <label>*Class:</label>
           <input class="form-control"  type="text" name="class" placeholder="enter your class..">
          </div>

          <!-- submit button -->
           <input type="submit" class="btn btn-primary btn-block" name="submit" value="Submit">
         </form>
       </div>
       <div class="col-lg-4"></div>
    </div><!-- row closed -->
</div><!-- container closed --> 

 <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      //getting form input values
       $rollno = $_POST["rollno"];
       $name = $_POST["name"];
       $class = $_POST["class"];

      //validation
      if($rollno!= "" && $name!= "" && $class!= ""){
        // sql statement
        $sql = "INSERT INTO students (rollno, name, class) VALUES ('$rollno','$name','$class')";
        $data = mysqli_query($conn,$sql);
         if($data){
          echo "<p class='text-center success-text mt-2'>Your details have been submitted</p>";
         }
      }
      else{
        echo "<p class='text-center error-text mt-2'>*All fields are Required</p>";
      }
    }
?>
</body>
</html>