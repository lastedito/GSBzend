<?php

class Application_Model_DbTable_Appartements extends Zend_Db_Table_Abstract {

    protected $_name = 'appartements';
    protected $_primary = 'NUMAPPART';
    protected $_rowClass = 'Application_Model_DbTable_AppartementsRow';
    protected $_referenceMap = array(
        'proprio' => array(
            'columns' => 'NUMEROPROP',
            'refColumns' => 'NUMEROPROP',
            'refTableClass' => 'Application_Model_DbTable_Proprietaire',
    ));

    public function ajouterAppartement($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc) {
        $data = array('NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prixloc,
            'PRIX_CHARG' => $prixcharge,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $datelibre,
            'NUMEROPROP' => $numprop,
            'NUMEROLOC' => $numloc
        );



        $this->insert($data);
    }

    public function obtenirAppartements($id) {
        $row = $this->fetchRow("NUMAPPART='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }
        return $row->toArray();
    }

    public function modifierAppartements($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc) {
        $data = array(
            'NUMAPPART' => $numappart,
            'TYPAPPART' => $typappart,
            'PRIX_LOC' => $prixloc,
            'PRIX_CHARG' => $prixcharge,
            'RUE' => $rue,
            'ARRONDISSEMENT' => $arrondissement,
            'ETAGE' => $etage,
            'ASCENSEUR' => $ascenseur,
            'PREAVIS' => $preavis,
            'DATE_LIBRE' => $datelibre,
            'NUMEROPROP' => $numprop,
            'NUMEROLOC' => $numloc
        );
        /* @var $id type */
        $this->update($data, "NUMAPPART='" . $numappart . "'");
    }

    public function supprimerAppartements($numappart) {
        $this->delete("NUMAPPART='" . $numappart . "'");
    }

    public function supprimerAppartementsProprietaire($numprop) {
        $this->delete("NUMEROPROP='" . $numprop . "'");
    }
    
    public function obtenirChargeProp($id){
        $row = $this->fetchAll("NUMEROPROP='" . $id . "'");
        $row2=$row->toArray();
        $total=0;
        if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }
           foreach($row2 as $unrow){
//               var_dump($unrow);
               $total=$total+$unrow["PRIX_CHARG"];
           }
        return $total;
    }
    
    public function obtenirAppartementsProp($id) {
        $row = $this->fetchAll("NUMEROPROP='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }
        return $row->toArray();
    }
}
