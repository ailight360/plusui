<?php
/* 
Template Name: Template - About
*/
 
get_header();
global $opt_themes, $post, $wpdb, $wp_query, $the_query, $current_user; 
wp_get_current_user();
$domainx			= get_bloginfo('url'); 
$parse				= parse_url($domainx); 
$domains			= $parse['host'];   
$userId             = $current_user->ID;
$username			= $current_user->user_login;
$first_name			= $current_user->first_name;
$last_name			= $current_user->last_name;
$display_name		= $current_user->display_name;
$roles				= $current_user->roles;
$user_email			= $current_user->user_email;
$description		= $current_user->description;
$avatars			= get_avatar( $current_user->user_email );
$avatars_urls		= get_avatar_url( $current_user->user_email );
$location			= $current_user->locations;
$twitter			= $current_user->twitter;
$facebook			= $current_user->facebook;
$linkedin			= $current_user->linkedin;
$instagram			= $current_user->instagram;
$skype				= $current_user->skype;
$telegram			= $current_user->telegram;
$pinterest			= $current_user->pinterest;
$youtube			= $current_user->youtube; 
$author_urls		= esc_url( get_author_posts_url( get_the_author_meta( $userId ) ) );
$authorurl			= get_author_posts_url( $userId );
$total_posts		= count_user_posts( $current_user->post_author, 'post', false ); 
$comments_count		= wp_count_comments(); 


$where = 'WHERE comment_approved = 1 AND user_id = ' . $userId ;
$comment_count = $wpdb->get_var("SELECT COUNT( * ) AS total 
                                 FROM {$wpdb->comments}
                                 {$where}");
                                 
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/about.css" />  

<!--[ Main content ]-->
<main class='blogItm mainbar ' style="width: 100%;">
    <div class="section" id="main-widget">
      <div class="widget Blog" id="Blog<?php echo get_the_ID(); ?>">
        <div class="blogPts">
          <article class="ntry ps post">
         <div class="brdCmb" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">
<div class="hm" itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item"><span itemprop="name"><?php echo $opt_themes['opts_title_other_1']; ?></span></a>
<meta content="1" itemprop="position">
</div>
<div class="tl" data-text="<?php the_title(); ?>"></div>
</div>
<h1 class="pTtl aTtl sml itm"><span><?php the_title(); ?></span></h1>
<?php if ( is_user_logged_in() ) { if(current_user_can('editor') || current_user_can('administrator')){  ?>
<a class="qeBtn a" href="<?php echo get_edit_post_link(); ?>" rel="nofollow noopener noreferrer" target="_blank" title="Edit post"><svg class="line" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path class="svgC" d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
<?php }} ?>
    
<div class="pInr">
<div class="pEnt" id=" ">
<div class="pS post-body postBody" id="postBody">
     
    
<!--[ About Author ]-->
<div class="aboutAuthor">
  <div class="aboutCont">
    <!--[ Author Profile Picture, Recommended Sizes: 1280&#215;1280px, 720&#215;720px below 30KB for fast loading, use transparent picture ]-->
    
    <?php if( have_posts() ) : while( have_posts() ) : the_post(); 
    $post_id			= get_the_ID();
    $no_images_links	= $opt_themes['no_images']['url'];
    $image_id_alt		= get_post_thumbnail_id($post->ID);
    $image_idx			= get_post_thumbnail_id();
    $fullx				= 'full';
    $image_urlx			= wp_get_attachment_image_src($image_idx, $fullx, true);
    $imagex				= $image_urlx[0];
    if( get_the_content() ) { ?>	
    <img alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" src="<?php if (has_post_thumbnail()) { echo $imagex; } else { echo EX_THEMES_URI?>/assets/img/favicon.ico<?php } ?>">
    <?php the_content();?>
    <?php } else { ?>   
    <img alt="<?php echo get_bloginfo( 'name' ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>" src="<?php echo EX_THEMES_URI?>/assets/img/favicon.ico">
    <!--[ Author Description ]-->
    <p><?php echo get_bloginfo( 'description' ); ?></p>   
    <?php if ( is_user_logged_in() ) { if(!current_user_can('administrator')){ ?> 
    <p><?php echo get_bloginfo( 'description' ); ?></p>    
    <?php }} if ( is_user_logged_in() ) { if( current_user_can('administrator')){  ?> 
    <p><span  style="font-weight: bold;">Copy this and Add Your Description for Contents</span>
<textarea id="w3review" name="w3review" rows="5" cols="65"><!-- edit with your descriptions and upload your featured image for logo -->
<p>Please Changes Me.... bro</p>	

<div class="athrBtn">
<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" target="_blank">
<!--[ Button SVG ]-->
<svg class="line" viewBox="0 0 24 24"><g transform="translate(5.000000, 2.400000)"><path d="M6.84454545,19.261909 C3.15272727,19.261909 -8.52651283e-14,18.6874153 -8.52651283e-14,16.3866334 C-8.52651283e-14,14.0858516 3.13272727,11.961909 6.84454545,11.961909 C10.5363636,11.961909 13.6890909,14.0652671 13.6890909,16.366049 C13.6890909,18.6658952 10.5563636,19.261909 6.84454545,19.261909 Z"></path><path d="M6.83729838,8.77363636 C9.26002565,8.77363636 11.223662,6.81 11.223662,4.38727273 C11.223662,1.96454545 9.26002565,-1.0658141e-14 6.83729838,-1.0658141e-14 C4.41457111,-1.0658141e-14 2.45,1.96454545 2.45,4.38727273 C2.44184383,6.80181818 4.39184383,8.76545455 6.80638929,8.77363636 C6.81729838,8.77363636 6.82729838,8.77363636 6.83729838,8.77363636 Z"></path></g></svg>
<!--[ Button Text ]-->
Author Profile 
</a>
</div>
</textarea>
    </p>	
    <?php }}} ?>
    <?php endwhile; ?>			
    <?php endif; ?>
    
  </div>
</div>

<h3 class="statsHeading">
  <!--[ Stats Heading ]-->
  Blog Stats
</h3>

<!--[ Website Statistics ]-->
<div class="statsWebsite">
  <!--[ Page Views Count ]-->
  <div class="statsCont hidden" >
    <div class="stats">
      <div class="statsName">
        <!--[ Change SVG Icon ]-->
        <svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 4.000000)"><path d="M13.1643,8.0521 C13.1643,9.7981 11.7483,11.2141 10.0023,11.2141 C8.2563,11.2141 6.8403,9.7981 6.8403,8.0521 C6.8403,6.3051 8.2563,4.8901 10.0023,4.8901 C11.7483,4.8901 13.1643,6.3051 13.1643,8.0521 Z"></path><path d="M0.7503,8.0521 C0.7503,11.3321 4.8923,15.3541 10.0023,15.3541 C15.1113,15.3541 19.2543,11.3351 19.2543,8.0521 C19.2543,4.7691 15.1113,0.7501 10.0023,0.7501 C4.8923,0.7501 0.7503,4.7721 0.7503,8.0521 Z"></path></g></svg>
        <!--[ Stats Name ]-->
        Total Visits
      </div>
      <div class="statsNumber v">
        <!--[ Posts Number (automatically updates) ]-->
        <span class="pu-views" data-id="WebsiteStats" data-text="171.89K"></span>
      </div>
    </div>
  </div>
  
  <!--[ Posts Number ]-->
  <div class="statsCont">
    <div class="stats">
      <div class="statsName">
        <!--[ Change SVG Icon ]-->
        <svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 2.000000)"><path d="M10.0002,0.7501 C3.0632,0.7501 0.7502,3.0631 0.7502,10.0001 C0.7502,16.9371 3.0632,19.2501 10.0002,19.2501 C16.9372,19.2501 19.2502,16.9371 19.2502,10.0001"></path><path d="M17.5285,2.3038 L17.5285,2.3038 C16.5355,1.4248 15.0185,1.5168 14.1395,2.5098 C14.1395,2.5098 9.7705,7.4448 8.2555,9.1578 C6.7385,10.8698 7.8505,13.2348 7.8505,13.2348 C7.8505,13.2348 10.3545,14.0278 11.8485,12.3398 C13.3435,10.6518 17.7345,5.6928 17.7345,5.6928 C18.6135,4.6998 18.5205,3.1828 17.5285,2.3038 Z"></path><line x1="13.009" y1="3.8008" x2="16.604" y2="6.9838"></line></g></svg>
        <!--[ Stats Name ]-->
        Posts
      </div>
      <div class="statsNumber p"><span><?php echo wp_count_posts()->publish; ?></span></div>
    </div>
  </div>
 
  <!--[ Comments Number ]-->
  <div class="statsCont">
    <div class="stats">
      <div class="statsName">
        <!--[ Change SVG Icon ]-->
        <svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 2.000000)"><line x1="13.9394" y1="10.413" x2="13.9484" y2="10.413"></line><line x1="9.9304" y1="10.413" x2="9.9394" y2="10.413"></line><line x1="5.9214" y1="10.413" x2="5.9304" y2="10.413"></line><path d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path></g></svg>
        <!--[ Stats Name ]-->
        Comments 
      </div>
      <div class="statsNumber c"><span><?php echo do_shortcode( '[total_komentar]' ); ?></span></div>
    </div>
  </div>
</div>
<div id="aChp"></div>
</div>
 
		
</div>
 
</div>
</article>


</div>
</div>
</div>
</main>
 
<?php  
get_footer(); 