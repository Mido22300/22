<?php 

    include("includes/db.php");
    include("includes/header.php");
    session_start();

    $name = $_POST['name'];
    $password = $_POST['password'];        

    if(isset($_POST['submit'])){
        if($name !=="" || $pasword !==""){
            if($name == 'admin' && $password == 'admin'){
                $_SESSION['admin'] = $name;
                header('Location: control.php');
                exit();
            }else{echo"<div class='warning'>الأســــم أو كلمـة المــرور<strong> خطــــأ </strong></div>";}
        }else{echo"<div class='warning'>يجـب إدخال الأســــم أو كلمـة المــرور</div>";}
    }



?>

    <div class="card"> 
        <h2>تسجيــل دخــــول مديــر الموقــع</h2>
        <form action="?" method="POST" class="form"></p>
            <p>الاســم<input type="text"  name="name" class="input"/></p>
            <p>كلمـة المــرور<input type="text" name="password" class="input"/></p>
            <input type="submit" name="submit" value="دخــــول" class="btn" />
        </form>
    </div>

<?php include("includes/footer.php");?>