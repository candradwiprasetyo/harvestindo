<div class="payment_notif">
<strong>Transfer ATM</strong>
<br>
Silahkan transfer ke salah satu no rekening berikut :<br>
<?php
$q_bank = mysql_query("select * from m_banks order by bank_id");
while($r_bank = mysql_fetch_array($q_bank)){
?>
<?= $r_bank['bank_name']." : ".$r_bank['bank_account_number']." a/n ".$r_bank['bank_account_name']  ?><br> 
<?php
}
?>



</div>