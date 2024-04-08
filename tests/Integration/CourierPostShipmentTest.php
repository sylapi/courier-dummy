<?php

namespace Sylapi\Courier\Dummy\Tests\Integration;

use PHPUnit\Event\Code\Test;
use SoapFault;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Dummy\Entities\Booking;
use Sylapi\Courier\Dummy\CourierPostShipment;
use Sylapi\Courier\Exceptions\TransportException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Dummy\Tests\Helpers\SessionTrait;
use Sylapi\Courier\Dummy\Responses\Parcel as ParcelResponse;

class CourierPostShipmentTest extends PHPUnitTestCase
{
    use SessionTrait;

    private $sessionMock = null;

    public function setUp(): void
    {
        $this->sessionMock = $this->getSessionMock();
    }

    public function getBookingMock($shipmentId)
    {
        $bookingMock = $this->createMock(Booking::class);
        $bookingMock->method('getShipmentId')->willReturn($shipmentId);
        $bookingMock->method('validate')->willReturn(true);

        return $bookingMock;
    }

    public function testPostShipmentSuccess()
    {
        $courierPostShipment = new CourierPostShipment($this->sessionMock);

        $shipmentId = TestId::SUCCESS->value;
        $bookingMock = $this->getBookingMock($shipmentId);

        $response = $courierPostShipment->postShipment($bookingMock);

        $this->assertInstanceOf(ParcelResponse::class, $response);
        $this->assertNotEmpty($response->getShipmentId());
        $this->assertEquals($response->getShipmentId(), $shipmentId);
    }

    public function testPostShipmentFailure()
    {
        $shipmentId = TestId::ERROR->value;
        $bookingMock = $this->getBookingMock($shipmentId);
        
        $this->expectException(TransportException::class);

        $courierPostShipment = new CourierPostShipment($this->sessionMock);
        $courierPostShipment->postShipment($bookingMock);   
    }
}
