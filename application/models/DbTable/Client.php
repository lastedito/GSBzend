<?php

class Application_Model_DbTable_Client extends Zend_Db_Table_Abstract {

    protected $_name = 'clients';
    protected $_primary = 'NUM_CLI';

    public function ajouterClient($numcli, $nomcli, $prenomcli, $adressecli, $codeville, $telcli) {
        $data = array('NUM_CLI' => $numcli,
            'NOM_CLI' => $nomcli,
            'PRENOM_CLI' => $prenomcli,
            'ADRESSE_CLI' => $adressecli,
            'CODEVILLE_CLI' => $codeville,
            'TEL_CLI' => $telcli,
        );



        $this->insert($data);
    }

    public function obtenirClient($id) {
        $row = $this->fetchRow("NUM_CLI='" . $id . "'");
        if (!$row) {
            throw new Exception("Impossible de troouver l'enregistrement $id");
        }
        return $row->toArray();
    }

    public function modifierClient($numcli, $nomcli, $prenomcli, $adressecli, $codeville, $telcli) {
        $data = array(
            'NUM_CLI' => $numcli,
            'NOM_CLI' => $nomcli,
            'PRENOM_CLI' => $prenomcli,
            'ADRESSE_CLI' => $adressecli,
            'CODEVILLE_CLI' => $codeville,
            'TEL_CLI' => $telcli,
        );
        /* @var $id type */
        $this->update($data, "NUM_CLI='" . $numcli . "'");
    }

    public function supprimerClient($numcli) {
        $this->delete("NUM_CLI='" . $numcli . "'");
    }

}
