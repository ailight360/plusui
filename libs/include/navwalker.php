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
/*
How to add category post count in main navigation menu
https://wordpress.stackexchange.com/questions/229767/show-posts-count-for-categories-and-tags-in-wp-nav-menu
*/ 
function exthemes_dev_menu_item_count( $output, $item, $depth, $args ) {
    global $opt_themes;
    if( $item->type == 'taxonomy' ) {
        $object                 = get_term($item->object_id, $item->object);
        if($object->count > 0) {
            $output_new         = '';
            $output_split       = str_split($output, strpos($output, '</a>') );
             
            $output_new         .= $output_split[0] . " (".$object->count.") " . $output_split[1];
             
            $output             = $output_new;
        }
    }
    return $output;
}
//add_action( 'walker_nav_menu_start_el', 'exthemes_dev_menu_item_count', 10, 4 );

/*
https://www.kathyisawesome.com/add-custom-fields-to-wordpress-menu-items/

*/
function kia_custom_fields( $item_id, $item ) {
wp_nonce_field( 'custom_menu_meta_nonce', '_custom_menu_meta_nonce_name' );
$custom_menu_meta = get_post_meta( $item_id, '_custom_menu_meta', true );
?>
<div class="field-custom_menu_meta description-wide" >
	    <p class="description"><?php _e( "SVG Icons", THEMES_NAMES ); ?></p> 
	    <div class="logged-input-holder">
	        <textarea class="widefat edit-menu-item-description" name="custom_menu_meta[<?php echo $item_id ;?>]" id="custom-menu-meta-for-<?php echo $item_id ;?>" rows="3" cols="20"  ><?php echo esc_attr( $custom_menu_meta ); ?></textarea>
	        <p><?php _e( 'Add your SVG Icons, Leave empty if you dont wants use', THEMES_NAMES); ?> <br>or you can visit <a href="https://docs.jagodesain.com/2023/01/resources.html" target="_blank">HERE</a> to find svg icons </p>
	    </div>
</div>

<?php
}
add_action( 'wp_nav_menu_item_custom_fields', 'kia_custom_fields', 10, 2 );
/**
* Save the menu item meta
* 
* @param int $menu_id
* @param int $menu_item_db_id	
*/
function kia_nav_update( $menu_id, $menu_item_db_id ) {
	// Verify this came from our screen and with proper authorization.
	if ( ! isset( $_POST['_custom_menu_meta_nonce_name'] ) || ! wp_verify_nonce( $_POST['_custom_menu_meta_nonce_name'], 'custom_menu_meta_nonce' ) ) {
		return $menu_id;
	}
	if ( isset( $_POST['custom_menu_meta'][$menu_item_db_id]  ) ) {
		$sanitized_data =  $_POST['custom_menu_meta'][$menu_item_db_id] ;
		update_post_meta( $menu_item_db_id, '_custom_menu_meta', $sanitized_data );
	} else {
		delete_post_meta( $menu_item_db_id, '_custom_menu_meta' );
	}
}
add_action( 'wp_update_nav_menu_item', 'kia_nav_update', 10, 2 ); 

function kia_custom_menu_title( $title, $item ) {
	if( is_object( $item ) && isset( $item->ID ) ) {
		$custom_menu_meta = get_post_meta( $item->ID, '_custom_menu_meta', true );
		if ( ! empty( $custom_menu_meta ) ) {
			$title .= ' - '.$custom_menu_meta;
		}
	}
	return $title;
}
//add_filter( 'nav_menu_item_title', 'kia_custom_menu_title', 10, 2 );
 
remove_filter( 'nav_menu_description', 'strip_tags' );
function cus_wp_setup_nav_menu_item( $menu_item ) {
     $menu_item->description = apply_filters( 'nav_menu_description', $menu_item->post_content );
     return $menu_item;
}
add_filter( 'wp_setup_nav_menu_item', 'cus_wp_setup_nav_menu_item' ); 

function add_menu_title( $item_output, $item, $depth, $args ) {
    global $MenuTitle, $MenuUrl;
    $MenuTitle  = $item->title;
    $MenuUrl    = $item->url;
    return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'add_menu_title', 10, 4);
  

class menu_walker extends Walker_Nav_menu {
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent     = str_repeat("\t", $depth);
    $submenu    = ($depth > 0) ? ' sub-menu' : '';
    $output     .= "\n$indent<ul>\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0, $idnya = 0)  {
    $this->current_item = $item;
    $indent         = ($depth) ? str_repeat("\t", $depth) : '';
    $li_attributes  = '';
    $class_names    = $value = '';
    $classes        = empty($item->classes) ? array() : (array) $item->classes;

    $classnyas      .= $item->classes[0].' ';
    $classnya       .= !empty($item->classes[0]) ? '  '.esc_attr($classnyas).' ' : '';
    
    $classes[]      = ($args->walker->has_children) ? 'drp ' : '';
    $classes[]      = 'nav-item';
    $classes[]      = 'nav-item-' .$item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[]    = 'dropdown-menu dropdown-menu-end ';
    }

    $class_names    =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names    = ' class="'.esc_attr($class_names).'"';

    $id             = apply_filters('nav_menu_item_id', ''.$item->ID, $item, $args);
    $id             = strlen($id) ? '-'.esc_attr($id).'' : '';
    $idnya          = apply_filters('nav_menu_item_id', $item->ID, $item, $args);
    $idnya          = strlen($idnya) ? ' '.esc_attr($idnya).'' : '';

    $output         .= $indent . '<li '.$value.$class_names.$li_attributes.'>';

    $attributes     = !empty($item->attr_title) ? ' title="'.esc_attr($item->attr_title). '"' : '';
    $attributes     .= !empty($item->target) ? ' target="'.esc_attr($item->target).'"' : '';
    $attributes     .= !empty($item->xfn) ? ' rel="'.esc_attr($item->xfn).'"' : '';
    $attributes     .= !empty($item->url) ? ' href="'.esc_attr($item->url).'"' : '';

    $svg_icons      = !empty(get_post_meta( $item->ID, '_custom_menu_meta', true )) ? '  '. get_post_meta( $item->ID, '_custom_menu_meta', true).' ' : "";

    $active_class   = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    
    $nav_link_class = ( $depth > 0 ) ? '' : 'a ';
    
    $attributes     .= ( $args->walker->has_children ) ? ' ' : ' class="'.$nav_link_class.$active_class.'"';

    $judulnya       .= apply_filters('the_title', $item->title, $item->ID);
    /*
    ".PHP_EOL ." class='a'
    */
    $sebelum .= ( $args->walker->has_children ) ? "".PHP_EOL ."<input class='drpI hidden' id='drpDwn".$id."' name='drpDwn' type='checkbox'>".PHP_EOL ."<label class='a' for='drpDwn".$id."'>".PHP_EOL ."<svg class='line' viewBox='0 0 24 24'><g transform='translate(2.500000, 2.500000)'><line class='svgC' x1='6.6787' x2='12.4937' y1='12.0742685' y2='12.0742685'></line><path d='M-1.13686838e-13,5.29836453 C-1.13686838e-13,2.85645977 1.25,0.75931691 3.622,0.272650243 C5.993,-0.214968804 7.795,-0.0463973758 9.292,0.761221672 C10.79,1.56884072 10.361,2.76122167 11.9,3.63645977 C13.44,4.51265024 15.917,3.19645977 17.535,4.94217405 C19.229,6.7697931 19.2200005,9.57550739 19.2200005,11.3640788 C19.2200005,18.1602693 15.413,18.6993169 9.61,18.6993169 C3.807,18.6993169 -1.13686838e-13,18.2288407 -1.13686838e-13,11.3640788 L-1.13686838e-13,5.29836453 Z'></path></g></svg>".PHP_EOL ."<span class='n'>".$judulnya."</span>".PHP_EOL ."<svg class='line d' viewBox='0 0 24 24'><g transform='translate(5.000000, 8.500000)'><path d='M14,0 C14,0 9.856,7 7,7 C4.145,7 0,0 0,0'></path></g></svg>".PHP_EOL ."</label>" : "";
    
    
    $item_output    = $args->before;
    $item_output    .= $sebelum;
    if(!$args->walker->has_children){
    $item_output    .= '<a '.$attributes.' itemprop="url">'.$svg_icons.'<span itemprop="name">';
    $item_output    .= ( $args->walker->has_children ) ? "" : $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output    .= '</span></a>';
    }
    $item_output    .= $args->after;

    $output         .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}


class menu_header_two extends Walker_Nav_menu{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $judul .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' aria-label="'.$judul.'" data-text="'.$judul.'"' : ' aria-label="'.$judul.'" data-text="'.$judul.'"';

    $item_output = $args->before;
    $item_output .= '<a  class="l" '.$attributes.'>';
    /* $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after; */
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
class menu_sosmed extends Walker_Nav_menu {
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0, $idnya = 0)  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropDown break' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end ';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', '' . $item->ID, $item, $args);
    $id = strlen($id) ? '-' . esc_attr($id) . '' : '';
    $idnya = apply_filters('nav_menu_item_id', $item->ID, $item, $args);
    $idnya = strlen($idnya) ? ' '.esc_attr($idnya).'' : '';

    $output .= $indent . '<li ' . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $svg_icons      = !empty(get_post_meta( $item->ID, '_custom_menu_meta', true )) ? '  ' .  get_post_meta( $item->ID, '_custom_menu_meta', true) . ' ' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? ' ' : ' ';
    $attributes .= ( $args->walker->has_children ) ? ' ' : ' class="'. $nav_link_class . $active_class . '"';

    //$judulnya .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;

    //$sebelum .= ( $args->walker->has_children ) ? "<input class='dropMenu hidden' id='offdropMenu".$id."' name='dropDown' type='checkbox'/><label class='link' for='offdropMenu".$id."'><svg viewBox='0 0 24 24'><path class='c-2' d='M105.28784,265.3372v2.37a5.00181,5.00181,0,0,1-5,5h-10a5.00185,5.00185,0,0,1-5-5v-6a5.00185,5.00185,0,0,1,5-5h.48a3.9739,3.9739,0,0,1,3.34,1.81,3.97247,3.97247,0,0,0,3.34,1.82h2.84A5.00181,5.00181,0,0,1,105.28784,265.3372Z' opacity='0.4' transform='translate(-83.28784 -252.7072)'></path><path class='c-1' d='M98.7535,267.7072a.75542.75542,0,0,1-.75.75H92.56355a.75.75,0,0,1,0-1.5H98.0035A.75546.75546,0,0,1,98.7535,267.7072Z' transform='translate(-83.28784 -252.7072)'></path></svg><span class='name'>".$judulnya."</span><svg class='line drop' viewBox='0 0 24 24'><polyline points='6 9 12 15 18 9'></polyline></svg></label>" : ' ';
    
    
    $item_output = $args->before; 
    //$item_output .= ( $args->walker->has_children ) ? "" : $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '<a aria-label="'.apply_filters('the_title', $item->title, $item->ID).'" '.$attributes.' ><span class="a tIc bIc">'.$svg_icons;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
class menu_footer extends Walker_Nav_menu{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $judul .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? '' : '';

    $item_output = $args->before;
    $item_output .= '<a'.$attributes.'><svg class=\'line\' viewBox=\'0 0 24 24\'><g><path d=\'M19.75 11.7257L4.75 11.7257\'></path><path d=\'M13.7002 5.70131L19.7502 11.7253L13.7002 17.7503\'></path></g></svg><span>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</span></a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}
