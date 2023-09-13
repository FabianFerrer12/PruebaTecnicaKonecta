PruebaTecnicaKonecta

Para ejecutar el proyecto primero hay que tener instalado un ejecturador de servicios apaches en mi caso utilice XAMPP.
https://www.apachefriends.org/es/index.html

Luego de instalarlo configure el php.ini para habilitar la extension de postgres sql quitandole el ';' a la linea que decia extension=pdo_pgsql
y extension=pgsql para poder ejecutarlo en el codigo.

Luego realice la instalacion de Postgress SQL
https://www.postgresql.org/

En el archivo Dump base de datos.sql esta el dump generado directamente desde postgresql.

En el archivo Creacion de base de datos.sql esta como genere la base de datos mediante codigo.

En el archivo Consultas.sql estan las consultas solicitadas en la prueba tecnica.

El proyecto se ubica directamente en la carpeta htdocs generada por XAMPP.
