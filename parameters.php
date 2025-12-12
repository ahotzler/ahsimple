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
    $hyperlinkemailiconchar = ($this->params->get('hyperlinkemailiconchar', '\F0E0'));	
	$hyperlinkiconcode = '
    .item-content :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a::before, .item-page :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a::before {
        font-family: "Font Awesome 6 Free";
        content: "'.$hyperlinkiconchar.'";
        margin-right: .35em;
        font-size: 0.9em;
    }
    .item-content :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a[href^="tel"]::before, .item-page :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a[href^="tel"]::before  {
        content: "'.$hyperlinkteliconchar.'";
    }
    .item-content :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a[href^="mailto"]::before, .item-page :not(h1):not(h2):not(h3):not(h4):not(h5):not(h6) > a[href^="mailto"]::before  {
        content: "'.$hyperlinkemailiconchar.'";
    }
	';
};
function hexToRgba($hex, $alpha = 1.0) {
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) === 3) {
        $hex = str_repeat($hex[0], 2) . str_repeat($hex[1], 2) . str_repeat($hex[2], 2);
    }
    if (strlen($hex) !== 6) {
        return "Ung�ltiger Hex-Farbcode";
    }
    list($r, $g, $b) = sscanf($hex, "%02x%02x%02x");

    return "rgba($r, $g, $b, $alpha)";
}

$innerbackgroundcolor = hexToRgba($innerbackgroundcolor, $innerbackgroundopacity); 

// ===============================================
//  FONT-PARAMETER EINLESEN
// ===============================================
$fontFamily                 = $this->params->get('font_family', 'Roboto');
$fontVariantRoboto          = $this->params->get('font_variant_roboto', 'Regular');
$fontVariantRobotoCondensed = $this->params->get('font_variant_roboto_condensed', 'Regular');
$fontVariantRobotoSlab      = $this->params->get('font_variant_roboto_slab', 'Regular');

// Debug für index.php (optional)
$debug_font_family  = $fontFamily;
$debug_font_variant = null;

// CSS-Variable vorbereiten
$font_css = '';

$fontFallbackSans = ", Arial, Helvetica, sans-serif";


// ===============================================
//  SWITCH: SCHRIFTFAMILIE
// ===============================================
switch ($fontFamily) {

    // ------------------------------------------
    // 1) ARIAL
    // ------------------------------------------
    case 'Arial':
        $debug_font_variant = '';
        $font_css = "
            body {
                font-family: Arial, Helvetica, sans-serif;
            }
        ";
        break;


    // ------------------------------------------
    // 2) TIMES
    // ------------------------------------------
    case 'Times':
        $debug_font_variant = '';
        $font_css = "
            body {
                font-family: 'Times New Roman', Times, serif;
            }
        ";
        break;


    // ------------------------------------------
    // 3) ROBOTO (Gewichte nutzen)
// ------------------------------------------
    case 'Roboto':
        $debug_font_variant = $fontVariantRoboto;

        $bodyFontFamily = "'Roboto'{$fontFallbackSans}";

        // Default-Werte (für Sicherheit)
        $bodyWeight      = 400;
        $strongWeight    = 500;
        $boldItalicWeight= 700;

        switch ($fontVariantRoboto) {
            case 'Thin':    // 100
                $bodyWeight       = 100;
                $strongWeight     = 300; // Light
                $boldItalicWeight = 400; // Regular
                break;

            case 'Light':   // 300
                $bodyWeight       = 300;
                $strongWeight     = 400; // Regular
                $boldItalicWeight = 500; // Medium
                break;

            case 'Regular': // 400
                $bodyWeight       = 400;
                $strongWeight     = 500; // Medium
                $boldItalicWeight = 700; // Bold
                break;

            case 'Medium':  // 500
                $bodyWeight       = 500;
                $strongWeight     = 700; // Bold
                $boldItalicWeight = 900; // Black
                break;

            case 'Bold':    // 700
            default:
                $bodyWeight       = 700;
                $strongWeight     = 900; // Black
                $boldItalicWeight = 900;
                break;
        }

        $font_css = "
            body {
                font-family: {$bodyFontFamily};
                font-weight: {$bodyWeight};
            }

            strong, b, h1, h2, h3, h4, h5, h6 {
                font-family: {$bodyFontFamily};
                font-weight: {$strongWeight};
            }

            em, i {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$bodyWeight};
            }

            strong em,
            strong i,
            b em,
            b i,
            em strong,
            i strong {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$boldItalicWeight};
            }
        ";
        break;


    // ------------------------------------------
    // 4) ROBOTO CONDENSED
    // ------------------------------------------
    case 'Roboto-Condensed':
        $debug_font_variant = $fontVariantRobotoCondensed;

        $bodyFontFamily = "'Roboto-Condensed'{$fontFallbackSans}";

        // Roboto Condensed: Light (300), Regular (400), Bold (700)
        $bodyWeight       = 400;
        $strongWeight     = 700;
        $boldItalicWeight = 700;

        switch ($fontVariantRobotoCondensed) {
            case 'Light':   // 300
                $bodyWeight       = 300;
                $strongWeight     = 400;
                $boldItalicWeight = 700;
                break;

            case 'Regular':
            default:
                $bodyWeight       = 400;
                $strongWeight     = 700;
                $boldItalicWeight = 700;
                break;
        }

        $font_css = "
            body {
                font-family: {$bodyFontFamily};
                font-weight: {$bodyWeight};
            }

            strong, b {
                font-family: {$bodyFontFamily};
                font-weight: {$strongWeight};
            }

            em, i {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$bodyWeight};
            }

            strong em,
            strong i,
            b em,
            b i,
            em strong,
            i strong {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$boldItalicWeight};
            }
        ";
        break;


    // ------------------------------------------
    // 5) ROBOTO SLAB
    // ------------------------------------------
    case 'Roboto-Slab':
        $debug_font_variant = $fontVariantRobotoSlab;

        $bodyFontFamily = "'Roboto-Slab'{$fontFallbackSans}";

        // Roboto Slab: Thin (100), Light (300), Regular (400), Bold (700)
        $bodyWeight       = 400;
        $strongWeight     = 700;
        $boldItalicWeight = 700;

        switch ($fontVariantRobotoSlab) {
            case 'Thin':    // 100
                $bodyWeight       = 100;
                $strongWeight     = 300;
                $boldItalicWeight = 400;
                break;

            case 'Light':   // 300
                $bodyWeight       = 300;
                $strongWeight     = 400;
                $boldItalicWeight = 700;
                break;

            case 'Regular':
            default:
                $bodyWeight       = 400;
                $strongWeight     = 700;
                $boldItalicWeight = 700;
                break;
        }

        $font_css = "
            body {
                font-family: {$bodyFontFamily};
                font-weight: {$bodyWeight};
            }

            strong, b {
                font-family: {$bodyFontFamily};
                font-weight: {$strongWeight};
            }

            em, i {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$bodyWeight};
            }

            strong em,
            strong i,
            b em,
            b i,
            em strong,
            i strong {
                font-family: {$bodyFontFamily};
                font-style: italic;
                font-weight: {$boldItalicWeight};
            }
        ";
        break;


    // ------------------------------------------
    // 6) FALLBACK (sollte selten vorkommen)
// ------------------------------------------
    default:
        $font_css = '';
        break;
}
