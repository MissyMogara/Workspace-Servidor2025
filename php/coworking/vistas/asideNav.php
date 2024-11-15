<div class="d-flex">
  <!-- Aside Navbar -->
  <aside id="asideNavBar" class="aside-navbar d-flex flex-column">
    <h4 class="text-center p-3">Gestionar reservas</h4>
    <hr>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active p-3" href="index.php">Inicio</a>
      </li>
      <li class="nav-item">
        <a class="nav-link p-3" href="index.php?action=verReservasUsuario">Ver Reservas</a>
      </li>
      <!-- Link trigger modal -->
      <li class="nav-item">
        <a class="nav-link p-3" href="index.php?action=verReservasUsuario" data-bs-toggle="modal" data-bs-target="#exampleModal">Hacer Reserva</a>
      </li>
    </ul>
  </aside>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Hacer Reserva</h1>
          <button type="button" class="btn-close button-mog" data-bs-dismiss="modal" aria-label="Close">X</button>
        </div>
        <div class="modal-body">
          <!-- Form -->

          <form action="index.php" method="POST">

            <div data-mdb-input-init class="mb-4">
              <label>Selecciona una sala:</label>
              <select name="id_sala" class="form-select"  id="">
                <option value="1">Sala Creativa</option>
                <option value="2">Espacio Ejecutivo</option>
                <option value="3">Sala Innovación</option>
                <option value="4">OpenLab</option>
                <option value="5">Sala Colaborativa</option>
              </select>
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <label>Fecha de la reserva: </label>
              <input type="date" class="form-control form-control-lg" name="fecha_reserva" required />
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <label>Hora de inicio: </label>
              <!-- Reservation time from 8:00 to 22:00 -->
              <input type="time" class="form-control form-control-lg" name="hora_inicio" step="3600" min="08:00" max="22:00" required />
            </div>

            <div data-mdb-input-init class="form-outline mb-4">
              <label>Hora de finalización: </label>
              <input type="time" class="form-control form-control-lg" name="hora_fin" step="3600" min="08:00" max="22:00" required />
            </div>

            <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block button-mog" type="submit" name="realizarReserva">Realizar Reserva</button>

            <hr class="my-2">

            <button type="button" class="btn btn-primary btn-lg btn-block button-close-mog" data-bs-dismiss="modal">Cerrar</button>

          </form>

        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>