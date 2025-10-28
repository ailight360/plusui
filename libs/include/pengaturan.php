<?php

/**
 * ReduxFramework Barebones Sample Config File
 * For full documentation, please visit: http://docs.reduxframework.com/
 */

if ( ! class_exists( 'Redux' ) ) {
    return;
}

// This is your option name where all the Redux data is stored.
$loginurl			= home_url( '/login/' );
$registerurl		= home_url( '/register/' );
$tosurl				= home_url( '/tos/' );
$profileurl			= home_url( '/profile/' );
$url				= home_url( '/' );
$url1				= get_bloginfo('url'); 
$linkX				= get_bloginfo('url');
$parse				= parse_url($linkX);
$sites				= $parse['host'];
$site_title			= get_bloginfo( 'name' );
$site_url			= network_site_url( '/' );
$site_desc			= get_bloginfo( 'description' );
$admin_email		= get_bloginfo('admin_email');
$opt_name			= "opt_themes";

/**
 * ---> SET ARGUMENTS
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
 * */

$theme = wp_get_theme(); // For use with some settings. Not necessary.

$args = array(
'opt_name'             => $opt_name,
'display_name'         => '<span class="dashicons dashicons-xing"></span> '.THEMES_NAMES.'',
'display_version'      => 'v '.$theme->get( 'Version' ),
'menu_type'            => 'menu',
'allow_sub_menu'       => true,
'menu_title'           => 'Panel '.THEMES_NAMES, 
'page_title'           => $theme->get( 'Name' ).' '.$theme->get( 'Version' ).'', 
'google_api_key'       => '',
'google_update_weekly' => false,
'async_typography'     => true,
//'disable_google_fonts_link' => true,
'admin_bar'            => true,
'admin_bar_icon'       => 'dashicons-admin-multisite',
'admin_bar_priority'   => 999,
'global_variable'      => '',
'dev_mode'             => true,
'update_notice'        => false,
'customizer'           => false,
//'open_expanded'     => true,
//'disable_save_warn' => true,
'page_priority'        => 125,
'page_parent'          => 'themes.php',
'page_permissions'     => 'manage_options',
'menu_icon'            => 'dashicons-admin-multisite',
'last_tab'             => '',
'page_icon'            => 'icon-themes',
'page_slug'            => '_options',
'save_defaults'        => true,
'default_show'         => false,
'default_mark'         => '',
'show_import_export'   => true,
'transient_time'       => 60 * MINUTE_IN_SECONDS,
'output'               => true,
'output_tag'           => true,
// 'footer_credit'     => '',
'database'             => '',
'use_cdn'              => true,
//'compiler'             => true,
// HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'light',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    )
);

// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.

$args['admin_bar_links'][] = array(
			'id'			=> 'redux-docs',
			'href'			=> EXTHEMES_YOUTUBE_URL,
			'title'			=> 'Documentations', 
			);
			/*
			$args['admin_bar_links'][] = array(
			//'id'			=> 'redux-support',
			'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
			'title'			=> __( 'Support', TEXT_DOMAIN ),
			);

			$args['admin_bar_links'][] = array(
			'id'			=> 'redux-extensions',
			'href'  => 'reduxframework.com/extensions',
			'title'			=> __( 'Extensions', TEXT_DOMAIN ),
			);

/**/
// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
$args['share_icons'][] = array(
			'url'   	=> EXTHEMES_FACEBOOK_URL,
			'title'		=> 'Follow us on Facebook',
			'icon'		=> 'el el-facebook'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_TWITTER_URL,
			'title'		=> 'Follow us on Twitter',
			'icon'		=> 'el el-twitter'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_LINKEDIN_URL,
			'title'		=> 'Find us on LinkedIn',
			'icon'		=> 'el el-linkedin'
			);
			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_YOUTUBE_URL,
			'title'		=> 'Find us on Youtube',
			'icon'		=> 'el el-youtube'
			);

			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_INSTAGRAM_URL,
			'title'		=> 'Find us on Instagram',
			'icon'		=> 'el el-instagram'
			);

			$args['share_icons'][] = array(
			'url'		=> EXTHEMES_API_URL,
			'title'		=> 'Find us on Wordpress',
			'icon'		=> 'el el-wordpress'
			);

// Panel Intro text -> before the form
if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
    if ( ! empty( $args['global_variable'] ) ) {
        $v = $args['global_variable'];
    } else {
        $v = str_replace( '-', '_', $args['opt_name'] );
    }
    //$args['intro_text'] = sprintf( __( '<noscript><p style="display:none">Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p></noscript>', TEXT_DOMAIN ), $v );
} else {
    //$args['intro_text'] = __( '<p style="display:none">This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', TEXT_DOMAIN );
}

// Add content after the form.
//$args['footer_text'] = __( '<p></p>', TEXT_DOMAIN );

Redux::setArgs( $opt_name, $args );


// -> START Basic Fields __('Main settings')
Redux::setSection( $opt_name, array(
    'title'            => __( 'General', TEXT_DOMAIN ),
    'id'               => 'dashboard_ex_themes',
    'customizer_width' => '700px',
    'icon'             => 'dashicons dashicons-admin-settings',
    'subsection'       => false,
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Headers', TEXT_DOMAIN ),
    'id'               => 'header',
    'subsection'       => true,
    'customizer_width' => '700px',
    'icon'             => 'dashicons dashicons-upload',
    'fields'           => array(
        array(
            'id'			=> 'logo_text',
            'type'			=> 'text',
            'title'			=> 'Logo Text',
            'default'		=> TEXT_DOMAIN, 
        ),
        array(
            'id'			=> 'logo_desc',
            'type'			=> 'text',
            'title'			=> 'Logo Desc',
            'default'		=> 'v '.VERSION, 
        ),
		array(
            'id'			=> 'logo_banner_on',
            'type'			=> 'switch',
            'title'			=> 'Header Logo',
            'desc'			=> '<code>On</code> to Use Images Banner on Logo', 
            'default'		=> false
        ),
        array(
            'id'			=> 'logo_banner',
            'type'			=> 'media',
            'title'			=> 'Logo Banner',
			'desc'			=> '<i>*use width 200px and height 50px</i>',
            'default'		=> array(
			'url'			=> get_bloginfo('template_directory') . '/assets/img/logo-median.png'),
            'required'		=> array( 'logo_banner_on', '=', true )
        ),  
        array(
            'id'			=> 'favicons',
            'type'			=> 'media',
            'title'			=> 'Favicons',
            'desc'			=> '<i>Upload Your Favicons, If You Want To Use Your Own Favicons</i>',
			'default'		=> array(
			'url'			=> get_bloginfo('template_directory') . '/assets/img/favicon.ico'), 
        ),		
        array(
			'id'			=> 'info_options_google_translate',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR GOOGLE TRANSLATE', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
        array(
            'id'			=> 'gtranslate_on',
            'type'			=> 'switch',
            'title'			=> 'Google Translate',
            'desc'			=> 'Options Setting for Google Translate on Headers',
			'default'		=> 0,
			'on'			=> 'Enable',
			'off'			=> 'Disable',
        ),
        array(
            'id'			=> 'lang_default',
            'type'			=> 'text',
            'title'			=> 'Your Languange Site',
            'desc'			=> 'default : <b>en</b>',
            'default'		=> 'en',
            'required'		=> array( 'gtranslate_on', '=', true )
        ),
        array(
            'id'			=> 'lang_alt',
            'type'			=> 'text',
            'title'			=> 'Your Languange Translate Site',
            'desc'			=> 'default : <b>id</b> <br> use separate by <b style="color: red;font-weight: bold;">comma</b><br> example : <b style="color: red;font-weight: bold;">en,id,it,ja,es,tr</b><br>
af = Afrikaans<br>
sq = Albanian<br>
ar = Arabic<br>
hy = Armenian<br>
az = Azerbaijani<br>
eu = Basque<br>
be = Belarusian<br>
bn = Bengali<br>
bg = Bulgarian<br>
ca = Catalan<br>
zh-CN = Chinese (Simplified)<br>
zh-TW = Chinese (Traditional)<br>
hr = Croatian<br>
cs = Czech<br>
da = Danish<br>
nl = Dutch<br>
eo = Esperanto<br>
et = Estonian<br>
tl = Filipino<br>
fi = Finnish<br>
fr = French<br>
gl = Galician<br>
ka = Georgian<br>
de = German<br>
el = Greek<br>
gu = Gujarati<br>
ht = Haitian Creole<br>
iw = Hebrew<br>
hi = Hindi<br>
hu = Hungarian<br>
is = Icelandic<br>
id = Indonesian<br>
ga = Irish<br>
it = Italian<br>
ja = Japanese<br>
kn = Kannada<br>
ko = Korean<br>
la = Latin<br>
lv = Latvian<br>
lt = Lithuanian<br>
mk = Macedonian<br>
ms = Malay<br>
mt = Maltese<br>
no = Norwegian<br>
fa = Persian<br>
pl = Polish<br>
pt = Portuguese<br>
ro = Romanian<br>
ru = Russian<br>
sr = Serbian<br>
sk = Slovak<br>
sl = Slovenian<br>
es = Spanish<br>
sw = Swahili<br>
sv = Swedish<br>
ta = Tamil<br>
te = Telugu<br>
th = Thai<br>
tr = Turkish<br>
uk = Ukrainian<br>
ur = Urdu<br>
vi = Vietnamese<br>
cy = Welsh<br>
yi = Yiddish<br>
', 
            'default'		=> 'en,id,it,ja,es,tr',
            'required'		=> array( 'gtranslate_on', '=', true )
        ), 	
        array(
			'id'			=> 'info_contributor',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR CONTRIBUTORS HEADER', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
        array(
            'id'			=> 'contributors_on',
            'type'			=> 'switch',
            'title'			=> __( 'Contributors', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Showing Contributors Header', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),
		
    )
) );

// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            => __( 'Footers', TEXT_DOMAIN ),
    'id'               => 'footers',
    'customizer_width' => '500px',
    'subsection'       => true,
    'icon'             => 'dashicons dashicons-download',
    'fields'     => array(  
        array(
            'id'			=> 'ft_copyright',
            'type'			=> 'textarea',
            'title'			=> __( 'Footer Copyright', TEXT_DOMAIN ),
            'desc'			=> __( 'HTML Allowed', TEXT_DOMAIN ),
            'default'		=> "<span class='credit' style='color: black;'><span style='font-family:Arial, Helvetica, sans-serif'>&#169;</span><span id='getYear'>".date('Y')."</span> &#8231; <bdi><a href='".get_option('home')."' style='color: blue;'>".$sites." <svg viewBox='0 0 24 24'><path d='M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z'></path></svg></a></bdi> &#8231; All rights reserved&nbsp;&rightarrow; <a href='".get_option('home')."'>".$sites."</a> Using <a href='".EXTHEMES_ITEMS_URL."' target='_blank' title='".EXTHEMES_NAME." WP Themes v.".VERSIONS_THEMES."'>".EXTHEMES_NAME." WP Themes v.".VERSIONS_THEMES."</a> &rightarrow; &nbsp;</span> 
			<span class='creators'>Developed by <a href='".EXTHEMES_API_URL."' style='color: blue;'>".EXTHEMES_API_URL."</a></span>
			", 
        ), 
        array(
            'id'			=> 'footers_info',
            'type'			=> 'textarea',
            'title'			=> __( 'Footer info', TEXT_DOMAIN ),
            'desc'			=> __( 'HTML Allowed', TEXT_DOMAIN ),
            'default'		=> "<div class='widget HTML' >
<div class='widget-content abtU' data-text='Made with coffee by'>
<div>
<div class='abtL' style='background-image:url(".EX_THEMES_URI."/assets/img/favicon.ico)'></div>
<div class='abtT'>
<h2 class='tl'>".$sites."</h2>
<p class='abtD'>".get_bloginfo( 'description' )."</p>
<p class='abtD'><a href='".get_option('home')."'>".$sites."</a> Using <a href='".EXTHEMES_ITEMS_URL."' target='_blank' title='".EXTHEMES_NAME." WP Themes v.".VERSIONS_THEMES."'>".EXTHEMES_NAME." WP Themes v.".VERSIONS_THEMES."</a></p>
</div>
</div> 
</div>
</div>", 
        ), 
        array(
            'id'			=> 'wave_activate',
            'type'			=> 'switch',
            'title'			=> 'Waves Animation',
            'desc'			=> '<code>Enable</code> to Show ',
			'default'		=> 0,
			'on'			=> 'Enable',
			'off'			=> 'Disable',
        ), 
		
		
    )
) );
 
 
// -> START Basic Fields __('Main settings')
Redux::setSection( $opt_name, array(
    'title'            => __( 'Fonts & Colors', TEXT_DOMAIN ),
    'id'               => 'options_warna_dan_font',
    'customizer_width' => '700px',
    'icon'             => 'dashicons dashicons-admin-settings',
    'subsection'       => false,
) );


Redux::setSection( $opt_name, array(
'title'					=> __( 'Fonts', TEXT_DOMAIN ),
'id'					=> 'pengaturan_font',
'customizer_width'		=> '500px',
'subsection'			=> true,
'icon'					=> 'el el-fontsize',
'fields'				=> array(			 
		array(
		'id'			=> 'info_exthemes_fonts',
		'type'			=> 'info',
		'title'			=> __('THIS IS INFO FOR FONTS SETTINGS', TEXT_DOMAIN),
		'style'			=> 'critical',
		), 		 		
		array(
		'id'			=> 'fontH',
		'type'			=> 'text',
		'title'			=> __( 'Font Body (fontH)', TEXT_DOMAIN ), 
		'default'		=> 'Google Sans Text,Arial,Helvetica,sans-serif',
		'desc'			=> __( 'Default is , <b class="cool-link f2" style="color: crimson;">Google Sans Text,Arial,Helvetica,sans-serif</b>', TEXT_DOMAIN ), 
		),
		array(
		'id'			=> 'fontB',
		'type'			=> 'text',
		'title'			=> __( 'Font Body (fontB)', TEXT_DOMAIN ), 
		'default'		=> 'Google Sans Text,Arial,Helvetica,sans-serif',
		'desc'			=> __( 'Default is , <b class="cool-link f2" style="color: crimson;">Google Sans Text,Arial,Helvetica,sans-serif</b>', TEXT_DOMAIN ), 
		),   
		array(
		'id'			=> 'fontBa',
		'type'			=> 'text',
		'title'			=> __( 'Font Body (fontBa)', TEXT_DOMAIN ), 
		'default'		=> 'Google Sans Text,Arial,Helvetica,sans-serif',
		'desc'			=> __( 'Default is , <b class="cool-link f2" style="color: crimson;">Google Sans Text,Arial,Helvetica,sans-serif</b>', TEXT_DOMAIN ), 
		),  
		array(
		'id'			=> 'fontC',
		'type'			=> 'text',
		'title'			=> __( 'Font Body (fontC)', TEXT_DOMAIN ), 
		'default'		=> 'Google Sans Mono,monospace',
		'desc'			=> __( 'Default is , <b class="cool-link f2" style="color: crimson;">Google Sans Mono,monospace</b>', TEXT_DOMAIN ), 
		),    		 
		array(
		'id'			=> 'info_exthemes_fontsize',
		'type'			=> 'info',
		'title'			=> __('THIS IS INFO FOR FONTS SIZE SETTINGS', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		array(
		'id'			=> 'headerT',
		'type'			=> 'slider',
		'title'			=> __( 'Font Size (headerT)', TEXT_DOMAIN ),
		"default"		=> 16,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 30,
		'display_value'	=> 'text',
		'desc'			=> __('Choose <code>Font Size</code>', TEXT_DOMAIN), 
		),
	   
		array(
		'id'			=> 'postT',
		'type'			=> 'slider',
		'title'			=> __( 'Font Size (postT)', TEXT_DOMAIN ),
		"default"		=> 36,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 60,
		'display_value'	=> 'text',
		'desc'			=> __('Choose <code>Font Size</code>', TEXT_DOMAIN), 
		),
		array(
		'id'			=> 'postF',
		'type'			=> 'slider',
		'title'			=> __( 'Font Size (postF)', TEXT_DOMAIN ),
		"default"		=> 16,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 60,
		'display_value'	=> 'text',
		'desc'			=> __('Choose <code>Font Size</code>', TEXT_DOMAIN), 
		),
		array(
		'id'			=> 'widgetT',
		'type'			=> 'slider',
		'title'			=> __( 'Font Size (widgetT)', TEXT_DOMAIN ),
		"default"		=> 14,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 60,
		'display_value'	=> 'text',
		'desc'			=> __('Choose <code>Font Size</code>', TEXT_DOMAIN), 
		),
	   	 
	   
	   
    )
) );


Redux::setSection( $opt_name, array(
'title'					=> __( 'Colors', TEXT_DOMAIN ),
'id'					=> 'pengaturan_warna',
'customizer_width'		=> '500px',
'subsection'			=> true,
'icon'					=> 'el el-tint',
'fields'				=> array(
		array(
		'id'			=> 'info_exthemes_colors',
		'type'			=> 'info',
		'title'			=> __('Theme Color', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		
		array(
		'id'			=> 'themeC',
		'type'			=> 'color',
		'title'			=> __('Light Mode Address bar color', TEXT_DOMAIN), 
		'default'		=> '#482dff',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'info_basik_colors',
		'type'			=> 'info',
		'title'			=> __('Basic Colors And Background', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		array(
		'id'			=> 'headC',
		'type'			=> 'color',
		'title'			=> __('Heading colors', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'bodyC',
		'type'			=> 'color',
		'title'			=> __('Body colors', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'bodyCa',
		'type'			=> 'color',
		'title'			=> __('Alternative body colors', TEXT_DOMAIN), 
		'default'		=> '#989b9f',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'bodyB',
		'type'			=> 'color',
		'title'			=> __('Main page bakground color', TEXT_DOMAIN), 
		'default'		=> '#fdfcff',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'linkC',
		'type'			=> 'color',
		'title'			=> __('Link colors', TEXT_DOMAIN), 
		'default'		=> '#482dff',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'linkB',
		'type'			=> 'color',
		'title'			=> __('Button link colors', TEXT_DOMAIN), 
		'default'		=> '#482dff',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'waveB',
		'type'			=> 'color',
		'title'			=> __('Wave background color', TEXT_DOMAIN), 
		'default'		=> '#C6DAFC',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'headerLogo',
		'type'			=> 'color',
		'title'			=> __('Text Logo Color', TEXT_DOMAIN), 
		'default'		=> '#08102B',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'headerC',
		'type'			=> 'color',
		'title'			=> __('Text Desc Color', TEXT_DOMAIN), 
		'default'		=> '#343435',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'headerB',
		'type'			=> 'color',
		'title'			=> __('Header Background', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'headerI',
		'type'			=> 'color',
		'title'			=> __('Header Icon Color', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'info_basic_colors',
		'type'			=> 'info',
		'title'			=> __('Icon Colors', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		
		array(
		'id'			=> 'iconC',
		'type'			=> 'color',
		'title'			=> __('Icon colors', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'iconCa',
		'type'			=> 'color',
		'title'			=> __('Alternative icon colors', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'iconCs',
		'type'			=> 'color',
		'title'			=> __('Secondary icon colors', TEXT_DOMAIN), 
		'default'		=> '#767676',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'info_notifikasi_colors',
		'type'			=> 'info',
		'title'			=> __('Notification', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		
		array(
		'id'			=> 'notifH',
		'type'			=> 'slider',
		'title'			=> __( 'Notification max height', TEXT_DOMAIN ),
		"default"		=> 60,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 60,
		'display_value'	=> 'text', 
		),
		array(
		'id'			=> 'notifU',
		'type'			=> 'color',
		'title'			=> __('Notification background color', TEXT_DOMAIN), 
		'default'		=> '#e8f0fe',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'notifC',
		'type'			=> 'color',
		'title'			=> __('Notification text color', TEXT_DOMAIN), 
		'default'		=> '#01579b',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'info_lainnya_colors',
		'type'			=> 'info',
		'title'			=> __('Other Colors', TEXT_DOMAIN),
		'style'			=> 'critical', 
		),
		
		array(
		'id'			=> 'contentB',
		'type'			=> 'color',
		'title'			=> __('Content Background Color', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'contentL',
		'type'			=> 'color',
		'title'			=> __('content Line Color', TEXT_DOMAIN), 
		'default'		=> '#e6e6e6',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'widgetTac',
		'type'			=> 'color',
		'title'			=> __('Line Separate Text Widget Color ', TEXT_DOMAIN), 
		'default'		=> '#989b9f',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'navT',
		'type'			=> 'color',
		'title'			=> __('navT', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'navI',
		'type'			=> 'color',
		'title'			=> __('navI', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'navB',
		'type'			=> 'color',
		'title'			=> __('backgroud top categorie ', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'pagenavB',
		'type'			=> 'color',
		'title'			=> __('Navy backgroud Color', TEXT_DOMAIN), 
		'default'		=> '#482DFF',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'srchI',
		'type'			=> 'color',
		'title'			=> __('srchI', TEXT_DOMAIN), 
		'default'		=> '#48525c',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'srchB',
		'type'			=> 'color',
		'title'			=> __('srchB', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'fotT',
		'type'			=> 'color',
		'title'			=> __('Color Text footer', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'fotB',
		'type'			=> 'color',
		'title'			=> __('Background Footer', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'info_exthemes_set_mobiles',
		'type'			=> 'info',
		'title'			=> __('Mobile Color', TEXT_DOMAIN),
		'style'			=> 'critical',
		),
		array(
		'id'			=> 'mobT',
		'type'			=> 'color',
		'title'			=> __('Color Text Mobile footer', TEXT_DOMAIN), 
		'default'		=> '#08102b',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'mobB',
		'type'			=> 'color',
		'title'			=> __('Background Mobile Footer', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'mobHv',
		'type'			=> 'color',
		'title'			=> __('mobHv', TEXT_DOMAIN), 
		'default'		=> '#f1f1f0',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'info_exthemes_darkothers',
		'type'			=> 'info',
		'title'			=> __('Dark Color', TEXT_DOMAIN),
		'style'			=> 'critical',
		),
		array(
		'id'			=> 'dark_themeC',
		'type'			=> 'color',
		'title'			=> __('Dark Mode Address bar color', TEXT_DOMAIN), 
		'default'		=> '#1e1e1e',
		'validate'		=> 'color',
		),
		
		array(
		'id'			=> 'darkT',
		'type'			=> 'color',
		'title'			=> __('Dark Text Color', TEXT_DOMAIN), 
		'default'		=> '#fffdfc',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkTa',
		'type'			=> 'color',
		'title'			=> __('Dark Text Color Alertnative', TEXT_DOMAIN), 
		'default'		=> '#989b9f',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkU',
		'type'			=> 'color',
		'title'			=> __('Dark Link Color', TEXT_DOMAIN), 
		'default'		=> '#41B375',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkB',
		'type'			=> 'color',
		'title'			=> __('Dark Bacground', TEXT_DOMAIN), 
		'default'		=> '#1e1e1e',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkBa',
		'type'			=> 'color',
		'title'			=> __('Dark Background Content', TEXT_DOMAIN), 
		'default'		=> '#2d2d30',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkBs',
		'type'			=> 'color',
		'title'			=> __('Dark Background Footer', TEXT_DOMAIN), 
		'default'		=> '#252526',
		'validate'		=> 'color',
		),
		array(
		'id'			=> 'darkW',
		'type'			=> 'color',
		'title'			=> __('darkW', TEXT_DOMAIN), 
		'default'		=> '#343435',
		'validate'		=> 'color',
		),
		
	   
    )
) );


Redux::setSection( $opt_name, array(
'title'					=> __( 'Others Setting', TEXT_DOMAIN ),
'id'					=> 'pengaturan_yanglain',
'customizer_width'		=> '500px',
'subsection'			=> true,
'icon'					=> 'dashicons dashicons-admin-settings',
'fields'				=> array(	
	
		array(
		'id'			=> 'info_exthemes_others',
		'type'			=> 'info',
		'title'			=> __('THIS IS INFO FOR OTHERS SETTINGS', TEXT_DOMAIN),
		'style'			=> 'critical',
		),
		array(
		'id'			=> 'headerH',
		'type'			=> 'slider',
		'title'			=> __( 'Header Hight', TEXT_DOMAIN ),
		"default"		=> 60,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 90,
		'display_value'	=> 'text', 
		),
		array(
		'id'			=> 'contentW',
		'type'			=> 'slider',
		'title'			=> __( 'content width', TEXT_DOMAIN ),
		"default"		=> 1280,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 1500,
		'display_value'	=> 'text', 
		),
		array(
		'id'			=> 'sideW',
		'type'			=> 'slider',
		'title'			=> __( 'Sidebar width', TEXT_DOMAIN ),
		"default"		=> 300,
		"min"			=> 0,
		"step"			=> 1,
		"max"			=> 300,
		'display_value'	=> 'text', 
		),
		array(
		'id'			=> 'pageW',
		'type'			=> 'slider',
		'title'			=> __( 'Page width', TEXT_DOMAIN ),
		"default"		=> 780,
		"min"			=> 0,
		"step"			=> 1,
		"max"			=> 800,
		'display_value'	=> 'text', 
		),
		array(
		'id'			=> 'buttonR',
		'type'			=> 'slider',
		'title'			=> __( 'Button Radius', TEXT_DOMAIN ),
		"default"		=> 50,
		"min"			=> 8,
		"step"			=> 1,
		"max"			=> 90,
		'display_value'	=> 'text', 
		),
    )
) );
 
 

Redux::setSection( $opt_name, array(
    'title'            => __( 'Setting Pages', TEXT_DOMAIN ),
    'id'               => 'generals_setting_pages',
    'customizer_width' => '700px',
    'icon'             => 'dashicons dashicons-admin-settings',
    'subsection'       => false,
) );
// -> START Editors


Redux::setSection( $opt_name, array(
    'title'            => __( 'Index Home', TEXT_DOMAIN ),
    'id'               => 'exthemes_home',
    'customizer_width' => '500px',
    'subsection'       => true,
    'icon'             => 'dashicons dashicons-cover-image',
    'fields'     => array(	
        array(
			'id'			=> 'info_notification_header',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR NOTIFICATION HEADERS', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
        array(
            'id'			=> 'notification_header_on',
            'type'			=> 'switch',
            'title'			=> 'Notification Headers',
            'desc'			=> 'Options Setting for Notification Headers',
			'default'		=> 0,
			'on'			=> 'Enable',
			'off'			=> 'Disable',
        ),		
        array(
            'id'			=> 'notification_header',
            'type'			=> 'textarea',
            'title'			=> __('Notification Headers', TEXT_DOMAIN),
            'default'  		=> "
<span>Notification texts go here.</span> <a href='#' target='_blank'>Buy Now!</a>
				",
			'desc'     		=> __( 'You can use HTML code ', TEXT_DOMAIN ), 
            'required'		=> array( 'notification_header_on', '=', true )
        ),
        array(
			'id'			=> 'info_meta_options',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR META POST', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
		array(
            'id'			=> 'komentar_on',
            'type'			=> 'switch',
            'title'			=> 'Comments',            
			'desc'			=> __( 'Options Setting for Showing Comments', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
		array(
            'id'			=> 'read_on',
            'type'			=> 'switch',
            'title'			=> 'Read Views',            
			'desc'			=> __( 'Options Setting for Showing Read Views', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
		array(
            'id'			=> 'author_on',
            'type'			=> 'switch',
            'title'			=> 'Author',            
			'desc'			=> __( 'Options Setting for Showing Author', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ),
        array(
			'id'			=> 'info_gridss_options',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR GRID LIST POST FOR MOBILE VIEW Only', TEXT_DOMAIN),
			'style'			=> 'critical', 
			), 
        array(
            'id'			=> 'onegrid_activate',
            'type'			=> 'switch',
            'title'			=> 'One Grid',
            'desc'			=> __('Options Setting for use One Grid on Mobile', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enable',
			'off'			=> 'Disable',
        ), 
		
		
    )
) );



Redux::setSection( $opt_name, array(
    'title'            => __( 'Single Post', TEXT_DOMAIN ),
    'id'               => 'related_posts',
    'customizer_width' => '500px',
    'subsection'       => true,
    'icon'             => 'dashicons dashicons-cover-image',
    'fields'     => array(
        array(
			'id'			=> 'info_options_related_post',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR RELATED POST', TEXT_DOMAIN),
			'style'			=> 'critical', 
			), 
        array(
            'id'			=> 'related_post_on',
            'type'			=> 'switch',
            'title'			=> 'Related Post', 
			'desc'			=> __( 'Options Setting for showing Related Post', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 		
		array(
            'id'			=> 'related_posts_title',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'You may like these posts',
			'desc'			=> __( 'Default is <b>You may like these posts</b>', TEXT_DOMAIN ),
            'required'		=> array( 'related_post_on', '=', true )
		), 
        array(
			'id'			=> 'info_options_meta_post',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR META POST ', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
		array(
            'id'			=> 'post_read_time',
            'type'			=> 'switch',
            'title'			=> 'Reading Time',            
			'desc'			=> __( 'Options Setting for Showing Reading Time', TEXT_DOMAIN ),
			'default'		=> 1,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
		array(
            'id'			=> 'opt_read_time',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Estimated read time:',
			'desc'			=> __( 'Default is <b>Estimated read time:</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_read_time', '=', true )
		),
		array(
            'id'			=> 'opt_read_time_mins',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'mins',
			'desc'			=> __( 'Default is <b>mins</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_read_time', '=', true )
		),
		array(
            'id'			=> 'post_read_view',
            'type'			=> 'switch',
            'title'			=> 'View Counters',            
			'desc'			=> __( 'Options Setting for Showing View Counters', TEXT_DOMAIN ),
			'default'		=> 1,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
		array(
            'id'			=> 'post_greeting',
            'type'			=> 'switch',
            'title'			=> 'Greeting',            
			'desc'			=> __( 'Options Setting for Showing Greetings', TEXT_DOMAIN ),
			'default'		=> 1,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
		array(
            'id'			=> 'opt_greeting_1',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Have a Sweet Dreams!',
			'desc'			=> __( 'Default is <b>Have a Sweet Dreams!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'opt_greeting_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Good Morning!',
			'desc'			=> __( 'Default is <b>Good Morning!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'opt_greeting_3',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Good Afternoon!',
			'desc'			=> __( 'Default is <b>Good Afternoon!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'opt_greeting_4',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Good Evening!',
			'desc'			=> __( 'Default is <b>Good Evening!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'opt_greeting_5',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Good Night!',
			'desc'			=> __( 'Default is <b>Good Night!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'opt_greeting_6',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'It\'s time to sleep!',
			'desc'			=> __( 'Default is <b>It\'s time to sleep!</b>', TEXT_DOMAIN ), 
            'required' 		=> array( 'post_greeting', '=', true )
		),
		array(
            'id'			=> 'post_next_prev',
            'type'			=> 'switch',
            'title'			=> 'Next & Previous Post',            
			'desc'			=> __( 'Options Setting for Showing Next & Previous Post', TEXT_DOMAIN ),
			'default'		=> 1,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 
        array(
			'id'			=> 'info_options_tocs_post',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR TABLE OF CONTENT ', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
        array(
            'id'			=> 'toc_on',
            'type'			=> 'switch',
            'title'			=> 'Table of Content', 
			'desc'			=> __( 'Options Setting for showing Table of Content', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ),  
		array(
            'id'			=> 'opts_title_other_17',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Table of Contents',
			'desc'			=> __( 'Default is <b>Table of Contents</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_18',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Show',
			'desc'			=> __( 'Default is <b>Show</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_19',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Hide',
			'desc'			=> __( 'Default is <b>Hide</b>', TEXT_DOMAIN ), 
		),
        array(
            'id'			=> 'toc_open',
            'type'			=> 'switch',
            'title'			=> 'Open', 
			'desc'			=> __( 'Options Setting for Open or Close Table of Content', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Open',
			'off'			=> 'Close',
            'required'		=> array( 'toc_on', '=', true )
        ), 	
        array(
            'id'			=> 'floating_toc_on',
            'type'			=> 'switch',
            'title'			=> 'TOC Floating', 
			'desc'			=> __( 'Options Setting for showing Floating Sidebar Table of Content', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 		
		 		
        array(
			'id'			=> 'info_options_inline_related_post',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR INLINE RELATED POST ', TEXT_DOMAIN),
			'style'			=> 'critical', 
		), 	
        array(
            'id'			=> 'inrelpost_on',
            'type'			=> 'switch',
            'title'			=> 'Inline related post', 
			'desc'			=> __( 'Options Setting for showing Inline related post', TEXT_DOMAIN ),
			'default'		=> 0,
			'on'			=> 'Show',
			'off'			=> 'Hide',
        ), 		
		array(
            'id'			=> 'inrelpost_title',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Read more',
			'desc'			=> __( 'Default is <b>Read more</b>', TEXT_DOMAIN ),
            'required'		=> array( 'inrelpost_on', '=', true )
		),   
        array(
			'id'			=> 'info_options_meta_share',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR META OTHER POST ', TEXT_DOMAIN),
			'style'			=> 'critical', 
		),
		array(
            'id'			=> 'opt_title_others_1',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'About the Author',
			'desc'			=> __( 'Default is <b>About the Author</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_others_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'View',
			'desc'			=> __( 'Default is <b>View</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_1',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Share:',
			'desc'			=> __( 'Default is <b>Share:</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Share to other apps',
			'desc'			=> __( 'Default is <b>Share to other apps</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_3',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Close',
			'desc'			=> __( 'Default is <b>Close</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_4',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Copy to clipboard',
			'desc'			=> __( 'Default is <b>Copy to clipboard</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_5',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Copy',
			'desc'			=> __( 'Default is <b>Copy</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opt_title_share_6',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Link copied to clipboard',
			'desc'			=> __( 'Default is <b>Link copied to clipboard</b>', TEXT_DOMAIN ), 
		),

    )
) );
 

Redux::setSection( $opt_name, array(
    'title'            => __( 'Safelink', TEXT_DOMAIN ),
    'id'               => 'safelink_setting',
    'customizer_width' => '500px',
    'subsection'       => false,
    'icon'             => 'dashicons dashicons-cover-image',
    'fields'     => array(
		array(
            'id'			=> 'opt_title_safelink',
            'type'			=> 'editor',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Tool to protect URLs, and shorten safelink URLs automatically.',
			'desc'			=> __( 'Default is <b>Tool to protect URLs, and shorten safelink URLs automatically.</b><br> HTML Allowed', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Enter Link here',
			'desc'			=> __( 'Default is <b>Enter Link here</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_3',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Protected Link',
			'desc'			=> __( 'Default is <b>Protected Link</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_4',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Copy',
			'desc'			=> __( 'Default is <b>Copy</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_5',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'View',
			'desc'			=> __( 'Default is <b>View</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_6',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Link Protected, Click on Copy',
			'desc'			=> __( 'Default is <b>Link Protected, Click on Copy</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_7',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Enter link to protect!',
			'desc'			=> __( 'Default is <b>Enter link to protect!</b>', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'opt_title_safelink_8',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Copied to clipboard!',
			'desc'			=> __( 'Default is <b>Copied to clipboard!</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'opt_title_safelink_9',
            'type'			=> 'editor',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Scroll Down and click on <span class=\'hglt\'>Go to Link</span> for destination',
			'desc'			=> __( 'Default is <b>Scroll Down and click on &lt;span class=\'hglt\'&gt;Go to Link&lt;/span&gt; for destination</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'opt_title_safelink_10',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Congrats! Link is Generated',
			'desc'			=> __( 'Default is <b>Congrats! Link is Generated</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'opt_title_safelink_11',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Go to Link',
			'desc'			=> __( 'Default is <b>Go to Link</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'opt_title_safelink_12',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Please wait...',
			'desc'			=> __( 'Default is <b>Please wait...</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'opt_title_safelink_13',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Link is Generated',
			'desc'			=> __( 'Default is <b>Link is Generated</b>', TEXT_DOMAIN ), 
		),		
		array(
            'id'			=> 'contents_safelink',
            'type'			=> 'editor',
            'title'			=> __( 'Opt Content', TEXT_DOMAIN ),
            'default'		=> '
			<p>you can add content on your page content</p> 
<p>Lorem ipsum dolor sit amet. Et blanditiis provident <em>Ut soluta qui voluptatem repudiandae ad sunt provident vel officia deserunt</em> aut alias laboriosam ex consectetur eius. Nam quidem animi in adipisci quaeet voluptatum. Eum enim omnis est pariatur amet <strong>Et cumque id minima dolores sit laboriosam dolorem qui placeat voluptatem</strong>. Et assumenda voluptate eos vitae errorut iste. </p><p>Est reiciendis consequatur est quas doloremque <strong>Ut pariatur sit sunt vero et soluta laudantium aut debitis internos</strong> ab tempore consequuntur. Est maxime beatae <em>Et veritatis ab voluptas velit ea necessitatibus sint</em>. Sit doloremque neque et esse corruptiQui perspiciatis. </p><p>At nostrum enim <em>Qui labore non consectetur aliquam hic veniam exercitationem</em>. Ea culpa voluptas <strong>Et molestiae</strong> aut reiciendis maxime ab omnis magni! Est sapiente delectusAb minima est ratione delectus. </p><ul><li>Nam fuga vitae ut eligendi doloremque non numquam voluptatem. </li><li>Et eveniet molestias qui assumenda eligendi. </li></ul><blockquote>Ut animi modi ut praesentium veniam et earum nostrum nam possimus omnis sed iure cumque! </blockquote>
',
			'desc'			=> __( 'HTML Allowed', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'link_go_safelink',
            'type'			=> 'text',
            'title'			=> __( 'Link Go', TEXT_DOMAIN ),
            'default'		=> $url.'file',
			'desc'			=> __( 'Default is <b>'.$url.'file</b><br> make first new pages and add your link go safelink', TEXT_DOMAIN ), 
		),	
		array(
            'id'			=> 'link_go_safelink_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Link Go', TEXT_DOMAIN ),
            'default'		=> 'link',
			'desc'			=> __( 'Default is <b>link</b> ', TEXT_DOMAIN ), 
		),	
		array(
			'id'			=> 'timer_safelink',
			'type'			=> 'slider',
			'title'			=> __( 'Timer', TEXT_DOMAIN ),
			'default'		=> 15,
			'min'			=> 1,
			'step'			=> 1,
			'max'			=> 60,
			'display_value'	=> 'text', 
		),
		 
        array(
            'id'       => 'safelink_slot_1',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here'></div>", 
        ), 
        array(
            'id'       => 'safelink_slot_2',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here'></div>", 
        ),  
        array(
            'id'       => 'safelink_slot_3',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here'></div>", 
        ), 
		
    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Menu', TEXT_DOMAIN ),
    'id'               => 'menus_median',
    'customizer_width' => '700px',
    'icon'             => 'el el-list',
    'subsection'       => false,
    'fields'     => array(
        array(
            'id'			=> 'hide_menus',
            'type'			=> 'switch',
            'title'			=> __( 'Home Pages', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Collapse menus on Homepage', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Collapse',
			'off'			=> 'No',
        ),
        array(
            'id'			=> 'hide_menus_post',
            'type'			=> 'switch',
            'title'			=> __( 'Single Posts', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Collapse menus on Single Posts', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Collapse',
			'off'			=> 'No',
        ),
        array(
            'id'			=> 'hide_menus_page',
            'type'			=> 'switch',
            'title'			=> __( 'Pages', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Collapse menus on Pages and Custom Pages', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Collapse',
			'off'			=> 'No',
        ), 
        array(
            'id'			=> 'menu_side',
            'type'			=> 'textarea',
            'title'			=> __('Menu sidebar', TEXT_DOMAIN),
            'default'  		=> "<!--remove checked='' if you dont want to open-->
<li class='drp'>
<input checked='' class='drpI hidden' id='drpDwn-1' name='drpDwn' type='checkbox'/>
<label class='a' for='drpDwn-1'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 2.500000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line><path d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'></path></g></svg>
<span class='n'>Sub Menu</span>
<svg class='line d' viewBox='0 0 24 24'><g transform='translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g></svg>
</label>
<ul>
<li itemprop='name'><a href='#add_your_link' itemprop='url'>Sub Menu 01</a></li>
<li itemprop='name'><a href='#add_your_link' itemprop='url'>Sub Menu 02</a></li> 
</ul>
</li>
<li class='drp br'>
<input class='drpI hidden' id='drpDwn-2' name='drpDwn' type='checkbox'/>
<label class='a' for='drpDwn-2'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 2.500000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line><path d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'></path></g></svg>
<span class='n new'>Sub Menu</span>
<svg class='line d' viewBox='0 0 24 24'><g transform='translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g></svg>
</label>
<ul class='s'>
<li itemprop='name'><a href='#add_your_link' itemprop='url'><span>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 2.500000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line><path d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'></path></g></svg>
Sub Menu 01</span></a></li>
<li itemprop='name'><a href='#add_your_link' itemprop='url'><span>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 2.500000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line><path d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'></path></g></svg>
Sub Menu 02</span></a></li> 
</ul>
</li>
<li>
<a class='a' href='#add_your_link' itemprop='url' aria-label='About'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.749500, 2.549500)'><path d='M6.809,18.9067 C3.137,18.9067 9.41469125e-14,18.3517 9.41469125e-14,16.1277 C9.41469125e-14,13.9037 3.117,11.8997 6.809,11.8997 C10.481,11.8997 13.617,13.8847 13.617,16.1077 C13.617,18.3307 10.501,18.9067 6.809,18.9067 Z'></path><path d='M6.809,8.728 C9.219,8.728 11.173,6.774 11.173,4.364 C11.173,1.954 9.219,-2.48689958e-14 6.809,-2.48689958e-14 C4.399,-2.48689958e-14 2.44496883,1.954 2.44496883,4.364 C2.436,6.766 4.377,8.72 6.778,8.728 L6.809,8.728 Z'></path><path class='svgC' d='M14.0517,7.5293 C15.4547,7.1543 16.4887007,5.8753 16.4887007,4.3533 C16.4897,2.7653 15.3627,1.4393 13.8647,1.1323'></path><path class='svgC' d='M14.7113,11.104 C16.6993,11.104 18.3973,12.452 18.3973,13.655 C18.3973,14.364 17.8123,15.092 16.9223,15.301'></path></g></svg>
<span class='n' itemprop='name'>About</span>
</a>
</li>
<li class='br'>
<a class='a' href='#add_your_link' itemprop='url' aria-label='Contact'>
<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.452080, 2.851980)'><path class='svgC' d='M15.0928322,6.167017 C15.0928322,6.167017 11.8828071,10.0196486 9.53493746,10.0196486 C7.18807029,10.0196486 3.941955,6.167017 3.941955,6.167017'></path><path d='M1.04805054e-13,9.11679198 C1.04805054e-13,2.27869674 2.38095238,8.8817842e-15 9.52380952,8.8817842e-15 C16.6666667,8.8817842e-15 19.047619,2.27869674 19.047619,9.11679198 C19.047619,15.9538847 16.6666667,18.233584 9.52380952,18.233584 C2.38095238,18.233584 1.04805054e-13,15.9538847 1.04805054e-13,9.11679198 Z'></path></g></svg>
<span class='n' itemprop='name'>Contact</span>
</a>
</li> 
<li class='drp mr'>
<input checked='checked' class='drpI hidden' id='drpMr-2' name='drpDwn' type='checkbox'/>
<label class='a' for='drpMr-2'>
<span class='n'>More...</span>
<svg class='line d' viewBox='0 0 24 24'><g transform='translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g></svg>
</label>
<ul>
<li itemprop='name'><a class='new' href='#add_your_link' itemprop='url'>More Links</a></li>
</ul>
</li>
						",
			'desc'     	=> __( 'edit the link <b>\'#add_your_link\'</b> with your links<br>remove <b>checked=\'\'</b> if you don\'t want to open', TEXT_DOMAIN ), 
        ),
		
        array(
            'id'		=> 'menu_sosmed_side',
            'type'		=> 'textarea',
            'title'		=> __('Menu Social Media Sidebar', TEXT_DOMAIN),
            'default'  	=> "
<li>
<a href='#add_your_link' target='_blank' aria-label='Facebook'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H17V18h4a1,1,0,0,0,0-2H17V14a2,2,0,0,1,2-2h2a1,1,0,0,0,0-2H19a4,4,0,0,0-4,4v2H12a1,1,0,0,0,0,2h3v9H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z'></path></svg>
</span></a>
</li>
<li>
<a href='#add_your_link' target='_blank' aria-label='Instagram'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M22,3H10a7,7,0,0,0-7,7V22a7,7,0,0,0,7,7H22a7,7,0,0,0,7-7V10A7,7,0,0,0,22,3Zm5,19a5,5,0,0,1-5,5H10a5,5,0,0,1-5-5V10a5,5,0,0,1,5-5H22a5,5,0,0,1,5,5Z'></path><path class='svgC' d='M16,9.5A6.5,6.5,0,1,0,22.5,16,6.51,6.51,0,0,0,16,9.5Zm0,11A4.5,4.5,0,1,1,20.5,16,4.51,4.51,0,0,1,16,20.5Z'></path><circle class='svgC' cx='23' cy='9' r='1'></circle></svg>
</span></a>
</li>
<li>
<a href='#add_your_link' target='_blank' aria-label='Twitter'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M13.35,28A13.66,13.66,0,0,1,2.18,22.16a1,1,0,0,1,.69-1.56l2.84-.39A12,12,0,0,1,5.44,4.35a1,1,0,0,1,1.7.31,9.87,9.87,0,0,0,5.33,5.68,7.39,7.39,0,0,1,7.24-6.15,7.29,7.29,0,0,1,5.88,3H29a1,1,0,0,1,.9.56,1,1,0,0,1-.11,1.06L27,12.27c0,.14,0,.28-.05.41a12.46,12.46,0,0,1,.09,1.43A13.82,13.82,0,0,1,13.35,28ZM4.9,22.34A11.63,11.63,0,0,0,13.35,26,11.82,11.82,0,0,0,25.07,14.11,11.42,11.42,0,0,0,25,12.77a1.11,1.11,0,0,1,0-.26c0-.22.05-.43.06-.65a1,1,0,0,1,.22-.58l1.67-2.11H25.06a1,1,0,0,1-.85-.47,5.3,5.3,0,0,0-4.5-2.51,5.41,5.41,0,0,0-5.36,5.45,1.07,1.07,0,0,1-.4.83,1,1,0,0,1-.87.2A11.83,11.83,0,0,1,6,7,10,10,0,0,0,8.57,20.12a1,1,0,0,1,.37,1.05,1,1,0,0,1-.83.74Z'></path></svg>
</span></a>
</li>
<li>
<a href='#add_your_link' target='_blank' aria-label='Tik Tok'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M24,3H8A5,5,0,0,0,3,8V24a5,5,0,0,0,5,5H24a5,5,0,0,0,5-5V8A5,5,0,0,0,24,3Zm3,21a3,3,0,0,1-3,3H8a3,3,0,0,1-3-3V8A3,3,0,0,1,8,5H24a3,3,0,0,1,3,3Z'></path><path class='svgC' d='M22,12a3,3,0,0,1-3-3,1,1,0,0,0-2,0V19a3,3,0,1,1-3-3,1,1,0,0,0,0-2,5,5,0,1,0,5,5V13a4.92,4.92,0,0,0,3,1,1,1,0,0,0,0-2Z'></path></svg>
</span></a>
</li>
<li>
<a href='#add_your_link' target='_blank' aria-label='Whatsapp'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M16,2A13,13,0,0,0,8,25.23V29a1,1,0,0,0,.51.87A1,1,0,0,0,9,30a1,1,0,0,0,.51-.14l3.65-2.19A12.64,12.64,0,0,0,16,28,13,13,0,0,0,16,2Zm0,24a11.13,11.13,0,0,1-2.76-.36,1,1,0,0,0-.76.11L10,27.23v-2.5a1,1,0,0,0-.42-.81A11,11,0,1,1,16,26Z'></path><path class='svgC' d='M19.86,15.18a1.9,1.9,0,0,0-2.64,0l-.09.09-1.4-1.4.09-.09a1.86,1.86,0,0,0,0-2.64L14.23,9.55a1.9,1.9,0,0,0-2.64,0l-.8.79a3.56,3.56,0,0,0-.5,3.76,10.64,10.64,0,0,0,2.62,4A8.7,8.7,0,0,0,18.56,21a2.92,2.92,0,0,0,2.1-.79l.79-.8a1.86,1.86,0,0,0,0-2.64Zm-.62,3.61c-.57.58-2.78,0-4.92-2.11a8.88,8.88,0,0,1-2.13-3.21c-.26-.79-.25-1.44,0-1.71l.7-.7,1.4,1.4-.7.7a1,1,0,0,0,0,1.41l2.82,2.82a1,1,0,0,0,1.41,0l.7-.7,1.4,1.4Z'></path></svg>
</span></a>
</li>
<li>
<a href='#add_your_link' target='_blank' aria-label='Telegram'><span class='a tIc bIc'>
<svg viewBox='0 0 32 32'><path d='M24,28a1,1,0,0,1-.62-.22l-6.54-5.23a1.83,1.83,0,0,1-.13.16l-4,4a1,1,0,0,1-1.65-.36L8.2,18.72,2.55,15.89a1,1,0,0,1,.09-1.82l26-10a1,1,0,0,1,1,.17,1,1,0,0,1,.33,1l-5,22a1,1,0,0,1-.65.72A1,1,0,0,1,24,28Zm-8.43-9,7.81,6.25L27.61,6.61,5.47,15.12l4,2a1,1,0,0,1,.49.54l2.45,6.54,2.89-2.88-1.9-1.53A1,1,0,0,1,13,19a1,1,0,0,1,.35-.78l7-6a1,1,0,1,1,1.3,1.52Z'></path></svg>
</span></a>
</li>
			
			",
			'desc'     	=> __( 'edit the link \'#add_your_link\' with your links', TEXT_DOMAIN ), 
        ),

    )
) );

Redux::setSection( $opt_name, array(
    'title'            => __( 'Comments', TEXT_DOMAIN ),
    'id'               => 'set_comments',
    'customizer_width' => '500px',
    'subsection'       => false,
    'icon'             => 'el el-comment-alt',
    'fields'     		=> array(
        array(
			'id'			=> 'info_options_meta_komentar',
			'type'			=> 'info',
			'title'			=> __('THIS INFO FOR META COMMENTS POST ', TEXT_DOMAIN),
			'style'			=> 'critical', 
		),
		array(
            'id'			=> 'title_comment',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Join the conversation',
			'desc'			=> __( 'Default is <b>Join the conversation</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Comments',
			'desc'			=> __( 'Default is <b>Comments</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments_newest',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Newest',
			'desc'			=> __( 'Default is <b>Newest</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments_oldest',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Oldest',
			'desc'			=> __( 'Default is <b>Oldest</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments_close',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Close',
			'desc'			=> __( 'Default is <b>Close</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments_view_replies',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'View replies',
			'desc'			=> __( 'Default is <b>View replies</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_comments_hide_replies',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Hide replies',
			'desc'			=> __( 'Default is <b>Hide replies</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_coms_your_name',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Your Name',
			'desc'			=> __( 'Default is <b>Your Name</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_coms_your_email',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Your Email',
			'desc'			=> __( 'Default is <b>Your Email</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_coms_your_comments',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Your Comments',
			'desc'			=> __( 'Default is <b>Your Comments</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'title_coms_submits',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Submit',
			'desc'			=> __( 'Default is <b>Submit</b>', TEXT_DOMAIN ), 
		),
		
		
    )
) );
// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            => __( 'Advertise', TEXT_DOMAIN ),
    'id'               => 'ads',
    'customizer_width' => '500px',
    'icon'             => 'el el-usd',
    'fields'     => array(
        array(
            'id'		=> 'slot_1_on',
            'type'		=> 'switch',
            'title'		=> __( 'Slot Ads 1', TEXT_DOMAIN ),
            'desc'		=> __( 'Options Setting for Slot Ads 1', TEXT_DOMAIN),
			'default'	=> 0,
			'on'		=> 'Enabled',
			'off'		=> 'Disabled',
        ),
        array(
            'id'       => 'slot_1',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here (Slot Ads 1)'></div>",
            'required' => array( 'slot_1_on', '=', true )
        ), 
         
        array(
            'id'		=> 'slot_2_on',
            'type'		=> 'switch',
            'title'		=> __( 'Slot Ads 2', TEXT_DOMAIN ),
            'desc'		=> __( 'Options Setting for Slot Ads 2', TEXT_DOMAIN),
			'default'	=> 0,
			'on'		=> 'Enabled',
			'off'		=> 'Disabled',
        ),
        array(
            'id'       => 'slot_2',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here (Slot Ads 2)'></div>",
            'required' => array( 'slot_2_on', '=', true )
        ), 
        array(
            'id'		=> 'slot_3_on',
            'type'		=> 'switch',
            'title'		=> __( 'Slot Ads 3', TEXT_DOMAIN ),
            'desc'		=> __( 'Options Setting for Slot Ads 3', TEXT_DOMAIN),
			'default'	=> 0,
			'on'		=> 'Enabled',
			'off'		=> 'Disabled',
        ),
        array(
            'id'       => 'slot_3',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here (Slot Ads 3)'></div>",
            'required' => array( 'slot_3_on', '=', true )
        ), 
        array(
            'id'		=> 'slot_4_on',
            'type'		=> 'switch',
            'title'		=> __( 'Slot Ads 4', TEXT_DOMAIN ),
            'desc'		=> __( 'Options Setting for Slot Ads 4', TEXT_DOMAIN),
			'default'	=> 0,
			'on'		=> 'Enabled',
			'off'		=> 'Disabled',
        ),
        array(
            'id'       => 'slot_4',
            'type'     => 'textarea',
            'title'    => 'Opt Ads',
            'desc'	   => 'Insert Your Code HTML.',
            'default'  => "<div class='adB' data-text='Ads go here (Slot Ads 4)'></div>",
            'required' => array( 'slot_4_on', '=', true )
        ), 
         



    )
) );
 
// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            	=> __( 'Inject JS CSS', TEXT_DOMAIN ),
    'id'               	=> 'script_insert',
    'customizer_width' 	=> '500px',
    'icon'             	=> 'el el-fork',
    'fields'     		=> array(
        array(
			'id'			=> 'header_section_on',
			'type'			=> 'switch',
			'title'			=> 'Header Sections',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
		),
		array(
			'id'			=> 'header_section',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', TEXT_DOMAIN ),
			'desc'			=> __( 'You can Inject Scripts or CSS Style on Header<br>example<br>&lt;style&gt;<b>.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b>Your code</b>&lt;/script&gt;', TEXT_DOMAIN ),
			'required'		=> array( 'header_section_on', '=', true )
		),
		array(
			'id'			=> 'footer_section_on',
			'type'			=> 'switch',
			'title'			=> 'Footer Sections',
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
		),
		array(
			'id'			=> 'footer_section',
			'type'			=> 'textarea',
			'title'			=> __( 'HTML Allowed', TEXT_DOMAIN ),
			'desc'			=> __( 'You can Inject Scripts or CSS Style on Footer<br>example<br>&lt;style&gt;<b>.sample {display:none}</b>&lt;/style&gt;
			<br>
			&lt;script&gt;<b>Your code</b>&lt;/script&gt;', TEXT_DOMAIN ),
			'required'		=> array( 'footer_section_on', '=', true )
		),
			

    )
) );


// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            	=> __( 'SEO', TEXT_DOMAIN ),
    'id'               	=> 'settingan_seo',
    'customizer_width' 	=> '500px',
    'icon'             	=> 'el el-cog',
    'fields'     		=> array(  
        	 
			array(
			'id'       		=> 'json_seo_on',
			'type'     		=> 'switch',
			'title'    		=> 'Json SEO',
			'desc'    		=> 'Json SEO Generator',				
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
			),
			array(
			'id'       		=> 'img_json_seo',
			'type'     		=> 'media',
			'title'    		=> __( 'Image SEO', TEXT_DOMAIN ),
			'default'  		=> array(
			'url'			=> EX_THEMES_URI.'/screenshot.png'),
            'required' 		=> array( 'json_seo_on', '=', true )
            ),   
			array(
            'id'       		=> 'json_tl_url',
            'type'     		=> 'text',
            'title'    		=> __( 'Telegram Url', TEXT_DOMAIN ), 
            'default'  		=> EXTHEMES_TELEGRAM_URL,
            'required' 		=> array( 'json_seo_on', '=', true )
			),
			array(
            'id'       		=> 'json_fb_url',
            'type'     		=> 'text',
            'title'    		=> __( 'Facebook Url', TEXT_DOMAIN ), 
            'default'  		=> EXTHEMES_FACEBOOK_URL,
            'required' 		=> array( 'json_seo_on', '=', true )
			),
			array(
            'id'       		=> 'json_tw_url',
            'type'     		=> 'text',
            'title'    		=> __( 'Twitter Url', TEXT_DOMAIN ), 
            'default'  		=> EXTHEMES_TWITTER_URL,
            'required' 		=> array( 'json_seo_on', '=', true )
			),
			array(
            'id'       		=> 'json_yt_url',
            'type'     		=> 'text',
            'title'    		=> __( 'Youtube Url', TEXT_DOMAIN ), 
            'default'  		=> EXTHEMES_YOUTUBE_URL,
            'required' 		=> array( 'json_seo_on', '=', true )
			),
			array(
            'id'       		=> 'json_ig_url',
            'type'     		=> 'text',
            'title'    		=> __( 'Instagram Url', TEXT_DOMAIN ), 
            'default'  		=> EXTHEMES_INSTAGRAM_URL,
            'required' 		=> array( 'json_seo_on', '=', true )
			),
        
    )
) );

 
 
// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            	=> __( 'Options', TEXT_DOMAIN ),
    'id'               	=> 'optionz',
    'customizer_width' 	=> '500px',
    'icon'             	=> 'el el-cog',
    'fields'     		=> array(        
        array(
            'id'			=> 'no_images',
            'type'			=> 'media',
            'title'			=> __( 'Image No Founds', TEXT_DOMAIN ),
			'desc'			=> __('Upload <code> No Images Founds </code><br>if you want to use your own picture ', TEXT_DOMAIN),
            'default'		=> array(
							'url' => get_bloginfo('template_directory').'/assets/img/no.image.png'
							),            
        ), 
        array(
            'id'			=> 'admin_bar_on',
            'type'			=> 'switch',
            'title'			=> __( 'Admin Bar', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Showing Admin Bar', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),
        array(
            'id'			=> 'cookie_on',
            'type'			=> 'switch',
            'title'			=> __( 'Cookie', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Cookie', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),
        array(
            'id'			=> 'nointernet_on',
            'type'			=> 'switch',
            'title'			=> __( 'No Internet', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for No Internet', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),  
        array(
            'id'			=> 'bookmark_on',
            'type'			=> 'switch',
            'title'			=> __( 'Bookmark', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Showing Bookmark', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),
        array(
            'id'			=> 'lazy_on',
            'type'			=> 'switch',
            'title'			=> __( 'LazyLoad Image', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for LazyLoad Image', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ), 
        array(
            'id'			=> 'load_more_on',
            'type'			=> 'switch',
            'title'			=> __( 'Ajax Load More Navy', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for <b>Ajax Load More Navy</b>', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ), 
		array(
			'id'			=> 'text_load_more_1',
			'type'			=> 'text',
			'title'			=> __( 'Title opt', TEXT_DOMAIN ),
			'desc'			=> __( 'Default is <b>Load more</b>', TEXT_DOMAIN ),
			'default'		=> 'Load more',
			'placeholder' 	=> 'Default is Load more',
            'required'		=> array( 'load_more_on', '=', true ),
		),
		array(
			'id'			=> 'text_load_more_2',
			'type'			=> 'text',
			'title'			=> __( 'Title opt', TEXT_DOMAIN ),
			'desc'			=> __( 'Default is <b>Loading</b>', TEXT_DOMAIN ),
			'default'		=> 'Loading',
			'placeholder' 	=> 'Default is Loading',
            'required'		=> array( 'load_more_on', '=', true ),
		),
		array(
			'id'			=> 'text_load_more_3',
			'type'			=> 'text',
			'title'			=> __( 'Title opt', TEXT_DOMAIN ),
			'desc'			=> __( 'Default is <b>No More</b>', TEXT_DOMAIN ),
			'default'		=> 'No More',
			'placeholder' 	=> 'Default is No More',
            'required'		=> array( 'load_more_on', '=', true ),
		),
        array(
            'id'			=> 'auto_dark',
            'type'			=> 'switch',
            'title'			=> __( 'Auto Dark', TEXT_DOMAIN ),
            'desc'			=> __( 'Options Setting for Auto Dark by times', TEXT_DOMAIN),
			'default'		=> 0,
			'on'			=> 'Enabled',
			'off'			=> 'Disabled',
        ),
        
    )
) );


// -> START Editors
Redux::setSection( $opt_name, array(
    'title'            => __( 'Maintenances', TEXT_DOMAIN ),
    'id'               => 'option_mtns',
    'customizer_width' => '500px',
    'icon'             => 'el el-cog',
    'fields'     => array(
	 array(
            'id'       => 'mdn_maintenances',
            'type'     => 'switch',
            'title'    => __( 'Mintenances', TEXT_DOMAIN ),
			'desc'     => __( 'Maintenances not Showing for admin', TEXT_DOMAIN ),
			'default'  => 0,
			'on'       => 'Enabled',
			'off'      => 'Disabled',
        ),
		array(
			'id'       => 'mdn_tanggal_jam',
			'type'     => 'datetime',
			'title'    => __( 'Date/Times', TEXT_DOMAIN ),
			'desc'     => __( '<br> example : 12-07-2026 02:43 PM +0000', TEXT_DOMAIN ),
            'required' => array( 'mdn_maintenances', '=', true ),
		),
		array(
			'id'        => 'mdn_contents',
			'type'		=> 'textarea',
			'title'		=> __( 'Message', TEXT_DOMAIN ),
			'desc'		=> __( 'Add Your Message', TEXT_DOMAIN ),
			'default'	=> '<div class="mtmH">Site is Under Maintenance</div>
<div class="mtmD">Please come back again in... </div>',
            'required'	=> array( 'mdn_maintenances', '=', true ),
		),
		array(
			'id'		=> 'mdn_days',
			'type'		=> 'text',
			'title'		=> __( 'Days', TEXT_DOMAIN ),
			'desc'		=> __( 'Default is Days', TEXT_DOMAIN ),
			'default'	=> 'Days',
			'placeholder' => 'Default is Days',
            'required'	=> array( 'mdn_maintenances', '=', true ),
		),
		array(
			'id'		=> 'mdn_hours',
			'type'		=> 'text',
			'title'		=> __( 'Hours', TEXT_DOMAIN ),
			'desc'		=> __( 'Default is Hours', TEXT_DOMAIN ),
			'default'	=> 'Hours',
			'placeholder' => 'Default is Hours',
            'required'	=> array( 'mdn_maintenances', '=', true ),
		),
		array(
			'id'		=> 'mdn_minutes',
			'type'		=> 'text',
			'title'		=> __( 'Minutes', TEXT_DOMAIN ),
			'desc'		=> __( 'Default is Minutes', TEXT_DOMAIN ),
			'default'	=> 'Minutes',
			'placeholder' => 'Default is Minutes',
            'required'	=> array( 'mdn_maintenances', '=', true ),
		),
		array(
			'id'		=> 'mdn_seconds',
			'type'		=> 'text',
			'title'		=> __( 'Seconds', TEXT_DOMAIN ),
			'desc'		=> __( 'Default is Seconds', TEXT_DOMAIN ),
			'default'	=> 'Seconds',
			'placeholder' => 'Default is Seconds',
            'required'	=> array( 'mdn_maintenances', '=', true ),
		),
		
		
		
	    )
) );


 
Redux::setSection( $opt_name, array(
    'title'            => __( 'Change Language', TEXT_DOMAIN ),
    'id'               => 'translate_options',
    'customizer_width' => '500px',
    'icon'             => 'dashicons dashicons-translation',
    'fields'     => array( 
		array(
			'id'		=> 'info_translate_options',
			'type'		=> 'info',
			'style'		=> 'info',
			'title'		=> __( 'infos', TEXT_DOMAIN),
			'desc'		=> wp_kses_post( __( 'Please <b>Change Language</b> As You Wish on here', TEXT_DOMAIN ) ),
		),
		array(
            'id'			=> 'opts_title_other_1',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Home',
			'desc'			=> __( 'Default is <b>Home</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_2',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Search',
			'desc'			=> __( 'Default is <b>Search</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_3',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Read more',
			'desc'			=> __( 'Default is <b>Read more</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_4',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Published',
			'desc'			=> __( 'Default is <b>Published</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_5',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'in',
			'desc'			=> __( 'Default is <b>in</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_6',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Latest posts',
			'desc'			=> __( 'Default is <b>Latest posts</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_7',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Search this blog',
			'desc'			=> __( 'Default is <b>Search this blog</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_8',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Clear',
			'desc'			=> __( 'Default is <b>Clear</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_9',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Contributors',
			'desc'			=> __( 'Default is <b>Contributors</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_10',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Close',
			'desc'			=> __( 'Default is <b>Close</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_11',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Something Wrong!',
			'desc'			=> __( 'Default is <b>Something Wrong!</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_12',
            'type'			=> 'textarea',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'The page you\'ve requested can\'t be found. Why don\'t you browse around?',
			'desc'			=> __( 'Default is <b>The page you\'ve requested can\'t be found. Why don\'t you browse around?</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_13',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Take me back',
			'desc'			=> __( 'Default is <b>Take me back</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_14',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> '4.0.4',
			'desc'			=> __( 'Default is <b>404</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_15',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Sorry...',
			'desc'			=> __( 'Default is <b>Sorry...</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_16',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'not founds',
			'desc'			=> __( 'Default is <b>not founds</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_20',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Read later',
			'desc'			=> __( 'Default is <b>Read later</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_21',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Remove',
			'desc'			=> __( 'Default is <b>Remove</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_22',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Bookmark Posts',
			'desc'			=> __( 'Default is <b>Bookmark Posts</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_23',
            'type'			=> 'textarea',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'The list of favorite articles does not exist yet...',
			'desc'			=> __( 'Default is <b>The list of favorite articles does not exist yet...</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_24',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'View all articles',
			'desc'			=> __( 'Default is <b>View all articles</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_25',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Added to Bookmarks!',
			'desc'			=> __( 'Default is <b>Added to Bookmarks!</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_26',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Removed from Bookmarks!',
			'desc'			=> __( 'Default is <b>Removed from Bookmarks!</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_27',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Translate',
			'desc'			=> __( 'Default is <b>Translate</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_28',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Theme Color',
			'desc'			=> __( 'Default is <b>Theme Color</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_29',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Change Mode',
			'desc'			=> __( 'Default is <b>Change Mode</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_30',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Light',
			'desc'			=> __( 'Default is <b>Light</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_31',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'Dark',
			'desc'			=> __( 'Default is <b>Dark</b>', TEXT_DOMAIN ), 
		),
		array(
            'id'			=> 'opts_title_other_32',
            'type'			=> 'text',
            'title'			=> __( 'Opt Title', TEXT_DOMAIN ),
            'default'		=> 'System Default',
			'desc'			=> __( 'Default is <b>System Default</b>', TEXT_DOMAIN ), 
		),
		
	
	)
) );

	