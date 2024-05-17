<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width">
</head>
<body>

<div class="wrap" style="margin-top:-3px">
<span class="decor"></span>
<nav>
  <ul class="primary">
    <li>
      <a href="home.php">Главная страница</a>
    </li>
    <li>
      <a href="product.php">Товары</a>
    </li>
    <li>
      <a href="yourcart.php">Корзина</a>
    </li>
    <li>
      <?php if (isset($_SESSION['userSession'])!=""): ?>
        <a href="index.php">Профиль</a>
      <?php else: ?>
        <a href="index.php">Войти в аккаунт</a>
      <?php endif; ?>
    </li>
     <li>
      <a href="aboutus.php">О нас</a>
    </li>
     <li>
      <a href="payment.php">Оплата и доставка</a>
    </li>
  </ul>
</nav>
</div>

</body>
</html>