

<h1>Results</h1>

<?php


foreach ($items as $item){

    //dump($item);
    echo $item->name, " - ", $item->enrollmentCode, " - ", $item->section , "<br>";
}

?>

