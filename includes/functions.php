<?php

function __ ($value = false , $lang = false)
{
	global $en , $de , $fr , $pt , $page_lang;
	// echo json_encode($de); exit;
	// echo $_SESSION['page_lang']; exit;
	
	if( !$value) {
		echo '';
	}
	
	if( !$lang) {
		if($page_lang === 'en') {
			echo $en[$value];
		}
		
		if($page_lang === 'de') {
			echo $de[$value];
		}
		
		if($page_lang === 'fr') {
			echo $fr[$value];
		}
		
		if($page_lang === 'pt') {
			echo $pt[$value];
		}
	}
	else {
		if($lang === 'en') {
			echo $en[$value];
		}
		
		if($lang === 'de') {
			echo $de[$value];
		}
		
		if($lang === 'fr') {
			echo $fr[$value];
		}
		
		if($lang === 'pt') {
			echo $pt[$value];
		}
	}
}

function redirect($url)
{
	if (!headers_sent())
	{
		header('Location: '.$url);
		exit;
	}
	else
	{
		echo '<script type="text/javascript">';
		echo 'window.location.href="'.$url.'";';
		echo '</script>';
		echo '<noscript>';
		echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
		echo '</noscript>'; exit;
	}
}