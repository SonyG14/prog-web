--База даних lab_8

CREATE DATABASE IF NOT EXISTS lab_8;
use lab_8;

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_number VARCHAR(255) NOT NULL,
    weight FLOAT NOT NULL,
    city_ref VARCHAR(255) NOT NULL,
    delivery_type ENUM('Відділення', 'Поштомат', 'Пункт видачі') NOT NULL,
    branch_ref VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);