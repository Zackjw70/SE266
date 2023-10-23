<?php
 


class CheckingAccount extends Account 
{
	const OVERDRAW_LIMIT = -200;

	public function withdrawal($amount) 
	{
		if ($this->balance - $amount < self::OVERDRAW_LIMIT){
			return false;

		}
		else{
			$this->balance -= $amount;
			return true;
		}
		// write code here. Return true if withdrawal goes through; false otherwise
	} // end withdrawal

	//freebie. I am giving you this code.
	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Checking Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	}
}


// The code below runs everytime this class loads and 
// should be commented out after testing.



//echo $checking->getAccountDetails();
// echo $checking->getStartDate();
    
?>
