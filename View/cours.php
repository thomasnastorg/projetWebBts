<div class="card-deck d-flex ">
<?php

foreach ($lesSeances as $cours){
    echo "<div class='card' style='margin-left: 20px !important; top: 20px !important;'>
          "

        //."<br>Nombre de places : ".$cours["nbPlace"]
        ."<div class='card-body'><h5 class='card-title'> cours de ".$cours["nomintru"]."
             <p class='card-text'>
             </h5> <br>Professeur : ".$cours["nom"]
            ." <li>Horaire : ".$cours["heur"]." h </li> 
             
       
        </p><br><a href='index.php?action=Inscription&coursSelectionne=".$cours["id"]."'class='btn btn-primary' >Inscription</a>"
        ."</li> 
          </div>
        </div>";


}
?>
</div>

</body>
</html>



