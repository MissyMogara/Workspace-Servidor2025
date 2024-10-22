<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="proyectos.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-sun"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard Admin</div>
    </a>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="proyectos.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interfaz
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Proyectos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones:</h6>
                <!-- <a class="collapse-item" href="nuevoProyecto.php"><i class="fas fa-plus-circle"></i> Añadir</a> -->
                <!-- Link trigger modal -->
                <a class="collapse-item" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-plus-circle"></i> Añadir</a>
                <!-- End of trigger modal -->
                <a class="collapse-item" href="controlador.php?action=eliminarTodo"><i class="fas fa-trash"></i> Eliminar todo</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Proyecto</h1>
                <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
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
    </div>
</div>
<!-- End of Modal -->