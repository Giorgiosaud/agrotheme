<?php
namespace AgroTheme\Shortcodes;

use AgroTheme\Shortcodes\PublicidadInterna;
class Initialize{
	public function __construct(){
		$pubInt=new PublicidadInterna();
		add_shortcode('publicidad_inblog',array($pubInt,'show'));
	}
	
}