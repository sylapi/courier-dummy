<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy\Enums;

enum TestId: string {
    case SUCCESS = '111111';
    case ERROR = '222222';
}