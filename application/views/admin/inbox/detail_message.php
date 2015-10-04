<!-- FORM -->
<?php $form = Tb::form(array(
    'type' => Tb::FORM_TYPE_HORIZONTAL, 
    'leftRow' => 3, 
    'rightRow' => 9,
    'id' => 'form_read',
    'name' => 'form_read'
)); 
//echo $form->textField('id', '', array('type' => 'hidden')); // HIDDEN FIELD
echo $form->label('From') . "<br>";
echo $form->label('Email') . "<br>";
echo $form->label('Subject') . "<br>"; 
echo $form->label('Message') . "<br>";
echo $form->label('IP Address') . "<br>";
echo $form->label('Created Time') . "<br>"; 

$form->end(); 

?>