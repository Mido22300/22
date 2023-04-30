<?php
    session_start();
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/header.php");

     if(isset($_GET['order']) && $_GET['order']=='done'){
        $customerid = $_SESSION['customerID'];
        $result     = mysql_query("insert into orders (customerid) values('$customerid')");
        $orderid    = mysql_insert_id();

        $max=count($_SESSION['cart']);
        for($i=0;$i<$max;$i++){
            $pid=$_SESSION['cart'][$i]['productid'];
            $q=$_SESSION['cart'][$i]['qty'];
            $price=get_price($pid)*$q;
            mysql_query("insert into order_detail values ($orderid,$pid,$q,$price)");
        }
        echo "<div class='success'>تــم تنفيـــــذ طلبـــــك  <strong>(:</strong></div>";
        echo '<meta http-equiv="refresh" content="3;billing.php" />';
     } else { ?>

    <div class="card">
        <h2>فـاتـــــورة المشتريــــات</h2>
        <table width="75%">
            <tr>
                <td># رقـــم العميـل</td>
                <td>اســـم العمـيــل</td>
                <td>البريــد الالكترونـــى</td>
                <td>إجمالـى المشتريــات </td>
            </tr>
            <tr>
                <td><?php echo $_SESSION['customerID'];?></td>
                <td><?php echo $_SESSION['name'];?></td>
                <td><?php echo $_SESSION['email'];?></td>
                <td>$<?php echo get_order_total();?></td>
            </tr>
        </table>
        <h4><a class="btn" href="index.php">رجــوع إلى الرئيسيــة</a></h4>
    </div>

<?php } include 'includes/footer.php'; ?>