<?php
use PHPUnit\Framework\TestCase;

class OrdersTest extends TestCase
{
    public function testAmountIsEqualForPaymentAndItem() 
    {
	$amount = 50;
	$payment = (new Payment())->setAmount($amount);
	$item = (new Item())->setAmount($amount);
	$orders = new OrderGateway();
	$orders
	    ->addPayment($payment)
	    ->addItem($item);
	$this->assertEquals($orders->isPaidInFull(), true);  
    }

}
