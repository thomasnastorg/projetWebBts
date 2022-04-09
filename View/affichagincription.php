<table class="table">
    <thead>
    <tr>

        <th scope="col">heure</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
    </tr>
    </thead>

    <?php
    //var_dump($lesSeances);
    foreach ($lesSeances as $inscription){

         echo   "<tbody>
    <tr>
        <td>".$inscription["heur"]."</td>
       <td>".$inscription["nom"]."</td>
        <td>".$inscription["prénom"]."</td>
        <td><form action='../index.php?action=pdf&inscriptionpdf=".$inscription["id"]."' method='post'><input type='submit' name='creatpdf' value='PDF' ></form></td>
        
    </tr>";

    }
    ?>

    </tbody>
</table>



