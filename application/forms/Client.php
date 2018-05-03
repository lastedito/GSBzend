<?php

class Application_Form_Client extends Zend_Form
{

    public function init()
    {
        $this->setName('Client');
        
        $numcli = new Zend_Form_Element_Text('NUM_CLI');
        $numcli->setLabel('Numero Client')
//                ->setAttrib('readonly', 'readonly')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $nomcli = new Zend_Form_Element_Text('NOM_CLI');
        $nomcli->setLabel('Nom du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $prenomcli = new Zend_Form_Element_Text('PRENOM_CLI');
        $prenomcli->setLabel('Prenom du client ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adressecli = new Zend_Form_Element_Text('ADRESSE_CLI');
        $adressecli->setLabel('Adresse du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $codeville = new Zend_Form_Element_Text('CODEVILLE_CLI');
        $codeville->setLabel('Code Postal')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $telcli = new Zend_Form_Element_Text('TEL_CLI');
        $telcli->setLabel('Telephone du client')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUM_CLI', 'boutonenvoyer');
        
        $this->addElements(array($numcli, $nomcli, $prenomcli, $adressecli, $codeville, $telcli, $envoyer));
    }


}

