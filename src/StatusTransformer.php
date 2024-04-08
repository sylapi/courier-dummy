<?php

declare(strict_types=1);

namespace Sylapi\Courier\Dummy;

use Sylapi\Courier\Abstracts\StatusTransformer as StatusTransformerAbstract;
use Sylapi\Courier\Enums\StatusType;

class StatusTransformer extends StatusTransformerAbstract
{

    /**
     * @var array<string, string>
     */

    public $statuses  = [
        '2.0' => StatusType::ENTRY_WAIT->value,
        '40.0' => StatusType::PROCESSING->value,
        '1.0' => StatusType::PROCESSING->value,
        '0.0' => StatusType::ENTRY_WAIT->value,
        '11.0' => StatusType::SENT->value,
        '3.0' => StatusType::DELIVERED->value,
        '33.91' => StatusType::PROCESSING->value,
        '8.0' => StatusType::WAREHOUSE_ENTRY->value,
        '40.68' => StatusType::PROCESSING->value,

        '26.58' => StatusType::PROCESSING->value,
        '26.67' => StatusType::PROCESSING->value,
        '27.68' => StatusType::PROCESSING->value,
        '26.68' => StatusType::PROCESSING->value,

        '34.58' => StatusType::SPEDITION_DELIVERY->value,
        '25.91' => StatusType::PROCESSING->value,
        '42.0' => StatusType::PROCESSING->value,

        '6.12' => StatusType::RETURNING->value,
        '4.40' => StatusType::PROCESSING_FAILED->value,
        '0.100' => StatusType::PROCESSING->value,
        '8.97' => StatusType::WAREHOUSE_ENTRY->value,

        '40.97' => StatusType::PROCESSING->value,
        '44.96' => StatusType::PROCESSING->value,
        '40.94' => StatusType::PROCESSING->value,



        '34.59' => StatusType::PROCESSING->value,
        '6.0' => StatusType::RETURNING->value,
        '16.0' => StatusType::PROCESSING->value,
        '96.0' => StatusType::PROCESSING->value,
        '1.79' => StatusType::SPEDITION_DELIVERY->value,
        '17.0' => StatusType::SPEDITION_DELIVERY->value,
        '27.58' => StatusType::PROCESSING->value,

        '4.32' => StatusType::PROCESSING_FAILED->value,
        '0.94' => StatusType::PROCESSING->value,
        '6.2' => StatusType::RETURNING->value,

        '5.0' => StatusType::RETURNED->value,
        '12.83' => StatusType::PICKUP_READY->value,
        '12.6' => StatusType::PROCESSING->value,
        '4.41' => StatusType::PROCESSING_FAILED->value,

        '13.0' => StatusType::PROCESSING->value,
        '6.20' => StatusType::RETURNING->value,
        '90.45' => StatusType::PROCESSING->value,

        '12.42' => StatusType::PROCESSING_FAILED->value,
        '15.0' => StatusType::PROCESSING->value,

        '12.2' => StatusType::PROCESSING_FAILED->value,
        '2.20' => StatusType::PROCESSING_FAILED->value,
        '12.80' => StatusType::PROCESSING->value,
        '4.24' => StatusType::PROCESSING_FAILED->value,

        '14.62' => StatusType::PROCESSING->value,
        '12.52' => StatusType::PROCESSING->value,
        '12.99' => StatusType::PROCESSING->value,
        '10.0' => StatusType::PROCESSING->value,
        '26.16' => StatusType::PROCESSING->value,
        '20.71' => StatusType::PROCESSING_FAILED->value,
        '27.16' => StatusType::PROCESSING->value,
        '41.0' => StatusType::PROCESSING->value,
        '14.61' => StatusType::PROCESSING->value,
        '6.10' => StatusType::PROCESSING->value,
        '4.99' => StatusType::PROCESSING_FAILED->value,
        '33.77' => StatusType::PROCESSING->value,
        '4.52' => StatusType::PROCESSING->value,


        '19.74' => StatusType::PROCESSING->value,
        '4.42' => StatusType::PROCESSING->value,
        '13.64' => StatusType::PROCESSING->value,
        '30.40' => StatusType::PROCESSING->value,
        '19.40' => StatusType::PROCESSING->value,
        '12.8' => StatusType::PROCESSING->value,
        '12.10' => StatusType::PROCESSING->value,
        '4.80' => StatusType::PROCESSING->value,


        '25.97' => StatusType::PROCESSING->value,
        '27.17' => StatusType::PROCESSING->value,
        '21.0' => StatusType::PROCESSING->value,
        '22.0' => StatusType::PROCESSING->value,
        '29.0' => StatusType::LOST->value,
        '4.37' => StatusType::PROCESSING->value,
        '95.0' => StatusType::PROCESSING->value,
        '6.79' => StatusType::SPEDITION_DELIVERY->value,
        '18.99' => StatusType::PROCESSING->value,
        '12.20' => StatusType::PROCESSING->value,
        '26.17' => StatusType::PROCESSING->value,
        '14.60' => StatusType::PROCESSING->value,
        '4.30' => StatusType::PROCESSING_FAILED->value,
        '4.25' => StatusType::PROCESSING_FAILED->value,
        '15.65' => StatusType::PROCESSING->value,
        '12.31' => StatusType::PROCESSING_FAILED->value,
        '14.68' => StatusType::PROCESSING->value,


        '20.75' => StatusType::PROCESSING->value,
        '19.42' => StatusType::PROCESSING->value,
        '79.0' => StatusType::RETURNING->value,
        
        '20.0' => StatusType::PROCESSING_FAILED->value,
        '31.74' => StatusType::PROCESSING->value,
        '19.75' => StatusType::PROCESSING->value,
        '14.53' => StatusType::PROCESSING->value,
        '12.63' => StatusType::PROCESSING->value,
        '4.20' => StatusType::PROCESSING->value,
        '4.36' => StatusType::PROCESSING_FAILED->value,
        '4.21' => StatusType::PROCESSING->value,
        '4.31' => StatusType::PROCESSING_FAILED->value,
        '20.72' => StatusType::PROCESSING_FAILED->value,
        '14.66' => StatusType::PROCESSING_FAILED->value,
        '2.21' => StatusType::PROCESSING_FAILED->value,
        '7.21' => StatusType::PROCESSING_FAILED->value,

        '20.73' => StatusType::PROCESSING->value,
        '19.49' => StatusType::PROCESSING->value,
        '19.33' => StatusType::PROCESSING->value,

        '14.70' => StatusType::PROCESSING->value,
        '4.26' => StatusType::PROCESSING_FAILED->value,
        '19.73' => StatusType::PROCESSING->value,
        '20.32' => StatusType::PROCESSING->value,
        '12.32' => StatusType::PROCESSING->value,
        '4.33' => StatusType::PROCESSING_FAILED->value,
        '14.63' => StatusType::PROCESSING->value,
        '19.72' => StatusType::PROCESSING->value,
        '12.30' => StatusType::PROCESSING_FAILED->value,
        '19.01' => StatusType::PROCESSING->value,
        '12.23' => StatusType::PROCESSING_FAILED->value,
        '12.43' => StatusType::PROCESSING_FAILED->value,
        '8.27' => StatusType::WAREHOUSE_ENTRY->value,
        '19.37' => StatusType::PROCESSING->value,
        '19.38' => StatusType::PROCESSING->value,
        '12.00' => StatusType::PROCESSING->value,
        '90.132' => StatusType::PROCESSING->value,
        '20.19' => StatusType::PROCESSING->value,
        '12.03' => StatusType::PROCESSING_FAILED->value,
        '12.44' => StatusType::PROCESSING_FAILED->value
    ];

    /**
     * @var array<string, string>
     */
    public $statusDescription = [
        '2.0' => "Inbound to GLS location",
        '40.0' => "Data transmitted",
        '1.0' => "Outbound from GLS location",
        '0.0' => "Data transferred to GLS System",
        '11.0' => "Out for delivery on GLS vehicle",
        '3.0' => "Delivered",
        '33.91' => "Change completed for",
        '8.0' => "Stored",
        '40.68' => "Data transmitted",
        '26.58' => "Shipment locked",
        '26.67' => "Shipment locked",
        '27.68' => "Shipment unlocked following reason fixed",
        '26.68' => "Shipment locked",
        '34.58' => "Print completed",
        '25.91' => "Address data entered in the GLS system.",
        '42.0' => "Customs data captured",
        '6.12' => "Forwarded",
        '4.40' => "Not delivered",
        '0.100' => "Data transferred to GLS System",
        '8.97' => "Stored",
        '40.97' => "Data transmitted",
        '44.96' => "External Data transfer",
        '40.94' => "Data transmitted",
        '34.59' => "Print completed",
        '6.0' => "Forwarded",
        '16.0' => "Label printed for P&R/P&S-Service.",
        '96.0' => "Additional information requested",
        '1.79' => "Outbound from GLS location",
        '17.0' => "Pickup-Service Collection done",
        '27.58' => "Shipment unlocked following reason fixed",
        '4.32' => "Not delivered",
        '0.94' => "Data transferred to GLS System",
        '6.2' => "Forwarded",
        '5.0' => "Returned to consignor",
        '12.83' => "Not out for delivery",
        '12.6' => "Not out for delivery",
        '4.41' => "Not delivered",
        '13.0' => "In customs clearance",
        '6.20' => "Forwarded",
        '90.45' => "Consignee contacted",
        '12.42' => "Not out for delivery",
        '15.0' => "Released by customs",
        '12.2' => "Not out for delivery",
        '2.20' => "Problem in customs clearance",
        '12.80' => "Not out for delivery",
        '4.24' => "Not out for delivery",
        '14.62' => "Not delivered",
        '12.52' => "Not out for delivery",
        '12.99' => "Not out for delivery",
        '10.0' => "Inbound to GLS location",
        '26.16' => "Not out for delivery",
        '20.71' => "Not delivered",
        '27.16' => "Problem in customs clearance",
        '41.0' => "Not out for delivery",
        '14.61' => "Not out for delivery",
        '6.10' => "Not delivered",
        '4.99' => "Change completed for",
        '33.77' => "Not delivered",
        '4.52' => "Pickup attempt unsuccessful",
        '19.74' => "Not delivered",
        '4.42' => "Pickup-Service cancelled",
        '13.64' => "Second delivery attempt unsucessful",
        '30.40' => "Pickup attempt unsuccessful",
        '19.40' => "Not out for delivery",
        '12.8' => "Not out for delivery",
        '12.10' => "Stored",
        '4.80' => "Pickup attempt unsuccessful",
        '25.97' => "Pickup attempt unsuccessful",
        '27.17' => "Not out for delivery",
        '21.0' => "Not delivered",
        '22.0' => "Problem in customs clearance",
        '29.0' => "Not out for delivery",
        '4.37' => "Not out for delivery",
        '95.0' => "Not delivered",
        '6.79' => "Not delivered",
        '18.99' => "Released by customs",
        '12.20' => "Not out for delivery",
        '26.17' => "Problem in customs clearance",
        '14.60' => "Not delivered",
        '4.30' => "Not delivered",
        '4.25' => "Released by customs",
        '15.65' => "Not out for delivery",
        '12.31' => "Not out for delivery",
        '14.68' => "Not delivered",
        '20.75' => "Pickup-Service cancelled",
        '19.42' => "Pickup attempt unsuccessful",
        '79.0' => "Pickup attempt unsuccessful",
        '20.0' => "Not out for delivery",
        '31.74' => "Not out for delivery",
        '19.75' => "Not delivered",
        '14.53' => "Problem in customs clearance",
        '12.63' => "Not out for delivery",
        '4.20' => "Stored",
        '4.36' => "Pickup attempt unsuccessful",
        '4.21' => "Pickup attempt unsuccessful",
        '4.31' => "Not out for delivery",
        '20.72' => "Not out for delivery",
        '14.66' => "Stored",
        '2.21' => "Pickup attempt unsuccessful",
        '7.21' => "Not out for delivery",
        '20.73' => "Not out for delivery",
        '19.49' => "Not delivered",
        '19.33' => "Problem in customs clearance",
        '14.70' => "Pickup-Service cancelled",
        '4.26' => "Pickup attempt unsuccessful",
        '19.73' => "Not delivered",
        '20.32' => "Not out for delivery",
        '12.32' => "Not out for delivery",
        '4.33' => "Not delivered",
        '14.63' => "Problem in customs clearance",
        '19.72' => "Pickup attempt unsuccessful",
        '12.30' => "Not out for delivery",
        '19.01' => "Pickup attempt unsuccessful",
        '12.23' => "Not out for delivery",
        '12.43' => "Not out for delivery",
        '8.27' => "Stored",
        '19.37' => "Pickup attempt unsuccessful",
        '19.38' => "Not out for delivery",
        '12.00' => "Not delivered",
        '90.132' => "Pickup attempt unsuccessful",
        '20.19' => "Not out for delivery",
        '12.03' => "Not out for delivery",
        '12.44' => "Not delivered",
    ];


    public function originalDescription(string $code): string
    {
        return $this->statusDescription[$code] ?? 'Error: Original description not found';
    }
}
