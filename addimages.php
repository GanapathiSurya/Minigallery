
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Images</title>
</head>
<body>

<?php
$name=$_POST['name'];
$password=md5($_POST['password']);
$folder=$_POST['folder'];
require 'connection.php';
try
{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername,$dpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT * FROM folders where folder=? and name=? and password=?");
$stmt->bindParam(1, $folder, PDO::PARAM_STR);
$stmt->bindParam(2, $name, PDO::PARAM_STR);
$stmt->bindParam(3, $password, PDO::PARAM_STR);
  $stmt->execute();
  $correct = $stmt->fetch();

if ($correct) 
{
?>
<br><br>
<center>
<form action="createfolder.php" method="post" enctype="multipart/form-data" style="width:300px;" class="w3-margin w3-border">
<input type="file" name="files[]"  class="w3-margin" class="w3-input w3-margin" multiple>
<br>
<input type="submit" name="img_submit" class=" w3-margin w3-blue w3-padding-small w3-round w3-border-0" style="outline: none;">
<input type="text" name="folderin" value="<?php echo $folder;?>" style="display:none;">
</form><br>
<!--Delete Album?<button class="w3-button w3-red w3-padding-small w3-margin-left w3-round" onclick="<?php delete($folder);?>">Delete</button>-->
</center>
<?php
}
else
{
?>
<script type="text/javascript">
window.location.replace("gallerymain.php?folder=<?php echo $folder;?>");
</script>
<?php
}
}
catch(PDOException $e) 
{
  echo "Error: " . $e->getMessage();
}
/*function delete($name)
{
$modname="folders/".$name;
//echo 'hjhhggfv';
if(rmdir($modname))
{
header("Location:minigalleryhome.php");
}
}*/
?>
</body>
</html>