<?php
require_once 'class.php';

$product1 = new Product("Джинси", "Палаццо чорні", 900);
$product2 = new Product("Худі", "Oversized з принтом", 600);
$product3 = new Product("Футболка", "Біла з короткими рукавами", 500);

$discountedProduct1 = new DiscountedProduct("Куртка", "Шкіряна коричнева", 3300, 15);
$discountedProduct2 = new DiscountedProduct("Шапка", "Зимова біла з блискітками", 450, 10);

echo "<h3 style='font-size: 20px;'>Товари:</h3>";
echo $product1->getInfo();
echo "<br>";
echo $product2->getInfo();
echo "<br>";
echo $product3->getInfo();
echo "<br>";
echo $discountedProduct1->getInfo();
echo "<br>";
echo $discountedProduct2->getInfo();
?>

<?php
$clothing = new Category("Одяг");

$clothing->addProduct($product1);
$clothing->addProduct($discountedProduct1);

$clothing->showProducts();
?>

