<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');

      $this->accordionEnabled = false;
      if($this->slider && ($this->_config->get('jg_showdetail') || $this->params->get('show_detailpane_modules')
      || $this->params->get('show_exifdata') || $this->params->get('show_map') || $this->params->get('show_iptcdata')
      || $this->params->get('show_voting_area') || $this->params->get('show_bbcode')
      || $this->params->get('show_comments_block') || $this->params->get('show_send2friend_block'))):
        $this->accordionEnabled = true;
        $this->toggler = '<h4 class="accordion-toggle"><a data-toggle="collapse" data-parent="#jg-details-accordion" href="#jg-details-collapse%1$s" aria-expanded="false" aria-controls="jg-details-collapse%1$s">%2$s</a></h4>';
        $this->slider = ' id="jg-details-collapse%1$s" class="panel-collapse collapse" role="tabpanel"';
      endif;
echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1)); ?>
  <a name="joomimg"></a>
<?php if($this->_config->get('jg_showdetailtitle') == 1): ?>
  <div>
    <h3 class="text-center" id="jg_photo_title">
      <?php echo $this->escape($this->image->imgtitle); ?>
    </h3>
  </div>
<?php endif;
      if($this->params->get('show_all_in_popup')):
        echo $this->popup['before'];
      endif; ?>
  <div id="jg_dtl_photo" class="text-center">
<?php if($this->params->get('image_linked')): ?>
    <a <?php echo $this->image->atagtitle; ?> href="<?php echo $this->image->link; ?>">
<?php endif; ?>
      <img src="<?php echo $this->image->img_src; ?>" class="img-polaroid" id="jg_photo_big" width="<?php echo $this->image->width; ?>" height="<?php echo $this->image->height; ?>" alt="<?php echo $this->image->imgtitle;?>" <?php echo $this->extra; ?> />
<?php if($this->params->get('image_linked')): ?>
    </a>
<?php endif;
      if($this->_user->get('id') && $this->_config->get('jg_nameshields') && !$this->slideshow && ($this->params->get('show_movable_nametag') || $this->_config->get('jg_nameshields_others'))): ?>
      <span id="jg-movable-nametag" style="position:absolute; top:0px; left:0px; width:<?php echo $this->nametag['length']; ?>px; z-index: 500; cursor:move;" class="nameshield<?php if($this->_config->get('jg_nameshields_others')): echo ' jg_displaynone'; endif; ?>">
        <?php echo $this->nametag['name']; ?>
      </span>
      <form name="nameshieldform" action="<?php echo $this->nametag['link']; ?>" target="_top" method="post">
        <div>
          <input type="hidden" name="id"     value="<?php echo $this->image->id; ?>" />
          <input type="hidden" name="xvalue" value="" />
          <input type="hidden" name="yvalue" value="" />
          <input type="hidden" name="userid" value="" />
        </div>
      </form>
<?php endif;
      if($this->params->get('show_nametags')): ?>
      <?php echo JHTML::_('joomgallery.nametags', $this->nametags); ?>
<?php endif; ?>
  </div>
<?php if($this->params->get('slideshow_enabled')): ?>
  <div class="hidden">
    <form name="jg_slideshow_form" target="_top" method="post" action="">
      <input type="hidden" name="jg_number" value="<?php echo $this->image->id; ?>" readonly="readonly" />
<?php if(!$this->slideshow): ?>
      <input type="hidden" name="slideshow" value="1" readonly="readonly" />
<?php endif; ?>
    </form>
  </div>
  <div class="hidden" id="jg-slideshow-controls">
<?php   if(!$this->slideshow): ?>
    <a href="javascript:joom_startslideshow()"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_START', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW', true); ?>>
      <?php echo JHTML::_('joomgallery.icon', 'control_play.png', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_START'); ?></a>
    <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_STOP', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW', true); ?>>
      <?php echo JHTML::_('joomgallery.icon', 'control_stop_gr.png', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPCAPTION'); ?>
    </span>
<?php   endif;
        if($this->slideshow): ?>
    <a href="javascript:joom_slideshow.clearTimer()" id="jg_pause"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_PAUSE', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW', true); ?>>
      <?php echo JHTML::_('joomgallery.icon', 'control_pause.png', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_PAUSE'); ?></a>
    <a href="javascript:joom_slideshow.nextItem();joom_slideshow.prepareTimer();" id="jg_goon">
      <?php echo JHTML::_('joomgallery.icon', 'control_play.png', 'COM_JOOMGALLERY_GOON'); ?></a>
    <a href="javascript:joom_stopslideshow()"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_STOP', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW', true); ?>>
      <?php echo JHTML::_('joomgallery.icon', 'control_stop.png', 'COM_JOOMGALLERY_DETAIL_SLIDESHOW_STOP'); ?></a>
<?php   endif; ?>
  </div>
  <div class="text-center text-muted small" id="jg-slideshow-noscript">
    <?php echo JText::_('COM_JOOMGALLERY_DETAIL_SLIDESHOW_NO_SCRIPT'); ?>
  </div>
  <script type="text/javascript">
    document.getElementById('jg-slideshow-controls').className = 'text-center';
    document.getElementById('jg-slideshow-noscript').className = 'hidden';
  </script>
<?php endif; ?>
  <div class="row-fluid">
    <div class="hidden-phone span3 text-center">
<?php if($this->params->get('show_previous_link')): ?>
<?php   if($this->_config->get('jg_cursor_navigation') == 1): ?>
      <form  name="form_jg_back_link" action="<?php echo $this->pagination['previous']['link']; ?>">
        <input type="hidden" name="jg_back_link" readonly="readonly" />
      </form>
<?php   endif;?>
      <ul class="pager">
        <li><a href="<?php echo $this->pagination['previous']['link']; ?>">
          &larr; <?php echo JText::_('COM_JOOMGALLERY_DETAIL_IMG_PREVIOUS'); ?></a>
        </li>
      </ul>
<?php   if($this->params->get('show_previous_text')): ?>
      <?php echo $this->pagination['previous']['text']; ?>
<?php   endif;
      endif; ?>
    </div>
    <div class="span6 jg-iconbar text-center">
<?php if($this->params->get('show_zoom_icon') == 1): ?>
      <a <?php echo $this->image->atagtitle; ?> href="<?php echo $this->params->get('image_linked') ? JHtml::_('joomgallery.openimage', $this->_config->get('jg_bigpic_open'), $this->image, false, 'joomgalleryIcon') : $this->image->link; ?>"<?php //echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'zoom.png', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_zoom_icon') == -1): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_LOGIN_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'zoom_gr.png', 'COM_JOOMGALLERY_DETAIL_IMG_FULLSIZE_TIPCAPTION'); ?>
      </span>
<?php endif;
      if($this->params->get('show_download_icon') == 1): ?>
      <a href="<?php echo $this->params->get('download_link'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'download.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_download_icon') == -1): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_LOGIN_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'download_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?>
      </span>
<?php endif;
      if($this->params->get('show_nametag_icon') == 1): ?>
      <a href="javascript:joom_getcoordinates();"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'tag_add.png', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_nametag_icon') == 2): ?>
      <a href="javascript:if(confirm('<?php echo JText::_('COM_JOOMGALLERY_DETAIL_NAMETAGS_ALERT_SURE_DELETE', true); ?>')){ location.href='<?php echo $this->params->get('nametag_link'); ?>';}"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_DELETE_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_DELETE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'tag_delete.png', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_DELETE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_nametag_icon') == 3):
        JHtml::_('behavior.modal', '.jg-bootone-modal'); ?>
      <a href="<?php echo JRoute::_('index.php?view=nametag&tmpl=component'); ?>" class="jg-bootone-modal<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_SELECT_OTHERS_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_SELECT_OTHERS_TIPCAPTION'); ?>" rel="{handler:'iframe', size:{x:350,y:180}}">
        <?php echo JHTML::_('joomgallery.icon', 'tag_edit.png', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_SELECT_OTHERS_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_nametag_icon') == -1): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_UNREGISTERED_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_UNREGISTERED_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'tag_add_gr.png', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_UNREGISTERED_TIPCAPTION'); ?>
      </span>
<?php endif;
      if($this->params->get('show_favourites_icon') == 1): ?>
      <a href="<?php echo $this->params->get('favourites_link'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'star.png', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_favourites_icon') == -1): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_FAVOURITES_ADD_IMAGE_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'star_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOAD_TIPCAPTION'); ?>
      </span>
<?php endif;
      if($this->params->get('show_favourites_icon') == 2): ?>
      <a href="<?php echo $this->params->get('favourites_link'); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'basket_put.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_favourites_icon') == -2): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'basket_put_gr.png', 'COM_JOOMGALLERY_COMMON_DOWNLOADZIP_ADD_IMAGE_TIPCAPTION'); ?>
      </span>
<?php endif;
      if($this->params->get('show_report_icon') == 1):
        JHtml::_('behavior.modal', '.jg-bootone-modal'); ?>
      <a href="<?php echo JRoute::_('index.php?view=report&id='.$this->image->id.'&tmpl=component'); ?>" class="jg-bootone-modal<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION'); ?>" rel="{handler:'iframe'}"><!--, size:{x:200,y:100}-->
        <?php echo JHTML::_('joomgallery.icon', 'exclamation.png', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_report_icon') == -1): ?>
      <span<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_NOT_ALLOWED_TIPTEXT', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'exclamation_gr.png', 'COM_JOOMGALLERY_COMMON_REPORT_IMAGE_TIPCAPTION'); ?>
      </span>
<?php endif; ?>
<?php if($this->params->get('show_edit_icon')) : ?>
      <a href="<?php echo JRoute::_('index.php?view=edit&id='.$this->image->id.$this->redirect); ?>"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'edit.png', 'COM_JOOMGALLERY_COMMON_EDIT_IMAGE_TIPCAPTION'); ?></a>
<?php endif;
      if($this->params->get('show_delete_icon')): ?>
      <a href="javascript:if(confirm('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_SURE_DELETE_SELECTED_ITEM', true); ?>')){ location.href='<?php echo JRoute::_('index.php?task=image.delete&id='.$this->image->id, false);?>';}"<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPTEXT', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION', true); ?>>
        <?php echo JHTML::_('joomgallery.icon', 'edit_trash.png', 'COM_JOOMGALLERY_COMMON_DELETE_IMAGE_TIPCAPTION'); ?></a>
<?php endif; ?>
      <?php echo $this->event->icons; ?>
    </div>
    <div class="hidden-phone span3 text-center">
<?php if($this->params->get('show_next_link')): ?>
<?php   if($this->_config->get('jg_cursor_navigation') == 1): ?>
      <form name="form_jg_forward_link" action="<?php echo $this->pagination['next']['link']; ?>">
        <input type="hidden" name="jg_forward_link" readonly="readonly" />
      </form>
<?php   endif;?>
      <ul class="pager">
        <li><a href="<?php echo $this->pagination['next']['link']; ?>">
          <?php echo JText::_('COM_JOOMGALLERY_DETAIL_IMG_NEXT'); ?> &rarr; </a>
        </li>
      </ul>
<?php   if($this->params->get('show_next_text')): ?>
      <?php echo $this->pagination['next']['text']; ?>
<?php   endif;
      endif; ?>
    </div>
  </div>
<?php if($this->params->get('show_previous_link') || $this->params->get('show_next_link')): ?>
  <div class="row-fluid visible-phone jg-detail-navigation">
    <div class="span6 text-center jg-detail-previous-link">
<?php if($this->params->get('show_previous_link')): ?>
<?php   if($this->_config->get('jg_cursor_navigation') == 1): ?>
      <form  name="form_jg_back_link" action="<?php echo $this->pagination['previous']['link']; ?>">
        <input type="hidden" name="jg_back_link" readonly="readonly" />
      </form>
<?php   endif;?>
      <ul class="pager">
        <li><a href="<?php echo $this->pagination['previous']['link']; ?>">
          &larr; <?php echo JText::_('COM_JOOMGALLERY_DETAIL_IMG_PREVIOUS'); ?></a>
        </li>
      </ul>
<?php   if($this->params->get('show_previous_text')): ?>
      <?php echo $this->pagination['previous']['text']; ?>
<?php   endif;
      endif; ?>
    </div>
    <div class="span6 text-center jg-detail-next-link">
<?php if($this->params->get('show_next_link')): ?>
<?php   if($this->_config->get('jg_cursor_navigation') == 1): ?>
      <form name="form_jg_forward_link" action="<?php echo $this->pagination['next']['link']; ?>">
        <input type="hidden" name="jg_forward_link" readonly="readonly" />
      </form>
<?php   endif;?>
      <ul class="pager">
        <li><a href="<?php echo $this->pagination['next']['link']; ?>">
          <?php echo JText::_('COM_JOOMGALLERY_DETAIL_IMG_NEXT'); ?> &rarr; </a>
        </li>
      </ul>
<?php   if($this->params->get('show_next_text')): ?>
      <?php echo $this->pagination['next']['text']; ?>
<?php   endif;
      endif; ?>
    </div>
  </div>
<?php endif; ?>
<?php if($this->params->get('show_all_in_popup')):
        echo $this->popup['after'];
      endif;
      if($this->_config->get('jg_minis')): ?>
  <div class="jg-minis">
<?php   if($this->_config->get('jg_motionminis') == 2): ?>
    <div id="motioncontainer">
      <ul>
<?php   endif;
        $rows  = array();
        $limit = $this->_config->get('jg_motionminiLimit');

        if ($limit > 0)
        {
          $imageposition = ($this->image->position + 1) - $limit/2;
          $imageposition = min($imageposition, count($this->images) - $limit);
          $rows = array_splice($this->images, max(0, $imageposition), $limit);
        }
        else
        {
          $rows = $this->images;
        }

        foreach($rows as $row):
          if($this->_config->get('jg_motionminis') == 2): ?>
        <li>
<?php     endif; ?>
          <a title="<?php echo $row->imgtitle; ?>" href="<?php echo JRoute::_('index.php?view=detail&id='.$row->id).JHTML::_('joomgallery.anchor'); ?>">
<?php     $cssid = '';
          if($row->id == $this->image->id):
            $cssid = ' id="jg_mini_akt"';
          endif; ?>
            <img src="<?php echo $this->_ambit->getImg('thumb_url', $row); ?>"<?php echo $cssid; ?> class="jg_minipic" alt="<?php echo $row->imgtitle; ?>" /></a>
<?php     if($this->_config->get('jg_motionminis') == 2): ?>
        </li>
<?php     endif; ?>
<?php   endforeach;
        if($this->_config->get('jg_motionminis') == 2): ?>
      </ul>
      <script>
        (function($){
          $(window).load(function(){
            $("#motioncontainer").mThumbnailScroller({
              axis:"x",
              type:"hover-20",
              callbacks:{
                onInit:function(){
                  var $this = $(this);
                  var moveTo = $("#jg_mini_akt").position().left + ($("#jg_mini_akt").width() / 2) - ($("#motioncontainer").find(".mTSWrapper").width() / 2);
                  $this.mThumbnailScroller("scrollTo", (moveTo > 0 ? moveTo : "left"));
                  setTimeout(function() { $this.addClass("jg_scroller-ready"); }, 300);
                }
              },
            });
          });
        })(jQuery);
      </script>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->_config->get('jg_showdetailtitle') == 2): ?>
  <div>
    <h3 class="text-center" id="jg_photo_title">
      <?php echo $this->escape($this->image->imgtitle); ?>
    </h3>
  </div>
<?php endif;
      if($this->params->get('show_detailbtm_modules', 0)):
        foreach($this->modules['detailbtm'] as $module): ?>
  <div class="well well-small">
<?php     if($module->showtitle): ?>
    <div class="jg-details-header">
      <h4>
        <?php echo $module->title; ?>
      </h4>
    </div>
<?php     endif;
          echo $module->rendered; ?>
  </div>
<?php   endforeach;
      endif; ?>
  <div<?php echo $this->accordionEnabled ? ' class="panel-group" id="jg-details-accordion" role="tablist" aria-multiselectable="true"' : ''; ?>>
<?php if($this->_config->get('jg_showdetail')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo str_replace('aria-expanded="false"', 'aria-expanded="true"', sprintf($this->toggler, 'Details', JText::_('COM_JOOMGALLERY_DETAIL_INFO'))); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_INFO'); ?></h4>
      <?php endif; ?>
    </div>
    <?php if(!empty($this->slider)): ?>
    <div <?php echo str_replace('panel-collapse collapse', 'panel-collapse collapse in', sprintf($this->slider, 'Details')); ?>>
<?php   endif; ?>
      <div class="accordion-inner">
        <dl class="dl-horizontal">
<?php   if($this->_config->get('jg_showdetaildescription') && strlen($this->image->imgtext) > 0): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_COMMON_DESCRIPTION'); ?>
          </dt>
          <dd>
            <?php echo JHTML::_('joomgallery.text', $this->image->imgtext); ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showdetaildatum')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_INFO_DATE'); ?>
          </dt>
          <dd>
            <?php echo JHTML::_('date', $this->image->imgdate, JText::_('DATE_FORMAT_LC1')); ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showdetailhits')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_COMMON_HITS'); ?>
          </dt>
          <dd id="jg_photo_hits">
            <?php echo $this->image->hits; ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showdetaildownloads')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_COMMON_DOWNLOADS'); ?>
          </dt>
          <dd id="jg_photo_downloads">
            <?php echo $this->image->downloads; ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showdetailrating')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_INFO_RATING'); ?>
          </dt>
          <dd id="jg_photo_rating">
            <?php echo JHTML::_('joomgallery.rating', $this->image, true, 'jg_starrating_detail'); ?>
          </dd>
<?php   endif;
        echo $this->event->afterDisplay;
        if($this->_config->get('jg_showdetailfilesize')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_INFO_FILESIZE'); ?>
          </dt>
          <dd id="jg_photo_filesizedtl">
            <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_IMG_HW',
                                      $this->image->img_size,
                                      $this->image->img_width,
                                      $this->image->img_height) ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showdetailauthor')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_AUTHOR'); ?>
          </dt>
          <dd id="jg_photo_author">
            <?php echo $this->image->author; ?>
          </dd>
<?php   endif;
        if($this->_config->get('jg_showoriginalfilesize')): ?>
          <dt>
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_INFO_FILESIZE_ORIGINAL'); ?>
          </dt>
          <dd id="jg_photo_filesizeorg">
            <?php echo JText::sprintf('COM_JOOMGALLERY_COMMON_IMG_HW',
                                      $this->image->orig_size,
                                      $this->image->orig_width,
                                      $this->image->orig_height) ?>
          </dd>
<?php   endif; ?>
        </dl>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_detailpane_modules')):
        foreach($this->modules['detailpane'] as $key => $module): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Module'.$key, $module->title); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo $module->title; ?></h4>
      <?php endif; ?>
    </div>
<?php     if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Module'.$key); ?>>
<?php     endif; ?>
      <div class="accordion-inner">
        <?php echo $module->rendered; ?>
      </div>
<?php     if(!empty($this->slider)): ?>
    </div>
<?php     endif;?>
  </div>
<?php   endforeach;
      endif;
      if($this->params->get('show_exifdata')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Exif', JText::_('COM_JOOMGALLERY_EXIF_DATA')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_EXIF_DATA'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Exif'); ?>>
<?php   endif; ?>
      <div class="accordion-inner">
        <?php echo $this->exifdata; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif;?>
  </div>
<?php endif;
      if($this->params->get('show_map')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Map', JText::_('COM_JOOMGALLERY_DETAIL_MAPS_GEOTAGGING')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_MAPS_GEOTAGGING'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Map'); ?>>
<?php   endif; ?>
      <div class="accordion-inner">
        <div id="jg_geomap">
          <script type="text/javascript">
            document.write(Joomla.JText._('COM_JOOMGALLERY_DETAIL_MAPS_BROWSER_IS_INCOMPATIBLE'));
            var latlng = new google.maps.LatLng(<?php echo $this->mapdata; ?>);
            var myOptions = {
              zoom: 13,
              center: latlng,
              scaleControl: true,
              mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('jg_geomap'), myOptions);
            var marker = new google.maps.Marker({
              position: latlng
            });
            marker.setMap(map);
          </script>
        </div>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_iptcdata')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'IPTC', JText::_('COM_JOOMGALLERY_IPTC_DATA')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_IPTC_DATA'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'IPTC'); ?>>
<?php   endif; ?>
      <div class="accordion-inner">
        <?php echo $this->iptcdata.'&nbsp;'; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_voting_area')): ?>
  <div id="jg_voting" class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Voting', JText::_('COM_JOOMGALLERY_DETAIL_RATING')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_RATING'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Voting'); ?>>
<?php   endif; ?>
      <div class="accordion-inner text-center">
<?php   if($this->params->get('voting_message')): ?>
        <?php echo $this->params->get('voting_message'); ?>
<?php   endif;
        if($this->params->get('show_voting_area') == 1):
          if($this->params->get('voting_display_type') == 0):
            if($this->params->get('ajaxvoting') == 1):
              $url = JRoute::_('index.php?option='._JOOM_OPTION.'&task=vote.vote&id='.$this->image->id, false).'&format=json';
              $onsubmit = 'javascript: var voteval = joomGetVoteValue(); joomAjaxVote(\''.$url.'\', \'imgvote=\' + voteval); return false;'; ?>
        <form id="ratingform" name="ratingform" action="<?php echo JRoute::_('index.php?task=vote.vote&id='.$this->image->id); ?>" target="_top" method="post" onsubmit="<?php echo $onsubmit; ?>" >
<?php       else : ?>
        <form name="ratingform" action="<?php echo JRoute::_('index.php?task=vote.vote&id='.$this->image->id); ?>" target="_top" method="post">
<?php       endif; ?>
          <?php echo JText::sprintf('COM_JOOMGALLERY_DETAIL_RATING_BAD', 1); ?>
          <?php echo $this->voting; ?>
          <?php echo JText::_('COM_JOOMGALLERY_DETAIL_RATING_GOOD', $this->maxvoting); ?>
          <p>
            <input class="btn btn-small btn-primary" type="submit" value="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_RATING_VOTE'); ?>" name="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_RATING_VOTE'); ?>" />
          </p>
        </form>
<?php     endif;
          if($this->params->get('voting_display_type') == 1): ?>
        <div>&nbsp;</div>
        <ul id="jg_starrating_bar" class="jg_starrating_bar">
          <li class="jg_current-rating" style="width:<?php echo (int)((float)floor(($this->maxvoting / 2.0) + 0.5) * 100.0 / (float) $this->maxvoting); ?>%;">
            &nbsp;
          </li>
<?php       for($i=1; $i<=$this->maxvoting; $i++): ?>
          <li>
<?php         if($this->params->get('ajaxvoting') == 1):
                $ajax_url = JRoute::_('index.php?option='._JOOM_OPTION.'&task=vote.vote&id='.$this->image->id, false).'&format=json';
                $onclick = 'javascript:joomAjaxVote(\''.$ajax_url.'\', \'imgvote='.$i.'\'); return false;'; ?>
            <div onclick="<?php echo $onclick; ?>" class="jg_star_<?php echo $i; ?><?php echo JHTML::_('joomgallery.tip', JText::sprintf('COM_JOOMGALLERY_DETAIL_RATING_STARS_TIPTEXT_VAR', $i, $this->maxvoting), JText::_('COM_JOOMGALLERY_DETAIL_RATING_STARS_TIPCAPTION'), false, false) ?>">
              &nbsp;
            </div>
<?php         else:
                $url = JRoute::_('index.php?task=vote.vote&id='.$this->image->id);
                $onclick = 'javascript:joomVote(\''.$url.'\','.$i.'); return false;'; ?>
            <div onclick="<?php echo $onclick; ?>" class="jg_star_<?php echo $i; ?> <?php echo JHTML::_('joomgallery.tip', JText::sprintf('COM_JOOMGALLERY_DETAIL_RATING_STARS_TIPTEXT_VAR', $i, $this->maxvoting), JText::_('COM_JOOMGALLERY_DETAIL_RATING_STARS_TIPCAPTION'), false, false) ?>">
              &nbsp;
            </div>
<?php         endif; ?>
          </li>
<?php       endfor; ?>
        </ul>
        <noscript>
          <div class="text-muted small">
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_RATING_NO_SCRIPT'); ?>
          </div>
        </noscript>
        <div>&nbsp;</div>
<?php     endif;
        endif; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_bbcode')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'BBCode', JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_SHARE')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_SHARE'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'BBCode'); ?>>
<?php   endif; ?>
      <div class="accordion-inner form-horizontal">
<?php   if($this->params->get('bbcode_img')): ?>
        <div class="control-group">
          <label class="control-label">
            <?php echo JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_IMG'); ?>
          </label>
          <div class="controls">
            <input title="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_IMG'); ?>" type="text" class="span12" size="50" value="[IMG]<?php echo $this->params->get('bbcode_img'); ?>[/IMG]" readonly="readonly" onclick="select()" />
          </div>
        </div>
<?php   endif;
        if($this->params->get('bbcode_url')): ?>
        <div class="control-group">
          <label class="control-label">
            <?php echo  JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_LINK'); ?>
          </label>
          <div class="controls">
            <input title="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_BBCODE_IMG'); ?>" type="text" class="span12" size="50" value="[URL]<?php echo $this->params->get('bbcode_url'); ?>[/URL]" readonly="readonly" onclick="select()" />
          </div>
        </div>
<?php   endif; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif;?>
  </div>
<?php endif;
      if($this->params->get('show_comments_block')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Comments', JText::_('COM_JOOMGALLERY_DETAIL_COMMENTS_EXISTING')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_COMMENTS_EXISTING'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Comments'); ?>>
<?php   endif; ?>
      <div class="accordion-inner">
<?php   if($this->_config->get('jg_showcommentsarea') == 2):
          echo $this->loadTemplate('commentsarea');
        endif;
        if($this->params->get('commenting_allowed')): ?>
        <form name="commentform" action="<?php echo JRoute::_('index.php?task=comments.comment&id='.$this->image->id); ?>" method="post" class="jg-comments-form">
          <a name="joomcommentform"></a>
          <div class="row-fluid">
            <div class="span3">
            <?php echo $this->_user->get('username'); ?>
<?php     if(!$this->_user->get('id') && $this->_config->get('jg_namedanoncomment')): ?>
              <input title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_GUEST'); ?>" type="text" class="form-control input-small" name="cmtname" value="<?php echo $this->_mainframe->getUserState('joom.comments.name', JText::_('COM_JOOMGALLERY_COMMON_GUEST')); ?>" tabindex="1" />
<?php     endif; ?>
              <div class="help-block">
<?php     if($this->params->get('smiley_support')): ?>
                <div>
<?php       $count = 1;
            foreach($this->smileys as $i => $sm): ?>
                  <a href="javascript:joom_smilie('<?php echo $i; ?>')" title="<?php echo $i; ?>">
                    <img src="<?php echo $sm; ?>" border="0" alt="<?php echo $sm; ?>" /></a>
<?php         if($count % 4 == 0): ?>
                  <br />
<?php         endif;
              $count++;
            endforeach; ?>
                </div>
<?php     endif;
          if($this->params->get('bbcode_status')): ?>
                <p class="small">
                  <?php echo JText::sprintf('COM_JOOMGALLERY_DETAIL_BBCODE_IS', '<b>'.$this->params->get('bbcode_status').'</b>'); ?>
                </p>
<?php     endif; ?>
              </div>
            </div>
            <div class="span9">
              <div class="control-group">
                <textarea title="<?php echo JText::_('COM_JOOMGALLERY_COMMON_GUEST'); ?>" cols="40" rows="<?php echo $this->_config->get('jg_smiliesupport') ? 8 : 4; ?>" name="cmttext" class="span12" tabindex="100" ><?php echo $this->_mainframe->getUserState('joom.comments.text'); ?></textarea>
              </div>
              <?php echo $this->event->captchas; ?>
              <div class="btn-toolbar">
                <input type="button" name="send" value="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_COMMENTS_SEND_COMMENT'); ?>" class="btn btn-primary" onclick="joom_validatecomment()" />
                <input type="reset" value="<?php echo JText::_('COM_JOOMGALLERY_COMMON_DELETE'); ?>" name="reset" class="btn btn-default" />
              </div>
            </div>
          </div>
        </form>
<?php   else: ?>
        <p>
          <?php echo JText::_('COM_JOOMGALLERY_DETAIL_COMMENTS_NOT_BY_GUEST'); ?>
        </p>
<?php   endif;
        if($this->_config->get('jg_showcommentsarea') == 1):
          echo $this->loadTemplate('commentsarea');
        endif; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif;
      if($this->params->get('show_send2friend_block')): ?>
  <div class="accordion-group">
    <div class="accordion-heading">
      <?php if(!empty($this->toggler)): ?>
      <?php   echo sprintf($this->toggler, 'Send2Friend', JText::_('COM_JOOMGALLERY_DETAIL_SENDTOFRIEND')); ?>
      <?php else: ?>
      <h4 class="accordion-toggle"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_SENDTOFRIEND'); ?></h4>
      <?php endif; ?>
    </div>
<?php   if(!empty($this->slider)): ?>
    <div <?php echo sprintf($this->slider, 'Send2Friend'); ?> >
<?php   endif; ?>
      <div class="accordion-inner">
<?php   if($this->params->get('show_send2friend_form')): ?>
        <form name="send2friend" action="<?php echo JRoute::_('index.php?task=send2friend.send&id='.$this->image->id); ?>" method="post" class="form-horizontal">
          <div class="control-group">
            <label for="send2friendname" class="control-label"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_SENDTOFRIEND_FRIENDS_NAME'); ?></label>
            <div class="controls">
              <input type="text" name="send2friendname" id="send2friendname" class="form-control" />
            </div>
          </div>
          <div class="control-group">
            <label for="send2friendemail" class="col-md-4 control-label"><?php echo JText::_('COM_JOOMGALLERY_DETAIL_SENDTOFRIEND_FRIENDS_MAIL'); ?></label>
            <div class="controls">
              <input type="text" name="send2friendemail" id="send2friendemail" class="form-control" />
            </div>
          </div>
          <div class="control-group">
            <div class="controls">
              <input type="button" name="send" value="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_SENDTOFRIEND_SEND_EMAIL'); ?>" class="btn btn-primary" onclick="joom_validatesend2friend()" />
            </div>
          </div>
        </form>
<?php   endif;
        if($this->params->get('send2friend_message')): ?>
        <p>
          <?php echo JText::_('COM_JOOMGALLERY_DETAIL_LOGIN_FIRST'); ?>
        </p>
<?php   endif; ?>
      </div>
<?php   if(!empty($this->slider)): ?>
    </div>
<?php   endif; ?>
  </div>
<?php endif; ?>
  </div>
<?php if($this->params->get('show_nametags')): ?>
  <a id="jg-movable-nametag-icon" href="javascript:joom_getcoordinates();" class="jg_displaynone<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_OTHERS_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_OTHERS_TIPCAPTION'); ?>">
    <?php echo JHTML::_('joomgallery.icon', 'tag_add.png', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_OTHERS_TIPCAPTION'); ?>
  </a>
  <span id="jg-tooltip-helper" class="jg_displaynone<?php echo JHTML::_('joomgallery.tip', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_DELETE_OTHERS_TIPTEXT', 'COM_JOOMGALLERY_DETAIL_NAMETAGS_DELETE_OTHERS_TIPCAPTION'); ?>">&nbsp;</span>
  <script type="text/javascript">
    var jg_nameshields_width = <?php echo $this->_config->get('jg_nameshields_width'); ?>;
<?php   if($this->params->get('show_movable_nametag')): ?>
    document.id('jg-movable-nametag').makeDraggable({container: 'jg_photo_big', onComplete:function(){document.id('jg-movable-nametag-icon').position({
      relativeTo: 'jg-movable-nametag',
      position: 'upperRight',
      edge: 'bottomLeft'
    }).reveal();}});
<?php   endif; ?>
    window.addEvent('domready', function(){$$('.jg-nametag-remove-icon').cloneEvents(document.id('jg-tooltip-helper'))});
  </script>
<?php endif;
      echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));