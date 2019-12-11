<?php

require ('Commentaire.php');

class CommentaireModele
{
    private $con;
    private $CommGtw;

    public function __construct($con)
    {
        $this->con = $con;
        $this->CommGtw = new CommentaireGateway($con);
    }

    public function selectCommentaires($idN)
    {
        $results = $this->CommGtw->selectCommentaires($idN);
        $tab = [];
        foreach ($results as $row)
            $tab[] = new Commentaire($row['idNews'], $row['pseudo'], $row['dateP'], $row['contenu'] );
        return $tab;
    }

}