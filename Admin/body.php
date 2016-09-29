
<div class="container">
    <div class="row">

        </br>
    <h1>Liste des places de parking</h1>
    </br> </br> </br> </br>

<div class="col-md-10 col-md-offset-1">

    <div class="container">
        <div class="row">

            <a id="add_row" class="btn btn-default pull-right">Add Row</a>
        </div>
        <div class="row clearfix">
            <div class="col-md-12 table-responsive">
                <table class="table table-bordered table-hover table-sortable" id="tab_logic">
                    <thead>
                        <tr >

                            <th class="text-center">

                                # de place
                            </th>
                            <th class="text-center">
                                Nom
                            </th>
                            <th class="text-center">
                                Prenom
                            </th>

                            <th class="text-center" style="border-top: 1px solid #ffffff; border-right: 1px solid #ffffff;">
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id='addr0' data-id="" class="hidden">

                            <td data-name="place">
                                <input type="text" name='name0'  placeholder='place' class="form-control"/>
                            </td>
                            <td data-name="nom">
                                <input type="text" name='mail0' placeholder='Nom' class="form-control"/>
                            </td>
                            <td data-name="prenom">
                                <input type="text" name='mail0' placeholder='Prenom' class="form-control"/>
                            </td>

                            <td data-name="del">
                                <button nam"del0" class='btn btn-danger glyphicon glyphicon-remove row-remove'></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
            <div class="panel-footer">
                <div class="row">
                    <div class="col col-xs-4">Jour 1 à 7
                    </div>
                    <div class="col col-xs-8">
                        <ul class="pagination hidden-xs pull-right">
                            <li class="active"><a  href="body.php">1</a></li>
                            <li><a href="mardi.php">2</a></li>
                            <li><a href="mercredi.php">3</a></li>
                            <li><a href="Jeudi.php">4</a></li>
                            <li><a href="vendredi.php">5</a></li>
                            <li><a href="samedi.php">6</a></li>
                            <li><a href="dimanche.php">7</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="#" class="btn btn-success pull-right">Enregistrer</a>
            <a href="#" class="btn btn-primary">Annuler</a>

        </div>
    </div>

</div>
</div>
</div>


<?php
include ("footer.php");
?>