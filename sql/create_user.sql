set @User = 'SomeUser';
set @Pass = 'SomePassword';
set @Database = 'SomeDatabase';
set @Host = 'localhost';
set @s=CONCAT("CREATE USER '",@User, "'@'",@Host,"' IDENTIFIED BY '",@Pass,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
set @s=CONCAT("GRANT SELECT (",
     "Host, User, Select_priv, Insert_priv, Update_priv, Delete_priv,",
     "Create_priv, Drop_priv, Reload_priv, Shutdown_priv, Process_priv,",
     "File_priv, Grant_priv, References_priv, Index_priv, Alter_priv,",
     "Show_db_priv, Super_priv, Create_tmp_table_priv, Lock_tables_priv,",
     "Execute_priv, Repl_slave_priv, Repl_client_priv",
     ") ON mysql.user TO '",@User,"'@'",@Host,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
set @s=CONCAT("GRANT SELECT ON mysql.db TO '",@User,"'@'",@Host,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
set  @s=CONCAT("GRANT SELECT ON mysql.host TO '",@User,"'@'",@Host,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
set @s=CONCAT("GRANT SELECT (Host, Db, User, Table_name, Table_priv, Column_priv)",
	"ON mysql.tables_priv TO '",@User,"'@'",@Host,"'");
PREPARE stmt FROM @s;
EXECUTE stmt;
   SET @s=CONCAT("CREATE DATABASE ",@Database);
   PREPARE stmt FROM @s;
   EXECUTE stmt;
   DEALLOCATE PREPARE stmt;
    SET @s=CONCAT("GRANT ALL ON ",@Database,".* TO '",@User,"'@'",@Host,"'");
    PREPARE stmt FROM @s;
    EXECUTE stmt;
    DEALLOCATE PREPARE stmt;

