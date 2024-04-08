<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use Sylapi\Courier\Dummy\Entities\Sender;
use Sylapi\Courier\Contracts\Sender as SenderContract;
use Sylapi\Courier\Contracts\CourierMakeSender as CourierMakeSenderContract;

class CourierMakeSender implements CourierMakeSenderContract
{
    public function makeSender(): SenderContract
    {
        return new Sender();
    }
}
