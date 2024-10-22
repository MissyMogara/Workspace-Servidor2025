<?php include "cabecera.php" ?>
<?php require "lib.php" ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "navBar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Infrmation -->
                        <li>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                <?php
                                if (isset($_SESSION["usuario"])){
                                    echo $_SESSION["usuario"]["email"];
                                };
                                ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Crear nuevo proyecto</h1>

                    <!-- Proyects Example -->
                    <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Inserta los datos del proyecto</h1>
                                    </div>
                                    <!-- New project form -->
                                    <!-- Project name -->
                                    <form action="controlador.php" method="POST" class="user">
                                        <div class="form-group">
                                            <label for="" class="form-label">Nombre:</label>
                                            <input type="text" class="form-control"
                                                name="project-name" id="project-name" required>
                                        </div>
                                        <!-- Initial date -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Fecha inicial:</label>
                                            <input type="date" class="form-control"
                                                name="initial-date" id="initial-date" required>
                                        </div>
                                        <!-- Finishing date -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Fecha fin prevista:</label>
                                            <input type="date" class="form-control"
                                            name="finishig-date" id="finishig-date" required>
                                        </div>
                                        <!-- Days -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Días transcurridos:</label>
                                            <input type="number" class="form-control"
                                            name="days-passed" id="days-passed" required>
                                        </div>
                                        <!-- Completed % -->
                                        <div class="form-group">
                                            <label for="" class="form-label">Porcentaje completado:</label>
                                            <input type="number" class="form-control"
                                                name="percentage" id="percentage" min="0" max="100" placeholder="0-100" required>
                                        </div>
                                        <!-- Importance -->
                                        <div class="form-group">
                                        <label for="" class="form-label">Importancia:</label>
                                            <input type="number" class="form-control" placeholder="1-5"
                                            name="importance" id="importance" min="1" max="5" required>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <input type="submit" class="btn btn-primary btn-user btn-block" value="Crear proyecto" name="nuevo">
                                            <input type="reset" class="btn btn-danger btn-user btn-block mt-0" value="Limpiar">
                                        </div>
                                        
                                    </form>
                                
                                </div>

                </div>
                <!-- /.container-fluid -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php include "pie.php" ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Seguro que quieres salir?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Logout" en la parte inferior de la pantalla para salir de la sesión.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="controlador.php?action=logout">Logout</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>