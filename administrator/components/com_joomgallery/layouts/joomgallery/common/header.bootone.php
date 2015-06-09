<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');

class JHtmlJoomGalleryBootone
{
  /**
   * Returns the HTML output of a tooltip if showing tooltips is enabled
   *
   * @param   string  $text       The text of the tooltip
   * @param   string  $title      The title of the tooltip
   * @param   boolean $addclass   True, if the class attribute shall be added and false if it's already there
   * @param   boolean $translate  True, if the text and the title shall be translated
   * @param   string  $class      The name of the class used by Mootools to detect the tooltips
   * @return  string  The HTML output created
   * @since   1.5.5
   */
  public static function tip($text = 'Tooltip', $title = null, $addclass = false, $translate = true, $class = 'hasHint')
  {
    $config = JoomConfig::getInstance();

    $html = '';
    if($config->get('jg_tooltips'))
    {
      static $loaded = false;

      if(!$loaded)
      {
        $params = array();
        if($config->get('jg_tooltips') == 2)
        {
          $params['template'] = '<div class="tooltip jg-tooltip-wrap" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>';
        }

        JHtml::_('bootstrap.tooltip', '.'.$class, $params);
        $loaded = true;
      }

      if($addclass)
      {
        $html = ' class="'.$class.'" title="'.JHtml::tooltipText($title, $text, $translate, $translate).'"';
      }
      else
      {
        $html = ' '.$class.'" title="'.JHtml::tooltipText($title, $text, $translate, $translate);
      }
    }

    return $html;
  }
}
JHtml::register('joomgallery.tip', array('JHtmlJoomGalleryBootone', 'tip'));
 ?>
<div class="jg-bootone gallery">
<?php if($displayData->params->get('show_page_heading')): ?>
  <h2>
    <?php echo $displayData->escape($displayData->params->get('page_heading')); ?>
  </h2>
<?php endif;
      if($displayData->params->get('show_top_modules')): ?>
  <div class="jg-modules-top">
<?php foreach($displayData->modules['top'] as $module): ?>
    <div class="jg-module-top">
      <?php echo $module->rendered; ?>
    </div>
<?php endforeach; ?>
  </div>
<?php endif;
      if($displayData->params->get('show_header_pathway')): ?>
  <div class="jg-pathway">
    <a href="<?php echo JRoute::_('index.php') ;?>">
      <span class="icon-location<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_HOME'); ?>"></span></a>
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
      if($displayData->params->get('show_mygal') || $displayData->params->get('show_mygal_no_access') || $displayData->params->get('show_favourites')): ?>
      <ul class="list-unstyled jg-links-header">
<?php    if($displayData->params->get('show_mygal')): ?>
        <li class="jg-userpanel-link">
          <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=userpanel'); ?>"<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_USER_PANEL', null, true); ?>">
            <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL') ;?>
          </a>
        </li>
<?php   endif;
        if($displayData->params->get('show_mygal_no_access')): ?>
        <li class="jg-userpanel-link">
          <span class="text-muted<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_MSG_YOU_ARE_NOT_LOGGED', 'COM_JOOMGALLERY_COMMON_USER_PANEL'); ?>">
            <span class="icon-upload"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_USER_PANEL'); ?>
          </span>
        </li>
<?php   endif;
        if($displayData->params->get('show_favourites')): ?>
        <li class="jg-favourites-link">
    <?php switch($displayData->params->get('show_favourites')):
            case 1: ?>
          <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>"<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_DOWNLOAD_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY', true); ?>">
            <span class="icon-basket"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>
          </a>
      <?php break;
            case 2: ?>
          <a href="<?php echo JRoute::_('index.php?option=com_joomgallery&view=favourites'); ?>"<?php echo JHtml::_('joomgallery.tip', $displayData->params->get('favourites_tooltip_text'), JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'), true, false); ?>">
           <span class="icon-star"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'); ?>
          </a>
      <?php break;
            case 3: ?>
          <span class="text-muted<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_DOWNLOAD_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>">
            <span class="icon-basket"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADZIP_MY'); ?>
          </span>
      <?php break;
            case 4: ?>
          <span class="text-muted<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_MYCOM_JOOMGALLERY_COMMON_FAVOURITES_DOWNLOAD_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_FAVOURITES_MY'); ?>">
            <span class="icon-star"></span> <?php echo JText::_('COM_JOOMGALLERY_COMMON_FAVOURITES_MY'); ?>
          </span>
      <?php break;
            case 5: ?>
          <a href="<?php echo JRoute::_('index.php?task=favourites.createzip'); ?>"<?php echo JHtml::_('joomgallery.tip', 'COM_JOOMGALLERY_DOWNLOADZIP_CREATE_TIPTEXT', 'COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD', true); ?>">
            <span class="icon-out"></span> <?php echo JText::_('COM_JOOMGALLERY_DOWNLOADZIP_DOWNLOAD'); ?>
          </a>
      <?php break;
          endswitch; ?>
        </li>
<?php   endif; ?>
      </ul>
<?php endif; ?>
    </div>
    <div class="span6">
<?php if($displayData->params->get('show_header_search')): ?>
      <form action="<?php echo JRoute::_('index.php?view=search'); ?>" method="post" class="navbar-search pull-right">
        <label for="jg-search-box" class="sr-only"><?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?></label>
        <input title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" type="text" name="sstring" id="jg-search-box" class="search-query form-control" onblur="if(this.value=='') this.value='<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true); ?>';" onfocus="if(this.value=='<?php echo  JText::_('COM_JOOMGALLERY_COMMON_SEARCH', true); ?>') this.value='';" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" placeholder="<?php echo JText::_('COM_JOOMGALLERY_COMMON_SEARCH'); ?>" />
      </form>
<?php endif;
      if($displayData->params->get('show_header_allpics', 1) || $displayData->params->get('show_header_allhits', 0)): ?>
      <div class="row-fluid">
        <div class="span12">
          <ul class="list-unstyled text-right jg-gallerystats">
<?php   if($displayData->params->get('show_header_allpics')): ?>
            <li class="jg-gallerystats-count"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_IMAGES_ALL_CATEGORIES', '<span class="badge">'.$displayData->numberofpics.'</span>'); ?></li>
<?php   endif;
        if($displayData->params->get('show_header_allhits')): ?>
            <li class="jg-gallerystats-hits"><?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_NUMB_HITS_ALL_IMAGES', '<span class="badge">'.$displayData->numberofhits.'</span>'); ?></li>
<?php   endif; ?>
          </ul>
        </div>
      </div>
<?php endif; ?>
    </div>
  </div>
<?php if($displayData->params->get('show_header_toplist')): ?>
  <div class="jg-toplist text-center">
    <?php JHtml::_('joomgallery.toplistbar');?>
  </div>
<?php endif; ?>