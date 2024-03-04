#!/bin/bash

# Pull data from postgres
docker exec -it etl_client_container /bin/bash -c "psql -U dba -d customers -c \"\COPY (SELECT * from customers limit 5) TO './migrate.csv' WITH DELIMITER ',' CSV HEADER;\""

docker cp etl_client_container:/migrate.csv ./migrate.csv

# Load into cassandra
docker cp ./migrate.csv etl_cassandra_container:/migrate.csv

docker exec -i etl_cassandra_container cqlsh -e "USE customerspace; COPY customers (order_id, firstname, lastname, areacode, phone, email, total) FROM '/migrate.csv' WITH HEADER = true;"

# Clean up
rm ./migrate.csv
