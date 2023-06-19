<?php

namespace blog\Services;

include("Services/ProcessSignupAbstract.php");
include("Services/Contracts/ProcessSignupInterface.php");

use blog\Services\Contracts\ProcessSignupInterface;
use blog\Services\ProcessSignUpAbstract;
use blog\Services\Traits\ProcessSignUpTrait;

class ProcessSignup extends ProcessSignUpAbstract implements ProcessSignupInterface
{
    use ProcessSignUpTrait;
}
