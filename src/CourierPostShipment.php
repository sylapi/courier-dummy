<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use Sylapi\Courier\Contracts\Booking;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Exceptions\ValidateException;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Dummy\Helpers\ValidateErrorsHelper;
use Sylapi\Courier\Responses\Parcel as ResponseParcel;
use Sylapi\Courier\Contracts\Response as ResponseContract;
use Sylapi\Courier\Dummy\Responses\Parcel as ParcelResponse;
use Sylapi\Courier\Contracts\CourierPostShipment as CourierPostShipmentContract;

class CourierPostShipment implements CourierPostShipmentContract
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function postShipment(Booking $booking): ResponseParcel
    {
        $response = new ParcelResponse();

        if (!$booking->validate()) {
            throw new ValidateException('Invalid Shipment');
        }


        $payload = [
            'token' => $this->session->token(),
            'shipmentId' => $booking->getShipmentId(),
        ];


        try {

            switch($booking->getShipmentId()) {
                case TestId::SUCCESS->value:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $booking->getShipmentId()];
                    break;
                case TestId::ERROR->value:
                    throw new TransportException('Error');
                default:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $booking->getShipmentId()];
                    break;
            }   
            
            $response->setRequest($payload);
            $response->setResponse($result);
            $response->setShipmentId((string) $booking->getShipmentId());

            return $response;
        } catch (\Exception $e) {
            throw new TransportException($e->getMessage());
        }
    }
}
