<?php	 
	$db=mysqli_connect("localhost","root","","imgs");

	header('Content-type: text/javascript');
	
	//$type=0;

	$type = json_decode($_GET["type"]);
	
		if ($type==0){
			$sql="SELECT image, SUBSTR(text, 1, 50), title FROM vijesti_tablica WHERE text IS NOT NULL
				LIMIT 1";
		}
		else{
			$sql="SELECT image, SUBSTR(text, 1, 50), title FROM vijesti_tablica WHERE type=$type AND WHERE text IS NOT NULL
				LIMIT 1";
		}	
		
		$result=mysqli_query($db,$sql);
		
		$json=array();

		while ($row = mysqli_fetch_array($result))
		{
			$bus=array(
				'image'=>$row['image'],
				'text'=>$row['text'],
				'title'=>$row['title']
				);

			$json[]=$bus;		
		}
		

		echo json_encode($json,JSON_UNESCAPED_UNICODE);
		mysqli_close($db);	
?>
