<?php
	/**
	 * @category Model
	 * @author Nicolas De waegenaere <de_waegenaere@live.fr>
	 * @version 1.0.0
	 */

		/* METHODS */
		// read text in <p> 
		function getText($url) {
			$data = file_get_contents($url);
			$text = preg_match('/<p[^>]*>(.*?)<\/p>/ims', $data, $matches) ? $matches[1] : null;
			return $text;
		}

?>