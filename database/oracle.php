<?php

class DBOracle{
    static $DB_CONF = array (
        'ADM'=> array(
            'ADM'=> array ('U'=>"admsei",'PW'=>"2IWERIHS2X", 'SID'=>"to1/adm.world"),
        )
    );

    public static function getDefaultDB() {
        return 'ADM';
    }

    public static function Conecta($parameter) {
        $env = DBOracle::getDefaultDB();

        $param_DB = (isset ($parameter) || $parameter != null) ? $parameter : DBOracle::getDefaultDB();
        $conn = null;
        $conectar = DBOracle::$DB_CONF;
        //$conectar[$param_DB]['SID'];
        putenv('NLS_LANG=BRAZILIAN PORTUGUESE_BRAZIL.UTF8');
        //echo $conectar[$env][$param_DB]['U']; die;
        $conn = oci_connect($conectar[$env][$param_DB]['U'], $conectar[$env][$param_DB]['PW'], $conectar[$env][$param_DB]['SID']);

        if (!$conn){
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            die ("<h1>Problemas com a conexão ao banco de dados:</h1>
            Banco:". DBOracle::$DB_CONF[$env][$param_DB]['SID']." - Usuário:". DBOracle::$DB_CONF[$env][$param_DB]['U']. "<BR />
              <font color=red><b>Nossos servidores de Banco de Dados estão passando por problemas técnicos.
            <br/>Por favor, aguarde alguns instantes e tente novamente.</b></font><br/>
            <br/>
            <u>ATENÇÃO</u>: Informamos que o correio eletrônico e o acesso à  Internet podem estar disponíveis.
            <br/>"
            );
        }
        //die;
        return $conn;
    }
}
//exemplo de uso
//$connADM = DBOracle::Conecta('FOLHA');
?>
