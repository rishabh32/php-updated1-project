<style>
table, th, td {
  border: 1px solid black;
}
</style>
<table style="width:30%">
    <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Published date</th>
        <th>Author</th>
        <th>email</th>
        
    </tr>
    <?php
         $sql="select * from blog";
         $results_per_page=2;
         $result=$db_handle->pagen($sql);
         $number_of_results=mysqli_num_rows($result);
         $number_of_pages=ceil($number_of_results/$results_per_page);
         if(!isset($_GET['page']))
         $page=1;
         else
         $page=$_GET['page'];
         $this_page_first_result=($page-1)*$results_per_page;
         $sql="select * from blog  LIMIT ". $this_page_first_result. "," . $results_per_page;
         $res=$db_handle->pagen($sql); 
                    if (! empty($res)) {
                        foreach ($res as $k) {
                            ?>
          <tr>
                    <td><?php echo $k['title']; ?></td>
                    <td><?php echo $k['description']; ?></td>
                    <td><?php echo $k['published_date']; ?></td>
                    <td><?php echo $k['author']; ?></td> 
                    <td><?php echo $k['email']; ?></td> 
                    <td><a href="index.php?action=editadmin&blogid=<?php echo $k['blogid']; ?>">Edit</a></td>
                    <td><a href="index.php?action=deleteadmin&blogid=<?php echo $k['blogid']; ?>" onclick="return confirm('Are you sure?')">Delete</a></td>
          </tr>
                    <?php
                        }
                    }
                    else
                   echo "There is no record to fetch";
                    ?>
</table><br/>
<?php
                for($page=1;$page<=$number_of_pages;$page++)
                   {
                       echo '<a href="index.php?action=adminpage&page='.$page.'">'.$page.'</a>';
                   }
                   ?>
                   <br/><br/>
<a href="index.php?action=logout">Logout</a>