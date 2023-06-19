<?php

interface PetsInterface
{
    // This will return list of all pets.
    public function getList();

    // This is example of static function
    public static function getAge();

    // This will return a dog name.
    public function getName();

    /**
     * This will set a new dog name.
     */
    public function setName($dogName);
}
