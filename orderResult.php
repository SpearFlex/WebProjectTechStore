<?php




   date_default_timezone_set('America/New_York');
   session_start();
   require_once 'dbconnect.php';

	//Get customerID.
   $id = $_SESSION['userSession'];
   $query = $DBcon->query("SELECT customerName, customerAddress, customerPhone, customerEmail FROM Customers WHERE customerID='$id'");
   $row = $query->fetch_array();

   $name = $row['customerName'];
   $address = $row['customerAddress'];
   $phone = $row['customerPhone'];
   $email = $row['customerEmail'];
?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>


      <?php
         echo "<p style=\"text-align: center\">Заказ обработан ".date('H:i, jS F Y')."</p>";

         echo "<p style=\"text-align: center\"> Получатель: <b>$name</b> </p>" ;

         echo "<p style=\"text-align: center\"> Адрес доставки: <b>$address</b></p>" ;

         echo "<p style=\"text-align: center\"> Номер телефона: <b>$phone</b> </p>" ;

         echo "<p style=\"text-align: center\"> Адрес электронный почты: <b>$email</b> </p>" ;



         echo "<p style=\"text-align: center\"><h1 style=\"color: black;\"> Ваш заказ: </h1></p>";

      $total = 0;


		//If cart is not empty. Display item.
      if(!empty($_SESSION["cart"]))
      {

         foreach($_SESSION["cart"] as $keys => $values)
         {
            echo '<center>';
            echo '<p> Заказанный товар: <b>'. $values["item_name"]. '</b></p>';
            echo '<p> Количество: <b>'. $values["item_quantity"]. '</b></p>';
            echo '<p> Цена: <b>'. $values["product_price"]. ' рублей'.  '</b></p>';
            echo '<br>';
            echo '</center>';

			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}

	}

      ?>


      </table>
    </div>
	<center>
	<div>
		<h3><u><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>Итого: </u> <?php echo number_format($total); ?> рублей </h3>
		<br>
      <h2 style="color: red">Спасибо что выбрали SpearLex Tech Store!</h2>
      <h2><a id="continue" href="product.php"> Нажмите здесь чтобы вернуться к товарам</a></h2>
      
	</div>
	</center>
   
<?php require('footer.php'); ?>

<?php
 //Clear the cart after checked out.

 unset($_SESSION['cart']);

?>