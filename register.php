<?php

    include("includes/db.php");
    include("includes/header.php");

    $sql   = "SELECT * FROM CUSTOMERS WHERE name = '$name' AND email = '$email'";
    $query = mysql_query($sql);
    $get   = mysql_fetch_array($query);

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        $name    = $_POST['name'];
        $email   = $_POST['email'];
        $phone   = $_POST['phone'];
        $address = $_POST['address'];

        $sql   = "SELECT email FROM CUSTOMERS WHERE email = '$email'";
        $query = mysql_query($sql);
        $get   = mysql_fetch_array($query);

        $form_validate = array();
        if (empty($name))   { $form_validate[] = "لا يجب ترك حقل الاســم فارغ";}
        if (empty($email)) { $form_validate[] = "لا يجب ترك حقل البريد الإلكترونى فارغ"; }
        if ($email == $get['email']) { $form_validate[] = "<b>أختر بريد أخر </b>هــذا البريد الإلكترونى مسجــل"; }
        if (empty($phone)) { $form_validate[] = "لا يجب ترك حقل رقم التليفون فارغ"; }
        if (empty($address)) { $form_validate[] = "لا يجـب تــرك حقـــل العنوان فارغ"; }

        foreach ($form_validate as $_ERROR) {
            echo "<div class='warning'>" . $_ERROR . "</div>";
        }

        if (empty($form_validate)) {
            $sql = "INSERT INTO customers (name,email,address,phone) VALUES ('$name', '$email','$phone', '$address')";
            if (mysql_query($sql)) {
                echo "<div class='success'><strong>تــم التسجيل بنجاح</strong></div>";

                echo '<meta http-equiv="refresh" content="3;login.php" />';
            } else {
                echo "<div class='warning'>
                        <i>هناك خطـــأ...لـم يتــم التسجيل</i>
                        <a href='register.php' class='link'>رجـــــوع</a>
                    </div>";
            }
        }else{echo "<a href='register.php' class='link'>رجـــــوع</a>";}
    }

?>

    <div class="card">
        <h3>تسجيــل حســـاب جـديـــد</h3>
        <form action="?" method="POST" class="form"></p>
            <p>الاســم<input type="text"  name="name" class="input"/></p>
            <p>البريد الألكترونى<input type="text" name="email" class="input"/></p>
            <p>العنـــــــوان<input type="text" name="address" class="input"/></p>
            <p>رقــــم التليفـــــون<input type="text" name="phone" class="input"/></p>
            <input type="submit" value="تسجيـــــــل" class="btn" />
            <a class="btn" href="login.php">تسجيل الدخول</a>
        </form>
    </div>

<?php include("includes/footer.php");?>
