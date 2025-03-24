<?php

namespace App\Models;

class CroisiereModel extends Model {

    protected $id;
    protected $destination_id;
    protected $jours;
    protected $prix;
    protected $description;
    protected $img;
    protected $duree;




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
     * Get the value of destination_id
     */
    public function getDestination_id()
    {
        return $this->destination_id;
    }

    /**
     * Set the value of destination_id
     *
     * @return  self
     */
    public function setDestination_id($destination_id)
    {
        $this->destination_id = $destination_id;

        return $this;
    }

    /**
     * Get the value of jours
     */
    public function getJours()
    {
        return $this->jours;
    }

    /**
     * Set the value of jours
     *
     * @return  self
     */
    public function setJours($jours)
    {
        $this->jours = $jours;

        return $this;
    }

    /**
     * Get the value of prix
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of img
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get the value of duree
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }
}