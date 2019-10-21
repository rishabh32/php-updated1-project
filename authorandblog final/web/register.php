<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
function validation()
{
var a = document.form.firstname.value;
var b = document.form.lastname.value;
if(a=="")
{
alert("Please Enter Your FirstName");
document.form.firstname.focus();
return false;
}
if(!isNaN(a))
{
alert("Please Enter Only Characters");
document.form.firstname.select();
return false;
}
if(b=="")
{
alert("Please Enter Your LastName");
document.form.lastname.focus();
return false;
}
if(!isNaN(b))
{
alert("Please Enter Only Characters");
document.form.lastname.focus();
return false;
}
var emailID = document.form.email.value;
         atpos = emailID.indexOf("@");
         dotpos = emailID.lastIndexOf(".");
         
         if (atpos < 1 || ( dotpos - atpos < 2 )) {
            alert("Please enter correct email ID")
            document.form.email.focus() ;
            return false;
         }
         return( true );
}
</script>
</head>
<body>
<center>
<h1>Registration Form</h1><br/><br/>
<form name="form" action="index.php?action=registerintodatabase" method="POST" onsubmit="return validation()">
<table cellspacing=10>
<tr><td>Firstname:</td><td> <input type="text" name="firstname" required></td></tr>
<tr><td>Lastname: </td><td><input type="text" name="lastname" required></td></tr>
<tr><td>Email:</td><td> <input type="email" name="email" required></td></tr>
<tr><td>Password:</td><td> <input type="password" name="password" required></td></tr>
<tr><td>DOB:</td><td> <input type="datetime-local" name="dob" required></td></tr>
<tr><td>Gender:</td><td> <input type="radio" name="gender" value="male" checked> Male<br>
  <input type="radio" name="gender" value="female"> Female<br>
  <input type="radio" name="gender" value="other"> Other<br/><br/>
  <tr><td>Phoneno:</td><td> <input type="tel" name="phoneno" pattern="[0-9]{10}" required></td></tr>
  <tr><td colspan=2><input type ="checkbox" name="agree" required>I agree that above data is correct</td></tr>
  <tr><td align=center><input type="submit" value="Register"></td>
  <td align=center><input type="reset" value="Reset"></td></tr>
</table>
</form>
</center>
</body>
</html>