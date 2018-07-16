#!/bin/bash

# Inicializando Variaveis
CORES=0;
MAXMEM=0;
MAXSWAP=0;
MAXCPU=0;
PICOMEM="";
PICOCPU="";
PICOSWAP="";
INICIO=$(date '+%Y/%m/%d %H:%M:%S');
STAPACHE="(running)";
STMYSQL="(running)";

# Executa o script principal
while true;
do
    FILE=0;

    source ./memoria.sh; #Pesquisa os dados da memoria
    echo "";
    source ./cpu.sh; #Pesquisa o uso dos processadores
    echo "";
    source ./hd.sh; #Pesquisa o uso do HD
    echo "";
    source ./services.sh; #Pesquisa determinados serviços e seus status
    echo "";
    source ./maxvalues.sh; #Calcula os maiores valores armazenados
    source ./writefile.sh;

    sleep 2 
    clear   
done
