<?php
Class Base
{
    public function redirectToRoute($rota)
    {
        header("Location: ./index.php?r=$rota");
    }

    public function renderView($view, $params = [])
    {
        extract($params);
        require_once("./views/layouts/header.php");
        require_once("./views/$view.php");
        require_once("./views/layouts/footer.php");
    }
}
