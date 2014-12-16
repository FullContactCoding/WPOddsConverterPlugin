<!-- create dropdown box -->
<form action="oddsconverter.php" method="post">
    <select name="oddstype" onchange="this.form.submit();">
        <option value="choose">Choose oddstype</option>
        <option value="decimal">decimal</option>
        <option value="fractional">fractional</option>
        <option value="moneyline">moneyline</option>
    </select>
</form>
<?php
//store chosen value in a variable
$oddstype = $_POST['oddstype'];
$odds = 1.21;
$decimalOdds;


if ($oddstype == "moneyline") {
    // convert decimal to moneyline
    function dec2moneyline($dec)
    {

        (float)$decimalOdds = $dec;

        //check if decimal is 2.00 or higher
        // if so moneyline = (decimal-1)*100
        if ($decimalOdds >= 2.00) {

            $moneyLine = ($decimalOdds - 1) * 100;
            return "+".$moneyLine;
        }
        //if the amount is lower then 2.00
        //moneyline = (-100)/(decimal-1)
        else {
            $moneyLine = (-100) / ($decimalOdds - 1);
            return (integer)$moneyLine;
        }



    }
}


// convert decimal to fractions

if ($oddstype == "fractional") {
    function dec2frac($dec)
    {

        $decBase = --$dec;

        $div = 1;

        do {

            $div++;

            $dec = $decBase * $div;

        } while (intval($dec) != $dec);

        if ($dec % $div == 0) {
            $dec = $dec / $div;
            $div = $div / $div;
        }

        return $dec . '/' . $div;

    }
    return $fractional = dec2frac($odds);
}




?>

<div><?php echo $oddstype; ?></div>

<div><?php echo $odds; ?></div>
<?php
    if ($oddstype == "fractional") {
        echo "<div>" . dec2frac($odds) . "</div>";
    } else if($oddstype == "moneyline") {
        echo "<div>" . dec2moneyline($odds) . "</div>";
    }
?>