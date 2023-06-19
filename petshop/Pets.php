<?php
include("OwnerAbstract.php");
include("PetsInterface.php");

class Pets extends OwnerAbstract implements PetsInterface
{
    public $dogName;
    protected $petList;
    const AGE = 3;

    // This is to initialize this class.
    public function __construct()
    {
        $this->petList = [
            "Coco",
            "Chichi"
        ];
    }

    // This will return list of all pets.
    public function getList()
    {
        return $this->petList;
    }

    // This is example of static function
    public static function getAge()
    {
        return self::AGE;
    }

    // This will return a dog name.
    public function getName()
    {
        return $this->dogName;
    }

    // This will set a new dog name.
    public function setName($dogName)
    {
        $this->dogName = $dogName;
    }

    // This will execute last.
    public function __destruct()
    {
        // echo "Destruct!";
        // error_log("Successfully executed!", 0, "../error.log");
    }
}
