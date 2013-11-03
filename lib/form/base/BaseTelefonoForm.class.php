<?php

/**
 * Telefono form base class.
 *
 * @method Telefono getObject() Returns the current form's model object
 *
 * @package    pelotero
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseTelefonoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'reserva_id' => new sfWidgetFormPropelChoice(array('model' => 'Reserva', 'add_empty' => false)),
      'nom_padre'  => new sfWidgetFormInputText(),
      'nom_hijo'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'reserva_id' => new sfValidatorPropelChoice(array('model' => 'Reserva', 'column' => 'id')),
      'nom_padre'  => new sfValidatorString(array('max_length' => 20)),
      'nom_hijo'   => new sfValidatorString(array('max_length' => 20)),
    ));

    $this->widgetSchema->setNameFormat('telefono[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Telefono';
  }


}
