<?php

trait AmountTrait {
	protected $amount; 

	public function getAmount() 
	{
		return $this->amount;
	}

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
