<?php

namespace dwp\core;

class Controller
{
    protected $controller  = null;	// stores the called controllers name
    protected $action 	   = null;	// stores the called action name

    protected $params      = [];	// stores useful params for view rendering

    public function __construct($controller, $action)
    {
        $this->controller = $controller;
        $this->action = $action;
    }

    public static function loggedIn()
    {
        return (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true);
    }

    /**
     * Render the correct view for the controllers and action, using the params array to extract variables for the view
     */
    public function render()
    {
        $viewPath = VIEWSPATH.$this->controller.DIRECTORY_SEPARATOR.$this->action.'.php';

        if(!file_exists($viewPath))
        {
            // redirect to an error page
            $viewPath = VIEWSPATH.'errors'.DIRECTORY_SEPARATOR.'error404.php';
            $this->setParam('errCause', 'The view for your called controller is missing');
        }

        extract($this->params);

        include $viewPath;
    }

    protected function setParam($key, $value = null)
    {
        $this->params[$key] = $value;
    }

    public function __destruct()
    {
        $this->controller = null;
        $this->action = null;
        $this->params = null;
    }
}