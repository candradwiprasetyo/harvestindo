<table style="background-color:#f6f6f6;width:100%">
		<tbody><tr>
			<td style="vertical-align:top"></td>
			<td style="vertical-align:top;display:block!important;max-width:600px!important;margin:0 auto!important;clear:both!important" width="600">
				<div style="max-width:600px;margin:0 auto;display:block;padding:20px">
					<table width="100%" cellpadding="0" cellspacing="0" style="background:#fff;border:1px solid #e9e9e9;border-radius:3px">
	<tbody><tr>
		<td style="vertical-align:top;padding:20px">
			<table width="100%" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td style="vertical-align:top;padding:0 0 20px">
						<h2 style="font-size:24px;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;text-align:center;color:#000;margin:40px 0 0;line-height:1.2;font-weight:400">Thank you for using Hashfield.io</h2>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top">
						<table style="margin:40px auto;text-align:left;width:80%">
							<tbody><tr>
								<td style="padding:5px 0;vertical-align:top">
									Thank you for your order #<?= $data['transaction_number'] ?><br>
								</td>
							</tr>
							<tr>
								<td style="padding:5px 0;vertical-align:top">
									<p>
										Payment method : <?= $data['payment_method_name'] ?>
									</p>
                                    <p>
										Total : $ <?= number_format($data['total_price'],0) ?>
									</p>
                                    <p>
										Payment instruction here...
									</p>
                                    
									<p>
										Best regards,<br>
										<span style="font-style:italic">Hashfield Team</span>
									</p>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top;text-align:center">
						<a style="color:#293846;text-decoration:underline" href="https://HashFlare.io/" target="_blank">
							Hashfield.io
						</a></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>

<br />
<table width="100%" cellpadding="0" cellspacing="0" style="background:#fff;border:1px solid #e9e9e9;border-radius:3px">
	<tbody><tr>
		<td style="vertical-align:top;padding:20px">
			<table width="100%" cellpadding="0" cellspacing="0">
				<tbody><tr>
					<td style="vertical-align:top;padding:0 0 20px">
						<h2 style="font-size:24px;font-family:'Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;text-align:center;color:#000;margin:40px 0 0;line-height:1.2;font-weight:400">Detail Transaction</h2>
					</td>
				</tr>
				<tr>
					<td style="vertical-align:top">
                    
                    
                     <table width="100%" border="0" cellspacing="0" cellpadding="0" class="invoice_table">
  <tr>
    <td><br /><table width="100%" border="0" cellspacing="0" cellpadding="0" class="invoice_table_content" style="margin:40px auto;">
      <tr align="center" class="invoice_table_content_title">
        <td><strong>Item</strong></td>
        <td><strong>Duration</strong></td>
        <td><strong>Quantity</strong></td>
        <td><strong>Unit Price</strong></td>
        <td align="right"><strong>Total Price</strong></td>
        <td width="3%">&nbsp;</td>
        </tr>
      <?php 
	$total_price = 0;
	foreach($list as $row): ?>
      <tr height="50" style="border-bottom:1px solid #ccc; color:#595a5c">
        <td align="center"><strong>Instant Mining</strong><br /><?= $row['im_name']." ".$row['im_subname'] ?></td>
        <td align="center"><?= $row['imd_time'] ?></td>
        <td align="center"><?= $row['tr_amount'] * 1000000 ?> Mh/s</td>
        <td align="center">$ <?= $this->payment_model->get_rate_dollar() ?> </td>
        <td align="right">$ <?= number_format($row['tr_total_price'],0) ?></td>
        <td width="3%">&nbsp;</td>
        </tr>
      <?php 
		$total_price = $total_price + $row['tr_total_price'];
		endforeach; 
		?>
      <tr height="50">
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center">&nbsp;</td>
        <td align="center"><strong>Grand Total</strong></td>
        <td align="right">$ <?= number_format($total_price,0) ?></td>
        <td align="right"></td>
        </tr>
      
      </table></td>
  </tr>
  
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
                    
                    
                    </td>
				</tr>
				<tr>
					<td style="vertical-align:top;text-align:center">
						<a style="color:#293846;text-decoration:underline" href="https://HashFlare.io/" target="_blank">
							Hashfield.io
						</a></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
</tbody></table>

<div style="width:100%;clear:both;color:#999;padding:20px">
	<span class="HOEnZb"><font color="#888888">
		</font></span><span class="HOEnZb"><font color="#888888">
	</font></span><table width="100%">
		<tbody><tr>
			<td style="vertical-align:top;font-size:12px;text-align:center">
				Questions? Email <a href="mailto:invoices@hashflare.io" style="color:#999;font-size:12px" target="_blank">
					invoices@hashfield.io				</a><span class="HOEnZb"><font color="#888888">
			</font></span></td></tr></tbody></table><span class="HOEnZb"><font color="#888888">
</font></span></div><span class="HOEnZb"><font color="#888888">
				</font></span></div><span class="HOEnZb"><font color="#888888">
			</font></span></td>
			<td style="vertical-align:top"></td>
		</tr></tbody></table>