<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<div class="gallery">
<?php if($this->params->get('show_page_heading', 0)): ?>
  <h2>
    <?php echo $this->escape($this->params->get('page_heading')); ?>
  </h2>
<?php endif;
      if($this->params->get('show_top_modules', 0)): ?>
  <div class="jg_topmodules">
<?php foreach($this->modules['top'] as $module): ?>
    <div class="jg_topmodule">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if($this->params->get('show_header_pathway', 0)): ?>
  <div class="jg_pathwa" >
    <a href="<?php echo JRoute::_('index.php') ;?>">
      <span class="icon-location hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
    <?php echo $this->pathway; ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <div class="span6">
<?php if($this->params->get('show_header_backlink')): ?>
      <div class="jg_back">
        <a href="<?php echo $this->backtarget; ?>">
          <?php echo $this->backtext; ?></a>
      </div>
<?php endif;
      if($this->params->get('show_mygal')): ?>
      <div class="jg_myga">
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=userpanel') ;?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_USER_PANEL', 'COM_JOOMGALLERY_COMMON_MSG_YOU_ARE_NOT_LOGGED'); ?>">
          <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL') ;?>
        </a>
      </div>
<?php endif;
      if($this->params->get('show_mygal_no_access', 0)): ?>
      <div class="jg_myga">
        <span class="muted hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_USER_PANEL', 'COM_JOOMGALLERY_COMMON_MSG_YOU_ARE_NOT_LOGGED'); ?>">
          <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL'); ?>
        </span>
      </div>
<?php endif;
      if($this->params->get('show_favourites', 1)): ?>
      <div class="jg_my_favourite">
  <?php switch($this->params->get('show_favourites', 1)):
          case 1: ?>
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_DOWNLOAD_TIPTEXT'); ?>">
          <span class="icon-basket"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>
        </a>
    <?php break;
          case 2: ?>
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText(JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'), $this->params->get('favourites_tooltip_text'), false); ?>">
         <span class="icon-star"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'); ?>
        </a>
    <?php break;
          case 3: ?>
        <span class="muted hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_DOWNLOAD_NOT_ALLOWED_TIPTEXT'); ?>">
          <span class="icon-basket"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>
        </span>
    <?php break;
          case 4: ?>
        <span class="muted hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_FAVOURITES_MY', 'COM_JOOMGALLERY_COMMON_FAVOURITES_DOWNLOAD_NOT_ALLOWED_TIPTEXT'); ?>">
          <span class="icon-star"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'); ?>
        </span>
    <?php break;
          case 5: ?>
        <a href="<?php echo JRoute::_('index.php?task=favourites.createzip'); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD', 'COM_JOOMGALLERY_DOWNLOADZIP_CREATE_TIPTEXT'); ?>">
          <span class="icon-out"></span> <?php echo JText::_('COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD'); ?>
        </a>
    <?php break;
          default:
          break;
        endswitch; ?>
      </div>
<?php endif; ?>
    </div>
    <div class="span6">
<?php if($this->params->get('show_header_search', 1)): ?>
      <div class="jg_searc">
        <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search pull-right">
          <input title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>" type="text" name="sstring" class="search-query inputbox" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH') ;?>" />
        </form>
      </div>
<?php endif;
      if($this->params->get('show_header_allpics', 1) || $this->params->get('show_header_allhits', 0)): ?>
      <div class="jg_gallerystat row-fluid">
<?php   if($this->params->get('show_header_allpics', 1)): ?>
        <p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$this->numberofpics.'</span>'); ?></p>
<?php     if($this->params->get('show_header_allhits', 1)): ?>
        <!--<br />-->
<?php     endif;
        endif;
        if($this->params->get('show_header_allhits', 1)): ?>
        <div class="clearfix"></div><p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$this->numberofhits.'</span>'); ?></p>
<?php   endif; ?>
      </div>
<?php endif; ?>
    </div>
  </div>
<?php if($this->params->get('show_header_toplist', 0)): ?>
  <div class="jg_toplis" style="text-align:center;">
    <?php JHtml::_('joomgallery.toplistbar');?>
  </div>
<?php endif; ?>