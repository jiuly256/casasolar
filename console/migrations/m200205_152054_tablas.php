<?php

use yii\db\Migration;

/**
 * Class m200205_152054_tablas
 */
class m200205_152054_tablas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("
        
        --
        -- Create table `region`
        --
        CREATE TABLE region (
          id INT NOT NULL AUTO_INCREMENT,
          nombre VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create table `comuna`
        --
        CREATE TABLE comuna (
          id INT NOT NULL AUTO_INCREMENT,
          id_region INT DEFAULT NULL,
          nombre VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create foreign key
        --
        ALTER TABLE comuna 
          ADD CONSTRAINT FK_comuna_id_region FOREIGN KEY (id_region)
            REFERENCES region(id);
        
        --
        -- Create table `programa`
        --
        CREATE TABLE programa (
          id INT NOT NULL AUTO_INCREMENT,
          descripcion VARCHAR(255) NOT NULL,
          fecha_inicio DATE DEFAULT NULL,
          fecha_vencimiento DATE DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create foreign key
        --
        ALTER TABLE user 
          ADD CONSTRAINT FK_user_id_comuna FOREIGN KEY (id_comuna)
            REFERENCES comuna(id);
        
        --
        -- Create foreign key
        --
        ALTER TABLE user 
          ADD CONSTRAINT FK_user_id_programa FOREIGN KEY (id_programa)
            REFERENCES programa(id);
        
        --
        -- Create table `etapa`
        --
        CREATE TABLE etapa (
          id INT NOT NULL AUTO_INCREMENT,
          id_programa INT NOT NULL,
          descripcion VARCHAR(255) DEFAULT NULL,
          fecha_inicio DATE NOT NULL,
          fecha_vencimiento DATE NOT NULL,
          observaciones TEXT DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create foreign key
        --
        ALTER TABLE etapa 
          ADD CONSTRAINT FK_etapa_id_programa FOREIGN KEY (id_programa)
            REFERENCES programa(id);
        
        --
        -- Create table `user_etapa`
        --
        CREATE TABLE user_etapa (
          id INT NOT NULL AUTO_INCREMENT,
          id_user INT DEFAULT NULL,
          id_etapa INT DEFAULT NULL,
          status INT DEFAULT NULL COMMENT '1. iniciada, 2 en espera de recudos, 3 verificado, 4 rechazado',
          observaciones TEXT DEFAULT NULL,
          fecha_creacion DATE DEFAULT NULL,
          fecha_actualizacion DATE DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        CHECKSUM = 0,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create table `empresa_comuna`
        --
        CREATE TABLE empresa_comuna (
          id INT NOT NULL AUTO_INCREMENT,
          id_empresa INT NOT NULL,
          id_comuna INT NOT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        CHECKSUM = 0,
        COLLATE utf8mb4_0900_ai_ci;
        
        --
        -- Create index `FK_empresa_id_comuna` on table `empresa_comuna`
        --
        ALTER TABLE empresa_comuna 
          ADD INDEX FK_empresa_id_comuna(id_comuna);
        
        --
        -- Create table `empresa`
        --
        CREATE TABLE empresa (
          id INT NOT NULL AUTO_INCREMENT,
          rut INT DEFAULT NULL,
          razon_social VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;

        CREATE TABLE tipo (
          id INT NOT NULL,
          nombre VARCHAR(255) DEFAULT NULL,
          PRIMARY KEY (id)
        )
        ENGINE = INNODB,
        CHARACTER SET utf8mb4,
        COLLATE utf8mb4_0900_ai_ci;

        CREATE TABLE auth_item (
          name VARCHAR(64) NOT NULL,
          type SMALLINT NOT NULL,
          description TEXT DEFAULT NULL,
          rule_name VARCHAR(64) DEFAULT NULL,
          data BLOB DEFAULT NULL,
          created_at INT DEFAULT NULL,
          updated_at INT DEFAULT NULL,
          PRIMARY KEY (name)
        )
        ENGINE = INNODB,
        AVG_ROW_LENGTH = 963,
        CHARACTER SET utf8mb3,
        COLLATE utf8mb3_unicode_ci;
        
        ALTER TABLE auth_item 
          ADD INDEX `idx-auth_item-type`(type);

          CREATE TABLE auth_rule (
            name VARCHAR(64) NOT NULL,
            data BLOB DEFAULT NULL,
            created_at INT DEFAULT NULL,
            updated_at INT DEFAULT NULL,
            PRIMARY KEY (name)
          )
          ENGINE = INNODB,
          CHARACTER SET utf8mb3,
          COLLATE utf8mb3_unicode_ci;

          CREATE TABLE menu (
            id INT NOT NULL AUTO_INCREMENT,
            name VARCHAR(128) NOT NULL,
            parent INT DEFAULT NULL,
            route VARCHAR(255) DEFAULT NULL,
            `order` INT DEFAULT NULL,
            data BLOB DEFAULT NULL,
            PRIMARY KEY (id)
          )
          ENGINE = INNODB,
          CHARACTER SET utf8mb3,
          COLLATE utf8mb3_general_ci;
          
          ALTER TABLE menu 
            ADD CONSTRAINT menu_ibfk_1 FOREIGN KEY (parent)
              REFERENCES menu(id) ON DELETE SET NULL ON UPDATE CASCADE;

              
        
        ALTER TABLE auth_item 
        ADD CONSTRAINT auth_item_ibfk_1 FOREIGN KEY (rule_name)
        REFERENCES auth_rule(name) ON DELETE SET NULL ON UPDATE CASCADE;


        CREATE TABLE auth_item_child (
          parent VARCHAR(64) NOT NULL,
          child VARCHAR(64) NOT NULL,
          PRIMARY KEY (parent, child)
        )
        ENGINE = INNODB,
        AVG_ROW_LENGTH = 780,
        CHARACTER SET utf8mb3,
        COLLATE utf8mb3_unicode_ci;
        
        ALTER TABLE auth_item_child 
          ADD CONSTRAINT auth_item_child_ibfk_1 FOREIGN KEY (parent)
            REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE;

        CREATE TABLE auth_assignment (
          item_name VARCHAR(64) NOT NULL,
          user_id VARCHAR(64) NOT NULL,
          created_at INT DEFAULT NULL,
          PRIMARY KEY (item_name, user_id)
        )
        ENGINE = INNODB,
        AVG_ROW_LENGTH = 3276,
        CHARACTER SET utf8mb3,
        COLLATE utf8mb3_unicode_ci;
        
        ALTER TABLE auth_assignment 
          ADD INDEX `idx-auth_assignment-user_id`(user_id);
        
        ALTER TABLE auth_assignment 
          ADD CONSTRAINT auth_assignment_ibfk_1 FOREIGN KEY (item_name)
            REFERENCES auth_item(name) ON DELETE CASCADE ON UPDATE CASCADE;
    
       
      
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200205_152054_tablas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200205_152054_tablas cannot be reverted.\n";

        return false;
    }
    */
}
