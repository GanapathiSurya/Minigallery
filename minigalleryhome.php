<!DOCTYPE html>
<html>
<head>
<title>Home</title>

<link rel="icon" type="image/gif" href="icon.gif" sizes="500*500">
<link rel="stylesheet" type="text/css" href="w3.css">
<script type="text/javascript" src="w3js.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<title>MiniGallery</title>
<style type="text/css">
#create
{
display:none;
}
button
{
	outline: none;
}
a
{
	text-decoration: none;
}
</style>
</head>
<body class="w3-blue">
<div class="w3-bar w3-white w3-large w3-padding-small" style="height:80px;">
<div class="w3-bar-item">
<!--<i class='far fa-image w3-text-white' style='font-size:50px'></i>-->
<img src="iconz.png" width="60" height="60">
</div>
<div class="w3-bar-item w3-text-indigo  w3-xxlarge" style="font-family:Arial, Helvetica,sans-serif;">
<font class='w3-text-ble'>Mini</font>gallery
</div>
</div>

<?php
?>
<center>
<?php
        if (@$_GET['exist']==true) 
        {
        ?>
        <div class="w3-text w3-text-red w3-medium">*<?php echo $_GET['exist'];?></div>
        <?php
         }
        ?>
    <?php
       /* if (@$_GET['status']==true) 
        {
        ?>
        <div class="w3-text w3-blue w3-round w3-padding-small w3-medium" style="width:300px;"><?php echo $_GET['status'];?></div><br>
        <?php
         }*/
        ?>
     <?php
        if (@$_GET['format']==true) 
        {
        ?>
        <div class="w3-text w3-text-red w3-medium">*<?php echo $_GET['format'];?></div>
        <?php
         }
        ?>
<br>        
<div class=" w3-padding w3-white w3-round w3-card" style="width:250px;">
<span>New Album?</span>
<button class="w3-button w3-round-medium w3-blue w3-padding-small" onclick="document.getElementById('create').style.display='block'">Create</button>

</div>

<div id="create" class="w3-modal">
  <div class="w3-modal-content">
    <div class="w3-container">
      <span onclick="document.getElementById('create').style.display='none'"
      class="w3-button w3-display-topright">&times;</span>
      
<form action="createfolder.php"  class="w3-padding" method="post">
<button type="button" class="w3-red w3-button w3-border-0 w3-padding-small w3-medium w3-text-white w3-round" onclick="document.getElementById('create').style.display='none'">Close</button>
<table>
<tr>
<td class="w3-text-black"><input type="text" name="folder" placeholder="FolderName" required></td>
</tr>
<tr>
<td class="w3-text-black"><input type="text" name="username" placeholder="UserName" required></td>
</tr>
<tr>
<td class="w3-text-black"><input type="password" name="password" placeholder="Password" required></td>
</tr>
</table><br>
<input type="submit" class="w3-button w3-padding-small w3-blue w3-round-large" name="folder_submit" value="confirm">
</form>
    </div>
  </div>
</div>
<br>
<div>
<!--<button class="w3-blue w3-padding-small w3-round-medium w3-border-0 w3-margin" onclick="w3.toggleShow('#folderslist')">ALBUMS&#8595;</button>-->
<br>
<input class='w3-input w3-round-xxlarge w3-card-2' placeholder="Search Album.." id='findalbum' style="width:320px;outline:none;" onkeyup="myFunction()"><br>
<ul class="w3-ul w3-card" id="folders" style="width:300px;">
<?php
$dir="folders/";
$a=scandir($dir);
foreach ($a as $folder) 
{
if($folder != '.' and $folder != '..')
{ 
?>
<script type="text/javascript">
var value="<?php echo $folder;?>";
</script>
<li class="w3-white w3-border-bottom w3-border-blue" style="cursor:pointer" onclick="window.location.href='gallerymain.php?folder=<?php echo $folder;?>'">
<a href="gallerymain.php?folder=<?php echo $folder;?>">
<?php echo $folder?></a>
</li>
<?php
}
}
?>
</ul>
</div>
</center>
<script>
function myFunction() {
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('findalbum');
  filter = input.value.toUpperCase();
  ul = document.getElementById("folders");
  li = ul.getElementsByTagName('li');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      li[i].style.display = "";
    } else {
      li[i].style.display = "none";
    }
  }
}
</script>
</body>
</html>