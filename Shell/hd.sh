echo "=========================== Monitoramento de HD ======================================="	

echo ""
HDTOTAL=$(df -h | grep /dev/sd | awk '{print $2}');
HDUSED=$(df -h | grep /dev/sd | awk '{print $3}');
HDFREE=$(df -h | grep /dev/sd | awk '{print $4}');
echo "Tamanho do hd principal: "$HDTOTAL;
echo "Em uso: "$HDUSED;
echo "Espaço livre: "$HDFREE;
#iostat -h # Le o uso atual I/O do sistema

echo ""

echo "========================================================================================"
