<?php 

namespace Coworking\vistas;

class VistaSalas {
    public static function render($salas) {
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
        <table class="table mog-table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Capacidad</th>
                    <th scope="col">Ubicación</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($salas as $sala) {?>
                <tr>
                    <td><?php echo $sala->getId();?></td>
                    <td><?php echo $sala->getNombre();?></td>
                    <td><?php echo $sala->getCapacidad();?></td>
                    <td><?php echo $sala->getUbicacion();?></td>
                    <td>...</td>
                </tr>
            <?php }?>
            </tbody>
        </table>

        <!-- FOOTER -->
        <?php 
            include_once "footer.php";
    }
}
?>