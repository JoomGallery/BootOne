<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1)); ?>
  <div class="jg-bootone-favourites">
    <div class="well well-small">
      <div class="row-fluid">
        <div class="offset2 span8">
          <?php echo $this->output('HEADING'); ?>
        </div>
        <div class="span2">
          <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&task=favourites.removeall'); ?>">
            <?php echo JText::_('COM_JOOMGALLERY_FAVOURITES_REMOVE_ALL'); ?>
          </a>
        </div>
      </div>
    </div>
<?php if(!$count = count($this->rows)): ?>
    <div class="row-fluid">
      <div class="span12">
        <?php echo JHTML::_('joomgallery.icon', 'arrow.png', 'arrow'); ?>
        <?php echo $this->output('NO_IMAGES'); ?>
      </div>
    </div>
<?php endif;
      $num_rows = ceil($count / $this->_config->get('jg_toplistcols'));
      $index    = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++): ?>
    <ul class="thumbnails">
<?php   for($col_count = 0; ($col_count < $this->_config->get('jg_toplistcols')) && ($index < $count); $col_count++):
          $row = $this->rows[$index]; ?>
      <li class="span<?php echo (int) (12 / $this->_config->get('jg_toplistcols')); ?>">
        <div class="thumbnail">
          <a href="<?php echo $row->link; ?>" <?php echo $row->atagtitle; ?>>
            <img src="<?php echo $row->thumb_src; ?>" alt="<?php echo $row->imgtitle; ?>" />
          </a>
          <div class="caption">
            <ul class="unstyled text-center">
              <li>
                <h3><?php echo $row->imgtitle; ?></h3>
              </li>
              <li>
                <?php echo JText::_('COM_JOOMGALLERY_COMMON_CATEGORY'); ?>
                <a href="<?php echo JRoute::_('index.php?view=category&catid='.$row->catid); ?>">
                  <?php echo $row->name; ?>
                </a>
              </li>
<?php     if($this->_config->get('jg_showauthor')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_AUTHOR_VAR', $row->authorowner); ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showhits')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_HITS_VAR', $row->hits); ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showdownloads')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_DOWNLOADS_VAR', $row->downloads); ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showcatrate')): ?>
              <li>
                <?php echo JHTML::_('joomgallery.rating', $row, false, 'jg_starrating_top'); ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showcatcom')): ?>
              <li>
<?php       switch($row->comments)
            {
              case 0: ?>
                <?php echo JText::_('COM_JOOMGALLERY_COMMON_NO_COMMENTS'); ?>
<?php           break;
              case 1: ?>
                <?php echo $row->comments.' '.JText::_('COM_JOOMGALLERY_COMMON_COMMENT'); ?>
<?php           break;
              default: ?>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_COMMENTS_VAR', $row->comments); ?>
<?php           break;
            } ?>
              </li>
<?php     endif;
          $results = $this->_mainframe->triggerEvent('onJoomAfterDisplayThumb', array($row->id));
          echo implode('', $results) ?>
              <li>
<?php     if($this->params->get('show_download_icon') == 1): ?>
                <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&task=download&id='.$row->id); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'download.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?></a>
<?php     endif;
          if($this->params->get('show_download_icon') == -1): ?>
                <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_LOGIN_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'download_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?>
                </span>
<?php     endif; ?>
                <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&task=favourites.removeimage&id='.$row->id); ?>"<?php echo JHTML::_('joomgallery.tip', $this->output('REMOVE_TIPTEXT'), $this->output('REMOVE_TIPCAPTION'), true, false); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'basket_remove.png', $this->output('REMOVE_TIPCAPTION'), null, null, false); ?></a>
<?php     if($row->show_edit_icon): ?>
                <a href="<?php echo JRoute::_('index.php?view=edit&id='.$row->id.$this->redirect); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'edit.png', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION'); ?></a>
<?php     endif;
          if($row->show_delete_icon): ?>
                <a href="javascript:if(confirm('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_SURE_DELETE_SELECTED_ITEM', true); ?>')){ location.href='<?php echo JRoute::_('index.php?task=image.delete&id='.$row->id.$this->redirect, false);?>';}"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'edit_trash.png', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION'); ?></a>
<?php     endif; ?>
              </li>
            </ul>
          </div>
        </div>
      </li>
<?php     $index++;
        endfor; ?>
    </ul>
<?php endfor; ?>
  </div>
<?php echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));