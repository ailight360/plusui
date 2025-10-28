<?php
get_header();
global $post, $opt_themes; 
?>


<!--[ Main content ]-->
<main class='blogItm mainbar'>
 
<?php
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('slider') ) : endif; 
if($opt_themes['slot_1_on']){
?>
 
<div class='section' id='top-widget'>
<div class='widget HTML'>
<div class='widget-content'>
<?php echo $opt_themes['slot_1']; ?>
</div>
</div>
</div>

<?php }
if (!empty('featured') && function_exists('is_dynamic_sidebar') && is_active_sidebar('featured')){
?>
<div class='section' id='top-widget'>
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('featured') ) : endif; ?>
</div>
<?php } ?>
	
<div class='section' id='main-widget'>
<div class='widget Blog' id='Blog1'>
<div class='blogTtl hm'>
<h2 class='title dt'><?php echo $opt_themes['opts_title_other_6']; ?></h2>
</div>
<div class='blogPts'>
	<?php
	if ( have_posts() ) {
	while ( have_posts() ) { the_post(); 
	get_template_part( 'part/loop.item.home' );
    }
	}
    ?>
</div> 
<?php 
get_template_part('part/nav'); 
?>	
            
		 
</div>

<?php
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('homes') ) : endif;
?> 

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
get_sidebar();
get_footer(); 