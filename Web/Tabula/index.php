<form method="post">
    <input type="submit" name="nextPage"
           class="button" value=50 />

    <input type="submit" name="previousPage"
           class="button" value=50 />
</form>
<?php

//md tabula ar covids datu testu skaits un apstiprinaajumui ka ir kuraa datumaa, var izveeleeties kuraa datumaa
// https://data.gov.lv/dati/lv/dataset/valstu-saslimstibas-raditaji-ar-covid-19/resource/8ea0ee31-1bea-4336-bbe4-2e66ccdadd1b
$offset=50;
$offset+=$_GET["nextPage"];
var_dump($offset);
$offset-=$_GET["previousPage"];
?>




<?php
echo "<pre>";



$offset=50;
$q=json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$_GET["search"]}&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&offset=$offset"));
$i=0;
$table=[];
foreach($q as$index=> $w){
   $table[$index]=$w;
}
//var_dump($table["result"]);
?>
<form method="get" action="/">
    <input name="search" value="" />
        <button>Submit</button>






<table>
    <?php foreach ($table["result"]->records as $v){ $i++?>
<tr>
    <td>
        <?php echo "---------------------- $i" ."<br>";

        echo "Name: ". $v->name . "<br>";
//       echo "Name: ". $v->name . "<br>";
//var_dump($_GET["search"]);
         echo "Reg number: ". $v->regcode . "<br>";
        echo "Company: ". $v->type . "<br>";
        ?>

    </td>
</tr>
    <?php } ?>
</table>






