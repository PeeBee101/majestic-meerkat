<?php
/**
 * Read ACF fields from JSON file
 */
function b9_acf_register_json_fields() {
    if (function_exists("acf_add_local_field_group")) {
        $acf_json_data = locate_template("includes/acf/acf-fields.json");
        $custom_fields = $acf_json_data ? json_decode(file_get_contents($acf_json_data), true) : array();

        foreach ($custom_fields as $custom_field) {
            acf_add_local_field_group($custom_field);
        }
    }
}
add_action("init", "b9_acf_register_json_fields");