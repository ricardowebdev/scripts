# Se teve mudanças salva os dados em um arquivo
if [ $FILE -eq 1 ] 
then
    FIM=$(date '+%Y/%m/%d %H:%M:%S');
    DATA="/opt/monitor/"$(date -d 'today' '+%d-%m-%Y')".json";
    >> $DATA;

    
    echo '{' > $DATA; 
    echo '"begin": "'$INICIO'",' >> $DATA;
    
    echo '"server": {' >> $DATA;
    echo '"name": "'$SERVER'",'     >> $DATA;
    echo '"ip": "'$IP'",'           >> $DATA;
    echo '"users": "'$USUARIOS'",'  >> $DATA;
    echo '"distr": "'$DISTRO'",'    >> $DATA;
    echo '"release": "'$RELEASE'"' >> $DATA;
    echo '},' >> $DATA;

    echo '"memory": {' >> $DATA;
    echo '"total":"'$MEMTOTAL'",' >> $DATA;
    echo '"max":"'$MAXMEM2'",'    >> $DATA;
    echo '"pico":"'$PICOMEM'",'   >> $DATA;
    echo '"user":"'$USERMEM'",'   >> $DATA;
    echo '"cpu":"'$CPUMEM'",'     >> $DATA;
    echo '"mem":"'$MEMMEM'",'     >> $DATA;
    echo '"proc":"'$PROCMEM'"'   >> $DATA;    
    echo '},' >> $DATA;

    echo '"swap": {' >> $DATA;
    echo '"total":"'$SWAPTOTAL'",' >> $DATA;
    echo '"max":"'$MAXSWAP2'",'    >> $DATA;
    echo '"pico":"'$PICOSWAP'",'   >> $DATA;
    echo '"user":"'$USERSWAP'",'   >> $DATA;
    echo '"cpu":"'$CPUSWAP'",'     >> $DATA;
    echo '"mem":"'$MEMSWAP'",'     >> $DATA;
    echo '"proc":"'$PROCSWAP'"'   >> $DATA;      
    echo '},' >> $DATA;

    echo '"cpu": {' >> $DATA;
    echo '"cores":"'$CORES'",'  >> $DATA;
    echo '"max":"'$MAXCPU'",'   >> $DATA;
    echo '"pico":"'$PICOCPU'",' >> $DATA;
    echo '"user":"'$USERCPU'",' >> $DATA;
    echo '"cpu":"'$CPUCPU'",'   >> $DATA;
    echo '"mem":"'$MEMCPU'",'   >> $DATA;
    echo '"proc":"'$PROCCPU'"' >> $DATA;      
    echo '},' >> $DATA;    

    echo '"services": {' >> $DATA;
    echo '"apache": "'$STAPACHE'",' >> $DATA;
    echo '"mysql": "'$STMYSQL'"'   >> $DATA;
    echo '},' >> $DATA;    

    echo '"hd": {' >> $DATA;
    echo '"total": "'$HDTOTAL'",' >> $DATA;
    echo '"used": "'$HDUSED'",'   >> $DATA;
    echo '"free": "'$HDFREE'"'   >> $DATA;
    echo '},' >> $DATA;   

    echo '"end": "'$FIM'"' >> $DATA;

    echo '}' >> $DATA;     
fi
