<?php

require '../../tools/Modal.php';

$modal = new Modal();

$contenidoModal = "<div class='form-floating mb-3'>";
$contenidoModal .= "   <input type='text' class='form-control' id='categoria' placeholder='Categoria'>";
$contenidoModal .= "   <label for='Categoria'>Categoria</label>";
$contenidoModal .= "</div>";
$contenidoModal .= "<div class='d-grid'>";
$contenidoModal .= "   <buttom class='btn btn-outline-primary btn-block rounded-0' id='btn_insertar_categoria_ok'>Insertar categoria</buttom>";
$contenidoModal .= "</div>";

$modal->modalAlerta('text-primary', 'Insertar Categoria', $contenidoModal);