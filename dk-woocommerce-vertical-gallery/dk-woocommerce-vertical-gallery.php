<?php
//Add a layer to protect against snooping
defined('ABSPATH') or die("No Bueno Amigo."); //Beat it!
/*
Plugin Name: DK Design Vertically Stacked Product Gallery
Plugin URI:  https://dkdesignhawaii.com
Description: Makes the product gallery vertically aligned rather than horizontally aligned.
Version:     1.0
Author:      DK Design
Author URI:  https://dkdesignhawaii.com
*/

/*Based on Solution from Rodolfo Melogli*/

/* --- PHASE 1, make the gallery thumbnail column count 1 (not 3 or 4 )---  */
add_filter( 'woocommerce_product_thumbnails_columns', 'dk_single_gallery_columns', 99 );
function dk_single_gallery_columns() {
     return 1; 
}

// Do it for the Storefront theme specifically:
add_filter( 'storefront_product_thumbnail_columns', 'dk_single_gallery_columns_storefront', 99 );
function dk_single_gallery_columns_storefront() {
     return 1; 
}
 
/* --- END PHASE 1 --- */


/* --- PHASE 2 add CSS --- */
add_action('wp_head','dkAddVertGalleryCSS');
function dkAddVertGalleryCSS() {

	echo '<style>
			@media (min-width: 0px) {
			/* Make image width smaller to make room to its right */
			.single-product div.product .images .woocommerce-main-image, .flex-viewport {
			    width: 85%;
			    float: left;
			}
			 
			/* Make Gallery smaller width and place it beside the image */
			.single-product div.product .images .thumbnails, ol.flex-control-nav.flex-control-thumbs {
			    width: 15%;
			    float: left;
			    margin-top: 40px !important;
			}
			 
			/* Style each Thumbnail with width and margins */
			.single-product div.product .images .thumbnails a.zoom, ol.flex-control-nav.flex-control-thumbs a.zoom {
			    width: 90%;
			    float: none;
			    margin: 0 0 10% 10%;
			}

			/* Move the zoom tool to the left side to accommodate the gallery thumbs (otherwise it covers the first thumbnail */
			.single-product div.product .woocommerce-product-gallery .woocommerce-product-gallery__trigger {
				left: .875em !important;
			}

			} 
		</style>';

} 

/* --- END PHASE 2 --- */
?>