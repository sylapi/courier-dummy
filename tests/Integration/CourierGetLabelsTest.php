<?php

namespace Sylapi\Courier\Dummy\Tests;

use Sylapi\Courier\Dummy\CourierGetLabels;
use Sylapi\Courier\Dummy\Entities\LabelType;
use Sylapi\Courier\Exceptions\TransportException;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Dummy\Tests\Helpers\SessionTrait;

class CourierGetLabelsTest extends PHPUnitTestCase
{
    use SessionTrait;

    private $sessionMock = null;

    public function setUp(): void
    {
        $this->sessionMock = $this->getSessionMock();
    }

    public function testGetLabelSuccess()
    {
        $courierGetLabels = new CourierGetLabels($this->sessionMock);
        $labelTypeMock = $this->createMock(LabelType::class);
        $this->assertEquals(
            $courierGetLabels->getLabel((string) TestId::SUCCESS->value, $labelTypeMock),
            'LABEL'
        );
    }

    public function testGetLabelFailure()
    {
        $shippingId = TestId::ERROR->value;

        $this->expectException(TransportException::class);
        $courierGetLabels = new CourierGetLabels($this->sessionMock);
        $labelTypeMock = $this->createMock(LabelType::class);
        $courierGetLabels->getLabel($shippingId, $labelTypeMock);
    }
}
