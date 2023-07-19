<!--
 VDHSOFT API Documentation Version 0.01
 Based on the idea of https://floriannicolas.github.io/API-Documentation-HTML-Template/

 Copyright © 2023 vdhsoft.com

 !-->
<?php

$xml = ''; // xml definition file
$tags = []; // main tags

// ------------------------------------------------------------------------------------------------------------------------------
// INITIALISATION
// ------------------------------------------------------------------------------------------------------------------------------
// Load the XML file
$xml = simplexml_load_file('api-definition.xml');

// Check if the XML file is loaded successfully
if (!$xml) 
	die("Config file is missing");

InitTags();

// ------------------------------------------------------------------------------------------------------------------------------
// HEADER
// ------------------------------------------------------------------------------------------------------------------------------

$content = ProcessFile('header.html');
echo $content;

// ------------------------------------------------------------------------------------------------------------------------------
// VERTICAL LEFT NAVIGATION
// ------------------------------------------------------------------------------------------------------------------------------

echo ('<body>');

$content = ProcessFile('start-1.html');
echo $content;

// Generate the <ul><li></li></ul> tags
$output = '';
foreach ($xml->APIfunction as $item) 
{
	$visible = ( isset($item->visible) ? $item->visible[0] : "true" );
	if( strtolower($visible) == "false" )
		continue;

    $output .= '<li class="scroll-to-link active" data-target="' . $item->source . '">';
    $output .= '<a>' . $item->title . '</a>';
    $output .= '</li>';
}

// Display the generated HTML
echo '<ul>' . $output . '</ul>';

// ------------------------------------------------------------------------------------------------------------------------------
// CONTENT
// ------------------------------------------------------------------------------------------------------------------------------

$output = '</div>';
$output .= '</div>';
$output .= '<div class="content-page">';
$output .= '<div class="content-code"></div>';
$output .= '<div class="content">';
echo $output;

foreach ($xml->APIfunction as $item) 
{
	$visible = strtolower(( isset($item->visible) ? $item->visible[0] : "true" ));
	if( $visible == "false" )
		continue;

	$type = strtolower(( isset($item->type) ? $item->type : "html" ));
	$file = 'content/' . $item->source . '.' . $type;
	
	if ( file_exists($file) == false )
	{
		$output = '<div class="overflow-hidden content-section" id="' . $item->source . '">';
		$output .= '<h1>' . $item->title . '</h1>';
		$output .= '<p>FILE NOT FOUND : ' . $file .' !<p>';
		$output .= '</div>'	;
		echo $output;
		continue;
	} 

	$fileContents = ProcessFile( $file );
	if( $fileContents == false )
		continue;

	if( $type == 'php' )
	{
		//ob_start();
		//eval( $fileContents );
		//$output = ob_get_contents();
		//ob_end_clean();

		$tmpfname = tempnam(sys_get_temp_dir(), "");
		rename($tmpfname, $tmpfname .= '.php');
		file_put_contents($tmpfname, $fileContents );

		//$tmpFile = tmpfile();
		//fwrite($tmpFile, $fileContents);
		// Get the path of the temporary file
		//$tmpFilePath = stream_get_meta_data($tmpFile)['uri'];

		include ( $tmpfname );

		//fclose($tmpFile);
		unlink( $tmpfname );
	}
	else
	{
		$output = '<div class="overflow-hidden content-section" id="' . $item->source . '">';
		$output .= '<h1>' . $item->title . '</h1>';
		$output .= $fileContents;
		$output .= '</div>'	;

		echo $output;
	}		
}


// ------------------------------------------------------------------------------------------------------------------------------
// FOOTER
// ------------------------------------------------------------------------------------------------------------------------------

$content = ProcessFile('end-1.html');
echo($content);

echo ('</body>');
echo ('</html>');

// ==============================================================================================================================
// == INTERNAL FUNCTIONS ========================================================================================================
// ==============================================================================================================================
function InitTags()
{
	global $xml, $tags;
	
	$tags['{{Version}}'] = (isset($xml->Version) ? trim($xml->Version) : ''); 
	$tags['{{Author}}'] = (isset($xml->Author) ? trim($xml->Author) : ''); 
	$tags['{{ReleasedDate}}'] = (isset($xml->ReleasedDate) ? trim($xml->ReleasedDate) : '');
	$tags['{{MainTitle}}'] = (isset($xml->MainTitle) ? trim($xml->MainTitle) : '');
	$tags['{{TabTitle}}'] = (isset($xml->TabTitle) ? trim($xml->TabTitle) : '');
	$tags['{{Description}}'] = (isset($xml->Description) ? trim($xml->Description) : '');
	$tags['{{Author}}'] = (isset($xml->Author) ? trim($xml->Author) : '');
	$tags['{{Logo}}'] = (isset($xml->Logo) ? trim($xml->Logo) : 'images/default_logo.png');
	$tags['{{HLTheme}}'] = (isset($xml->HLTheme) ? trim($xml->HLTheme) : 'hightlightjs-dark.css');
	$tags['{{HyperLink1}}'] = (isset($xml->HyperLink1) ? trim($xml->HyperLink1) : '');
	$tags['{{HyperLink2}}'] = (isset($xml->HyperLink2) ? trim($xml->HyperLink2) : '');
	$tags['{{EMail}}'] = (isset($xml->EMail) ? trim($xml->EMail) : 'notdefined@asite.com');
	$tags['{{Copyright}}'] = (isset($xml->Copyright) ? trim($xml->Copyright) : '&copy;');
	$tags['{{GithubLink}}'] = (isset($xml->GithubLink) ? trim($xml->GithubLink) : '');
}

function ProcessFile( $filename )
{
	global $tags;
	
	//include 'start-1.html';
	$fileContents = file_get_contents($filename);
	$replacedContents = str_replace(array_keys($tags), array_values($tags), $fileContents);

	return $replacedContents;
}

?>
