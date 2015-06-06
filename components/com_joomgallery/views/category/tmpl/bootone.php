<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');

echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1));

if(count($this->categories)):
  echo $this->loadTemplate('subcategories');
endif;

if(count($this->images)):
  echo $this->loadTemplate('head');
  echo $this->loadTemplate('images');
endif;

echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));