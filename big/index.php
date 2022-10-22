<?php

$uname1 = $_POST['uname1'] ;
$email1  = $_POST['email1'];
$upswd1 = $_POST['upswd1'];
$upswd2 = $_POST['upswd2'];




if (!empty($uname1) || !empty($email1) || !empty($upswd1) || !empty($upswd2) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "tamilhacks";

// echo " Create connection";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT email1 From register Where email1 = ? Limit 1";
  $INSERT = "INSERT Into register (uname1 , email1 ,upswd1, upswd2 )values(?,?,?,?)";
// echo "Prepare statement";
// //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email1);


     $stmt->execute();
     $stmt->bind_result($email1);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
     // echo $rnum;
     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssss", $uname1,$email1,$upswd1,$upswd2);
      $stmt->execute();
      echo "<head>
<title>Login Form Design</title>
<style type='text/css'>
    body{
    margin: 0;
    padding: 0;
    background: url(b2.jpg)no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-backgoround-size: cover;
    -o-background-size: cover;
    background-blend-mode: darken;
}
.box{

    -webkit-background-size: cover;
    padding: 100px 30px;
    position: absolute;
    transform: translate(10%, -30%);
    box-sizing: border-box;
    top: 50%;
    left:60%;
}
.user{
    width: 100px;
    height: 100px;
    position: absolute;
    top: -50px;
    border-radius: 50px;

}
input{
    width: 100%;
    margin-bottom: 10px;

}
input[type='text'],input[type='password'],input[type='email']
{
    background: transparent;
    border: none;
    outline: none;
    border-bottom: 1px solid #FFF;
    height: 40px;
    color: #FFFFFF;
    font-size: 16px;
    margin-top: 10px;
}
input[type='submit']{
    background: #005A9C;
    border-radius: 15px;
    height: 40px;
    border: none;
    outline: none;
    color: #FFF;
    margin-top: 10px;
}
input[type='submit']:hover{
    cursor: pointer;
    background: #0000FF;

}
a{
    text-decoration: none;
    font-size: 16px;
    line-height: 20px;
    color: #FFF;
}
a:hover{
    color: yellow;
}
h1{
    color: #FFF;
}
p{
    color: #FFF;
    font-weight: bold;
}
</style>
    </head>
    <script>

    function myfunction(){
        var un=document.forms['myform']['uname'].value;
        var pw=document.forms['myform']['upswd'].value;
        if(un=='student'&& pw='1234'){
            window.location.href='student.html';

        }
        else
        {
            alert('invalid Username and password');
        }
    }
    </script>
    

<body>


    <div class='box'>

    <img src='user.png' class='user'>

        <h1>Login Here</h1>

       

            <p>Username</p>
            <input type='text' name='uname' placeholder='Enter Username '>

            <p>Password</p>
            <input type='password' name='upswd' placeholder='Enter Password'>


             <form name='myform' action='student.html' method='GET'>
            <input type='submit' name='' value='Login' onclick='myfunction()' >
            </form>

            <br><br>
            <a href='register.html'>Register for new account ?</a>

        </form>
        
    </div>

    

</body>
</html>";



      // echo '<script>alert("Insert successfully")</script>';      

     } else {
       echo '<script>alert("Someone already register using this email")</script>';
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}

?>

