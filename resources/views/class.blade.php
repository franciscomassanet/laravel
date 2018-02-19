

<h1>Results</h1>

<?php


foreach ($results as $item){

    //dump($item);
    echo $item->profile->name->fullName, " - ", $item->profile->emailAddress, " - ", $item->profile->photoUrl , "<br>";
}

?>

