<?php

namespace Coworking\vistas;

class VistaRegistroUsuario
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

                                    <h3 class="mb-5">Registro</h3>

                                    <form action="index.php" method="POST">
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="typeNameX-2" class="form-control form-control-lg" placeholder="Nombre" name="nombre" required />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="text" id="typeSurNameX-2" class="form-control form-control-lg" placeholder="Apellidos" name="apellidos" required />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email" name="email" required />
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="typePasswordX-2" class="form-control form-control-lg"pattern="^(?=.*[a-zA-Z]).{8,}$" 
                                            title="La contraseña debe tener al menos 8 caracteres y contener al menos una letra." placeholder="Contraseña" name="password" required />
                                            <p>La contraseña ha de tener al menos 8 caracteres y una letra.</p>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="tel" id="typeTelX-2" class="form-control form-control-lg" placeholder="Teléfono" name="telefono" required />
                                        </div>
                                        
                                        <?php
                                            if (strlen($error) > 0) {
                                                echo "<p class='text-danger'>{$error}</p>";
                                            }
                                        ?>

                                        <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit" name="meterUsuarioBBDD">Registrarse</button>

                                        <hr class="my-2">

                                        <a href="index.php" class="btn btn-danger btn-lg btn-block">Atrás</a>
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