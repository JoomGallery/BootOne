<?php defined('_JEXEC') or die('Restricted access');
echo JHtml::_('bootstrap.startAccordion', 'categoryOptions', array('active' => 'collapse0'));
$i = 0;
foreach($this->fieldSets as $name => $fieldSet):
  if($name != ''):
    echo JHtml::_('bootstrap.addSlide', 'categoryOptions', JText::_($fieldSet->label), 'collapse'.$i++);
      if(isset($fieldSet->description) && trim($fieldSet->description)):
        echo '<p class="tip">'.$this->escape(JText::_($fieldSet->description)).'</p>';
      endif;
      foreach($this->form->getFieldset($name) as $field): ?>
        <?php echo $field->renderField(); ?>
<?php endforeach;
    echo JHtml::_('bootstrap.endSlide');
  endif;
endforeach;
echo JHtml::_('bootstrap.endAccordion');