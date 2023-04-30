<?php
$con = mysql_connect('localhost','root','');
$sql    = 'CREATE DATABASE shopping';
$query  = mysql_query( $sql );

mysql_select_db('shopping') or die(' error');

$sql    = 'CREATE TABLE customers(
  serial int NOT NULL auto_increment PRIMARY KEY,
  name varchar(20) NOT NULL,
  email varchar(80) NOT NULL,
  address varchar(80) NOT NULL,
  phone varchar(11) NOT NULL)';
  $query  =  mysql_query( $sql );


$sql = 'CREATE TABLE products(
  serial int NOT NULL auto_increment PRIMARY KEY,
  name varchar(30) NOT NULL,
  description varchar(255) NOT NULL,
  price float NOT NULL,
  picture varchar(80) NOT NULL)';
$query  =  mysql_query( $sql );

  $sql    = 'delete from products ';
    $query  =  mysql_query( $sql );

$sql = 'CREATE TABLE orders(
  serial int NOT NULL auto_increment PRIMARY KEY,
  odate date NOT NULL,
  customerid int NOT NULL)';
$query  =  mysql_query( $sql );

$sql = 'CREATE TABLE order_detail(
  orderid int NOT NULL,
  productid int NOT NULL,
  quantity int NOT NULL,
  price float NOT NULL)';
$query  =  mysql_query( $sql );

$sql="insert into customers(name,email,address,phone) values('admin','admin@yahoo.com','sohag','0112345678')";
$query  =  mysql_query( $sql );



 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart Watch X8 Ultra Series 8 49mm','Body temperature monitoring with Bluetooth wireless connection',800,'images/1.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart sports watch for men and women from SK Homemakers ','It supports Bluetooth with a 1.3-inch screen and is equipped with a daily activity tracker, heart rate and blood pressure sensor, and is suitable for boys and girls',300 ,'images/2.png')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES( 'Smart Watch Series 5 T500','Full screen, Bluetooth, heart rate monitoring, compatible with Apple, IOS and Android mobile phones',500,'images/3.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Fit Life JR-FT3 Series Smart Watch','Joyroom Pro for answering and making calls dark grey',1300,'images/4.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('FT50 smart watch with 1.54 inch full touch screen','Works with Bluetooth and displays notifications, has a detachable silicone bracelet, compatible with Android and IOS - size 44 mm, black color',500 ,'images/5.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('HW22 Plus smart watch with touch screen','Rotary Adjust Switch Fitness and Health Tracker Support Bluetooth Calls Wireless Charging Support Arabic Language Android IOS',900,'images/6.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Samsung Galaxy Watch 5 Pro smart watch','Health monitor and fitness tracker with long lasting battery and 45mm size, titanium gray',12300 ,'images/7.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart watch X8 Ultra with 2 inch HD touch screen for men and women','Smart watch X8 Ultra with 2 inch HD touch screen for men and women',820 ,'images/8.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Huawei GT Runner smart watch','HuScientific Driver, Accurate Real-time Heart Rate Monitoring, Marathon Trail Leveling, Lightweight, Comfortable, 2-Week Battery Runtime, Black, 46mm ',6300,'images/9.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart Watch for Women by Agbtech,','1.3 Inch Full Touch Screen Heart Rate Tracking Fitness Female Health Smart Watch Android IOS Outdoor Sports Water Resistant',3500,'images/10.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Mi Smart Watch, unisex, touch screen','Features Bluetooth technology for Android and iOS mobile phones with the function of measuring heart rate, blood pressure, blood oxygen measurement and tracking devices',300,'images/11.png')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Pip 3 Smart Fitness Tracker Watch with a large 1.69 inch screen','14 days of playback / more than 60 sports modes / heart rate and blood oxygen monitoring / water resistance',2000,'images/12.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Band 6 fitness tracker','Honor, 1.47 inch AMOLED screen - Black',1700,'images/13.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('T5S smart watch for fitness tracking','Equipped with a step counter, heart rate monitor and Bluetooth for Android and IOS - full support for the Arabic language - pink color',650,'images/14.jpg')";
$query  =  mysql_query( $sql );
 $sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart watch for women 2021 for compatible Android and iPhone phones','With Stainless Steel Band, 3 ATM Water Resistant Fitness Smart Watch with Sleep, Heart Rate, Blood Oxygen Monitor, Rose Gold',3600,'images/15.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('The original Nabi watch for children','Z7A, Black, Medium, Plastic',815,'images/16.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('X8 Ultra Wireless Smart Watch','NFC Video Control and Temperature Monitoring, Sport Edition, Black',800,'images/17.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Huawei Watch GT 2 (46mm), AMOLED Smart Watch','1.39-inch 3D glass, 2-week battery life, GPS, SpO2 blood oxygen meter with 15 sports modes, Bluetooth connection, Pebble Brown',7500,'images/18.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('x8 Ultra Smart Watch Series 8 49mm','SamNFC Body Temperature Monitor Bluetooth Call Wireless IOS & android (white)',720,'images/19.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Apple Watch Series 8','(41mm GPS) - Silver Aluminum Case with White Sport Band',17000,'images/20.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Huawei GT Runner smart watch','Scientific Driver, Accurate Real-time Heart Rate Monitoring, Marathon Trail Leveling, Lightweight, Comfortable, 2-Week Battery Runtime, Black, 46mm',6500,'images/21.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('AGBTech smart watch for women','LW11 1.3 Inch Full Touch Screen Heart Rate Fitness Tracker Female Health Smart Watch Outdoor Sports Android IOS Waterproof IP68',3500,'images/22.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Pip 3 Smart Fitness Tracker Watch with a large 1.69 inch screen','Pip 3 Smart Fitness Tracker Watch with a large 1.69 inch screen',2000,'images/23.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart Watch X7 Pro Max','Wireless rechargeable - black',1100,'images/24.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Huawei Watch GT 2 (46mm), Smart Watch','1.39 inch 3D AMOLED glass screen, 2 weeks battery life, GPS, SpO2 blood oxygen meter with 15 sports modes, Bluetooth connection, Pebble Brown',8000,'images/25.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('DT95 smart watch with Bluetooth calling feature','1.3 Inch Round Touch Screen Heart Rate Monitor for Android and IOS Devices - Black',700,'images/26.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Smart Watch S1 Active 1.43 inch AMOLED Touch Screen 117g','Xiaomi Fitness Mode, 200+ Watch Faces, Bluetooth, Answering Calls, NFC Support, White (XM100023-99)',4400,'images/27.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('2 in 1 smart watch bluetooth fitness tracker','Wireless 2-in-1 LT04 T90 Waterproof IP67 Dust and Water Sphygmomanometer (A)',1000,'images/28.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('1.64 inch waterproof smart watch','Huawei Fit Elegant AMOLED touch screen - Midnight Black - Local warranty',5500,'images/29.jpg')";
$query  =  mysql_query( $sql );
$sql = "INSERT INTO products(name ,description ,price ,picture) VALUES('Samsung Galaxy Watch 5 smart watch','With Bluetooth technology, a health monitor and a fitness tracker with a long-lasting battery, pink gold, size 40 mm',8300,'images/30.jpg')";
$query  =  mysql_query( $sql );



 $sql    = 'select * from products ';
    $query  =  mysql_query( $sql );
print "<table border=1 bgcolor=red>";


while($a =mysql_fetch_row($query) )
{
Print "<tr><td>".$a[0]."</td>";
Print     "<td>".$a[1]."</td>";
Print     "<td>".$a[2]."</td>";
Print     "<td>".$a[3]."</td>";
Print     "<td>".$a[4]."</td></tr>";
}
Print "</table>";


  mysql_close();
?>

