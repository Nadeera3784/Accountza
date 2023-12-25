<p>
Hi <?php echo $client_data->name;?>,<br>

Please find the attached estimate <?php echo $estimate->estimate_no;?>.<br>

You can view the estimate on the following link  <a target="_blank" href="<?php echo base_url('readonly/view_estimate/'.$this->hasher->encrypt($estimate->estimate_id));?>">visit estimate</a><br>

Looking forward to hearing from  you.<br>

Sincerely,<br>
 <?php echo $settings->company_name;?>

</p>