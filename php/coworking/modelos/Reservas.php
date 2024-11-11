<?php 

namespace Coworking\modelos;

class Reserva {
    // Properties of the reservation class
    private $id;
    private $id_usuario;
    private $id_sala;
    private $fecha_reserva;
    private $hora_inicio;
    private $hora_fin;
    private $estado;

    // Construct
    public function __construct($id = "", $id_usuario = "", $id_sala = "", $fecha_reserva = "", $hora_inicio = "", 
    $hora_fin = "", $estado = "") {
        // Assigning the properties of the reservation class to the given parameters
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_sala = $id_sala;
        $this->fecha_reserva = $fecha_reserva;
        $this->hora_inicio = $hora_inicio;
        $this->hora_fin = $hora_fin;
        $this->estado = $estado;
    }

    // Getters and setters for the properties of the reservation class


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_usuario
     */ 
    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    /**
     * Set the value of id_usuario
     *
     * @return  self
     */ 
    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    /**
     * Get the value of id_sala
     */ 
    public function getId_sala()
    {
        return $this->id_sala;
    }

    /**
     * Set the value of id_sala
     *
     * @return  self
     */ 
    public function setId_sala($id_sala)
    {
        $this->id_sala = $id_sala;

        return $this;
    }

    /**
     * Get the value of fecha_reserva
     */ 
    public function getFecha_reserva()
    {
        return $this->fecha_reserva;
    }

    /**
     * Set the value of fecha_reserva
     *
     * @return  self
     */ 
    public function setFecha_reserva($fecha_reserva)
    {
        $this->fecha_reserva = $fecha_reserva;

        return $this;
    }

    /**
     * Get the value of hora_inicio
     */ 
    public function getHora_inicio()
    {
        return $this->hora_inicio;
    }

    /**
     * Set the value of hora_inicio
     *
     * @return  self
     */ 
    public function setHora_inicio($hora_inicio)
    {
        $this->hora_inicio = $hora_inicio;

        return $this;
    }

    /**
     * Get the value of hora_fin
     */ 
    public function getHora_fin()
    {
        return $this->hora_fin;
    }

    /**
     * Set the value of hora_fin
     *
     * @return  self
     */ 
    public function setHora_fin($hora_fin)
    {
        $this->hora_fin = $hora_fin;

        return $this;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */ 
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }
}

?>