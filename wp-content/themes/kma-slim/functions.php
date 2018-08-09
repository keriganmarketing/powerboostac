<?php
/**
 * @package KMA
 * @subpackage kmaslim
 * @since 1.0
 * @version 1.3
 */

use Includes\Modules\Reviews\Reviews;
use Includes\Modules\Helpers\CleanWP;
use Includes\Modules\Layouts\Layouts;
use Includes\Modules\Helpers\PageField;
use Includes\Modules\Leads\SimpleContact;
use Includes\Modules\Social\SocialSettingsPage;

require('vendor/autoload.php');

new CleanWP();

$socialLinks = new SocialSettingsPage();
if (is_admin()) {
    $socialLinks->createPage();
}

$layouts = new Layouts();
$layouts->addPageHeadlines();
$layouts->createSidebarSelector();
$layouts->addSidebar('Featured Image Sidebar');
$layouts->addSidebar('Benefits Sidebar');

$contact = new SimpleContact();
$contact->setupAdmin();
$contact->setupShortcode();

$reviews = new Reviews();
$reviews->setupAdmin();

add_action('after_setup_theme', function () {

    load_theme_textdomain('kmaslim', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    register_nav_menus([
        'mobile-menu' => esc_html__('Mobile Menu', 'kmaslim'),
        'footer-menu' => esc_html__('Footer Menu', 'kmaslim'),
        'main-menu'   => esc_html__('Main Navigation', 'kmaslim')
    ]);

    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);

    add_action('wp_head', function () {
        ?>
        <style type="text/css">
        <?php echo file_get_contents(get_template_directory() . '/style.css'); ?>
        </style><?php
    });

});

add_filter('woocommerce_enqueue_styles', 'jk_dequeue_styles');
function jk_dequeue_styles($enqueue_styles)
{
    unset($enqueue_styles['woocommerce-general']);    // Remove the gloss
    //unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    //unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    return $enqueue_styles;
}

add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('scripts', get_template_directory_uri() . '/app.js', [], '0.0.1', true);
});

function getPageChildren($pageName)
{
    $parent   = get_page_by_title($pageName);
    $children = get_pages([
        'parent'      => $parent->ID,
        'sort_column' => 'menu_order',
        'sort_order'  => 'asc'
    ]);

    return $children;
}

//WooCommerce stuff
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);

add_filter('woocommerce_checkout_fields', function ($fields) {
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'field';

            // add form-control to the actual input
            $field['input_class'][] = 'input';
        }
    }

    return $fields;
});

add_filter('woocommerce_sale_flash', 'woocommerce_custom_sale_text', 10, 3);
function woocommerce_custom_sale_text($text, $post, $_product)
{
    return '<span class="onsale">Summer Special</span>';
}

/**
 * Adding custom javascripts or php action on WooCommerce Thank you page
 * Works with WooCommerce 3.0 or above
 */
add_action("woocommerce_thankyou", "fb_conversion_tag", 20);
if(!function_exists('fb_conversion_tag')) {
    function xlwcty_add_custom_action_thankyou($order_id) {
        if ($order_id > 0) {
            $order = wc_get_order($order_id);
            if ($order instanceof WC_Order) {
                $order_id = $order->get_id(); // order id
                $order_key = $order->get_order_key(); // order key
                $order_total = $order->get_total(); // order total
                $order_currency = $order->get_currency(); // order currency
                $order_payment_method = $order->get_payment_method(); // order payment method
                $order_shipping_country = $order->get_shipping_country(); // order shipping country
                $order_billing_country = $order->get_billing_country(); // order billing country
                $order_status = $order->get_status(); // order status
                /**
                * full list methods and property that can be accessed from $order object
                * https://docs.woocommerce.com/wc-apidocs/class-WC_Order.html
                */
                ?>
                <script>
                    fbq('track', 'Purchase', {
                        value: "{{<?php echo $order_total; ?>}}",
                        currency: 'USD',
                        content_ids: ''{{productID}}'',
                        content_type: 'product',
                    });
                </script>
                <?php
            }
        }
    }
}