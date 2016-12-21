<?php  

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

$dbcon=mysqli_connect("localhost","root","","users"); 

$ulazniJson = json_decode($_GET["loginbtn"], true);
$user_email=$ulazniJson[0]; 
$user_pass=$ulazniJson[1];

$sql="SELECT user_email, user_name FROM users WHERE user_email='$user_email'AND user_pass='$user_pass'";

$result=mysqli_query($dbcon,$sql);

if(mysqli_num_rows($result))  

    {  
		$json=array();

		while ($row = mysqli_fetch_array($result))
		{
			$bus=array(
				'user_email'=>$row['user_email'],
				'user_name'=>$row['user_name']
				);

			$json[]=$bus;		
		}

		echo json_encode($json,JSON_UNESCAPED_UNICODE);
		mysqli_close($dbcon);	
  
    }  
    //else  
    //{  
      //echo json_encode(0,JSON_UNESCAPED_UNICODE);
      //mysqli_close($dbcon);	
    //}  
?>