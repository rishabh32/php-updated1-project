<!DOCTYPE html>
<html>
<body bgcolor='C3A834'>
<form action="index.php?action=updateblog" method="POST"  enctype="multipart/form-data">
<?php
 $sql="select * from blog where blogid='$blogid'";
 $_SESSION['blogid']=$blogid;
 $res=$db_handle->runbase($sql); 
 ?>
 <table cellspacing=10>
<tr><td>Title:</td><td> <input type="text" name="title" value="<?php echo $res[0]['title']; ?>"></td></tr>
<tr><td>Description:</td><td> <input type="text" name="description" value="<?php echo $res[0]['description']; ?>"></td></tr>
<tr><td>Published Date:</td><td> <input type="date" name="published_date" value="<?php echo $res[0]['published_date']; ?>"></td></tr>
<tr><td>Author:</td><td> <input type="text" name="author" value="<?php echo $res[0]['author']; ?>"></td></tr>
<tr><td>Image:</td><td> <input type="file" name="imag" required /></td></tr>
<tr><td><input type="submit" value="Update"></td></tr>
<tr><td><a href="index.php?action=logout">Logout</a></td></tr>
</table>
</form>
</body>
</html>