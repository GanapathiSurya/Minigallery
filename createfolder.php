<?php
if (isset($_POST['folder_submit'])) 
{
require 'connection.php';
$folder=$_POST['folder'];
$username=$_POST['username'];
$password=md5($_POST['password']);
if(strpos($folder," "))
{
?>
<script type="text/javascript">
window.location.replace("minigalleryhome.php?format=Name must not conain any spaces.");
</script>
<?php    
}
else
{
try 
{
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dusername,$dpassword);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("SELECT folder FROM folders where folder=?");
  $stmt->execute([$folder]);
  $userfolder = $stmt->fetch();
if ($userfolder) 
{
?>
<script type="text/javascript">
window.location.replace("minigalleryhome.php?exist=Album exists");
</script>
<?php
} 
else 
{
$stmt = $conn->prepare("INSERT INTO folders (name,password,folder) VALUES (?, ?, ?)");
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->bindParam(2, $password, PDO::PARAM_STR);
$stmt->bindParam(3, $folder, PDO::PARAM_STR);
//$stmt->bind_param("sss", $username, $password, $folder);
$stmt->execute(); 
mkdir("folders/".$folder);
?>
<script type="text/javascript">
window.location.replace("minigalleryhome.php");
</script>
<?php
} 
} 
catch(PDOException $e) 
{
  echo "Error: " . $e->getMessage();
}    
}
?>
<script type="text/javascript">
window.location.replace("minigalleryhome.php");
</script>
<?php
}
if (isset($_POST['img_submit'])) 
{
	$folderin=$_POST['folderin'];
  $upload_dir = 'folders/'.$folderin."/"; 
    $allowed_types = array('jpg', 'png', 'jpeg', 'gif','mp4'); 
      
    // Define maxsize for files i.e 2MB 
    $maxsize = 2 * 1024 * 1024;  
  
    // Checks if user sent an empty form  
    if(!empty(array_filter($_FILES['files']['name']))) { 
  
        // Loop through each file in files[] array 
        foreach ($_FILES['files']['tmp_name'] as $key => $value) { 
              
            $file_tmpname = $_FILES['files']['tmp_name'][$key]; 
            $file_name = $_FILES['files']['name'][$key]; 
            $file_size = $_FILES['files']['size'][$key]; 
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION); 
  
            // Set upload file path 
            $filepath = $upload_dir.$file_name; 
  
            // Check file type is allowed or not 
            if(in_array(strtolower($file_ext), $allowed_types)) { 
  
                // Verify file size - 2MB max  
                if ($file_size > $maxsize)          
                    echo "Error: File size is larger than the allowed limit.";  
  
                // If file with name already exist then append time in 
                // front of name of the file to avoid overwriting of file 
                if(file_exists($filepath)) { 
                    $filepath = $upload_dir.time().$file_name; 
                      
                    if( move_uploaded_file($file_tmpname, $filepath)) { 
                        echo "{$file_name} successfully uploaded <br />"; 
                    }  
                    else {                      
                        echo "Error uploading {$file_name} <br />";  
                    } 
                } 
                else { 
                  
                    if( move_uploaded_file($file_tmpname, $filepath)) { 
                        echo "{$file_name} successfully uploaded <br />"; 
                    } 
                    else {                      
                        echo "Error uploading {$file_name} <br />";  
                    } 
                } 
            } 
            else { 
                  
                // If file extention not valid 
                echo "Error uploading {$file_name} ";  
                echo "({$file_ext} file type is not allowed)<br / >"; 
            }  
        } 
    }  
    else { 
          
        // If no files selected 
        echo "No files selected."; 
    } 
}
?>
<script type="text/javascript">
window.location.replace("gallerymain.php?folder=<?php echo $folderin;?>");
</script>