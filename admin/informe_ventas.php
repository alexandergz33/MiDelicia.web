<?php
include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
    exit;
}

// Manejar el formulario de fecha
if (isset($_POST['submit'])) {
    $selected_date = $_POST['selected_date'];
    // Validar la fecha o realizar más validaciones según sea necesario

    // Consultar la cantidad de pedidos completados y pendientes para la fecha seleccionada
    $select_orders_completed = $conn->prepare("SELECT COUNT(*) AS order_count FROM orders WHERE payment_status = 'completed' AND DATE(placed_on) = ?");
    $select_orders_completed->execute([$selected_date]);
    $row_completed = $select_orders_completed->fetch(PDO::FETCH_ASSOC);

    $order_count_completed = ($row_completed) ? $row_completed['order_count'] : 0;

    $select_orders_pending = $conn->prepare("SELECT COUNT(*) AS order_count FROM orders WHERE payment_status = 'pending' AND DATE(placed_on) = ?");
    $select_orders_pending->execute([$selected_date]);
    $row_pending = $select_orders_pending->fetch(PDO::FETCH_ASSOC);

    $order_count_pending = ($row_pending) ? $row_pending['order_count'] : 0;
}

// Consultar las fechas y contar la cantidad de pedidos completados para cada fecha
$select_orders = $conn->prepare("SELECT DATE(placed_on) AS order_date, COUNT(*) AS order_count FROM orders WHERE payment_status = 'completed' GROUP BY DATE(placed_on)");
$select_orders->execute();

$dates = $counts_completed = $counts_pending = [];

while ($row = $select_orders->fetch(PDO::FETCH_ASSOC)) {
    $dates[] = $row['order_date'];

    // Obtener la cantidad de pedidos completados por fecha
    $select_completed = $conn->prepare("SELECT COUNT(*) AS order_count FROM orders WHERE payment_status = 'completed' AND DATE(placed_on) = ?");
    $select_completed->execute([$row['order_date']]);
    $row_completed = $select_completed->fetch(PDO::FETCH_ASSOC);
    $counts_completed[] = ($row_completed) ? $row_completed['order_count'] : 0;

    // Obtener la cantidad de pedidos pendientes por fecha
    $select_pending = $conn->prepare("SELECT COUNT(*) AS order_count FROM orders WHERE payment_status = 'pending' AND DATE(placed_on) = ?");
    $select_pending->execute([$row['order_date']]);
    $row_pending = $select_pending->fetch(PDO::FETCH_ASSOC);
    $counts_pending[] = ($row_pending) ? $row_pending['order_count'] : 0;
}
?>

<!DOCTYPE html>
<html lang="en">
<title>Informes</title>
<head>
    <!-- ... Tus etiquetas head aquí ... -->

    <!-- Incluye Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/admin_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
    .order-count {
        margin-top: 10px;
        font-size: 26px;
        color: white; /* Nuevo color verde más moderno */
    }

    canvas {
        max-width: 100%; /* Hacer el gráfico completamente receptivo */
        margin: 20px 0;
        border-radius: 8px; /* Bordes redondeados para un aspecto más suave */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave para resaltar */
    }

    .date-selection {
        margin: 20px 0;
        padding: 20px;
        border: 1px solid #e0e0e0; /* Un gris más claro para el borde */
        border-radius: 12px; /* Bordes más redondeados para un diseño moderno */
        
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* Sombra más pronunciada para resaltar */
    }

    .date-selection h2 {
        font-size: 22px; /* Tamaño de fuente ligeramente más grande */
        margin-bottom: 15px; /* Más espacio debajo del encabezado */
        color: #333; /* Color de texto más oscuro */
    }

    .date-selection form {
        display: flex;
        gap: 15px; /* Más espacio entre elementos */
        align-items: center;
    }

    .date-selection input[type="date"] {
        padding: 12px; /* Un poco más de espacio dentro del campo de fecha */
        border: 1px solid #ddd; /* Borde más claro */
        border-radius: 6px; /* Bordes más redondeados */
        font-size: 14px; /* Tamaño de fuente más pequeño */
    }
    .show-report-button {
        padding: 12px 20px; /* Más espacio interno para un botón más grande */
        background-color: #3498db; /* Color azul brillante */
        color: #fff; /* Texto blanco para mayor contraste */
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s; /* Efecto de transición al pasar el ratón */
       
        display: flex;
        align-items: center;
        justify-content: space-around;
    }

    .show-report-button:hover {
        background-color: #2980b9; /* Color azul ligeramente más oscuro al pasar el ratón */
    }

    /* Estilos para el ícono de Font Awesome */
    .show-report-button i {
        margin-right: 8px; /* Espacio a la derecha del ícono */
    }
     
    
    .clear-button {
        padding: 12px 20px; /* Más espacio interno para un botón más grande */
        background-color: #e74c3c; /* Color rojo brillante para indicar limpieza */
        color: #fff; /* Texto blanco para mayor contraste */
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background-color 0.3s; /* Efecto de transición al pasar el ratón */
         
    }

    .clear-button:hover {
        background-color: #c0392b; /* Color rojo ligeramente más oscuro al pasar el ratón */
    }
       /* Estilo adicional para el icono */
    .clear-button i {
        margin-right: 4px; /* Espacio entre el icono y el texto del botón */
    }
</style>

</head>

<body>

    <?php include '../components/admin_header.php' ?>

    <!-- Formulario para seleccionar la fecha -->
    <section class="date-selection">
        <h2>Seleccione una fecha:</h2>
        <form method="POST">
            <input type="date" name="selected_date" required>
            <button type="submit" name="submit" class="show-report-button">
               <i class="fas fa-arrow-right"></i> Mostrar Informe
            </button>
            <button type="button" onclick="clearBars()" class="clear-button">
               <i class="fas fa-trash"></i> Limpiar gráfico
                  </button>
        </form>

        <!-- Mostrar la cantidad de pedidos completados y pendientes para la fecha seleccionada -->
        <?php if (isset($selected_date)) : ?>
            <p class="order-count">Cantidad de pedidos completados para la fecha <?= $selected_date ?>: <?= $order_count_completed ?> pedidos</p>
            <p class="order-count">Cantidad de pedidos pendientes para la fecha <?= $selected_date ?>: <?= $order_count_pending ?> pedidos</p>
        <?php endif; ?>
    </section>

    <!-- Informe de ventas con gráfico de barras -->
    <section class="sales-report">
        <h1 class="heading">Informe de Ventas</h1>

        <!-- Gráfico de barras -->
        <canvas id="salesChart"></canvas>

        <script>
            // Configuración del gráfico
            var ctx = document.getElementById('salesChart').getContext('2d');
            var salesChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode($dates) ?>,
                    datasets: [
                        {
                            label: 'Completados',
                            data: <?= json_encode($counts_completed) ?>,
                            backgroundColor: 'rgba(75, 192, 192, 0.6)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 2,
                            borderRadius: 10,
                            shadowOffsetX: 2,
                            shadowOffsetY: 2,
                            shadowBlur: 5,
                            shadowColor: 'rgba(0, 0, 0, 0.3)',
                            
                        },
                        {
                            
                            label: 'Pendientes',
                            data: <?= json_encode($counts_pending) ?>,
                            backgroundColor: 'rgba(255, 99, 132, 0.6)', // Cambia el color según tus preferencias
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            borderRadius: 10,
                            shadowOffsetX: 2,
                            shadowOffsetY: 2,
                            shadowBlur: 5,
                            shadowColor: 'rgba(0, 0, 0, 0.3)',
                        },
                    ]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Informe de Ventas realizadas',
                            color: '#fff',
                            font: {
                                size: 20,
                                
                            }
                        },
                        legend: {
                            
                            display: true
                        }
                    }
                }
            });
          // Inicializar el gráfico con datos iniciales
          function updateBars(completedData, pendingData) {
            // Actualizar solo los datos de las barras
            salesChart.data.datasets[0].data = completedData;
            salesChart.data.datasets[1].data = pendingData;
            salesChart.update();
        }

        function clearBars() {








            // Limpiar los datos de las barras
            updateBars([], []);
        }
        </script>
    </section>

    <!-- ... El resto de tu código aquí ... -->

    <!-- custom js file link  -->
    <script src="../js/admin_script.js"></script>

</body>

</html>
