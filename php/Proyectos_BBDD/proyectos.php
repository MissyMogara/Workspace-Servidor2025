<?php include "cabecera.php" ?>
<?php require "lib.php" ?>
<?php $proyectos = getProjects(); ?>

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

                    <!-- Proyects Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabla de proyectos</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha final prevista</th>
                                            <th>Días transcurridos</th>
                                            <th>Porcentaje completado</th>
                                            <th>Importancia</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha final prevista</th>
                                            <th>Días transcurridos</th>
                                            <th>Porcentaje completado</th>
                                            <th>Importancia</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        
                                        if (isset($proyectos)) {
                                        foreach ($proyectos as $proyecto) {
                                            echo "<tr>";
                                            echo "<td><a class='text-decoration-none' href='controlador.php?action=ver&id=" . $proyecto["id"] . "'>" . $proyecto['nombre'] . "<a></td>";
                                            echo "<td>" . $proyecto['fecha_inicio'] . "</td>";
                                            echo "<td>" . $proyecto['fecha_fin'] . "</td>";
                                            echo "<td>" . $proyecto['dias_transcurridos'] . "</td>";
                                            echo "<td>" . $proyecto['porcentaje_completado'] . '%' . "</td>";
                                            echo "<td>" . $proyecto['importancia'] . "</td>";
                                            echo "<td> <div class='d-flex justify-content-around'>
                                            <a class='btn btn-primary btn-sm' role='button' 
                                            href='controlador.php?action=modificar&id=" . $proyecto["id"] . "'><i class='fas fa-cog'></i></a>
                                            <a class='btn btn-danger btn-sm' role='button' 
                                            href='controlador.php?action=eliminar&id=" . $proyecto["id"] . "'><i class='fas fa-trash'></i></a>
                                            </div></td>";
                                            echo "</tr>";
                                            
                                            }
                                        }
                                        
                                        
                                        ?>
                                    </tbody>
                                </table>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>