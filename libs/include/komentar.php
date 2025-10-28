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

function kolom_komentar() {
global $opt_themes;
?>

<div class='pCmnts' id='comment'>
<input class='cmSh fixi hidden' id='forComments' type='checkbox'/>
<input class='cmAl hidden' id='forAllCm' type='checkbox'/>

<div class='cmShw'>
<label aria-label="<?php echo $opt_themes['title_comment']; ?>" class='cmBtn button ln' for='forComments'>
<span><?php echo $opt_themes['title_comment']; ?> <?php if ( get_comments_number() ) { ?> (<?php echo comments_number('0', '1', '%'); ?>) <?php } ?></span>
</label>
</div>
<section class='cm cmBr fixL' data-embed='true' data-num-comments='<?php echo comments_number('0', '1', '%'); ?>' id='comments comment'>
<div class='cmBri'>
<div class='cmBrs fixLs'>
<div class='cmH fixH'>
<h3 class='title'>
<?php echo comments_number('0', '1', '%'); ?> <?php echo $opt_themes['title_comments']; ?>
</h3> 

<div class="cmI cl">
<label aria-label="<?php echo $opt_themes['title_comments']; ?>" class="s" data-new="<?php echo $opt_themes['title_comments_newest']; ?>" data-text="<?php echo $opt_themes['title_comments_oldest']; ?>" for="forAllCm"></label>
<label aria-label="<?php echo $opt_themes['title_comments_close']; ?>" class="c" for="forComments"></label>
</div>
</div>
<?php comments_template(); ?>
</div>
</div>
<label class='fCls' for='forComments'></label>
</section>             
<?php } 

add_shortcode('komentar', 'kolom_komentar');


function medianWP_comments($comment, $args, $depth) {
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
$GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);
    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment212 ';
    } else {
        $tag = 'li';
        $add_below = 'div-comment121 ';
    }
global $comment;
// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\  
if( $comment->comment_parent ) { 
global $opt_themes; 
?>
<input class="cmRi hidden" id="to-<?php comment_ID() ?>" type="checkbox">
<div class="cmRp">
<div class="cmTh" id="c<?php comment_ID() ?>-rt">
<label aria-label="<?php echo $opt_themes['title_comments_view_replies']; ?>" class="thTg" data-text="<?php echo $opt_themes['title_comments_hide_replies']; ?>" for="to-<?php comment_ID() ?>"></label>
<ol class="thCh">
<li class="c" id="comment-<?php comment_ID() ?>">
<div class='cmAv'>
	<?php
	$user = wp_get_current_user(); 
	if ( $user ) : ?>
	<div class='im lazy' data-style='background-image: url(<?php echo get_avatar_url( $comment->comment_author_email, 25 ); ?>)'></div>
	<?php endif; ?>
</div>
                  
<div class='cmIn'>
<div class='cmBd' itemscope='itemscope' itemtype='https://schema.org/Comment'>
	<div class='cmHr a'>
	<span class='<?php if ($user_id) { $user_info = get_userdata($user_id ); ?>n<?php } ?>' itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'>
	<bdi itemprop='name'><?php echo strip_tags(get_comment_author()) ?></bdi>
	</span>
	<span class='d dtTm' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>'><?php echo get_comment_date(); ?></span>
	<span class='d date' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>' itemprop='datePublished'><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></span>
	</div>
	<div class='cmCo' itemprop='text'><?php comment_text(); ?></div>
</div>
<div class='cmAc'>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>
</li>
</ol>
</div>
</div>
<?php } else { ?>
<li class='c' id="comment-<?php comment_ID() ?>">
<div class='cmAv'>
	<?php
	$user = wp_get_current_user(); 
	if ( $user ) : ?>
	<div class='im lazy' data-style='background-image: url(<?php echo get_avatar_url( $comment->comment_author_email, 25 ); ?>)'></div>
	<?php endif; ?>
</div> 
<div class='cmIn'>
<div class='cmBd' itemscope='itemscope' itemtype='https://schema.org/Comment'>
	<div class='cmHr a'>
	<span class='<?php if ($user_id) { $user_info = get_userdata($user_id ); ?>n<?php } ?>' itemprop='author' itemscope='itemscope' itemtype='https://schema.org/Person'>
	<bdi itemprop='name'><?php echo strip_tags(get_comment_author()) ?></bdi>
	</span>
	<span class='d dtTm' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>'><?php echo get_comment_date(); ?></span>
	<span class='d date' data-datetime='<?php echo get_comment_date(); ?> <?php echo get_comment_time(); ?>' itemprop='datePublished'><?php echo get_comment_date(); ?>, <?php echo get_comment_time(); ?></span>
	</div>
	<div class='cmCo' itemprop='text'><?php comment_text(); ?></div>
</div>
<div class='cmAc'>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
</div>


<?php }
}