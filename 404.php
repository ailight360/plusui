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
global $opt_themes;
$search_term		= substr($_SERVER['REQUEST_URI'], 1);
$search_term		= urldecode(stripslashes($search_term));
$search_term		= rtrim($search_term, "/");
$find				= array("'.html'", "'.+/'", "'[-/_]'");
$replace			= " ";
$search_term		= trim(preg_replace($find, $replace, $search_term));
$search_term		= str_replace("%20", $replace, $search_term);
$search_term		= preg_replace('!\s+!', ' ', $search_term);

?>

<main class="blogItm mainbar">
	<div class="section " id="main-widget">
		<div class="widget Blog" >
			<div class="blogTtl">
				<div class="t srch">
				<span class="hm" data-text="<?php echo $opt_themes['opts_title_other_1']; ?>"></span> 
                <?php echo $search_term; ?>
				</div>
			</div>
            
			<section class="erroP">
            <div class="erroC section" id="error-404">
            <div class="widget HTML" id="HTML404">
            <h3>
			<span class="e" title="<?php echo $opt_themes['opts_title_other_14']; ?>"><?php echo $opt_themes['opts_title_other_14']; ?></span>
			<span><?php echo $opt_themes['opts_title_other_11']; ?></span>
			</h3>

            <p><?php echo $opt_themes['opts_title_other_12']; ?></p>
            <a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo $opt_themes['opts_title_other_13']; ?></a>
            </div>
            </div>
            </section>
			<br> 			
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