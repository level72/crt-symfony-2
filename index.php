<?php

class Order
{
	public $basket;
	public $price;

	public function __construct($Basket, $Price)
	{
		$this->basket = $Basket;
		$this->price = $Price;
	}

	public function getBasket()
	{
		return $this->basket;
	}

	public function getPrice()
	{
		$allPrice = $this->basket->getPrice() + $this->price;
		return $allPrice;
	}
}

class Basket
{
	public $basket = array();

	public function addProduct(Product $product, $quantity)
	{
		array_push($this->basket, $product, $quantity);
	}

	public function getPrice()
	{
		//разбил корзинку на два массива, выдрав прайс из объекта
		foreach ($this->basket as $val)
		{
			if (is_object($val))
			{
				$ar1[] = $val->getPrice();
			} else {
				$ar2[] = $val;
			}
		}
		//перемножил массивы прайса и количества в один массив, и сложил его
		$ar = array_map(function ($el1, $el2) {
			return $el1 * $el2;
		}, $ar1, $ar2);
		
		$ar = array_sum($ar);

		return $ar;
	}

	public function describe()
	{
		//собераю массивы цены одной позиции $arrayP, имён $arrayN иии количества $arrayQ
		foreach ($this->basket as $val)
		{
			if (is_object($val))
			{
				$ar1[] = $val->getPrice();
				$arrayN[] = $val->name;
			} else {
				$arrayQ[] = $val;
			}
		}
		$arrayP = array_map(function ($el1, $el2) {
			return $el1 * $el2;
		}, $ar1, $arrayQ);
		//
		for ($i=0; $i < count($arrayQ); $i++) { 
			echo "$arrayN[$i]" . " - " . "$arrayP[$i]" . " - " . "$arrayQ[$i]" . "<br>";
		}
	}
}

class BasketPosition
{
	public $product;
	public $quantity;

	public function __construct($Product, $Quantity)
	{
		$this->product = $Product;
		$this->quantity = $Quantity;
	}

	public function getProduct()
	{
		return $this->product->getName();
	}

	public function getQuantity()
	{
		return $this->quantity;
	}

	public function getPrice()
	{
		$posPrice = $this->product->getPrice() * $this->quantity;
		return $posPrice;
	}
}

class Product
{
	public $name;
	public $price;

	public function __construct($Name, $Price)
	{
		$this->name = $Name;
		$this->price = $Price;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getPrice()
	{
		return $this->price;
	}
}

//.................клиентский код.....................

//товары
$kotletki = new Product("котлетки", 40);
$makaroshki = new Product("макарошки", 20);
$pureshka = new Product("пюрешка", 30);

//позиции
$posOne = new BasketPosition($kotletki, 3);
// echo $posOne->getPrice() . "<br>";

//корзина
$basket = new Basket();
$basket->addProduct($kotletki, $posOne->quantity);
$basket->addProduct($makaroshki, 1);

$order = new Order($basket, 120);
echo "Заказ, на сумму: " . $order->getPrice() . " Состав:" . $basket->describe();
echo "<hr>";
?>

<form method="GET" action="/index.php">
	<input type="number" placeholder="id пользователя" name="id" value="<?=isset($_SESSION['id'])?$_SESSION['id']:""?>">
	<input type="text" placeholder="имя пользователя" name="name" value="<?=isset($_SESSION['name'])?$_SESSION['name']:""?>">
	<input type="number" placeholder="возраст пользователя" name="age" value="<?=isset($_SESSION['age'])?$_SESSION['age']:""?>">
	<input type="text" placeholder="email пользователя" name="email" value="<?=isset($_SESSION['email'])?$_SESSION['email']:""?>">
	<input type="submit" value="Отправить">
</form>

<?php

if (isset($_GET['id'])) {
	session_start();
	$_SESSION['id'] = $_GET['id'];
	$_SESSION['name'] = $_GET['name'];
	$_SESSION['age'] = $_GET['age'];
	$_SESSION['email'] = $_GET['email'];

class User
{
	public function load(int $id)
	{
		if (6 == $id)
		{
			throw new Exception("id не найден в базе данных");			
		}
	}

	public function save(array $data): bool
	{
		return rand(0, 1);
	}
}

class UserFormValidator
{
	public function validate(array $data)
	{
		if (empty($data['name']))
		{
			throw new Exception("Имя должно быть не пустым");
		}

		if ($data['age'] < 18)
		{
			throw new Exception("Возраст должен быть не менее 18 лет");
		}

		if (empty($data['email']))
		{
			throw new Exception("Email должен быть заполнен");
		}

		if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
		{
			throw new Exception("Email должен соответствовать формату email");			
		}
	}
}

$user = new User();
$userInvalid = new UserFormValidator();
try{
	$user->load($_GET['id']);
	try{ 
		$userInvalid->validate($_GET); 
		if ($user->save($_GET)) 
		{ 
			echo "Данные сохранены успешно"; 
			session_unset();
			session_abort();
		} else {
			echo "Ошибка! данные не сохранены";
		}
	}catch(Exception $e){ 
		echo $e->getMessage();
			} 
}catch(Exception $e){
	echo $e->getMessage();
	}

}
// $user->load($_GET['id']);
// $userInvalid->validate($_GET);
// $user->save($_GET);
 

$conn = mysqli_connect('127.0.0.1', 'root', 'root', 'db1');
if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


mysqli_close($conn);
?>