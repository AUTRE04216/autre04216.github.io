<!DOCTYPE html>
<html>
<body>
<br>
<?php
function fileWrite($content, $fname) {
    if (is_writable($fname)) {

        // In our example we're opening $filename in append mode.
        // The file pointer is at the bottom of the file hence
        // that's where $somecontent will go when we fwrite() it.
        if (!$fp = fopen($fname, 'w')) {
            echo "Cannot open file ($fname)";
            exit;
        }

        // Write $somecontent to our opened file.
        if (fwrite($fp, $content) === FALSE) {
            echo "Cannot write to file ($fname)";
            exit;
        }

        // echo "Success, wrote ($content) to file ($fname)";

        fclose($fp);

    } else {
        echo "The file $fname is not writable";
    }
}
// json_decode(file_get_contents($_FILES["file"]["tmp_name"]), true)
// echo nl2br(json_encode($_FILES, JSON_PRETTY_PRINT));
$result = array();
$oldJson = file_get_contents("allCards.json");
$result = json_decode($oldJson, true);
for($i = 0; $i < count($_FILES["file"]["tmp_name"]); $i++) {
    // echo "<br>";
    $currentJson = json_decode(file_get_contents($_FILES["file"]["tmp_name"][$i]), true);
    $keys = array_keys($currentJson);
    // print_r($currentJson);
    array_push($result, $currentJson);

    // print_r(json_last_error());
    // echo ", ";
}

// for($e = 0; $e < count($result); $e++) {
//     unset($result[$e]["data"]["booster"]);
//     unset($result[$e]["data"]["sealedProduct"]);
//     for($k = 0; $k < count($result[$e]["data"]["cards"]); $k++) {
//         unset($result[$e]["data"]["cards"][$k]["boosterTypes"]);
//         unset($result[$e]["data"]["cards"][$k]["borderColor"]);
//         unset($result[$e]["data"]["cards"][$k]["foreignData"]);
//         unset($result[$e]["data"]["cards"][$k]["frameVersion"]);
//         unset($result[$e]["data"]["cards"][$k]["hasFoil"]);
//         unset($result[$e]["data"]["cards"][$k]["hasNonFoil"]);
//         unset($result[$e]["data"]["cards"][$k]["edhrecRank"]);
//         unset($result[$e]["data"]["cards"][$k]["availability"]);
//     }
//     for($j = 0; $j < count($result[$e]["data"]["tokens"]); $j++) {
//         unset($result[$e]["data"]["tokens"][$j]["availability"]);
//         unset($result[$e]["data"]["tokens"][$j]["borderColor"]);
//         unset($result[$e]["data"]["tokens"][$j]["frameVersion"]);
//         unset($result[$e]["data"]["tokens"][$j]["hasFoil"]);
//         unset($result[$e]["data"]["tokens"][$j]["hasNonFoil"]);
//     }
// }

echo "<br><br><br>";
// echo nl2br(json_encode($result, JSON_PRETTY_PRINT)) ;
fileWrite(json_encode($result), "allCards.json");
?>
</body>
</html>