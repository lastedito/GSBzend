<?php

class Application_Model_DbTable_Proprietaires extends Zend_Db_Table_Abstract
{

    protected $_name = 'proprietaires';
     protected $_primary = 'NUMEROPROP';
     
     public function ajouterProprietaire($numprop, $nom, $prenom, $adresse, $codeville, $tel) {
             $data = array('NUMEROPROP' => $numprop,
     'NOM' => $nom,
     'PRENOM' => $prenom,
     'ADRESSE' => $adresse,
     'CODE_VILLE' => $codeville,
     'TEL' => $tel);
             
             $this->insert($data);
     }

   public function obtenirProprietaire($id) {
        $row = $this->fetchRow("NUMEROPROP='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }
        $val=$row->toArray();
        return $val;
    }

    public function modifierProprietaire($numprop,$nom, $prenom, $adresse, $codeville, $tel) {
        $data = array('NUMEROPROP' => $numprop,
     'NOM' => $nom,
     'PRENOM' => $prenom,
     'ADRESSE' => $adresse,
     'CODE_VILLE' => $codeville,
     'TEL' => $tel
            
        );
/* @var $id type */
        $this->update($data, "NUMEROPROP='".$numprop."'");
    }
    public function supprimerProprietaire($numeroprop){
        $this->delete("NUMEROPROP='".$numeroprop."'");
    }
    }
    
