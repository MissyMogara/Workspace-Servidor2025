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
                <h1 class="h3 mb-2 text-gray-800">Proyectos</h1>

                <!-- Project Card -->
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                                <!-- Circle -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <div class="progress-circle" id="circle" style="--porcentaje: <?php echo $_SESSION["proyectoActual"]["porcentaje_completado"] ?> ">
                                            <span class="text-light"><?php echo $_SESSION["proyectoActual"]["porcentaje_completado"] ?>%</span>
                                        </div>
                                    </div>
                                    <div class="mt-4 text-center small">
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-success"></i>Completed
                                    </span>
                                    <br>
                                    <span class="mr-2">
                                        <i class="fas fa-circle text-secondary"></i>Not completed
                                    </span>
                                    </div>
                                </div>
                                <!-- End of Circle -->
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_SESSION["proyectoActual"]["nombre"] ?></h5>
                            <p class="card-text"><?php echo $_SESSION["proyectoActual"]["fecha_inicio"] ?> - <?php echo $_SESSION["proyectoActual"]["fecha_fin"] ?></p>
                            <p class="card-text"><small class="text-body-secondary">Han transcurrido <?php echo $_SESSION["proyectoActual"]["dias_transcurridos"] ?> días</small></p>
                            <p class="card-text"><small class="text-body-secondary"><strong>Nivel de importancia:</strong> <?php echo $_SESSION["proyectoActual"]["importancia"] ?></small></p>
                        </div>
                        </div>
                    </div>
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