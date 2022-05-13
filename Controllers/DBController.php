<?php
require_once("./controllers/BaseController.php");

Class DBController extends Base{

    public function deleteData(){

        if(isset($_GET["t"]) && isset($_GET["i"])){

            $table = $_GET["t"];
            $id = $_GET["i"];
            

            switch ($table)
            {
                case "iva":
                    $camp = Iva::find($id);
                    $camp ->delete();
                    break;
                case "user":
                    $camp = Utilizador::find($id);
                    $camp ->delete();
                    break;
                default:
                    $this->redirectToRoute(ROTA_LOGIN);
            
            }
            
            $this->redirectToRoute(ROTA_LOGIN);
        }



        
    }
}