# Instalación WordPress
https://docs.aws.amazon.com/es_es/AWSEC2/latest/UserGuide/hosting-wordpress.html

* * * 
## Descarga WordPress
Comenzamos descargando el paquete de WordPress, descomprimiendo y borrando el .tar:
~~~
$ wget https://wordpress.org/latest.tar.gz
$ tar -xzf latest.tar.gz
~~~

Antes de comenzar debemos crear un usuario de BBDD y una BBDD para esta instalación.

* * * 
## Creación usuario BBDD y la BBDD
1. Iniciar servidor de MariaDB y (AMI) amazon machine image de Amazon Linux si corresponde:
~~~
$ sudo systemctl start mariadb
$ sudo service mysqld start
~~~

2. Iniciamos en el servidor de BBDD como root, ojo si no la hemos cambiado anteriormente porque podría estar en blanco:
~~~
$ mysql -u root -p
~~~

3. Ahora entraremos en la consola de `MariaDB`. Procedemos a crear un user y password para la BBDD de MySQL, los cuales utilizará WordPress para establecer la conexión con la BBDD. La password se recomienda que sea una contraseña fuerte y segura.
~~~
CREATE USER 'mi-usuario'@'localhost' IDENTIFIED BY 'mi-password';
~~~

4. Creamos la BBDD con el siguiente comando:
~~~
CREATE DATABASE `nombre-bbdd`;
~~~

5. Concedemos permisos completos para el usuario creado anteriormente:
~~~
GRANT ALL PRIVILEGES ON `nombre-bbdd`.* TO "mi-usuario"@"localhost";
~~~

6. Vaciamos privilegios de BBDD y posteriomente salimos:
~~~
FLUSH PRIVILEGES;

exit
~~~

* * * 
## Creación y modificación de wp-config.php

Dentro de la carpeta donde hemos descomprimido wordpress nos encontramos el archivo `wp-config-sample.php`, el cuál vamos a copiar y la copia la llamaremos con el nombre `wp-config.php`:

~~~
$ cd /var/www/html/directorio-wordpress

$ sudo cp wp-config-sample.php wp-config.php
~~~

Lo siguiente será modificar este archivo con los datos de nuestro `usuario`, `password` y `nombre de BBDD` generados en los pasos anteriores.

~~~
$ nano wordpress/wp-config.php
~~~

Debemos establecer nuestros datos así:
~~~
define('DB_NAME', 'nombre-bbdd');

define('DB_USER', 'mi-usuario');

define('DB_PASSWORD', 'mi-password');

~~~

Ahora buscaremos la línea que dice `Authentication Unique Keys and Salts.` y debemos cambiar los valores de todos los define que hay a continuación por unos valores aleatorios. Los valores a introducir son generados mediante la siguiente [página](https://api.wordpress.org/secret-key/1.1/salt/): 


define('LOGGED_IN_KEY',    'valores-generados');
define('NONCE_KEY',        'valores-generados');
define('AUTH_SALT',        'valores-generados');
define('SECURE_AUTH_SALT', 'valores-generados');
define('LOGGED_IN_SALT',   'valores-generados');
define('NONCE_SALT',	   'valores-generados');

## Instalar archivos de WordPress

Todo los pasos anteriores han sido creados dentro de una carpeta llamada `wordpress` que fue creada así al descomprimir el paquete. Ahora deberemos de copiar todos esos archivos donde queramos usar la página.

Ejemplo: Dentro de `/var/www/html/` creamos la carpeta `tienda` por ejemplo, y dentro de ella copiaremos todo con `*` y `-R` para que lo haga de forma recursiva:
~~~
$ mkdir tienda

$ cp -R wordpress/* /var/www/html/tienda
~~~


## Para permitir que WordPress use enlaces permanentes
