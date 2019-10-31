<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body bgcolor='C3A834'>
<table style="width:20%">
    <tr>
         <th>ID</th>
         <th>Name</th>
    </tr>
    <?php
         $sql="select id,firstname from auth";
         $res=$db_handle->runBase($sql); 
                    if (! empty($res)) {
                        foreach ($res as $k) {
                            ?>
          <tr>
                    <td><?php echo $k['id']; ?></td>
                    <td><?php echo $k['firstname']; ?></td>
                    <td><a href="index.php?action=deleteuser&id=<?php echo $k['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
          </tr>
                    <?php
                        }
                    }
                    else
                   echo "There is no record to fetch";
                    ?>
</table><br/>
<a href="index.php?action=logout">Logout</a>
</body>
</body>
</html>