<!DOCTYPE html>
<html>
<body bgcolor='C3A834'>
<form action="index.php?action=blogcreated" method="POST"  enctype="multipart/form-data">
<table cellspacing=10>
<tr><td>Title:</td><td> <input type="text" name="title"></td></tr>
<tr><td>Description:</td><td> <input type="text" name="description"></td></tr>
<tr><td>Published Date:</td><td> <input type="date" name="published_date"></td></tr>
<tr><td>Author:</td><td> <input type="text" name="author"></td></tr>
<tr><td>Add Image:</td><td> <input type="file" name="image" /></td></tr>
<tr><td><input type="submit" value="Save"></td></tr>
<tr><td><a href="index.php?action=logout">Logout</a></td></tr>
</form>
</body>
</html>