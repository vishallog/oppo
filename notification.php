  <php?
$conn=mysql_connect("localhost","root","");
mysql_select_db("apllication",$conn);
session_start();
//View messages...
	if ($_SESSION["LoginID"]==true) {
		if (isset($_GET["reply"])) {
	$o=mysql_query("INSERT INTO `message` ( `msg`, `to`, `from`, `date`,`img1`) VALUES ( '".$_GET["msg"]."','".$_GET["id"]."', '".$_SESSION["id"]."', '','')");}
	
	
	
	 ?><!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Funchat</title>
<!--
App Starter Template
http://www.templatemo.com/tm-492-app-starter
--><link rel="stylesheet" type="text/css" href="bootstrap.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/animate.css">
<link rel="stylesheet" href="css/font-awesome.min.css">

<link rel="stylesheet" href="css/magnific-popup.css">

<link rel="stylesheet" href="css/owl.theme.css">
<link rel="stylesheet" href="css/owl.carousel.css">

<link href='https://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,700' rel='stylesheet' type='text/css'>

<!-- Main css -->
<link rel="stylesheet" href="css/style.css">

</head>
<body data-spy="scroll" data-target=".navbar-collapse" data-offset="50">


<!-- PRE LOADER -->

<div class="preloader">
     <div class="sk-spinner sk-spinner-pulse"></div>
</div>



<!-- Navigation Section -->

<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">

		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand"><span>Fun</span> Chat</a>
		</div>

		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="index.php" class="smoothScroll">Home</a></li>
				
				                             <li><a href="message.php" class="smoothScroll">Message</a></li>

				<li><a href="notification.php" class="smoothScroll">Notification</a></li>
               
                <li><a href="logout.php" class="smoothScroll">Logout</a></li>
        		
			</ul>
		</div>

	</div>
</div>


<!-- Home Section -->

<section id="home" class="main">
     <div class="overlay"></div>
	<div class="container">
		<div class="row">

               <div class="wow fadeInUp col-md-6 col-sm-5 col-xs-10 col-xs-offset-1 col-sm-offset-0" data-wow-delay="0.2s">
                    <img  class="img-responsive" >
               </div>
               </div><p><div class="col-md-12"><div class="col-md-6"> <font  color="white">
               	<?php echo "<table class='table-bordered' width='60%' border=1><tr><td width=170px><center>Name</center></td>";?><?php echo "<td><center>Action</center></td></tr></table>";?></div></div><br></font>
               <div class="col-md-12"><div class="col-md-6">  <?php
		 
		 	
		 
		 $sql=mysql_query("SELECT `reg_info`.name, `message`.to, `message`.id, `message`.`from` FROM  `message` inner join reg_info on `message`.`from`=`reg_info`.id where `to`=".$_SESSION["id"]);
		 while($row=mysql_fetch_array($sql)){
		    echo "<table class='table-bordered' width='60%' border=1><tr><td width=170px><a href='notification.php'><center>$row[name]</center></a></td>";?> <td><center>
<a href='notification.php?to=<?php echo$row['to'];?>&&from=<?php echo $row['from'];?>'><u>View</u></a></center></td></tr></table>
<?php } ?>
		</div><div class="col-md-3" align="right"><div class="col-md-3" align="left"><br><?php  
		


if (isset($_GET["to"])) {

			$sql=mysql_query("select `message`.to,`message`.from,`reg_info`.name,`message`.msg,`message`.img1 from `message`inner join `reg_info` on `message`.from=`reg_info`.id where  (`to`='".$_GET['to']."' and  `from`='".$_GET['from']."') or ( `to`='".$_GET['from']."' and `from`='".$_GET['to']."')");
           while($row=mysql_fetch_array($sql)){		echo "<table class='table-condensed' width='750%' align='left' color='white'><tr><td width=200px>
<font color='white'>$row[name]&nbsp&nbsp&nbsp-&nbsp&nbsp&nbsp&nbsp$row[msg]<br></td><td> "; 
if($row["img1"]==""){

}else{
echo "
    
           <a href='image/$row[img1]'> Download</a> ";  
} echo "
           </td></tr></table></font>";}

		    ?></div></div><div class="col-md-12"><div class="col-md-3"></div><div class="col-md-3"></div><div class="col-md-3"><font color="black"><br><br><form method="get">
		    	<input type="hidden" name="id" value="<?php echo $_GET['from']; ?>">
<input type="text" name="msg" placeholder="reply" class="form-control" required></div>	
		  <br>  <br>	<button name="reply" class="btn btn-success">Reply</button>
		    </form></font></div></div>
<?php } ?>
		</div></p>
<?php ?>

		</div>
	</div>
</section>



<!-- Back top -->

<a href="#" class="go-top"><i class="fa fa-angle-up"></i></a>


<!-- SCRIPTS -->

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/magnific-popup-options.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/smoothscroll.js"></script>
<script src="js/wow.min.js"></script>
<script src="js/custom.js"></script>

</body>
</html>
<?php 

}
else 
	include("message.php");?>
