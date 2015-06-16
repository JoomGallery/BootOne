<?php defined('_JEXEC') or die('Direct Access to this location is not allowed.'); ?>
<form action="<?php echo JRoute::_('index.php?type=single'); ?>" method="post" name="adminForm" id="SingleUploadForm" enctype="multipart/form-data" class="form-validate form-horizontal" onsubmit="if(this.task.value == 'upload.upload' && !document.formvalidator.isValid(document.id('SingleUploadForm'))){alert('<?php echo JText::_('JGLOBAL_VALIDATION_FORM_FAILED', true); ?>');return false;} return joomOnSubmit();">
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('catid'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('class="', 'class="form-control ', $this->single_form->getInput('catid')); ?>
    </div>
  </div>
      <?php if(!$this->_config->get('jg_useruseorigfilename')): ?>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('imgtitle'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('class="', 'class="form-control ', $this->single_form->getInput('imgtitle')); ?>
    </div>
  </div>
      <?php endif;
            if(!$this->_config->get('jg_useruseorigfilename') && $this->_config->get('jg_useruploadnumber')): ?>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('filecounter'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('class="', 'class="form-control ', $this->single_form->getInput('filecounter')); ?>
    </div>
  </div>
      <?php endif; ?>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('imgtext'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('class="', 'class="form-control ', $this->single_form->getInput('imgtext')); ?>
    </div>
  </div>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('imgauthor'), 1); ?>
    <div class="col-md-10">
      <div class="jg-uploader form-control-static"><?php echo JHtml::_('joomgallery.displayname', $this->_user->get('id'), 'upload'); ?></div>
    </div>
  </div>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('published'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('class="', 'class="form-control ', $this->single_form->getInput('published')); ?>
    </div>
  </div>
  <div class="form-group">
    <?php echo preg_replace('/class="/', 'class="control-label col-md-2 ', $this->single_form->getLabel('arrscreenshot'), 1); ?>
    <div class="col-md-4">
      <?php echo str_replace('/class="', 'class="form-control ', $this->single_form->getInput('arrscreenshot')); ?>
    </div>
  </div>
      <?php if($this->_config->get('jg_delete_original_user') == 2): ?>
  <div class="control-group">
    <div class="control-label">
      <?php echo $this->single_form->getLabel('original_delete'); ?>
    </div>
    <div class="controls">
      <?php echo $this->single_form->getInput('original_delete'); ?>
    </div>
  </div>
      <?php endif;
            if($this->_config->get('jg_special_gif_upload') == 1): ?>
  <div class="control-group">
    <div class="control-label">
      <?php echo $this->single_form->getLabel('create_special_gif'); ?>
    </div>
    <div class="controls">
      <?php echo $this->single_form->getInput('create_special_gif'); ?>
    </div>
  </div>
      <?php endif;
            if($this->_config->get('jg_redirect_after_upload')): ?>
  <div class="control-group">
    <div class="control-label">
      <?php echo $this->single_form->getLabel('debug'); ?>
    </div>
    <div class="controls">
      <?php echo $this->single_form->getInput('debug'); ?>
    </div>
  </div>
      <?php endif; ?>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-10">
      <button type="submit" class="btn btn-primary"><i class="icon-upload"></i> <?php echo JText::_('COM_JOOMGALLERY_UPLOAD_UPLOAD'); ?></button>
      <button type="button" class="btn btn-default" onclick="javascript:location.href='<?php echo JRoute::_('index.php?view=userpanel', false); ?>';return false;"><i class="icon-cancel"></i> <?php echo JText::_('COM_JOOMGALLERY_COMMON_CANCEL'); ?></button>
    </div>
    <input type="hidden" name="task" value="upload.upload" />
  </div>
</form>