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
      <?php echo ';' //$this->form->getField('description')->save(); ?>
      Joomla.submitform(task, form);
    }
    else {
      var msg = new Array();
      msg.push('<?php echo JText::_('JGLOBAL_VALIDATION_FORM_FAILED', true); ?>');
      if(form.name.hasClass('invalid')) {
          msg.push('<?php echo JText::_('COM_JOOMGALLERY_COMMON_ALERT_CATEGORY_MUST_HAVE_TITLE', true); ?>');
      }
      alert(msg.join('\n'));
    }
  }
  </script>
  <div class="edit">
    <form action = "<?php echo JRoute::_('index.php?task=category.save'.$this->slimitstart); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-vertical">
      <div class="btn-toolbar">
        <div class="btn-group">
          <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton()">
            <i class="icon-ok"></i> <?php echo JText::_('COM_JOOMGALLERY_COMMON_SAVE'); ?>
          </button>
        </div>
        <div class="btn-group">
          <?php $url = !empty($this->redirecturl) ? JRoute::_($this->redirecturl) : JRoute::_('index.php?view=usercategories'.$this->slimitstart, false); ?>
          <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo $url; ?>';">
            <i class="icon-cancel"></i> <?php echo JText::_('COM_JOOMGALLERY_COMMON_CANCEL'); ?>
          </button>
        </div>
      </div>
      <fieldset>
        <?php $this->fieldSets = $this->form->getFieldsets(); ?>
        <ul class="nav nav-tabs">
          <li class="active"><a href="#editor" data-toggle="tab"><?php echo (!$this->category->cid) ? JText::_('COM_JOOMGALLERY_COMMON_NEW_CATEGORY') : JText::_('COM_JOOMGALLERY_EDITCATEGORY_MODIFY_CATEGORY'); ?></a></li>
          <li><a href="#publishing" data-toggle="tab"><?php echo JText::_('COM_JOOMGALLERY_EDITCATEGORY_PUBLISHING') ?></a></li>
<?php if(count($this->fieldSets) > 0) : ?>
          <li><a href="#other" data-toggle="tab"><?php echo JText::_('COM_JOOMGALLERY_EDITCATEGORY_OTHER') ?></a></li>
<?php endif; ?>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="editor">
            <div class="row-fluid">
              <div class="span6">
                <?php echo $this->form->renderField('name'); ?>
                <?php echo $this->form->renderField('alias'); ?>
                <?php echo $this->form->renderField('parent_id'); ?>
<?php           if(!$this->_config->get('jg_disableunrequiredchecks')): ?>
                <?php echo $this->form->renderField('ordering'); ?>
<?php           endif; ?>
              </div>
              <div class="span6">
<?php           if(   $this->_config->get('jg_showcatthumb') >= 2
                   || $this->_config->get('jg_showsubthumbs') == 1
                   || $this->_config->get('jg_showsubthumbs') == 3
                  ) : ?>
                <div class="control-group">
                  <?php echo $this->form->getLabel('thumbnail'); ?>
                  <div class="form-control-static">
                    <?php echo $this->form->getInput('thumbnail'); ?>
                  </div>
                </div>
<?php           endif ?>
<?php           if($this->_config->get('jg_usercatthumbalign')): ?>
                <?php echo $this->form->renderField('img_position'); ?>
<?php           endif; ?>
                <div class="control-group">
                  <?php echo $this->form->getLabel('imagelib'); ?>
                  <div class="form-control-static">
                    <?php echo $this->form->getInput('imagelib'); ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="row-fluid">
              <div class="span12">
                <?php echo $this->form->renderField('description'); ?>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="publishing">
            <div class="row-fluid">
              <div class="span6">
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
        <?php echo $this->form->getInput('cid'); ?>
      </fieldset>
    </form>
  </div>
<?php echo JLayoutHelper::render('joomgallery.common.footer', $this, '', array('suffixes' => array('bootone'), 'client' => 1));