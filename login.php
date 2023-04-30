<?php 

    include("includes/db.php");
    include("includes/header.php");
    session_start();
    if (isset($_SESSION['email'])) {
        header('Location: index.php');
        exit();
    }
    $name = $_POST['name'];
    $email = $_POST['email'];        

    $sql   = "SELECT serial, name, email FROM CUSTOMERS WHERE name = '$name' AND email = '$email'";
    $query = mysql_query($sql);
    $get   = mysql_fetch_array($query);
    $count = mysql_num_rows($query);
    
    
    if($name !=="" || $email !==""){
        if($name == $get['name'] && $email == $get['email']){
            if ($count > 0) {
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $email;
                $_SESSION['customerID'] = $get['serial'];
                header('Location: index.php');
                exit();
            }
        }else{echo"<div class='warning'>الأســــم أو البريـــد الإلكترونــى<strong> خطــــأ </strong></div>";}
    }else{echo"<div class='warning'>يجـب إدخال الاســم و البريـــد الإلكترونــى</div>";}
    



?>

    <div class="card"> 
        <h2>تسجيــل الدخـــــول</h2>
        <form action="?" method="POST" class="form"></p>
            <p>الاســم<input type="text"  name="name" class="input"/></p>
            <p>البريد الألكترونى<input type="text" name="email" class="input"/></p>
            <input type="submit" value="دخــــول" class="btn" />
            <a class="btn" href="register.php">تسجيل حساب جديد</a>
        </form>
    </div>

<?php include("includes/footer.php");?>