<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
      <a name="joomcomments"></a>
<?php if($this->params->get('show_comments')): ?>
      <div>
<?php   foreach($this->comments as $comment): ?>
        <div class="media">
          <div class="media-left">
            <div class="jg-comment-author"><?php echo $comment->author; ?></div>
<?php     if($this->params->get('manager_logged')): ?>
            <div class="jg_cmticons">
              <a href="http://www.db.ripe.net/whois?form_type=simple&full_query_string=&searchtext=<?php echo $comment->cmtip;?>&do_search=Search" target="_blank">
                <img src="<?php echo $this->_ambit->get('icon_url').'ip.gif'; ?>" alt="<?php echo $comment->cmtip; ?>" title="<?php echo $comment->cmtip; ?>" hspace="3" border="0" /></a>
              <a href="<?php echo JRoute::_('index.php?task=comments.remove&id='.$this->image->id.'&cmtid='.$comment->cmtid); ?>">
                <img src="<?php echo $this->_ambit->get('icon_url').'del.gif'; ?>" alt="<?php echo JText::_('COM_JOOMGALLERY_DETAIL_ALT_DELETE_COMMENT'); ?>" hspace="3" border="0" /></a>
            </div>
<?php     endif; ?>
          </div>
          <div class="media-body">
            <div class="media-heading small text-muted">
              <?php echo JText::sprintf('COM_JOOMGALLERY_DETAIL_COMMENTS_COMMENT_ADDED', JHTML::_('date', $comment->cmtdate, JText::_('DATE_FORMAT_LC1'))); ?>
            </div>
            <?php echo stripslashes($comment->text); ?>
          </div>
        </div>
<?php   endforeach; ?>
      </div>
<?php   endif;
        if($this->params->get('no_comments_message')): ?>
      <p>
        <?php echo $this->params->get('no_comments_message'); ?>
        <?php echo $this->params->get('no_comments_message2'); ?>
      </p>
<?php   endif; ?>
