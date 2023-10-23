<?php


 
class SavingsAccount extends Account 
{

	public function withdrawal($amount) 
	{
		if ($this->balance - $amount < 0){
			return false;

		}
		else{
			$this->balance -= $amount;
			return true;
		}
		// write code here. Return true if withdrawal goes through; false otherwise
	} //end withdrawal

	public function getAccountDetails() 
	{
		$accountDetails = "<h2>Savings Account</h2>";
		$accountDetails .= parent::getAccountDetails();
		
		return $accountDetails;
	   // look at how it's defined in other class. You should be able to figure this out ...
	} //end getAccountDetails
	
} // end Savings

// The code below runs everytime this class loads and 
// should be commented out after testing.

    
    
//echo $savings->getAccountDetails();
?>
