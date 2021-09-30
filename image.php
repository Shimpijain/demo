<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Add Image</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<style>
		.btn
		{
			text-decoration: none;
			border: none;
 			 outline: 0;
  			padding: 12px;
  			color: white;
 			background-color: #000;
 			text-align: center;
 			cursor: pointer;
			width: 50%;
 			font-size: 18px;
		}

		.success{
			color: green;
		}
		.error{
			color:red;
		}
</style>

<script type="text/javascript">

	window.history.forward();
	function noBack()
	{
	 window.history.forward(); 
	}
</script>
</head>

<body onload="noBack();">

<?php
$msg=$fname=$errmsg="";
$uploadOk=$_GET["uploadOk"];
if($uploadOk==0){
	$errmsg = $_GET["msgerr"];
	$fname = $_GET["fname"];
}
else{
	$msg = $_GET["msg"];
	$fname = $_GET["fname"];
}
?>	

<div class="main_contain">
	
	<div class="main_addCategory">
		<div class="login_div">
			<div align="right">				
				||&nbsp;&nbsp;&nbsp;&nbsp;<B><font face="Times New Roman" size="4">Welcome:</font>&nbsp;<font face="Times New Roman" size="4" color="#000099"><bean:write name="LoginForm" property="id"/></font></B>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<a href="view_editCategory.php?succMsg=&failMsg="><img src="http://localhost/shimpiproject/book_images/d.png" height="40" width="40" alt="home" align="absmiddle"><b><font size=3>View</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;||&nbsp;&nbsp;&nbsp;&nbsp;<a href="logout.php"><b><font size="3">Logout</font></b></a>&nbsp;&nbsp;&nbsp;&nbsp;								
			</div>
			<div align="center">
				<b><font face="calibiri" size="+2" color="#000099">Add Image</b></font></b><br><br><br><br>
				<p><span class="success"><b><font face="calibiri" size="+1"><?php echo $msg; ?></b></font></span></p>
				<p><span class="error"><b><font face="calibiri" size="+1"><?php echo $errmsg; ?></font></b></span></p>
				<form action="upload.php" focus="category" method="post" enctype="multipart/form-data">
					<table border=0>
						
						<tr>
							<td align="right" valign="middle"><font font size="3" face="Times New Roman">Select Images:</font><br><br> </td>
							<td align="left" valign="middle"><input type="file" name="image" multiple required><br><br></td>
							<td><input type="submit" name="" value="upload" style="cursor: pointer;" id="upld" onsubmit="callUpload()"><br><br></td>
							
						</tr>
						<tr>
							<td align="right" valign="middle">
								<font font size="3" face="Times New Roman">Uploaded image Name:</font><br><br>
							</td>							
							<td align="left" valign="middle" colspan=2>
								<input type="text" name="filename" value="<?php echo $fname;?>" size="30" disabled/><br><br>
							</td>							
						</tr>
						<tr>							
							<td>
								&nbsp;
							</td>	
							<td align="left" valign="middle" colspan=2>
								<a href="imgaction.php?filename=<?php echo $fname;?>" class="btn">Add Image</a>
							</td>							
						</tr>
					</table>
				</form><br><br><br><br>
			</div>
		</div>
	</div>
</div>
</body>
</html>	

