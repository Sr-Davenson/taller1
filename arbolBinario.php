<?php
require_once 'nodo.php';

class ArbolBinario {
    private $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    // Método para construir el árbol desde PreOrder e InOrder
    public function constructPreInorder($preorder, $inorder) {
        $this->raiz = $this->constructPreInAux($preorder, $inorder);
    }

    // Método para construir el árbol desde Postorden e Inorden
    public function constructPostInorder($postorder, $inorder) {
        $this->raiz = $this->constructPostInAux($postorder, $inorder);
    }

    private function constructPreInAux($preorder, $inorder) {
        if (empty($preorder) || empty($inorder)) {
            return null;
        }

        $raizValor = array_shift($preorder);
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

    private function constructPostInAux($postorder, $inorder) {
        if (empty($postorder) || empty($inorder)) {
            return null;
        }

        $raizValor = array_pop($postorder);
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

    public function getRaiz() {
        return $this->raiz;
    }
}
