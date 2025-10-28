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
global $post, $opt_themes; 
?>

<main class="blogItm mainbar">
<div class="section" id="main-widget">
<div class="widget Blog">
<div class="blogTtl">
<div class="t srch">
<span class="hm" data-text="<?php echo $opt_themes['opts_title_other_1']; ?>"></span>
<?php single_cat_title() ?>
</div>
</div>
<div class="blogPts">

            <?php 
			$postcounter = 1; if (have_posts()) : 
			while (have_posts()) : $postcounter = $postcounter + 1; the_post(); $do_not_duplicate = $post->ID; $the_post_ids = get_the_ID(); 
            global $post, $opt_themes; 
            $post_id			= get_the_ID();
            $image_id_alt		= get_post_thumbnail_id($post->ID);
            $image_idx			= get_post_thumbnail_id();
            
            $image_urlx			= wp_get_attachment_image_src($image_idx, 'full', true);
            $imagex				= $image_urlx[0];
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
            $author_urls		= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );
            ?>
            <article class='ntry<?php if (!has_post_thumbnail()) { ?> noThmb<?php } ?>'>
            <div class='pThmb<?php if (!has_post_thumbnail()) { ?> nul<?php } ?>'>
            <?php if (has_post_thumbnail()) { ?>
            <a class='thmb' href='<?php the_permalink(); ?>'>
				<?php the_post_thumbnail('full', array('class' => 'imgThm')); ?>
				<!--<?php the_post_thumbnail_url('full'); ?>-->
            </a>
            <?php } else { ?>
            <div class="thmb">
            <span class="imgThm" data-text="<?php _e('No image', TEXT_DOMAIN); ?>"></span>
            </div>
            <?php } ?>
            <div class='iFxd'>
            <?php if($opt_themes['komentar_on']){ ?>
            <a aria-label='Comments' class='cmnt' data-text='<?php echo comments_number('0', '1', '%'); ?>' href='<?php the_permalink(); ?>#comment' role='button'>
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 2.000000)'><path d='M17.0710351,17.0698449 C14.0159481,20.1263505 9.48959549,20.7867004 5.78630747,19.074012 C5.23960769,18.8538953 1.70113357,19.8338667 0.933341969,19.0669763 C0.165550368,18.2990808 1.14639409,14.7601278 0.926307229,14.213354 C-0.787154393,10.5105699 -0.125888852,5.98259958 2.93020311,2.9270991 C6.83146881,-0.9756997 13.1697694,-0.9756997 17.0710351,2.9270991 C20.9803405,6.8359285 20.9723008,13.1680512 17.0710351,17.0698449 Z'></path></g></svg>
            </a>
            <?php } if($opt_themes['read_on']){ ?>
            <span class='pV pu-views'  data-id="<?php echo get_the_ID(); ?>" data-text="<?php echo format_numbers(get_view_post_alt()); ?>" >
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(2.000000, 4.000000)'><path class='svgC' d='M13.1643,8.0521 C13.1643,9.7981 11.7483,11.2141 10.0023,11.2141 C8.2563,11.2141 6.8403,9.7981 6.8403,8.0521 C6.8403,6.3051 8.2563,4.8901 10.0023,4.8901 C11.7483,4.8901 13.1643,6.3051 13.1643,8.0521 Z'></path><path d='M0.7503,8.0521 C0.7503,11.3321 4.8923,15.3541 10.0023,15.3541 C15.1113,15.3541 19.2543,11.3351 19.2543,8.0521 C19.2543,4.7691 15.1113,0.7501 10.0023,0.7501 C4.8923,0.7501 0.7503,4.7721 0.7503,8.0521 Z'></path></g></svg>
            </span>            
            <?php } if($opt_themes['bookmark_on']){ ?>
            <span aria-label='<?php echo $opt_themes['opts_title_other_20']; ?>' bm-id='<?php echo get_the_ID(); ?>' bm-img='<?php if (has_post_thumbnail()) { echo $imagex; } ?>' bm-ttl='<?php the_title(); ?>' bm-url='<?php the_permalink(); ?>' class='bM bmPs' data-added='<?php echo $opt_themes['opts_title_other_21']; ?>' role='button'>
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(4.500000, 2.500000)'><path d='M7.47024319,0 C1.08324319,0 0.00424318741,0.932 0.00424318741,8.429 C0.00424318741,16.822 -0.152756813,19 1.44324319,19 C3.03824319,19 5.64324319,15.316 7.47024319,15.316 C9.29724319,15.316 11.9022432,19 13.4972432,19 C15.0932432,19 14.9362432,16.822 14.9362432,8.429 C14.9362432,0.932 13.8572432,0 7.47024319,0 Z'></path><line class='svgC v' transform='translate(-4.500000, -2.500000)' x1='12' x2='12' y1='6' y2='12'></line><line class='svgC h' transform='translate(-4.500000, -2.500000)' x1='15' x2='9' y1='9' y2='9'></line></g></svg>
            </span>	
            <?php } ?>
            </div>
            <?php if($opt_themes['author_on']){ ?>
            <div class='iFxd bl'>
            <div class='aNm t'>
            <div class='im lazy' data-style='background-image: url(<?php if($avatars_urls) { echo $avatars_urls; } ?>)'>
            </div>
            <bdi class='nm' data-text='<?php echo $display_name; ?>'></bdi>
            <svg viewBox='0 0 24 24'><path d='M23,12L20.56,9.22L20.9,5.54L17.29,4.72L15.4,1.54L12,3L8.6,1.54L6.71,4.72L3.1,5.53L3.44,9.21L1,12L3.44,14.78L3.1,18.47L6.71,19.29L8.6,22.47L12,21L15.4,22.46L17.29,19.28L20.9,18.46L20.56,14.78L23,12M10,17L6,13L7.41,11.59L10,14.17L16.59,7.58L18,9L10,17Z'></path></svg>
            </div>
            </div>
            <?php } if ( is_user_logged_in() ) { if(current_user_can('editor') || current_user_can('administrator')){  ?>
            <div class='blog-admins'>
            <div class='iFxd l'>
            <a aria-label='Edit this post' class='edit' data-text='Edit' href='<?php echo get_edit_post_link(); ?>' role='button' target='_blank'>
            <svg class='line' viewBox='0 0 24 24'><g transform='translate(3.500000, 3.500000)'><line class='svgC' x1='9.8352' x2='16.2122' y1='16.0078' y2='16.0078'></line><path d='M12.5578,1.3589 L12.5578,1.3589 C11.2138,0.3509 9.3078,0.6229 8.2998,1.9659 C8.2998,1.9659 3.2868,8.6439 1.5478,10.9609 C-0.1912,13.2789 1.4538,16.1509 1.4538,16.1509 C1.4538,16.1509 4.6978,16.8969 6.4118,14.6119 C8.1268,12.3279 13.1638,5.6169 13.1638,5.6169 C14.1718,4.2739 13.9008,2.3669 12.5578,1.3589 Z'></path><line x1='7.0041' x2='11.8681' y1='3.7114' y2='7.3624'></line></g></svg>
            </a>
            </div>
            </div>
            <?php }} ?>
            </div>
            <div class='pCntn'>
            <div class='pHdr pSml'>
            <div class='pLbls' data-text='in'>
            <?php
                $i = 0;
                foreach((get_the_category()) as $cat) {
                echo '<a aria-label="' . $cat->cat_name . '" data-text="' . $cat->cat_name . '&nbsp;" href="'.get_category_link($cat->cat_ID).'"  rel="tag"></a>&nbsp;';
                if (++$i == 1) break;
                }
            ?> 
            </div>
            </div>
            <h2 class='pTtl aTtl sml'>
            <a data-text='<?php the_title(); ?>' href='<?php the_permalink(); ?>' rel='bookmark'>
            <?php the_title(); ?>
            </a>
            </h2>
            <div class='pSnpt'>
            <?php echo get_excerpt_by_id($post->ID); ?>
            </div>
            <div class='pInf pSml'>
            <time class='aTtmp pTtmp pbl' data-text='<?php echo get_the_date(); ?>' data-type='Published' datetime='<?php echo mysql2date( DATE_W3C, $post->post_date_gmt, false ); ?>' title='Published: <?php echo get_the_date(); ?>'></time>
            <a aria-label='Read more' class='pJmp' data-text='Keep reading' href='<?php the_permalink(); ?>'></a>
            </div>
            </div>
            </article>
            <?php
			endwhile; 
			else : 
			endif;
			?>
             
</div>  
<?php get_template_part('part/nav'); ?>	
</div>
</div>



<?php
if($opt_themes['slot_2_on']){
?>  
<div class='widget HTML' >
<div class='widget-content'>
<?php echo $opt_themes['slot_2']; ?>
</div>
</div> 
<?php } ?>

</main>

<?php
get_footer();