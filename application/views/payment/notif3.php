<div class="payment_notif">

<div class="form-group">
<label>Bank</label><br />
<select name="i_bank_id" class="form-control">
<?php
$query_bank = mysql_query("select * from m_banks");
while($row_bank = mysql_fetch_array($query_bank)){
?>
<option value="<?= $row_bank['bank_id'] ?>"><?= $row_bank['bank_name'] ?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label>Tenor</label><br />
<select name="i_tenor_id" class="form-control">
<?php
$query_cicilan = mysql_query("select * from m_tenor");
while($row_cicilan = mysql_fetch_array($query_cicilan)){
?>
<option value="<?= $row_cicilan['tenor_id'] ?>"><?= $row_cicilan['tenor_name'] ?></option>
<?php
}
?>
</select>
</div>


<div class="form-group">
<label>Card Number</label><br />
<input name="i_card_number" type="text" size="40" required/>
</div>

<div class="form-group">
<label>CVV</label><br />
<input name="i_cvv" type="text" size="10" maxlength="3" required/>
</div>
</div>

