<?php

class Modal
{

    public function modalAlerta($color, $tituloModal, $contenido)
    {

        echo " <!-- Modal -->";
        echo " <div class='modal fade' id='modalAlerta' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "        <h5 class='modal-title $color' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='btn-close' data-dismiss='modal' id='close' aria-label='Close'></button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo        $contenido;
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo " </div>";
        echo "<script>$('#modalAlerta').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

    public function modalInformativa($color, $tituloModal, $contenido)
    {

        echo " <!-- Modal -->";
        echo " <div class='modal fade' id='modalInformativa' tabindex='-1' aria-labelledby='modalInfo' aria-hidden='true'>";
        echo "  <div class='modal-dialog'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header'>";
        echo "        <h5 class='modal-title $color' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "        <button type='button' class='btn-close' id='close' aria-label='Close'></button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo        $contenido;
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo " </div>";
        echo "<script>$('#modalInformativa').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

}