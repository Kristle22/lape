<?php


trait SayBay {
  public function sayBay() {
    echo 'By-bay';
  }
  // public function sayHello() {
    //   parent::sayHello();
    //   echo 'World!';
    // }
  }
  
  trait SayJa {
    public function sayJa() {
      echo 'Ja-ja-ja <br>';
    }
  }

  trait HelloK {
    public function sayHello() {
      echo 'Hello, Kitty! <br>';
    }
  }

  trait HelloR {
    public function sayHello() {
      echo 'Hello, Racoon! <br>';
    }
  }

  class Base {
    use sayBay, SayJa;
    
    public function sayHello() {
      echo 'Hello <br>';
    }
  }
  
  class MyHelloWorld extends Base {
    use HelloK, HelloR {
        HelloR::sayHello insteadOf HelloK;
        HelloK::sayHello as sayHelloKitty;
      }
    }
    
    // $o = new MyHelloWorld();
    
  $o = new MyHelloWorld;
  $o->sayHello();
  $o->sayHelloKitty();
  $o->sayJa();
  $o->sayBay();