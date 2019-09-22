<?php


namespace app\controllers;

abstract class Controller
{
    private $action;
    private $defaultAction = "index";
    private $layout = 'main';
    private $useLayouts = true;

    public function runAction($action = null) {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);
        if (method_exists($this, $method)) {
            $this->$method();
        } else {
            echo "404";
        }
    }

    public function render($template, $params = []) {
        if ($this->useLayouts) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'content' => $this->renderTemplate($template, $params),
                'menu' => $this->renderTemplate('menu')
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }
    }

    public function renderTemplate($template, $params = []) {
        ob_start();
        extract($params);
        $templatePath = TEMPLATES_DIR . $template . ".php";
        include $templatePath;
        return ob_get_clean();
    }
}