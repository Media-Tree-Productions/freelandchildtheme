<?php

/**

 * @author MediaTree Advertising

 * @copyright Freeland Automotive Group 2020

 */

if (!defined('ABSPATH')) die();



function ds_ct_enqueue_parent() { wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); }



function ds_ct_loadjs() {

	wp_enqueue_script( 'ds-theme-script', get_stylesheet_directory_uri() . '/ds-script.js',

        array( 'jquery' )

    );

}

// Button One for Single Product Page
function add_contact_button() {
	echo 
'<a href="/contact/" type="submit" id="contact" class="button alt contact" style="margin-top: 20px;">Inquire About This Vehicle</a>' ;
}

// Purchase Process Explanation for Single Product Page
function add_purchase_process_explanation() {
	echo		
		'<div class="row" style="margin-bottom: 20px;"><h3>Carefully Curated Copy</h3><span><p>Lasdfadsrem ipsum val verbedum aborensis y principitus mastodontus comulentus...</p></span></div>';
}



add_action( 'wp_enqueue_scripts', 'ds_ct_enqueue_parent' );

add_action( 'wp_enqueue_scripts', 'ds_ct_loadjs' );

// Add action to contact button
add_action('woocommerce_before_add_to_cart_form', 'add_contact_button');

// Add action to purchase process explanation
add_action('woocommerce_after_add_to_cart_form', 'add_purchase_process_explanation');

//*** SNIPPETS FOR GRAVITY FORMS FORM */
// Make fields with class gf_readonly read-only
add_filter( 'gform_pre_render_1', 'add_readonly_script' );
function add_readonly_script( $form ) {
    ?>
 
    <script type="text/javascript">
        jQuery(document).ready(function(){
            /* apply only to a input with a class of gf_readonly */
            jQuery("li.gf_readonly input").attr("readonly","readonly");
        });
    </script>
 
    <?php
    return $form;
}

// Make refurl variable for Gravity Form 
add_filter( 'gform_field_value_refurl', 'populate_referral_url');
 
function populate_referral_url( $form ){
    // Grab URL from HTTP Server Var and put it into a variable
    $refurl = $_SERVER['HTTP_REFERER'];
    GFCommon::log_debug( __METHOD__ . "(): HTTP_REFERER value returned by the server: {$refurl}" );
 
    // Return that value to the form
    return esc_url_raw($refurl);
}

// Add product Excerpt into Arhive List Items
function product_excerpt_in_product_archives() {

     
    the_excerpt();
     
}
add_action( 'woocommerce_after_shop_loop_item_title', 'product_excerpt_in_product_archives', 40 );

// Remove WooCommerce Short Description
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );

function woocommerce_template_single_excerpt() {
                return;
}
?>

