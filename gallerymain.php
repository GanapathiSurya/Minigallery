<!DOCTYPE html>
<html>
<head>
    
<link rel="icon" type="image/gif" href="icon.gif" sizes="500*500">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://www.w3schools.com/lib/w3.js"></script>
<script type="text/javascript" src="w3js.js"></script>
	<title>Online Gallery</title>
<style>
     img
     { 
     	margin-bottom: 1px; cursor: pointer;opacity: 1;
     }
     img:hover
     {
     	opacity: 0.6; transition: 0.3s
     }
     @media screen and (max-width:768px)
     {
         .slideitem
         {
             height:300px;
         }
     }
     @media screen and (min-width:768px)
     {
         .slideitem
         {
             height:400px;
         }
     }
     @media screen and (min-width:992px)
     {
         .slideitem
         {
             height:600px;
         }
     }
     .slideitem:hover
     {
     	opacity:1;
     }
	</style>
</head>
<body class="w3-large w3-blue " style="overflow-x:hidden;">
<?php

require 'connection.php';
error_reporting(0);
$image=$_GET['folder'];
$dir="folders/".$image."/";
$a=array_reverse(scandir($dir));
error_reporting(0);
?>

<div class="w3-bar w3-border-bottom w3-white w3-large w3-padding-small" style="height:80px;">
<div class="w3-bar-item w3-padding-bottom">
<!--<i class='far fa-image w3-text-white' style='font-size:50px'></i>-->
<img src="iconz.png" width="50" height="50">
</div>
<div class="w3-bar-item w3-text-indigo" style="font-family:Arial, Helvetica,sans-serif;font-size:30px;">
<font class='w3-text-bue'>Mini</font>gallery
</div>
</div>
<center>
<button class="w3-border-0 w3-margin w3-round w3-padding-small w3-button w3-card w3-white" onclick="document.getElementById('form').style.display='block'">Add Photos</button>
<a href="whatsapp://send?text=minigallery.000webhostapp.com/gallerymain.php?folder=<?php echo $image;?>" data-action="share/whatsapp/share" class="w3-button  w3-padding-small"><i class='fab fa-whatsapp-square ' style='font-size:48px;color:white'></i></a>
</center>
<div id="form" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('form').style.display='none'"
      class="w3-button w3-display-topright w3-text-black">&times;</span>
<form action="addimages.php" method="post" class=" w3-padding w3-text-black">
<center>
<input type="text" name="folder" value="<?php echo $image;?>" style="display:none;">
<input type="text" name="name" class="w3-margin" placeholder="Username" required><br>
<input type="password" name="password" class="w3-margin" placeholder="Password" required><br>
<input type="submit" name="loginsubmit" class="w3-blue w3-padding-small w3-round w3-border-0">
</center>
</form>
    </div>
  </div>
</div>
<center>
<?php
foreach (array_reverse($a) as $folder) 
{
$ext = pathinfo($folder, PATHINFO_EXTENSION);
if($folder != '.' and $folder != '..' and $ext!='mp4')
{ 
?>
<img src="folders/<?php echo $image;?>/<?php echo $folder;?>" style="width:90%;object-fit:fill;border:4px solid white;" class="slideitem w3-card w3-white">
<?php
}
}
?>
<table class="" >
<tr>
<td class="w3-padding"><button class="w3-round w3-button w3-card w3-white " onclick="opensection('images')">Images</button></td>
<td class="w3-padding"><button class="w3-round w3-button w3-card w3-white" onclick="opensection('videos')">Videos</button></td>
</tr>
</table>
</center>
<div id="images" class="status w3-white">

<div class="w3-main w3-content" style="max-width:1600px;margin-top:10px">
 <div class=" w3-border-top row" style="padding-left:10px;padding-right:10px;">
<?php
$count=1;
foreach (array_reverse($a) as $folder) 
{
	if ($count==5) 
	{
	$count=1;
	}
	
$ext = pathinfo($folder, PATHINFO_EXTENSION);
if($folder != '.' and $folder != '..' and $ext!='mp4')
{ 
?>
<?php
if ($count==1) 
{
?>
   <div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<img src="folders/<?php echo $image;?>/<?php echo $folder;?>" style="width:100%;height:220px;border-right:3px solid #ff9900;border-bottom:2px solid #ff9900;" onclick="onClick(this)" class="item" >
   </div>
<?php
}
?>

<?php
if ($count==2) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<img src="folders/<?php echo $image;?>/<?php echo $folder;?>" style="width:100%;height:220px;border-right:3px solid blue;border-bottom:2px solid blue" onclick="onClick(this)" class="item ">
   </div>
<?php
}
?>
<?php
if ($count==3) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<img src="folders/<?php echo $image;?>/<?php echo $folder;?>" style="width:100%;height:220px;border-right:3px solid #77b300;border-bottom:2px solid #77b300" onclick="onClick(this)" class="item ">
   </div>
<?php
}
?>
<?php
if ($count==4) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<img src="folders/<?php echo $image;?>/<?php echo $folder;?>" style="width:100%;height:220px;border-right:3px solid #ff99cc;border-bottom:2px solid #ff99cc" onclick="onClick(this)" class="item w3-border-pink">
   </div>
<?php
}
?>
<?php
}
$count=$count+1;
}
?>
</div>
</div>

</div>
<div id="videos" style="display:none;background-color:white;" class="status">
<div class="w3-main w3-content w3-white" style="max-width:1600px;margin-top:10px">
 <div class=" w3-border-top row w3-white" style="padding-left:10px;padding-right:10px;">
<?php
$count=1;
foreach ($a as $folder) 
{
$ext = pathinfo($folder, PATHINFO_EXTENSION);
	if ($count==5) 
	{
	$count=1;
	}
if($folder != '.' and $folder != '..' and $ext=='mp4')
{ 
?>
<?php
if ($count==1) 
{
?>
   <div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<video style="width:100%;height:220px;border-right:3px solid #ff9900;border-bottom:2px solid #ff9900;" controls>
  <source src="folders/<?php echo $image;?>/<?php echo $folder;?>" type="video/mp4" onclick="displayvideo(this)">
</video>
   </div>
<?php
}
?>

<?php
if ($count==2) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<video style="width:100%;height:220px;border-right:3px solid blue;border-bottom:2px solid blue;" controls>
  <source src="folders/<?php echo $image;?>/<?php echo $folder;?>" type="video/mp4" onclick="displayvideo(this)">
</video>
   </div>
<?php
}
?>
<?php
if ($count==3) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<video style="width:100%;height:220px;border-right:3px solid #77b300;border-bottom:2px solid #77b300;" controls>
  <source src="folders/<?php echo $image;?>/<?php echo $folder;?>" type="video/mp4" onclick="displayvideo(this)">
</video>
   </div>
<?php
}
?>
<?php
if ($count==4) 
{
?>
<div class="col-lg-2 col-xs-6 col-md-3 col-sm-4" style="padding:0px;">
<video style="width:100%;height:220px;border-right:3px solid #ff99cc;border-bottom:2px solid #ff99c;" controls>
  <source src="folders/<?php echo $image;?>/<?php echo $folder;?>" type="video/mp4" onclick="displayvideo(this)">
</video>
   </div>
<?php
}
?>
<?php
}
$count=$count+1;
}
?>
</div>
</div>
<br><br><br>
</div>
<div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright" >×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>
  
<div id="videomodal" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <video style="" controls>
  <source id="fullvideo" type="video/mp4">
</video>
    </div>
  </div>
<script>
var app = angular.module('myApp', []);
app.controller('myCtrl', function($scope, $location) {
    $scope.myUrl = $location.absUrl();
});


function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

function displayvideo(element) {
  document.getElementById("fullvideo").src = element.src;
  document.getElementById("videomodal").style.display = "block";
 
}

function opensection(status) {
  var i;
  var x = document.getElementsByClassName("status");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  document.getElementById(status).style.display = "block";  
}
w3.slideshow(".slideitem", 3000);
</script>
</body>
</html>