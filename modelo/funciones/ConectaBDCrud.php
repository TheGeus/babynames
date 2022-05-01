<?php

use ConectaBDCrud as GlobalConectaBDCrud;

class ConectaBDCrud
{
    private $conexion = null;
    private static $instancia;

    private function __construct($database="bdbabynames"){
        $dsn = "mysql:host=localhost;dbname=$database";

        try{
            $this->conexion = new PDO($dsn, 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conexion->exec('SET CHARSET UTF8');
            //$this->conexion->exec('use bdbabynames');
        }catch(PDOException $e){
            die("¡ERROR!: ".$e->getMessage()."<br> Linea del error ".$e->getLine()."<br>");
        }
    }

    public static function singleton()//metodo singleton que crea instancia si no esta creada
    {
        if(!isset(self::$instancia)){
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }

    public function __destruct() //cierra conexion reasignando el valor a null
    {
        $this->conexion = null;
    }

    public function __clone()
    {
        trigger_error('La clonación de este objeto no está permitida', E_USER_ERROR);
    }
    public function listarLetras()
    {
        $consulta = $this->conexion->prepare("select * from bdbabynames.letras");
        try{
            /**
             * PDOStatement::fetchAll() devuelve un array que contiene tadas las filas restantes del conjunto
             *  de resultados. El array representa cada fila como un array con valores de las columnas, 
             * o como un objeto con propiedades correspondientes a cada nombre de columna.
             * 
             * PDO::FETCH_OBJ : devuelve un objeto anónimo con nombres de propiedades que se corresponden
             *  a los nombres de las columnas devueltas en el conjunto de resultados.
             */
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listadoNombres($sexo, $letra, $empieza, $cantidad) 
    {
        //vamos a buscar por sexo y letra. Y además de que pueden ser muchos nombres
        //necesitamos paginar esa solicitud
        //$empieza es en la posicion donde empezara a mostrarme registros de la base de datos
        //$cantidad me cogera desde el punto de donde empieza hasta la cantidad seleccionada.
        //ejemplo: empieza en el 1 y la cantidad es 10. pues me mostrara 10 registros de la base de datos.
        //empieza 8 y cantidad 2. pues me mostrará solo 2 registros que serian el 8 y el 9.
        $consulta = $this->conexion->prepare("select * from bdbabynames.bebes where sexo=:sexo and letra=:letra and estado=1 LIMIT :empieza, :cantidad");

        try{
            $consulta->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $consulta->bindParam(':letra', $letra, PDO::PARAM_STR);
            $consulta->bindValue(':empieza', $empieza, PDO::PARAM_INT);
            $consulta->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
            $consulta->execute();             
        }catch(PDOException $e){
            return "Error en la consulta".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function listadoNombresConEstados($sexo, $letra, $empieza, $cantidad) 
    {
        //vamos a buscar por sexo y letra. Y además de que pueden ser muchos nombres
        //necesitamos paginar esa solicitud
        //$empieza es en la posicion donde empezara a mostrarme registros de la base de datos
        //$cantidad me cogera desde el punto de donde empieza hasta la cantidad seleccionada.
        //ejemplo: empieza en el 1 y la cantidad es 10. pues me mostrara 10 registros de la base de datos.
        //empieza 8 y cantidad 2. pues me mostrará solo 2 registros que serian el 8 y el 9.
        $consulta = $this->conexion->prepare("select * from bdbabynames.bebes where sexo=:sexo and letra=:letra LIMIT :empieza, :cantidad");

        try{
            $consulta->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $consulta->bindParam(':letra', $letra, PDO::PARAM_STR);
            $consulta->bindValue(':empieza', $empieza, PDO::PARAM_INT);
            $consulta->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
            $consulta->execute();             
        }catch(PDOException $e){
            return "Error en la consulta".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
        
    }

    //cantidad de nombres en funcion del sexo y la letra
    public function cantidadBabysPorSexoLetra($sexo, $letra)
    {
        $consulta = $this->conexion->prepare('select count(*) from bdbabynames.bebes where sexo=:sexo and letra=:letra');

        try{
            $consulta->execute(array(':sexo'=>$sexo, ':letra'=>$letra));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchColumn();

    }

    public function bebe($token) 
    {
        //vamos a buscar por sexo y letra. Y además de que pueden ser muchos nombres
        //necesitamos paginar esa solicitud
        //$empieza es en la posicion donde empezara a mostrarme registros de la base de datos
        //$cantidad me cogera desde el punto de donde empieza hasta la cantidad seleccionada.
        //ejemplo: empieza en el 1 y la cantidad es 10. pues me mostrara 10 registros de la base de datos.
        //empieza 8 y cantidad 2. pues me mostrará solo 2 registros que serian el 8 y el 9.
        $consulta = $this->conexion->prepare("select * from bdbabynames.bebes where token=:token");

        try{
            //bindParam para ingresar el valor y el tipo de parametro y el maximo de lago.
            $consulta->bindParam(':token', $token, PDO::PARAM_STR, 25);
            $consulta->execute();
            
        }catch(PDOException $e){
            return "Error en la consulta".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
        
    }

    public function loginEmail($email)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.usuario where email=:email');

        try{
            $consulta->execute(array(':email'=>$email));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function loginUsuario($usuario)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.usuario where nom_usu=:usuario');

        try{
            $consulta->execute(array(':usuario'=>$usuario));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function loginPassword($id)
    {
        $consulta = $this->conexion->prepare('select pass from bdbabynames.clave where usuario_id=:id');

        try{
            $consulta->execute(array(':id'=>$id));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function onlyUser($id)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.usuario where id=:id');

        try{
            $consulta->execute(array(':id'=>$id));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function verNivel($id_usuario)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.nivel_usuario INNER JOIN bdbabynames.niveles ON nivel_usuario.nivel_id = niveles.id INNER JOIN bdbabynames.usuario ON nivel_usuario.usuario_id = usuario.id where usuario_id=:id');

        try{
            $consulta->execute(array(':id'=>$id_usuario));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function comprobarUsuExiste($usuario){
        $consulta = $this->conexion->prepare('select count(nom_usu) from bdbabynames.usuario where nom_usu=:usuario');

        try{
            $consulta->execute(array(':usuario'=>$usuario));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchColumn();
    }
    public function comprobarEmailExiste($email){
        $consulta = $this->conexion->prepare('select count(email) from bdbabynames.usuario where email=:email');

        try{
            $consulta->execute(array(':email'=>$email));
            
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchColumn();
    }

    
    public function nuevoUsuario($nombre, $apellido, $usuario, $email, $password, $sexo){
        $consulta = $this->conexion->prepare('insert into bdbabynames.usuario(nombre, apellido, nom_usu, email, sexo, estado) values(:nombre, :apellido, :usuario, :email, :sexo, 1)');
        try{
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
            $consulta->bindParam(':apellido', $apellido, PDO::PARAM_STR, 50);
            $consulta->bindParam(':usuario', $usuario, PDO::PARAM_STR, 50);
            $consulta->bindParam(':email', $email, PDO::PARAM_STR, 50);
            $consulta->bindParam(':sexo', $sexo, PDO::PARAM_STR, 50);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
            foreach($this->getUsuario($email) as $indice){
                $id = $indice['id'];
            }
            $this->crearPassword($id, $password);
            $this->crearPermisoNormal($id, $password);
            $this->crearNivelUsuario($id);
    }

    private function getUsuario($email){
        $consulta = $this->conexion->prepare('select * from bdbabynames.usuario where email=:email');
        try{
            $consulta->bindParam(':email', $email, PDO::PARAM_STR, 255);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
            return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    private function crearPassword($id, $password)
    {
        $consulta = $this->conexion->prepare('insert into bdbabynames.clave(usuario_id, pass) values(:usuario_id, :pass)');
        try{
            $opciones = [
                'cost' => 11
            ];
            $pass= password_hash("$password", PASSWORD_BCRYPT, $opciones);

            $consulta->bindParam(':usuario_id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':pass', $pass, PDO::PARAM_STR, 255);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
            return $consulta->fetchAll();
    }

    private function crearPermisoNormal($id)
    {
        $consulta = $this->conexion->prepare('insert into bdbabynames.tipo_usuario(usuario_id, slug_permiso, permiso) values(:usuario_id, \'usu_normal\', \'Usuario\' )');
        try{
            $consulta->bindParam(':usuario_id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
            return $consulta->fetchAll();
    }

    private function crearNivelUsuario($id)
    {
        $consulta = $this->conexion->prepare('insert into bdbabynames.nivel_usuario(nivel_id, usuario_id) values(1, :usuario_id)');
        try{
            $consulta->bindParam(':usuario_id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
            return $consulta->fetchAll();
    }

    public function getPermiso($id)
    {
        $consulta = $this->conexion->prepare('select permiso from bdbabynames.tipo_usuario where usuario_id=:id');
        try{
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC)[0]['permiso'];
    }
    public function updateBebe($id, $letra, $nombre, $sexo, $origen, $descripcion, $estado)
    {
        $consulta = $this->conexion->prepare('update bdbabynames.bebes SET letra=:letra, nombre=:nombre, sexo=:sexo, origen=:origen, descripcion=:descripcion where id=:id');
        try{
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':letra', $letra, PDO::PARAM_STR_CHAR);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $consulta->bindParam(':origen', $origen, PDO::PARAM_STR);
            $consulta->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->rowCount();
    }

    public function updatePerfil($id, $nombre, $apellido, $email, $nom_usu, $sexo, $estado)
    {
        $consulta = $this->conexion->prepare('update bdbabynames.usuario SET nombre=:nombre, apellido=:apellido, email=:email, nom_usu=:nom_usu, sexo=:sexo, estado=:estado where id=:id');
        try{
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR);
            $consulta->bindParam(':apellido', $apellido, PDO::PARAM_STR);
            $consulta->bindParam(':email', $email, PDO::PARAM_STR);
            $consulta->bindParam(':nom_usu', $nom_usu, PDO::PARAM_STR);
            $consulta->bindParam(':sexo', $sexo, PDO::PARAM_STR);
            $consulta->bindParam(':estado', $estado, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->rowCount();
    }

    public function listarLogrosId($exp_id, $id)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.got_exp where puntos_exp_id=:exp_id and usuario_id=:id');
        try{
            $consulta->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarLogrosUserId($exp_id, $id)
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.got_exp INNER JOIN bdbabynames.puntos_exp ON puntos_exp.id = got_exp.puntos_exp_id where puntos_exp_id=:exp_id and usuario_id=:id');
        try{
            $consulta->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function listarIdLogros()
    {
        $consulta = $this->conexion->prepare('select id from bdbabynames.puntos_exp');
        try{
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    public function listarLogros()
    {
        $consulta = $this->conexion->prepare('select * from bdbabynames.puntos_exp');
        try{
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    public function inicializarPuntoExp($exp_id, $id)
    {
        $consulta = $this->conexion->prepare('insert into bdbabynames.got_exp(puntos_exp_id, usuario_id, estado) values(:exp_id, :id, 0)');
        try{
            $consulta->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->rowCount();
    }


    public function comprobarEstadoGotExp($exp_id, $id)
    {
        $consulta = $this->conexion->prepare('select estado from bdbabynames.got_exp where puntos_exp_id=:exp_id and usuario_id=:id');
        try{
            $consulta->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC)[0]['estado'];
    }

    public function getExpDelUsuario($id)
    {
        $consulta = $this->conexion->prepare('select estado from bdbabynames.got_exp where puntos_exp_id=:exp_id and usuario_id=:id');
        try{
            $consulta->bindParam(':exp_id', $exp_id, PDO::PARAM_INT);
            $consulta->bindParam(':id', $id, PDO::PARAM_INT);
            $consulta->execute();
        }catch(PDOException $e){
            return "Error en la consulta ".$consulta->errorCode()." : ".$consulta->errorInfo()[2];
        }
        return $consulta->fetchAll(PDO::FETCH_ASSOC)[0]['estado'];
    }

}
?>