<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use PHPUnit\Event\Code\Test;
use Sylapi\Courier\Contracts\CourierGetLabels as CourierGetLabelsContract;
use Sylapi\Courier\Exceptions\TransportException;
use Sylapi\Courier\Dummy\Responses\Label as LabelResponse;
use Sylapi\Courier\Contracts\LabelType as LabelTypeContract;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Responses\Label as ResponseLabel;

class CourierGetLabels implements CourierGetLabelsContract
{
    private $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function getLabel(string $shipmentId, LabelTypeContract $labelType): ResponseLabel
    {
        try {
            $payload = [
                'token' => $this->session->token(),
                'shipmentId' => $shipmentId,
            ];
    
            $labelCode = base64_decode(base64_encode('<html><body><h1>Label</h1><h2>Created: '.date('Y-m-d H:i:s').'</h2></body></html>'));

            switch($shipmentId) {
                case TestId::SUCCESS->value:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'label' => $labelCode];
                    break;
                case TestId::ERROR->value:
                    throw new TransportException('Error');
                default:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'label' => $labelCode];
                    break;
            }
            
            $labelResponse = new LabelResponse((string) $result['label']);
            $labelResponse->setResponse($result);
            $labelResponse->setRequest($payload);

            return $labelResponse;

        } catch (\Exception $e) {
            throw new TransportException($e->getMessage());
        }
    }
}
