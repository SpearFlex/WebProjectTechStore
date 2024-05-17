<?php /* Khoi Hoang - Team 3 */ ?>

<?php
session_start();
require_once 'dbconnect.php';
?>

<?php require('header.php'); ?>

<?php require('menu.php'); ?>


    <h2 style="text-align: center; color: blue;">Ваша корзина</h2>
    <div>
    <table style="width: 100%">
    <tr>
    <th class="cart">Название товара</th>
    <th class="cart">Количество</th>
    <th class="cart">Цена</th>
    <th class="cart">Итог</th>
    <th class="cart">Удалить</th>
    </tr>
    <?php
	$total = 0;
    
    //If have something in the cart. Display it.
	if(!empty($_SESSION["cart"]))
	{
	
		foreach($_SESSION["cart"] as $keys => $values)
		{
			?>
            <tr class="cart">
            <td style="background-color: #d3dcf2"><?php echo $values["item_name"]; ?></td>
            <td class="cart"><?php echo $values["item_quantity"] ?></td>
            <td class="cart"><?php echo $values["product_price"]; ?> рублей</td>
            <td class="cart"><?php echo number_format($values["item_quantity"] * $values["product_price"], 2); ?> рублей</td>
            <td class="cart"><a id="delete" href="shop.php?action=delete&id=<?php echo $values["product_id"]; ?>"><span> X</span></a></td>
            </tr>
            <?php 
			$total = $total + ($values["item_quantity"] * $values["product_price"]);
		}
		
	}
	?>
    </table>
    </div>
	<center>
	<div>
		<h3>Итого:  <?php echo number_format($total); ?> рублей </h3>
		<h2><a id="checkout" href="checkout.php"> Нажмите здесь чтобы оформить заказ<br><br><br><br><br><br><br><br><br><br></a></h2>
	</div>
	</center>







<?php require('footer.php'); ?>