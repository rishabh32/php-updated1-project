<?php
require_once ("class/DBController.php");
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html>
<body>
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
        <th>email</th>
      
    </tr>
    <?php
    $results_per_page=2;
     $sql="select * from blog where email='$_SESSION[email]'";
    // echo $_SESSION[email];
     $result=$db_handle->pagen($sql);
     $number_of_results=mysqli_num_rows($result);
     $number_of_pages=ceil($number_of_results/$results_per_page);
     if(!isset($_GET['page']))
     $page=1;
     else
     $page=$_GET['page'];
     $this_page_first_result=($page-1)*$results_per_page;
     $sql="select * from blog where email='$_SESSION[email]' LIMIT ". $this_page_first_result. "," . $results_per_page;
     $result=$db_handle->pagen($sql); 
    // echo $res[0]['title'];
   //  print $res[0]['title'];
                    if (! empty($result)) {
                        foreach ($result as $k) {
                            ?>
          <tr>
                    <td><?php echo $k['title']; ?></td>
                    <td><?php echo $k['description']; ?></td>
                    <td><?php echo $k['published_date']; ?></td>
                    <td><?php echo $k['author']; ?></td> 
                    <td><?php echo $k['email']; ?></td> 
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