<?php 

use Lib\Contracts\PaymentInterface;

abstract class BasePayment implements PaymentInterface {
	use AmountTrait;
}
