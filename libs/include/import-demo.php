<?php  
/*-----------------------------------------------------------------------------------*/
/*  EXTHEM.ES
/*  PREMIUM WORDRESS THEMES
/*
/*  STOP DON'T TRY EDIT
/*  IF YOU DON'T KNOW PHP
/*  AS ERRORS IN YOUR THEMES ARE NOT THE RESPONSIBILITY OF THE DEVELOPERS
/*
/*
/*  @EXTHEM.ES
/*  Follow Social Media Exthem.es
/*  Youtube : https://www.youtube.com/channel/UCpcZNXk6ySLtwRSBN6fVyLA
/*  Facebook : https://www.facebook.com/groups/exthem.es
/*  Twitter : https://twitter.com/ExThemes
/*  Instagram : https://www.instagram.com/exthemescom/
/*	More Premium Themes Visit Now On https://exthem.es/
/*
/*-----------------------------------------------------------------------------------*/  
function ocdi_import_files() {
	return array(
		array(
			'import_file_name'           => 'Default Demo',
			'categories'                 => array( 'Default' ),
			'import_file_url'            => EX_THEMES_URI.'/demo/content.xml',
			'import_widget_file_url'     => EX_THEMES_URI.'/demo/widget.wie', 
			'import_customizer_file_url' => EX_THEMES_URI.'/demo/custom.dat', 
			'import_redux'               => array(
				array(
					'file_url'    => EX_THEMES_URI.'/demo/redux.json', 
					'option_name' => 'opt_themes',
				),
			),
			'import_preview_image_url'   => EX_THEMES_URI.'/screenshot.png',
			'import_notice'              => __( 'before you import this demo, you have to install all required plugins.', TEXT_DOMAIN ),
			'preview_url'                => 'https://plus-ui.demos.web.id',
		), 
	);
}
add_filter( 'ocdi/import_files', 'ocdi_import_files' );

if ( ! function_exists( 'ocdi_after_import' ) ) :
	/**
	 * Set action after import demo data. Plugin require is. https://wordpress.org/plugins/one-click-demo-import/
	 *
	 * @param Array $selected_import Import selected.
	 * @since v.1.0.0
	 * @link https://wordpress.org/plugins/one-click-demo-import/faq/
	 *
	 * @return void
	 */
	function ocdi_after_import( $selected_import ) {
		// Menus to Import and assign - you can remove or add as many as you want.
		$top_menu    = get_term_by( 'name', 'Top menus', 'nav_menu' );
		$second_menu = get_term_by( 'name', 'Second menus', 'nav_menu' );

		set_theme_mod(
			'nav_menu_locations',
			array(
				'primary'   => $top_menu->term_id,
				'secondary' => $second_menu->term_id,
			)
		);

	}
endif;
//add_action( 'pt-ocdi/after_import', 'ocdi_after_import' );

if ( ! function_exists( 'change_time_of_single_ajax_call' ) ) :
	/**
	 * Change ajax call timeout
	 *
	 * @link https://github.com/awesomemotive/one-click-demo-import/blob/master/docs/import-problems.md.
	 */
	function change_time_of_single_ajax_call() {
		return 60;
	}
endif;
//add_action( 'pt-ocdi/time_for_one_ajax_call', 'change_time_of_single_ajax_call' );

// disable generation of smaller images (thumbnails) during the content import.
//add_filter( 'pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false' );

// disable the branding notice.
//add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

