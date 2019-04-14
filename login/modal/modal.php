<!-- Modal -->
<div id="simpleModal" class="modal">
    <div class="modal-content">
        <div class="modal-header">
            <span id="closeBtn_" class="closeBtn">&times;</span>
            <h2>Login</h2>
        </div>
        <div class="modal-body">
            <div class="form-style">
                <form class="form-basics" action="" method="post">
                    <fieldset>
                        <?php
                        if ($_SESSION["loggedIn"]) {
                            isLoggedin();
                        } else {
                            notLoggedIn();
                        }
                        ?>
                    </fieldset>
                </form>
            </div>
        </div>
        <div class="modal-footer">
            <a href="adminregistration.php">Ny bruker?</a>
        </div>
    </div>
</div>