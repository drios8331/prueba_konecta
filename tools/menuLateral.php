<?php

$title = $_POST['title'];
$dashboard = "";
$configuracion = "";
$inventario = "";
$productos = "";
$entradas = "";
$ventas = "";
$administracionShow = "";

if ($title == 'Dashboard') {
    $administracionShow = "show";
    $dashboard = 'active';
}elseif($title == 'Entradas'){
    $administracionShow = "show";
    $entradas = 'active';
}elseif($title == 'Productos'){
    $administracionShow = "show";
    $productos = 'active';
}elseif($title == 'Inventario'){
    $administracionShow = "show";
    $inventario = 'active';
}elseif($title == 'Ventas'){
    $ventas = 'bg-secondary text-white';
}elseif($title == 'Configuracion'){
    $configuracion = 'bg-secondary text-white';
}



echo "     <div class='accordion px-0 mt-0' id='acordionSidebar'>";
echo "         <div class='accordion-item border-1'>";
echo "             <h6 class='accordion-header' id='headingTwo'>";
echo "                 <a href='#' id='' class='btn btn-white text-start border-0 w-100 rounded-0' data-bs-toggle='collapse' data-bs-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo'>";
echo "                     <i class='bi bi-card-checklist'></i> Administración";
echo "                 </a>";
echo "             </h6>";
echo "             <div id='collapseTwo' class='accordion-collapse collapse $administracionShow' aria-labelledby='headingTwo' data-bs-parent='#acordionSidebar'>";
echo "                 <div class='accordion-body p-0 m-0 border-1'>";
echo "                     <ul class='collapse list-unstyled show m-0 p-0'>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../admin/view/dashboard.php' id='dashboard' class='btn btn-outline-secondary d-flex text-left border-0 $dashboard'><i class='fas fa-solid fa-wine-bottle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Dashboard</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../entradas/view/entradas.php' id='entradas' class='btn btn-outline-secondary d-flex text-left border-0 $entradas'><i class='bi bi-arrow-left-circle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Entradas</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../productos/view/productos.php' id='productos' class='btn btn-outline-secondary d-flex text-left border-0 $productos'><i class='bi bi-arrow-right-circle'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Productos</span></a>";
echo "                         </li>";
echo "                         <li class='list-group-item py-1 pt-2 px-0 m-0'>";
echo "                             <a href='../../inventario/view/inventario.php' id='inventario' class='btn btn-outline-secondary d-flex text-left border-0 $inventario'><i class='bi bi-card-checklist'></i><span";
echo "                                 class='ms-1 mt-0 pt-0 text-center'>Inventario</span></a>";
echo "                         </li>";
echo "                     </ul>";
echo "                 </div>";
echo "             </div>";
echo "         </div>";
echo "         <div class='accordion-item border-1'>";
echo "             <h6 class='accordion-header' id='headingThree'>";
echo "                 <a href='../../ventas/view/ventas.php' id='ventas' class='btn btn-white text-start border-0 w-100 rounded-0  $ventas'  data-bs-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree'>";
echo "                     <i class='bi bi-receipt-cutoff' style='pointer-events: none;'></i> Ventas";
echo "                 </a>";
echo "             </h6>";
echo "         </div>";
echo "         <div class='accordion-item border-1'>";
echo "             <h6 class='accordion-header' id='headingFour'>";
echo "                 <a href='../../admin/view/configuracion.php' id='configuracion' class='btn btn-white text-start border-0 w-100 rounded-0 $configuracion'  data-bs-target='#collapseFour' aria-expanded='false' aria-controls='collapseFour'>";
echo "                     <i class='bi bi-receipt-cutoff' style='pointer-events: none;'></i> Configuracion";
echo "                 </a>";
echo "             </h6>";
echo "         </div>";
?>