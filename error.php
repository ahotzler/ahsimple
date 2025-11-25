<?php
defined('_JEXEC') or die('Restricted access'); 
/**
* ahsimple Joomla! Template
* @copyright   (C) 2022 Andre Hotzler https://www.andrehotzler.de/
* @license     GNU General Public License version 2 or later; see LICENSE.txt
**/

use Joomla\CMS\Factory;
use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('jquery.framework');
HTMLHelper::_('bootstrap.framework');
HTMLHelper::_('bootstrap.dropdown');
HTMLHelper::_('bootstrap.loadCss');

$document	= Joomla\CMS\Factory::getDocument();
$user		= Joomla\CMS\Factory::getUser();
$app   = Joomla\CMS\Factory::getApplication();
$input = $app->getInput();
$wa    = $this->getWebAssetManager();

$this->language  = $document->language;
$this->direction = $document->direction;

// Detecting Active Variables
$option   = $input->getCmd('option', '');
$view     = $input->getCmd('view', '');
$layout   = $input->getCmd('layout', '');
$task     = $input->getCmd('task', '');
$itemid   = $input->getCmd('Itemid', '');
$sitename = htmlspecialchars($app->get('sitename'), ENT_QUOTES, 'UTF-8');
$menu     = $app->getMenu()->getActive();
$pageclass = $menu !== null ? $menu->getParams()->get('pageclass_sfx', '') : '';


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
$errorCode = $this->error->getCode();
?>
<!DOCTYPE html> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="DC.language" content="<?php echo $this->language; ?>">
	<meta name="viewport" content="width=device-width">
	<jdoc:include type="metas" />
	<?php echo $custommeta ?>
	
	<jdoc:include type="styles" />
	<jdoc:include type="scripts" />
	<style>
		.navbar-collapse  {
			--bs-bg-opacity: <?php echo $menubackgroundopacity ?>;;
		}
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
		#maincontainer ul.mod-menu {
			border-color: 	<?php echo $contrastcolor ?>;
		}
		#maincontainer ul.mod-menu li a {
			color: <?php echo $textcolor ?> 
		}
		#maincontainer ul.mod-menu li.active a {
			color: <?php echo $contrastcolor ?> 
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
			background: <?php echo $innerbackgroundcolor ?>;
			max-width: <?php echo $templatewidth ?>;
			border-radius: <?php echo $innerbackgroundroundedborders  ?>;
			padding: <?php echo $innerpaddingmobile ?> 
		}
		@media (min-width: 992px) {
			#maincontainer {
				padding: <?php echo $innerpaddingdesktop ?> 
			}
		}
		#atthetop {
			background-color: <?php echo $innerbackgroundcolor ?>;
			opacity: <?php echo $innerbackgroundopacity ?>;
			max-width: <?php echo $templatewidth ?>;
			border-bottom-left-radius: <?php echo $innerbackgroundroundedborders  ?>;
			border-bottom-right-radius: <?php echo $innerbackgroundroundedborders  ?>;
		}
		.item-page img.left, .blog-item img.left, .item-page img.right, .blog-item img.right  {
			width: <?php echo $alignedcontentimagewidth ?>;
		}
		.item-page figure.right, .blog-item figure.right, .item-page figure.left, .blog-item figure.left {
			width: <?php echo $alignedintroimagewidth ?>;
		}
		@media only screen and (max-width: <?php echo $templatewidth ?>) {	
    	#maincontainer {
        	border-radius: 0px !important;
    	}
    	<?php if (isset($alignedintroimagefullwidthcode)) { echo $alignedintroimagefullwidthcode; } ?>
     	<?php if (isset($alignedcontimagefullwidthcode)) { echo $alignedcontimagefullwidthcode; } ?>	
		}
		<?php if (isset($differentcontentlinkcolorcode)) { echo $differentcontentlinkcolorcode; } ?>	
		<?php if (isset($hyperlinkiconcode)) { echo $hyperlinkiconcode; } ?>	
		<?php echo $customcsscode ?>
	</style>
</head>
<body class="site <?php echo $option . ' ' . ' view-' . $view . ($layout ? ' layout-' . $layout : ' no-layout') . ($task ? ' task-' . $task : ' no-task') . ($itemid ? ' itemid-' . $itemid : '') . ($pageclass ? ' ' . $pageclass : '') . ($this->direction == 'rtl' ? ' rtl' : ''); ?>">
<div id="atthetop">
	<jdoc:include type="modules" name="atthetop" style="html5" />		
</div>
<div id="maincontainer" class="container shadow-sm  mb-0 mt-0 mb-sm-2 mt-sm-2 mb-md-3 mt-md-3 mb-lg-4 mt-lg-4">
	<header>
  	<div class="header mb-4">
			<jdoc:include type="modules" name="header" style="raw" />			
			<?php echo $headercontent ?>
		</div>
	</header>
	<nav>
		<div class="menu mt-3 mb-3 noprint">
			<jdoc:include type="modules" name="menu" />	
		</div>
	</nav>
	<main>
  	<div class="content">
  			
 <?php if ($this->countModules('error-' . $errorCode)) : ?>
                <div class="container">
                    <jdoc:include type="message" />
                        <jdoc:include type="modules" name="error-<?php echo $errorCode; ?>" style="none" />
                </div>
            <?php else : ?>
            <h1 class="page-header"><?php echo Text::_('JERROR_LAYOUT_PAGE_NOT_FOUND'); ?></h1>

                    <jdoc:include type="message" />
                        <p><?php echo Text::_('JERROR_LAYOUT_ERROR_HAS_OCCURRED_WHILE_PROCESSING_YOUR_REQUEST'); ?>
							<?php echo $this->error->getCode(); ?> - <?php echo htmlspecialchars($this->error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
						</p>
						<p>
						<a href="<?php echo $this->baseurl; ?>/index.php"><span class="icon-home" aria-hidden="true"></span> <?php echo Text::_('JERROR_LAYOUT_HOME_PAGE'); ?></a>
						</p>

            <?php endif; ?>
            <?php if ($this->debug) : ?>
                <div>
                    <?php echo $this->renderBacktrace(); ?>
                    <?php // Check if there are more Exceptions and render their data as well ?>
                    <?php if ($this->error->getPrevious()) : ?>
                        <?php $loop = true; ?>
                        <?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
                        <?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
                        <?php $this->setError($this->_error->getPrevious()); ?>
                        <?php while ($loop === true) : ?>
                            <p><strong><?php echo Text::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
                            <p><?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?></p>
                            <?php echo $this->renderBacktrace(); ?>
                            <?php $loop = $this->setError($this->_error->getPrevious()); ?>
                        <?php endwhile; ?>
                        <?php // Reset the main error object to the base error ?>
                        <?php $this->setError($this->error); ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

    
  		<div class="clearfix"></div>
  	</div>
  </main>
  <footer>
  	<div class="footer" >
  		<hr>
			<jdoc:include type="modules" name="footer" style="html5" />	
		</div>
	</footer>
</div>
<?php echo $customcodeattheend ?>
</body> 
</html>