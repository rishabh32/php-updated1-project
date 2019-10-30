<?php
require_once ("web/pagination.php");
?>
<!DOCTYPE html>
<html>
<body bgcolor='C3A834'>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
<a href="index.php?action=bloglinkpage">Create new blog</a>   <br/>   <br/>
<table style="width:30%">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Published date</th>
        <th>Author</th>
        <th>Email</th>
        <th>Image</th>
    </tr>
    <?php
                    if (! empty($result)) {
                        foreach ($result as $k) {
                            ?>
          <tr>
                    <td><?php echo $k['title']; ?></td>
                    <td><?php echo $k['description']; ?></td>
                    <td><?php echo $k['published_date']; ?></td>
                    <td><?php echo $k['author']; ?></td> 
                    <td><?php echo $k['email']; ?></td> 
                    <td><img src="images/<?php echo $k['image'];?>" height=80 width=80></td>
                    <td><a href="index.php?action=edit&blogid=<?php echo $k['blogid']; ?>">Edit</a></td>
                    <td><a href="index.php?action=delete&blogid=<?php echo $k['blogid']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
          </tr>
                    <?php
                        }
                    }
                 
                    else
                   echo "There is no record to fetch";
                    ?>
</table><br/><br/>
                   <?php
                for($page=1;$page<=$number_of_pages;$page++)
                   {
                       echo '<a href="index.php?action=page&page='.$page.'">'.$page.'</a>';
                   }
                   ?>
                   <br/><br/>
<a href="index.php?action=logout">Logout</a>
</body>
</html>