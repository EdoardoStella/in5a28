-- seleziona tutte le località in ordine alfabetico per nome.
SELECT *
FROM ES_localita
ORDER BY Nome ASC;

-- Seleziona tutte le località con CAP uguale a 46020
SELECT *
FROM ES_localita
WHERE Cap='46020'
ORDER BY Nome ASC;

-- Seleziona tutti i clienti mostrando il paese di residenza.
SELECT ES_cliente.*, ES_localita.Nome
FROM ES_cliente, ES_localita
WHERE ES_cliente.idLocalita=ES_localita.Id;
