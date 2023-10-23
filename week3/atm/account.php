<?php
// This is the base class for checking and savings accounts
// It is declared **abstract** so that it can not be instantiated
// Child classes must be derived that 
// implement the withdrawal and getAccountDetails methods

/* Note:
	You should implement all other methods in the class
*/

abstract class Account 
{
	protected $accountId;
	protected $balance;
	protected $startDate;
	
	public function __construct ($id, $bal, $startDt) 
	{
		$this->accountId = $id;
		$this->balance = $bal;
		$this->startDate = $startDt;
	   // write code here
	} // end constructor
	
	public function deposit ($amount) 
	{
		$this->balance += $amount;
		// write code here
	} // end deposit

	// This is an abstract method. 
	// This method must be defined in all classes
	// that inherit from this class
	abstract public function withdrawal($amount);
	
	public function getStartDate() 
	{
		return $this->startDate;
		// write code here
	} // end getStartDate

	public function getBalance() 
	{
		return $this->balance;
		// write code here
	} // end getBalance

	public function getAccountId() 
	{
		return $this->accountId;
		// write code here
	} // end getAccountId

	// Display AccountID, Balance and StartDate in a nice format
	protected function getAccountDetails()
	{
		echo "<li>ID: ", $this->accountId, "</li>";
		echo "<li>Balance: ", $this->balance, "</li>";
		echo "<li>Start Date: ", $this->startDate, "</li>";
		// write code here
	} // end getAccountDetails
	
} // end account

?>
