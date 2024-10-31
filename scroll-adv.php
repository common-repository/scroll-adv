<?php
/*
Plugin Name: Scroll Adv
Version: 1.0
Description: Display your advert on left and right your website.Scroll when mouse scroll.
Author: doanhienitpro
Author URI: http://weblife24h.com
Plugin URI: http://weblife24h.com
*/

$sadv_plugin_url =  trailingslashit( WP_PLUGIN_URL.'/'. dirname( plugin_basename(__FILE__) ) );
register_sidebar( array(
    'id'            => 'left-sadv',
    'name'          => __( 'Left Scroll Ads', '' ),
    'description'   => __( 'This is a widget area - Left Scroll Ads', '' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
    'after_widget' => "</div></div>\n",
    'before_title' => '<h4 class="widgettitle addtion-title">',
    'after_title' => "</h4>\n"
) );

register_sidebar( array(
    'id'            => 'right-sadv',
    'name'          => __( 'Right Scroll Ads', '' ),
    'description'   => __( 'This is a widget area - Right Scroll Ads', '' ),
    'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="widget-wrap">',
    'after_widget' => "</div></div>\n",
    'before_title' => '<h4 class="widgettitle addtion-title">',
    'after_title' => "</h4>\n"
) );

function sadv_script() {
    if( is_admin() ) return;
    global $sadv_plugin_url;
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'scrolladvs', $sadv_plugin_url."scrolladv.js", array( "jquery" ) );
    wp_enqueue_style( "scrolladv", $sadv_plugin_url."scroll-adv.css" );
}

add_action('wp_print_scripts', 'sadv_script');

function scroll_adv() {
?>
    <script type="text/javascript">
        jQuery(document).ready(function( $ ){
            $('#left-sadv').containedStickyScroll();
            $('#right-sadv').containedStickyScroll();
        }); 
    </script>
    <div id="left-sadv">
    <?php
    dynamic_sidebar('left-sadv');
    ?>
    </div>
    <div id="right-sadv">
    <?php
    dynamic_sidebar('right-sadv');
    ?>
    </div>
<?php
}
?>