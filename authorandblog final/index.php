<?php
session_start();
require_once ("class/DBController.php");

$db_handle = new DBController();

$action = "";
//$blogid="";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}
switch ($action) {
    case "register":
            require_once "web/register.php";
            break;
    case "login":
            require_once "web/login.php";
            break;
    case "registerintodatabase":
            $pass=$_POST['password'];
            $email=$_POST['email'];
            $passw=md5($pass);        
            $sql="insert into auth(id,email,password) values('','$email','$passw')";
            $result=$db_handle->insert($sql);
            if($result==true)
            require_once "web/registerintodatabase.php";
            else
            require_once "web/error.php";
            break;
    case "checkauthor":
            $email=$_POST['email'];
            $pass=$_POST['password'];
            $passw=md5($pass);
            $sql="select * from auth where email='$email' and password='$passw'";
            $result=$db_handle->check($sql);
            if($result==true)
            {
            $_SESSION['email']=$email;
            require_once "web/createbloglink.php";
            }
            else
            require_once "web/error.php";
            break;
    case "bloglinkpage":
            require_once "web/bloglinkpage.php";
            break;
    case "blogcreated":
            $title=$_POST['title'];
            $description=$_POST['description'];
            $published_date=$_POST['published_date'];
            $author=$_POST['author'];
            $email=$_SESSION['email'];
           $sql="insert into blog values('','$title','$description','$published_date','$author','$email')";
           $result=$db_handle->insert($sql);
            if($result==true)
            {
                
               require_once "web/createbloglink.php";
            }
            else
            require_once "web/error.php";
            break;
      case "delete":
            $blogid=$_GET['blogid'];
            $sql="delete from blog where blogid='$blogid'";
            $result=$db_handle->insert($sql);
            if($result==true)
            require_once "web/blogsaved.php";
            else
            require_once "web/error.php";
            break;
      case "viewblogs":
            require_once "web/viewblogs.php";
            break;
      case "adminlogin":
            require_once "web/adminlogin.php";
            break;
      case "checkadmin":
            if($_POST['email']=="rishabh31yadav@gmail.com" && $_POST['password']=='rishabh')
            require_once "web/viewadmin.php";
            else
            require_once "web/error.php";
            break;
      case "deleteadmin":
                   $blogid=$_GET['blogid'];
                $sql="delete from blog where blogid='$blogid'";
                 $result=$db_handle->insert($sql);
                 if($result==true)
                require_once "web/viewadmin.php";
                else
                require_once "web/error.php";
                break;
      case "edit":
            $blogid=$_GET['blogid'];
            require_once "web/editblog.php";
            break;
      case "editadmin":
                 $blogid=$_GET['blogid'];
                 require_once "web/editblogadmin.php";
                 break;
      case "updateblog":
              $title=$_POST['title'];
            $description=$_POST['description'];
             $published_date=$_POST['published_date'];
             $author=$_POST['author'];
             $blogid=$_SESSION['blogid'];
           $sql="Update blog set title='$title',description='$description',published_date='$published_date',
                      author='$author' where blogid='$blogid'";
                  $result=$db_handle->insert($sql);
                 if($result==true)
                {
           
                        require_once "web/blogsaved.php";
                 }
                 else
                 require_once "web/error.php";
                break;
      case "updateblogadmin":
             $title=$_POST['title'];
             $description=$_POST['description'];
              $published_date=$_POST['published_date'];
              $author=$_POST['author'];
              $blogid=$_SESSION['blogid'];
             $sql="Update blog set title='$title',description='$description',published_date='$published_date',
                   author='$author' where blogid='$blogid'";
                 $result=$db_handle->insert($sql);
                if($result==true)
                {

                  require_once "web/viewadmin.php";
                }
                else
                require_once "web/error.php";
                break;
      case "page":
                $page=$_GET['page'];
                require_once "web/viewblogs.php";
                break;
      case "adminpage":
                   $page=$_GET['page'];
                    require_once "web/viewadmin.php";
                   break;
       case "logout":
                require_once "web/logout.php";
                break;         
    default:
            require_once "web/start.php";
            break;
                }
?>