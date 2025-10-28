<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} 
 ?>
<div class='cmC'>
<div class='cmCn'>
<ol class='cmHl' id='cmHolder'>
<?php
	wp_list_comments( array(
		'short_ping'	=> true, 
		'callback'		=> 'medianWP_comments'
	) );
?>
</ol>
</div>

<script>var comment = true;</script>
</div>
<style>

form#commentform {
    width:100%;
    position: relative;
    padding: 10px 0 0;
    margin-top: 15px;
}

form#commentform .form-group {
	position: relative;
    padding: 10px 0 0;
   /*  margin-top: 15px; */
}

form#commentform .form-field {
  font-family: inherit;
  width: 100%;
  font-size: 16px;
  padding: 7px 4px; 
  background: transparent;
  transition: border-color 0.2s;
  box-sizing: border-box;
  width: 100%;
  margin: 0 0 1em 0; 
  background: var(--notifU);
  resize: none;
  outline: none;
  border-radius: 10px;
}

form#commentform input[type="text"], form#commentform input[type="email"] {
    /* height: calc(3em + 2px); */
}

form#commentform .form-field::placeholder {
  color: transparent;
}

form#commentform .form-field:placeholder-shown ~ .form-label {
  font-size: 16px;
  cursor: text;
  top: 20px;
}

form#commentform label, form#commentform .form-field:focus ~ .form-label {
  position: absolute;
  top: 5px;
  left: 8px;
  display: block;
  transition: 0.2s;
  font-size: 12px;
  color: #3c4043;
  background-image: linear-gradient(to bottom, var(--notifU), var(--notifU));
  background-size: 105% 5px;
  background-repeat: no-repeat;
  background-position: center;
}

form#commentform .form-field:focus ~ .form-label {
  color: #3c4043;
}

form#commentform .form-field:focus {
  padding-bottom: 6px; 
}

form#commentform .form-field:valid { 
}

form#commentform .form-field:valid ~ .form-label {
  color: #3c4043;
}

form#commentform input#submit {
	  display: inline-flex;
  align-items: center;
  cursor: pointer;
  padding: 10px 15px;
  outline: 0;
  border: 0;
  border-radius: var(--buttonR);
  line-height: 20px;
  color: rgba(0,0,0,.8);
  background: #e9e9e9;
  font-size: 14px;
  font-family: var(--fontB);
  white-space: nowrap;
  overflow: hidden;
    margin-right: 10px;
  background: var(--linkB);
  color: #fffdfc;
}

#reply-title.comment-reply-title {
  font-size: .85rem;
}
p.logged-in-as {
  position: relative;
  padding: 16px 20px 16px 50px;
  background: var(--notifU);
  color: #3c4043;
  font-size: .85rem;
  font-family: var(--fontB);
  line-height: 1.6em;
  border-radius: 10px;
  overflow: hidden;
}
p.logged-in-as::before {
  content: '';
  width: 60px;
  height: 60px;
  background: rgba(0,0,0,.4);
  display: block;
  border-radius: 50%;
  position: absolute;
  top: -12px;
  left: -12px;
  opacity: .1;
}
p.logged-in-as::after {
  content: '\002A';
  position: absolute;
  left: 18px;
  top: 16px;
  font-size: 20px;
  min-width: 15px;
  text-align: center;
}
</style>
 
 
<?php 
add_filter( 'comment_form_defaults', 'my_comment_form_defaults' );
function my_comment_form_defaults( $defaults ) {
    $defaults['comment_notes_before'] = '<div class="cmMs note">'. __( 'Your email address will not be published. Required fields are marked *', THEMES_NAMES ).'</div>';
    return $defaults;
}


add_filter( 'comment_form_default_fields', 'wc_comment_form_change_cookies' );
function wc_comment_form_change_cookies( $fields ) {
	global $opt_themes;
	$commenter 	= wp_get_current_commenter();
	$consent   	= empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"'; 
	$fields['cookies'] = ' ';
	return $fields;
}

global $opt_themes; 
$names				= $opt_themes['title_coms_your_name'];
$emails				= $opt_themes['title_coms_your_email'];
$komentarnya		= $opt_themes['title_coms_your_comments'];
$submitnya			= $opt_themes['title_coms_submits'];
$comment_args = array(
	'title_reply'		=> '',
    'fields'			=> apply_filters('comment_form_default_fields', array(

	'author'			=> '<div class="form-group"><input type="text" id="author" name="author" class="form-field" value="'. esc_attr($commenter['comment_author']).'" placeholder="'.$names.'"/><label for="author" class="form-label">'.$names.'</label></div>',

	'email'				=> '<div class="form-group"><input type="email" id="email" name="email" class="form-field" value="'.esc_attr($commenter['comment_author_email']).'" placeholder="'.$emails.'"/><label for="email" class="form-label">'.$emails.'</label></div>',
	
	)),
	
    'comment_field'		=> '<div class="form-group"><textarea id="comment" name="comment" class="form-field" required="" placeholder="'.$komentarnya.'"></textarea><label for="comment" class="form-label">'.$komentarnya.'</label></div>',
	
	'submit_button'		=> '<input name="submit" id="submit" value="'.$submitnya.'" type="submit" />', 
	
    'comment_notes_after' => '',
); 
comment_form($comment_args); 