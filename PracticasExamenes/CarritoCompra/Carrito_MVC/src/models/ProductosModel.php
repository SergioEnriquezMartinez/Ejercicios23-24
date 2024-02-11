<?php

namespace Manu\CarritoMvc\Models;



class ProductosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->tabla = "productos";
    }
   public function getEntradas($limiTeinical = null, $limiteFinal = null)
    {
        try {
            $consulta = "select e.*, c.nombre as nombreCategoria
        from productos e join categoriaproductos c
        on (e.categoria_id=c.id)
        order by id desc";
            if (isset($limiteFinal) && isset($limiteFinal)) {
                $consulta .= " limit $limiTeinical, $limiteFinal";
            }
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            return $resultado;
        } catch (\PDOException $e) {
            echo "<p>Fallo en la conexión" . $e->getMessage() . "</p>";
            return null;
        }
    }
    /* 
    public function getEntradasCategoria($idCategoria, $limiTeinical = null, $limiteFinal = null)
    {
        try {

            $consulta = "select e.*, c.nombre as nombreCategoria
                        from entradas e inner join categorias c 
                            on (e.categoria_id = c.id)
                        where e.categoria_id = :idCategoria
                        order by id desc";
            if (isset($limiteFinal) && isset($limiteFinal)) {
                $consulta .= " limit $limiTeinical, $limiteFinal";
            }
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':idCategoria', $idCategoria);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll();
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function getLastEntradas()
    {
        try {
            $consulta = "select e.*, c.nombre as nombreCategoria
            from entradas e inner join categorias c 
                on (e.categoria_id = c.id)
            order by id desc 
            limit " . Parameters::$LAST_ENTRADAS;
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return null;
        }
    }
    public function search($busqueda)
    {
        try {
            $consulta = "SELECT e.titulo, e.descripcion,e.fecha, c.nombre as nombreCategoria
            FROM entradas e join categorias c
            on (e.categoria_id = c.id)
            WHERE lower(e.titulo) like :busqueda or lower(e.descripcion) like :busqueda 
            or lower(c.nombre) like :busqueda or e.fecha like :busqueda";
            $terminoBusqueda = "%$busqueda%";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':busqueda', $terminoBusqueda);
            $sentencia->setFetchMode(\PDO::FETCH_ASSOC);
            $sentencia->execute();
            $resultado = $sentencia->fetchAll();
            return $resultado;
        } catch (\PDOException $e) {
            echo '<p>Fallo en la conexion:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function  newEntrada(EntradaEntity $user)
    {
        try {
            $consulta = "insert into entradas(usuario_id, categoria_id, titulo, descripcion, fecha)
                    values (:usuarioId, :categoriaId, :titulo, :descripcion, curdate())";


            $usuarioId = $user->getUsuarioId();
            $categoriaId = $user->getCategoriaId();
            $titulo = $user->getTitulo();
            $descripcion = $user->getDescripcion();
            $sentencia = $this->conn->prepare($consulta);

            $sentencia->bindParam(':usuarioId', $usuarioId);
            $sentencia->bindParam(':categoriaId', $categoriaId);
            $sentencia->bindParam(':titulo', $titulo);
            $sentencia->bindParam(':descripcion', $descripcion);
            return $sentencia->execute();
        } catch (\PDOException $e) {
            echo '<p> Excepcion Alta:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function delete($id)
    {
        try {
            $consulta = "DELETE FROM entradas where id = :id";
            $variable = intval($id);
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id', $variable);
            return $sentencia->execute();
        } catch (\PDOException $e) {
            echo '<p> Excepcion Alta:' . $e->getMessage() . '</p>';
            return NULL;
        }
    }
    public function editarEntrada($titulo, $descripcion, $categoria, $id){
        try{
            $consulta = "UPDATE entradas
            SET titulo = :titulo, categoria_id = :categoria_id, descripcion = :descripcion
            WHERE id = :id;";
            $sentencia = $this->conn->prepare($consulta);
            $sentencia->bindParam(':id', $id);
            $sentencia->bindParam(':titulo', $titulo);
            $sentencia->bindParam(':categoria_id', $categoria);
            $sentencia->bindParam(':descripcion', $descripcion);
            return $sentencia->execute();
        }catch(\PDOException $e){
            echo '<p> Excepcion Alta:' . $e->getMessage() . '</p>';
            return NULL;
            
        }
    }
    */
}
