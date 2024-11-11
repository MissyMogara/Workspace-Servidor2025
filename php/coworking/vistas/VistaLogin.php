<?php

namespace Coworking\vistas;

class VistaLogin
{

    public static function render($error)
    {
        include_once "head.php";

?>



        <body>
            <!-- FORM -->
            <section class="vh-100" style="background-color: #508bfc;">
                <div class="container py-5 h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                                <div class="card-body p-5 text-center">
                                    
                                    <?php
                                        if (strlen($error) > 0) {
                                            echo "<p class='text-danger'>{$error}</p>";
                                        }
                                    ?>

                                    <h3 class="mb-5">Login</h3>
                                    <form action="index.php" method="POST">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="user-email"/>
                                            <label class="form-label" for="typeEmailX-2">Email</label>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="user-password"/>
                                            <label class="form-label" for="typePasswordX-2">Password</label>
                                        </div>

                                        <!-- Checkbox -->
                                        <div class="form-check d-flex justify-content-start mb-4">
                                            <input class="form-check-input" type="checkbox" value="" id="form1Example3" />
                                            <label class="form-check-label" for="form1Example3"> Remember password </label>
                                        </div>

                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" name="logearse" type="submit">Login</button>

                                        <hr class="my-2">

                                        <a href="index.php?action=registrarse" class="btn btn-primary btn-lg btn-block">Registrarse</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bootstrap JS and dependencies -->
            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        </body>

        </html>

<?php
    }
}
?>