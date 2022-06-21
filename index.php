<?php
defined('_JEXEC') or die('Restricted access'); 
/**
* ahsimple Joomla! Template
* @copyright   (C) 2021 Andre Hotzler https://www.andrehotzler.de/
* @license     GNU General Public License version 2 or later; see LICENSE.txt
**/

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('jquery.framework');
HTMLHelper::_('bootstrap.framework');
HTMLHelper::_('bootstrap.dropdown');
HTMLHelper::_('bootstrap.loadCss');

$app             = JFactory::getApplication();
$document             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $document->language;
$this->direction = $document->direction;
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';

// Getting params from template
$params = $app->getTemplate(true)->params;
// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

$ahtemplatepath = '/templates/'.$this->template.'/css/';
$ahtemplaterootpath = JPATH_BASE.$ahtemplatepath;

// Loading Template-CSS Files
// specify all css-files in an array
$templatecssfiles = array ("template.min.css");
// Loop
foreach ($templatecssfiles as $templatecssfile)	{
	$templatefilecrcfullpath = $ahtemplaterootpath.$templatecssfile;
	$templatefilecrc = crc32(filemtime($templatefilecrcfullpath));
	$document->addStyleSheet($ahtemplatepath.$templatecssfile.'?'.$templatefilecrc);

	};
	
include('parameters.php');
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="DC.language" content="<?php echo $this->language; ?>" />
	<meta name="viewport" content="width=device-width">
	<jdoc:include type="metas" />
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
	<script>
			function toggle() {
      	var ele = document.getElementById("mobilemenucontainer");
        var text = document.getElementById("displayText");
        if(ele.style.display == "block") {
        	ele.style.display = "none";
          text.innerHTML = "<span class=\"fa fa-bars\"></span><?php echo $menuopenertext ?>";
        }
        else {
        	ele.style.display = "block";
        	text.innerHTML = "<span class=\"fa fa-bars\"></span></span><?php echo $menuclosetext ?>";
        }
        }
	</script>	
	<style>
		hr, h1, h2, h3, h4, h5, h6, a, a:hover, a#displayText, a#displayText:hover, #mobilemenucontainer ul li.active a, #mobilemenucontainer ul li a{
			color: 	<?php echo $contrastcolor ?>;
		}
		.navbar-light .navbar-nav .nav-link.active, .navbar-light .navbar-nav .show>.nav-link {
			color: <?php echo $contrastcolor ?> 
		}
		hr {
			border-top: 2px solid <?php echo $contrastcolor ?>;
			opacity: 1;
		}
		.navbar-light .navbar-toggler {
			color: <?php echo $contrastcolor ?> 
		}
		.w1 {
			width: <?php echo $templatewidth ?>;
		}
		body {
			font-size: <?php echo $fontsize ?>;
			color: <?php echo $textcolor ?>;
		  <?php echo $sitebodybackgroundcsscode ?>;
		}
		body:after {
			display: none;
			<?php echo $sitebodybackgroundaftercsscode ?>;
		}

		html {
			<?php echo $sitehtmlbackgroundcsscode ?>;
		}
		h1 {
			font-size: <?php echo $h1size ?>;
		}
		h2 {
			font-size: <?php echo $h2size ?>;
		}
		h3 {
			font-size: <?php echo $h3size ?>;
		}
		.header {
			text-align: <?php echo $headeralignment ?>;
		}
		#maincontainer {
			background-color: <?php echo $innerbackgroundcolor ?>;
			opacity: <?php echo $innerbackgroundopacity ?>;
			max-width: <?php echo $templatewidth ?>;
			border-radius: <?php echo $innerbackgroundroundedborders  ?>;
		}
		#atthetop {
			background-color: <?php echo $innerbackgroundcolor ?>;
			opacity: <?php echo $innerbackgroundopacity ?>;
			max-width: <?php echo $templatewidth ?>;
			border-bottom-left-radius: <?php echo $innerbackgroundroundedborders  ?>;
			border-bottom-right-radius: <?php echo $innerbackgroundroundedborders  ?>;
		}
	</style>
</head>
<body class="site <?php echo $option 	. ' ' . $wrapper . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task') . ($itemid ? ' itemid-' . $itemid : '') . ($pageclass ? ' ' . $pageclass : '') . $hasClass . ($this->direction == 'rtl' ? ' rtl' : ''); ?>">
<div id="atthetop">
	<jdoc:include type="modules" name="atthetop" style="html5" />		
</div>
<div id="maincontainer" class="container shadow-sm p-4 p-sm-4 p-md-4 p-lg-5 mb-0 mt-0 mb-sm-2 mt-sm-2 mb-md-3 mt-md-3 mb-lg-4 mt-lg-4">
  <div class="header mb-4" role="heading">
		<jdoc:include type="modules" name="header" style="raw" />			
		<?php echo $headercontent ?>
	</div>
	<div class="menu mt-3 mb-3 noprint">
		<jdoc:include type="modules" name="menu" />	
	</div>
  <div class="content" role="main">
  	<jdoc:include type="modules" name="pathway" style="html5" />	
  	<jdoc:include type="message" />
  	<jdoc:include type="component" />				
  	<div class="clearfix"></div>
  </div>
  <div class="footer" role="contentinfo">
  	<hr>
		<jdoc:include type="modules" name="footer" style="html5" />	
	</div>
</div>
</body> 
</html>

