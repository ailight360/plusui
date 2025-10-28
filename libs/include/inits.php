<?php
if ( ! defined( 'ABSPATH' ) ) exit;

if (!function_exists('plusui_setup')) :
function plusui_setup() {   
		load_theme_textdomain( 'plusui', get_template_directory().'/languages' );        
        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag'); 
        add_theme_support('post-thumbnails'); 
        add_theme_support('customize-selective-refresh-widgets');
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
			'script',
			'style'
        ));
          
		$format_info = array(
			'video',
			'gallery',
		);
		add_theme_support( 'post-formats', $format_info );
		
        add_image_size( 'logo-header', 105, 36, true ); 
        add_image_size( 'img_single', 180, 180, true ); 
		
        function register_my_menu() { 
            register_nav_menu('header_one',__( 'Header Primary', THEMES_NAMES ));
            register_nav_menu('header_two',__( 'Header Bottom', THEMES_NAMES ));
            register_nav_menu('footer-kiri',__( 'Footer Left', THEMES_NAMES ));
            register_nav_menu('footer-mid',__( 'Footer Midle', THEMES_NAMES ));
            register_nav_menu('footer-kanan',__( 'Footer Right', THEMES_NAMES ));
            register_nav_menu('footer-sosmed',__( 'Footer Social Medias', THEMES_NAMES ));
            register_nav_menu('side_menu_footer',__( 'Sidebar Footer', THEMES_NAMES ));
            register_nav_menu('menu_sosmed',__( 'Sidebar Socials Media ', THEMES_NAMES )); 
        }
        add_action( 'init', 'register_my_menu' );
		
		remove_theme_support( 'widgets-block-editor' );  	
		
		/* AMP Support */
		add_theme_support(
			'amp',
			array(
				'paired'            => true,
				'nav_menu_dropdown' => array(
					'sub_menu_button_class'        => 'dropdown-toggle',
					'sub_menu_button_toggle_class' => 'toggled-on',
					'expand_text '                 => __( 'expand', THEMES_NAMES ),
					'collapse_text'                => __( 'collapse', THEMES_NAMES ),
				),
			)
		);
}
endif;
add_action( 'after_setup_theme', 'plusui_setup' );

if ( function_exists('register_sidebar') )	
register_sidebar(array(
        'id'				=> 'slider',
        'name'				=> 'Slider',
        'description'		=> 'Widgets in this area will be shown on Slider',
        'before_widget'		=> '',
        'after_widget'		=> '',
        'before_title'		=> '',
        'after_title'		=> '',
));
register_sidebar(array(
        'id'				=> 'featured',
        'name'				=> 'Featured',
        'description'		=> 'Widgets in this area will be shown on Featured',
        'before_widget'		=> "<div class='widget FeaturedPost' >",
        'after_widget'		=> '</div>',
        'before_title'		=> '<h2 class="title">',
        'after_title'		=> '</h2>',
));
register_sidebar(array(
        'id'				=> 'homes',
        'name'				=> 'Home',
        'description'		=> 'Widgets in this area will be shown on Home',
        'before_widget'		=> '',
        'after_widget'		=> '',
        'before_title'		=> '',
        'after_title'		=> '',
));
register_sidebar(array(
        'id'				=> 'sidebar-1',
        'name'				=> 'Sidebar Home',
        'description'		=> 'Widgets in this area will be shown on sidebar Home',
        'before_widget'		=> '<div class="section" id="side-widget"><div class="widget PopularPosts" >',
        'after_widget'		=> '</div></div>',
        'before_title'		=> '<h2 class="title dt">',
        'after_title'		=> '</h2>',
));	
register_sidebar(array(
        'id'				=> 'sidebar-2',
        'name'				=> 'Sidebar Post',
        'description'		=> 'Widgets in this area will be shown on sidebar Post ',
        'before_widget'		=> '<div class="section" id="side-widget"><div class="widget PopularPosts" >',
        'after_widget'		=> '</div></div>',
        'before_title'		=> '<h2 class="title dt">',
        'after_title'		=> '</h2>',
));	  


function mdn_body_class( $classes ) { 
	global $post, $opt_themes; 
	$hide_menu_on 		= $opt_themes['hide_menus'];
	$hide_menu_page_on	= $opt_themes['hide_menus_page'];
	$hide_menu_post_on	= $opt_themes['hide_menus_post'];
	$onegrid_on 		= $opt_themes['onegrid_activate'];
	$rtl_on				= '';
	if ($hide_menu_on){
	$hdMn				= 'hdMn';
	} else {
	$hdMn				= '';
	}
	if ($hide_menu_post_on){
	$hdMnpost				= 'hdMn';
	} else {
	$hdMnpost				= '';
	}
	if ($hide_menu_page_on){
	$hdMnPage				= 'hdMn';
	} else {
	$hdMnPage				= '';
	}
	/* if(wp_is_mobile()){} */
	if ($onegrid_on){
	$oneGrd				= 'oneGrd';
	} else {
	$oneGrd				= '';
	} 
	if (is_rtl()){
	$Rtl				= 'Rtl';
	} else {
	$Rtl				= '';
	}
	//remove MN-3 mobS MN-3 or MN-3 or MN-1
	//oneGrd MN-3 mobS flT hdMn bD onIndx onHm lgT theme0
    if ( is_singular( 'post' ) ) {  
        $classes[] = 'MN-3 mobS flT '.$hdMnpost.' bD '.$Rtl.' onItm onPs';
    }
    if ( is_page() ) {  
        $classes[] = 'MN-3 mobS flT '.$hdMnPage.' bD '.$Rtl.' onItm onPg'; 
    }   
    if ( is_singular( 'page' ) ) {  
        $classes[] = 'MN-3 mobS flT '.$hdMnPage.' bD '.$Rtl.' onItm onPg'; 
    }   
    if ( is_singular( 'customposttype' ) ) {
        $classes[] = 'MN-3 mobS flT '.$hdMnPage.' bD '.$Rtl.' onItm onPg';
    }       
    if ( is_home() ) {  
        $classes[] = ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm';
    }           
    if ( is_front_page() ) { 
        $classes[] = ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm';
    }               
    if ( is_archive() ) { 
        $classes[] = ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onMlt';
    }                   
	if ( is_search() ) { 
        $classes[] = ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onMlt';
    } 
	if ( is_404() ) {
        $classes[] = 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' on404';
    } 	
	
	 // List of the only WP generated classes allowed
    $whitelist = array( ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm', 'onItem onPost', 'onItem onPage', 'onIndex onBlog', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm', 'MN-3 mobS flT '.$hdMnpost.' bD '.$Rtl.' onItm onPs', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onItm onPg', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onMlt', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' on404', ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onItm onPs', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onItm onPg', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onItm onPs', ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm', ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onHm', ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onMlt', ''.$oneGrd.' MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' onIndx onMlt', 'MN-3 mobS flT '.$hdMn.' bD '.$Rtl.' on404', 'MN-3 mobS flT '.$hdMnPage.' bD '.$Rtl.' onItm onPg',    );

    // Filter the body classes class="onItem onPost customize-support"
    $classes = array_intersect( $classes, $whitelist );

    // Add the extra classes back untouched
    //return array_merge( $classes, (array) $extra_classes );
    return $classes;
	
    //return $classes;
} 

function get_excerpt_by_id($post_id){
    $the_post 		= get_post($post_id);
    $the_excerpt 	= ($the_post ? $the_post->post_content : null);
    $excerpt_length = 30;
    $the_excerpt 	= strip_tags(strip_shortcodes($the_excerpt));
    $words 			= explode(' ', $the_excerpt, $excerpt_length + 1);

    if(count($words) > $excerpt_length) :
        array_pop($words);
        array_push($words, '…');
        $the_excerpt = implode(' ', $words);
    endif;

    return $the_excerpt;
}

// ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ \\
function timeago($ptime) {
    $ptime = strtotime($ptime);
    $etime = time() - $ptime;
    if($etime < 1) return ' just now';
    $interval = array (
        12 * 30 * 24 * 60 * 60 => ' years ago ('.date('F j, Y', $ptime).')',
        30 * 24 * 60 * 60 => ' months ago ('.date('F j, Y', $ptime).')',
        7 * 24 * 60 * 60 => ' weeks ago ('.date('F j, Y', $ptime).')',
        24 * 60 * 60 => ' days ago',
        60 * 60 => ' hours ago',
        60 => ' minutes ago',
        1 => ' seconds ago' );
    foreach ($interval as $secs => $str) {
        $d = $etime / $secs;
        if ($d >= 1) {
            $r = round($d);
            return $r . $str;
        }
    }; 
} 
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function get_view_post() {
    $count_key		= 'post_views_count';
    $count			= get_post_meta(get_the_ID(), $count_key, true);
    //$count		= get_post_meta( get_the_ID(), 'post_views_count', true );
    if($count=='') {
        delete_post_meta(get_the_ID(), $count_key);
        add_post_meta(get_the_ID(), $count_key, '0');
        return "0";
    }
    if ($count > 1000) {
        return round ( $count / 1000 , 1 ).'K';
    } else {
        return $count.'';
    }
    //return "$count";
} 
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function get_view_post_alt() {
    $count_key		= 'post_views_count';
    $count			= get_post_meta(get_the_ID(), $count_key, true);
    //$count		= get_post_meta( get_the_ID(), 'post_views_count', true );
    if($count=='') {
        delete_post_meta(get_the_ID(), $count_key);
        add_post_meta(get_the_ID(), $count_key, '0');
        return "0";
    }
	return "$count";
}
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function set_view_post() {
    $post_id		= get_the_ID();
    $key			= 'post_views_count';
    $count			= (int) get_post_meta(get_the_ID(), $key, true );
    $count++;
    update_post_meta( $post_id, $key, $count );
} 
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_column_views_( $columns ) {
    $columns['post_views'] = 'Views';
    return $columns;
} 
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
function ex_themes_posts_custom_column_views_( $column ) {
    if ( $column === 'post_views') {
        echo get_view_post();
    }
} 
add_filter( 'manage_posts_columns', 'ex_themes_posts_column_views_' );
add_action( 'manage_posts_custom_column', 'ex_themes_posts_custom_column_views_' );
function catch_that_image() {
    global $post, $posts, $opt_themes;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches[0]; 
    return $first_img;
} 

function format_numbers($num) {
  if($num>1000) {
        $x = round($num);
        $x_number_format = number_format($x);
        $x_array = explode(',', $x_number_format);
        $x_parts = array('k', 'm', 'b', 't');
        $x_count_parts = count($x_array) - 1;
        $x_display = $x;
        $x_display = $x_array[0] . ((int) $x_array[1][0] !== 0 ? '.' . $x_array[1][0] : '');
        $x_display .= $x_parts[$x_count_parts - 1];
        return $x_display;
  }
  return $num;
}

add_filter( 'get_shortlink', function( $shortlink ) {return $shortlink;} );

//register_activation_hook( __FILE__, 'exthemes_dev_shorturl_activation' );
function exthemes_dev_shorturl_activation(){
	exthemes_dev_add_rewrites();
	flush_rewrite_rules();
}
add_action( 'init', 'exthemes_dev_shorturl_activation' );

add_action( 'init', 'exthemes_dev_add_rewrites' );
function exthemes_dev_add_rewrites(){
	add_rewrite_rule( '^go/(\d+)$', 'index.php?short=$matches[1]', 'top' );
}
add_filter( 'query_vars', 'exthemes_dev_shorturl_query_vars', 10, 1 );

function exthemes_dev_shorturl_query_vars( $vars ){
	$vars[] = 'short';
	return $vars;
}
add_action( 'template_redirect', 'exthemes_dev_shorturl_redirect' );

function exthemes_dev_shorturl_redirect(){
	// bail if this isn't a short link
	if( ! get_query_var( 'short' ) ) return;
	global $wp_query;
	
	$id = absint( get_query_var( 'short' ) );
	if( ! $id )	{
		$wp_query->is_404 = true;
		return;
	}
	
	$link = get_permalink( $id );
	if( ! $link ){
		$wp_query->is_404 = true;
		return;
	}
	
	wp_redirect( esc_url( $link ), 301 );
	exit();
}
add_filter( 'get_shortlink', 'exthemes_dev_shorturl_get_links', 10, 3 );

function exthemes_dev_shorturl_get_links( $link, $id, $context ){
	if( 'query' == $context && is_single() )	{
		$id = get_queried_object_id();
	}
	return home_url( 'go/' . $id );
}
 
function get_user_role() {
    global $current_user;
    $user_roles	= $current_user->roles;
    $user_role	= array_shift($user_roles);
    return $user_role;
}

function admin_bars(){ 
global $opt_themes; 
if (!$opt_themes['admin_bar_on'])
add_filter('show_admin_bar', '__return_false');  
}
add_action('init', 'admin_bars');
  
function wpbeginner_comment_count() { 
    
function comment_count( $count ) {
    if ( ! is_admin() ) {
        $comments_by_type = &separate_comments(get_comments('status=approve'));
        return count($comments_by_type['comment']);
    } else {
        return $count;
    }
}
add_filter('get_comments_number', 'comment_count', 0);
    
$actual_comment_count = get_comments_number(); 
    
return $actual_comment_count;
    
}
    
add_shortcode('total_komentar', 'wpbeginner_comment_count');


function medianwp_add_user_social_links( $user_contact ) {
$user_contact['twitter']    = __('Twitter Link', TEXT_DOMAIN);
$user_contact['facebook']   = __('Facebook Link', TEXT_DOMAIN);
$user_contact['linkedin']   = __('LinkedIn Link', TEXT_DOMAIN);
$user_contact['instagram']  = __('Instagram Link', TEXT_DOMAIN);
$user_contact['skype']      = __('Skype Link', TEXT_DOMAIN);
$user_contact['telegram']   = __('Telegram Link', TEXT_DOMAIN);
$user_contact['pinterest']  = __('Pinterest Link', TEXT_DOMAIN);
$user_contact['youtube']    = __('Youtube Link', TEXT_DOMAIN);
$user_contact['locations']  = __('Locations', TEXT_DOMAIN);
return $user_contact;
}

function cfw_get_user_social_links() {
    $return  = '<ul class="list-inline">';
    if(!empty(get_the_author_meta('twitter'))) {
        $return .= '<li><a href="'.get_the_author_meta('twitter').'" title="Twitter" target="_blank" id="twitter"><i class="cfw-icon-twitter"></i></a></li>';
    }
    if(!empty(get_the_author_meta('facebook'))) {
        $return .= '<li><a href="'.get_the_author_meta('facebook').'" title="Facebook" target="_blank" id="facebook"><i class="cfw-icon-facebook"></i></a></li>';
    }
    if(!empty(get_the_author_meta('linkedin'))) {
        $return .= '<li><a href="'.get_the_author_meta('linkedin').'" title="LinkedIn" target="_blank" id="linkedin"><i class="cfw-icon-linkedin"></i></a></li>';
    }
    if(!empty(get_the_author_meta('github'))) {
        $return .= '<li><a href="'.get_the_author_meta('github').'" title="Github" target="_blank" id="github"><i class="cfw-icon-github"></i></a></li>';
    }
    if(!empty(get_the_author_meta('instagram'))) {
        $return .= '<li><a href="'.get_the_author_meta('instagram').'" title="Instagram" target="_blank" id="instagram"><i class="cfw-icon-instagram"></i></a></li>';
    }
    if(!empty(get_the_author_meta('dribbble'))) {
        $return .= '<li><a href="'.get_the_author_meta('dribbble').'" title="Dribbble" target="_blank" id="dribbble"><i class="cfw-icon-dribbble"></i></a></li>';
    }
    if(!empty(get_the_author_meta('behance'))) {
        $return .= '<li><a href="'.get_the_author_meta('behance').'" title="Behance" target="_blank" id="behance"><i class="cfw-icon-behance"></i></a></li>';
    }
    if(!empty(get_the_author_meta('skype'))) {
        $return .= '<li><a href="'.get_the_author_meta('skype').'" title="Skype" target="_blank" id="skype"><i class="cfw-icon-skype"></i></a></li>';
    }
    $return .= '</ul>';

    return $return;
}


function exthemes_dev_supports() {
    add_menu_page(
        __( 'Theme Docs', THEMES_NAMES ), 'Theme Docs',
        'manage_options',
        'exthemes.supports.page',
        'wp__changelogs',
        'dashicons-info-outline',
        //plugins_url( '/img/imdb.png' ),
        100
    ); 
    add_submenu_page( 'exthemes.supports.page', 'Changelogs', 'Changelogs', 'manage_options', 'wp__changelogs', 'wp__changelogs' );  
    add_submenu_page( 'exthemes.supports.page', 'Required', 'Required', 'manage_options', 'Required', 'wp__required' ); 
     
}
//add_action('admin_menu', 'exthemes_dev_supports');

function wp__docs() { ?>
<div class="wrap">
 
</div>
<?php } 

function wp__changelogs() { ?>

<div class="wrap">
<div class="container">
			<div id="px-changelog"> 
				<div class="last-changelog">
				<h2></h2>
				<h2>Infos</h2>
				<p> Please back up your theme when you are done customizing your theme, as errors in your themes are not the responsibility of the developers</strong>. if you got errors, Please ReDownload <strong>'<?php echo strtolower(THEMES_NAMES); ?>'</strong> themes and upload for manual on <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank">member area</a> For Manual Upload</p>					 
				
				<h2>Upgrade</h2>
				NOTE: If you have directly made changes to the files, the update will overwrite these changes. So, we recommend that you DO NOT make changes in this way. Alternatively you can use plugins that allow adding CSS, however we do not guarantee that the 'classes' or 'id' will change in future updates.
				
				<h2>Manual update</h2>
				Before updating anything, make sure you have backups.<br>
				<ol>
					<li>Download the theme by logging into your account <a href="<?php echo EXTHEMES_MEMBER_URL; ?>" target="_blank" rel="noopener">login</a> and <a href="<?php echo EXTHEMES_HOW_TO; ?>" target="_blank" rel="noopener">see my license key</a></li>
					<li>Unzip the <strong>'<?php echo strtolower(THEMES_NAMES); ?>'</strong> theme file.</li>
					<li>From your FTP account, replace all files within the <strong>'<?php echo strtolower(THEMES_NAMES); ?>'</strong> folder found in the 'wp-content' directory. </li>
				</ol>				
				</div>
			</div>
			
			<div id="px-changelog">	 
				<div class="last-changelog">
				<h2>Whats is Changes</h2>	
				</div>

				<div class="last-changelog">		
				<?php echo file_get_contents(WEBSCHANGELOGS); ?>
    			</div>
			</div>
 
	</div><!-- end div .container -->
</div>
 
<?php } 

function wp__required() { ?> 
<style>
 body {background:#fff; } 
</style>

<div class="wrap">

	<div class="container">
	<h2></h2>
	<?php 
	echo '<h2>Memory & PHP Infos</h2>';
	echo 'Memory Limit : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.ini_get('memory_limit').'</b>';
	echo '<br>';
	echo 'PHP version : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.phpversion().'</b> ( <u class="cool-link f2">Required PHP 7.4+</u> )';
	echo '<br>';
	echo 'OS : <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.php_uname().'</b>';
	echo ' and <b style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">'.PHP_OS.'</b>';
	/* if ( ini_get( 'allow_url_fopen' ) ) {
     echo "<br>allow_url_fopen is <b style=\"font-size: 87.5%;color: #e83e8c;word-wrap: break-word;\">ENABLED</b>\n";
	} else {    
		 echo "<br>allow_url_fopen is DISABLED. please make it <u class=\"cool-link f2\">&nbsp;&nbsp;ON&nbsp;&nbsp;&nbsp;</u> ( Required allow_url_fopen )\n";
	}  */
	 
	if ( !ini_get( 'allow_url_fopen' ) ) { ?>
	<h1>How to ENABLED allow_url_fopen</h1>
	
	<h2>How to enable or disable allow_url_fopen in cPanel</h2>
	
	<p>There are specific scenarios when you may be asked to change your PHP configuration. Specifically, you may be directed to edit a file on your server called php.ini and to enable or disable <strong  style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong>.</p>
	
	<h3>What is allow_url_fopen?</h3>
	<p>The <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> is a setting managed through the PHP Options which allows PHP file functions to retrieve data from remote locations over FTP or HTTP. This option is a significant security risk, thus, do not turn it on without necessity.</p>
	
	<h3>How to Enable or Disable allow_url_fopen in cPanel</h3>
	<p>The PHP Selector is omitted by default in cPanel and might be missing from your account if you are hosting with a different web host. All ChemiCloud customers should see the Select PHP Version section in their hosting account&#8217;s cPanel.</p>
	
	<p>While do not allow direct changes to PHP.ini on our servers. However, PHP configuration changes can be made from cPanel by following these steps:</p>
	
	<p><strong>1) </strong>Log into <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">cPanel</strong>.</p>
	<p><strong>2)</strong> Look for the <em style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">SOFTWARE</em> section and click on <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">Select PHP version</strong></p>
	<?php  
	$image 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEgDGcqHRNxK9mTccGGH6-fCI4K50JLipaKkdXE2JbIJQbdGOihGxnbgzolTLrWTsgobiUWewVC8yRyu4nPQV6y88tIfNecPyImhCRmQBKF-pBAOh51huovf-PLaDILmv4sYcGembT_Tbj06_6JY3Yuq72VFz3wA_7STeblB2EDPPoHodNHbkjgbTqER/s1600/Software-Select-PHP-Version.png';	 
	$imageData		= base64_encode(file_get_contents($image)); 
	$src			= 'data: png;base64,'.$imageData; 
	?>
	<figure style="width: 643px" class="caption alignnone">
	<img class="size-large wp-image-7674" src="<?php echo $src; ?>" alt="PHP Version" width="643" height="245" /><figcaption class="caption-text">Software &gt; Select PHP Version</figcaption>
	</figure>
	
	<p><strong>3)</strong> Click on the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">Options</strong> link in the new window.</p>
	
	<?php  
	$image1 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEiO_GXUoykbByxAzRBYS1ret9lTMfddU7Z4Kp9HeBBk_BfP_9U61phWnloXGti7VYduytWjvR68nseOUv4dHGCD-7ge1jbo2oA0wIwNcrqJQQjiAC0HZdAnaCbN4DO5edIntwujCvygkCQahkk2BYhDMJpOyLD0YhsAZwQ6R_wW6IUXES6YLAWAHApR/s1600/PHP-Selector-Options.png';	 
	$imageData1		= base64_encode(file_get_contents($image1)); 
	$src_a			= 'data: png;base64,'.$imageData1; 
	?>
	<figure style="width: 643px" class="caption alignnone">
	<img decoding="async" loading="lazy" class="size-large wp-image-7720" src="<?php echo $src_a; ?>" alt="" width="643" height="202"  />
	<figcaption class="caption-text">PHP Selector &gt; Options</figcaption>
	</figure>
	
	<p><strong>4)</strong> You can locate the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> and tick on the box next to it to enable it or un-tick the box to disable it.</p>	
	<?php  
	$image2 			= 'https://blogger.googleusercontent.com/img/b/R29vZ2xl/AVvXsEj21lWVmKXgJKBrLPqtqG6jlR4r6RRGAhxB812moNeDD6ED6YXtDQak7EfzrSVOsA8iHs08e1DesODVTbPwG97lP5ut2Ctntre0sYoFyY9kZWOxeu9zOuAH72yS9lqAi7P9FWVwv676hCWo_0OIbkmGiRW_zlGbJ0FHmg0pB-IgQGSstXmajxLzYpK7/s1600/allow_url_fopen.png';	 
	$imageData2		= base64_encode(file_get_contents($image2)); 
	$src_b			= 'data: png;base64,'.$imageData2; 
	?>
	<p><img decoding="async" loading="lazy" class="alignnone size-large wp-image-7719" src="<?php echo $src_b; ?>" alt="allow_url_fopen" width="643" height="246" /></p>
	
	<p><strong>5)</strong> Once you make any changes, please do a left-hand side click anywhere outside the dropdown or text input box. If the change were successful, you would see a green box with a message confirming that the change has been applied.</p>
	
	<p>That&#8217;s all! Now you know how to enable or disable allow_url_fopen in cPanel.</p>
	

	<h2>Using the allow_url_fopen directive</h2>
	<p>The <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is disabled by default. You should be aware of the security implications of enabling the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive. PHP scripts that can access remote files are potentially vulnerable to arbitrary code injection.</p>

	<p>When the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive is enabled, you can write scripts that open remote files as if they are local files. For example, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">file_get_contents</strong> function to retrieve the contents of a web page.</p>

	<p>To enable this functionality, use a text editor to modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = on</pre>
	<p>To disable this functionality, modify the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive in the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">php.ini</strong> file as follows:</p>

	<pre style="margin: 1.5em 0;padding: 15px;color: #212529;line-height: 1.2em;border: 1px solid #c9c9c9;border-radius: .2rem;box-shadow: 1px 1px 1px #d8d8d8;background: #fafafa;white-space: pre-wrap;">allow_url_fopen = off</pre>

	<p>To verify the current value of the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">allow_url_fopen</strong> directive and other directives, you can use the <strong style="font-size: 87.5%;color: #e83e8c;word-wrap: break-word;">phpinfo()</strong> function. </p> 
	<?php } ?>
</div>
</div> 
<?php }  
function no_more_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
		wp_deregister_script('wp-embed');
		wp_deregister_script('admin-bar');	 
		wp_deregister_script('jquery-core');	 
		wp_deregister_style('wp-block-library');	
		wp_dequeue_script( 'jquery-migrate-js' );
    }
}


function jquerys_js() {
	wp_enqueue_script( TEXT_DOMAIN.'-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', true ); 
}
//add_action( 'wp_enqueue_scripts', 'jquerys_js', 99999 );


function exthemes_head_cleanup() {
remove_action( 'wp_head', 'feed_links_extra', 3 );                  
remove_action( 'wp_head', 'feed_links', 2 );                       
remove_action( 'wp_head', 'rsd_link' );                             
remove_action( 'wp_head', 'wlwmanifest_link' );                   
remove_action( 'wp_head', 'index_rel_link' );                         
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );           
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );             
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 ); 
remove_action( 'wp_head', 'wp_generator' );                           
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_shortlink_wp_head' );
remove_action( 'rest_api_init', 'wp_oembed_register_route' ); 
add_filter( 'embed_oembed_discover', '__return_false' ); 
remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 ); 
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); 
remove_action( 'wp_head', 'wp_oembed_add_host_js' ); 
remove_action( 'wp_head', 'wp_print_scripts' );
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
add_action( 'wp_footer', 'wp_print_scripts', 5 );
add_action( 'wp_footer', 'wp_enqueue_scripts', 5 );
add_action( 'wp_footer', 'wp_print_head_scripts', 5 );
}
function posts_column_id( $columns ) {
    $columns['post_id'] = 'Post ID';
    return $columns;
}
function posts_custom_column_post_id( $column ) {
    if ( $column === 'post_id') {
		global $post;	 
		$post_id 			= get_the_ID();
		echo $post_id; 
		 
    }
}
add_filter( 'manage_post_posts_columns', 'posts_column_id', 1, 1);
add_action( 'manage_post_posts_custom_column', 'posts_custom_column_post_id', 1, 1); 
add_action("manage_posts_custom_column",  "poster_custom_columns");
add_filter("manage_edit-post_columns", "poster_edit_columns");
function poster_edit_columns($columns){
    $columns['poster'] = 'Poster';
    return $columns; 
}
function poster_custom_columns($column){
    if ( $column === 'poster') {
		global $post;	 
		$post_id 			= get_the_ID();
		echo get_the_post_thumbnail( $post_id, array(50, 50) );
		 
    } 
}

function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

function add_lightbox_before_image($content) {
   global $post;
   $pattern		= '/<img(.*?)>/i';
   $replacement = '<div class="zmImg"><img $1 ></div>';
   $content		= preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_lightbox_before_image');


function add_img_alt_tag_title($attr, $attachment = null) {
    $img_title          = trim(strip_tags(get_the_title()));
    if (empty($attr['alt'])) {
        $attr['alt']        = $img_title;
        $attr['title']      = $img_title;
    }
    return $attr;
}
add_filter('wp_get_attachment_image_attributes', 'add_img_alt_tag_title', 10, 2);