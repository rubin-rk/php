<?php

$connect=mysqli_connect("localhost","root","","tamilhacks")or die("connection Failed");
if(!empty($_POST['save']))
{
	$username=$_POST['uname'];
	$password=$_POST['upswd'];
	$query="select * from register where uname1='$username' and upswd1='$password'";
	$result=mysqli_query($connect,$query);
	$count=mysqli_num_rows($result);
	if($count>0){
		echo "<script>alert('Login successfully')</script>";






	echo	" <head>
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
  background: linear-gradient(white,lightgreen,skyblue);
  -webkit-background-size: cover;
  padding: 10px 30px;
  position: absolute;
  transform: translate(10%, -30%);
  box-sizing: border-box;
  top: 50%;
  left:10%;
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
input[type='text'],input[type='password'],input[type='email'],input[type='number'],input[type='date']
{
  background: transparent;
  border: none;
  outline: none;
  border-bottom: 1px solid #FFF;
  height: 40px;
  color: black;
  font-size: 16px;
  margin-top: 10px;
}
input[type='date']{
  color: black;
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
  color: black;
}
p{
  color:black;
  font-weight: bold;
}
    </style>
    <script type='text/javascript'>
        function myfun() {
        var uname1= document.getElementById('Firs_name').value;
             var email1=document.getElementById('Last_name').value;
             var upswd1=document.getElementById('Dob').value;
             var upswd2=document.getElementById('Gender').value;
             var Section=document.getElementById('Section').value;
             var Standard=document.getElementById('Standard').value;
             var Email=document.getElementById('Email').value;
             var Mobile_no=document.getElementById('Mobile_no').value;


        if(uname1==null || uname1=='' ){
                  document.getElementById('errorBox').innerHTML =
                   'enter the First name';
                 return false;
        }

        if(email1==null || email1==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the Last_name';
                 return false;
        }

        if(upswd1==null || upswd1=='' ){
                  document.getElementById('errorBox').innerHTML =
                   'enter the Dob';
                 return false;
        }

        if(upswd2==null || upswd2==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the Gender';
                 return false;
               }
              if(Section==null || Section==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the section';
                 return false;
               }

                if(Standard==null || Standard==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the Standard';
                 return false;
               }
                if(Email==null || Email==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the Email';
                 return false;
               }

                if( Mobile_no==null ||  Mobile_no==''){
                  document.getElementById('errorBox').innerHTML =
                   'enter the  Mobile_no';
                 return false;
               }

                if (uname1 != '' && upswd1 != '' && upswd2 != '' && email1 != '' && Section !='' && Standard!='' && Email !='' && Mobile_no !='')


          alert('Register successfull');
                      
  }
    </script>
   
<body>


    <div class='box'>
    
        <h1>Please Fill This Form</h1>

        <form name='myform'  action ='stud.php' method='POST' >

            <p>First name</p>
            <input type='text' name='Firs_name' placeholder='Enter First Name' id='Firs_name'>

            <p>Last name</p>
            <input type='text' name='Last_name' placeholder='Enter Last Name' id='Last_name'>
              <p>Dob</p>
            <input type='date' name='Dob' placeholder='Enter The Dob' id='Dob'>
              <p>Gender</p>
            <input type='text' name='Gender' placeholder='Enter Gender' id='Gender'>
              <p>Section</p>
            <input type='text' name='Section' placeholder='Enter Section' id='Section'>
              <p>Standard</p>
            <input type='text' name='Standard' placeholder='Enter Standard' id='Standard'>
              <p>Email</p>
            <input type='Email' name='Email' placeholder='Enter Email' id='Email'>
              <p>Mobile no</p>
            <input type='number' name='Mobile_no' placeholder='Enter Mobile no' id='Mobile_no'>

           <div id='errorBox'></div>
          
            <input type='submit' name='' value='Update' id='update'  onclick='myfun()'>
          
        </form>
        
    </div>

    

</body>
</head>
</html>";

	}
	else
	{
		echo "<script>alert('Username and Password is wrong')</script>";
	}
}

?>