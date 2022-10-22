
<style>
  body{
    background: url(p1.png);
    background-blend-mode: darken;
  }
     .dbresult,.dbresult td,.dbresult th{
      border: 1px solid white;
      border-collapse: collapse;
      padding: 8px;
     }
     .dbresult{
      width: 800px;
      margin: auto;
     }
     .dbresult tr:nth-child(odd){
      background: linear-gradient(white,pink);
     }
     .dbresult tr:nth-child(even){
      background: radial-gradient(white,skyblue);
     }
     .dbresult th{
      background: black;
      color: white;
     }
     </style>
<?php

$Firs_name = $_POST['Firs_name'] ;
$Last_name  = $_POST['Last_name'];
$Dob = $_POST['Dob'];
$Gender = $_POST['Gender'];
$Section = $_POST['Section'];
$Standard = $_POST['Standard'];
$Email = $_POST['Email'];
$Mobile_no = $_POST['Mobile_no'];




if (!empty($Firs_name) || !empty($Last_name) || !empty($Dob) || !empty($Gender) || !empty($Section) || !empty($Standard) || !empty($Email) || !empty($Mobile_no))
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
  $SELECT = "SELECT Email From students Where Email = ? Limit 1";
  $INSERT = "INSERT Into students (Firs_name , Last_name ,Dob, Gender,Section, Standard,Email,Mobile_no)values(?,?,?,?,?,?,?,?)";   
// echo "Prepare statement";
// //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Email);


     $stmt->execute();
     $stmt->bind_result($Email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     
     // echo $rnum;
     //checking username
      if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssssss", $Firs_name,$Last_name,$Dob,$Gender,$Section,$Standard,$Email,$Mobile_no);
      $stmt->execute();

      //next

     //  <style>
     // .dbresult,.dbresult td,.dbresult th{
     //  border: 1px solid black;
     //  border-collapse: collapse;
     //  padding: 8px;
     // }
     // .dbresult{
     //  width: 800px;
     //  margin: auto;
     // }
     // .dbresult tr:nth-child(odd){
     //  background-color: #b2d0d6;
     // }
     // .dbresult tr:nth-child(even){
     //  background-color: lightcyan;
     // }
     // </style>
// <?php

$link =mysqli_connect('localhost','root','','tamilhacks');
if(!$link){
  die('connection error'.mysqli_connect_error());
}
else{
  echo "success.<br>";
}

$query ="SELECT Firs_name,Last_name,Dob,Gender,Section,Standard,Email,Mobile_no FROM students";
$result=mysqli_query($link,$query);
//check db rows
// print_r($result);
$numrow=mysqli_num_rows($result);
if($numrow>0){

  // echo $numrow.'Record found';


  echo '<table class="dbresult">';
  echo '<tr>';
  // echo '<th>Id</th>';
  echo '<th>First name</th>';
  echo '<th>Last name</th>';
  echo '<th>Dob</th>';
  echo '<th>Gender</th>';
  echo '<th>Section</th>';
  echo '<th>Standard</th>';
  echo '<th>Email</th>';
  echo '<th>Mobile no</th>';
  echo '</tr>';
  while($row=mysqli_fetch_assoc($result)){
    //pre tag using for aligment
    // echo "<pre>";

    //full row
    // print_r($row);
    echo '<tr>';
    // echo '<td>'.$row['id'].'</td>';
    echo '<td>'.$row['Firs_name'].'</td>';
    echo '<td>'.$row['Last_name'].'</td>';
    echo '<td>'.$row['Dob'].'</td>';
    echo '<td>'.$row['Gender'].'</td>';
    echo '<td>'.$row['Section'].'</td>';
    echo '<td>'.$row['Standard'].'</td>';
    echo '<td>'.$row['Email'].'</td>';
    echo '<td>'.$row['Mobile_no'].'</td>';
    echo '</tr>';
    

    // echo "</pre>";
  }
  echo '</table>';

}
else{
  echo "Record Not found";
}

    



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

