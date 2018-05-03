<?php

class Application_Model_DbTable_Locataires extends Zend_Db_Table_Abstract
{

    protected $_name = 'locataires';
     protected $_primary = 'NUMEROLOC';

     
     public function ajouterLocataire ($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque) {
             $data = array('NUMEROLOC' => $numeroloc,
     'NOM_LOC' => $nomloc,
     'PRENOM_LOC' => $prenomloc,
     'DATENAISS' => $datenaiss,
     'TEL_LOC' => $telloc,
     'R_I_B' => $rib,
     'BANQUE' => $banque,
     'RUE_BANQUE' => $ruebanque,
     'CODEVILLE_BANQUE' => $codeville,
     'TEL_BANQUE' => $telbanque);
             
             $this->insert($data);
     }
     
     public function obtenirLocataire($numeroloc){
         $row = $this->fetchRow("NUMEROLOC='".$numeroloc."'");
         if(!$row){
             throw new Exception("Impossible de trouver l'enregistrement $numeroloc");
         }
        $val=$row->toArray();
        return $val;
     }
     
     public function ModifierLocataire($numeroloc, $nomloc, $prenomloc, $datenaiss, $telloc, $rib, $banque, $ruebanque, $codeville, $telbanque) {
             $data = array('NUMEROLOC' => $numeroloc,
     'NOM_LOC' => $nomloc,
     'PRENOM_LOC' => $prenomloc,
     'DATENAISS' => $datenaiss,
     'TEL_LOC' => $telloc,
     'R_I_B' => $rib,
     'BANQUE' => $banque,
     'RUE_BANQUE' => $ruebanque,
     'CODEVILLE_BANQUE' => $codeville,
     'TEL_BANQUE' => $telbanque);
             
             $this->update($data, "NUMEROLOC='".$numeroloc."'");
         
     }
      public function supprimerLocataire($numeroloc){
        $this->delete("NUMEROLOC='".$numeroloc."'");
    }
     
}

