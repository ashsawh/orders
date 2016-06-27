<?php

use Lib\Contracts\ItemInterface;

abstract class BaseItem implements ItemInterface {
	use AmountTrait;
}
