<script type="text/javascript">
	jQuery(document).ready(function() {
		jQuery('#wp_subscribes_send_sms').click(function() {
			jQuery('#wp_subscribes_stats').fadeToggle();
		});
	});
</script>

<div class="wrap">
	<?php include( dirname( __FILE__ ) . '/tabs.php' ); ?>
	<table class="form-table">
		<form method="post" action="options.php" name="form">
			<?php wp_nonce_field('update-options');?>
			<tr>
				<th><?php _e('Status', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_subscribes_status" id="wp_subscribes_status" <?php echo get_option('wp_subscribes_status') ==true? 'checked="checked"':'';?>/>
					<label for="wp_subscribes_status"><?php _e('Active', 'wp-sms'); ?></label>
				</td>
			</tr>

			<tr>
				<th><?php _e('Verified with the activation code', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_subscribes_activation" id="wp_subscribes_activation" <?php echo get_option('wp_subscribes_activation') ==true? 'checked="checked"':'';?>/>
					<label for="wp_subscribes_activation"><?php _e('Active', 'wp-sms'); ?></label>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('Send SMS', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_subscribes_send_sms" id="wp_subscribes_send_sms" <?php echo get_option('wp_subscribes_send_sms') ==true? 'checked="checked"':'';?>/>
					<label for="wp_subscribes_send_sms"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description"><?php _e('Send a sms to subscriber when register.', 'wp-sms'); ?></p>
				</td>
			</tr>
			
			<?php if( get_option('wp_subscribes_send_sms') ) { $hidden=""; } else { $hidden=" style='display: none;'"; }?>
			<tr valign="top"<?php echo $hidden;?> id='wp_subscribes_stats'>
				<td scope="row">
					<label for="wpsms-text-template"><?php _e('Text template', 'wp-sms'); ?>:</label>
				</th>
				
				<td>
					<textarea id="wpsms-text-template" cols="50" rows="7" name="wp_subscribes_text_send"><?php echo get_option('wp_subscribes_text_send'); ?></textarea>
					<p class="description"><?php _e('Enter the contents of the sms message.', 'wp-sms'); ?></p>
					<p class="description data">
						<?php _e('Input data:', 'wp-sms'); ?>
						<?php _e('Subscribe name', 'wp-sms'); ?>: <code>%subscribe_name%</code>
						<?php _e('Subscribe mobile', 'wp-sms'); ?>: <code>%subscribe_mobile%</code>
					</p>
				</td>
			</tr>
			
			<tr>
				<th><?php _e('Calling jQuery in Wordpress', 'wp-sms'); ?></th>
				<td>
					<input type="checkbox" name="wp_call_jquery" id="wp_call_jquery" <?php echo get_option('wp_call_jquery') ==true? 'checked="checked"':'';?>/>
					<label for="wp_call_jquery"><?php _e('Active', 'wp-sms'); ?></label>
					<p class="description">(<?php _e('Enable this option with JQuery is called in the theme', 'wp-sms'); ?>)</p>
				</td>
			</tr>
			
			<tr>
				<td>
					<p class="submit">
						<input type="hidden" name="action" value="update" />
						<input type="hidden" name="page_options" value="wp_subscribes_status,wp_subscribes_activation,wp_subscribes_send_sms,wp_subscribes_text_send,wp_subscribes_send,wp_call_jquery" />
						<input type="submit" class="button-primary" name="Submit" value="<?php _e('Update', 'wp-sms'); ?>" />
					</p>
				</td>
			</tr>
		</form>	
	</table>
</div>