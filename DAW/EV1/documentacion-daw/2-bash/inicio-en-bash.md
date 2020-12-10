
- [Scripts de Bash](#scripts-de-bash)
  - [Variables](#variables)
  - [**Paso de argumentos**](#paso-de-argumentos)
  - [**Ejecución condicional**](#ejecución-condicional)


># Primera evaluación

## Scripts de Bash

### Variables

Vamos a crear un script que pregunte el nombre del usuario y le diga **HOLA**. Para ello creamos un archivo con los comandos necesarios usando `nano`:


~~~
$ nano variables.sh
~~~
1.  Primero ponemos `#!/bin/bash` que indica el tipo de intérprete que vamos a usar, esta línea siempre debe ir la primera.
2.  La instruccion `echo` imprime en la consola los caracteres que se le pasan como argumento.
3.  `read` Esta instrucción recoge una entrada al usuario y la guarda en la variable que le pasemos como argumento. Cuando se ejecuta el script, `read` esperará a que le introduzcamos algo por teclado
4.  Imprimimos por pantalla con `echo` y para acceder al valor de la variable `nombre` una variable accedemos con el símbolo `$`

Quedando el archivo `variables.sh` así:
~~~
#!/bin/bash

echo Cómo te llamas?
read nombre
echo Buenas tardes $nombre
~~~

Ahora quiero ejcutar el script, pero hay que comprobar si poseo los **permisos necesarios**.
~~~
$ ls -al
~~~
Obtenemos:
~~~
drwxrwxr-x 2 paco paco 4096 sep 18 16:47 .
drwxrwxr-x 4 paco paco 4096 sep 18 16:30 ..
-rw-rw-r-- 1 paco paco   74 sep 18 16:46 variables.sh
~~~

Observamos que el script no tiene permisos de ejecución, le damos permisos de ejecución a todos los grupos y usuarios:
~~~
$ sudo chmod +x variables.sh
~~~
Comprobamos:
~~~
$ ls -al
drwxrwxr-x 2 paco paco 4096 sep 18 16:47 .
drwxrwxr-x 4 paco paco 4096 sep 18 16:30 ..
-rwxrwxr-x 1 paco paco   74 sep 18 16:46 variables.sh
~~~
Ya tenemos permision de ejecución representado con una `x`

Creamos otro archivo para utilizar números
~~~
$ nano numeros.sh
~~~
Escribimos dentro:
~~~
#!/bin/bash

echo introduzca un numero
read numero1

echo introduzca otro numero
read numero2

suma=$(($numero1+$numero2))

echo la suma es $suma
~~~
Damos permisos:
~~~
$ sudo chmod +x numeros.sh
~~~
Ejecutamos:
~~~
$ ./numeros.sh
~~~

Para sumar variables hay que rodearlas entre `doble paréntesis` y muy importante, `sin espacios`.
~~~
suma=$(($numero1+$numero2))
~~~

### **Paso de argumentos**

Creamos el archivo `argumentos`:
~~~
nano argumentos.sh
~~~
Los argumentos que pasamos al script se encuentran en las variables `$1`, `$2`, etc- El script quedará asi:
~~~
#!/bin/bash
echo Hola $1
~~~
Cambiamos permisos y ejecutamos:
~~~
$ chmod +x argumentos.sh
$ ./argumentos.sh Paco
~~~
Nos devuelve:
~~~
Hola Paco
~~~

### **Ejecución condicional**

Creamos condicional.sh

Rellenamos con esto:
~~~
#!/bin/bash

if [ $# -eq 2  ]
then 
 echo la suma es $(($1+$2))
else
 echo Hay que pasar dos argumentos!!!
fi
~~~
Lo que hay dentro del `if`, debe ir separado de los corchetes, y el `if` del propio corchete también.

1. `-eq` equals
2. `-lw` menor que
3. `-gt` mayor que

La sintaxis es la siguiente:
~~~
if [ condición ]
then
    ....
else
    ....
fi
~~~
Cambiamos permisos al archivo y ejecutamos:
~~~
$ chmod +x condicional.sh
$ ./condicional.sh 3 4
~~~
Nos devuelve:
~~~
la suma es 7
~~~
y en el caso de que no le pasemos los 2 argumentos se ejecuta la parte del else.