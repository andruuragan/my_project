import os
import sqlite3
import mysql.connector

MYSQL_CONFIG = {
    "host": "155.248.237.212",
    "user": "app_user",
    "password": "sendik1981",
    "database": "first_bd",
    "charset": "utf8mb4"
}

SQLITE_DB = "catalog.db"

# Удаляем старую базу
if os.path.exists(SQLITE_DB):
    os.remove(SQLITE_DB)

print("Подключение к MySQL...")

mysql_conn = mysql.connector.connect(**MYSQL_CONFIG)
mysql_cursor = mysql_conn.cursor()

print("Создание SQLite...")

sqlite_conn = sqlite3.connect(SQLITE_DB)
sqlite_cursor = sqlite_conn.cursor()

sqlite_cursor.execute("""
CREATE TABLE catalog (
    id INTEGER PRIMARY KEY,
    name TEXT NOT NULL,
    type TEXT,
    thickness TEXT,
    grade INTEGER,
    diameter TEXT,
    casing TEXT,
    chimneyType TEXT,
    price REAL
)
""")

print("Чтение данных...")

mysql_cursor.execute("""
SELECT
id,
name,
type,
thickness,
grade,
diameter,
casing,
chimneyType,
price
FROM catalog
ORDER BY id
""")

rows = mysql_cursor.fetchall()

print(f"Получено {len(rows)} товаров")

sqlite_cursor.executemany("""
INSERT INTO catalog
(id,name,type,thickness,grade,diameter,casing,chimneyType,price)
VALUES (?,?,?,?,?,?,?,?,?)
""", rows)

sqlite_conn.commit()

sqlite_cursor.execute("SELECT COUNT(*) FROM catalog")
count = sqlite_cursor.fetchone()[0]

print("-----------------------------")
print(f"Перенесено: {count}")
print("-----------------------------")

sqlite_conn.close()
mysql_cursor.close()
mysql_conn.close()

print("Готово!")
