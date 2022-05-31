<div class="table-responsive-xl w-auto p-5">
<table class="table table-striped  ">
    <thead>
    <tr>

        <th scope="col">heure</th>
        <th scope="col">Nom</th>
        <th scope="col">Prénom</th>
        <th scope="col">PFD</th>
        <th scope="col">Supprimer</th>
    </tr>
    </thead>
    <tbody>
    <?php
    //var_dump($lesSeances);
    foreach ($lesSeances as $inscription){
        echo   "
                <tr>
                <td>".$inscription["heur"]." H</td>
                <td>".$inscription["nom"]."</td>
                <td>".$inscription["prénom"]."</td>
                <td><form action='../index.php?action=pdf&inscriptionpdf=".$inscription["id"]."' method='post'>
                <input type='submit' alt='Submit' name='creatpdf' src='../src/Log_PDF.png' width='48' height='48' ></form></td>
                <td><form action='../index.php?action=del&inscriptiondeluser=".$inscription["id"]."&inscriptiondelcours=".$inscription["idcours"]."' method='post'><input type='submit' alt='del' name='del' src='../src/del.png' width='48' height='48' ></form></td>
                </tr>";

    }
    ?>

    </tbody>
</table>
</div>



