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
$textcolor = ($this->params->get('textcolor', '#000'));
$sitebackgroundcolor = ($this->params->get('sitebackgroundcolor', '#eeeeee'));
$innerbackgroundcolor = ($this->params->get('innerbackgroundcolor', '#ffffff'));
$fontsize = ($this->params->get('fontsize', '20px'));
$h1size = ($this->params->get('h1size', '32px'));
$h2size = ($this->params->get('h2size', '30px'));
$h3size = ($this->params->get('h3size', '26px'));
$templatewidth = ($this->params->get('templatewidth', '900px'));
$headertype = ($this->params->get('headertype', 'sitename'));
$headeralignment = ($this->params->get('headeralignment', 'sitename'));

if ($headertype == 'headerimage') {
		$headercontent = '<img class="headerimage" src="' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('headerimage'), ENT_QUOTES) . '" alt="' . $sitename . '">';
	} elseif ($headertype ==  'owntext') {
		$headercontent = '<h1>' . $headerownext . '</h1>';
	} elseif ($headertype ==  'sitename') {
		$headercontent = '<h1>' . $sitename . '</h1>';
	} 
  elseif ($headertype ==  'nothing') {
		$headercontent = '';
	} 
	
$sitebackgroundtype = ($this->params->get('sitebackgroundtype', 'color'));
$sitebackgroundcolor = ($this->params->get('sitebackgroundcolor', '#eeeeee'));
$sitebackgroundimage = ($this->params->get('sitebackgroundimage', 'sitename'));
$innerbackgroundopacity = ($this->params->get('innerbackgroundopacity', '1'));	

if ($sitebackgroundtype == 'image') {
		$sitebodybackgroundcsscode = 'background-color: transparent;';
		$sitehtmlbackgroundcsscode = 'background: url("' . Uri::root(true) . '/' . htmlspecialchars($this->params->get('sitebackgroundimage'), ENT_QUOTES) . '") no-repeat top center fixed; background-size: cover;';
	  } elseif ($sitebackgroundtype ==  'color') {
		$sitebodybackgroundcsscode = 'background-color:'.$sitebackgroundcolor.';';
		$innerbackgroundopacity = "1";
	} 	
$innerbackgroundroundedborders = ($this->params->get('innerbackgroundroundedborders', '5px'));	