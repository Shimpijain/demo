<?php
session_start();
include("connection.php");
?>
<?php
  function filtername($field)
  {
    $field=filter_var(trim($field),FILTER_SANITIZE_STRING);
    if(filter_var($field,FILTER_VALIDATE_REGEXP,array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/"))))
    {
      return $field;
    }
    else
    {
      return FALSE;
    }
  }
  function filterString($field)
  {
    $field=filter_var(trim($field),FILTER_SANITIZE_STRING);
    if(!empty($field))
    {
      return $field;
    }
    else
    {
      return FALSE;
    }
  }

  $msgerr="";
   $fullname=$password=$Phoneno=$email="";
   if ($_SERVER["REQUEST_METHOD"]=="POST")
  {
        $fullname=filterName(test_input($_POST["fullname"]));
        $email=test_input(trim($_POST["email"]));        
        $Phoneno = test_input($_POST["phoneno"]);
        $password = test_input($_POST["password"]);
        
        if ($fullname==FALSE) 
        {
          $msgerr= "please enter a correct value";
        }        
        
        else{  
          $dupsql="select * from user where email=\"$email\"";
          $vals = mysqli_query($conn, $dupsql);          
          if(mysqli_num_rows($vals)>0){
            $msgerr = "You are already registered. Please Sign in.";
          }
          else{
            $sql="insert into user(Name,Email,Phoneno,password)values(\"$fullname\",\"$email\",\"$Phoneno\",\"$password\")";
                      if(mysqli_query($conn,$sql))
                      {
                        while($row=mysqli_fetch_array($vals))
                        {
                          $fullname=$row["fullname"];
                          echo $fullname;
                        }
                        $msg = "Registration successfully";
                        $fullname="";
                        $email="";                       
                        $Phoneno="";
                        $password="";
                        
                      header("Location:image.php"); 
                    }
                        
                      else
                      {
                        $msgerr = "Registration does not successfully";                        
                      }
          }  
                       
        }         
  }
  function test_input($data)
    {
      $data=trim($data);
      $data=stripcslashes($data);
      $data=htmlspecialchars($data);
      return $data; 
    }
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    body
    {
      background:url(http://localhost/shimpiproject/book_images/4.jpeg);
      background-size: cover;
    }
    .signup
    {
      border-radius: 5px;
      background:purple;
      padding: 20px;
      width: 420px;
      margin:auto;
      color: #fff;
      font-size: 16px;
      font-family: Verdana;
      margin-top: 100px;
      opacity: 0.6;
    }
    .signup h1
    {
      text-align: center;
      margin: 0;
      padding: 0;
      color: black;
    }
    .signup input[type=submit]
    {
      width: 300px;
      height: 40px;
      border:none;
      cursor: pointer;
      background-color: blur;
    }
    #fullname
    {
      width: 49%;
    }
    #email
    {
      width: 100%;
    }
    #username
    {
      width: 49%;
    }
    #password
    {
      width: 49.5;
    }
    #confrimpassword
    {
      width: 49%;
    }
    input[type=submit]:hover{
      background:lightblue;
      transition: 0.6s;
    }
    .error{
      color:red;
    }
    .success{
      color:green;
    }
  </style>
</head>
<body> 
    <div class="signup">
      <form method="POST" action="newuser.php">
          <table>
            <h1>Registration Here</h1>
            <span class="error"><?php echo $msgerr;?></span>
            <hr>
              <tr>
                <th align="right">Full Name:</th>
                <td align="left">
                <input type="text" name="fullname" value="<?php echo $fullname; ?>" placeholder="Enter your fullname" required><br>       
                </td>
              </tr>
              <tr>
                <th align="right">Email Id:</th>
                <td align="left">
                  <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter your emall" required><br>
                </td>
              </tr>
              <tr>
                <th align="right">Password:</th>
                <td align="left">
                  <input type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and atleast 8 or more characters" placeholder="Enter your password" required>                
                </td>
              </tr>
              <tr>
                <th align="right">Phone no:</th>
                <td align="left">
                  <input type="numaric" name="phoneno" placeholder="Phone no" value="<?php echo $Phoneno; ?>" required><br>                
                </td>
              </tr>
              <tr>
                <th>&nbsp;</th>
                <td align="left">
                  <input type="submit" value="Continue">
                </td>
              </tr>
            </table>
      </form><br>
       <center><font> Already have a account?<a href="login.php" style="color: lightblue;text-decoration: none;"> SIgn in. </a></font></center>
    </div>
  </center>
</body>
</html>
<?php
  mysqli_close($conn);
?>