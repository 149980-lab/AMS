<?php


			$conn = mysqli_connect("localhost", "id12176797_assets","newagetech", "id12176797_espconnect");
			$id =$_GET['eid'];		
			$newsql ="DELETE FROM `login` WHERE id ='$id' ";
			if(mysqli_query($conn,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("Tag DELETED") </script>';
							
						
				}
			header("Location: usersetting.php");
		
?>


