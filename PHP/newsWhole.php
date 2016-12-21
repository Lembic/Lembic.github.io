<?php	 
	$db=mysqli_connect("localhost","root","","imgs");

	header('Content-type: text/javascript');
	
	//$type=0;

	$id = json_decode($_GET["id"]);

		$sql="SELECT id, image, text, title FROM vijesti_tablica WHERE id=$id";
				
		$result=mysqli_query($db,$sql);
		
		$json=array();

		while ($row = mysqli_fetch_array($result))
		{
			$imageData = base64_encode(file_get_contents(".../IMGS/".$row['image']));
			
			$src = 'data: '.mime_content_type(".../IMGS/".$row['image']).';base64,'.$imageData;

			$bus=array(
				'id'=>$row['id'],
				'image'=>$src,
				'text'=>$row['text'],
				'title'=>$row['title']
				);
			
			$json[]=$bus;		
		}

		echo json_encode($json,JSON_UNESCAPED_UNICODE);
		mysqli_close($db);	
?>
