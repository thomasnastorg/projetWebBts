<?php

foreach ($lesSeances as $cours){
    echo "<li>Horaire : ".$cours["heur"]
        //."<br>Nombre de places : ".$cours["nbPlace"]
        ."<br>Professeur (id) : ".$cours["nom"]
        //."<br>Professeur : ".$cours["nom"]
        //."<br>Instrument (id) : ".$cours["idInstrument"]
        ."<br>instumant : ".$cours["nomintru"]
        ."<br><a href='index.php?action=Inscription&coursSelectionne=".$cours["id"]."'>Inscription</a>"
        ."</li>";

}
