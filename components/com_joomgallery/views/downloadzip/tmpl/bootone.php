<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1)); ?>
  <div class="well well-small">
    <?php echo $this->output('DOWNLOAD'); ?>
  </div>
  <div class="row-fluid">
    <div class="span12 text-center">
      <a href="<?php echo $this->zipname; ?>">
        <?php echo JText::_('COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD_READY'); ?>
        <span class="icon icon-download"></span>
      </a>
      <p><?php echo JText::sprintf('COM_JOOMGALLERY_DOWNLOADZIP_FILESIZE', $this->zipsize); ?></p>
      <p>
        <a href="<?php echo JRoute::_('index.php?task=favourites.removeall'); ?>" class="list-group-item">
          <?php echo $this->output('CREATEZIP_REMOVE_ALL'); ?></a>
      </p>
    </div>
  </div>
<?php echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));