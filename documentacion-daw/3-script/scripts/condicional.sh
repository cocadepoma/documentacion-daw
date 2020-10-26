#!/bin/bash


if [ $# -eq 2  ]
then
 echo la suma es $(($1+$2))
else
 echo Hay que pasar dos argumentos!!!
fi
