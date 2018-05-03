<?php

class Application_Form_Visite extends Zend_Form
{

    public function init()
    {
        $this->setName('Visite');
        
        $numcli= new Zend_Form_Element_Text('NUM_CLI');
        $numcli->setLabel('Numero client')
       //         ->setAttrib('readonly', 'readonly')
                ->setValue('')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $numappart = new Zend_Form_Element_Text('NUMAPPART');
        $numappart->setLabel('Numero appart')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $datevisite = new Zend_Form_Element_Text('DATE_VISITE');
        $datevisite->setLabel('date de visite ')
                ->setRequired(true)
                ->addFilter('StripTags')
                ->addFilter('StringTrim')
                ->addValidator('NotEmpty');
        $envoyer = new Zend_Form_Element_Submit('envoyer');
        $envoyer->setAttrib('NUM_CLI', 'boutonenvoyer');
        
        $this->addElements(array($numcli, $numappart, $datevisite, $envoyer));
    }


}

