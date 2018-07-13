#!/bin/bash

# Inicializando Variaveis
CORES=0;
MAXMEM=0;
MAXSWAP=0;
MAXCPU=0;

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
    echo "=================================== Uso da Memoria ====================================="

    echo ""

    MEMORY=$(free | grep Mem | awk '{print $3}'); # Pega a memoria fisica usada
    TEMP=${MEMORY/,/.};        

    if [ $TEMP -gt $MAXMEM ];
    then        
        MAXMEM=$TEMP;
    else
	    MAXMEM=$MAXMEM;
    fi

    SWAP=$(free | grep Swap | awk '{print $3}');  # Pega o swap utilizado
    TEMP=${SWAP/,/.};
    
    if [ $TEMP -gt $MAXSWAP ];
    then
        MAXSWAP=$TEMP;
    fi
    
    MEMORY=$(free -h | grep Mem | awk '{print $3}'); # Pega a memoria fisica usada
    TEMP=${MEMORY/,/.};            

    echo "Memoria fisica: "$MEMORY;	

    SWAP=$(free -h | grep Swap | awk '{print $3}');  # Pega o swap utilizado
    TEMP=${SWAP/,/.};    
    echo "Uso do Swap: "$SWAP;

    echo ""

    TEMP=0;
    echo "========================================================================================"    

    echo ""

    echo "================================= Uso dos processadores ================================"

    echo ""

    USED=$(uptime | awk '{print $9}'); # Pega no uptime o uso de cpu no ultimo minuto
    USED=${USED/,/.};            
    USED=${USED/,/0};    

    TEMP=${USED/./};

    if [ $TEMP -gt $MAXCPU ];
    then
        MAXCPU=$TEMP;
    fi

    FREECPU=$(echo "scale=2;($CORES - $USED)" | bc);

    echo "Total de cpus: "$CORES;
    echo "Cpus Utilizados: "$USED;
    echo "Cpus Livres: "$FREECPU;

    echo ""

    echo "========================================================================================"

    echo ""

    echo "=========================== Monitoramento de I/O ======================================="	

    echo ""

    iostat -h # Le o uso atual I/O do sistema

    echo ""

    echo "========================================================================================"

    echo ""

    echo "=========================== Maiores valores monitorados ================================"
    
    echo ""
    MAXMEM2=$(echo "scale=2;($MAXMEM/1000)" | bc);
    MAXSWAP2=$(echo "scale=2;($MAXSWAP/1000)" | bc);
    echo "Maior memoria fisica usada: "$MAXMEM2"M";
    echo "Maior swap usado: "$MAXSWAP2"M";
    echo "Maior uso de CPU: "$MAXCPU;
   
    echo ""

    echo "========================================================================================"


    sleep 2 
    clear   
done
