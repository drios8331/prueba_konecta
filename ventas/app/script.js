// console.log(productos);
//Variables
const producto = document.querySelector("#codProducto");
const nombre = document.querySelector("#nomProducto");
const cantidad = document.querySelector("#cantidad");
const listaVentas = document.querySelector("#listaVentas tbody");
const agregarVenta = document.querySelector("#agregaVenta");
const cancelarVenta = document.querySelector("#btn_cancelaVenta");
const formulario = document.querySelector("#form_cargarProductos");
const inputTotal = document.querySelector("#total");
const inputIva = document.querySelector("#iva");
const inputNeto = document.querySelector("#neto");
const efectuarVenta = document.querySelector("#btn_venta");
let arrayVenta = [];
let idVenta = 1; //variable inicial de idProducto
let arrayTotal = [];
let ventaConRegistros = [];

//Eventos
cargarEventListeners();

function cargarEventListeners() {
    agregarVenta.addEventListener("click", agregarVentas);
    cantidad.addEventListener("blur", verificarCantidad);
    producto.addEventListener("change", mostrarProducto);
    cancelarVenta.addEventListener("click", limpiarVentas);
    listaVentas.addEventListener("click", eliminarProducto);
    efectuarVenta.addEventListener("click", efectuaVenta);
    document.addEventListener("DOMContentLoaded", () => {
        arrayVenta = JSON.parse(localStorage.getItem("ventas")) || [];
        listarVentas();
        cargarPrecios();
        cantidad.disabled = true;
        agregarVenta.disabled = true;
        producto.focus();
    });
}

//Funciones
//muestra el producto correspondiente al codigo ingresado
function mostrarProducto() {
    let valor = producto.value;
    const arrayProductos = productos.filter(
        (nombreProd) => nombreProd.codigoP == valor
    );

    if (arrayProductos.length > 0) {
        arrayProductos.forEach((valorArray) => {
            nombre.setAttribute("value", valorArray.nombreP);
            precio = valorArray.precioP;
            iva = valorArray.ivaP;
            idProductoInv = valorArray.idProducto;
        });
        cantidad.disabled = false;
        cantidad.focus();
        agregarVenta.disabled = false;
    } else {
        limpiarHTMLForm();
        agregarVenta.disabled = true;
        cantidad.disabled = true;
        producto.focus();
        mostrarError(
            "El producto correspondiente al codigo ingresado no se encuentra disponible en el inventario",
            true,
            "bg-danger"
        );
    }
}

//Verificar cantidad
function verificarCantidad() {
    let cod = producto.value;
    let cant = cantidad.value;
    let newStock = 0;
    let listaProductos = JSON.parse(localStorage.getItem('ventas'));

    const productoActivo = productos.filter((product) => product.codigoP == cod);
    const arrayVent = listaProductos.filter((prod) => prod.codigoProducto == cod);

    const stockMin = parseInt(productoActivo[0].stockMinimo);
    const stock = parseInt(productoActivo[0].stockFisico);

    if (arrayVent.length <= 0) {
        newStock = stock - cant;
    } else {
        newStock = stock - (parseInt(cant) + parseInt(arrayVent[0].cantidadProducto));
    }

    if (newStock <= stockMin && newStock >= 0) {
        mostrarError("El producto alcanzo su stock minimo", true, "bg-danger");
    } else if (newStock <= stockMin && newStock < 0) {
        mostrarError(`No hay suficiente Stock en inventario, hay ${stock} unidades actualmente.`, true, "bg-danger");
        producto.value = "";
        nombre.value = "";
        cantidad.value = "";
        cantidad.disabled = true;
        agregarVenta.disabled = true;
        producto.focus();
    }
}

//muestra mensaje de error
function mostrarError(mensaje, tiempo = true, color = "bg-primary") {
    const mensajeError = document.createElement("p");
    mensajeError.textContent = mensaje;

    mensajeError.classList.add(
        "border",
        color,
        "p-4",
        "mt-2",
        "rounded",
        "text-center",
        "h4",
        "text-light",
        "error"
    );

    const error = document.querySelectorAll(".error");
    if (error.length === 0) {
        formulario.appendChild(mensajeError);
    }
    //elimino el mensaje luego de 3 segundos
    if (tiempo === true) {
        setTimeout(() => {
            mensajeError.remove();
        }, 4000);
    }
}

//Agregar productos
function agregarVentas() {
    //asigno un id a cada venta
    if (arrayVenta.length > 0) {
        idVenta = arrayVenta[0].idProducto + 1;
    }

    let venta = {
        codigoProducto: producto.value,
        nombreProducto: nombre.value,
        cantidadProducto: parseInt(cantidad.value),
        precioProducto: precio,
        precioIvaProducto: iva,
        idProducto: idVenta,
        idProductoInv: idProductoInv,
    };
    //Agregar ventas al array
    if (arrayVenta.length > 0) {
        let valorArray = JSON.parse(localStorage.getItem("ventas"));
        let codigoVenta = venta.codigoProducto;

        const filtroCoincidencias = valorArray.filter(
            (codigoCoinciden) => codigoCoinciden.codigoProducto === codigoVenta
        );
        const filtroDiferencias = valorArray.filter(
            (codigoDifieren) => codigoDifieren.codigoProducto !== codigoVenta
        );

        if (filtroCoincidencias.length > 0) {
            const cantidadVentaActual = venta.cantidadProducto;
            const idProductoInvActual = venta.idProductoInv;
            const cantidadVentaAnterior =
                filtroCoincidencias[0].cantidadProducto;
            const idProductoAnterior = filtroCoincidencias[0].idProducto;
            const codigoProductoAnterior =
                filtroCoincidencias[0].codigoProducto;
            const nombreProductoAnterior =
                filtroCoincidencias[0].nombreProducto;
            const precioProductoAnterior =
                filtroCoincidencias[0].precioProducto;
            const ivaProductoAnterior =
                filtroCoincidencias[0].precioIvaProducto;
            const cantidadTotalProducto =
                cantidadVentaActual + cantidadVentaAnterior;
            const precioTotalProducto =
                cantidadTotalProducto * precioProductoAnterior;
            const ivaTotalProducto =
                cantidadTotalProducto * ivaProductoAnterior;

            ventaConRegistros = {
                codigoProducto: codigoProductoAnterior,
                nombreProducto: nombreProductoAnterior,
                cantidadProducto: cantidadTotalProducto,
                precioProducto: precioProductoAnterior,
                precioIvaProducto: ivaProductoAnterior,
                idProducto: idProductoAnterior,
                precioTotalUnitario: precioTotalProducto,
                precioIvaUnitario: ivaTotalProducto,
                idProductoInv: idProductoInvActual,
            };

            arrayVenta = filtroDiferencias;
            arrayVenta.unshift(ventaConRegistros);
        } else {
            //se  calcula el valor total por producto
            calcularValores(venta);

            //Agregar venta al array de la venta general
            arrayVenta.unshift(venta);
        }
    } else {
        //se  calcula el valor total por producto
        calcularValores(venta);

        //Agregar venta al array de la venta general
        arrayVenta.unshift(venta);
    }

    precioTotal(arrayVenta);
    listarVentas(arrayVenta);
    limpiarHTMLForm();
}

//Calcular precio total por producto
function calcularValores(venta) {
    let cantidadProductoUnitario = venta.cantidadProducto;
    let valorProductoUnitario = venta.precioProducto;
    let valorIvaUnitario = venta.precioIvaProducto;
    let valorIvaTotal = valorIvaUnitario * cantidadProductoUnitario;
    let valorUnitarioTotal = cantidadProductoUnitario * valorProductoUnitario;
    venta.precioTotalUnitario = valorUnitarioTotal;
    venta.precioIvaUnitario = valorIvaTotal;
}

//Sumar precios y mostrar precio total, exportarlos al localStorage
function precioTotal(arrayVenta) {
    arrayTotal = arrayVenta;
    let totalArray = arrayTotal.reduce(
        (total, valorTotal) => total + valorTotal.precioTotalUnitario,
        0
    );
    let ivaArray = arrayTotal.reduce(
        (total, valorTotal) => total + valorTotal.precioIvaUnitario,
        0
    );
    let totalAPagar = totalArray - ivaArray;
    let netoAPAgar = totalAPagar + ivaArray;
    let iva = ivaArray;
    localStorage.setItem("total", JSON.stringify(totalAPagar));
    localStorage.setItem("iva", JSON.stringify(iva));
    localStorage.setItem("neto", JSON.stringify(netoAPAgar));
}

//Muestra los elementos de la venta en la tabla
function listarVentas() {
    limpiarHTML();

    arrayVenta.forEach((productoVenta) => {
        const row = document.createElement("tr");
        row.innerHTML = `
            <td>
                ${productoVenta.idProducto}        
            </td>
            <td>
                ${productoVenta.codigoProducto}        
            </td> 
            <td>
                ${productoVenta.nombreProducto}        
            </td>
            <td class='text-center'>
                ${productoVenta.cantidadProducto}        
            </td>
            <td class='text-center'>
                $${productoVenta.precioProducto}        
            </td>
            <td class='text-center'>
                $${productoVenta.precioTotalUnitario}        
            </td> 
            <td class="text-center">
                <div class='btn btn-outline-primary btn-sm boton_eliminar' id='${productoVenta.idProducto}' value="btn_elimina_producto" onClick=""><i class="bi bi-dash-circle-fill"
                    style="pointer-events: none"></i></div>
            </td>    
        `;
        //Agregar ventas a la tabla
        listaVentas.appendChild(row);
        cantidad.disabled = true;
        producto.focus();
    });
    //agregar venta al storage
    ventasStorage();
}

function recalcularPrecios() {
    console.log(arrayVenta);
}

function eliminarProducto(e) {
    e.preventDefault();
    const idEliminaProducto = parseInt(e.target.id);

    const productoAEliminar = arrayVenta.filter(
        (idAEliminar) => idAEliminar.idProducto === idEliminaProducto
    );
    const productoRestantes = arrayVenta.filter(
        (idRestantes) => idRestantes.idProducto !== idEliminaProducto
    );
    if (productoAEliminar.length > 0) {
        arrayVenta = productoRestantes;
        ventasStorage();
        precioTotal(arrayVenta);

        location.reload();
    }
}

function efectuaVenta() {
    const ventaFin = {
        arrayVenta: arrayVenta,
        imprimirTirilla: document.querySelector(
            "input[name='radioImprimirTirilla']:checked"
        ).value,
        totalesTirilla: {
            totalPagar: localStorage.getItem("total"),
            iva: localStorage.getItem("iva"),
            netoPagar: localStorage.getItem("neto"),
        },
    };

    $.ajax({
        type: "POST",
        url: "../controller/ctrlInsertarVenta.php",
        data: { array: JSON.stringify(ventaFin) },
        success: function(respuesta) {
            localStorage.removeItem("ventas");
            localStorage.removeItem("total");
            localStorage.removeItem("iva");
            localStorage.removeItem("neto");
            $("#respuesta").html(respuesta["response"]);
        },
    });
}
//Importar precios del localStorage a la vista
function cargarPrecios() {
    inputTotal.value = JSON.parse(localStorage.getItem("total")) || "";
    inputIva.value = JSON.parse(localStorage.getItem("iva")) || "";
    inputNeto.value = JSON.parse(localStorage.getItem("neto")) || "";
}

//Elimina las ventas del storage y recarga la pagina
function limpiarVentas() {
    localStorage.removeItem("ventas");
    localStorage.removeItem("total");
    localStorage.removeItem("iva");
    localStorage.removeItem("neto");
    location.reload();
}

//Agrega las ventas al localStorage
function ventasStorage() {
    localStorage.setItem("ventas", JSON.stringify(arrayVenta));
    cargarPrecios();
}

//Eliminar ventas previas para que no se repitan
function limpiarHTML() {
    listaVentas.innerHTML = "";
}

//Limpiar el html de los input de registro de venta
function limpiarHTMLForm() {
    producto.value = "";
    producto.setAttribute("value", "Codigo Producto");
    nombre.setAttribute("value", "Nombre Producto");
    cantidad.value = "";
    cantidad.setAttribute("value", "Cantidad");
    agregarVenta.disabled = true;
}

function imprimirTirilla() {
    const botonImprimir = document.querySelector("#flexRadioDefault1");

    if (botonImprimir.checked) {
        $.ajax({
            type: "POST",
            url: "../controller/ctrlImprimirTirilla.php",
            data: { array: JSON.stringify(arrayVenta) },
            success: function(result) {
                $("#iframeID").attr("src", result);
                window.open(result);
            },
        });
    } else {
        console.log("No hay venta");
    }
}