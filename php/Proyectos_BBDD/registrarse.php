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
                            <div class="col-lg-12 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inserta tus datos</h1>
                                    </div>
                                    <!-- Register form -->
                                     <!-- Name -->
                                    <form action="controlador.php" method="POST" class="user">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control"
                                                name="register-name" max="45" required>
                                            <div class="form-text">No puede contener mas de 45 carácteres.</div>
                                        </div>
                                        <!-- Last name -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Apellidos:</label>
                                            <input type="text" class="form-control"
                                                name="register-last-name" max="145" required>
                                            <div class="form-text">No puede contener mas de 145 carácteres.</div>
                                        </div>
                                        <!-- Password -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Contraseña:</label>
                                            <input type="password" class="form-control"
                                            name="register-password" pattern="^(?=.*[A-Z]).{8,}$" required>
                                            <div class="form-text">La contraseña ha de tener 8 caracteres y al menos una minuscula.</div>
                                        </div>
                                        <!-- Email -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Email:</label>
                                            <input type="email" class="form-control"
                                            name="register-email" placeholder="ejemploemail@gmail.com" required>
                                        </div>
                                        <!-- Birthday -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Fecha de nacimiento:</label>
                                            <input type="date" class="form-control"
                                                name="register-birthdate" required>
                                        </div>
                                        <!-- Telefone -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Teléfono:</label>
                                            <input type="tel" class="form-control"
                                            name="register-tel" pattern="[0-9]{9}" placeholder="123456789" required>
                                        </div>
                                        <!-- City -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Ciudad:</label>
                                            <input type="text" class="form-control"
                                            name="register-city" max="45" required>
                                            <div class="form-text">La ciudad no puede contener más de 45 caracteres.</div>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Crear cuenta" name="register">
                                            <input type="reset" class="btn btn-danger btn-user btn-block mt-0" value="Limpiar">
                                        </div>
                                        
                                    </form>
                                
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