<?php
class Account{
    private string $name;
    private float $balance;

    public function __construct(string $name, float $balance)
    {
        $this->name = $name;
        $this->balance = $balance;
    }
    public function withdrawal(float $amount):void
    {
        $this->balance-=$amount;
    }

    public function deposit(float $amount):void
    {
        $this->balance+=$amount;
    }
    public function transfer(Account $transferTo,float $amount):void{
        $this->withdrawal($amount);
        $transferTo->deposit($amount);
    }
   public function getInfo():string{
        return "{$this->name} has {$this->balance}$";
   }
   public function getBalance():float{
        return $this->balance;
   }
}
$bartos_account = new Account("Barto's account", 100.00);
$bartos_swiss_account = new Account("Barto's account in Switzerland", 1000000.00);

echo "Initial state".PHP_EOL;
echo $bartos_account->getInfo().PHP_EOL;
echo $bartos_swiss_account->getInfo().PHP_EOL;

$bartos_account->withdrawal(20);
echo "Barto's account balance is now: " . $bartos_account->getBalance().PHP_EOL;
$bartos_swiss_account->deposit(200);
echo "Barto's Swiss account balance is now: ".$bartos_swiss_account->getBalance().PHP_EOL;

echo "Final state".PHP_EOL;
echo $bartos_account->getInfo().PHP_EOL;
echo $bartos_swiss_account->getInfo().PHP_EOL;

$matt =new Account("Matt's account",1000);
$myAccount= new Account("My",0);

$matt->transfer($myAccount,200);
echo $matt->getInfo().PHP_EOL;
echo $myAccount->getInfo().PHP_EOL;

//Creates an account "A" with the balance of 100.0
//Creates an account "B" with the balance of 0.0
//Creates an account "C" with the balance of 0.0
//Transfers 50.0 from account A to account B
//Transfers 25.0 from account B to account C

$a=new Account ("A",100);
$b=new Account ("B",0);
$c=new Account ("C",0);
 $a->transfer($b,50);
$b->transfer($c,25);
echo $a->getInfo().PHP_EOL;
echo $b->getInfo().PHP_EOL;
echo $c->getInfo().PHP_EOL;


