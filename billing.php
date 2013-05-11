<?php
include_once('classes/utility_functions.php');

$conn = db_connect();

$sql = "select * from Invoices";

$rs = mysql_query($sql);

$invoices = array();
$next_send_invoice_id = 0;
$current_send_date = 0;
while($data = mysql_fetch_assoc($rs))
{
	$invoices[$data['eStatus']][$data['iInvoiceID']] = $data;
	if($data['eStatus'] == 'Design' && strtotime($data['dToSend']) > $current_send_date)
	{
		$current_send_date = strtotime($data['dToSend']);
		$next_send_invoice_id = $data['iInvoiceID'];
	}
}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title>BillReach</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="css/screen.css">
		<script src="js/vendor/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		<!--[if lt IE 9]>
		<div class="whatever-floats-your-boat">
			<div class="ie-wrap">
				<strong class="title">Sorry buddy,</strong>
				<p>For now, we don't support your old browser.  Either upgrade it to Chrome, Firefox or Internet Explorer 9, or visit this site on your tablet.</p>
			</div>
		</div>
	<![endif]-->
		<div class="width">					
			<h1>Invoices for <span class="company-name">BillReach</span></h1>
			<hr />
			<?php
			if(count($invoices) > 0)
			{
				?>
				<!-- I'll probably want to push this one level deeper past a top-level dashboard. -->
				<h2>Unbilled</h2><button onclick="window.location = '/create-invoice-form.php';">Create Invoice</button>
				<?php
				if(count($invoices['Design']) > 0)
				{
					if($next_send_invoice_id > 0)
					{
						$next_send_invoice = $invoices['Design'][$next_send_invoice_id];
						?>
						<p>The next invoice is due to be sent out on <strong><?php echo date('M d Y',strtotime($next_send_invoice['dToSend']));?></strong> and currently has <strong>$<?php echo number_format($next_send_invoice['fAmount'],2);?></strong> billed to it. <a href="invoice.html">View Details</a></p>
						<?php
					}?>
					<table cellpadding="0" border="0" cellspacing="0">
						<thead>
							<tr>
								<th></th>
								<th>#</th>
								<th>Title</th>
								<th>To Send</th>
								<th>Due</th>
								<th>Amount</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
					<?php
					foreach($invoices['Design'] as $invoice)
					{
						?>
						<tr>
							<td><input type="checkbox"></td>
							<td><?php echo $invoice['iInvoiceID'];?></td>
							<td><?php echo $invoice['sTitle'];?></td>
							<td><?php echo date('M d Y',strtotime($invoice['dToSend']));?></td>
							<td><?php echo date('M d Y',strtotime($invoice['dDue']));?></td>
							<td>$ <?php echo number_format($invoice['fAmount'],2);?></td>
							<td><a href="invoice.html">Details</a></td>
						</tr>
						<?php
					}
					?>
					</tbody>
					</table>
					<p><button>Send Early</button> <button>Send Report</button></p>
					<?php
				}
				?>
				<hr />
				<h2>Awaiting Payment</h2>
				<?php
				if(count($invoices['Due']) > 0)
				{
					?>
					<table cellpadding="0" border="0" cellspacing="0">
						<thead>
							<tr>
								<th></th>
								<th>#</th>
								<th>Title</th>
								<th>Due</th>
								<th>Amount</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
					<?php
					foreach($invoices['Due'] as $invoice)
					{
						?>
						<tr>
							<td><input type="checkbox"></td>
							<td><?php echo $invoice['iInvoiceID'];?></td>
							<td><?php echo $invoice['sTitle'];?></td>
							<td><?php echo date('M d Y',strtotime($invoice['dDue']));?></td>
							<td>$ <?php echo number_format($invoice['fAmount'],2);?></td>
							<td><a href="invoice.html">Details</a></td>
						</tr>
						<?php
					}
					?>
					</tbody>
					</table>
					<p><button>Mark as Paid</button></p>
					<?php
				}
				?>
					<hr />
				<h2>Paid Invoices</h2>
				<?php
				if(count($invoices['Paid']) > 0)
				{
					?>
					<table cellpadding="0" border="0" cellspacing="0">
						<thead>
							<tr>
								<th></th>
								<th>#</th>
								<th>Title</th>
								<th>Sent</th>
								<th>Amount</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
					<?php
					foreach($invoices['Paid'] as $invoice)
					{
						?>
						<tr>
							<td><input type="checkbox"></td>
							<td><?php echo $invoice['iInvoiceID'];?></td>
							<td><?php echo $invoice['sTitle'];?></td>
							<td><?php echo date('M d Y',strtotime($invoice['dPaid']));?></td>
							<td>$ <?php echo number_format($invoice['fAmount'],2);?></td>
							<td><a href="invoice.html">Details</a></td>
						</tr>
						<?php
					}
					?>
						</tbody>
					</table>
					<?php
				}
				?>
				<hr>
				<?php
			}
			?>
			</div>
		</div>


		<footer id="footer">
			<div class="width">
				&copy; 2013 BillReach
			</div>
		</footer>

		<!--
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>
		-->
		<script src="js/vendor/jquery-1.8.3.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/main.js"></script>

		<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
		<script>
			/* 
			// commnted out for now
			var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
			(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
			g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g,s)}(document,'script'));
			*/
		</script>
	</body>
</html>
