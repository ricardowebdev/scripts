    echo "=========================== Maiores valores monitorados ================================";    
    echo "";
    MAXMEM2=$(echo "scale=2;($MAXMEM/1000)" | bc);
    MAXSWAP2=$(echo "scale=2;($MAXSWAP/1000)" | bc);
    echo "Maior memoria fisica usada: "$MAXMEM2"M";
    echo "Maior swap usado: "$MAXSWAP2"M";
    echo "Maior uso de CPU: "$MAXCPU;   
    echo "";
    echo "========================================================================================";
