# Servicio Web en PHP

El servicio web sigue la metodología RESTful, a partir de utilizar el método HTTP (GET, POST, DELETE) como referencia para la operación a ejecutar.

El servicio cuenta de 4 funcionalidades principales:

- La llamada mediante GET devolverá, desde la base de datos, el listado de actividades en formato JSON:
```JSON
{
    "Titulo": "Copas",
    "Ciudad": "Lviv",
    "Fecha": "2022-04-11",
    "Tipo": "Cine",
    "Precio": "Gratis",
    "Usuario": "ifp"
    
}
```
- La llamada mediante POST recibe, en formato JSON, los datos correspondientes a una nueva actividad y los inserta en la base de datos. Los campos son:
“titulo”
“ciudad”
“fecha”
“precio”
“tipo”
“usuario”

- La llamada mediante DELETE recibe el ID de la actividad como parámetro en la url y elimina la actividad de la base de datos.
- La llamada mediante PUT recibe el ID de la actividad como parámetro en la url y, en formato JSON, los nuevos datos correspondientes a la actividad y los
actualiza en la base de datos.
- Se realice las operaciones de listar actividades y de crear actividad a partir de interactuar con el servicio y no directamente con la base de datos.

# Aplicación web 
en la que publicar las nuevas actividades que están disponibles.

La aplicación contará con un formulario en el que podremos introducir los datos de la actividad:
-Título
-Fecha
-Ciudad
-Tipo
-Gratis / De pago
El tipo de actividad esta un desplegable en el que solo estarán disponibles las siguientes opciones: Cine, Comida, Copas, Cultura, Música y Viajes.

Al clicar botón “Crear Actividad” la aplicación muestra en el panel de la izquierda los datos de la actividad que se haya creado. De la actividad se muestra todos sus datos. Se mostrará además
la imagen correspondiente según el tipo de actividad.

Cada vez que se cree una nueva actividad, el panel de la izquierda se refrescará con los nuevos datos.

Listado de actividades
- Al crear una actividad se guardará en la tabla “actividades” de bbdd.
- Al crear una nueva actividad guarda el Id del usuario que la ha creado.
- En la visualización de la actividad muestra el Nombre del usuario que la ha creado.
- El listado de las actividades muestra los registros de la tabla “actividades”.
- La persistencia de las actividades se hará en la sesión del usuario


## Gestión de usuarios
- La aplicación comprueba si el usuario se a autenticado, si es así, le muestra la pantalla para ver y crear actividades.
- Si no está autenticado, le mostrará la pantalla de Log In (Autenticación). En la que deberá escribir el usuario y la contraseña.
- Una vez el usuario esté autenticado, se mostrará el nombre del usuario y un enlace o botón para Salir. Cuando el usuario haga click en Salir, se cerrará la
sesión y por lo tanto deberá volver a la pantalla de LogIn.
- Cuando se haga LogIn (Entrar) se guardará una “cookie” de forma tal que, aunque se cierre la aplicación, el usuario al volver estará aún autenticado. Sólo
se borrará la cookie cuando haga Salir (LogOut)
- La gestión de usuarios se realizará a partir de los valores almacenados en la tabla "usuarios".
- La aplicación da la opción de registrarse. Desde el botón “Registrar” se accede a un formulario de registro y desde ahí se creará un nuevo usuario.
Cuando el usuario se registre accederá inmediatamente a la aplicación sin necesidad de hacer LogIn.

## Base de datos
Base de datos esta escrita en MySQL
Tenemos 2 tablas, "usuarios" y "actividades":
La tabla "usuarios" con siguentes campos: 
```SQL
"id": varchar (50)
"contraseña": varchar (100)
"correo": varchar (255)
"nombre" : varchar (255)
```
Una tabla “actividades” con los campos:
```SQL
"id": INT, será la clave primaria y deberá ser auto-incremental
"titulo" : varchar (200)
“ciudad" : varchar (100)
"tipo" : varchar (50)
"fecha": DATE,
"gratis" : BIT
```
