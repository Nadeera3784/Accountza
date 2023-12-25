<p>
 Hi <?php echo $client_data->name;?>,<br>

 Thank you for your recent business with us. We have attached a detailed copy of invoice <?php echo $invoice->invoice_no;?> to this email.<br>

 The invoice total is <?php echo get_currency_symbol($settings->company_currency) ." ". currency_format($invoice->invoice_total);?> to be paid by  <?php echo $invoice->invoice_due;?>.<br>

 if you have any questions or concerns regarding this invoice, please don't hesitate to get in touch with us<br>
 at <?php echo $settings->company_phone;?>.<br>

 Sincerely,<br>
 <?php echo $settings->company_name;?>
<p>