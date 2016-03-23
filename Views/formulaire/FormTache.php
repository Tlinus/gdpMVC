<form>
    <div class="form-group">
        <h4>Titre</h4>
        <input class="form-control" type="text" name="title" placeholder="Titre de la tâche">
    </div>
    <div class="form-group">
        <h4>Commentaire</h4>
        <textarea class="form-control" name="comments" placeholder="Plus d'information sur la tâche"></textarea>
    </div>
    <hr>
    <div class="form-group">
        <h3>Sous-Tâche</h3>
        Activer
        <input type="checkbox" class="enabled">
    </div>
    <button class="btn btn-primary addMiniTask" id="addMiniTask">Ajout Sous-Tâche</button>
    <div class="form-group">
        <h4>Titre</h4>
        <input class="form-control disabled" disabled="disabled" type="text" name="title" placeholder="Titre de la tâche">
    </div>
    <div class="form-group">
        <h4>Commentaire</h4>
        <textarea class="form-control disabled" disabled="disabled" name="comments" placeholder="Plus d'information sur la tâche"></textarea>
    </div>

    <div class="mini-task"></div>

    <div class="modal-footer">
        <input class="btn btn-success" type="submit">
        <a class="btn btn-danger" data-dismiss="modal">Close</a>
    </div>
</form>