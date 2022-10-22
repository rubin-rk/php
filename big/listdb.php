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
     p{
     	color: white;
     	margin-left: 25px;
     }
     input[type="date"]{
     	border: none;
     	background: none;
     	outline: none;
     	border-radius: 25px;
    
     	color: white;
     	padding: 10px 20px;
     }
     button{
     	background: none;
     	outline: none;
     	border: none;
     	padding: 10px 20px;
     	background: lightgreen;
     	border-radius: 15%;
     	font-weight: bold;
     }
      input[type="submit"]{
     		background: none;
     	outline: none;
     	border: none;
     	padding: 10px 20px;
     	background: lightgreen;
     	border-radius: 15%;
     	font-weight: bold;
     	margin-left: 35%;
     	margin-top: -55px;

     }
     </style>
<?php

$link =mysqli_connect('localhost','root','','tamilhacks');
if(!$link){
	die('connection error'.mysqli_connect_error());
}
else{
	// echo "success.<br>";
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


?>
<!DOCTYPE html>
<head>
<title>hi
</title>
</head>
<body>
	<form action="find.php" method="post">
	<p>Select Date</p>
	<input type="date" name="startDate" placeholder="Enter the Date" >
	<input type="date" name="endDate">
	<button name="search">Find</button>
</form>
<a href="student.html">
	<input type="submit" name="add" value="Add"></a>
	</body>
</html>
<?php

?>