<?php
    session_start();
    include("includes/db.php");
    include("includes/functions.php");
    include("includes/header.php");

    if( isset($_POST['command'])) {
        if($_POST['command']=='delete' && $_POST['pid']>0){
            remove_product($_POST['pid']);
            if(empty($_SESSION['cart'])){
                unset($_SESSION['cart']);
            }
        }else if($_POST['command']=='clear'){
            unset($_SESSION['cart']);
        }else if($_POST['command']=='update'){
            $max=count($_SESSION['cart']);
            for($i=0;$i<$max;$i++){
                $pid=$_SESSION['cart'][$i]['productid'];
                $q=intval($_POST['product'.$pid]);
                if($q>0 && $q<=99){
                    $_SESSION['cart'][$i]['qty']=$q;
                }else{?>
                    <script>
                        alert("يجــب أن تكــون الكـميــة أكبـر مـن 0 و أصغـر مـن 99")
                    </script>
                <?php
                }
            }
        }
    }
?>
<script language="javascript">
    function del(pid){
        if(confirm('هل تريد حذف هـذا المنتج من السلــة ؟')){
            document.form1.pid.value=pid;
            document.form1.command.value='delete';
            document.form1.submit();
        }
    }

    function clear_cart(){
        if(confirm('هل تريد حذف كل المنتجات من سلة المشتريات ؟')){
            document.form1.command.value='clear';
            document.form1.submit();
        }
    }

    function update_cart(){
        document.form1.command.value='update';
        document.form1.submit();
    }
</script>
    <h2>سـلـــــة المشتريــــات</h2>
    <form name="form1" method="post">
        <input type="hidden" name="pid" />
        <input type="hidden" name="command" />
        <input class="btn"  type="button"  value="أسـتكمــال التســـوق"
            onclick="window.location='index.php'" />
        <div class="cart_info">
            <table >
                <thead>
                <?php if(is_array($_SESSION['cart'])){ ?>
                    <tr class="cart_menu">
                        <td># الترتيــب </td>
                        <td>اســم المنتج</td>
                        <td>الســعر</td>
                        <td>الكميــة</td>
                        <td>اجمالى السعر</td>
                        <td>حــــــذف</td>
                    </tr>
                </thead>
                <tbody>

                <?php
                    $max=count($_SESSION['cart']);
                    for($i=0;$i<$max;$i++){
                        $pid=$_SESSION['cart'][$i]['productid'];
                        $q=$_SESSION['cart'][$i]['qty'];
                        $pname=get_product_name ($pid);
                        if($q==0) continue; ?>
                    <tr>
                        <td><?php echo $i+1;?></td>
                        <td><h4><?php echo $pname;?></h4></td>
                        <td><p>$<?php echo get_price($pid);?></p></td>
                        <td class="cart_quantity">
                            <input type="number" name="product<?php echo $pid;?>" value="<?php echo $q;?>"
                               maxlength="2" size="2" />
                        </td>
                        <td class="cart_total">
                            <p>$<?php echo get_price($pid)*$q?></p>
                        </td>
                        <td class="cart_delete">
                            <a href="javascript:del(<?php echo $pid;?>)">حـــذف</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <tr>
                        <td><h4>الأجمـالــــــى : <?php echo get_order_total()?>$</h4></td>
                        <td colspan="8"><hr style="border:1px Solid #a1a1a1;"></td>
                    </tr>
                    <tr>
                        <td colspan="8">
                            <a class="btn" onclick="update_cart()">تحــديـث السلــة</a>
                            <a class="btn" onclick="clear_cart()">حـذف سـلـة المشتريـــات <a/>
                            <a class="btn" onclick="window.location='billing.php?order=done'"> أشـتــــــرى الأن <a/>
                        </td>
                    </tr>
                </tbody>
                <?php } else{
                    echo "<tr class='warning'><td>لا يوجــد أى منتــج فى سلــة المشتريــات</td>";
                    }
                ?>
            </table>

        </div>
    </form>
<?php include("includes/footer.php"); ?>
