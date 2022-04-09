<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <h5 class="card-header">Inscription</h5>

                Cours no <?php echo $coursSelectionne; ?>
                <div class="card-body">
                    <form action="index.php?action=valderinscription" method="post">
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="nom">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Prénom</label>
                            <input type="text" class="form-control" name="prenom">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">telephone </label>
                            <input type="text" class="form-control" name="numero" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Email</label>
                            <input type="text" class="form-control" name="adrress">
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">adresse</label>
                            <input type="text" class="form-control" name="mail"">
                        </div>
                        <input type="hidden" value="<?php echo $coursSelectionne?>" name="numcours">
                        <div class="mb-3">

                            <input type="submit" name="save" value="S'incrire">
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>