<?php

class ProprietairesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
       $lesproprietaires= new Application_Model_DbTable_Proprietaires();
      $this->view->lesproprietaires=$lesproprietaires->fetchAll();
    }
    
    public function detailsAction()
    {
        $id=$this->_getParam('NUMEROPROP');
       $lesproprietaires= new Application_Model_DbTable_Proprietaires();
    $unproprio=$lesproprietaires->obtenirProprietaire($id);
    $this->view->lesproprietaires=$unproprio;
    }
    
    public function ajouterAction()
    {
        
        $form = new Application_Form_Proprietaire();
        $form->envoyer->setLabel('Ajouter');
        $this->view->form = $form;
        if($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if($form->isValid($formData)) {

                $numprop = $form->getValue('NUMEROPROP'); 
                        $nom = $form->getValue('NOM');
                        $prenom= $form->getValue('PRENOM');
                        $adresse= $form->getValue('ADRESSE');
                        $codeville = $form->getValue('CODE_VILLE'); 
                        $tel = $form->getValue('TEL');
                        
                        $lesproprietaires = new Application_Model_DbTable_Proprietaires();
                        $lesproprietaires->ajouterProprietaire($numprop, $nom, $prenom, $adresse, $codeville, $tel);
                        $this->_helper->redirector('index');
                        
            }
            else {
                $form->populate($formData);
            }
        }
    }
 public function modifierAction() {

        $form = new Application_Form_Proprietaire();
        $form->envoyer->setLabel('Sauvegarder');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $formData = $this->getRequest()->getPost();
            if ($form->isValid($formData)) {

               $numprop = $form->getValue('NUMEROPROP'); 
                        $nom = $form->getValue('NOM');
                        $prenom= $form->getValue('PRENOM');
                        $adresse= $form->getValue('ADRESSE');
                        $codeville = $form->getValue('CODE_VILLE'); 
                        $tel = $form->getValue('TEL');

                $lesproprietaires = new Application_Model_DbTable_Proprietaires();
                $lesproprietaires->modifierProprietaire ($numprop, $nom, $prenom, $adresse, $codeville, $tel);
                $this->_helper->redirector('index');
            } else {
                $form->populate($formData);
            }
        } else {
            $id = $this->_getParam('NUMEROPROP', 0); //attention, valeur 0 invalide 
            $lesproprietaires = new Application_Model_DbTable_Proprietaires();
            $form->populate($lesproprietaires->obtenirProprietaire($id));
        }
    }
   public function supprimerAction() {
      
        if ($this->getRequest()->isPost()){
            $supprimer = $this-> getRequest()->getPost('supprimer');
            if ($supprimer == 'oui') {
                
                $id = $this->getRequest()->getPost('NUMEROPROP');
                $lesProprietaires = new Application_Model_DbTable_Proprietaires();
                $lesAppartements = new Application_Model_DbTable_Appartements();
                $lesAppartements->supprimerAppartementsProprietaire($id);
                $lesProprietaires->supprimerProprietaire($id);
            }
            $this->_redirect('/proprietaires');
        }
        else
        {
         
    $id = $this->_getParam ('NUMEROPROP', 0);
    $lesProprietaires = new Application_Model_DbTable_Proprietaires();
    $this->view->proprietaires =  $lesProprietaires->obtenirProprietaire($id);
        }
   }
} 

