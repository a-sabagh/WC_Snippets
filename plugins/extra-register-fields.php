
/**
 * adding registeration extra fields
 */
function rng_extra_register_fields() {
    ?>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="INPUT_ID">INPUT LABEL<span class="required">*</span></label>
        <input class="woocommerce-Input woocommerce-Input--text input-text" name="billing_INPUT_NAME" id="INPUT_ID" value="" type="text">
    </p>
    <?php

}

add_action('woocommerce_register_form_start', 'rng_extra_register_fields');

/*
 * registeration fields Validating.
 */

function rng_validate_extra_register_fields($username, $email, $validation_errors) {

    if (isset($_POST['billing_INPUT_NAME']) && empty($_POST['billing_INPUT_NAME'])) {
        $validation_errors->add('billing_first_name_error', "INPUT ERROR MSG");
    }

    return $validation_errors;
}

add_action('woocommerce_register_post', 'rng_validate_extra_register_fields', 10, 3);