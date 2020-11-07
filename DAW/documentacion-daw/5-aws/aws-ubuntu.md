- [UBUNTU](#ubuntu)
  - [**Crear par de claves**](#crear-par-de-claves)
    - [**Reglas de entrada grupo de seguridad**](#reglas-de-entrada-grupo-de-seguridad)
  - [Instancias](#instancias)
  - [Conexión con instancia](#conexión-con-instancia)
  - [Instalación Apache](#instalación-apache)
  - [Creación de 2 páginas](#creación-de-2-páginas)
  - [proteger directorio](#proteger-directorio)

# UBUNTU

## **Crear par de claves**

Desde la instancia, deberemos crear un par de claves.

pem -> Mac o Linux
ppk -> Linux

Guarda la clave en un lugar seguro.

>
Los grupos de seguridad vienen dados por zonas, si creamos uno en Virginia, sólo funcionará en Virgina. Por ello al crearlo le pondremos también el nombre de la zona para identificarlo.

![imagen](img/captura-1.png)



### **Reglas de entrada grupo de seguridad**

![imagen](img/captura-7.png)
1. `Tipo`: HTTP (puerto 80) ==== `Origen`: Mi ip o cualquier lugar

2. `Tipo`: TCP (puerto a elegir) ==== `Origen`: Mi ip o cualquier lugar

3. `Tipo`: SSH === `Origen`: Mi ip

En caso de no pedirnos puerto 80, no crearemos HTTP y sólo crearemos por TCP los puertos correspondientes.

La regla de entrada SSH debe estar siempre o no podremos conectarnos de forma remota.

Si cambia nuestra IP que tenemos en ese momento, no podremos acceder.
Puede ocurrir al reiniciar el router.

Darle a `Finalizar y Crear grupo de seguridad`




## Instancias
Instancias > Lanzar instancia. Las que ponen `Free tier eligible` son gratuitas.
Seleecionamos la que queremos pulsando `Select`.

En nuestro caso `UBUNTU SERVER`.

`Review and Launch` a la máquina que queremos.
Nos llevará a la página de la instancia.
Seleccionamos nuestro grupo de seguridad y en la página de **Review** ya podremos ver el grupo añadido.
![image](img/captura-2.png)

Le damos a `Launch` y nos avisa de la clave que hay que elegir, y que sabemos que si perdemos el archivo de la key no podremos acceder a la máquina.

Si todo ha ido correcto, `nos dirá que la Instancia está siendo ejecutada`.


## Conexión con instancia

Nos conectamos mediante el siguiente comando `ssh -i **clave.pem** **usuario**@**dns o ip**`:
~~~
ssh -i pc-agil-centros.pem ubuntu@52.90.41.221
~~~

## Instalación Apache

Instalamos apache:
~~~
$ sudo apt install apache2
~~~

Comprobamos el estado de apache:

~~~
$ sudo systemctl status apache2
~~~

En ubuntu por defecto se habilita apache y se arranca sólo.


Dar permisos de usuario donde `ubuntu` es nuestro usuario:
~~~
$ sudo usermod -a -G www-data ubuntu
~~~
exit y volver a entrar, si escribimos `groups` deberiamos de estar en el grupo `www-data`

~~~
sudo chown -R ubuntu:www-data /var/www

sudo chmod 2775 /var/www && find /var/www -type d -exec sudo chmod 2775 {} \;

find /var/www -type f -exec sudo chmod 0664 {} \;
~~~
Ahora en el directorio www deberiamos de tener permisos

![imagen](img/captura-8.png)


## Creación de 2 páginas

Ahora dentro del directorio `html` creamos 2 directorios y dentro de cada uno su correspondientes index.html
~~~
mkdir biblioteca
mkdir taller
~~~

Creamos el .conf en el directorio etc/apache2/sites-available/nombre.conf:

~~~
sudo nano etc/apache2/sites-available/taller.conf

<VirtualHost *:80>
  DocumentRoot /var/www/html/taller
</VirtualHost>

~~~
Si comprobamos el directorio sites-enabled, podemos comprobar que sólo está el 000-default....

Le decimos, sudo apache2 enable site `taller` para habilitar el sitio que deseamos sudo a2ensite **nombre**, no es necesario poner .conf:
~~~
sudo a2ensite taller

apachectl configtest

sudo systemctl reload apache2
~~~


Desabilitamos el sitio por defecto
~~~
sudo a2dissite 000-default
~~~
Reiniciamos apache y ya deberia funcionar

Ahora en creamos el .conf de biblioteca de esta forma, hay que tener en cuenta que al no ser el puerto por defecto, hemos de comenzar con Listen **numero de puerto**:

~~~
Listen 81
<VirtualHost *:81>
  DocumentRoot /var/www/html/biblioteca
</VirtualHost>
~~~
Habilitamos la nueva web
~~~
sudo a2ensite biblioteca
~~~

Ahora deberia de funcionar la web en el puerto 81


## proteger directorio
https://www.linuxenespañol.com/tutoriales/proteger-un-directorio-apache-con-contrasena/

