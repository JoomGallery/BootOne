<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
      if($this->_config->get('jg_anchors')): ?>
  <a name="category"></a>
<?php endif;
      if($this->params->get('show_count_img_top')): ?>
  <div class="jg-counts">
<?php   if($this->totalimages == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_IMAGE_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalimages > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_IMAGES_IN_CATEGORY', $this->totalimages); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_img_top')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif;
      if($this->params->get('show_all_in_popup')):
        echo $this->popup['before'];
      endif;
      $count_pics = count($this->images);
      $column     = $this->_config->get('jg_colnumb');
      $num_rows   = ceil($count_pics / $column);
      $index      = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++): ?>
  <ul class="thumbnails">
<?php   for($col_count = 0; ($col_count < $column) && ($index < $count_pics); $col_count++):
          $row = $this->images[$index]; ?>
      <li class="span<?php echo (int) (12 / $column); ?>">
<?php     if(!$row->show_elems): ?>
          <a <?php echo $row->atagtitle; ?> href="<?php echo $row->link; ?>" class="thumbnail">
            <img src="<?php echo $row->thumb_src; ?>" <?php echo $row->imgwh; ?> alt="<?php echo $row->imgtitle; ?>" /></a>
<?php     else: ?>
        <div class="thumbnail">
          <a <?php echo $row->atagtitle; ?> href="<?php echo $row->link; ?>">
            <img src="<?php echo $row->thumb_src; ?>" <?php echo $row->imgwh; ?> alt="<?php echo $row->imgtitle; ?>" /></a>
          <div class="caption jg_catelem_txt">
            <ul class="list-unstyled text-center">
<?php     if($this->_config->get('jg_showtitle') || ($this->_config->get('jg_showpicasnew') && $row->isnew)): ?>
              <li>
<?php       if($this->_config->get('jg_showtitle')): ?>
                <h3><?php echo $row->imgtitle; ?></h3>
<?php       endif;
            if($this->_config->get('jg_showpicasnew')): ?>
                <?php echo $row->isnew; ?>
<?php       endif; ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showauthor')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_AUTHOR_VAR', $row->authorowner);?>
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
                <?php echo JHTML::_('joomgallery.rating', $row, false, 'jg_starrating_cat'); ?>
              </li>
<?php     endif;
          if($this->_config->get('jg_showcatcom')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_COMMENTS_VAR', $row->comments); ?>
              </li>
<?php     endif;
          if($row->imgtext && $this->_config->get('jg_showcatdescription')): ?>
              <li>
                <?php echo JHTML::_('joomgallery.text', JText::sprintf('COM_JOOMGALLERY_COMMON_DESCRIPTION_VAR', $row->imgtext)); ?>
              </li>
<?php     endif; ?>
          <?php echo $row->event->afterDisplayThumb; ?>
<?php     if($this->params->get('show_download_icon') || $this->params->get('show_favourites_icon') || $this->params->get('show_report_icon') || $row->show_edit_icon || $row->show_delete_icon || $row->event->icons): ?>
              <li>
<?php       if($this->params->get('show_download_icon') == 1): ?>
                <a href="<?php echo JRoute::_('index.php?task=download&id='.$row->id); ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'download.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?></a>
<?php       endif;
            if($this->params->get('show_download_icon') == -1): ?>
                <span class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_LOGIN_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'download_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?>
                </span>
<?php       endif;
            if($this->params->get('show_favourites_icon') == 1): ?>
                <a href="<?php echo JRoute::_('index.php?task=favourites.addimage&id='.$row->id.'&catid='.$row->catid); ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPTEXT', true); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'star.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION'); ?></a>
<?php       endif;
            if($this->params->get('show_favourites_icon') == 2): ?>
                <a href="<?php echo JRoute::_('index.php?task=favourites.addimage&id='.$row->id.'&catid='.$row->catid); ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'basket_put.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION'); ?></a>
<?php       endif;
            if($this->params->get('show_favourites_icon') == -1): ?>
                <span class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_NOT_ALLOWED_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'star_gr.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION'); ?>
                </span>
<?php       endif;
            if($this->params->get('show_favourites_icon') == -2): ?>
                <span class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_NOT_ALLOWED_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'basket_put_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION'); ?>
                </span>
<?php       endif;
            if($this->params->get('show_report_icon') == 1):
              JHtml::_('behavior.modal', '.jg-bootone-modal'); ?>
                <a href="<?php echo JRoute::_('index.php?view=report&id='.$row->id.'&catid='.$row->catid.'&tmpl=component'); ?>" class="hasTooltip jg-bootone-modal" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPTEXT'); ?>" rel="{handler:'iframe', size:{x:600,y:520}}"><!--, size:{x:200,y:200}-->
                  <?php echo JHTML::_('joomgallery.icon', 'exclamation.png', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION'); ?></a>
      <?php endif;
            if($this->params->get('show_report_icon') == -1): ?>
                <span class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_NOT_ALLOWED_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'exclamation_gr.png', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION'); ?>
                </span>
<?php       endif;
            if($row->show_edit_icon): ?>
                <a href="<?php echo JRoute::_('index.php?view=edit&id='.$row->id.$this->redirect); ?>" class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPTEXT'); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'edit.png', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION'); ?></a>
<?php       endif;
            if($row->show_delete_icon): ?>
                <a href="javascript:if(confirm('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_SURE_DELETE_SELECTED_ITEM', true); ?>')){ location.href='<?php echo JRoute::_('index.php?task=image.delete&id='.$row->id.$this->redirect, false);?>';}" class="hasTooltip" title="<?php echo JHtml::_('tooltiptext', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPTEXT', true); ?>">
                  <?php echo JHTML::_('joomgallery.icon', 'edit_trash.png', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION'); ?></a>
<?php       endif; ?>
                <?php echo $row->event->icons; ?>
              </li>
<?php     endif; ?>
            </ul>
          </div>
        </div>
<?php endif; ?>
      </li>
<?php     $index++;
        endfor; ?>
  </ul>
<?php endfor;
      if($this->params->get('show_all_in_popup')):
        echo $this->popup['after'];
      endif;
      if($this->params->get('show_count_img_bottom')): ?>
  <div class="jg-counts">
<?php   if($this->totalimages == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_IMAGE_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalimages > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_IMAGES_IN_CATEGORY', $this->totalimages); ?>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_pagination_img_bottom')): ?>
  <div class="pagination">
    <?php echo $this->pagination->getPagesLinks(); ?>
  </div>
<?php endif;