  <!-- Header con Bootstrap -->
  <header class="mog-bg-dp p-3">
    <h1>Reservas Coworking Mogara</h1>
    <div>
      <a href="#">

        <?php if (isset($_SESSION['coworking-user'])) { // Print user if connected
          echo $_SESSION['coworking-user'];
        } ?>
      </a>
      <a href="index.php?action=destroySession">Logout</a>
    </div>
  </header>