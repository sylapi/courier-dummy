<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy\Entities;

use Sylapi\Courier\Abstracts\Options as OptionsAbstract;

class Options extends OptionsAbstract
{

    public function validate(): bool
    {
        return true;
    }
}
