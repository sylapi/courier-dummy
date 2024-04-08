<?php
require '../vendor/autoload.php';

use Sylapi\Courier\CourierFactory;
use Sylapi\Courier\Dummy\Enums\TestId;
use Sylapi\Courier\Dummy\Entities\Options;

$courier = CourierFactory::create('Dummy', [
    'login'     => 'login',
    'password'  => 'password',
    'sandbox'   => true,
]);

/**
 * CreateShipment.
 */
$sender = $courier->makeSender();
$sender->setFullName('Nazwa Firmy/Nadawca')
    ->setStreet('Ulica')
    ->setHouseNumber('2a')
    ->setApartmentNumber('1')
    ->setCity('Miasto')
    ->setZipCode('66100')
    ->setCountry('Poland')
    ->setCountryCode('cz')
    ->setContactPerson('Jan Kowalski')
    ->setEmail('sender@email.test')
    ->setPhone('48500600700');

$receiver = $courier->makeReceiver();
$receiver->setFirstName('Jan')
    ->setSurname('Nowak')
    ->setStreet('Ulica Zielona')
    ->setHouseNumber('15')
    ->setApartmentNumber('1896')
    ->setCity('Świebodzin')
    ->setZipCode('66-200')
    ->setCountry('Poland')
    ->setCountryCode('pl')
    ->setContactPerson('Jan Kowalski')
    ->setEmail('receiver@email.test')
    ->setPhone('48500600700');

$parcel = $courier->makeParcel();
$parcel->setWeight(2.5);

$shipment = $courier->makeShipment();
$shipment->setSender($sender)
    ->setReceiver($receiver)
    ->setParcel($parcel)
    ->setContent('Zawartość przesyłki')
    ->setOptions(new Options)
    ->setCustomOption(TestId::SUCCESS->value); // or TestId::ERROR->value



try {
    $response = $courier->createShipment($shipment);
    var_dump($response->getShipmentId());
} catch (\Exception $e) {
    var_dump($e->getMessage());
}
