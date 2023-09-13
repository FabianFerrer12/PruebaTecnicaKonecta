--Producto con mas stock
SELECT nombre, MAX(stock) from productos group by nombre ORDER BY nombre DESC LIMIT 1;

--Producto con mas cantidades vendidas
SELECT p.nombre, SUM(v.cantidad_vendida) as cantidadVendidos FROM productos p
INNER JOIN ventas v ON v.id_producto = p.id
GROUP BY p.nombre
ORDER BY SUM (v.cantidad_vendida) DESC LIMIT 1;