create database forgot_password
use forgot_password
CREATE TABLE passwords (
    id INT IDENTITY(1,1) PRIMARY KEY,
    password NVARCHAR(255) NOT NULL,
    is_current BIT DEFAULT 0
);



drop table Admin
select * from passwords