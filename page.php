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
?>
<main class="blogItm mainbar">
<div class="section" id="main-widget">
<div class="widget Blog" id="Blog<?php echo get_the_ID(); ?> post-view-<?php set_view_post(); echo get_view_post_alt(); ?>">
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
<div class="pInr">
<div class="pEnt" id="postID-<?php echo get_the_ID(); ?>">
<div class="pS post-body postBody" id="postBody">
    <?php
    if ( have_posts() ) : 
    while ( have_posts() ) : 
    the_post(); 
    the_content(); 
    endwhile; 
    endif;
    ?>
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