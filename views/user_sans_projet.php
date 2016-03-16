<?php

require_once "header_user.php";

?>


        <div class="col-sm-9">
            <div id="app" class="row">

                <h1 class="text-center">Vous n'etes inscrit dans aucun projet</h1>

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
                                    <h1 class="text-center">Tâches</h1>
                                </div>
                                <div class="panel-body">
                                    <div class="progress">

                                        <div id="progress-bar" class="progress-bar progress-bar-success" role="progressbar"
                                             aria-valuenow="" aria-valuemin="0" aria-valuemax="100"
                                             style="width: 50%">

                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <form method="post" action="task.php">

                                            <input class="btn btn-success" type="submit" name="confirm" value="Confirm">
                                        </form>
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


