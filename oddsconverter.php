<!-- create dropdown box -->
<form method="post" id="oddsDropdown" action="oddsconverterBack.php">
    <select name="odds type" onchange="document.getElementById('oddsDropdown').submit();">
        <option value="decimal">decimal</option>
        <option value="fractional">fractional</option>
        <option value="moneyline">moneyline</option>
    </select>
</form>
<div>3.50</div>