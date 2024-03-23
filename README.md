# pipeline
A simple ETL pipeline using PostgreSQL &amp; Cassandra
All data is randomly generated
# Quick Setup (Single Node)

```shell script
# Pull postgres image
docker pull postgres:latest

# Decompress customers_backup.sql.xz
xz -dk customers_backup.sql.xz

# Build new docker image using postgres:latest image
docker build -t etl_img .

# Start container
docker compose -f conf/postgres.yaml up

# Access container via bash
docker exec -it etl_client_container bash

# Restore customers database
psql -U dba -d customers -f backup/customers_backup.sql

# Pull cassandra image
docker pull cassandra:latest

# Start cassandra container
docker compose -f conf/cass.yaml up

# Access cassandra container via bash
docker exec -it etl_cassandra_container bash

# Access cassandra CLI
cqlsh
```

```sql
-- Create keyspace to store data from client
CREATE KEYSPACE IF NOT EXISTS customerspace
  WITH replication = {'class': 'SimpleStrategy', 'replication_factor': 1};

USE customerspace;

CREATE TABLE IF NOT EXISTS customers (
  order_id TEXT PRIMARY KEY,
  firstname TEXT,
  lastname TEXT,
  areacode TEXT,
  phone TEXT,
  email TEXT,
  total INT
);
```


