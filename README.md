# prueba_konecta
Instalacion de la Aplicacion:

Mediante Git:

- Ir a la pagina de Git
- Ingresar al repositorio prueba_konecta
- en el boton de Code seleccionar la opcion clonar repositorio que se representa con dos cuadros juntos
- Abrir Git Descktop
- Presionar File->Clone repository
- Seleccionar por URL
- Pegar la URL
- Precionar Clone y Git hara el resto, es de resaltar que si es primera vez, devera de seleccionar el
Local Path que es la ruta desde la que se ejecutan las aplicaciones segun su servidor local ya sea Wampp, 
Xampp o cualquier otro.


Instalacion de la base de datos:

- Descargue el archivo cafeteria_konectadb
- Abra phpMyAdmin y dirijase a la seccion de consultas
- ejecute la siguiente consulta: create database cafeteria_konectadb; y luego presione en su teclado CTRL + Enter
- posteriormente seleccione la BD y dirijase al apartado Importar
- Elija la opcion Seleccionar archivo y seleccione el archivo cafeteria_konectadb 
- Posteriormente precione continuar y ya tendra su aplicacion ejecutando


Una vez haya hecho esto dirijase a la carpeta habilitada por su servidor local para las apps web en el
caso de Xampp es localhost y elija la aplicacion prueba_konecta.

al ingresar la app lo redirigira al index que es un login, este en el momento no requiere credenciales
ya que esta directo, puede presionar en iniciar Sesion, podra navegar por todas las paginas en el menu lateral del sidebar
y cuando quiera salir presione el icono de usuario que se encuentra en la parte superior derecha y
este lo redirigira al index, el sistema cuenta con persistencia en el modulo de ventas y tiene un menu hamburguesa.
