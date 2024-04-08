<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use Sylapi\Courier\Dummy\Entities\Credentials;

class SessionFactory
{
    private $sessions = [];

    //These constants can be extracted into injected configuration
    const API_LIVE = 'https://dummy.coureir/api';
    const API_SANDBOX = 'https://sanbox.dummy.coureir/api';

    public function session(Credentials $credentials): Session
    {
        $apiUrl = $credentials->isSandbox() ? self::API_SANDBOX : self::API_LIVE;

        $credentials->setApiUrl($apiUrl);

        $key = sha1( $apiUrl.':'.$credentials->getLogin().':'.$credentials->getPassword());

        return (isset($this->sessions[$key])) ? $this->sessions[$key] : ($this->sessions[$key] = new Session($credentials));
    }
}
