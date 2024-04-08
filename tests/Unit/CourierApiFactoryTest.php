<?php

namespace Sylapi\Courier\Dummy\Tests\Unit;

use Sylapi\Courier\Courier;
use Sylapi\Courier\Dummy\Session;
use Sylapi\Courier\Dummy\Parameters;
use Sylapi\Courier\Dummy\SessionFactory;
use Sylapi\Courier\Dummy\Entities\Parcel;
use Sylapi\Courier\Dummy\Entities\Sender;
use Sylapi\Courier\Dummy\Entities\Booking;
use Sylapi\Courier\Dummy\CourierApiFactory;
use Sylapi\Courier\Dummy\Entities\Receiver;
use Sylapi\Courier\Dummy\Entities\Shipment;
use Sylapi\Courier\Dummy\Entities\Credentials;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;


class CourierApiFactoryTest extends PHPUnitTestCase
{
    public function testSessionFactory()
    {
        $credentials = new Credentials();
        $credentials->setLogin('login');
        $credentials->setPassword('password');
        $credentials->setSandbox(true);
        $courierApiFactory = new SessionFactory();
        $session = $courierApiFactory->session($credentials);
        
        $this->assertInstanceOf(Session::class, $session);
    }

    public function testCourierFactoryCreate()
    {
        $credentials = [
            'login' => 'login',
            'password' => 'password',
            'sandbox' => true,
        ];

        $courierApiFactory = new CourierApiFactory(new SessionFactory());
        $courier = $courierApiFactory->create($credentials);

        $this->assertInstanceOf(Courier::class, $courier);
        $this->assertInstanceOf(Booking::class, $courier->makeBooking());
        $this->assertInstanceOf(Parcel::class, $courier->makeParcel());
        $this->assertInstanceOf(Receiver::class, $courier->makeReceiver());
        $this->assertInstanceOf(Sender::class, $courier->makeSender());
        $this->assertInstanceOf(Shipment::class, $courier->makeShipment());
    }
}
