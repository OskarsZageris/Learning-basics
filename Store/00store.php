<?php
$dataBasketCash =file_get_contents("00basketCash.txt");

$dataPerson =file_get_contents("00personCash.txt");

$dataForPerson=explode("\n",$dataPerson);
$dataForBasket=explode("\n",$dataBasketCash);

//$dataForBasket=explode("\n",$dataBasket);
foreach ($dataForBasket as $item){
    $basketHistory[]=explode(",",$item);
}




foreach ($dataForPerson as $cash){
    $personCash[]=explode(",",$cash);
}

$dataProducts =file_get_contents("00products.csv");
$dataForProducts=explode("\n",$dataProducts);

foreach ($dataForProducts as $item){
    $products[]=explode(",",$item);
}
function createPerson(string $name, int $money):stdClass
{
    $person =new stdClass();
    $person->name=$name;
    $person->money=$money;
    return $person;
}

function createProduct(string $name, int $price, int $amount):stdClass
{
$product = new stdClass();
$product->name=$name;
$product->price=$price;
$product->amount=$amount;
return $product;
}
foreach ($personCash as $item) {

if(!empty($item[0])){
    $persons[]= createPerson($item[0],(int)$item[1]);
}
}

foreach ($products as $product) {
    $productsInStore[]= createProduct($product[0],(int)$product[1],(int)$product[2]);
}
//$basket=[];
//$cash=[];
$basket=[];
$cash=[];
if (!filesize('00basketCash.txt') == 0){
        foreach ($basketHistory as $value) {
    if(!empty($value[0])) {
            $basket[] = $value[0];
            $cash[] = $value[1];
        }
    }
}
$sum=0;

while(true) {
    foreach ($persons as $index=>$person){
        echo "[$index]{$person->name} has {$person->money}$".PHP_EOL;
    }
    $whoIsBuying=0;
//    $whoIsBuying=(int)readline("Enter customer number: ");
//    if($whoIsBuying>count($persons)){
//        echo "No such customer available";
//        exit;
//    }
echo "Welcome to the store {$persons[$whoIsBuying]->name}".PHP_EOL;
    foreach ($productsInStore as $index=>$product){
        echo "[$index]{$product->name} costs {$product->price}$, we have {$product->amount}".PHP_EOL;
    }

    $selectedProductIndex = (int)readline("Select product: ");
    $product = $products[$selectedProductIndex] ?? null;

    if ($product === null) {
        echo "product not found" . PHP_EOL;
        exit;
    }

    echo "{$productsInStore[$selectedProductIndex]->name} has been selected. Costs {$productsInStore[$selectedProductIndex]->price}$ each. How much do you want to buy?
There are {$productsInStore[$selectedProductIndex]->amount} in the store".PHP_EOL;
    $quantity=(int)readline("Enter number: ");
        echo PHP_EOL;
if ($productsInStore[$selectedProductIndex]->amount>=$quantity){
    $basket[]=$productsInStore[$selectedProductIndex]->name;
    $cash[]=$productsInStore[$selectedProductIndex]->price*$quantity;
    $productsInStore[$selectedProductIndex]->amount=$productsInStore[$selectedProductIndex]->amount-$quantity;
}else{
    echo "There is not enough {$productsInStore[$selectedProductIndex]->name} in the store";
}

    echo "$quantity {$productsInStore[$selectedProductIndex]->name} has been added to basket".PHP_EOL. "[0]Continue".PHP_EOL."[1]Checkout".PHP_EOL ;

    $checkoutOrContinue = (int)readline("Select option: ");
    if($checkoutOrContinue==0){

    }
    if($checkoutOrContinue==1){
        foreach ($basket as $item){
            echo $item.PHP_EOL;}
        foreach ($cash as $single){
            $sum=$sum+$single;


        }

        echo "Do you want to buy".PHP_EOL. "[0]Buy".PHP_EOL."[1]Exit".PHP_EOL ;
        echo "Total sum is {$sum}$".PHP_EOL;
        echo "{$persons[$whoIsBuying]->name} is buying and has {$persons[$whoIsBuying]->money}$".PHP_EOL;
        $buyOrGoHome = (int)readline("Select option: ");
        if($buyOrGoHome==0){
            if ($persons[0]->money < $sum) {
                echo "Not enough cash." . PHP_EOL;
                exit;
            }
            echo "Total sum ".$sum."$".PHP_EOL;
            $persons[$whoIsBuying]->money -= $sum;
            echo "{$persons[$whoIsBuying]->name} has left with {$persons[$whoIsBuying]->money}$".PHP_EOL;
            $basket=[];
            $cash=[];
            $sum=0;
            file_put_contents("00basketCash.txt", "");

        }
        if($buyOrGoHome==1){
            for($i=0;$i<count($basket);$i++){

                $filenameForItems = '00basketCash.txt';
                $memoryBasket="{$basket[$i]},{$cash[$i]}\n";
                if (is_writable($filenameForItems)) {
                    if (!$fp = fopen($filenameForItems, 'a')) {
                        exit;
                    }
                    if (fwrite($fp, $memoryBasket) === FALSE) {

                        exit;
                    }
                    fclose($fp);
                }
            }

            exit;
        }


    }


}
