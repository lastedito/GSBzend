<?php

class Application_Form_Locataire extends Zend_Form
{

    public function init()
    {

        $this->setName('locataires');
        
        $numeroloc = new Zend_Form_Element_Text('NUMEROLOC');
        $numeroloc->setLabel('Numero loc')
               // ->setAttrib('readonly', 'readonly')
                ->setValue('')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
                
        $nomloc = new Zend_Form_Element_Text('NOM_LOC');
        $nomloc->setLabel('Nom loc')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        
        $prenomloc = new Zend_Form_Element_Text('PRENOM_LOC');
        $prenomloc->setLabel('Prenom loc ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $datenaiss = new Zend_Form_Element_Text('DATENAISS');
        $datenaiss->setLabel('Date of birth')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $telloc = new Zend_Form_Element_Text('TEL_LOC');
        $telloc->setLabel('Tel loc')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $rib = new Zend_Form_Element_Text('R_I_B');
        $rib->setLabel('Rib')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $banque = new Zend_Form_Element_Text('BANQUE');
        $banque->setLabel('Banque')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $ruebanque = new Zend_Form_Element_Text('RUE_BANQUE');
        $ruebanque->setLabel('rue banque')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $codeville = new Zend_Form_Element_Text('CODEVILLE_BANQUE');
        $codeville->setLabel('Code ville banque')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $telbanque = new Zend_Form_Element_Text('TEL_BANQUE');
        $telbanque->setLabel('tel banque')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');

        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUMEROLOC', 'boutonenvoyer');
        
        $this->addElements(array($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque, $envoyer));
    }


}

