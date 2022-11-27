<?php 

class Controleurgenerique{

    protected $vue;
    protected $modele;
    protected $action;


    public function getVueControleur(){
        return $this->vue;
    }

    public function getModeleControleur(){
        return $this->modele;
    }

    
    public function getActionControleur(){
        return $this->action;
    }
}

?>