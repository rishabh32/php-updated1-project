<?php
require_once ("class/DBController.php");
class pagination
{
    public $results_per_page=2;
    private $db_handle;
    function __construct()
    {
            $this->db_handle = new DBController();
    }
    
    public function no_of_pages($sql)
    { 
     $result=$this->db_handle->pagen($sql);
     $number_of_results=mysqli_num_rows($result);
     $number_of_pages=ceil($number_of_results/$this->results_per_page);
     return $number_of_pages;
    }

    public function first_result($sql)
    {
        $number_of_pages=$this->no_of_pages($sql);
        if(!isset($_GET['page']))
        $page=1;
        else
        $page=$_GET['page'];
        $this_page_first_result=($page-1)*$this->results_per_page;
        return $this_page_first_result;
    }
    public function user()
    {
        $sql="select * from blog where id='$_SESSION[id]'";
        $this_page_first_result=$this->first_result($sql);
        $sql="select * from blog where id='$_SESSION[id]' LIMIT ". $this_page_first_result. "," . $this->results_per_page;
        $result=$this->db_handle->pagen($sql); 
        return $result;
    }
    public function admin()
    {
        $sql="select * from blog";
        $this_page_first_result=$this->first_result($sql);
        $sql="select * from blog LIMIT ". $this_page_first_result. "," . $this->results_per_page;
        $result=$this->db_handle->pagen($sql); 
        return $result;
    }
}
?>