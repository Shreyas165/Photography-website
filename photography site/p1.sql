CREATE DATABASE portraits;
USE portraits;
CREATE TABLE images (
    id INT IDENTITY(1,1) PRIMARY KEY,
    filename NVARCHAR(255) NOT NULL,
    filepath NVARCHAR(255) NOT NULL
);


