<?php

/**
 * cliente actions.
 *
 * @package    pelotero
 * @subpackage cliente
 * @author     Your name here
 */
class clienteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->clientes = clienteQuery::create()->find();
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new clienteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new clienteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $cliente = clienteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($cliente, sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new clienteForm($cliente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $cliente = clienteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($cliente, sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $this->form = new clienteForm($cliente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $cliente = clienteQuery::create()->findPk($request->getParameter('id'));
    $this->forward404Unless($cliente, sprintf('Object cliente does not exist (%s).', $request->getParameter('id')));
    $cliente->delete();

    $this->redirect('cliente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $cliente = $form->save();

      $this->redirect('cliente/index');
    }
  }
}
