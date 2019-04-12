<?php

include("userhome.php");
include("connect.php");



?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Auction </title>


<style>

table{
	color:#000;
	padding:2px;
	width:1000px;
	background-color:#666;
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
        			<h2 style="margin-left:600px;COLOR:#FFF;">HALL VIEW</h2>
                
                    </tr>
                    <tr align="center">
                   	<th> ID</th>
                    <th>AUCTION NAME</th>
                    <th>USER NAME</th>
                    <th>DATE</th>
                    <th>TIME</th>
                 
                   
                    </tr>
                 
          
			<?php
			
			$sel="select * from  `useradd` ";
			
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
        
            
            </tr>



<?php } ?>
		</table>	
        
        
      
</body>
</html>