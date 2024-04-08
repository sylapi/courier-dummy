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
 * GetLabel.
 */
try {
    $labelType = $courier->makeLabelType();
    $response = $courier->getLabel(TestId::SUCCESS->value, $labelType); // or TestId::ERROR->value

    var_dump((string) $response);

} catch (\Exception $e) {
    var_dump($e->getMessage());
}
