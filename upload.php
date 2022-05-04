<!DOCTYPE html>
<html>
<body>
<br>
<?php
// $file = json_decode(file_get_contents($_FILES["file"]["tmp_name"]), true);

function array_keys_multi(array $array)
{
    $keys = array();

    foreach ($array as $key => $value) {
        $keys[] = $key;

        if (is_array($value)) {
            $keys = array_merge($keys, array_keys_multi($value));
        }
    }

    return $keys;
}
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
function forCDeck() {
    $fKeys = array("commander", "mainBoard");
    for($i = 0; $i < count($fKeys); $i++) {
        for($r = 0; $r < count($file["data"][$fKeys[$i]]); $r++) {
            unset($file["data"][$fKeys[$i]][$r]["foreignData"]);
            unset($file["data"][$fKeys[$i]][$r]["availability"]);
            unset($file["data"][$fKeys[$i]][$r]["borderColor"]);
            unset($file["data"][$fKeys[$i]][$r]["edhrecRank"]);
            unset($file["data"][$fKeys[$i]][$r]["hasFoil"]);
            unset($file["data"][$fKeys[$i]][$r]["frameVersion"]);
            unset($file["data"][$fKeys[$i]][$r]["frameEffects"]);
            unset($file["data"][$fKeys[$i]][$r]["hasNonFoil"]);
            unset($file["data"][$fKeys[$i]][$r]["securityStamp"]);
            unset($file["data"][$fKeys[$i]][$r]["isFoil"]);
            // unset($file["data"][$fKeys[$i]][$r][""]);
        }
    }
}
function forSet() {
    for($r = 0; $r < count($file["data"]["cards"]); $r++) {
        unset($file["data"]["cards"][$r]["availability"]);
        unset($file["data"]["cards"][$r]["borderColor"]);
        unset($file["data"]["cards"][$r]["foreignData"]);
        unset($file["data"]["cards"][$r]["frameVersion"]);
        unset($file["data"]["cards"][$r]["hasFoil"]);
        unset($file["data"]["cards"][$r]["hasNonFoil"]);
        unset($file["data"]["cards"][$r]["edhrecRank"]);
        unset($file["data"]["cards"][$r]["availability"]);
        print_r($file["data"]["cards"][$e]["number"] + "<br>");
        // unset($file["data"]["cards"][$r][""]);
    }
    for($e = 0; $e < count($file["data"]["token"]); $e++) {
        unset($file["data"]["token"][$e]["availability"]);
        unset($file["data"]["token"][$e]["borderColor"]);
        unset($file["data"]["token"][$r]["frameVersion"]);
        unset($file["data"]["token"][$r]["hasFoil"]);
        unset($file["data"]["token"][$r]["hasNonFoil"]);
        unset($file["data"]["token"][$e][""]);
        unset($file["data"]["token"][$e][""]);
        print_r($file["data"]["token"][$e]["number"] + "<br>");
        // unset($file["data"]["token"][$e][""]);
    }
}

// $somecontent = json_encode($file, JSON_PRETTY_PRINT); // JSON_PRETTY_PRINT
// $filename = "allCards.json";

// fileWrite($somecontent, $filename);
?>
</body>
</html>