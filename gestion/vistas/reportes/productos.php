<?php
$content .= "
    <div style=\"text-align: center;\">
        <img src=\"../images/productos/default.png\" height=\"100\" width=\"100\" alt=\"logo\" />
        <h1 style=\"color: red;\">Listado de Productos</h1>
        <p>Se encontraron " . count($datos) . " productos</p>
        <table style=\"border-collapse: collapse; width: 100%;\">
            <thead>
                <tr style=\"background-color: #f2f2f2;\">
                    <th style=\"padding: 10px; border: 1px solid #ddd;\">Id</th>
                    <th style=\"padding: 10px; border: 1px solid #ddd;\">Marca</th>
                    <th style=\"padding: 10px; border: 1px solid #ddd;\">Producto</th>
                    <th style=\"padding: 10px; border: 1px solid #ddd;\">Precio</th>
                    <th style=\"padding: 10px; border: 1px solid #ddd;\">Costo</th>
                </tr>
            </thead>
            <tbody>";

foreach ($datos as $dato) {
    $content .= "
            <tr>
                <td style=\"padding: 10px; border: 1px solid #ddd;\">" . $dato['id_producto'] . "</td>
                <td style=\"padding: 10px; border: 1px solid #ddd;\">" . $dato['marca'] . "</td>
                <td style=\"padding: 10px; border: 1px solid #ddd;\">" . $dato['nombre'] . "</td>
                <td style=\"padding: 10px; border: 1px solid #ddd;\">" . $dato['precio'] . "</td>
                <td style=\"padding: 10px; border: 1px solid #ddd;\">" . $dato['costo'] . "</td>
            </tr>";
}
$content .= "
            </tbody>
        </table>
    </div>";
?>
