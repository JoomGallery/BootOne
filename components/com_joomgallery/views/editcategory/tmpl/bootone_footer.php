<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<?php if($this->params->get('show_footer_separator')): ?>
  <div class="jg-footer"></div>
<?php endif;
      if($this->params->get('show_footer_toplist', 1)): ?>
  <div class="jg_toplis" style="text-align:center;">
    <?php JHTML::_('joomgallery.toplistbar'); ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <div class="span6">
 <?php if($this->params->get('show_rmsm_legend', 1)): ?>
      <div class="jg_rmsm_legen">
        <div class="jg_r muted">
          <?php echo JHtml::_('joomgallery.icon', 'group_key.png', 'COM_JOOMGALLERY_COMMON_TIP_YOU_NOT_ACCESS_THIS_CATEGORY'); ?> <?php echo  JText::_('COM_JOOMGALLERY_COMMON_RESTRICTED_CATEGORIES'); ?>
        </div>
      </div>
<?php endif;
      if($this->params->get('show_footer_backlink')): ?>
      <div class="jg_back">
        <a href="<?php echo $this->backtarget; ?>">
          <?php echo $this->backtext; ?></a>
      </div>
<?php endif; ?>
    </div>
    <div class="span6">
<?php if($this->params->get('show_footer_allpics', 0) || $this->params->get('show_footer_allhits', 0)): ?>
      <div class="jg_gallerystat row-fluid">
<?php   if($this->params->get('show_footer_allpics', 1)): ?>
        <p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$this->numberofpics.'</span>'); ?></p>
<?php     if($this->params->get('show_footer_allhits', 1)): ?>
        <!--<br />-->
<?php     endif;
        endif;
        if($this->params->get('show_footer_allhits', 1)): ?>
        <div class="clearfix"></div><p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$this->numberofhits.'</span>'); ?></p>
<?php   endif; ?>
      </div>
<?php endif;
      if($this->params->get('show_footer_search', 0)): ?>
      <div class="jg_searc">
        <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search pull-right">
          <input type="text" name="sstring" class="search-query inputbox" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH') ;?>" />
        </form>
      </div>
<?php endif; ?>
    </div>
  </div>
<?php if($this->params->get('show_footer_pathway', 1)): ?>
  <div class="jg_pathwa">
    <a href="<?php echo JRoute::_('index.php') ;?>">
      <span class="icon-location hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
    <?php echo $this->pathway; ?>
  </div>
<?php endif;
      if($this->params->get('show_btm_modules', 0)): ?>
  <div class="jg_btmmodules">
<?php foreach($this->modules['btm'] as $module): ?>
    <div class="jg_btmmodule">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if(!$this->params->get('show_credits')): ?>
  <div style="text-align:center;">
    <a href="http://www.joomgallery.net" target="_blank">
      <img src="<?php echo $this->_ambit->getIcon('powered_by.gif'); ?>" class="jg_poweredb" alt="Powered by JoomGallery" />
    </a>
  </div>
<?php endif; ?>
</div>