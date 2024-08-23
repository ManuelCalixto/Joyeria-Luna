<?php
class Consultas
{
    protected $pdo;
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    //Selecciona todos los registros de una tabla dada
    public function selectALL($tabla)
    {
        $query = $this->pdo->prepare("select * from $tabla");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    //insertar un nuevo registro en la tabla especifica  con los parametros dados 
    public function crear($tabla, $parametros)
    {

        $col = implode(', ', array_keys($parametros));
        $valores = ":" . implode(', :', array_keys($parametros));
        $query = $this->pdo->prepare("INSERT INTO {$tabla} ({$col}) VALUES ({$valores})");
        $query->execute($parametros);

        //$query = $this->pdo->prepare();
        //$query->execute();
    }

    //obtiene un registro especifico por ID de la tabla

    public function getRegistro($tabla, $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$tabla} WHERE id=:id");
        $query->execute(['id' => $id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    /**ACTUALIZA UN REGISTRO ESPECIFICO
       ID EN LA TABLA DADA CON LOS PARAMETROS
       DADOS
    */
    public function actualizar($tabla, $parametros, $id)
    {
        $cols = implode(', ', array_map(function ($col) {
            return "{$col} =:{$col}";
        }, array_keys($parametros)));

        $query = $this->pdo->prepare("UPDATE {$tabla} SET {$cols} WHERE id=:id");
        $parametros['id'] = $id;
        $query->execute($parametros);
    }
    // crea funcion dentro de la clase consultas para eliminar registro espcifico
    public function eliminarRegistro($tabla, $id)
    {
        $query = $this-> pdo ->prepare("DELETE FROM {$tabla} WHERE id=:id");
        $parametros['id'] = $id;
        $query->execute($parametros);
    }

}