<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1)); ?>
  <div class="panel panel-default">
    <div class="panel-heading"><?php echo $this->output('DOWNLOAD'); ?></div>
    <div class="panel-body">
      <a href="<?php echo $this->zipname; ?>">
        <?php echo JText::_('COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD_READY'); ?>
        <span class="glyphicon glyphicon-download"></span>
      </a>
      <div><?php echo JText::sprintf('COM_JOOMGALLERY_DOWNLOADZIP_FILESIZE', $this->zipsize); ?></div>
    </div>
    <div class="list-group">
      <a href="<?php echo JRoute::_('index.php?task=favourites.removeall'); ?>" class="list-group-item"><?php echo $this->output('CREATEZIP_REMOVE_ALL'); ?></a>
    </div>
  </div>
<?php echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));