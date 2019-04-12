<?php
include('connect.php');
include('userhome.php');
 session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PVC BILLING</title>
</head>

<body>


<hr />   
<h2>CUSTOMER REGISTER</h2>
<form method="post" action="chat.php" >
<table>

    <td><label>MESSAGE :</label></td>
    <td>
   <textarea cols="15" rows="5" name="message" id="message"></textarea>
         
    </td>
   
    
  	</table>

	<hr />    <br />
    <div style="width:100px;height:50px;margin-left:250px;">
	<input type="submit" value="Save" name="sub"  > </div>
	</form> 	
       
</div>
<?php
		
		if(isset($_POST['sub'])){
			
			$message=$_POST['message'];
			
			
			$a="SELECT * FROM `useradd` WHERE `aname`='".$_SESSION["nms"]."'  ";
			
			$b=mysqli_query($con,$a);
			
			if($rows=mysqli_fetch_array($b)){
				
				$type=$rows['atype'];
			}
			
			
			
				$sql="INSERT INTO `chatting`(`auction_type`, `name`, `message`) VALUES ('".$type."','".$_SESSION["nms"]."','".$message."')";
				
				$run=mysqli_query($con,$sql);
				
				if($run){
					
				echo "<script>alert('Your Message Send SuccessFully')</script>";	
					
					
				}
		}
?>

<div style="color:#FFF;height:420px;width:850px;margin-left:350px;margin-top:-200px;overflow:scroll;">

<table style="color:#000;

	width:700px;
	background-color:#666;
	opacity:.7;
	overflow:scroll;">
	<tr>
   	<th style="border:2px solid black;">SNO</th>
    <th style="border:2px solid black;">TYPE</th>
    <th style="border:2px solid black;">NAME </th>
    <th style="border:2px solid black;">MESSAGE</th>
   
    </tr>
   
			<?php
		//INSERT INTO `chatting`(`id`, `auction_type`, `name`, `message`) VALUES ([value-1],[value-2],[value-3],[value-4])	

			$sel="select * from  `chatting` order by id desc ";
			
			$run=mysqli_query($con,$sel);
			
			$i=0;     
			
			while($row=mysqli_fetch_array($run))
			{
					
						
				$id=$row['id'];
				
				$atype=$row['auction_type'];
				$aname=$row['name'];
				$amessage=$row['message'];
				
				
								
				 $i++;
				 ?>
    
    <TR>
    	<td  style="border:2px solid black;"><?php echo $i;  ?></td>
    	<td  style="border:2px solid black;"><?php echo $atype;  ?></td>
    	<td  style="border:2px solid black;"><?php echo $aname;  ?></td>
        <td  style="border:2px solid black;"><?php echo $amessage;  ?></td>
       
       
    </TR>



<?php } ?>

</table>
</div>

</body>
</html>




</div>

</body>
</html>