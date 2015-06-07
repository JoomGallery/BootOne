<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<?php if($displayData->params->get('show_footer_separator')): ?>
  <div class="jg-footer"></div>
<?php endif;
      if($displayData->params->get('show_footer_toplist', 0)): ?>
  <div class="jg-toplist jg-toplist-footer text-center">
    <?php JHTML::_('joomgallery.toplistbar'); ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <div class="span6">
 <?php if($displayData->params->get('show_rmsm_legend', 0)): ?>
      <div class="text-muted">
        <?php echo JHtml::_('joomgallery.icon', 'group_key.png', 'COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'); ?>
        <?php echo  JText::_('COM_JOOMGALLERY_COMMON_RESTRICTED_CATEGORIES'); ?>
      </div>
<?php endif;
      if($displayData->params->get('show_footer_backlink')): ?>
      <ul class="pager">
        <li class="previous">
          <a href="<?php echo $displayData->backtarget; ?>">
            &larr; <?php echo $displayData->backtext; ?></a>
        </li>
      </ul>
<?php endif; ?>
    </div>
    <div class="span6">
<?php if($displayData->params->get('show_footer_allpics', 0) || $displayData->params->get('show_footer_allhits', 0)): ?>
      <div class="row-fluid">
        <div class="span12">
<?php   if($displayData->params->get('show_footer_allpics', 0)): ?>
          <p class="text-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$displayData->numberofpics.'</span>'); ?></p>
<?php   endif;
        if($displayData->params->get('show_footer_allhits', 0)): ?>
        <p class="text-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$displayData->numberofhits.'</span>'); ?></p>
<?php   endif; ?>
        </div>
      </div>
<?php endif;
      if($displayData->params->get('show_footer_search', 0)): ?>
      <div class="row-fluid">
        <div class="span12">
          <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search pull-right">
            <input type="text" name="sstring" class="search-query form-control" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH') ;?>" />
          </form>
        </div>
      </div>
<?php endif; ?>
    </div>
  </div>
<?php if($displayData->params->get('show_footer_pathway', 0)): ?>
  <div class="jg-pathway jg-pathway-footer">
    <a href="<?php echo JRoute::_('index.php') ;?>">
      <span class="icon-location hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
    <?php echo $displayData->pathway; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_btm_modules', 0)): ?>
  <div class="jg_btmmodules">
<?php foreach($displayData->modules['btm'] as $module): ?>
    <div class="jg_btmmodule">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_credits')): ?>
  <div class="text-center">
    <a href="http://www.joomgallery.net" target="_blank">
      <img src="<?php echo JoomAmbit::getInstance()->getIcon('powered_by.gif'); ?>" class="jg_poweredb" alt="Powered by JoomGallery" />
    </a>
  </div>
<?php endif; ?>
</div>