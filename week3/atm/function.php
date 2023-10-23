<?php
    include "./account.php";
    include 'checking.php';
    include 'savings.php';

    if (isset($_POST['checkingId'])){
        $checkingAccountId = filter_input (INPUT_POST, 'checkingId');
        $checkingDate = filter_input (INPUT_POST, 'checkingDate');
        $checkingBalance = filter_input (INPUT_POST, 'checkingBalance');
        $savingsAccountId = filter_input (INPUT_POST, 'savingsAccountId');
        $savingsDate = filter_input (INPUT_POST, 'savingsDate');
        $savingsBalance = filter_input (INPUT_POST, 'savingsBalance');

        // var_dump($checkingBalance);
        // exit;

    }else{
        $checkingAccountId = 'C123';
        $checkingDate = '12-20-2019';
        $checkingBalance = 1000;
        $savingsAccountId = 'S123';
        $savingsDate = '03-20-2020';
        $savingsBalance = 5000;
    }

    $checking = new CheckingAccount ($checkingAccountId, $checkingBalance, $checkingDate);

    $savings = new SavingsAccount ($savingsAccountId, $savingsBalance, $savingsDate);



    if (isset ($_POST['withdrawChecking'])) 
    {
        $withdrawAmount = filter_input (INPUT_POST, 'checkingWithdrawAmount');
        $checking->withdrawal ($withdrawAmount);
    } 
    else if (isset ($_POST['depositChecking'])) 
    {
        $deposAmount = filter_input (INPUT_POST, 'checkingDepositAmount');
        $checking->deposit ($deposAmount);
    } 
    else if (isset ($_POST['withdrawSavings'])) 
    {
        $withdrawAmount = filter_input (INPUT_POST, 'savingsWithdrawAmount');
        $savings->withdrawal ($withdrawAmount);
    } 
    else if (isset ($_POST['depositSavings'])) 
    {
        $deposAmount = filter_input (INPUT_POST, 'savingsDepositAmount');
        $savings->deposit ($deposAmount);
    } 
?>