<?php
require_once 'nodo.php';

class DibujarArbol {
    public function dibujarVertical($nodo) {
        if ($nodo === null) {
            return "";
        }

        $html = "<ul>";
        $html .= "<li>" . $nodo->valor;

        if ($nodo->izquierdo !== null || $nodo->derecho !== null) {
            $html .= "<ul>";
            $html .= "<li>" . $this->dibujarVertical($nodo->izquierdo) . "</li>";
            $html .= "<li>" . $this->dibujarVertical($nodo->derecho) . "</li>";
            $html .= "</ul>";
        }

        $html .= "</li>";
        $html .= "</ul>";

        return $html;
    }
}
