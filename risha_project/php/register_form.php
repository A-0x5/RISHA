<?php

include("config.php");

if(isset($_POST['submit'])){
  
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
        /*تشفر الباينات md5 */

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
    /* برجع الصفوف الي في قاعده الباينات*/
        $error[] = ' ! المستخدم مسجل بالفعل';    
    }else{

        if ($pass !=$cpass){
            $error[] = '!كلمة المرور غير متطابقة '; 
        }else{
            $insert ="INSERT INTO user_form(name,email,password,user_type)VALUES('$name', '$email', '$pass','$user_type' )";
            mysqli_query($conn , $insert);
            header('location:login_form.php');

        }
    }

};

?>



<!DOCTYPE html>
<html lang="Arabic" dir="rt1">
<html>
<head>
<link rel="stylesheet" href="./CSS/logo.css"> 
<link rel="stylesheet" href="./CSS/stylelogin.css"/> 

<title>تسجيل جديد</title>
</head>
<body>

<div class="form-continer">
<!---------------FORM-------------->
<form action="" method="post">
    <h3>إنشاء حساب </h3>
    
    <?php 
if(isset($error)){
    foreach($error as $error){
        echo '<span class= "error-msg">'.$error.'</span>';
          /*بتتاكد اذ الايرور موجود او لا */
  
    };
 
};

    ?>
    <input type="text" name="name" required placeholder="اسمك طال عمرك">
    <input type="email" name="email" required placeholder="ادخل البريد الألكتروني">
    <input type="password" name="password" required placeholder="ادخل كلمة المرور">
    <input type="password" name="cpassword" required placeholder="تأكيد كلمة المرور">
    
    <!--button-->
    <input type="submit" name ="submit" value="تسجيل" class="form_btn" >
    <p>لديك حساب بالفعل؟ <a href="login_form.php">سجل الدخول</p>
</form>
</div>
<footer>
      <div class="footer-section">
        <p>جميع الحقوق محفوظة لمتجر ريشة 2023</p>
      </div>
    </footer>
</body>
</html>
