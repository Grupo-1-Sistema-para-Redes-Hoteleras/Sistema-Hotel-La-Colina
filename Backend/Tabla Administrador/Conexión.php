<? php

class  DB {

     $ host privado ;
    private  $ db ;
     $ usuario privado ;
     contraseña $ privada ;
     juego de caracteres $ privado ;

     función  pública __construct () {
        $ esto -> host = 'localhost' ;
        $ esto -> db = 'hotel' ;
        $ esto -> usuario = 'root' ;
        $ esto -> contraseña = '123qwe' ;
        $ esto -> juego de caracteres = 'utf8mb4' ;
    }

    function  connect () {
        prueba {
            $ conexión = "mysql: host =" . $ this -> host . "; nombrebd =" . $ esto -> db . "; juego de caracteres =" . $ this -> juego de caracteres ;

            $ opciones = [ PDO :: ATTR_ERRMODE => PDO :: ERRMODE_EXCEPTION ,
                        PDO :: ATTR_EMULATE_PREPARES => falso ,
                        PDO :: MYSQL_ATTR_INIT_COMMAND => "ESTABLECER NOMBRES utf8mb4" ];

            $ pdo = nuevo  PDO ( $ conexión , $ esto -> usuario , $ esto -> contraseña , $ opciones );
            return  $ pdo ;
        } captura ( PDOException  $ e ) {
            print_r ( "Error de conexión:" . $ e -> getMessage ());
            
        }
    }
}
?>
