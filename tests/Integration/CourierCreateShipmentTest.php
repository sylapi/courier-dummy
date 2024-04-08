<?php

namespace Sylapi\Courier\Dummy\Tests;

use SoapFault;
use Sylapi\Courier\Dummy\Responses\Shipment as ResponsesShipment;
use Sylapi\Courier\Dummy\Entities\Parcel;
use Sylapi\Courier\Dummy\Entities\Sender;
use Sylapi\Courier\Dummy\Entities\Receiver;
use Sylapi\Courier\Dummy\Entities\Shipment;
use Sylapi\Courier\Dummy\CourierCreateShipment;
use Sylapi\Courier\Exceptions\TransportException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Dummy\Entities\Options;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Dummy\Tests\Helpers\SessionTrait;


class CourierCreateShipmentTest extends PHPUnitTestCase
{
    use SessionTrait;

    private $sessionMock = null;

    public function setUp(): void
    {
        $this->sessionMock = $this->getSessionMock();
    }

    private function getShipmentMock()
    {
        $senderMock = $this->createMock(Sender::class);
        $receiverMock = $this->createMock(Receiver::class);
        $parcelMock = $this->createMock(Parcel::class);
        $optionsMock = $this->createMock(Options::class);
        $shipmentMock = $this->createMock(Shipment::class);

        $shipmentMock->method('getSender')
                ->willReturn($senderMock);

        $shipmentMock->method('getReceiver')
                ->willReturn($receiverMock);

        $shipmentMock->method('getParcel')
                ->willReturn($parcelMock);

        $shipmentMock->method('getOptions')
                ->willReturn($optionsMock);                

        $shipmentMock->method('validate')
                ->willReturn(true);

        return $shipmentMock;
    }

    public function testCreateShipmentSuccess()
    {
        $courierCreateShipment = new CourierCreateShipment($this->sessionMock);

        $shipmentMock = $this->getShipmentMock();
        $shipmentMock->method('getCustomOption')
                ->willReturn(TestId::SUCCESS->value);           

        $response = $courierCreateShipment->createShipment($shipmentMock);

        $this->assertInstanceOf(ResponsesShipment::class, $response);
        $this->assertNotEmpty($response->getShipmentId());
    }

    public function testCreateShipmentFailure()
    {
        $courierCreateShipment = new CourierCreateShipment($this->sessionMock);
        $this->expectException(TransportException::class);

        $shipmentMock = $this->getShipmentMock();
        $shipmentMock->method('getCustomOption')
                ->willReturn(TestId::ERROR->value);        

        $courierCreateShipment->createShipment($shipmentMock);
        
    }
}
