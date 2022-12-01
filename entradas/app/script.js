const codigoProducto = document.querySelector("#referenciaProducto");

codigoProducto.addEventListener("blur", () => {
    let codigoP = codigoProducto.value;
    buscarProducto(codigoP);
});

function buscarProducto(codigoP) {
    let nombreProducto = productos.filter((nombre) => nombre.codigo == codigoP);
    nombreProducto.forEach(productoN => {
        const productoNombre = document.querySelector("#nombreProducto");
        const productoUMedida = document.querySelector("#uMedida");
        const opcion = productoNombre.firstElementChild;
        opcion.setAttribute("value", productoN.id);
        opcion.innerHTML = productoN.producto;
        productoUMedida.setAttribute("value", productoN.uMedida);
    });
}