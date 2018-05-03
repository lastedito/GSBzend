<?php

class Application_Form_Proprietaire extends Zend_Form
{

    public function init()
    {

        $this->setName('proprietaires');
        
        $numprop = new Zend_Form_Element_Text('NUMEROPROP');
        $numprop->setLabel('Numero prop')
       //         ->setAttrib('readonly', 'readonly')
                ->setValue('')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
                
        $nom = new Zend_Form_Element_Text('NOM');
        $nom->setLabel('Nom')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $prenom = new Zend_Form_Element_Text('PRENOM');
        $prenom->setLabel('Prenom ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $adresse = new Zend_Form_Element_Text('ADRESSE');
        $adresse->setLabel('Adresse')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $codeville = new Zend_Form_Element_Text('CODE_VILLE');
        $codeville->setLabel('CODE VILLE')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $tel = new Zend_Form_Element_Text('TEL');
        $tel->setLabel('TEL')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
      

        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUMEROPROP', 'boutonenvoyer');
        
        $this->addElements(array($numprop, $nom, $prenom, $adresse, $codeville, $tel, $envoyer));
    }


}

