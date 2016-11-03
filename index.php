<?php

function searchImages ($path) 
{
	$images = array();

	// Path validation
	if(!is_dir($path)) { return $images; }

	// Set Directory Iterator
	$iterator = new RecursiveDirectoryIterator($path);

	foreach (new RecursiveIteratorIterator($iterator) as $file) 
	{
		// Checking mime type for image
		if(strpos(mime_content_type($file->getPathname()), 'image') !== false) 
		{
			$images[] = $file->getPathname();
		}
	}

	return $images;
}

// Run function
var_dump(searchImages('/home/luken/WWW/'));

?>