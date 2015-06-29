<script type="text/javascript">
	function openwin() {
		var url=document.form.wp_webservice.value;
		if(url==1) {
			document.location.href="<?php echo $sms_page['about']; ?>";
		}
	}
	
	jQuery(document).ready(function(){
		jQuery(".chosen-select").chosen();
		
		jQuery("#wps_reset").click(function(){
			if(confirm('<?php _e('Your Web service data will be deleted. Are you sure?', 'wp-sms'); ?>')) {
				return true;
			} else {
				return false;
			}
		});
	});
</script>

<style>
	p.register{
		float: <?php echo is_rtl() == true? "right":"left"; ?>
	}
</style>

<div class="wrap">
	<?php include( dirname( __FILE__ ) . '/tabs.php' ); ?>
	<form method="post" action="options.php" name="form">
		<table class="form-table">
			<?php wp_nonce_field('update-options');?>
			<tr>
				<th></th>
				<td>
					<input type="hidden" dir="ltr" name="wp_webservice" value="novinpayamak"/>
					
					
					
				</td>
			</tr>

			<?php if(get_option('wp_webservice')) { ?>
			
			
			<tr>
				<th><?php _e('Password', 'wp-sms'); ?>:</th>
				<td>
					<input type="password" dir="ltr" name="wp_password" value="<?php echo get_option('wp_password'); ?>"/>
					<p class="description"><?php echo sprintf(__('Your password in <a href="%s">%s</a>', 'wp-sms'), $sms->tariff, get_option('wp_webservice')); ?></p>
				</td>
			</tr>
			
			

			<tr>
				<th><?php _e('Number', 'wp-sms'); ?>:</th>
				<td>
					<input type="text" dir="ltr" name="wp_number" value="<?php echo get_option('wp_number'); ?>"/>
					<p class="description"><?php echo sprintf(__('Your SMS sender number in <a href="%s">%s</a>', 'wp-sms'), $sms->tariff, get_option('wp_webservice')); ?></p>
				</td>
			</tr>
			
			<?php if($sms->GetCredit() > 0) { ?>
			<tr>
				<th><?php _e('Status', 'wp-sms'); ?>:</th>
				<td>
					<img src="<?php echo WP_SMS_DIR_PLUGIN; ?>assets/images/1.png" alt="Active" align="absmiddle"/><span style="font-weight: bold;"><?php _e('Active', 'wp-sms'); ?></span>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('Credit', 'wp-sms'); ?>:</th>
				<td>
					<?php global $sms; echo $sms->GetCredit() . " " . $sms->unit; ?>
				</td>
			</tr>
			<?php } else { ?>
			<tr>
				<th><?php _e('Status', 'wp-sms'); ?>:</th>
				<td>
					<img src="<?php echo WP_SMS_DIR_PLUGIN; ?>assets/images/0.png" alt="Deactive" align="absmiddle"/><span style="font-weight: bold;"><?php _e('Deactive', 'wp-sms'); ?></span>
				</td>
			</tr>
			<?php } ?>
			<?php } ?>
			
			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="wp_webservice,wp_username,wp_password,wps_key,wp_number" />
						<input type="submit" class="button-primary" name="Submit" value="Save" />
					</p>
				</td>
			</tr>
		</table>
	</form>	
</div>