<?php

include("config.php");

if(isset($_POST['submit'])){
  
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    /*متغير يتاكد من الربط مع الداتابيس */
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

    $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
    /*ادخل على قاعدة الباينات  وتاكد من الايميل و الرقم السري */

    $result = mysqli_query($conn, $select);
    /*تتاكد اذا صح */

    if(mysqli_num_rows($result) > 0){
    /*اذا بيانات موجودة بينقلني */

   header('location:index.html');
    }else{
        $error[] = '!البريد الإلكتروني او كلمة المرور غير صحيحة ';
    }

};

?>

<!DOCTYPE html>
<html lang="Arabic" dir="rt1">
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Mada:wght@500&family=Noto+Sans+Arabic&display=swap" rel="stylesheet">
<link rel="stylesheet" href="./CSS/logo.css"> 
<link rel="stylesheet" href="CSS/stylelogin.css"/> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


<title>تسجيل الدخول</title>
</head>
<body>
<nav>
    
    <ul class="nav-items">
      <li class="nav-item">
        <a href="./index.html" class="nav-link">الصفحة الرئيسية</a>
      </li>
      <li class="nav-item">
        <a href="./homebook.html" class="nav-link">الأقسام </a>
      </li>
      <li class="nav-item">
        <a href="./sppoorrtt.html" class="nav-link">التواصل والدعم </a>
      </li>
    </ul>
	<from action ="" class="search-form">
	<label for="search=box" class="material-symbols-outlined"> search</label>
      <input type ="search" name="" placeholder="ابحث هنا...." id="search-box">
      
    </from>
	<div class="icons">
      <div id="search-btn" class="material-symbols-outlined"></div>
      <a href="./fav.html" class="material-symbols-outlined"> favorite</a>
      <a href="./cart.html" class="material-symbols-outlined">shopping_cart_checkout</a>
      <a href="./../php/login_form.php" class="material-symbols-outlined">person</a>
    </div>
	<div class="logo">
      <img src ="./../images/logo33.png" alt="logo">
    </div>
  </nav>  
<div class="form-continer">
<!---------------FORM-------------->
<form action="" method="post">
    <h3>تسجيل الدخول </h3>

    <?php 
if(isset($error)){
    foreach($error as $error){
        echo '<span class= "error-msg">'.$error.'</span>';
    };
    
};
    ?>

    <input type="email" name="email" required placeholder="ادخل البريد الألكتروني">
    <input type="password" name="password" required placeholder="ادخل كلمة المرور">
    <!--button-->
    <input type="submit" name ="submit" value="تسجيل الدخول " class="form_btn">
    <p> ليس لديك حساب ؟<a href="register_form.php">سجل الان</p>
</form>
</div>
<footer>
      <div class="footer-section">
        <p>جميع الحقوق محفوظة لمتجر ريشة 2023</p>
      </div>
    </footer>
</body>
</html>
