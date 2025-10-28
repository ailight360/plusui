<?php
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*  As Errors In Your Themes
/*  Are Not The Responsibility
/*  Of The DEVELOPERS
/*  @EXTHEM.ES
/*-----------------------------------------------------------------------------------*/ 
// silences is goldens

function butuh_plugin() {
	$plugins = array(		 
		array(
			'name'                   	=> 'One Click Demo Import',
			'slug'                   	=> 'one-click-demo-import',
			'required'  	    	 	=> true,
		),		
		array(
		  'name'						=> 'Template Library and Redux Framework',
		  'slug'						=> 'redux-framework',
		  'required'					=> true,
		),
		
		array(
			'name'						=> 'Classic Editor',
			'slug'						=> 'classic-editor',
			'required'					=> false,
		), 
		array(
			'name'						=> 'Classic Widgets',
			'slug'						=> 'classic-widgets',
			'required'					=> false,
		), 
		/* 
		array(
			'name'						=> 'WebP Express',
			'slug'						=> 'webp-express',
			'required'					=> false,
		), 
		array(
			'name'						=> 'WP Ajax Load More Pagination',
			'slug'						=> 'wp-ajax-pagination',
			'required'					=> false,
		), 
		array(
			'name'						=> 'AMP',
			'slug'						=> 'amp',
			'required'					=> false,
		),
		array(
			'name'						=> 'One Click Demo Import ',
			'slug'						=> 'one-click-demo-import',
			'required'					=> true,
		), 
		 		 
		array(
			'name'						=> 'Fix My Feed RSS', // The plugin name.
			'slug'						=> 'fix-rss', // The plugin slug (typically the folder name).
			'source'					=> 'https://www.dropbox.com/s/desv6uuc9au4ex4/fix-rss.zip?dl=1',
			//'source'					=> get_stylesheet_directory() . '/libs/plugin/fix-rss.zip', // The plugin source
			'required'					=> false, // If false, the plugin is only 'recommended' instead of required.
		),
		*/
		 
	);
 
	$config = array(
		'id'           => 'ex_themes',             // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => true,                    // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}

function ocdi_register_plugins( $plugins ) {
 
  // Required: List of plugins used by all theme demos.
  $theme_plugins = [  
    [
		'name'     		=> 'One Click Demo Import',
		'slug'     		=> 'one-click-demo-import',
		'required' 		=> true,        
    ],    
	[
		'name'     		=> 'Redux Framework',
		'slug'     		=> 'redux-framework',
		'required' 		=> true,        
    ],   
    [
		'name'     		=> 'Classic Editor',
		'slug'     		=> 'classic-editor',
		'required' 		=> false,        
    ],
    [
		'name'     		=> 'Classic Widgets',
		'slug'     		=> 'classic-widgets',
		'required' 		=> false,        
    ], 
	/* 
    [
      'name'     => 'Some Bundled Plugin',
      'slug'     => 'bundled-plugin',       
      'source'   => get_template_directory_uri() . '/bundled-plugins/bundled-plugin.zip',
      'required' => false,
    ],
    [
		'name'        	=> 'CBX Bookmark & Favorite (for apksure)',
		'description' 	=> 'CBX Bookmark & Favorite (for apksure)',
		'slug'        	=> 'cbxwpbookmark', 
		'source'      	=> 'https://www.dropbox.com/scl/fi/ncvy9hg37d2vk05ctuo9t/cbxwpbookmark.zip?rlkey=6r66tqk3tv3w2u7mggtb3kcdt&dl=1',
		'preselected' 	=> true,
		'required' 		=> true, 
    ],
	 */
  ];
 
  // Check if user is on the theme recommeneded plugins step and a demo was selected.
  if ( isset( $_GET['step'] ) && $_GET['step'] === 'import' && isset( $_GET['import'] ) ) {
 
    // Adding one additional plugin for the first demo import ('import' number = 0).
    if ( $_GET['import'] === '1' ) {
      /* 
	  $theme_plugins[] = [
        'name'     => 'Page Builder by SiteOrigin',
        'slug'     => 'siteorigin-panels',
        'required' => true,
      ];
 
      $theme_plugins[] = [
        'name'     => 'SiteOrigin Widgets Bundle',
        'slug'     => 'so-widgets-bundle',
        'required' => true,
      ]; 
	  */
    }
 
    // List of all plugins only used by second demo import [overwrite the list] ('import' number = 1).
    if ( $_GET['import'] === '1' ) {
      /* 
	  $theme_plugins = [
        [
          'name'     => 'Advanced Custom Fields',
          'slug'     => 'advanced-custom-fields',
          'required' => true,
        ],
        [
          'name'     => 'Portfolio Post Type',
          'slug'     => 'portfolio-post-type',
          'required' => false,
        ], 
      ];
	  */
    }
  }
 
  return array_merge( $plugins, $theme_plugins );
}
add_filter( 'ocdi/register_plugins', 'ocdi_register_plugins' );
