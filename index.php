<?php

class Transport {
    public $autoId;
    public $load;
    public $volume;
    public $length;
    public $width;

    public function __construct($autoId = null, $load = null, $volume = null, $length = null, $width = null) {
        $this->autoId = $autoId;
        $this->load = $load;
        $this->volume = $volume;
        $this->length = $length;
        $this->width = $width;
    }

    public function view() {
        echo "
              <h2>Карточка единицы автотранспорта:</h2>
              <b>Номер автомобиля в базе:</b> $this->autoId <br>
              <b>Грузоподъемность:</b> $this->load тонны <br>
              <b>Объем кузова:</b> $this->volume м3<br>
              <b>Длина кузова:</b> $this->length м<br>
              <b>Ширина кузова:</b> $this->width м<br>         
              ";
    }

    public function state($call) {
        $state = null;
        switch ($call) {
            case 'free':
                $state = 'Свободен';
                break;
            case 'busy':
                $state = 'Занят';
                break;
        }
        return "<b>Состояние автомобиля:</b> $state";
    }
}

class Order extends Transport {
    private $address;
    private $phoneNumber;
    private $orderId;

   public function __construct($autoId = null, $load = null, $volume = null, $length = null, $width = null, $address = null, $phoneNumber = null, $orderId = null) {
       parent::__construct($autoId, $load, $volume, $length, $width);
        $this->orderId = $orderId;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
   }

    public function view() {
        echo "
              <h2>Карточка заказа:</h2>
              <b>Номер заказа в базе:</b> $this->orderId <br>
              <b>Грузоподъемность:</b> $this->load тонны <br>
              <b>Объем кузова:</b> $this->volume м3<br>
              <b>Длина кузова:</b> $this->length м<br>
              <b>Ширина кузова:</b> $this->width м<br><br>
              <b>Адрес доставки:</b> $this->address <br>
              <b>Телефон клиента:</b> $this->phoneNumber<br>
              ";
    }

    function isTransportFree() {
       if ($state = 'free') {
           echo "Автомобиль свободен и заказ назначен автомобилю с id = {$this->autoId}<br><hr>";
       } else {
           echo "Автомобиль занят";
       }
    }
}

$auto1 = new Transport(1, 3, 10, 3, 2);
$auto1->view();

echo $auto1->state('free');

$order = new Order(1, 2, 5, 2, 1, 'Lenina 1', '8912345679', 1);

$order->view();
$order->isTransportFree();


// 
 // Выведет 1 т.к. стоит преинкремент переменной x
 // Выведет 2 т.к. перед переменной x стоит static
 // Выведет 3 т.к. перед переменной x стоит static
 // Выведет 4 т.к. перед переменной x стоит static

 // Выведет 1 т.к. стоит преинкремент переменной x
 // Выведет 1 т.к. для класса Б переменная х статична и не зависит от А
 // Выведет 2 т.к. переменная х отталкивается от класса А и не зависит от Б
 // Выведет 2 т.к. переменная х отталкивается от класса Б и не зависит от А