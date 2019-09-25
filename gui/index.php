<center>
<h3>OCR reader</h3>
<form action="index.php" method="POST" enctype="multipart/form-data">
<input type="file" name="image" />
<input type="submit"/>
</form>
</center>

<?php
if(isset($_FILES['image'])){
$file_name = $_FILES['image']['name'];
$file_tmp =$_FILES['image']['tmp_name'];
move_uploaded_file($file_tmp,"images/".$file_name);
echo "input";
echo '<img src="images/'.$file_name.'" style="width:100%">';

shell_exec('"C:\\Program Files (x86)\\Tesseract-OCR\\tesseract" "C:\\laragon\\www\\ocr\\gui\\images\\'.$file_name.'" out');

echo "<br>output:<br><pre>";

$myfile = fopen("out.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("out.txt"));
fclose($myfile);
echo "</pre>";
}
?>