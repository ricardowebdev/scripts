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

# pegando a quantidade de nucleos do server
COUNT=$(cat /proc/cpuinfo | grep cores | awk '{print $4}');
arr=$(echo $COUNT | tr " " "\n")

#Quebrando o array em variaveis e somando os cores
for i in $arr
do
    CORES=$(($CORES + $i))
done
# Formatando o total de cores calculados
CORES=$CORES".00";

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

    sleep 10 
    clear   
done
