<?php
require '../vendor/autoload.php';

use Sylapi\Courier\CourierFactory;
use Sylapi\Courier\Dummy\Enums\TestId;

$courier = CourierFactory::create('Dummy', [
    'login'     => 'login',
    'password'  => 'password',
    'sandbox'   => true,
]);

/**
 * PostShipment.
 */
$booking = $courier->makeBooking();
$booking->setShipmentId(TestId::SUCCESS->value); // or TestId::ERROR->value

try {
    $response = $courier->postShipment($booking);
    var_dump($response->getShipmentId());
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
