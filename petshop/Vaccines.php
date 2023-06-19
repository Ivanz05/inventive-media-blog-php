<?php
include("OwnerAbstract.php");

class Vaccines extends OwnerAbstract
{
    protected $vaccines;

    // This will return list of all vaccines.
    public function getVaccineList()
    {
        $this->vaccines = [
            "3 in 1",
            "anti-rabies"
        ];

        return $this->vaccines;
    }
}
