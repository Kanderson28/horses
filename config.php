<?php
$menu = array(
  'home'  => array('text'=>'Home',  'url'=>'index.php'),
  'questionnaire'  => array('text'=>'Questionnaire',  'url'=>'questionnaire.php'),
  'about' => array('text'=>'About', 'url'=>'about.php'),
  'contact' => array('text'=>'Contact', 'url'=>'contact.php'),
);

function makeLinks($items, $pageID2) {
  $html = "<div class='navbar'>\n";
  foreach($items as $key => $item) {
	$selected = $pageID2 == $key ? 'selected' : null;	
    $html .= "<a href='{$item['url']}' class='{$selected}'>{$item['text']}</a>\n";
  }
  $html .= "</div>\n";
  
  return $html;
} 
?>