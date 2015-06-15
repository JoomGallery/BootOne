<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<?php if($displayData->params->get('show_footer_separator')): ?>
  <div class="jg-footer-separator"></div>
<?php endif;
      if($displayData->params->get('show_footer_toplist')): ?>
  <div class="jg-toplist jg-toplist-footer text-center">
    <?php JHTML::_('joomgallery.toplistbar'); ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <div class="span6">
 <?php if($displayData->params->get('show_rmsm_legend')): ?>
      <div class="text-muted">
        <?php echo JHtml::_('joomgallery.icon', 'group_key.png', 'COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'); ?>
        <?php echo  JText::_('COM_JOOMGALLERY_COMMON_RESTRICTED_CATEGORIES'); ?>
      </div>
<?php endif;
      if($displayData->params->get('show_footer_backlink')): ?>
      <ul class="pager jg-pager-footer">
        <li class="previous">
          <a href="<?php echo $displayData->backtarget; ?>">
            &larr; <?php echo $displayData->backtext; ?></a>
        </li>
      </ul>
<?php endif; ?>
    </div>
    <div class="span6">
<?php if($displayData->params->get('show_footer_allpics') || $displayData->params->get('show_footer_allhits')): ?>
      <div class="row-fluid">
        <div class="span12">
          <ul class="unstyled text-right jg-gallerystats jg-gallerystats-footer">
<?php   if($displayData->params->get('show_footer_allpics')): ?>
            <li class="jg-gallerystats-count"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$displayData->numberofpics.'</span>'); ?></li>
<?php   endif;
        if($displayData->params->get('show_footer_allhits')): ?>
            <li class="jg-gallerystats-hits"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$displayData->numberofhits.'</span>'); ?></li>
<?php   endif; ?>
          </ul>
        </div>
      </div>
<?php endif;
      if($displayData->params->get('show_footer_search')): ?>
      <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search jg-navbar-search-footer pull-right">
        <label for="jg-search-box-footer" class="sr-only hidden"><?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?></label>
        <input title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" type="text" name="sstring" id="jg-search-box-footer" class="search-query form-control" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true); ?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true); ?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" placeholder="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" />
      </form>
<?php endif; ?>
    </div>
  </div>
<?php if($displayData->params->get('show_footer_pathway')): ?>
  <div class="jg-pathway jg-pathway-footer">
    <a href="<?php echo JRoute::_('index.php'); ?>">
      <span class="icon-location hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
    <?php echo $displayData->pathway; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_btm_modules')): ?>
  <div class="jg-modules-btm">
<?php foreach($displayData->modules['btm'] as $module): ?>
    <div class="jg-module-btm">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_credits')): ?>
  <div class="jg-powered-by text-center">
    <a href="http://www.joomgallery.net" target="_blank">
      <img src="<?php echo JoomAmbit::getInstance()->getIcon('powered_by.gif'); ?>" alt="Powered by JoomGallery" />
    </a>
  </div>
<?php endif; ?>
</div>