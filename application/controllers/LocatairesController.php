<?php

class LocatairesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->view->title='Ajouter un visiteur';
      $leslocataires= new Application_Model_DbTable_Locataires();
      $this->view->leslocataires=$leslocataires->fetchAll();
    }
    
    public function detailsAction()
    {
        $id=$this->_getParam('NUMEROLOC');
       $leslocataires= new Application_Model_DbTable_Locataires();
    $unlocataire=$leslocataires->obtenirLocataire($id);
    $this->view->leslocataires=$unlocataire;
    }

    public function ajouterAction()
    {
        
        $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numeroloc = $form->getValue('NUMEROLOC'); 
                        $nomloc = $form->getValue('NOM_LOC');
                        $prenomloc= $form->getValue('PRENOM_LOC');
                        $datenaiss= $form->getValue('DATENAISS');
                        $telloc = $form->getValue('TEL_LOC'); 
                        $rib = $form->getValue('R_I_B');
                        $banque = $form->getValue('BANQUE');
                        $ruebanque = $form->getValue('RUE_BANQUE');
                        $codeville = $form->getValue('CODEVILLE_BANQUE');
                        $telbanque = $form->getValue('TEL_BANQUE');
                        
                        $leslocataires = new Application_Model_DbTable_Locataires();
                        $leslocataires->ajouterLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque);
                        $this->_helper->redirector('index');
                        
            }
            else {
                $form->populate($formData);
            }
        }
    }
    
    public function modifierAction()
    {
        
        $form = new Application_Form_Locataire();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numeroloc = $form->getValue('NUMEROLOC'); 
                        $nomloc = $form->getValue('NOM_LOC');
                        $prenomloc= $form->getValue('PRENOM_LOC');
                        $datenaiss= $form->getValue('DATENAISS');
                        $telloc = $form->getValue('TEL_LOC'); 
                        $rib = $form->getValue('R_I_B');
                        $banque = $form->getValue('BANQUE');
                        $ruebanque = $form->getValue('RUE_BANQUE');
                        $codeville = $form->getValue('CODEVILLE_BANQUE');
                        $telbanque = $form->getValue('TEL_BANQUE');
                        
                        $leslocataires = new Application_Model_DbTable_Locataires();
                        $leslocataires->modifierLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque);
                        $this->_helper->redirector('index'); 
            } else {
                $form->populate($formData);
              } 
        }    else {
                $id = $this->_getParam('NUMEROLOC', 0);
                $leslocataires = new Application_Model_DbTable_Locataires();
                $form->populate($leslocataires->obtenirLocataire($id));
            }
        }
    
public function supprimerAction() {
      
        if ($this->getRequest()->isPost()){
            $supprimer = $this-> getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {
                
                $id = $this->getRequest()->getPost('NUMEROLOC');
                $leslocataires = new Application_Model_DbTable_Locataires();
                $leslocataires->supprimerLocataire($id);
            }
            $this->_redirect('/locataires');
        }
        else
        {
         
    $id = $this->_getParam ('NUMEROLOC', 0);
    $leslocataires = new Application_Model_DbTable_Locataires();
    $this->view->locataires = $leslocataires->obtenirLocataire($id);
        }
   }
}





