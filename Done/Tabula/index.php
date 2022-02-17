<!--<form method="post">-->
<!--    <input type="submit" name="nextPage"-->
<!--           class="button" value=50 />-->
<!---->
<!--    <input type="submit" name="previousPage"-->
<!--           class="button" value=50 />-->
<!--</form>-->
<?php

//md tabula ar covids datu testu skaits un apstiprinaajumui ka ir kuraa datumaa, var izveeleeties kuraa datumaa
// https://data.gov.lv/dati/lv/dataset/valstu-saslimstibas-raditaji-ar-covid-19/resource/8ea0ee31-1bea-4336-bbe4-2e66ccdadd1b
//$offset=50;
//$offset+=$_GET["nextPage"];
//var_dump($offset);
//$offset-=$_GET["previousPage"];
?>




<?php
echo "<pre>";



$offset=50;
$q=json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q={$_GET["search"]}&resource_id=25e80bf3-f107-4ab4-89ef-251b5b9374e9&limit=10&offset=$offset"));
$i=0;
$table=[];
foreach($q as$index=> $w){
   $table[$index]=$w;
}


?>









<style>
    table, th, td {
        border:1px solid black;
    }
</style>


<h2>A basic HTML table</h2>

<table style="width:100%">
    <tr>
        <th>Company</th>
        <th>Contact</th>
        <th>Country</th>
    </tr>
    <?php foreach ($table["result"]->records as $v){?>
    <tr>
        <td><?php echo $v->name ?></td>
        <td><?php echo $v->regcode ?></td>
        <td><?php echo $v->type ?></td>
    </tr>
    <?php }?>
</table>












