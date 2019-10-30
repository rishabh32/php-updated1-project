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
            if(isset($_POST['firstname']))    
            {
                    $firstname=$_POST['firstname'];
            }
            if(isset($_POST['password']))  
            {  
            $pass=$_POST['password'];
            $passw=md5($pass);
            }
            if(isset($_POST['email'])) 
            {
            $email=$_POST['email'];
            }       
            $sql="insert into auth values('','$firstname','$email','$passw')";
            $result=$db_handle->insert($sql);
            if($result==true)
            require_once "web/registerintodatabase.php";
            else
            require_once "web/error.php";
            break;
    case "checkauthor":
            if(isset($_POST['email']))
            { 
            $email=$_POST['email'];
            }
            if(isset($_POST['password']))
            {
            $pass=$_POST['password'];
            $passw=md5($pass);
            }
            $sql="select * from auth where email='$email' and password='$passw'";
            $result=$db_handle->getid($sql);
            if($result!=NULL)
            {
            $_SESSION['email']=$email;
           // $sql="select id from auth where email='$email'";
           // $result=$db_handle->getid($sql);
           foreach($result as $k)
           {
                 $_SESSION['id']=$k['id'];
           }
           // $id= $_SESSION['id'];
            require_once "web/createbloglink.php";
            }
            else
            require_once "web/error.php";
            break;
    case "bloglinkpage":
            require_once "web/bloglinkpage.php";
            break;
    case "blogcreated":
            if(isset($_POST['title']))
            {
            $title=$_POST['title'];
            }
            if(isset($_POST['description']))
            {
            $description=$_POST['description'];
            }
            if(isset($_POST['published_date']))
            {
            $published_date=$_POST['published_date'];
            }
            if(isset($_POST['author']))
            {
            $author=$_POST['author'];
            }
            $id=$_SESSION['id'];
            $email=$_SESSION['email'];
            $image=$_FILES['image']['name'];
            $targetpath="images/".basename($image);
            $temporary=$_FILES['image']['tmp_name'];
            move_uploaded_file($_FILES['image']['tmp_name'], $targetpath);
           // $img = file_get_contents($image);
           $sql="insert into blog values('','$title','$description','$published_date','$author','$email','$image','$id')";
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
            require_once "web/viewblogs.php";
            else
            require_once "web/error.php";
            break;
      case "viewblogs":
            require_once "web/viewblogs.php";
            break;
      case "viewblogsadmin":
            require_once "web/viewadmin.php";
            break;
      case "adminlogin":
            require_once "web/adminlogin.php";
            break;
      case "viewusers":
            require_once "web/viewusers.php";
            break;
      case "checkadmin":
            if($_POST['email']=="rishabh31yadav@gmail.com" && $_POST['password']=='rishabh')
            require_once "web/viewadminhome.php";
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
      case "deleteuser":
            $id=$_GET['id'];
            $sql1="delete from blog where id='$id'";
            $result1=$db_handle->delete($sql1);
            $sql="delete from auth where id='$id'";
            $result=$db_handle->delete($sql);
                 if($result1==true && $result==true)
                require_once "web/viewusers.php";
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
                 if(isset($_POST['title']))
                 {
                 $title=$_POST['title'];
                 }
                 if(isset($_POST['description']))
                 {
                  $description=$_POST['description'];
                 }
                 if(isset($_POST['published_date']))
                 {
                 $published_date=$_POST['published_date'];
                 }
                  if(isset($_POST['author']))
                {
                  $author=$_POST['author'];
                  }
             $blogid=$_SESSION['blogid'];
             $image=$_FILES['imag']['name'];
            $targetpath="images/".basename($image);
            $temporary=$_FILES['imag']['tmp_name'];
            move_uploaded_file($_FILES['imag']['tmp_name'], $targetpath);
           $sql="Update blog set title='$title',description='$description',published_date='$published_date',
                      author='$author',image='$image' where blogid='$blogid'";
                  $result=$db_handle->insert($sql);
                 if($result==true)
                {
           
                        require_once "web/viewblogs.php";
                 }
                 else
                 require_once "web/error.php";
                break;
      case "updateblogadmin":
                 if(isset($_POST['title']))
                 {
                 $title=$_POST['title'];
                 }
                 if(isset($_POST['description']))
                 {
                  $description=$_POST['description'];
                 }
                 if(isset($_POST['published_date']))
                 {
                 $published_date=$_POST['published_date'];
                 }
                 if(isset($_POST['author']))
                 {
                  $author=$_POST['author'];
                 }
              $blogid=$_SESSION['blogid'];
              $image=$_FILES['imag']['name'];
              $targetpath="images/".basename($image);
              $temporary=$_FILES['imag']['tmp_name'];
              move_uploaded_file($_FILES['imag']['tmp_name'], $targetpath);
             $sql="Update blog set title='$title',description='$description',published_date='$published_date',
                   author='$author',image='$image' where blogid='$blogid'";
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