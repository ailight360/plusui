<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
 
/*-----------------------------------------------------------------------------------*/ 
// silences is goldens


add_filter('admin_menu', 'admin_menu_filter', 500);
function admin_menu_filter(){
if (!current_user_can('administrator')) { 
?>
<style>
p.firstinfo, .redux-container .redux-action_bar, .theme-browser .theme .theme-actions, .theme-browser .theme.active .theme-actions {display: none;}
</style>
<?php }
}

add_filter('https_ssl_verify', '__return_false');
function allow_url_fopens() {
if (!ini_get( 'allow_url_fopen' )) {
     printf('<div class="notice notice-error is-dismissible"><p>your <b style="color: white;background-color: dimgrey;padding: 5px;border-radius: 5px;">allow_url_fopen</b> is <b style="color: red;">DISABLED</b>. please make it <b style="color: chartreuse;background-color: dimgrey;padding: 5px;border-radius: 5px;">ON</b> to used <b style="color: yellow;background-color: dimgrey;padding: 5px;border-radius: 5px;">APK EXTRACTOR</b>. </p> <p>How to Fix or Resolved <b style="color: white;background-color: dimgrey;padding: 5px;border-radius: 5px;">allow_url_fopen</b>, <a href="https://rey.web.id/what-is-allow_url_fopen-and-how-to-enable-in-cpanel/" target="_blank" style="color: blue;">READ THIS</a> </p></div> ');
}
}
//add_action( 'admin_notices', 'allow_url_fopens' );
  

//add SVG to allowed file uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml'; 
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types'); 
define('ALLOW_UNFILTERED_UPLOADS', true); 

add_action('admin_head', 'admin_custom_styles');
function admin_custom_styles() {
?>
 
<style>
.entry-content p:not(.has-primary-background-color,.has-background,.info-notice) {margin: 0.3rem 0 1.5rem 0!important;padding-left: 0;}.info-notice {background-color: rgba(204,42,42,0.1);padding: 0.7rem!important;position: relative;z-index: 1;border-radius: 3px;box-shadow: 3px 7px 15px #c9c9c9;-moz-box-shadow: 3px 7px 15px #c9c9c9;-webkit-box-shadow: 3px 7px 15px #c9c9c9;}.redux-main .description.field-desc b{color: yellow !important;font-weight: 700 !important;font-family: \'Lobster\',cursive;}.redux-main .description.field-desc code{color: yellow !important;font-weight: 700 !important;font-family: \'Lobster\',cursive;}.redux-main input.regular-text, textarea.large-text {background-color: black;color: floralwhite !important;padding: 0.7rem!important;position: relative;z-index: 1;border-radius: 3px;box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);-moz-box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);-webkit-box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);margin-bottom: 10px!important;font-weight: 600;}.widget-description, .widgets-holder-wrap p.description, .redux-group-tab >h2, .redux-main input.redux-slider-input, .redux-main .description.field-desc {background-color: rgba(34,113,177, 0.9);color: floralwhite !important;padding: 0.7rem!important;position: relative;z-index: 1;border-radius: 3px;box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);-moz-box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);-webkit-box-shadow: 3px 7px 15px rgba(34,113,177, 0.3);margin-bottom: 10px!important;font-weight: 600;}.info-notice:not(.inline-newsletter-subscription),.info-notice:not(.inline-newsletter-subscription) a {font-size: 16px;font-weight: 500;}.info-notice:after {content: "!";position: absolute;top: -20px;right: 7px;transform: rotate(12deg);color: tomato;font-size: 2.5em;font-weight: 600;line-height: 43px;height: 50px;width: 25px;text-align: center;z-index: -1;}.widget-description:after, .widgets-holder-wrap p.description:after, .description.field-desc:after, .redux-group-tab >h2:after, input.regular-text:after {content: "!";position: absolute;top: -20px;right: 0px;transform: rotate(7deg);color: tomato;font-size: 3.5em;font-weight: 700;line-height: 43px;height: 50px;width: 25px;text-align: center;z-index: -1;}.info-notice.danger,.widget-description.danger {border-color: #cc2a2a;background-color: rgba(204,42,42,0.1);margin-bottom: 30px;}.info-notice.danger:after {color: #cc2a2a;}.info-notice.warning {border-color: #f9b724;background-color: rgba(249,183,36,0.1);}.info-notice.warning:after {color: #f9b724;}.info-notice.warning {border-color: #f9b724;background-color: rgba(249,183,36,0.1);}.info-notice.warning:after {color: #f9b724;}.info-notice.info {border-color: honeydew;background-color: honeydew;box-shadow: 0 10px 8px -8px rgb(0 0 0 / 12%);}.info-notice.info:after {color: tomato;}.info-notice b {color: tomato;text-transform: uppercase;}.info-notice a{color: dodgerblue;}
</style>
<?php 
}
//add_action('wp_dashboard_setup', 'my_dashboard_widgets');
function my_dashboard_widgets(){
	global $wp_meta_boxes;
	unset(
	$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary'],
	$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
	);
	wp_add_dashboard_widget( 'dashboard_custom_feed', 'Latest Items' , 'dashboard_item_feed_output' );
	wp_add_dashboard_widget( 'dashboard_blog_feed', 'Latest Blog' , 'dashboard_custom_feed_output' );
}
function dashboard_item_feed_output(){
	
	echo '<div class="rss-widget">';
	wp_widget_rss_output(array(
	'url'				=> 'https://exthem.es/item/feed/',
	'title'				=> 'Latest Item ',
	'items'				=> 10,
	'show_summary'		=> 1,
	'show_author'		=> 1,
	'show_date'			=> 1
	));
	echo '</div> '; 
}

function dashboard_custom_feed_output(){
	
	echo '<div class="rss-widget">';
	 
	wp_widget_rss_output(array(
	'url'				=> 'https://exthem.es/blog/feed/',
	'title'				=> 'Latest Blog ',
	'items'				=> 5,
	'show_summary'		=> 1,
	'show_author'		=> 1,
	'show_date'			=> 1
	)); 
	  
	echo '</div>';
}

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function exthemes_wp_dashboard_setup(){
	// Add custom dashbboard widget.
	add_meta_box(
	'dashboard_widget_exthemes',
	__( 'Exthem.es - Best Product Themes for You', THEMES_NAMES ),
	'exthemes_render_dashboard_widget',
	'dashboard',
	'normal',  // $context: 'advanced', 'normal', 'side', 'column3', 'column4'
	'high'  // $priority: 'high', 'core', 'default', 'low'
	);
}
//add_action( 'wp_dashboard_setup', 'exthemes_wp_dashboard_setup' );
if ( ! function_exists( 'exthemes_get_banner_widget' ) )
	:
/**
* Get json data banner
*
* @since 1.0.0
* @param int $cache Cache.
* @return array
*/
function exthemes_get_banner_widget( $cache = 168 ){
	if ( false === ( $result = get_transient( 'exthemes_cache_json_banner_' . $cache ) ) ) {
		$response = wp_remote_get(
		''.EXTHEMES_API_URL.'/idasboard.json',
		array(
		'timeout'   => 120,
		'sslverify' => false,
		)
		);
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
			if ( is_wp_error( $response ) ) {
				$result = false;
			} else {
				$result = false;
			}
		} else {
			$data = json_decode( wp_remote_retrieve_body( $response ), true );
			if ( ! empty( $data ) && is_array( $data ) ) {
				$result = $data;
			} else {
				$result = false;
			}
		}
		set_transient( 'exthemes_cache_json_banner_' . $cache, $result, $cache * HOUR_IN_SECONDS );
	}
	return $result;
}
endif;
/**
* Render widget.
*/
function exthemes_render_dashboard_widget(){
	$cache = 168;
	$data_array = exthemes_get_banner_widget( $cache );
	if ( false !== $data_array && ! empty( $data_array ) && is_array( $data_array ) ) {
		$imagebanner    = $data_array['bannerimage'];
		$imagebannerurl = $data_array['urlbannerimage'];
		if ( ! empty( $imagebanner ) && isset( $imagebanner ) && ! empty( $imagebannerurl ) && isset( $imagebannerurl ) ) {
			echo '<div style="margin: -13px -13px 15px;">';
			echo '<a href="' . esc_url( $imagebannerurl ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank"><img src="' . esc_url( $imagebanner ) . '" style="display:block;width:100%;" loading="lazy" /></a>';
			echo '</div>';
		}
		$themeterbaru = $data_array['newtheme'];
		if ( is_array( $themeterbaru ) ) {
			echo '<div id="published-posts">';
			echo '<h3>Best Product Themes for You</h3>';
			echo '<ul>';
			foreach ( $themeterbaru as $value ) {
				if ( ! empty( $value['url'] ) && isset( $value['url'] ) && ! empty( $value['title'] ) && isset( $value['title'] ) ) {
					echo '<li style="display: list-item !important;"><a href="' . esc_url( $value['url'] ) . '?source='.DOMAINSITES.'" rel="nofollow" target="_blank">' . esc_attr( $value['title'] ) . '</a></li>';
				}
			}
			echo '</ul></div>';
		}
	} else {
		echo '<p>No News</p>';
		delete_transient( 'exthemes_cache_json_banner_' . $cache );
	}
	
	echo '<p class="community-events-footer" style="margin: 0 -12px -12px !important;background-color: #efefef;">';
	echo '<a href="'.EXTHEMES_MEMBER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-admin-site"></span> Member Area <span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_FACEBOOK_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-facebook"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span> </a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_YOUTUBE_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-youtube"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_INSTAGRAM_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-instagram"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo ' | ';
	echo '<a href="'.EXTHEMES_TWITTER_URL.'?source='.DOMAINSITES.'" target="_blank" rel="nofollow"><span aria-hidden="true" class="dashicons dashicons-twitter"></span> '.EXTHEMES_SLUG.'<span class="screen-reader-text">(opens in a new tab)</span></a>';
	echo '</p>';  
}
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\

//add_filter( 'login_redirect', 'noindex_nofollow_page_login', 10, 3 );

function remove_footer_admin () {
$linkX 			= get_bloginfo('url'); 
$parse 			= parse_url($linkX); 
$mysites 		= $parse['host']; 
echo '<span id="footer-thankyou" style="font-style:normal;font-size:90%;letter-spacing:1px;"><strong>'.$mysites.'</strong> Using  <a href="'.EXTHEMES_API_URL.'" target="_blank"><b>'.THEMES_NAMES.' v.'.VERSION.'</a></b> - Developed by <a href="'.EXTHEMES_API_URL.'" title="Premium Wordpress Themes" target="_blank">'.DEVS.'</a></span>&nbsp;&nbsp;';
}
add_filter('admin_footer_text', 'remove_footer_admin');
