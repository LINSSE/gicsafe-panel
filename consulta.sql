Estado del registro digital

SELECT id, d1,d2,d3, (d1 * 4 + d2 * 2 + d3 * 1) as binario
FROM `registrodigital` 
where device_id = 9745721
ORDER BY `id`  DESC