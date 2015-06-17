<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
      if($this->_config->get('jg_anchors')): ?>
<a name="subcategory"></a>
<?php endif;
      if($this->params->get('show_count_cat_top')): ?>
<div class="jg-counts">
<?php   if($this->totalcategories == 1): ?>
  <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_SUBCATEGORY_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalcategories > 1): ?>
  <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_SUBCATEGORIES_IN_CATEGORY', $this->totalcategories); ?>
<?php   endif; ?>
</div>
<?php endif;
      if($this->params->get('show_pagination_cat_top')): ?>
<div class="pagination">
  <?php echo $this->catpagination->getPagesLinks(); ?>
</div>
<?php endif; ?>
<div class="jg-subcategories">
<?php if($this->_config->get('jg_showsubcathead')): ?>
    <div class="well well-small">
      <div class="row-fluid">
        <div class="offset2 span8">
          <?php echo JText::_('COM_JOOMGALLERY_COMMON_SUBCATEGORIES'); ?>
        </div>
        <div class="span2 text-right">
<?php   if($this->params->get('show_feed_icon')): ?>
          <a href="<?php echo $this->params->get('feed_url'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_CATEGORY_FEED_SUBCATEGORIES_TIPTEXT', 'COM_JOOMGALLERY_CATEGORY_FEED_TIPCAPTION', true); ?>>
            <?php echo JHtml::_('joomgallery.icon', 'feed.png', 'COM_JOOMGALLERY_CATEGORY_FEED_TIPCAPTION'); ?>
          </a>
<?php     $this->params->set('show_feed_icon', 0);
        endif;
        if($this->params->get('show_upload_icon')):
          JHtml::_('behavior.modal', '.jg-bootone-modal'); ?>
          <a href="<?php echo JRoute::_('index.php?view=mini&format=raw&upload_category='.$this->category->cid); ?>" class="jg-bootone-modal<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPTEXT', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?>" rel="{handler: 'iframe', size: {x: 620, y: 550}}">
            <?php echo JHtml::_('joomgallery.icon', 'add.png', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?>
          </a>
<?php     $this->params->set('show_upload_icon', 0);
        endif; ?>
        </div>
      </div>
    </div>
<?php endif; ?>
    <div class="row-fluid jg-thumbnails-area">
<?php $cat_count = count($this->categories);
      $num_rows  = ceil($cat_count / $this->_config->get('jg_colsubcat'));
      $index     = 0;
      for($row_count = 0; $row_count < $num_rows; $row_count++): ?>
    <ul class="thumbnails">
<?php   for($col_count = 0; ($col_count < $this->_config->get('jg_colsubcat')) && ($index < $cat_count); $col_count++):
          $row = $this->categories[$index]; ?>
      <li class="span<?php echo (int) (12 / $this->_config->get('jg_colsubcat')); ?>">
        <div class="thumbnail">
<?php     if($this->_config->get('jg_showsubthumbs') && $row->thumb_src): ?>
          <a title="<?php echo $row->name; ?>" href="<?php echo $row->link; ?>">
            <img src="<?php echo $row->thumb_src; ?>" hspace="4" vspace="0" alt="<?php echo $row->name; ?>" />
          </a>
<?php     endif; ?>
          <div class="caption">
            <ul class="unstyled">
              <li>
<?php     if(in_array($row->access, $this->_user->getAuthorisedViewLevels())): ?>
                <a href="<?php echo $row->link; ?>">
                  <h3><?php echo $this->escape($row->name); ?></h3></a>
<?php       if($row->password && $this->_config->get('jg_showrestrictedhint')): ?>
                <span<?php echo JHtml::_('joomgallery.tip', JText::_('COM_JOOMGALLERY_COMMON_CATEGORY_PASSWORD_PROTECTED_TIPTEXT'), JText::_('COM_JOOMGALLERY_COMMON_CATEGORY_PASSWORD_PROTECTED'), true); ?>>
                  <?php echo JHtml::_('joomgallery.icon', 'key.png', 'COM_JOOMGALLERY_COMMON_CATEGORY_PASSWORD_PROTECTED'); ?>
                </span>
<?php       endif; ?>
<?php     else: ?>
                <span class="jg_no_access<?php echo JHTML::_('joomgallery.tip', JText::_('COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'), $this->escape($row->name), false, false); ?>">
                  <?php echo $this->escape($row->name); ?>
                  <?php if($this->_config->get('jg_showrestrictedhint')): echo JHtml::_('joomgallery.icon', 'group_key.png', 'COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'); endif; ?>
                </span>
<?php     endif; ?>
              </li>
<?php     if(in_array($row->access, $this->_user->getAuthorisedViewLevels()) && (!$row->password || in_array($row->cid, $this->_mainframe->getUserState('joom.unlockedCategories', array(0))))):
            if($this->_config->get('jg_showtotalsubcatimages') || $row->isnew): ?>
              <li>
<?php       if($this->_config->get('jg_showtotalsubcatimages')): ?>
                <?php echo JText::sprintf($row->picorpics, $row->pictures); ?>
<?php       endif;
            echo $row->isnew; ?>
              </li>
<?php       endif;
            if($this->_config->get('jg_showtotalsubcathits')): ?>
              <li>
                <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_HITS_VAR', $row->totalhits); ?>
              </li>
<?php       endif;
          endif;
          if($row->description && $this->_config->get('jg_showdescriptionincategoryview')): ?>
              <li>
                <?php echo JHTML::_('joomgallery.text', $row->description); ?>
              </li>
<?php     endif; ?>
            <?php echo $row->event->afterDisplayCatThumb; ?>
<?php     if(isset($row->show_favourites_icon) && $row->show_favourites_icon): ?>
              <li>
<?php       if($row->show_favourites_icon == 1): ?>
                <a href="<?php echo JRoute::_('index.php?task=favourites.addimages&catid='.$row->cid.'&return='.$this->category->cid); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPTEXT', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'star.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION'); ?></a>
<?php       endif;
            if($row->show_favourites_icon == 2): ?>
                <a href="<?php echo JRoute::_('index.php?task=favourites.addimages&catid='.$row->cid.'&return='.$this->category->cid); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'basket_put.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPCAPTION'); ?></a>
<?php       endif;
            if($row->show_favourites_icon == -1): ?>
                <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'star_gr.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION'); ?>
                </span>
<?php       endif;
            if($row->show_favourites_icon == -2): ?>
                <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPCAPTION', true); ?>>
                  <?php echo JHTML::_('joomgallery.icon', 'basket_put_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPCAPTION'); ?>
                </span>
<?php       endif; ?>
              </li>
<?php     endif;
          if(isset($row->show_upload_icon) && $row->show_upload_icon):
            JHtml::_('behavior.modal', '.jg-bootone-modal'); ?>
              <li>
                <a href="<?php echo JRoute::_('index.php?view=mini&format=raw&upload_category='.$row->cid); ?>" class="jg-bootone-modal<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPTEXT', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?>" rel="{handler: 'iframe', size: {x: 620, y: 550}}">
                  <?php echo JHtml::_('joomgallery.icon', 'add.png', 'COM_JOOMGALLERY_COMMON_UPLOAD_ICON_TIPCAPTION'); ?></a>
              </li>
<?php     endif; ?>
            </ul>
          </div>
        </div>
      </li>
<?php     $index++;
        endfor; ?>
    </ul>
<?php endfor; ?>
    </div>
<?php if($this->params->get('show_count_cat_bottom')): ?>
  <div class="jg-counts">
<?php   if($this->totalcategories == 1): ?>
    <?php echo JText::_('COM_JOOMGALLERY_CATEGORY_THERE_IS_ONE_SUBCATEGORY_IN_CATEGORY'); ?>
<?php   endif;
        if($this->totalcategories > 1): ?>
    <?php echo JText::sprintf('COM_JOOMGALLERY_CATEGORY_THERE_ARE_SUBCATEGORIES_IN_CATEGORY', $this->totalcategories); ?>
<?php   endif; ?>
    </div>
<?php endif;
      if($this->params->get('show_pagination_cat_bottom')): ?>
  <div class="pagination">
    <?php echo $this->catpagination->getPagesLinks(); ?>
  </div>
<?php endif; ?>
</div>