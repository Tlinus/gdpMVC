<?php

require_once "header.php";

?>


<div class="col-sm-9">
    <div id="app" class="row">

        <div class="col-sm-12">
            <div class="row">
                <form>
                    <div class="col-sm-5">
                        <h1>
                            <button class="btn btn-danger" type="submit">Delete Projet</button>
                        </h1>
                    </div>
                </form>
                <div class="col-sm-6">
                    <h1>Projet</h1>
                </div>

            </div>
        </div>

        <div class="col-sm-6 adjust">

            <div class="row">

                <div class="col-sm-12">

                    <div id="file" class="adjust-panel panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center">Fichier</h1>
                        </div>
                        <div class="panel-body">
                            <p>Test</p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="row">

                <div class="col-sm-12">

                    <div id="tache" class="adjust-panel panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center">Définition du Projet</h1>
                        </div>
                        <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <a href="" data-toggle="modal" data-target="#addUser">
                                            <span class="glyphicon glyphicon-book icon-def"></span>
                                            <h3>Ajout User</h3>
                                        </a>
                                        <hr>
                                        <p><a data-toggle="modal" data-target="#seeUser" href="">User 1</a></p>
                                        <hr>
                                        <p><a data-toggle="modal" data-target="#seeUser" href="">User 2</a></p>

                                    </div>
                                    <div class="col-sm-6 text-center">
                                        <a href="" data-toggle="modal" data-target="#addTask">
                                            <span class="glyphicon glyphicon-plus-sign icon-def"></span>
                                            <h3>Ajout Tâche</h3>
                                        </a>
                                        <hr>
                                        <p><a data-toggle="modal" data-target="#seeTask" href="">Task 1</a></p>
                                        <hr>
                                        <p><a data-toggle="modal" data-target="#seeTask" href="">Task 2</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div id="chat" class="adjust-panel panel panel-default">
                        <div class="panel-heading">
                            <h1 class="text-center">Chat</h1>
                        </div>
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="col-sm-1">
                                <span class="glyphicon glyphicon-user chat-icon"><span>
                                    </div>
                                    <div class="col-sm-11">
                                        <p class="received-message">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae ipsum massa. Nulla mattis, erat in finibus molestie, erat magna efficitur metus, ac ornare lacus nibh nec velit.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-10">
                                    <p class="sent-message chat-text-right">Vestibulum enim libero, iaculis aliquet ipsum vel, consectetur pretium lacus. Aliquam erat volutpat.</p>
                                </div>
                                <div class="col-sm-1">
                                <span class="glyphicon glyphicon-user chat-icon"><span>
                                </div>
                            </div>

                        </div>

                        <div class="panel-footer">

                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn"><button class="btn btn-primary btn-sm" id="btn-chat">Send</button></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php

require_once "footer.php";

?>


