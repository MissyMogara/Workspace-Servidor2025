<?php

namespace Coworking\vistas;

class VistaReservas
{
    public static function render($reservas, $nombre_sala, $error)
    {
        // Include head, header, asideNav, and footer files.
        include_once "head.php";
        include_once "header.php";
        

?>
        <!-- BODY -->

        <body>

            <?php
            include_once "asideNav.php";
            
            ?>

            <!-- MAIN CONTENT -->
            <!-- TABLE -->
            <div class="body-content">
                <h2>
                    <?php if($nombre_sala != ""){ // We print room name here
                        echo $nombre_sala; } else {
                        echo "Reservas de " . $_SESSION['coworking-user'];}?> <!-- If room's name is none then we print user's email -->
                </h2>
                <?php 
                if (strlen($error) > 0) {
                    echo "<p class='text-danger'>" . $error . "</p>";
                }
                ?>
                <table class="table mog-table m-5">
                    <thead>
                        <tr>
                            <th scope="col">ID Sala</th>
                            <th scope="col">Fecha de la reserva</th>
                            <th scope="col">Hora inicio</th>
                            <th scope="col">Hora fin</th>
                            <?php if ($nombre_sala == ""){
                                    echo " <th scope='col'>Borrar</th>";
                                } ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($reservas as $reserva) { ?>
                            <tr>
                            <td><?php echo $reserva->getId_sala(); ?></td>
                                <td><?php echo $reserva->getFecha_reserva(); ?></td>
                                <td><?php echo $reserva->getHora_inicio(); ?></td>
                                <td><?php echo $reserva->getHora_fin(); ?></td>
                                <?php if ($nombre_sala == ""){ // If room's name is none then we are on user's reservations
                                    echo "<td class='center-icons'><a href='index.php?action=borrarReserva&id=" . $reserva->getId() . "' class='icons'><img src='./vistas/assets/icons/basura.png' alt='Icono de una papelera'></a></td>"; // Add delete option only for user's reservations
                                } ?>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

            <!-- FOOTER -->
    <?php
        include_once "footer.php";
    }
}
    ?>