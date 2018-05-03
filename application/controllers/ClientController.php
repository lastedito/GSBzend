<?php

class ClientController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
      $lesclients = new Application_Model_DbTable_Client();
        $this->view->lesclients = $lesclients->fetchAll();
    }
    

    public function ajouterAction()
    {
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

                $numcli = $form->getValue('NUM_CLI');
                $nomcli = $form->getValue('NOM_CLI');
                $prenomcli = $form->getValue('PRENOM_CLI');
                $adressecli = $form->getValue('ADRESSE_CLI');
                $codeville = $form->getValue('CODEVILLE_CLI');
                $telcli = $form->getValue('TEL_CLI');
                
                $lesclients = new Application_Model_DbTable_Client();
                $lesclients->ajouterClient ($numcli, $nomcli, $prenomcli, $adressecli, $codeville, $telcli);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        }
    }
    public function modifierAction()
    {
        
        $form = new Application_Form_Client();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numcli = $form->getValue('NUM_CLI');
                $nomcli = $form->getValue('NOM_CLI');
                $prenomcli = $form->getValue('PRENOM_CLI');
                $adressecli = $form->getValue('ADRESSE_CLI');
                $codeville = $form->getValue('CODEVILLE_CLI');
                $telcli = $form->getValue('TEL_CLI');
                        
                $lesclients = new Application_Model_DbTable_Client();
                $lesclients->modifierClient ($numcli, $nomcli, $prenomcli, $adressecli, $codeville, $telcli);
                        $this->_helper->redirector('index'); 
            } else {
                $form->populate($formData);
              } 
        }    else {
                $id = $this->_getParam('NUM_CLI', 0);
                $lesclients = new Application_Model_DbTable_Client();
                $form->populate($lesclients->obtenirClient($id));
            }
        }
 public function supprimerAction() {
      
        if ($this->getRequest()->isPost()){
            $supprimer = $this-> getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {
                
                $id = $this->getRequest()->getPost('NUM_CLI');
                $lesClients = new Application_Model_DbTable_Client();
                $lesClients->supprimerClient($id);
            }
            $this->_redirect('/client');
        }
        else
        {
         
    $id = $this->_getParam ('NUM_CLI', 0);
    $lesClients = new Application_Model_DbTable_Client();
    $this->view->client=  $lesClients->obtenirClient($id);
        }
   }
}









