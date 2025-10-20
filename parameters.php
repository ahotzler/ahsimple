<?php
defined('_JEXEC') or die('Restricted access'); 
/**
* ahsimple Joomla! Template
* @copyright   (C) 2021 Andre Hotzler https://www.andrehotzler.de/
* @license     GNU General Public License version 2 or later; see LICENSE.txt
**/
use Joomla\CMS\Uri\Uri;
// Logo file or site title param

$headerownext = ($this->params->get('headerownext', 'My Own Site'));
$contrastcolor = ($this->params->get('contrastcolor', '#b85353'));
$differentcontentlinkcolor = ($this->params->get('differentcontentlinkcolor', '0'));	
$hyperlinkcontentcolor = ($this->params->get('hyperlinkcontentcolor', '#b85353'));
if ($differentcontentlinkcolor == '1') {
	$differentcontentlinkcolorcode = '.component a { color: '.$hyperlinkcontentcolor.'; }';

};
$textcolor = ($this->params->get('textcolor', '#000'));
$sitebackgroundcolor = ($this->params->get('sitebackgroundcolor', '#eeeeee'));
$innerbackgroundcolor = ($this->params->get('innerbackgroundcolor', '#ffffff'));
$innerpaddingdesktop = ($this->params->get('innerpaddingdesktop', '48px'));
$innerpaddingmobile = ($this->params->get('innerpaddingmobile', '24px'));
$fontsize = ($this->params->get('fontsize', '20px'));
$h1size = ($this->params->get('h1size', '32px'));
$h2size = ($this->params->get('h2size', '30px'));
$h3size = ($this->params->get('h3size', '26px'));
$templatewidth = ($this->params->get('templatewidth', '900px'));
$headertype = ($this->params->get('headertype', 'sitename'));
$linkedheader = ($this->params->get('linkedheader', 'no'));
$headeralignment = ($this->params->get('headeralignment', 'sitename'));


if ($headertype == 'headerimage') {
	if ($linkedheader == 'yes') {
			$headercontent = '<a href="/" title="'.$sitename.'"><img class="headerimage" src="' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('headerimage'), ENT_QUOTES) . '" alt="' . $sitename . '"></a>';
		} else {
			$headercontent = '<img class="headerimage" src="' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('headerimage'), ENT_QUOTES) . '" alt="' . $sitename . '">';
		}
	} elseif ($headertype ==  'owntext') {
		if ($linkedheader == 'yes') {
			$headercontent = '<a href="/" title="Home"><h1>' . $headerownext . '</h1></a>';
		} else {
			$headercontent = '<h1>' . $headerownext . '</h1>';
		}
	} elseif ($headertype ==  'sitename') {
		if ($linkedheader == 'yes') {
			$headercontent = '<a href="/" title="Home"><h1>' . $sitename . '</h1></a>';
		} else {
			$headercontent = '<h1>' . $sitename . '</h1>';
		}
	}    elseif ($headertype ==  'nothing') {
		$headercontent = '';
	} 
	
$sitebackgroundtype = ($this->params->get('sitebackgroundtype', 'color'));
$sitebackgroundcolor = ($this->params->get('sitebackgroundcolor', '#eeeeee'));
$sitebackgroundimage = ($this->params->get('sitebackgroundimage', 'sitename'));
$innerbackgroundopacity = ($this->params->get('innerbackgroundopacity', '1'));	
$menubackgroundopacity = $innerbackgroundopacity - 0.3; 
if ($sitebackgroundtype == 'image') {
	$sitebodybackgroundcsscode = 'background-color: transparent;';
	$sitebodybackgroundaftercsscode = 'content: url("'. Uri::root(true) . '/' . htmlspecialchars($this->params->get('sitebackgroundimage'), ENT_QUOTES) .'");';
	$sitehtmlbackgroundcsscode = 'background: url("' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('sitebackgroundimage'), ENT_QUOTES) . '") no-repeat top center fixed; background-size: cover;';
	 } elseif ($sitebackgroundtype ==  'color') {
	$sitebodybackgroundcsscode = 'background-color:'.$sitebackgroundcolor.';';
	$innerbackgroundopacity = "1";
	} 	
$innerbackgroundroundedborders = ($this->params->get('innerbackgroundroundedborders', '5px'));	
$customcsscode = ($this->params->get('customcsscode', ''));	
$customcodeattheend = ($this->params->get('customcodeattheend', ''));	
$custommeta = ($this->params->get('custommeta', ''));	
$alignedcontentimagewidth = ($this->params->get('alignedcontentimagewidth', '40%'));	
$alignedintroimagewidth = ($this->params->get('alignedintroimagewidth', '40%'));	
$alignedintroimagefullwidth = ($this->params->get('alignedintroimagefullwidth', '1'));	
if ($alignedintroimagefullwidth == '1') {
	$alignedintroimagefullwidthcode = '.item-page figure.right, .blog-item figure.right, .item-page figure.left, .blog-item figure.left, .item-page figure.right img, .item-page figure.left img {
			margin-left: 0px;
			margin-right: 0px;
			width: 100%;	
			}';
}
$alignedcontimagefullwidth = ($this->params->get('alignedcontimagefullwidth', '0'));	
if ($alignedcontimagefullwidth == '1') {
	$alignedcontimagefullwidthcode = '.item-page img.left, .blog-item img.left, .item-page img.right, .blog-item img.right {
		margin-left: 0px;
		margin-right: 0px;
		width: 100%;
		}';
}
$hyperlinkicon = ($this->params->get('hyperlinkicon', '0'));	

if ($hyperlinkicon == '1') {
	$hyperlinkiconchar = ($this->params->get('hyperlinkiconchar', '\F08E'));	
	$hyperlinkteliconchar = ($this->params->get('hyperlinkteliconchar', '\F879'));	
	$hyperlinkiconcode = '.component a::before {
		font-family: "Font Awesome 6 Free";
		content: "'.$hyperlinkiconchar.'";
		margin-right: .35em;
		display: inline-block;
		font-size: 0.9em; }
		.component a[href^="tel"]::before {
		content: "'.$hyperlinkteliconchar.'" };	
		';
};
function hexToRgba($hex, $alpha = 1.0) {
    // Hex ohne # verarbeiten
    $hex = str_replace('#', '', $hex);

    // Unterst�tzt 3- und 6-stellige Hex-Codes
    if (strlen($hex) === 3) {
        $hex = str_repeat($hex[0], 2) . str_repeat($hex[1], 2) . str_repeat($hex[2], 2);
    }

    // �berpr�fen, ob der Hex-Farbcode g�ltig ist
    if (strlen($hex) !== 6) {
        return "Ung�ltiger Hex-Farbcode";
    }

    // RGB-Werte mit sscanf extrahieren
    list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");

    // RGBA-Wert zur�ckgeben
    return "rgba($r, $g, $b, $alpha)";
}

// Beispielaufrufe
$innerbackgroundcolor = hexToRgba($innerbackgroundcolor, $innerbackgroundopacity); // Ausgabe: rgba(255, 87, 51, 1)

