<?php
// задания 1-3
class Product {
  public $title;
  public $coast;
  public $date;

  function __construct($title, $coast) {
    $this->title = $title;
    $this->coast = $coast;
    $this->date = date("dS F Y");
  }

  public function print() {
    echo
      "<h2>$this->title</h2>" .
      "<p>$this->coast руб.</p>" .
      "<p>$this->date</p>";
  }
}

$product1 = new Product('Ботинки', 2000);
$product1->print();


// задание 4
class LimitedProduct extends Product{
  public $count = 100;
  public function fullPrint() {
    $this->print();
    echo "<p>Количество на складе: $this->count</p>";
  }
}

$product2 = new LimitedProduct('Носки', 200);
$product2->fullPrint();

// задание 5
// выведет с 1 до 4 т.к. a1 и a2 созданы классом со статической переменной

// задание 6
// выведет с 1122 т.к. a1 и a2 созданы разными классами с собственными статическими переменными

// задание 7 не отличается от 6