buat database terlebih dahulu

```sql
CREATE DATABASE data_iot;
use data_iot;
```
```sql
CREATE TABLE device_status (
    id INT PRIMARY KEY AUTO_INCREMENT,
    updated TIMESTAMP,
    data1 TEXT,
    data2 TEXT,
    data3 TEXT,
    data4 TEXT
);
```
```sql
CREATE TABLE device_log (
    lid INT PRIMARY KEY AUTO_INCREMENT,
    id INT NOT NULL,
    created TIMESTAMP,
    data1 TEXT,
    data2 TEXT,
    data3 TEXT,
    data4 TEXT
);
```

```sql
INSERT INTO device_status () VALUES (),(),(),(),();
```