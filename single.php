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
get_header();  
global $opt_themes, $post;
$post_id			= get_the_ID();
$no_images_links	= $opt_themes['no_images']['url'];
$image_id_alt		= get_post_thumbnail_id($post->ID);
$image_idx			= get_post_thumbnail_id();
$fullx				= 'full';
$image_urlx			= wp_get_attachment_image_src($image_idx, $fullx, true);
$imagex				= $image_urlx[0];
 
$domainx			= get_bloginfo('url'); 
$parse				= parse_url($domainx); 
$domains			= $parse['host'];
$user_info			= get_userdata($post->post_author);
$username			= $user_info->user_login;
$first_name			= $user_info->first_name;
$last_name			= $user_info->last_name;
$display_name		= $user_info->display_name;
$roles				= $user_info->roles;
$user_email			= $user_info->user_email;
$description		= $user_info->description;
$avatars			= get_avatar( $user_info->user_email );
$avatars_urls		= get_avatar_url( $user_info->user_email );
$authorurl			= get_author_posts_url( $post->post_author );
$location			= $user_info->locations;
$twitter			= $user_info->twitter;
$facebook			= $user_info->facebook;
$linkedin			= $user_info->linkedin;
$instagram			= $user_info->instagram;
$skype				= $user_info->skype;
$telegram			= $user_info->telegram;
$pinterest			= $user_info->pinterest;
$youtube			= $user_info->youtube;

$datePublished		= mysql2date( DATE_W3C, $post->post_date_gmt, false );
$dateModified		= mysql2date( DATE_W3C, $post->post_modified_gmt, false );
$blogname           = get_option("blogname");
$siteurls           = get_option("siteurl");
$blogemail          = get_option("admin_email");
$blogdesc           = get_option("blogdescription");
$sitelangs          = get_bloginfo("language");
$paged              = (get_query_var('paged')) ? get_query_var('paged') : 1;
$desc_blog_post     = trim(strip_tags( get_post()->post_content ));
 
$des_post           = preg_replace('~[\r\n]+~', '', $desc_blog_post);
$des_post           = str_replace('"', '', $des_post);
$des_post           = mb_substr( $des_post, 0, 200, 'utf8' );

global $wpdb, $post, $wp_query, $opt_themes;
/* $post_id			= get_the_ID();
$url				= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$thumb_id			= get_post_thumbnail_id(get_the_ID());
if ( '' != $thumb_id ) {
$thumb_url			= wp_get_attachment_image_src( $thumb_id, 'full', true );
$images				= $thumb_url[0];
} elseif ( $images == $images ) {
$images				= catch_that_image();
}  */
?>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/post.css" />

<script type="application/ld+json">{"@context": "http://schema.org", "@type": "BlogPosting", "mainEntityOfPage": {"@type": "WebPage", "@id": "<?php echo urlencode(get_permalink()); ?>"}, "headline": "<?php the_title(); ?>", "description": "<?php echo $des_post; ?>", "articleBody": "contoh doang ji bro", "datePublished": "<?php echo $datePublished; ?>", "dateModified": "<?php echo $dateModified; ?>", "image": {"@type": "ImageObject", "url": "<?php echo $imagex; ?>", "height": <?php echo $image_urlx[2]; ?>, "width": <?php echo $image_urlx[1]; ?>},"publisher": {"@type": "Organization", "name": "<?php echo $blogname; ?>", "logo": {"@type": "ImageObject", "url": "<?php echo $imagex; ?>", "width": <?php echo $image_urlx[1]; ?>, "height": <?php echo $image_urlx[2]; ?>}}, "author": { "@type": "Person", "name": "<?php echo $display_name; ?>", "url": "<?php echo $authorurl; ?>", "image": "<?php echo $avatars_urls; ?>"}}</script>
 
<main class="blogItm mainbar">
<div class="section" id="main-widget">

<?php
if($opt_themes['slot_3_on']){
?>  
<div class='widget HTML' >
<div class='widget-content'>
<?php echo $opt_themes['slot_3']; ?>
</div>
</div> 
<?php } ?>

<div class="widget Blog" id="Blog<?php echo get_the_ID(); ?> post-view-<?php set_view_post(); echo get_view_post_alt(); ?>">
<div class="blogPts">
<article class="ntry ps post">
<div class="pGV">
<span class="pGrt<?php if(!$opt_themes['post_greeting']){?> hidden<?php } ?>" data-text="" id="greetings">
<svg viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" fill-rule="evenodd"></path><path class="svgC" d="M4.285 9.567a.5.5 0 0 1 .683.183A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .183-.683z"></path><path class="svgC" d="M7 6.5C7 7.328 6.552 8 6 8s-1-.672-1-1.5S5.448 5 6 5s1 .672 1 1.5zm4 0c0 .828-.448 1.5-1 1.5s-1-.672-1-1.5S9.448 5 10 5s1 .672 1 1.5z"></path></svg>
</span>
<span class="pVws pu-views<?php if(!$opt_themes['post_read_view']){?> hidden<?php } ?>" data-add="true" data-id="<?php echo get_the_ID(); ?>" data-text="<?php echo format_numbers(get_view_post_alt()); ?>">
<svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 4.000000)"><path class="svgC" d="M13.1643,8.0521 C13.1643,9.7981 11.7483,11.2141 10.0023,11.2141 C8.2563,11.2141 6.8403,9.7981 6.8403,8.0521 C6.8403,6.3051 8.2563,4.8901 10.0023,4.8901 C11.7483,4.8901 13.1643,6.3051 13.1643,8.0521 Z"></path><path d="M0.7503,8.0521 C0.7503,11.3321 4.8923,15.3541 10.0023,15.3541 C15.1113,15.3541 19.2543,11.3351 19.2543,8.0521 C19.2543,4.7691 15.1113,0.7501 10.0023,0.7501 C4.8923,0.7501 0.7503,4.7721 0.7503,8.0521 Z"></path></g></svg>
</span>
</div>

<script>  
/*<![CDATA[*/
var greetElem = document.querySelector("#greetings"); 
var curHr = new Date().getHours(); 
var greetMes = [
"<?php echo $opt_themes['opt_greeting_1']; ?>", 
"<?php echo $opt_themes['opt_greeting_2']; ?>", 
"<?php echo $opt_themes['opt_greeting_3']; ?>",  
"<?php echo $opt_themes['opt_greeting_4']; ?>",  
"<?php echo $opt_themes['opt_greeting_5']; ?>",  
"<?php echo $opt_themes['opt_greeting_6']; ?>",
]; 
let greetText = ""; if (curHr < 4) greetText = greetMes[0]; 
else if (curHr < 10) greetText = greetMes[1]; 
else if (curHr < 16) greetText = greetMes[2]; 
else if (curHr < 18) greetText = greetMes[3]; 
else if (curHr < 22) greetText = greetMes[4]; 
else greetText = greetMes[5]; 
greetElem.setAttribute('data-text', greetText);
/*]]>*/
</script> 

<div class="brdCmb" itemscope="itemscope" itemtype="https://schema.org/BreadcrumbList">

<div class="hm" itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem">
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="item"><span itemprop="name"><?php echo $opt_themes['opts_title_other_1']; ?></span></a>
<meta content="1" itemprop="position">
</div> 

<?php $nb = 2; $x = 0; foreach((get_the_category()) as $cat) { echo '<div class="lb" itemprop="itemListElement" itemscope="itemscope" itemtype="https://schema.org/ListItem"><a itemprop="item" href="'.get_category_link($cat->cat_ID).'" ><span itemprop="name">'.$cat->cat_name.'</span></a><meta itemprop="position" content="'.$nb.'"></div>'; if (++$x == 2) break; $nb++;} ?>

</div>

<h1 class="pTtl aTtl sml itm"><span><?php the_title(); ?></span></h1>

<div class="pInf pSml ps">
<div class="pIm">
<div class='im' style="background-image: url(<?php echo $avatars_urls; ?>)">
</div> 
</div>
<div class="pNm">
<span class="nm" data-text="<?php echo $display_name; ?>" data-write="<?php _e('Posted by', TEXT_DOMAIN); ?>">
</span>
<div class="pDr">
<bdi class="pDt pIn">
<time class="aTtmp pTtmp pbl" data-text="<?php echo get_the_date(); ?>" data-time="<?php echo get_the_date(); ?>" datetime="<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>" title="Published: <?php echo get_the_date(); ?>"></time>
</bdi>

<div class="pRd pIn<?php if(!$opt_themes['post_read_time']){?> hidden<?php } ?>"><bdi id="rdTime"></bdi></div>
</div>
</div>
<div class="pCm l">
<div class="pIc">
<label aria-label="<?php echo $opt_themes['opts_title_other_20']; ?>" bm-id="<?php echo get_the_ID(); ?>" bm-img="<?php if (has_post_thumbnail()) { ?><?php echo $imagex; ?><?php } ?>" bm-ttl="<?php the_title(); ?>" bm-url="<?php the_permalink(); ?>" class="bmPs tIc<?php if(!$opt_themes['bookmark_on']){ ?> hidden<?php } ?>" data-added="<?php echo $opt_themes['opts_title_other_21']; ?>">
<svg class="line" viewBox="0 0 24 24"><g transform="translate(4.500000, 2.500000)"><path d="M7.47024319,0 C1.08324319,0 0.00424318741,0.932 0.00424318741,8.429 C0.00424318741,16.822 -0.152756813,19 1.44324319,19 C3.03824319,19 5.64324319,15.316 7.47024319,15.316 C9.29724319,15.316 11.9022432,19 13.4972432,19 C15.0932432,19 14.9362432,16.822 14.9362432,8.429 C14.9362432,0.932 13.8572432,0 7.47024319,0 Z"></path><line class="svgC v" transform="translate(-4.500000, -2.500000)" x1="12" x2="12" y1="6" y2="12"></line><line class="svgC h" transform="translate(-4.500000, -2.500000)" x1="15" x2="9" y1="9" y2="9"></line></g></svg>
</label>

<?php if(get_comments_number()) { ?>
<label class="cmnt tIc" data-text="<?php echo comments_number('0', '1', '%'); ?>" for="forComments">
<svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 2.000000)"><path d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path></g></svg>
</label>
<?php } ?>
<label class="sh tIc" for="forShare">
<svg class="line" viewBox="0 0 24 24"><path d="M16.44 8.8999C20.04 9.2099 21.51 11.0599 21.51 15.1099V15.2399C21.51 19.7099 19.72 21.4999 15.25 21.4999H8.73998C4.26998 21.4999 2.47998 19.7099 2.47998 15.2399V15.1099C2.47998 11.0899 3.92998 9.2399 7.46998 8.9099"></path><path class="svgC" d="M12 15.0001V3.62012"></path><path class="svgC" d="M15.35 5.85L12 2.5L8.65002 5.85"></path></svg>
</label>
</div>
</div>
</div>

<div class="pInr">
<div class="pAd">
</div>
<div class="pEnt" id="postID-<?php echo get_the_ID(); ?>">
<div class="pS post-body postBody" id="postBody">

    <?php if (has_post_thumbnail()) { ?>
    <div class="separator" style="clear: both;">
    <div class="zmImg">
    <img alt="<?php the_title(); ?>" src="<?php the_post_thumbnail_url('full'); ?>">
    </div>
    </div>
    <?php } 
    if( have_posts() ) { 
    while( have_posts() ) { the_post();
    if($opt_themes['toc_on']){
    echo do_shortcode( '[TOC]' );
    }
    the_content();
    }}
    ?>
 
    <div id="aChp"<?php if(!$opt_themes['post_next_prev']){?> class="hidden"<?php } ?>>
    <div class="chpN">
    <?php
    $nextPost		= get_next_post();
    $nextthumbnail	= get_the_post_thumbnail($nextPost); 					
    $tilesnextPost	= get_the_title( $nextPost );
    $urlnextPost	= get_permalink( $nextPost );
					
    $prevPost		= get_previous_post();
    $prevthumbnail	= get_the_post_thumbnail($prevPost);					
    $tilesprevPost	= get_the_title( $prevPost );
    $urlprevPost	= get_permalink( $prevPost);
    if ($prevPost){ ?>				
    <a href="<?php echo $urlprevPost; ?>" data-text="<?php echo $tilesprevPost; ?>"></a>
    <?php } if ($nextPost){ ?>	
    <a href="<?php echo $urlnextPost; ?>" data-text="<?php echo $tilesnextPost; ?>"></a>
    <?php } ?>
    </div>
    </div>
</div>
</div>
<?php if ( is_user_logged_in() ) { if(current_user_can('editor') || current_user_can('administrator')){  ?>
<div class="blog-admins qEdit" id="qEdit">
<input class="qeMn hidden" id="offqeMn" type="checkbox">
<label class="qeBtn" for="offqeMn"><svg class="line svg-1" viewBox="0 0 24 24"><g transform="translate(3.500000, 2.500000)"><path class="svgC" d="M8.5,7 C9.88088012,7 11,8.11911988 11,9.5 C11,10.8808801 9.88088012,12 8.5,12 C7.11911988,12 6,10.8808801 6,9.5 C6,8.11911988 7.11911988,7 8.5,7 Z"></path><path d="M16.6680023,4.75024695 L16.6680023,4.75024695 C15.9844554,3.55799324 14.4712377,3.15003899 13.2885153,3.83852352 C12.2597626,4.43613205 10.9740669,3.68838056 10.9740669,2.49217572 C10.9740669,1.11619444 9.86587758,0 8.4997646,0 L8.4997646,0 C7.13365161,0 6.02546233,1.11619444 6.02546233,2.49217572 C6.02546233,3.68838056 4.73976662,4.43613205 3.71199461,3.83852352 C2.52829154,3.15003899 1.01507378,3.55799324 0.331526939,4.75024695 C-0.351039204,5.94250065 0.053989269,7.46664934 1.23769234,8.15414609 C2.26546435,8.7527424 2.26546435,10.2472576 1.23769234,10.8458539 C0.053989269,11.5343384 -0.351039204,13.0584871 0.331526939,14.2497531 C1.01507378,15.4420068 2.52829154,15.849961 3.71101391,15.1624643 L3.71199461,15.1624643 C4.73976662,14.5638679 6.02546233,15.3116194 6.02546233,16.5078243 L6.02546233,16.5078243 C6.02546233,17.8838056 7.13365161,19 8.4997646,19 L8.4997646,19 C9.86587758,19 10.9740669,17.8838056 10.9740669,16.5078243 L10.9740669,16.5078243 C10.9740669,15.3116194 12.2597626,14.5638679 13.2885153,15.1624643 C14.4712377,15.849961 15.9844554,15.4420068 16.6680023,14.2497531 C17.3515491,13.0584871 16.9455399,11.5343384 15.7628176,10.8458539 L15.7618369,10.8458539 C14.7340648,10.2472576 14.7340648,8.7527424 15.7628176,8.15414609 C16.9455399,7.46664934 17.3515491,5.94250065 16.6680023,4.75024695 Z"></path></g></svg><svg class="svg-2 line" viewBox="0 0 24 24"><line x1="18" x2="6" y1="6" y2="18"></line><line x1="6" x2="18" y1="6" y2="18"></line></svg></label>
<div class="qeBtns">
<a class="qeBtn a" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin" rel="nofollow noopener noreferrer" target="_blank" title="Settings"><svg class="line svg-1" viewBox="0 0 24 24"><g transform="translate(3.500000, 2.500000)"><path class="svgC" d="M8.5,7 C9.88088012,7 11,8.11911988 11,9.5 C11,10.8808801 9.88088012,12 8.5,12 C7.11911988,12 6,10.8808801 6,9.5 C6,8.11911988 7.11911988,7 8.5,7 Z"></path><path d="M16.6680023,4.75024695 L16.6680023,4.75024695 C15.9844554,3.55799324 14.4712377,3.15003899 13.2885153,3.83852352 C12.2597626,4.43613205 10.9740669,3.68838056 10.9740669,2.49217572 C10.9740669,1.11619444 9.86587758,0 8.4997646,0 L8.4997646,0 C7.13365161,0 6.02546233,1.11619444 6.02546233,2.49217572 C6.02546233,3.68838056 4.73976662,4.43613205 3.71199461,3.83852352 C2.52829154,3.15003899 1.01507378,3.55799324 0.331526939,4.75024695 C-0.351039204,5.94250065 0.053989269,7.46664934 1.23769234,8.15414609 C2.26546435,8.7527424 2.26546435,10.2472576 1.23769234,10.8458539 C0.053989269,11.5343384 -0.351039204,13.0584871 0.331526939,14.2497531 C1.01507378,15.4420068 2.52829154,15.849961 3.71101391,15.1624643 L3.71199461,15.1624643 C4.73976662,14.5638679 6.02546233,15.3116194 6.02546233,16.5078243 L6.02546233,16.5078243 C6.02546233,17.8838056 7.13365161,19 8.4997646,19 L8.4997646,19 C9.86587758,19 10.9740669,17.8838056 10.9740669,16.5078243 L10.9740669,16.5078243 C10.9740669,15.3116194 12.2597626,14.5638679 13.2885153,15.1624643 C14.4712377,15.849961 15.9844554,15.4420068 16.6680023,14.2497531 C17.3515491,13.0584871 16.9455399,11.5343384 15.7628176,10.8458539 L15.7618369,10.8458539 C14.7340648,10.2472576 14.7340648,8.7527424 15.7628176,8.15414609 C16.9455399,7.46664934 17.3515491,5.94250065 16.6680023,4.75024695 Z"></path></g></svg></a>
<a class="qeBtn a" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin/edit-comments.php" rel="nofollow noopener noreferrer" target="_blank" title="Comments"><svg class="line" viewBox="0 0 24 24"><g transform="translate(2.000000, 2.000000)"><line class="svgC" x1="13.9394" x2="13.9484" y1="10.413" y2="10.413"></line><line class="svgC" x1="9.9304" x2="9.9394" y1="10.413" y2="10.413"></line><line class="svgC" x1="5.9214" x2="5.9304" y1="10.413" y2="10.413"></line><path d="M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z"></path></g></svg></a>
<a class="qeBtn a" href="<?php echo esc_url( home_url( '/' ) ); ?>wp-admin" rel="nofollow noopener noreferrer" target="_blank" title="Dashboard"><svg class="line" viewBox="0 0 24 24"><line x1="8" x2="21" y1="6" y2="6"></line><line x1="8" x2="21" y1="12" y2="12"></line><line x1="8" x2="21" y1="18" y2="18"></line><line class="svgC" x1="3" x2="3.01" y1="6" y2="6"></line><line class="svgC" x1="3" x2="3.01" y1="12" y2="12"></line><line class="svgC" x1="3" x2="3.01" y1="18" y2="18"></line></svg></a>
<a class="qeBtn a" href="<?php echo get_edit_post_link(); ?>" rel="nofollow noopener noreferrer" target="_blank" title="Edit post"><svg class="line" viewBox="0 0 24 24"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path class="svgC" d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a></div><label class="fCls" for="offqeMn"></label>
</div>
<?php }} ?>
<div class="pAd"></div>

<script>/*<![CDATA[*/ function get_text(el) {ret = ''; var length = el.childNodes.length; for(var i = 0; i < length; i++) {var node = el.childNodes[i]; if(node.nodeType != 8) {ret += node.nodeType != 1 ? node.nodeValue : get_text(node);} } return ret;} var words = get_text(document.getElementById('postBody')); var count = words.split(' ').length; var avg = 200; var counted = count / avg; var maincount = Math.round(counted); document.getElementById('rdTime').innerHTML = '<?php echo $opt_themes['opt_read_time']; ?> ' + maincount + ' <?php echo $opt_themes['opt_read_time_mins']; ?>'; /*]]>*/</script>

<?php
if($opt_themes['slot_4_on']){
?>  
<div class='widget HTML' >
<div class='widget-content'>
<?php echo $opt_themes['slot_4']; ?>
</div>
</div> 
<?php } ?>
<div class="admAbt">
<h2 class="title dt"><?php echo $opt_themes['opt_title_others_1']; ?></h2>
<div class="admPs">
<div class="admIm">
<div class="im lazy" data-style="background-image: url(<?php echo $avatars_urls; ?>)">
</div>
</div>
<div class="admI">
<bdi class="admN" data-text="<?php echo $display_name; ?>" data-write="<?php _e('Posted by', TEXT_DOMAIN); ?>"></bdi>
<div class="admA">
<?php echo $description; ?>
</div>
</div>
</div>
</div>

<div class="pSh">
<div class="lbHt">
<?php 
    foreach((get_the_category()) as $cat) {
    echo '<a aria-label="'.$cat->cat_name.'" href="'.get_category_link($cat->cat_ID).'">#'.$cat->cat_name.'</a>'; 
    }
    $posttags = get_the_tags();
    if ($posttags) {
    foreach($posttags as $tag) {
    echo '<a aria-label="'.$tag->cat_name.'" href="'.get_tag_link($tag->term_id).'" title="Tag '.$tag->name.'">#'.$tag->name.'</a>';
    }
    }
    ?>     
</div>

<?php
global $wpdb, $post, $wp_query, $opt_themes;
$post_id			= get_the_ID();
$url				= wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
$thumb_id			= get_post_thumbnail_id(get_the_ID());
if ( '' != $thumb_id ) {
$thumb_url			= wp_get_attachment_image_src( $thumb_id, 'full', true );
$images				= $thumb_url[0];
} elseif ( $images == $images ) {
$images				= catch_that_image();
}   
?>

<div class="pShc" data-text="<?php echo $opt_themes['opt_title_share_1']; ?>">
<a aria-label="Facebook" class="c fb" data-text="Share" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" rel="noopener" role="button" target="_blank">
<svg viewBox="0 0 64 64"><path d="M20.1,36h3.4c0.3,0,0.6,0.3,0.6,0.6V58c0,1.1,0.9,2,2,2h7.8c1.1,0,2-0.9,2-2V36.6c0-0.3,0.3-0.6,0.6-0.6h5.6 c1,0,1.9-0.7,2-1.7l1.3-7.8c0.2-1.2-0.8-2.4-2-2.4h-6.6c-0.5,0-0.9-0.4-0.9-0.9v-5c0-1.3,0.7-2,2-2h5.9c1.1,0,2-0.9,2-2V6.2 c0-1.1-0.9-2-2-2h-7.1c-13,0-12.7,10.5-12.7,12v7.3c0,0.3-0.3,0.6-0.6,0.6h-3.4c-1.1,0-2,0.9-2,2v7.8C18.1,35.1,19,36,20.1,36z"></path></svg>
</a>
<a aria-label="Whatsapp" class="c wa" data-text="Share" href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" rel="noopener" role="button" target="_blank">
<svg viewBox="0 0 64 64"><path d="M6.9,48.4c-0.4,1.5-0.8,3.3-1.3,5.2c-0.7,2.9,1.9,5.6,4.8,4.8l5.1-1.3c1.7-0.4,3.5-0.2,5.1,0.5 c4.7,2.1,10,3,15.6,2.1c12.3-1.9,22-11.9,23.5-24.2C62,17.3,46.7,2,28.5,4.2C16.2,5.7,6.2,15.5,4.3,27.8c-0.8,5.6,0,10.9,2.1,15.6 C7.1,44.9,7.3,46.7,6.9,48.4z M21.3,19.8c0.6-0.5,1.4-0.9,1.8-0.9s2.3-0.2,2.9,1.2c0.6,1.4,2,4.7,2.1,5.1c0.2,0.3,0.3,0.7,0.1,1.2 c-0.2,0.5-0.3,0.7-0.7,1.1c-0.3,0.4-0.7,0.9-1,1.2c-0.3,0.3-0.7,0.7-0.3,1.4c0.4,0.7,1.8,2.9,3.8,4.7c2.6,2.3,4.9,3,5.5,3.4 c0.7,0.3,1.1,0.3,1.5-0.2c0.4-0.5,1.7-2,2.2-2.7c0.5-0.7,0.9-0.6,1.6-0.3c0.6,0.2,4,1.9,4.7,2.2c0.7,0.3,1.1,0.5,1.3,0.8 c0.2,0.3,0.2,1.7-0.4,3.2c-0.6,1.6-2.1,3.1-3.2,3.5c-1.3,0.5-2.8,0.7-9.3-1.9c-7-2.8-11.8-9.8-12.1-10.3c-0.3-0.5-2.8-3.7-2.8-7.1 C18.9,22.1,20.7,20.4,21.3,19.8z"></path></svg>
</a>
<a aria-label="Twitter" class="c x" data-text="Tweet" href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>" rel="noopener" role="button" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve"><path d="M14.095479,10.316482L22.286354,1h-1.940718l-7.115352,8.087682L7.551414,1H1l8.589488,12.231093L1,23h1.940717  l7.509372-8.542861L16.448587,23H23L14.095479,10.316482z M11.436522,13.338465l-0.871624-1.218704l-6.924311-9.68815h2.981339  l5.58978,7.82155l0.867949,1.218704l7.26506,10.166271h-2.981339L11.436522,13.338465z"/></svg>
</a>
<label aria-label="<?php echo $opt_themes['opt_title_share_2']; ?>" for="forShare">
<svg viewBox="0 0 512 512"><path d="M417.4,224H288V94.6c0-16.9-14.3-30.6-32-30.6c-17.7,0-32,13.7-32,30.6V224H94.6C77.7,224,64,238.3,64,256 c0,17.7,13.7,32,30.6,32H224v129.4c0,16.9,14.3,30.6,32,30.6c17.7,0,32-13.7,32-30.6V288h129.4c16.9,0,30.6-14.3,30.6-32 C448,238.3,434.3,224,417.4,224z"></path></svg>
</label>
</div>
</div>
</div>
</article>
<div class="pFoot">
<input class="shIn fixi hidden" id="forShare" type="checkbox">
<div class="shBr fixL">
<div class="shBri fixLi">
<div class="shBrs fixLs">
<div class="shH fixH fixT" data-text="<?php echo $opt_themes['opt_title_share_2']; ?>">
<label aria-label="<?php echo $opt_themes['opt_title_share_3']; ?>" class="c cl" for="forShare"></label>
</div>
<div class="shC">
<div class="shL">
<div data-text="Facebook">
<a aria-label="Facebook" href="https://www.facebook.com/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 64 64"><path d="M20.1,36h3.4c0.3,0,0.6,0.3,0.6,0.6V58c0,1.1,0.9,2,2,2h7.8c1.1,0,2-0.9,2-2V36.6c0-0.3,0.3-0.6,0.6-0.6h5.6 c1,0,1.9-0.7,2-1.7l1.3-7.8c0.2-1.2-0.8-2.4-2-2.4h-6.6c-0.5,0-0.9-0.4-0.9-0.9v-5c0-1.3,0.7-2,2-2h5.9c1.1,0,2-0.9,2-2V6.2 c0-1.1-0.9-2-2-2h-7.1c-13,0-12.7,10.5-12.7,12v7.3c0,0.3-0.3,0.6-0.6,0.6h-3.4c-1.1,0-2,0.9-2,2v7.8C18.1,35.1,19,36,20.1,36z"></path></svg>
</a>
</div>
<div data-text="WhatsApp">
<a aria-label="Whatsapp" href="https://api.whatsapp.com/send?text=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 64 64"><path d="M6.9,48.4c-0.4,1.5-0.8,3.3-1.3,5.2c-0.7,2.9,1.9,5.6,4.8,4.8l5.1-1.3c1.7-0.4,3.5-0.2,5.1,0.5 c4.7,2.1,10,3,15.6,2.1c12.3-1.9,22-11.9,23.5-24.2C62,17.3,46.7,2,28.5,4.2C16.2,5.7,6.2,15.5,4.3,27.8c-0.8,5.6,0,10.9,2.1,15.6 C7.1,44.9,7.3,46.7,6.9,48.4z M21.3,19.8c0.6-0.5,1.4-0.9,1.8-0.9s2.3-0.2,2.9,1.2c0.6,1.4,2,4.7,2.1,5.1c0.2,0.3,0.3,0.7,0.1,1.2 c-0.2,0.5-0.3,0.7-0.7,1.1c-0.3,0.4-0.7,0.9-1,1.2c-0.3,0.3-0.7,0.7-0.3,1.4c0.4,0.7,1.8,2.9,3.8,4.7c2.6,2.3,4.9,3,5.5,3.4 c0.7,0.3,1.1,0.3,1.5-0.2c0.4-0.5,1.7-2,2.2-2.7c0.5-0.7,0.9-0.6,1.6-0.3c0.6,0.2,4,1.9,4.7,2.2c0.7,0.3,1.1,0.5,1.3,0.8 c0.2,0.3,0.2,1.7-0.4,3.2c-0.6,1.6-2.1,3.1-3.2,3.5c-1.3,0.5-2.8,0.7-9.3-1.9c-7-2.8-11.8-9.8-12.1-10.3c-0.3-0.5-2.8-3.7-2.8-7.1 C18.9,22.1,20.7,20.4,21.3,19.8z"></path></svg>
</a>
</div>
<div data-text="Twitter">
<a aria-label="Twitter" href="https://twitter.com/share?url=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 24 24;" xml:space="preserve"><g><polygon points="12.153992,10.729553 8.088684,5.041199 5.92041,5.041199 10.956299,12.087097 11.59021,12.97345    15.900635,19.009583 18.068909,19.009583 12.785217,11.615906  "/><path d="M21.15979,1H2.84021C1.823853,1,1,1.823853,1,2.84021v18.31958C1,22.176147,1.823853,23,2.84021,23h18.31958   C22.176147,23,23,22.176147,23,21.15979V2.84021C23,1.823853,22.176147,1,21.15979,1z M15.235352,20l-4.362549-6.213013   L5.411438,20H4l6.246887-7.104675L4,4h4.764648l4.130127,5.881958L18.06958,4h1.411377l-5.95697,6.775635L20,20H15.235352z"/></g></svg>
</a>
</div>
<div data-text="Telegram">
<a aria-label="Telegram" href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 64 64"><path d="M56.4,8.2l-51.2,20c-1.7,0.6-1.6,3,0.1,3.5l9.7,2.9c2.1,0.6,3.8,2.2,4.4,4.3l3.8,12.1c0.5,1.6,2.5,2.1,3.7,0.9 l5.2-5.3c0.9-0.9,2.2-1,3.2-0.3l11.5,8.4c1.6,1.2,3.9,0.3,4.3-1.7l8.7-41.8C60.4,9.1,58.4,7.4,56.4,8.2z M50,17.4L29.4,35.6 c-1.1,1-1.9,2.4-2,3.9c-0.2,1.5-2.3,1.7-2.8,0.3l-0.9-3c-0.7-2.2,0.2-4.5,2.1-5.7l23.5-14.6C49.9,16.1,50.5,16.9,50,17.4z"></path></svg>
</a>
</div>
<div data-text="Pinterest">
<a aria-label="Pinterest" data-pin-config="beside" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(get_permalink()); ?>&amp;media=<?php echo $images; ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 64 64"><path d="M14.4,53.8c2.4,2,6.1,0.6,6.8-2.4l0-0.1c0.4-1.8,2.4-10.2,3.2-13.7c0.2-0.9,0.2-1.8-0.1-2.7 C24.2,34,24,32.8,24,31.5c0-4.1,2.4-7.2,5.4-7.2c2.5,0,3.8,1.9,3.8,4.2c0,2.6-1.6,6.4-2.5,9.9c-0.7,3,1.5,5.4,4.4,5.4 c5.3,0,8.9-6.8,8.9-14.9c0-6.1-4.1-10.7-11.6-10.7c-8.5,0-13.8,6.3-13.8,13.4c0,2.4,0.7,4.2,1.8,5.5c0.5,0.6,0.6,0.9,0.4,1.6 c-0.1,0.5-0.4,1.8-0.6,2.2c-0.2,0.7-0.8,1-1.4,0.7c-3.9-1.6-5.7-5.9-5.7-10.7c0-8,6.7-17.5,20-17.5c10.7,0,17.7,7.7,17.7,16 c0,11-6.1,19.2-15.1,19.2c-1.9,0-3.8-0.7-5.2-1.6c-0.9-0.6-2.1-0.1-2.4,0.9c-0.5,1.9-1.1,4.3-1.3,4.9c-0.1,0.5-0.3,0.9-0.4,1.4 c-1,2.7,0.9,5.5,3.7,5.7c2.1,0.1,4.2,0,6.3-0.3c12.4-2,22.1-12.2,23.4-24.7C61.5,18.1,48.4,4,32,4C16.5,4,4,16.5,4,32 C4,40.8,8.1,48.6,14.4,53.8z"></path></svg>
</a>
</div>
<div data-text="LinkedIn">
<a aria-label="Linkedin" href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 64 64"><path d="M8,54.7C8,55.4,8.6,56,9.3,56h9.3c0.7,0,1.3-0.6,1.3-1.3V23.9c0-0.7-0.6-1.3-1.3-1.3H9.3 c-0.7,0-1.3,0.6-1.3,1.3V54.7z"></path><path d="M46.6,22.3c-4.5,0-7.7,1.8-9.4,3.7c-0.4,0.4-1.1,0.1-1.1-0.5l0-1.6c0-0.7-0.6-1.3-1.3-1.3h-9.4 c-0.7,0-1.3,0.6-1.3,1.3c0.1,5.7,0,25.4,0,30.7c0,0.7,0.6,1.3,1.3,1.3h9.5c0.7,0,1.3-0.6,1.3-1.3V37.9c0-1,0-2,0.3-2.7 c0.8-2,2.6-4.1,5.7-4.1c4.1,0,6,3.1,6,7.6v15.9c0,0.7,0.6,1.3,1.3,1.3h9.3c0.7,0,1.3-0.6,1.3-1.3V37.4C60,27.1,54.1,22.3,46.6,22.3 z"></path><path d="M13.9,18.9L13.9,18.9c3.8,0,6.1-2.4,6.1-5.4C19.9,10.3,17.7,8,14,8c-3.7,0-6,2.3-6,5.4 C8,16.5,10.3,18.9,13.9,18.9z"></path></svg>
</a>
</div>
<div data-text="Line">
<a aria-label="Line" href="https://timeline.line.me/social-plugin/share?url=<?php echo urlencode(get_permalink()); ?>" rel="noopener" target="_blank">
<svg viewBox="0 0 24 24"><path d="M19.365 9.863c.349 0 .63.285.63.631 0 .345-.281.63-.63.63H17.61v1.125h1.755c.349 0 .63.283.63.63 0 .344-.281.629-.63.629h-2.386c-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63h2.386c.346 0 .627.285.627.63 0 .349-.281.63-.63.63H17.61v1.125h1.755zm-3.855 3.016c0 .27-.174.51-.432.596-.064.021-.133.031-.199.031-.211 0-.391-.09-.51-.25l-2.443-3.317v2.94c0 .344-.279.629-.631.629-.346 0-.626-.285-.626-.629V8.108c0-.27.173-.51.43-.595.06-.023.136-.033.194-.033.195 0 .375.104.495.254l2.462 3.33V8.108c0-.345.282-.63.63-.63.345 0 .63.285.63.63v4.771zm-5.741 0c0 .344-.282.629-.631.629-.345 0-.627-.285-.627-.629V8.108c0-.345.282-.63.63-.63.346 0 .628.285.628.63v4.771zm-2.466.629H4.917c-.345 0-.63-.285-.63-.629V8.108c0-.345.285-.63.63-.63.348 0 .63.285.63.63v4.141h1.756c.348 0 .629.283.629.63 0 .344-.282.629-.629.629M24 10.314C24 4.943 18.615.572 12 .572S0 4.943 0 10.314c0 4.811 4.27 8.842 10.035 9.608.391.082.923.258 1.058.59.12.301.079.766.038 1.08l-.164 1.02c-.045.301-.24 1.186 1.049.645 1.291-.539 6.916-4.078 9.436-6.975C23.176 14.393 24 12.458 24 10.314"></path></svg>
</a>
</div>
<div data-text="Email">
<a aria-label="Email" href="mailto:?body=<?php echo urlencode(get_permalink()); ?>" target="_blank">
<svg viewBox="0 0 500 500"><path d="M468.051,222.657c0-12.724-5.27-24.257-13.717-32.527 L282.253,45.304c-17.811-17.807-46.702-17.807-64.505,0L45.666,190.129c-8.448,8.271-13.717,19.803-13.717,32.527v209.054 c0,20.079,16.264,36.341,36.34,36.341h363.421c20.078,0,36.34-16.262,36.34-36.341V222.657z M124.621,186.402h250.758 c11.081,0,19.987,8.905,19.987,19.991v34.523c-0.088,4.359-1.818,8.631-5.181,11.997l-55.966,56.419l83.224,83.127 c6.904,6.904,6.904,18.081,0,24.985s-18.085,6.904-24.985,0l-85.676-85.672H193.034l-85.492,85.672 c-6.907,6.904-18.081,6.904-24.985,0c-6.906-6.904-6.906-18.081,0-24.985l83.131-83.127l-55.875-56.419 c-3.638-3.638-5.363-8.358-5.181-13.177v-33.343C104.632,195.307,113.537,186.402,124.621,186.402z"></path></svg>
</a>
</div>
</div>

<div class="cpL" data-message="<?php echo $opt_themes['opt_title_share_4']; ?>" data-text="<?php echo $opt_themes['opt_title_share_4']; ?>">
<div class="cpLb">
<svg class="line" viewBox="0 0 24 24"><path d="M13.0601 10.9399C15.3101 13.1899 15.3101 16.8299 13.0601 19.0699C10.8101 21.3099 7.17009 21.3199 4.93009 19.0699C2.69009 16.8199 2.68009 13.1799 4.93009 10.9399"></path><path class="svgC" d="M10.59 13.4099C8.24996 11.0699 8.24996 7.26988 10.59 4.91988C12.93 2.56988 16.73 2.57988 19.08 4.91988C21.43 7.25988 21.42 11.0599 19.08 13.4099"></path></svg>
<input id="getlink" onclick="this.select()" readonly="readonly" value="<?php echo wp_get_shortlink(get_the_ID()); ?>">
<label for="getlink" onclick="copyFunction()"><?php echo $opt_themes['opt_title_share_5']; ?></label>
</div>
<div class="cpLn" id="cpNotif"></div>
<script>function copyFunction(){document.getElementById('getlink').select(),document.execCommand('copy'),toastNotif('<i class="copy"></i><?php echo $opt_themes['opt_title_share_6']; ?>'); if('vibrate' in navigator){navigator.vibrate([50])};}</script>
</div>
</div>
</div>
</div>
<label class="fCls" for="forShare"></label>
</div>

<?php echo do_shortcode( '[rel_post]' ); ?>


<?php echo do_shortcode( '[komentar]' ); ?>
 
</div>
</div>
</div>
</div>
</main> 

<?php 
if($opt_themes['floating_toc_on']){ 
echo do_shortcode( '[toc_floatings]' ); 
} ?>
  
 
<?php 
get_sidebar();
get_footer();