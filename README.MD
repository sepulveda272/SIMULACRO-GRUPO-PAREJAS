# Alquilartemis - Documentación del Proyecto

## 1. Introducción

La empresa de alquiler de material de construcción, Alquilartemis, busca integrar los módulos de alquiler, devoluciones, inventarios y liquidaciones de alquiler de productos de construcción para sus clientes constructores.

## 2. Configuración de la Base de Datos

- **Nombre de la Base de Datos:** alquilartemis
- **Script de Creación de la Base de Datos:** [alquilartemis.sql](path/to/alquilartemis.sql)

## 3. Estructura del Proyecto

```plaintext
fullstack/
|-- apirest/
|   |-- alquilartemis/
|       |-- api-crear-listar.php
|       |-- ...
|-- alquilartemis/
|   |-- index.php
|   |-- ...
```

## 4. API REST

### 4.1 Crear y Listar Alquileres

- **Ruta:** `apirest/alquilartemis/api-crear-listar.php`
- **Descripción:** Este archivo contiene la lógica para crear y listar alquileres.
- **Consumo:** Se debe consumir este servicio desde una aplicación PHP ubicada en la carpeta "alquilartemis".

## 5. Detalles de Alquiler

- Cada alquiler tiene un encabezado que incluye información sobre la constructora cliente, el empleado que genera el alquiler y la fecha.
- El detalle de alquiler registra información como producto/s alquilado/s, obra a la que se alquila, fecha y hora de alquiler, duración, precio/día y total.

## 6. Devoluciones

- Las devoluciones pueden ser totales o parciales del material alquilado.

## 7. Reportes

### 7.1 Total por Cliente

- Reporte del total facturado por cliente, considerando los días alquilados de todos los productos.

### 7.2 Ubicación de Productos Alquilados

- Reporte que muestra la ubicación de los productos alquilados por cliente y obra.

## 8. Gestión de Inventarios

- Las salidas afectan los inventarios (baja de stock) y las entradas (devoluciones) afectan los inventarios (aumento de stock).

## 9. Liquidaciones

- Se genera una liquidación por cliente con información detallada sobre las salidas y devoluciones.
- La liquidación se realiza quincenal o mensual.

## 10. Tablas de la Base de Datos

### 10.1 Salida

- Campos: salida_id, cliente_id, fecha_salida, hora_salida, subtotalPeso, empleado_id, placatransporte, observaciones.

### 10.2 Salida Detalle

- Campos: salida_id, producto_id, obra_id, cantidad_salida, cantidad_propia, cantidad_subalquilada, valorUnidad, fecha_standBye, estado, valorTotal, empleado_id.

### 10.3 Entrada

- Campos: salida_id, entrada_id, empleado_id, cliente_id, fecha_entrada, hora_entrada, observaciones.

### 10.4 Entrada Detalle

- Campos: entrada_id, producto_id, obra_id, entrada_cantidad, entrada_cantidad_propia, entrada_cantidad_subalquilada, estado.

### 10.5 Inventario

- Campos: producto_id, CantidadInicial, CantidadIngresos, CantidadSalidas, CantidadFinal, FechaInventario, TipoOperacion.

## 11. Liquidación de Clientes

- Se debe gestionar la liquidación para cada cliente quincenal o mensual, incluyendo los datos necesarios para el cobro correspondiente.

#### **Esta documentación proporciona una guía general sobre la estructura del proyecto, la base de datos, la API REST y las funcionalidades principales. Asegúrate de ajustar los detalles según las necesidades específicas de tu proyecto y mantenerla actualizada a medida que el proyecto evoluciona.**
