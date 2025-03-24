<?php
require_once 'nodo.php';

class DibujarArbol {
    public function dibujar($nodo) {
        if ($nodo === null) {
            return "";
        }

        $html = "<ul>";
        $html .= "<li>" . $nodo->valor;

        if ($nodo->izquierdo !== null || $nodo->derecho !== null) {
            $html .= "<ul>";
            $html .= "<li>" . $this->dibujar($nodo->izquierdo) . "</li>";
            $html .= "<li>" . $this->dibujar($nodo->derecho) . "</li>";
            $html .= "</ul>";
        }

        $html .= "</li>";
        $html .= "</ul>";

        return $html;
    }
}
