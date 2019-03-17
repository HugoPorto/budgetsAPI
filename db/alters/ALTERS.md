### 11/04/2018 - Adição do campo passapp na tabela usuários para uso no aplicativo.
ALTER TABLE `harpia_db_d`.`usuarios` 
ADD COLUMN `passapp` VARCHAR(45) NULL DEFAULT 'CROSC123' AFTER `modified`;
###