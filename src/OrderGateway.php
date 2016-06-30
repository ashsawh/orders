<?php

use Src\Exceptions as Exceptions;
use Lib\Contracts as Contracts;

/**
* Orders implements order interface and asserts that user has paid for their item in full
*
*/
class OrderGateway implements Contracts\OrderInterface {
        private $item;
        private $payment;
        
        /**
        * Adds item that confirms to ItemInterface
        * @param $item Lib\Contracts\ItemInterface
        * @return OrderGateway
        */
        public function addItem(Contracts\ItemInterface $item) 
        {
            $this->item = $item;
	        return $this;
        }
        
        /**
        * Adds payment object that confirms to PaymentInterface
        * @param $payment Lib\Contracts\PaymentInterface
        * @return OrderGateway
        */
        public function addPayment(Contracts\PaymentInterface $payment) 
        {
            $this->payment = $payment;
	       return $this;
        }

        /**
        * Asserts that a Payment has been set or throw exception
        *
        */
        private function hasPayment()
        {
                if(empty($this->payment))
                {
                        throw new \Exception('No payment has been applied.');
                }
        }

        /**
        * Asserts that an item has been set or throw exception
        *
        */
        private function hasItem()
        {
                if(empty($this->payment))
                {
                        throw new \Exception('No item has been selected.');
                }
        }

        /**
        * Asserts that Payment is more than or equal to item amount
        *
        */
        public function isPaidInFull()
        {
	
                try {
                        $this->hasPayment();
                        $this->hasItem();
                        return $this->payment->getAmount() >= $this->item->getAmount();
                } 
		catch(\Exception $e) {
                        $e->getMessage();
                }

        }
}

