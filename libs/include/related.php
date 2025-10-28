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



function relatedposts($postType = 'post' ) {
	ini_set('display_errors', 'off');
	global $post, $related_posts_custom_query_args, $opt_themes;    
    $activate       = $opt_themes['related_post_on'];
    $numbers        = 6; 
    if($activate){
	if (null === $postID) $postID = $post->ID;
	if (null === $totalPosts) $totalPosts = $numbers;
	if (null === $relatedBy) $relatedBy = 'category';
	if (null === $postType) $postType = 'post';
    
	if ($relatedBy === 'category') {
		$categories     = get_the_category( $post->ID );
		$catidlist      = '';
		foreach( $categories as $category) {
			$catidlist .= $category->cat_ID . ",";
		}
		$related_posts_custom_query_args = array(
			'post_type'         => $postType,
			'posts_per_page'    => $numbers,
			'post__not_in'      => array($postID),
			'orderby'           => 'rand',
			'cat'               => $catidlist,  
		);
	}
	if ($relatedBy === 'tags') {
		$tags = wp_get_post_tags($postID);
		if ($tags) {
			$tag_ids = array();
			foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			$related_posts_custom_query_args = array(
				'post_type'         => $postType,
				'tag__in'           => $tag_ids,
				'posts_per_page'    => $numbers,
				'post__not_in'      => array($postID),
				'orderby'           => 'rand',
			);
		} else {
			$related_posts_custom_query_args = array(
				'post_type'         => $postType,
				'posts_per_page'    => $numbers,
				'post__not_in'      => array($postID),
				'orderby'           => 'rand',
			);
		}
	}
	$custom_query = new WP_Query( $related_posts_custom_query_args );
    if ( $custom_query->have_posts() ) {
    ?>	 
	
	<div id="rPst">
	<div class="rPst">
	<h2 class="title dt"><?php echo $opt_themes['related_posts_title']; ?></h2>

	<ul class="s-3 scrlH">
	<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); 
	global $wpdb, $post, $opt_themes, $wp_query; 
	$image_id       = get_post_thumbnail_id(); 
	$image_url      = wp_get_attachment_image_src($image_id, 'full', true); 
	$featured_img   = $image_url[0];  
	?>	
	<li>
	<div class="i">
	<div class="pThmb">
	<a class="thmb" aria-label="<?php the_title(); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><div style="background-image: url(<?php if (has_post_thumbnail()) { ?><?php echo $featured_img; ?><?php } else { ?>data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=<?php } ?>)"></div></a>
	</div>
	<div class="iTtl aTtl">
	<a href="<?php the_permalink(); ?>" data-date="<?php echo get_the_date(); ?>" data-text="Read more"><?php the_title(); ?></a>
	</div>
	</div>
	</li>
	<?php endwhile; ?>
	</ul>
	
	</div>
	</div>
    <?php
    }
	wp_reset_postdata();
} }
add_shortcode('rel_post', 'relatedposts');


function inline_related_post_shortcode($atts){
	ini_set('display_errors', 'off');
	global $wpdb, $post, $opt_themes;	  
    extract(shortcode_atts(array(
        'bacajuga'		=> $opt_themes['inrelpost_title'],
        'openul'		=> '',
    ), $atts));
	
    $return_string		.= "<div class=\"note\" style=\"clear:both; margin-top:0em; margin-bottom:1em;\">";  
    //$return_string		.= $bacajuga;    
    //$return_string		.= '<ul>';  
	$categories			= get_the_category($post->ID); 
	$category_ids		= array();
	foreach($categories as $individual_category) 
	$category_ids[]		= $individual_category->term_id;
		$recommended_args  = array(
		//'tag'						=> $tags->slug,
		'orderby'					=> 'rand',
		'category__in'				=> $category_ids,
		'post__not_in'				=> array($post->ID),
		'posts_per_page'			=> 1, 
		'caller_get_posts'			=> 0
		);
	$inpost1			 = new WP_Query( $recommended_args );
	if( $inpost1->have_posts() ) {
	while ($inpost1->have_posts()) : $inpost1->the_post();
	$return_string		.= ''.$bacajuga.' <a href="'.get_permalink().'" title="'.get_the_title().'" >'.get_the_title().'</a>
	';
	endwhile; } 
	wp_reset_query();
    //$return_string		.= '</ul>';
    $return_string		.= '</div>'; 
    return $return_string;
}
add_shortcode( 'inline_related_post', 'inline_related_post_shortcode' ); 
// ~~~~~~~~~~~~~~~~~~~~~  @EXTHEM.ES  ~~~~~~~~~~~~~~~~~~~~~~~~ \\
add_filter('the_content', 'inline_rel_post');
function inline_rel_post($content) {
	global $opt_themes;
    if (!is_single()) return $content;
	if ($opt_themes['inrelpost_on']){
    $tent			= get_the_content();
    $content		= explode("</p>", $content);
    $ss				= count($content);
    $ns				= $ss-mt_rand(3,6);   
    $new_content	= '';
	
    for ($i = 0; $i < count($content); $i++) {
         if ($i == $ns ) {
            $new_content.= '[inline_related_post]';
        }
        $new_content.= $content[$i] . "</p>";
    }
    return $new_content; 
	} else {
	return $content;
	}
}

