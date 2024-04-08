<?php

namespace Sylapi\Courier\Dummy\Tests\Helpers;

use stdClass;
use Sylapi\Courier\Dummy\Session;
use Sylapi\Courier\Dummy\Parameters;



trait SessionTrait
{
    private function getSessionMock()
    {
        $sessionMock = $this->createMock(Session::class);
        return $sessionMock;
    }
}
