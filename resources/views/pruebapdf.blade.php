<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tabla-detalle p{
            margin: 0;
        }
    </style>
</head>
<body id="page-top">     
    <h1 style="text-align:center;">INFOMEC</h1>
    <h3 class="text-center text-dark mb-1" style="text-align: center;padding-top: 20px;background-color: #ffffff;">COMPROBANTE DE REPARACIÓN</h3>

    <table id="encabezado">
        <tr>
            <!-- Datos del cliente -->
            <td>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Datos del cliente</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nombre</td>
                            <td>Elon</td>
                        </tr>
                        <tr>
                            <td>Apellido</td>
                            <td>Musk </td>
                        </tr>
                        <tr>
                            <td>DNI</td>
                            <td>34518745</td>
                        </tr>
                        <tr>
                            <td>Patente</td>
                            <td>DSW324</td>
                        </tr>
                    </tbody>
                </table>
            </td>
            <!-- Fecha -->
            <td style="padding-left: 10px;">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="padding-right: 30px;">Fecha</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="padding-left: 10px;">
                            <td>De entrada</td>
                            <td>26/11/21</td>
                        </tr>
                        <tr style="padding-left: 10px;">
                            <td>De salida</td>
                            <td>26/11/21</td>
                        </tr>
                        <tr style="padding-left: 10px;"><td style="color:white;">empty</td></tr>
                        <tr style="padding-left: 10px;"><td style="color:white;">empty</td></tr>
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
    
    <hr>
    <h4 class="text-center" style="padding-top: 30px;">DETALLE</h4>
    
    <!-- Detalle -->
    <table class="tabla-detalle">
        <thead style="text-align: left;">
            <tr>
                <th>
                    Tarea 1
                </th>
                <th style="padding-left: 20px;">
                    Acción
                </th>
                <th style="padding-left: 20px;">
                    Piezas
                </th>
                <th style="padding-left: 20px;">
                    Subtotal
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <!-- Tarea DEJAR VACÍO -->
                <td>
                    
                </td>
                <!-- Acción -->
                <td style="padding-left: 20px;">
                    <p>Cambio de cubierta ($500)</p>
                </td>
                <!-- Piezas -->
                <td style="padding-left: 20px;text-align:right;">
                    <p>Cubierta C90 x1($2000)</p>
                </td>
                <!-- Subtotal -->
                <td style="padding-left: 20px;text-align:right;">
                    <p style="font-weight: 400;">$2500</p>
                </td>
            </tr>
            <!-- AGREGAR ESTO CADA VEZ QUE SE NECESITE OTRA PIEZA -->
            <tr>
                <!-- DEJAR VACÍO -->
                <td></td>
                <!-- DEJAR VACÍO -->
                <td></td>
                <!-- Pieza -->
                <td>

                </td>
                <!-- DEJAR VACÍO -->
                <td></td>
            </tr>
        </tbody>
    </table>

    <hr>
    <table style="margin-top: 40px;">
        <thead>
            <tr>
                <th>Total</th>
                <th style="padding-left: 20px;">Tiempo</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p>$2500</p>
                </td>
                <td style="padding-left: 20px;">
                    <p>1H</p>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>