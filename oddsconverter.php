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
$odds = 3;



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
    return $odds = dec2frac($odds);
}




?>
<div><?php echo $oddstype; ?></div>

<div><?php echo $odds; ?></div>

