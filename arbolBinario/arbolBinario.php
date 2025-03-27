<?php
require_once 'nodo.php';

class ArbolBinario {
    private $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    // Construcción desde PreOrder e InOrder
    public function constructPreInorder($preorder, $inorder) {
        $this->raiz = $this->constructPreInAux($preorder, $inorder);
    }

    // Construcción desde PostOrder e InOrder
    public function constructPostInorder($postorder, $inorder) {
        $this->raiz = $this->constructPostInAux($postorder, $inorder);
    }

    // Construcción recursiva desde PreOrder e InOrder
    private function constructPreInAux($preorder, $inorder) {
        if (empty($preorder) || empty($inorder)) {
            return null;
        }

        $raizValor = array_shift($preorder); // Raíz es el primero en PreOrder
        $raiz = new Nodo($raizValor);

        $posicionRaiz = array_search($raizValor, $inorder);

        $inIzquierda = array_slice($inorder, 0, $posicionRaiz);
        $inDerecha = array_slice($inorder, $posicionRaiz + 1);

        $preIzquierda = array_slice($preorder, 0, count($inIzquierda));
        $preDerecha = array_slice($preorder, count($inIzquierda));

        $raiz->izquierdo = $this->constructPreInAux($preIzquierda, $inIzquierda);
        $raiz->derecho = $this->constructPreInAux($preDerecha, $inDerecha);

        return $raiz;
    }

    // Construcción recursiva desde PostOrder e InOrder
    private function constructPostInAux($postorder, $inorder) {
        if (empty($postorder) || empty($inorder)) {
            return null;
        }

        $raizValor = array_pop($postorder); // Raíz es el último en PostOrder
        $raiz = new Nodo($raizValor);

        $posicionRaiz = array_search($raizValor, $inorder);

        $inIzquierda = array_slice($inorder, 0, $posicionRaiz);
        $inDerecha = array_slice($inorder, $posicionRaiz + 1);

        $postIzquierda = array_slice($postorder, 0, count($inIzquierda));
        $postDerecha = array_slice($postorder, count($inIzquierda));

        $raiz->izquierdo = $this->constructPostInAux($postIzquierda, $inIzquierda);
        $raiz->derecho = $this->constructPostInAux($postDerecha, $inDerecha);

        return $raiz;
    }

    // Generar recorrido PreOrder
    public function generatePreOrder($nodo) {
        if ($nodo === null) return [];
        return array_merge([$nodo->valor], $this->generatePreOrder($nodo->izquierdo), $this->generatePreOrder($nodo->derecho));
    }

    // Generar recorrido InOrder
    public function generateInOrder($nodo) {
        if ($nodo === null) return [];
        return array_merge($this->generateInOrder($nodo->izquierdo), [$nodo->valor], $this->generateInOrder($nodo->derecho));
    }

    // Generar recorrido PostOrder
    public function generatePostOrder($nodo) {
        if ($nodo === null) return [];
        return array_merge($this->generatePostOrder($nodo->izquierdo), $this->generatePostOrder($nodo->derecho), [$nodo->valor]);
    }

    // Obtener la raíz
    public function getRaiz() {
        return $this->raiz;
    }
}
