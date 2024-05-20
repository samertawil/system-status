<?php
//class , object , Properties , method , constant
//this , self 
//Encapsulation
//Inheritance
//final keyword used in  method 
//final class
//abstract class and abstract method , this class only for inhrit from and abstract method cant have body
//Polymorphism  class and abstract method , this class only for inhrit from and abstract method cant have body
//  Visibility Markers : public , protected and private
//Magic Methods - __Construct : its execute when object is created
//Magic Methods __Destruct : its execute when object is destroied
//Magic Methods __call : its execute when you call method from calss not exist or cant be accessiable
//Magic Methods __get : its execute when you call Properties from calss not exist or cant be accessiable
//Magic Methods __set : its execute when you try to give proparty value and proparty dose not exist in calss or cant be accessiable للحفاظ على معنى oop\
//Magic Methods clone :استنساخ typical copy of object by referance . means both (orginal and copy ) are interlinked
//Traits : use for multi inhirit to one class
class Standardspcs
{
    public $ram = '1GB';
    public $space = '16GB';
    public $name = 'samer';

    final public function SayHello()      // final keyword علشان يمنع استخدام نفس اسم الكلاس بالكلاسات الفرعية اللي وارثه من الكلاس الرئيسي
    {
        echo 'welcome to ' . $this->name . ' ';
    }
}



// -------------------------final class -------------------------------------------

final class testphone
{   // this class cant be inherit to other class becouse of "final keyword" لا يمكن ان يتم التوريث من هذا الكلاس
    public $price;
}

//-----------------------------------------------------------------------------------


class AppleDevice extends Standardspcs       // this class Inheritance Standardspcs Properties وراثة متغيرات من كلاس اخر
{

    //use PhoneRules;
    //proparties

    public $inch = '5 inch';
    public $color = 'black';
    private $lock;             // Encapsulation التغليف


    // constant

    const OWNERCHAR = 7;

    // method with parameters

    public function ChangeSpace($ra, $in, $spc)
    {
        $this->ram = $ra;
        $this->inch = $in;
        $this->space = $spc;
    }

    public function ChangeLock($lockey)
    {
        if (strlen($lockey) < self::OWNERCHAR) {
            echo 'no way';
        } else {

            $this->lock = sha1($lockey);
            echo 'done';
        }
    }
}


// ------------------------------abstract--------------------------------


abstract class PhoneRules
{   //  this class only for inhrit from and abstract method cant have body and you should use method in your inhireted class

    abstract public function SayHello();
}


class SonyDevice extends PhoneRules
{
    public function SayHello()
    {
        echo 'SayHello';
    }
}


// $sonyphone = new SonyDevice;
// $sonyphone->sayhello();


//--------------------------------Polymorphism ---AND magic method----------------------


interface  mobile
{                           // كلاس للتوريث 

    public function PressHome();             // empty method to be as rules
}


class iphone implements mobile
{

    public function PressHome()
    {
        echo 'this press will close all apps';
    }

    public function __construct()
    {
        echo 'object is created';                          //Construct Magic Methods example 
    }
}


class sony implements mobile
{

    public $name;
    public $age = 10;

    public function PressHome()
    {
        echo 'this press will open calender<br>';
    }

    public function __Call($method_name, $params)           //call Magic Methods example 
    {
        echo ' this' . $method_name . '  dose not exist or not accessiable<br>';
    }

    public function __get($prop)                           //get Magic Methods example 
    {

        echo 'this ' . $prop . ' dose not exist or not accessiable<br>';
    }


    public function __set($prop, $val)                           //get Magic Methods example 
    {

        echo 'this ' . $prop . ' dose not exist or not accessiable ' . $val . '<br>';
    }
}

// $phone = new iphone;
// $phone->PressHome();
// print_r($phone);


$sony = new sony;
$sony->name = 'samer';
$sony->age = 30;
$copy = $sony; // without clone method the name in both object (copy,sony)=hesham but by using clone the new value will be in only copy بمعنى اخذ نسخة والعمل عليها بشكل منفرد
$copy = clone $sony;
$copy->name = 'hesham';

print_r($copy);
print_r($sony);


// $sony->PressHome();
// $sony->dds ='1222';
// echo $sony->dds ;
// print_r($sony);

//-----------------------------Traits---------------------------------------------------

trait FingerPrint
{

    public function fingerFeature()
    {
        echo 'finger print <br>';
    }
}

trait ThetreeDiminsion
{

    public function ThetreeDiminsionFeature()
    {
        echo 'ThetreeDiminsion<br>';
    }
}

trait AllFearture {
    use FingerPrint,ThetreeDiminsion;
}


class Newiphone
{
    // use FingerPrint;
    // use ThetreeDiminsion;
    use AllFearture;

    public function NewFeature()
    {
        echo 'dddd';
    }
}

$newphone=new Newiphone;
$newphone->ThetreeDiminsionFeature();
print_r($newphone);


//-----------------------------------------------------------------------------



// $iphone6plus = new AppleDevice;      // $iphone6plus is an object its created from class
// $iphone6plus->ram = '2Gb';

// $iphone7 = new AppleDevice;
// $iphone7->ChangeSpace('4GB', '10 inch', '64GB');
// $iphone7->ChangeLock('wq');
// $iphone7->SayHello();

// print_r($iphone7);

// echo AppleDevice::OWNERCHAR;
