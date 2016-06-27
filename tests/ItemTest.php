<?php
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function testAmountIsStored() {
	$item = new Item;
	$amount = 50;
	$item->setAmount($amount);
	$this->assertEquals($item->getAmount(), $amount);
    }
}

