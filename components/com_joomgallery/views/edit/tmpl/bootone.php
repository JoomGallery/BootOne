<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.');

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
// JHtml::_('formbehavior.chosen', 'select');

echo JLayoutHelper::render('joomgallery.common.header', $this, '', array('suffixes' => array('bootone'), 'client' => 1)); ?>
  <script language="javascript" type="text/javascript">
  Joomla.submitbutton = function(task)
  {
    var form = document.id('adminForm');
    if(document.formvalidator.isValid(form)) {
      <?php echo $this->form->getField('imgtext')->save(); ?>
      Joomla.submitform(task, form);
    }
    else {
      var msg = new Array();
      msg.push('<?php echo JText::_('JGLOBAL_VALIDATION_FORM_FAILED', true); ?>');
      if(form.imgtitle.hasClass('invalid')) {
          msg.push('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_IMAGE_MUST_HAVE_TITLE', true); ?>');
      }
      if(form.catid.hasClass('invalid')) {
        msg.push('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_YOU_MUST_SELECT_CATEGORY', true); ?>');
      }
      alert(msg.join('\n'));
    }
  }
  </script>
  <div class="edit">
    <form action = "<?php echo JRoute::_('index.php?task=image.save'.$this->redirect.$this->slimitstart); ?>" method="post" name="adminForm" id="adminForm" class="form-validate">
      <div class="btn-toolbar">
        <div class="btn-group">
          <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton()">
            <i class="icon-ok"></i> <?php echo JText::_('COM_JOOMGALLERY_COMMON_SAVE'); ?>
          </button>
        </div>
        <div class="btn-group">
          <?php $url = !empty($this->redirecturl) ? JRoute::_($this->redirecturl) : JRoute::_('index.php?view=userpanel'.$this->slimitstart, false); ?>
          <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo $url; ?>';">
            <i class="icon-cancel"></i> <?php echo JText::_('COM_JOOMGALLERY_COMMON_CANCEL'); ?>
          </button>
        </div>
      </div>
      <fieldset>
        <?php $this->fieldSets = $this->form->getFieldsets(); ?>
        <ul class="nav nav-tabs">
          <li class="active"><a href="#editor" data-toggle="tab"><?php echo JText::_('COM_JOOMGALLERY_EDIT_EDIT_IMAGE') ?></a></li>
          <li><a href="#publishing" data-toggle="tab"><?php echo JText::_('COM_JOOMGALLERY_EDIT_PUBLISHING') ?></a></li>
<?php if(count($this->fieldSets) > 0) : ?>
          <li><a href="#other" data-toggle="tab"><?php echo JText::_('COM_JOOMGALLERY_EDIT_OTHER') ?></a></li>
<?php endif; ?>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="editor">
            <div class="row-fluid">
              <div class="span6">
                <?php echo $this->form->renderField('imgtitle'); ?>
                <?php echo $this->form->renderField('alias'); ?>
                <?php echo $this->form->renderField('catid'); ?>
              </div>
              <div class="span6">
                <div class="control-group">
                  <?php echo $this->form->getLabel('owner'); ?>
                  <div class="form-control-static"><strong><?php echo JHTML::_('joomgallery.displayname', $this->image->owner) ?></strong></div>
                </div>
                <?php echo str_replace('img-polaroid', 'thumbnail', preg_replace('/<img .*?>/', '<div class="form-control-static">$0</div>', $this->form->renderField('imagelib'))); ?>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <?php echo $this->form->renderField('imgtext'); ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="publishing">
            <div class="row-fluid">
              <div class="span6">
                <?php echo $this->form->renderField('imgauthor'); ?>
                <?php echo $this->form->renderField('published'); ?>
                <?php echo $this->form->renderField('access'); ?>
              </div>
            </div>
          </div>
<?php if(count($this->fieldSets) > 0) : ?>
          <div class="tab-pane" id="other">
            <?php echo $this->loadTemplate('options'); ?>
          </div>
<?php endif; ?>
        </div>
        <?php echo $this->form->getInput('id'); ?>
      </fieldset>
    </form>
  </div>
<?php
echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));