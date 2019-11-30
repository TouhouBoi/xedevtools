<?php
if (isset($_POST["submit"]))
{
	$tmp_dir = "tmp/";
	$tmp_file = $tmp_dir.basename($_FILES["fileToUpload"]["tmp_name"]);
	
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $tmp_file))
	{
		$sha256 = hash_file("sha256", $tmp_file);
		print($sha256);
		unlink($tmp_file);
		exit();
	}
	else
	{
		header("Location: /xepackage_sha256.php");
		exit();
	}
}
?>
<!DOCTYPE html>
<html>
<body>
<form action="/test.php" method="post" enctype="multipart/form-data">
    <h1>Upload XePackage</h1>
	<h3>Generate XePackage SHA256 Hash</h3>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload XePackage" name="submit">
</form>
</body>
</html>
