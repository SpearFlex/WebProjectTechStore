<?php


session_start();
include_once 'dbconnect.php';

//If not logged in. Go back to index. Cannot see success page.
if (!isset($_SESSION['userSession'])) {
 header("Location: index.php");
}

//Getting user information as an array.
$query = $DBcon->query("SELECT * FROM Customers WHERE customerID=".$_SESSION['userSession']);
$userRow=$query->fetch_array();
$DBcon->close();

?>

<?php require('header.php'); ?>
<?php require('menu.php'); ?>


<h1 style="color: black; text-align: center;">Поздравляем! Вы вошли.</h1>


     
        
             <li style="list-style-type: none; float: none;"><a id="username" href="#"><span></span>&nbsp;Привет, <?php echo $userRow['customerName']; ?>&nbsp;<span></span></a></li>
             <li style="list-style-type: none; float: none;"><a id="logout" href="logout.php?logout"><span></span>&nbsp;Выйти</a></li>
       


<h3 style="text-align: center; text-decoration: none;"><a id="order" href="checkout.php"> Оформить заказ. <br><br><br><br><br><br><br><br><br></a></h3>

<?php require('footer.php'); ?>