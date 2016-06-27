<?php

use Src\Exceptions as Exceptions;
use Lib\Contracts as Contracts;

class OrderGateway implements Contracts\OrderInterface {
        private $item;
        private $payment;
        
        public function addItem(Contracts\ItemInterface $item) 
        {
            $this->item = $item;
	    return $this;
        }
        
        public function addPayment(Contracts\PaymentInterface $payment) 
        {
            $this->payment = $payment;
	    return $this;
        }

        private function hasPayment()
        {
                if(empty($this->payment))
                {
                        throw new \Exception('No payment has been applied.');
                }
        }

        private function hasItem()
        {
                if(empty($this->payment))
                {
                        throw new \Exception('No item has been selected.');
                }
        }

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
