<?php
/**
 * Content wrappers
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
// Get theme options
$wr_nitro_options = WR_Nitro::get_options();

$layout    = $wr_nitro_options['wc_archive_layout'];
$fullwidth = $wr_nitro_options['wc_archive_full_width'];

$html = '';

// Wrap container if not single product page
if ( is_archive() && $fullwidth == true ) {
	$html = '<div class="archive-full-width">';
} elseif ( ! is_product() ) {
	$html = '<div class="container">';
}

?>
	<?php echo wp_kses_post( $html ); ?>
		<div class="row">
		<?php if ( ! is_singular( 'product' ) ) echo '<div class="fc fcw">'; ?>
				<main id="shop-main" class="main-content mgt30<?php if ( is_archive() ) echo ' mgb30'; ?><?php if ( is_archive() && $layout == 'right-sidebar'  ) echo ' right-sidebar'; ?>" role="main">


