echo "======================== Monitoramento de Serviços ====================================="

echo ""

TEMP=$(systemctl status apache2 | grep Active | awk '{print $3}');
if [ $TEMP != $STAPACHE ]
then
    FILE=1;
    STAPACHE=$TEMP;
fi

echo "Apache: "$STAPACHE;

TEMP=$(systemctl status mysql | grep Active | awk '{print $3}');
if [ $TEMP != $STMYSQL ]
then
    FILE=1;
    STMYSQL=$TEMP;
fi

echo "Mysql: "$STMYSQL;

echo ""
echo "========================================================================================"
