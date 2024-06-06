<?php
header("Content-Type: application/json; charset=utf-8");
include __DIR__ . "/marca.class.php";
$id_marca = isset($_GET["id_marca"]) ? $_GET["id_marca"] : null;
$action = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : null;

class MarcasAPI extends Marca
{
    public function read()
    {
        $datos = $this->getAll();
        $datos = json_encode($datos);
        print $datos;
    }

    public function readOne($id_marca)
    {
        $datos = $this->getOne($id_marca);
        if (isset($datos['id_marca'])) {
            $datos = json_encode($datos);
            print $datos;
        } else {
            $datos['mensaje'] = "No se ha encontrado la Marca especificada";
            $datos = json_encode($datos);
            print $datos;
        }
    }

    public function deleteOne($id_marca)
    {
        $filas = $this->delete($id_marca);
        if ($filas) {
            $datos['mensaje'] = "Marca eliminada correctamente";
        } else {
            $datos['mensaje'] = "No se pudo eliminar la Marca";
        }
        $datos = json_encode($datos);
        print $datos;
    }

    public function create($datos)
    {
        if ($this->insert($datos)) {
            $datos['mensaje'] = "Marca añadida correctamente";
            $datos = json_encode($datos);
            print $datos;
        } else {
            $datos['mensaje'] = "Ocurrió un problema";
            $datos = json_encode($datos);
            print $datos;
        }
    }

    public function modify($id_marca, $datos)
    {
        if ($this->update($id_marca, $datos)) {
            $datos['mensaje'] = "Marca modificado correctamente";
            $datos = json_encode($datos);
            print $datos;
        } else {
            $datos['mensaje'] = "Ocurrió un problema";
            $datos = json_encode($datos);
            print $datos;
        }
    }
}

$app = new MarcasAPI();
switch ($action) {
    case "POST":
        $datos = array();
        $datos['marca'] = $_POST['marca'];
        
        if (isset($_GET['id_marca'])) {
            $id_marca = $_GET['id_marca'];
            $app->modify($id_marca, $datos);
        } else {
            $app->create($datos);
        }
        break;
    case "DELETE":
        if (isset($_GET['id_marca'])) {
            $app->deleteOne($id_marca);
        }
        break;
    case "GET":
    default:
        if (isset($_GET['id_marca'])) {
            $app->readOne($id_marca);
        } else {
            $app->read();
        }
        break;
}