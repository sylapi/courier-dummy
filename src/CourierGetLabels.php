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
    
            switch($shipmentId) {
                case TestId::SUCCESS->value:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'label' => 'LABEL'];
                    break;
                case TestId::ERROR->value:
                    throw new TransportException('Error');
                default:
                    $result = ['response' => 'SUCCESS', 'shipmentId' => $shipmentId, 'label' => 'LABEL'];
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
