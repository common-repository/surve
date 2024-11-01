<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.surve.nl
 * @since      1.0.0
 *
 * @package    Surve
 * @subpackage Surve/admin/partials
 */
?>
<div class="wrap">
	<h1>Surve</h1>
	<form method="post" action="options.php">
		<?php
        settings_fields( $this->plugin_name.'_group' );
        do_settings_sections( $this->plugin_name.'-settings' );
        ?>
		<table class="form-table">
			<tr valign="top">
				<th><?php echo __('Website ID');?>:</th>
				<td><input name="<?php echo $this->plugin_name;?>_website_id" value="<?php echo esc_attr( get_option($this->plugin_name.'_website_id') ); ?>" /></td>
			</tr>
			<tr>
				<th colspan="2"><?php echo __('Om de Surve code te laten werken vult u hierboven het ID in van uw website. Dit ID kunt u vinden op de pagina \'Websites\' in uw Surve account.'); ?></th>
			</tr>
		</table>
		<?php
        submit_button();
		?>
	</form>
</div>