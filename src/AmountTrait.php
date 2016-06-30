<?php
/**
* Mixin containing shared functionality for both payment and items.
* I thought it would be better to use a trait instead of an
* abstract class given that the fundamental difference between
* the two interfaces. As functionality grew, Payments and Items 
* would deviate more and more.
*/
trait AmountTrait {
	protected $amount; 
        /**
        * Get saved amount
        * @return Int 
        */
        public function getAmount() 
        {
              return $this->amount;
      }

        /**
        * Standard setter. Sets the amount as long as isValidAmount assetion passes
        * @param $amount Int
        */
        public function setAmount($amount)
        {
                try
                {
                        $this->isValidAmount($amount);
                        return $this;
                } catch(\Exception $e) {
                        echo $e->getMessage();
                }
        }

        /**
        * Assertion that amount is an integer. If false exception is thrown and caught 
        * in setAmount
        */
        protected function isValidAmount($amount) {
                if(!is_integer($amount))
                {
                        throw new \Exception("Value must be an integer.");
                }
                else
                {
                        $this->amount = $amount;
                }
        }
}

