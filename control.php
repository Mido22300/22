<?php
    include("includes/db.php");
    include("includes/header.php");

    if (isset($_SESSION['email'])) {
        session_start();
        session_unset($_SESSION['email']);
    }
    if (empty($_SESSION['admin'])) {
        header('Location: admin.php');
        exit();}

    $name        =  $_POST['name'];
    $price       =  floatval($_POST['price']);
    $description =  $_POST['description'];
    $picture     =  $_FILES['picture']['name'];
    $picture_tmp =  $_FILES['picture']['tmp_name'];
   /* $uploads_dir = '/uploads'; */
    move_uploaded_file($picture_tmp,$picture);

    $id = $_GET['id'];

    echo "<div class='card'>";
    switch ($_GET['do']) {
        case 'Add':
            echo "<h2>أضافـــة منتــج جديـــد</h2>"; ?>
            <form action="?do=doAdd" method="POST" enctype="multipart/form-data" class="form"></p>
                <p>عنـــــوان المنتج<input type="text" name="name" class="input"/></p>
                <p>وصـف المنتج<textarea rows="5" cols="30" name="description" class="input"></textarea></p>
                <p>سعــــر المنتج<input type="number" name="price" class="input"/></p>
                <p>صــورة المنتج<input type="file" accept="image/*" onchange="load_image()" name="picture" class="input"/>
                    <img id="imageView"/></p>
                <p><input type="submit" value="أضافـــــة" class="btn" /></p>
            </form>
            <script>
                var load_image = function() {
                var imageView = document.getElementById('imageView');
                imageView.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>
            <?php
            break;

        case 'doAdd':
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                $form_validate = array();
                if (empty($name))   { $form_validate[] = "لا يجب ترك حقل العنوان فارغ";}
                if (empty($description)) { $form_validate[] = "لا يجب ترك حقل الوصف فارغ"; }
                if (empty($price)) { $form_validate[] = "لا يجب ترك حقل السعــر فارغ"; }
                if (empty($picture)) { $form_validate[] = "لا يجـب تــرك حقـــل الصــورة فارغ"; }

                foreach ($form_validate as $_ERROR) {
                    echo "<div class='warning'>" . $_ERROR . "</div>";
                }

                if (empty($form_validate)) {

                    $sql = "INSERT INTO products (name,description,price,picture) VALUES ('$name', '$description','$price', '$picture')";

                    if (mysql_query($sql)) {
                        echo "<div class='success'><strong>تــم إضـافــة المنتـــج</strong></div>";

                        echo '<meta http-equiv="refresh" content="3;control.php" />';
                    } else {
                        echo "<div class='warning'>".mysql_error()."<i>هناك خطـــأ...لـم يتــم الاضافــة</i></div>";
                    }
                }else{echo "<a href='?do=Add' class='btn'>رجـــــوع</a>";}
            }
            break;

        case 'edit':

            echo "<h2>صفحـــة التـعـديـــل</h2>";

            $sql = "SELECT * FROM products WHERE serial =".$id;

            $query = mysql_query($sql);

            $row   = mysql_fetch_array($query); ?>

            <form action="?do=doEdit&id=<?php echo $id;?>" method="POST" enctype="multipart/form-data" class="form"></p>
               <p>عنـــــوان المنتــج<input type="text" value="<?php echo $row['name']; ?>" name="name" class="input"/></p>
               <p>وصـــف المنتــج<textarea rows="5" cols="30" name="description" class="input"><?php echo $row['description']; ?></textarea></p>
               <p>سعــر المنتــج<input type="text" value="<?php echo $row['price']; ?>" name="price" class="input"/></p>
                <p>صــورة المنتــج<input type="file" accept="image/*" onchange="load_image()" name="picture" class="input"/>
                            <input type="hidden" value="<?php echo $row['picture']; ?>" name="oldpic"/>
                            <img src="uploads/<?php echo $row['picture']; ?>" id="imageView"/></p>
                <p><input type="submit" value="حفـــظ" class="btn" /></p>
            </form>
            <script>
              var load_image = function() {
                var imageView = document.getElementById('imageView');
                imageView.src = URL.createObjectURL(event.target.files[0]);
              };
            </script>

            <?php
            break;

        case 'doEdit':
            if ($_SERVER['REQUEST_METHOD']=='POST') {

                if(empty($picture)){$picture = $_POST['oldpic'];}

                $form_validate = array();
                if (empty($name))   { $form_validate[] = "لا يجب ترك حقل العنوان فارغ";}
                if (empty($description)) { $form_validate[] = "لا يجب ترك حقل الوصف فارغ"; }
                if (empty($price)) { $form_validate[] = "لا يجب ترك حقل السعــر فارغ"; }

                foreach ($form_validate as $_ERROR) {
                    echo "<div class='warning'>" . $_ERROR . "</div>";
                }

                if (empty($form_validate)) {
                    $sql = "UPDATE products SET name = '$name', description = '$description', price = $price, picture = '$picture' WHERE serial = '$id'";

                   if (mysql_query($sql)) {
                       echo "<div class='success'><i>تــم التحديث</i></div>";
                        echo '<meta http-equiv="refresh" content="3;control.php" />';
                   } else {
                       echo "<div class='warning'>".mysql_error()."<i>هناك خطـــأ...لـم يتــم التحديث</i></div>";
                    }
                }else{echo "<a href='control.php?do=edit&id=$id' class='btn'>رجـــــوع</a>";}
             } else {
                    header('Location: control.php');
                    exit();
                }
            break;

        case 'delete':
            if(isset($_GET['id'])) {

                $sql = "DELETE FROM products WHERE serial = ".$id;
                if (mysql_query($sql)) {
                    echo "<div class='success'><strong> تـم حــذف المنتــج رقــم ".$id."</strong></div>";
                    echo '<meta http-equiv="refresh" content="3;control.php" />';
                } else {
                    echo "<div class='warning'>".mysql_error()."<i>هناك خطـــأ...لـم الحــــذف</i></div>"; // عرض الخطأ
                }
            }

            break;

        default:
            $sql       = "SELECT * FROM products";
            $query     = mysql_query($sql);
            $count     = mysql_num_rows($query); ?>

            <h2>التحكــم بالمنتجـــــات</h2>
            <div style="float:left" >
                <h3>مــرحـبــــــــا  <?php echo $_SESSION['admin'];?></h3>
                <h4><a class="btn" href="logout.php">تسجيل الخروج</a></h4>
            </div>
            <table>
                <h4>عـــدد المنتجـــــات : <?php echo $count; ?></h4>
                <h5><a class="btn" href="?do=Add">أضافــة منتــج جـديـــد</a></h5>
                <?php if($count > 0){ ?>
                <tr align="center">
                    <td>رقــــم المنتج</td>
                    <td>اســــم المنتج</td>
                    <td>سعــــر المنتج</td>
                    <td></td>
                    <td></td>
                </tr>
                <?php while($row = mysql_fetch_array($query)) { ?>
                <tr>
                    <td><?php echo $row['serial']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><a href="?do=edit&id=<?php echo $row['serial']; ?>">تعديـــــل</a></td>
                    <td><a href="?do=delete&id=<?php echo $row['serial']; ?>" onclick="if(confirm('هـل تريــد حـــذف هــذا..؟')) return ture; else return false;">حـــــــذف</a></td>
                </tr>
                <?php } }else{echo "<div class='warning'>لايوجـــــد أى منتجــــات <b>قـم بلإضـافـــة</b></div>";} ?>
            </table>
            <?php } ?>
</div>
<?php include 'includes/footer.php';  ?>


