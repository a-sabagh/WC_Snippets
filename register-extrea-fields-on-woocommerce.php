<?php
function rng_extra_register_fields() { ?>
    <p class="form-row form-row-wide">
        <label for="reg_billing_phone"><?php _e('Phone', 'woocommerce'); ?></label>
        <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php esc_attr_e($_POST['billing_phone']); ?>" />
    </p>
    <p class="form-row form-row-first">
        <label for="reg_billing_first_name"><?php _e('First name', 'woocommerce'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if (!empty($_POST['billing_first_name'])) esc_attr_e($_POST['billing_first_name']); ?>" />
    </p>
    <p class="form-row form-row-last">
        <label for="reg_billing_last_name"><?php _e('Last name', 'woocommerce'); ?><span class="required">*</span></label>
        <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if (!empty($_POST['billing_last_name'])) esc_attr_e($_POST['billing_last_name']); ?>" />
    </p>
    <div class="clear"></div>
    <?php
}

add_action('woocommerce_register_form_start', 'rng_extra_register_fields');
