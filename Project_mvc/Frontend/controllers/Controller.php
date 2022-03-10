<?php

class Controller {
    public $page_title;
    public $error;
    public $content;
  

    public function render($view_path,$variables=[]){
        extract($variables);

        ob_start();
        require_once "$view_path";
        $render_view = ob_get_clean();
        return $render_view;
    }
}
