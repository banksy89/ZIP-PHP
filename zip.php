<?php

function zipper ( $directory, $ignore = array (), $the_file = '', $overwrite = FALSE )
{
	// Prevents overwriting an existing archive if overwrite is false.
	if ( file_exists ( $the_file ) && !$overwrite )
		return FALSE;
		
	$files = array ();
	
	// Loop through the directory and get the files to include in the zip.
	if ( is_dir ( $directory ) )
	{
		if ( $dh = opendir ( $directory ) )
		{
			while ( ( $file = readdir ( $dh ) ) !== FALSE )
			{
				// We don't want the back reference so ignore.
				if ( $file != '.' && $file != '..' )
				{	
					// Ignore any files in the directory if we've specified them.
					if ( is_array ( $ignore ) && !in_array ( $file, $ignore ) )
						$files[] = $file;
				}
			}
			closedir( $dh );
		}
	}
	
	// If there are any files within the directory, we can create the zip.
	if ( count ( $files ) > 0 )
	{
		$zipper = new ZipArchive ();
		
		// Find out whether we create or overwrite an archive.
		$res = $zipper->open( $the_file, $overwrite ? ZipArchive::OVERWRITE : ZipArchive::CREATE );
		
		if ( $res === TRUE ) 
		{
			// Add each file to the archive.
			foreach ( $files as $file )
				$zipper->addFile ( $directory . '/'. $file, $file );
				
			$zipper->close();
		} 
		else 
		{
			// Display an error so you know whats gone wrong.
			die ( 'problem creating the zip archive' );
		}
		
		$zipper->close ();
		
		// Return confirmation that it now exists!
		return file_exists ( $the_file );
	}
	else
	{
		return FALSE;	
	}
}

// Here's how you reference the function. 
$result = zipper ( $_SERVER['DOCUMENT_ROOT'] . '/Sandbox_new/Test', $blank, 'Zipper.zip', TRUE );


?>