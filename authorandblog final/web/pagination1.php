<?php
        require_once ("class/DBController.php");
        $db_handle = new DBController();
    $results_per_page=2;
     $sql="select * from blog";
     $result=$db_handle->pagen($sql);
     $number_of_results=mysqli_num_rows($result);
     $number_of_pages=ceil($number_of_results/$results_per_page);
     if(!isset($_GET['page']))
     $page=1;
     else
     $page=$_GET['page'];
     $this_page_first_result=($page-1)*$results_per_page;
     $sql="select * from blog LIMIT ". $this_page_first_result. "," . $results_per_page;
     $result=$db_handle->pagen($sql); 
    ?>                
                  