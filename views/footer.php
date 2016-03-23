<div id="chat-bar" class="col-sm-1 screen-adjust text-center">

    <span class="badge badge-chat">3</span>
    <div class="break"></div>
    <span class="glyphicon glyphicon-user chat-bar-icon"></span>
    <p>Firstname</p>

</div>
</div>

</div>

<div class="modal fade" id="avatar" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 style="text-align:center;">Changer d'avatar</h4>
            </div>
            <div class="modal-body form-group">

                <form id="modal" action='add_avatar.php' method='post'>
                    <div class="input-group">
                        <input type="text" class="form-control" name="avatar" placeholder="Lien de la photo ici">
                        <span class="input-group-btn">
                        <button class="btn btn-secondary" type="submit">Go!</button>
                        </span>
                        <input type='hidden' name='id_user' value="">
                    </div>
                </form>
                <hr>
                <a class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Ajout User</h3>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Nom, Prénom" name="searchUser"/>
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addTask" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Ajout Tâche</h3>
            </div>
            <div class="modal-body">

                <?php require_once("formulaire/FormTache.php");?>

        </div>
    </div>
</div>
</div>

<div class="modal fade" id="seeUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>Nom du User</h3>
            </div>
            <div class="modal-body">
                <span class="glyphicon glyphicon-user"></span>
                <h4><strong>Nom:</strong> User</h4>
                <h4><strong>Prénom:</strong> User</h4>
                <h4><strong>Email:</strong> user@user.com</h4>
                <h4><strong>Fonction:</strong> User</h4>
            </div>

            <?php require ("formulaire/ExclureUser.php");?>

        </div>
    </div>
</div>

<div class="modal fade" id="seeTask" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Nom de tâche</h3>
            </div>
            <div class="modal-body">

                <?php include ("formulaire/FormTache.php"); ?>

            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="userList" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h3>User List</h3>
            </div>
            <div class="modal-body">

                <?php include ("formulaire/SearchUser.php"); ?>

            </div>
            <div class="modal-footer">
                <a class="btn btn-danger" data-dismiss="modal">Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="adminUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Create User</h3>
            </div>
            <div class="modal-body">

                <?php include ("formulaire/FormUser.php");?>

        </div>
    </div>
</div>


<div class="modal fade" id="editUser" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Edit User</h3>
            </div>
            <div class="modal-body">

                <?php include ("formulaire/FormUser.php"); ?>

        </div>
    </div>
</div>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap/js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script>

    var screen = $(window).height();
    var app = $("#app").height();

    if(screen > app) {
        $(".screen-adjust").css("min-height", $(window).height());
    }
    else {
        $(".screen-adjust").css("min-height", $("#app").height());
    }

    $(".adjust-menu").css("min-height", $("#app").height());
    $(".adjust-panel").css("min-height", $(window).height($("#title").height()));

    $(document).ready(function() {
        var max_fields      = 100; //maximum input boxes allowed
        var wrapper         = $(".mini-task"); //Fields wrapper
        var add_button      = $(".addMiniTask"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<hr><div class="form-group"> <h4>Titre</h4> <input class="form-control disabled" disabled="disabled" type="text" name="title" placeholder="Titre de la tâche"> </div> <div class="form-group"> <h4>Commentaire</h4> <textarea class="form-control disabled" disabled="disabled" name="comments" placeholder="Plus d\'information sur la tâche"></textarea> </div>'); //add input box
            }
        });

        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });

    $('.enabled').click(function() {
        $('.disabled').attr('disabled',! this.checked)
    });

</script>
</body>
</html>