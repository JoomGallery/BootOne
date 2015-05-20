<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');
echo $this->loadTemplate('header');?>
<?php if($this->_config->get('jg_anchors')): ?>
  <a name="gallery"></a>
<?php endif;
      if($this->params->get('show_pagination_top')):
        echo $this->loadTemplate('pagination');
      endif;
      if($this->_config->get('jg_showallcathead')): ?>
  <div class="well well-small jg-header">
    <?php echo JText::_('COM_JOOMGALLERY_COMMON_CATEGORIES'); ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <ul class="thumbnails">
<?php   foreach($this->rows as $row): ?>
      <li class="span3">
        <div class="thumbnail">
<?php     if($row->thumb_src): ?>
          <a title="<?php echo $row->name; ?>" href="<?php echo $row->link ?>" class="thumbnail">
            <img src="<?php echo $row->thumb_src; ?>" alt="<?php echo $row->name; ?>" />
          </a>
<?php     endif; ?>
          <h3>
<?php     if(in_array($row->access, $this->_user->getAuthorisedViewLevels())): ?>
            <a href="<?php echo $row->link; ?>">
              <b><?php echo $this->escape($row->name); ?></b>
            </a>
<?php     else: ?>
            <span class="jg_no_access<?php echo JHTML::_('joomgallery.tip', JText::_('COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'), $this->escape($row->name), false, false); ?>">
              <b><?php echo $this->escape($row->name); ?></b>
              <?php if($this->_config->get('jg_showrestrictedhint')): echo JHtml::_('joomgallery.icon', 'group_key.png', 'COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'); endif; ?>
            </span>
<?php     endif; ?>
          </h3>
          <ul>
<?php     if(in_array($row->access, $this->_user->getAuthorisedViewLevels())):
            if($this->_config->get('jg_showtotalcatimages') || $row->isnew): ?>
            <li>
<?php       if($this->_config->get('jg_showtotalcatimages')): ?>
            <?php echo JText::sprintf($row->picorpics, $row->pictures); ?>
<?php       endif;
            echo $row->isnew; ?>
            </li>
<?php       endif;
            if($this->_config->get('jg_showtotalcathits')): ?>
            <li>
            <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_HITS_VAR', $row->totalhits); ?>
            </li>
<?php       endif;
          endif;
          if($row->description && $this->_config->get('jg_showdescriptioningalleryview')): ?>
            <li>
            <?php echo JHTML::_('joomgallery.text', $row->description); ?>
            </li>
<?php     endif; ?>
          <?php echo $row->event->afterDisplayCatThumb; ?>
<?php     if(isset($row->show_favourites_icon) && $row->show_favourites_icon): ?>
            <li>
<?php       if($row->show_favourites_icon == 1): ?>
              <a href="<?php echo JRoute::_('index.php?task=favourites.addimages&catid='.$row->cid.'&return=gallery'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPTEXT', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION', true); ?>>
              <?php echo JHTML::_('joomgallery.icon', 'star.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGES_TIPCAPTION'); ?></a>
<?php       endif;
            if($row->show_favourites_icon == 2): ?>
              <a href="<?php echo JRoute::_('index.php?task=favourites.addimages&catid='.$row->cid.'&return=gallery'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGES_TIPCAPTION', true); ?>>
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
<?php     endif; ?>
          </ul>
<?php     //TODO: config option? -> add possibility of solution without javascript (like it had been before dtree was added)
          if($this->_config->get('jg_showsubsingalleryview')):
            JHTML::_('joomgallery.categorytree', $row->cid, $row->textcontainer);
          endif; ?>
        </div>
      </li>
<?php endforeach; ?>
    </ul>
  </div>
<?php if($this->_config->get('jg_showallcathead')): ?>
  <div class="jg-footer">
    &nbsp;
  </div>
<?php endif;
      if($this->params->get('show_pagination_bottom')):
        echo $this->loadTemplate('pagination');
      endif;
echo $this->loadTemplate('footer');