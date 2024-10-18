<?php include "cabecera.php" ?>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido de vuelta!</h1>
                                    </div>
                                    <form class="user" action="controlador.php" method="POST">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email"
                                                placeholder="Inserta tu Email..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Contraseña" 
                                                name="password" pattern="^(?=.*[A-Z]).{8,}$" required>
                                            <div id="passHelp" class="form-text small p-3">La contraseña ha de tener 8 caracteres y al menos una minuscula.</div>
                                        </div>
                                        
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login" name="login">
                                        <hr>
                                        <?php 
                                        if(isset($_GET["error"])){
                                            echo '<div id="errorId" class="form-text text-danger">Error login.</div>';
                                        }
                                        ?>
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="#">Olvidaste la contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="registrarse.php">Crear una cuenta!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>