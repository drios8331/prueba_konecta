<?php

$title = $_POST['title'];
$dashboard = "";
$usuarios = "";
$configuracion = "";
$asesores = "";
$proveedores = "";
$inventario = "";
$productos = "";
$entradas = "";
$salidas = "";
$ventas = "";
$detalle_ventas = "";
$compras = "";
$detalle_compras = "";
$comprasShow = "";
$ventasShow = "";
$inventarioShow = "";
$panelShow = "";

if ($title == 'Inicio') {
    $panelShow = "show";
    $dashboard = 'active';
}elseif($title == 'Dashboard') {
    $panelShow = "show";
    $dashboard = 'active';
}elseif($title == 'Usuarios'){
    $panelShow = "show";
    $usuarios = 'active';
}elseif($title == 'Configuracion'){
    $panelShow = "show";
    $configuracion = 'active';
}elseif($title == 'Asesores'){
    $panelShow = "show";
    $asesores = 'active';
}elseif($title == 'Proveedores'){
    $panelShow = "show";
    $proveedores = 'active';
}elseif($title == 'Inventario'){
    $inventarioShow = "show";
    $inventario = 'active';
}elseif($title == 'Productos'){
    $inventarioShow = "show";
    $productos = 'active';
}elseif($title == 'Entradas'){
    $inventarioShow = "show";
    $entradas = 'active';
}elseif($title == 'Salidas'){
    $inventarioShow = "show";
    $salidas = 'active';
}elseif($title == 'Ventas'){
    $ventasShow = "show";
    $ventas = 'active';
}elseif($title == 'Detalle_ventas'){
    $ventasShow = "show";
    $detalle_ventas = 'active';
}elseif($title == 'Compras'){
    $comprasShow = "show";
    $compras = 'active';
}



echo "     <div class='accordion px-2 m-0' id='acordionSidebar'>";
echo "         <div class='accordion-item border-0 mb-1'>";
echo "             <h6 class='accordion-header' id='headingOne'>";
echo "                 <a href='#' id='' class='btn btn-primary text-start border-0 w-100 rounded-0' data-bs-toggle='collapse' data-bs-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>";
echo "                     <i class='bi bi-gear-fill'></i> Panel de control";
echo "                 </a>";
echo "             </h6>";
echo "             <div id='collapseOne' class='accordion-collapse collapse $panelShow' aria-labelledby='headingOne' data-bs-parent='#acordionSidebar'>";
echo "                 <div class='accordion-body p-0 m-0 border-0'>";
echo "                     <ul class='collapse list-unstyled show m-0 p-0'>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                                    <a href='../../administracion/view/dashboard.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $dashboard'><i class='bi bi-speedometer'></i><span";
echo "                                    class='ms-1 mt-0 pt-0 text-center'>Dashboard</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../usuarios/view/usuarios.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $usuarios'><i class='bi bi-person-square'></i><span";
echo "                             class='ms-1 mt-0 pt-0 text-center'>Usuarios</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../administracion/view/configuracion.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $configuracion'><i class='bi bi-gear-wide'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Configuracion</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../asesores/view/asesores.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $asesores'><i class='bi bi-people-fill'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Asesores</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../proveedores/view/proveedores.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $proveedores'><i class='bi bi-person-plus-fill'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Proveedores</span></a>";
echo "                         </li>";
echo "                     </ul>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
echo "         <div class='accordion-item border-0 mb-1'>";
echo "             <h6 class='accordion-header' id='headingTwo'>";
echo "                 <a href='#' id='' class='btn btn-primary text-start border-0 w-100 rounded-0' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>";
echo "                     <i class='bi bi-card-checklist'></i> Inventario";
echo "                 </a>";
echo "             </h6>";
echo "             <div id='collapseTwo' class='accordion-collapse collapse $inventarioShow' aria-labelledby='headingTwo' data-bs-parent='#acordionSidebar'>";
echo "                 <div class='accordion-body p-0 m-0 border-0'>";
echo "                     <ul class='collapse list-unstyled show m-0 p-0'>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../productos/view/productos.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $productos'><i class='fas fa-solid fa-wine-bottle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Productos</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../inventario/view/entradas.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $entradas'><i class='bi bi-arrow-left-circle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Entradas</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../inventario/view/salidas.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $salidas'><i class='bi bi-arrow-right-circle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Salidas</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../inventario/view/inventario.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $inventario'><i class='bi bi-card-checklist'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Inventario</span></a>";
echo "                         </li>";
echo "                     </ul>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
echo "         <div class='accordion-item border-0 mb-1'>";
echo "             <h6 class='accordion-header' id='headingThree'>";
echo "                 <a href='#' id='' class='btn btn-primary text-start border-0 w-100 rounded-0' data-bs-toggle='collapse' data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>";
echo "                     <i class='bi bi-receipt-cutoff'></i> Ventas";
echo "                 </a>";
echo "             </h6>";
echo "             <div id='collapseThree' class='accordion-collapse collapse $ventasShow' aria-labelledby='headingThree' data-bs-parent='#acordionSidebar'>";
echo "                 <div class='accordion-body p-0 m-0 border-0'>";
echo "                     <ul class='collapse list-unstyled show m-0 p-0'>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../ventas/view/ventas.php' id='productos' class='btn btn-outline-secondary border-0 d-flex text-left $ventas'><i class='bi bi-cash-coin'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Ventas</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../ventas/view/detalleVentas.php' id='productos' class='btn btn-outline-secondary border-0 d-flex text-left $detalle_ventas'><i class='bi bi-file-bar-graph'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Detalle ventas</span></a>";
echo "                         </li>";
echo "                     </ul>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
echo "         <div class='accordion-item border-0 mb-1'>";
echo "             <h6 class='accordion-header' id='headingFour'>";
echo "                 <a href='#' id='' class='btn btn-primary text-start border-0 w-100 rounded-0' data-bs-toggle='collapse' data-bs-target='#collapseFour' aria-expanded='false' aria-controls='collapseFour'>";
echo "                     <i class='bi bi-receipt-cutoff'></i> Compras";
echo "                 </a>";
echo "             </h6>";
echo "             <div id='collapseFour' class='accordion-collapse collapse $comprasShow' aria-labelledby='headingFour' data-bs-parent='#acordionSidebar'>";
echo "                 <div class='accordion-body p-0 m-0 border-0'>";
echo "                     <ul class='collapse list-unstyled show m-0 p-0'>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../compras/view/compras.php' id='productos' class='btn btn-outline-secondary border-0 d-flex text-left $compras'><i class='bi bi-cash-coin'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Compras</span></a>";
echo "                         </li>";
echo "                     </ul>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
?>