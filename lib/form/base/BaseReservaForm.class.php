<?php

/**
 * Reserva form base class.
 *
 * @method Reserva getObject() Returns the current form's model object
 *
 * @package    pelotero
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseReservaForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'cliente_id' => new sfWidgetFormPropelChoice(array('model' => 'Cliente', 'add_empty' => false)),
      'fecha'      => new sfWidgetFormDate(),
      'hora'       => new sfWidgetFormInputText(),
      'vigente'    => new sfWidgetFormInputCheckbox(),
      'senia'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'cliente_id' => new sfValidatorPropelChoice(array('model' => 'Cliente', 'column' => 'id')),
      'fecha'      => new sfValidatorDate(),
      'hora'       => new sfValidatorString(),
      'vigente'    => new sfValidatorBoolean(),
      'senia'      => new sfValidatorNumber(array('required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Reserva', 'column' => array('fecha', 'hora')))
    );

    $this->widgetSchema->setNameFormat('reserva[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Reserva';
  }


}
