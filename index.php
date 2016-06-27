<?php

require __DIR__ . '/vendor/autoload.php';

$item = new Item();
$payment = new Payment();
$order = new OrderGateway();

$item->setAmount(35);
$payment->setAmount(41);

$order->addItem($item);
$order->addPayment($payment);

echo $order->isPaidInFull() ? 'Paid' : 'Unpaid';
