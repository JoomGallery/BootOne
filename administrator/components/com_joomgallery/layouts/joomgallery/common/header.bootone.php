<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<div class="jg-bootone gallery">
<?php if($displayData->params->get('show_page_heading', 0)): ?>
  <h2>
    <?php echo $displayData->escape($displayData->params->get('page_heading')); ?>
  </h2>
<?php endif;
      if($displayData->params->get('show_top_modules', 0)): ?>
  <div class="jg_topmodules">
<?php foreach($displayData->modules['top'] as $module): ?>
    <div class="jg_topmodule">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_header_pathway', 0)): ?>
  <div class="jg-pathway">
    <a href="<?php echo JRoute::_('index.php') ;?>">
      <span class="icon-location hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
    <?php echo $displayData->pathway; ?>
  </div>
<?php endif; ?>
  <div class="row-fluid">
    <div class="span6">
<?php if($displayData->params->get('show_header_backlink')): ?>
      <ul class="pager">
        <li class="previous">
          <a href="<?php echo $displayData->backtarget; ?>">
            &larr; <?php echo $displayData->backtext; ?></a>
        </li>
      </ul>
<?php endif;
      if($displayData->params->get('show_mygal')): ?>
      <div class="jg_myga">
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=userpanel') ;?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_USER_PANEL', 'COM_JOOMGALLERY_COMMON_MSG_YOU_ARE_NOT_LOGGED'); ?>">
          <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL') ;?>
        </a>
      </div>
<?php endif;
      if($displayData->params->get('show_mygal_no_access', 0)): ?>
      <div class="jg_myga">
        <span class="muted hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_USER_PANEL', 'COM_JOOMGALLERY_COMMON_MSG_YOU_ARE_NOT_LOGGED'); ?>">
          <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL'); ?>
        </span>
      </div>
<?php endif;
      if($displayData->params->get('show_favourites', 0)): ?>
      <div class="jg_my_favourite">
  <?php switch($displayData->params->get('show_favourites', 0)):
          case 1: ?>
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_DOWNLOAD_TIPTEXT'); ?>">
          <span class="icon-basket"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>
        </a>
    <?php break;
          case 2: ?>
        <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>" class="hasTooltip" title="<?php echo JHtml::tooltipText(JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'), $displayData->params->get('favourites_tooltip_text'), false); ?>">
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
<?php if($displayData->params->get('show_header_search', 0)): ?>
      <div class="row-fluid">
        <div class="span12">
          <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search pull-right">
            <input title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>" type="text" name="sstring" class="search-query form-control" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true) ;?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH') ;?>" />
          </form>
        </div>
      </div>
<?php endif;
      if($displayData->params->get('show_header_allpics', 0) || $displayData->params->get('show_header_allhits', 0)): ?>
      <div class="row-fluid">
        <div class="span12">
<?php   if($displayData->params->get('show_header_allpics', 0)): ?>
          <p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$displayData->numberofpics.'</span>'); ?></p>
<?php   endif;
        if($displayData->params->get('show_header_allhits', 0)): ?>
          <p class="pull-right"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$displayData->numberofhits.'</span>'); ?></p>
<?php   endif; ?>
        </div>
      </div>
<?php endif; ?>
    </div>
  </div>
<?php if($displayData->params->get('show_header_toplist', 0)): ?>
  <div class="jg-toplist text-center">
    <?php JHtml::_('joomgallery.toplistbar');?>
  </div>
<?php endif; ?>