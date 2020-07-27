<?php

require_once 'Account.php';

$option=explode('/',$_SERVER['REQUEST_URI']);
$account= new Account();
switch ($option[2]) {
    case 'saldo':
        $saldo = $account->saldo();
        echo $saldo;
        break;
    case 'products':
        $products = $account->products();
        var_dump($products);
        break;
    case 'transaction':
        $transaction = $account->transcation();
        var_dump($transaction);
    break;
    case 'automaticDebit':
        $automaticDebit = $account->automaticDebits();
        var_dump($automaticDebit);
    break;
}