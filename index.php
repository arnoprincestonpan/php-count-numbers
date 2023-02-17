<?php
$msg = "<p>Displays</p>";

if(isset($_GET["count"])){
    $startNumber = (int)$_GET["count-from"];
    $endNumber = (int)$_GET["count-to"];
    $range = abs($startNumber - $endNumber);
    if($startNumber > $endNumber){
        $msg .= "<p>Counting down:" . $startNumber . " to " . $endNumber . ", " . $range . " away.</p>";
        $msg .= "<ul>";
        for($i = 0; $i <= $range; $i++){
            if($i == 0){
                $msg .= "<li><b>Start: " . $startNumber . "</b></li>";
            }else if($i == $range){
                $msg .= "<li><b>End: " . $startNumber . "</b></li>";
            }else{
                $msg .= "<li>" . $startNumber . "</li>";
            }
            $startNumber--;
        }
        $msg .= "</ul>";
    }else if($endNumber > $startNumber){
        $msg .= "<p>Counting up:" . $startNumber . " to " . $endNumber . ", " . $range . " away.</p>";
        $msg .= "<ul>";
        for($i = 0; $i <= $range; $i++){
            if($i == 0){
                $msg .= "<li><b>Start: " . $startNumber . "</b></li>";
            }else if($i == $range){
                $msg .= "<li><b>End: " . $startNumber . "</b></li>";
            }else{
                $msg .= "<li>" . $startNumber . "</li>";
            }
            $startNumber++;
        }
        $msg .= "</ul>";
    }else if($endNumber == $startNumber){
        $msg .= "<p>No Count:" . $startNumber . " and " . $endNumber . " are the same number.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Count Numbers Up and Down with PHP</title>
    <link rel="stylesheet" href="/styles.css"></link>
</head>
<body>
    <main id="main-area">
        <h1>Count Numbers, Up and Down with PHP</h1>
        <section id="section-form">
            <form id="number-form" action="<?= $_SERVER["PHP_SELF"]?>" method="get">
                <label for="count-from">Count from this Number: </label>
                <input id="count-from" value="<?= $startNumber ?>" type="number" min="-25" max="25" placeholder="Enter a Number from -25 to 25" name="count-from">
                <br>
                <label for="count-to">Count to this Number: </label>
                <input id="count-to" value="<?= $endNumber ?>"type="number" min="-25" max="25" placeholder="Enter a Number from -25 to 25" name="count-to">
                <input id="count" value="Submit" type="submit" name="count">
            </form>
        </section>
        <section id="section-display">
            <?= $msg ?>
        </section>
    </main>
</body>
</html>