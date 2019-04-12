<?php

include("adminloginpage.php");
include("connect.php");



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction </title>


<style>

table{
	margin-left:350px;
	color:#000;
	padding:2px;
	width:1000px;
	opacity:.7;
	overflow:scroll;
}
input{
	padding:5px;
}
th,td{
	border:2px solid black;
}

	
	</style>
</head>

<body>
<table align="center" >
		<tr align="center">
        			<h2 style="margin-left:600px;COLOR:#FFF;margin-top:-500px;">AUCTION VIEW</h2>
                    
                    <tr>
                    <td><form method="post" action="auctionview.php">
                    <input type="text" name="names" id="names" placeholder="Enter Your Search" />
                    
                    </td>
                    <td><input type="submit" name="sub" id="sub" value="Search" /></td>
                    </tr>
                
                    </tr>
                    <tr align="center">
                   	<th> ID</th>
                    <th>AUCTION NAME</th>
                    <th>USER NAME</th>
                    <th>DATE</th>
                    <th>TIME</th>
                     <th>DELETE</th>
                   
                    </tr>
                 
          
			<?php
			//INSERT INTO `useradd`(`id`, `atype`, `aname`, `datej`, `time`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
			$sel="select * from  `useradd` ";
			
			if(isset($_POST['sub']))
			{
				
				$name=$_POST['names'];
				
			$sel="select * from  `useradd` where (`atype` ='".$name."' OR `aname`='".$name."')";	
				
			}
			
			$run=mysqli_query($con,$sel);
			
			$i=0;     
			
			while($row=mysqli_fetch_array($run)){
					
				$id=$row['id'];	
				$atype=$row['atype'];
				
				$aname=$row['aname'];
				$date=$row['datej'];
				$time=$row['time'];
				 $i++;
				 
				 
				 
				 ?>
                 
                 
                 
		<tr align="center">
          	
              <td><?php echo $id; ?></td>
            <td><?php echo $atype; ?></td>
            <td><?php echo $aname;?></td>
            <td><?php echo $date;?></td>
            <td><?php echo $time;?></td>
            <td><a href="auctionview.php?id=<?php echo $id ;?>">DELETE</a></td>
           
            
            </tr>



<?php } ?>
		</table>	
        
        
        <?php
		if(isset($_GET['id'])){
			
			$get_id=$_GET['id'];
			
			
			$delete="DELETE FROM `useradd` WHERE id='".$get_id."' ";
			
			$delete_run=mysqli_query($con,$delete);
			if($delete_run){
				
				echo "<script>alert('Auction has been delete')</script>";
				echo "<script>window.open('auction.php','_self')</script>";

			}
		}
		?>
</body>
</html>