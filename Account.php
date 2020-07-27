<?php

require_once 'Conn.php';

class Account
{
    public function saldo() {
        $conn = new Conn();
        $arrayData=$conn->getApi("https://rs1.tecban-sandbox.o3bank.co.uk/open-banking/v3.1/aisp/balances");
        $saldo=0;
        foreach($arrayData->Data->Balance as $contas){
            $saldo+=(double)$contas->Amount->Amount;

        }
        return $saldo;
    }

    //Fizemos um teste adaptado para os produtos, pois a API não existia os produtos que pensamos em utilizar.
    // Por isso Essa adaptação simulando a API da TecBan que pretendemos usar futuramente.
    public function products() {
        $conn = new Conn();
        $arrayData=$conn->getApi("https://rs1.tecban-sandbox.o3bank.co.uk/open-banking/v2.4/personal-current-accounts");

        foreach ($arrayData->data as $products){
            foreach($products->Brand as $product){
                $returnProducts['serviceName']='Emprestimo';
                $returnProducts['Confiabilidade']=10;
                $returnProducts['Taxa']=3;
                $returnProducts['periodicidade']='Mensal';
                $returnProducts['nomeBanco']='Santander';
            }
        }

        return $returnProducts;
    }

    public function transcation() {
        $conn = new Conn();
        $arrayData=$conn->getApi("https://rs1.tecban-sandbox.o3bank.co.uk/open-banking/v3.1/aisp/transactions");

        $transactionValues=0;

        foreach($arrayData->Data->Transaction as $transactions){

            $transactionValues+=(double)$transactions->Amount->Amount;
        }

        return $transactionValues;

    }

    public function automaticDebits() {
        $conn = new Conn();
        $arrayData=$conn->getApi("https://rs1.tecban-sandbox.o3bank.co.uk/open-banking/v3.1/aisp/direct-debits");
        $automaticDebitValues=0;

        foreach($arrayData->Data->DirectDebit as $directDebit){

            $automaticDebitValues+=(double)$directDebit->Amount->Amount;
        }

        return $automaticDebitValues;
    }

}