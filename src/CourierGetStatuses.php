<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Responses\Status as ResponseStatus;
use Sylapi\Courier\Dummy\Responses\Status as StatusResponse;
use Sylapi\Courier\Contracts\CourierGetStatuses as CourierGetStatusesContract;

class CourierGetStatuses implements CourierGetStatusesContract
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function getStatus(string $shipmentId): ResponseStatus
    {
        try {
            $payload = [
                'shipmentId' => $shipmentId,
                'token' => $this->session->token(),
            ];

            switch($shipmentId) {
                case TestId::SUCCESS->value:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'status' => 'DELIVERED'];
                    break;
                case TestId::ERROR->value:
                    throw new TransportException('Error');
                default:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'status' => 'DELIVERED'];
                    break;
            }            

            $statusResponse = new StatusResponse((string) new StatusTransformer($result['status']));
            $statusResponse->setResponse($result);
            $statusResponse->setRequest($payload);
            return $statusResponse;

        } catch (\Exception $e) {
            throw new TransportException($e->getMessage());
        }

        
    }
}
