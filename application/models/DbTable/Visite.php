<?php

class Application_Model_DbTable_Visite extends Zend_Db_Table_Abstract {

    protected $_name = 'visiter';
    protected $_primary = array('NUM_CLI', 'NUMAPPART');
    protected $_rowClass = 'Application_Model_DbTable_AppartementsRow';
    protected $_referenceMap = array(
        'client' => array(
            'columns' => 'NUM_CLI',
            'refColumns' => 'NUM_CLI',
            'refTableClass' => 'Application_Model_DbTable_Client',
    ),
        'appart' => array(
            'colums' => 'NUMAPPART',
            'refColumns' => 'NUMAPPART',
            'refTableClass' => 'Application_Model_DbTable_Appartements',
        ));
//
    public function ajouterVisite($numappart, $numcli, $datevisite) {
        $data = array('NUMAPPART' => $numappart,
            'NUM_CLI' => $numcli,
            'DATE_VISITE' => $datevisite
        );
        $this->insert($data);
    }

    public function obtenirVisite($id,$id2) {
        $row = $this->fetchRow("NUMAPPART='" . $id . "' AND NUM_CLI='".$id2."'");
        if (!$row) {
            throw new Exception("Impossible de trouver l'enregistrement $id");
        }
        return $row->toArray();
    }
//
//    public function modifierAppartements($numappart, $typappart, $prixloc, $prixcharge, $rue, $arrondissement, $etage, $ascenseur, $preavis, $datelibre, $numprop, $numloc) {
//        $data = array(
//            'NUMAPPART' => $numappart,
//            'TYPAPPART' => $typappart,
//            'PRIX_LOC' => $prixloc,
//            'PRIX_CHARG' => $prixcharge,
//            'RUE' => $rue,
//            'ARRONDISSEMENT' => $arrondissement,
//            'ETAGE' => $etage,
//            'ASCENSEUR' => $ascenseur,
//            'PREAVIS' => $preavis,
//            'DATE_LIBRE' => $datelibre,
//            'NUMEROPROP' => $numprop,
//            'NUMEROLOC' => $numloc
//        );
//        /* @var $id type */
//        $this->update($data, "NUMAPPART='" . $numappart . "'");
//    }
//
//    public function supprimerAppartements($numappart) {
//        $this->delete("NUMAPPART='" . $numappart . "'");
//    }
//
//    public function supprimerAppartementsProprietaire($numprop) {
//        $this->delete("NUMEROPROP='" . $numprop . "'");
//    }
//
}
