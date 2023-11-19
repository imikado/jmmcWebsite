<div class="col s12 ">

    <h4>Formulaire de contact</h4>

    <div class="card">



        <div class="card-content">



            <form action="contact.php" target="myFrame" method="POST" class="col s12" method="POST">

                <div class="row">
                    <div class="input-field col s12">
                        <input value="" placeholder="Votre sujet" id="title" name="title" type="text" class="validate">
                        <label for="title">Sujet</label>

                    </div>
                </div>


                <!-- WYSISWYG -->
                <div class="row">
                    <div class="col s12">


                    </div>
                    <div class="input-field col s12">

                        <textarea name="message" class="materialize-textarea" placeholder="Votre message"> </textarea>
                        <label for="title">Message</label>

                    </div>
                </div>
                <!-- END WYSISWYG -->


                <div class="row">
                    <div class="input-field col offset-s10 s2 right-align">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Envoyer
                            <i class="material-icons right">save</i>
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<iframe style="display:none" id="myFrame" name="myFrame"></iframe>