<?php

abstract class OwnerAbstract
{
    protected $petList;

    // This is to initialize this class.
    public function __construct()
    {
        $this->petList = [
            "Charlie",
            "James"
        ];
    }

    // This will return owner's name
    public function getOwnerName()
    {
        $ownerName = "John";

        return $ownerName;
    }

    public function getList()
    {
        $ownerList = [
            "John",
            "Jane"
        ];

        return $ownerList;
    }
}
