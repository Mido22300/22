<?php
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/header.php");

    if(isset($_POST['command'])){
        if($_POST['command']=='add' && $_POST['productid']>0){
            $pid=$_POST['productid'];
            addtocart($pid,1);
            header("location: cart.php");
            exit();
        }
     }
?>
<script language="javascript">
    function addtocart(pid){
        document.form1.command.value='add';
        document.form1.productid.value=pid;
        document.form1.submit();
    }
</script>
<form name="form1" method="post">
    <input type="hidden" name="productid" />
    <input type="hidden" name="command" />
</form>
<h2>المنتجات</h2>
<?php
    $sql="select * from products";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query)){ ?>
    <div class="item">
        <img  src="<?php echo $row['picture']?>"/>
        <h3><?php echo $row['name']?></h3>
        <p><?php echo $row['description']?></p>
        <span>$<?php echo $row['price']?></span>
        <?php if(!empty($_SESSION['email'])){ ?>
        <a class="btn" onclick="addtocart(<?php echo $row['serial']?>)">أضـف إلـى الـسلـــة</a>
        <?php }else{echo "<a href='login.php'>قم بتسجيل الدخول اولا</a>";} ?>
    </div>

<?php } ?>

<?php include("includes/footer.php"); ?>
