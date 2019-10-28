<?php

namespace Web\Controller;

use Library\parserLibrary;

class defaultController {

    var $data = array();

    public function indexAction() {
        $this->controllerAction();
        $parser = new parserLibrary;
        $file = $parser->logged(file_get_contents("./Pages/default.html"));
        $file = $parser->admin($file);
        return $parser->parse($file, $this->data);
    }

    public function controllerAction() {
        if (isset($_GET['pages'])) {
            $controller = './Controllers/' . $_GET['pages'] . 'Controller.php';
            if (file_exists($controller)) {
                $class = 'Controllers\\' . $_GET['pages'] . 'Controller';
                $page = $_GET['pages'];
            } else {
                $class = 'Controllers\notFoundController';
                $page = 'Erreur 404';
            }
        } else {
            $class = 'Controllers\indexController';
            $page = 'Acceuil';
        }
        
        $this->data["page"] = $page;
        $class = new $class;
        
        $this->data["pages"] = $class->indexAction();
    }

}
