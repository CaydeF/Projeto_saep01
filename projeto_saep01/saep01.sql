CREATE DATABASE saep01;
USE saep01;

CREATE TABLE Usuarios
(      Codigo int primary key auto_increment not null,
       Nome varchar(45),
       Email varchar(50)
       );
       
CREATE TABLE Tarefas
(      Codigo int primary key auto_increment not null,
       Setor varchar(45),
       Prioridade varchar(25),
       Descricao varchar(45),
       Stats varchar(20));
       
ALTER TABLE Tarefas
ADD COLUMN usu_Codigo INT,  -- You need to specify the column type, such as INT
ADD CONSTRAINT fk_usu_Codigo FOREIGN KEY (usu_Codigo) REFERENCES Usuarios(Codigo);
