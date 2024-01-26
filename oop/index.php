<?php 
// Objected Oriented Programming OOP
// class - provides structure of an object
// object - instance of a class

//Access Modifiers
// 1. public : Anyone can access.
// 2. private : Only owner can access.
// 3. protected : Only relatives can access.

//OOP Pillars;

// 1. Inheritance.

// when a class inherit properties from another class.

// 2. Polymorphism.

// examples: + operator.


// 3. Encapsulation.

// Data 

// 4. Abstraction.
// examples: admin panel. facebook user changing profile picture.

//Parent
class Mobile{
    public $name, $price;
    private $ram;
    protected $cpu;

    public function showDetails($ram="not specified"){   
        $this->ram= $ram;
       echo $this->name."<br>";
       echo $this->price."<br>";
       echo $this->cpu."<br>";
       echo $this->ram."<br>";
      
    }

}

// Child
class AndroidMobiles extends Mobile{
    public $android_version;
     
    public function setCpu($cpu){
        $this->cpu= $cpu;
       echo $this->android_version ."<br>";
    }

}

//Creating  Objects of above classes

//parent class object
// $samsungA32= new Mobile();
// $samsungA32->name= "Samsung A32";
// $samsungA32->price= 45000;
// $samsungA32->android_version= 14;
// Cannot set private property value from here
// $samsungA32->ram= "2 gb";
// Cannot set protected property value from here
// $samsungA32->cpu= "exynos 9789";
//  $samsungA32->setCpu("exynos 9789");
// $samsungA32->showDetails("4gb");


//child class object
// $googlePixel7= new AndroidMobiles();
// $googlePixel7->name="Google Pixel 7 Pro";
// $googlePixel7->price=1500000;
// $googlePixel7->android_version=14;

// $googlePixel7->setCpu("Tenser 34545");
// $googlePixel7->showDetails("16 GB");


// Constructor function


class Movie{
    public $name, $duration;

    public function __construct($moviename="not specified", $movieduration="not specified"){
        $this->name=$moviename;
        $this->duration=$movieduration;
    }

    public function showMovieDetails(){
        echo $this->name."<br>";
        echo $this->duration." Minutes<br>";
    }

}

$twelveFail= new Movie("12th Fail" ,150);
$twelveFail->showMovieDetails();
// $twelveFail->name="12th Fail";


$sijjin=new Movie("Sijjin");
// $sijjin->showMovieDetails();
$sijjin->duration=140;
$sijjin->showMovieDetails();






// class Hollywood extends Movie{
//     public $language;


//     public function showlanguage(){
//         echo $this->language."<br>";
//     }

// }

// $theMeg2= new Hollywood();
// $theMeg2->showlanguage();


?>

