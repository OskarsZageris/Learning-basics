<head>
    <title>C-19 Table</title>
</head>
<body>

<?php
$date = $_GET['search'] ?? '';
var_dump($date);
$q = json_decode(file_get_contents("https://data.gov.lv/dati/lv/api/3/action/datastore_search?q=$date&resource_id=d499d2f0-b1ea-4ba2-9600-2c701b03bd4a&limit=50"));

$data = [];

foreach ($q as $key => $item) {

    $data[$key] = $item;
}
?>

<h1 class="title">Covid Info</h1>

<form class="search" method="get" action="/">
    <label for="search">Select Date</label>
    <input name="search" type="date" id="search">
    <button type="submit">Search</button>
</form>

<br>


<style>
    table, th, td {
        border: 1px solid black;
    }
</style>


<table style="width:100%">
    <tr>
        <th>Datums</th>
        <th>Testu skaits</th>
        <th>Apstiprināti C19</th>
        <th>Īpatsvars</th>
    </tr>
    <?php foreach ($data['result']->records as $data) { ?>
        <tr>
            <td><?php echo substr($data->Datums, 0, 10); ?></td>
            <td><?php echo $data->TestuSkaits; ?></td>
            <td><?php echo $data->ApstiprinataCOVID19InfekcijaSkaits; ?></td>
            <td><?php echo $data->Ipatsvars; ?></td>
        </tr>
    <?php } ?>
</table>
</body>
