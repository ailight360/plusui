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
// TOC dalam artikel 

function auto_id_headings2( $content ) {
	$content = preg_replace_callback( '/(\<h[1-9](.*?))\>(.*)(<\/h[1-9]>)/i', function( $matches ) {
    if ( ! stripos( $matches[0], 'id=' ) ) {
			$heading_link   = '<a aria-label="'.$matches[3].'" href="#'.strtolower(sanitize_title($matches[3])).'" class="heading-link"></a>';
			$matches[0]     = $matches[1].$matches[2].' id="'.strtolower(sanitize_title($matches[3])).'">'.ucwords($matches[3]).$matches[4].$heading_link;
			$matches[0]     = str_replace('-', '_', $matches[0]);
	}
    return $matches[0];
	}, $content );
    return $content;
}
add_filter( 'the_content', 'auto_id_headings2' );

function get_toc_artikel($content) {
  global $opt_themes;
  //$headings     = get_heading_artikel($content, 1, 6);
  $headings     = get_heading_artikel($content);
  $titleX       = 'Table of Contents';
  ob_start();
  if($headings){
  ?> 
  <details class="sp toc"<?php if($opt_themes['toc_open']){?> open<?php } ?>>  
	<summary data-show="<?php echo $opt_themes['opts_title_other_18']; ?>" data-hide="<?php echo $opt_themes['opts_title_other_19']; ?>"><?php echo $opt_themes['opts_title_other_17']; ?></summary> 
	<div class='toC' id='toContent'>
	<?php parse_toc_artikel($headings, 0, 0);  ?>
	</div>
	</details>  
 
<?php }
  return ob_get_clean();
}
function parse_toc_artikel($headings, $index, $recursive_counter) {
  if($recursive_counter > 60 || !count($headings)) return;
  $last_element         = $index > 0 ? $headings[$index - 1] : NULL;
  $current_element      = $headings[$index];
  $next_element         = NULL;
  if($index < count($headings) && isset($headings[$index + 1])) {
    $next_element       = $headings[$index + 1];
  } 
  if($current_element == NULL) return; 
  $tag                  = intval($headings[$index]["tag"]);
  $id                   = $headings[$index]["id"]; 
  $id				    = str_replace('-', '_', $id);
  $classes              = isset($headings[$index]["classes"]) ? $headings[$index]["classes"] : array();
  $name                 = $headings[$index]["name"];
 
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
    parse_toc_artikel($headings, $index + 1, $recursive_counter + 1);
    return;
  }
 
  if($last_element == NULL) echo "<ol>";
  if($last_element != NULL && $last_element["tag"] < $tag) {
    for($i = 0; $i < $tag - $last_element["tag"]; $i++) {
      echo "<ol>";
    }
  }
 
  $li_classes = "";
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";
  echo "<li".$li_classes.">";
  if(isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
    echo $name;
  } else {
    echo "<a href='#".strtolower(sanitize_title($id))."'>".ucwords($name)."</a>";
  }
  if($next_element && intval($next_element["tag"]) > $tag) {
    parse_toc_artikel($headings, $index + 1, $recursive_counter + 1);
  }

  echo "</li>";

  if($next_element && intval($next_element["tag"]) == $tag) {
    parse_toc_artikel($headings, $index + 1, $recursive_counter + 1);
  }

  if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
    echo "</ol>";
    if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
      echo "</li>";
      for($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
        echo "</ol>";
      }
    }
  }

  if($next_element != NULL && $next_element["tag"] < $tag) {
    parse_toc_artikel($headings, $index + 1, $recursive_counter + 1);
  }
}
function get_heading_artikel($content, $from_tag = 1, $to_tag = 6) {
  $headings = array();
  preg_match_all("/<h([".$from_tag."-".$to_tag."])([^<]*)>(.*)<\/h[".$from_tag."-".$to_tag."]>/", $content, $matches);
  
  for($i = 0; $i < count($matches[1]); $i++) {
    $headings[$i]["tag"] = $matches[1][$i];
    // get id
    $att_string = $matches[2][$i];
    preg_match("/id=\"([^\"]*)\"/", $att_string , $id_matches);
    $headings[$i]["id"] = $id_matches[1];
    // get classes
    $att_string = $matches[2][$i];
    preg_match_all("/class=\"([^\"]*)\"/", $att_string , $class_matches);
    for($j = 0; $j < count($class_matches[1]); $j++) {
      $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
    }
    $headings[$i]["name"] = strip_tags($matches[3][$i]);
  }
  return $headings;
}

function add_toc_dalam_artikel($content) {
  if (!is_single()) return $content;
    $paragraphs = explode("</p>", $content);
    $paragraphs_count = count($paragraphs);
    $middle_index= absint(floor($paragraphs_count / 2));
    $new_content = '';
    for ($i = 0; $i < $paragraphs_count; $i++) {
        if ($i === 1) {
          $new_content .= get_toc_artikel($content);
        }
        $new_content .= $paragraphs[$i] . "</p>";
    }
    return $new_content;
}
// add our table of contents filter (from webdeasy.de)
//add_filter('the_content', 'add_toc_dalam_artikel');

// ~~~~~~~~~~~~~~~~~~~~~ EX_THEMES ~~~~~~~~~~~~~~~~~~~~~~~~ \\
// TOC (from webdeasy.de)
function toc_didalam_artikel() {
    return get_toc_artikel(auto_id_headings(get_the_content()));
}
add_shortcode('TOC', 'toc_didalam_artikel');
