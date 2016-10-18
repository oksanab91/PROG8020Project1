<?php
add_action( 'after_setup_theme', 'shop_one_column_setup' );
function shop_one_column_setup() {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size(166, 124, TRUE);
	global $content_width; if ( ! isset( $content_width ) )
	$content_width = 960;
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'custom-background' );						// background
	$defaults = array(												// background
		'default-color'          => '',
		'default-image'          => '',
		'wp-head-callback'       => '_custom_background_cb',
		'admin-head-callback'    => '',
		'admin-preview-callback' => ''
	);
	add_action( 'wp_enqueue_scripts', 'shop_one_column_frontend' );
	add_editor_style( 'editor-style.css' );
	add_theme_support( 'woocommerce' );
	add_image_size( 'shop_one_column-logo-size', 500, 600, true );
    add_theme_support( 'site-logo', array( 'size' => 'shop_one_column-logo-size' ) );
    add_theme_support( 'title-tag' );
    load_theme_textdomain( 'shop_one_column', get_template_directory() . '/languages' );
}
function shop_one_column_widgets() {
	register_sidebar(		array(
	'id' => 'footer',			'name' => __( 'footer', 'shop_one_column' ),
	)		);
}
add_action( 'widgets_init', 'shop_one_column_widgets' );
add_filter('loop_shop_per_page', create_function('$cols', 'return 12;'));
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3;
	}
}
function woocommerce_output_related_products() {
    $args = array('posts_per_page' => 1, 'columns' => 1,'orderby' => 'rand' );
    woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );}
function shop_one_column_frontend() {
 	wp_enqueue_style( 'shop_one_column-style', get_stylesheet_uri() );
}
function shop_one_column_comment() {	if ( is_singular() ) wp_enqueue_script( "comment-reply" );}    add_action( 'wp_enqueue_scripts', 'shop_one_column_comment' );
add_filter( 'wp_tag_cloud', 'shop_one_column_tag_cloud' );
function shop_one_column_tag_cloud( $tags ){
    return preg_replace(
        "~ style='font-size: (\d+)pt;'~",
        ' class="tag-cloud-size-\10"',
        $tags
    );
}
function shop_one_column_menu() {
	add_theme_page('Shop One Column', 'Free vs PRO', 'edit_theme_options', 'shop_one_column', 'shop_one_column_menu_page');
}
add_action('admin_menu', 'shop_one_column_menu');
function shop_one_column_menu_page() {
echo '
<br>
<center><h1 style="font-size:79px;">' . __( 'Shop One Column free', 'shop_one_column' ) . '</h1></ceter>
<br><br><br>
<center><img src="' . get_template_directory_uri() . '/images/shop-one-column-free.jpg"></center>
<br><br><br>
<center><img src="' . get_template_directory_uri() . '/images/pro-vs-free.png"></center><br><br><br><br><br>
<center><h1><font color="#dd3f56">15% Christmas Sale!</font>' . __( ' Coupon expiry date 2016-01-11 - Code: ', 'shop_one_column' ) . '<font color="#dd3f56">justpx15</font></h1></ceter><br/><br/><br/><br/>
<center><h1 style="font-size:79px;">' . __( 'Shop One Column PRO', 'shop_one_column' ) . '</h1></ceter><br><br><br><br>
<h1><center>' . __( ' Page ', 'shop_one_column' ) . ' <a href="http://justpx.com/product/shop-one-column-pro/" target="_blank">' . __( ' Shop One Column PRO ', 'shop_one_column' ) . '</a>' . __( ' - theme, demo, documentation.', 'shop_one_column' ) . '</center></h1><br><br><br><br>
<center><img src="' . get_template_directory_uri() . '/images/shop-one-column-pro-sidebar.jpg"></center><br><br>
<center><img src="' . get_template_directory_uri() . '/images/shop-one-column-admin1.jpg"></center><br><br>
<center><img src="' . get_template_directory_uri() . '/images/shop-one-column-admin2.jpg"></center><br><br>
<h1><center>' . __( 'Buy theme', 'shop_one_column' ) . '  <a href="http://justpx.com/product/shop-one-column-pro/">' . __( 'Shop One Column PRO', 'shop_one_column' ) . '</a></center></h1><br><br>
';
}
?>
