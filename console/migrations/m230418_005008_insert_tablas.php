<?php

use yii\db\Migration;

/**
 * Class m230418_005008_insert_tablas
 */
class m230418_005008_insert_tablas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("

        -- 
-- Dumping data for table region
--
INSERT INTO region VALUES
(1, 'Region 1'),
(2, 'Región 2');

-- 
-- Dumping data for table comuna
--
INSERT INTO comuna VALUES
(1, 1, 'Comuna 1'),
(2, 1, 'Comuna 2'),
(3, 1, 'Comuna 3'),
(4, 2, 'Comuna 4');


-- 
-- Dumping data for table user_etapa
--
INSERT INTO user_etapa VALUES
(1, 21, 1, 2, 'FELICIDADES! Se ha inscrito en nuestro programa Paneles Solares (instalacion)', '2023-04-18', '2023-04-18'),
(2, 3, 1, 4, 'FELICIDADES! Se ha inscrito en nuestro programa Paneles Solares (instalacion)', '2023-04-17', NULL),
(3, 4, 1, 1, 'FELICIDADES! Se ha inscrito en nuestro programa Paneles Solares (instalacion)', '2023-04-18', NULL),
(4, 12, 1, 1, 'FELICIDADES! Se ha inscrito en nuestro programa Paneles Solares (instalacion)', '2023-04-18', NULL),
(5, 22, 1, 1, 'FELICIDADES! Se ha inscrito en nuestro programa Paneles Solares (instalacion)', '2023-04-18', NULL);


-- 
-- Dumping data for table tipo
--
INSERT INTO tipo VALUES
(1, 'Administrador'),
(2, 'Empresa'),
(3, 'Solicitante');

-- 
-- Dumping data for table programa
--
INSERT INTO programa VALUES
(1, 'Paneles Solares (instalacion)', '2023-04-17', '2023-05-17');

-- 
-- Dumping data for table etapa
--
INSERT INTO etapa VALUES
(1, 1, 'Fase I', '2023-04-17', '2023-04-20', 'Esta es la fase del registro de los usuarios'),
(2, 1, 'Fase II', '2023-04-21', '2023-04-25', 'recaudacion de archivos'),
(3, 1, 'Fase III', '2023-04-26', '2023-04-30', 'Pago de cuota para tener acceso al proyecto');

-- 
-- Dumping data for table empresa_comuna
--
INSERT INTO empresa_comuna VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 3),
(4, 2, 4);

-- 
-- Dumping data for table empresa
--
INSERT INTO empresa VALUES
(1, 123456789, 'Empresa 1'),
(2, 222222222, 'Empresa 2');


-- Dumping data for table auth_item
--
INSERT INTO auth_item VALUES
('/*', 2, NULL, NULL, NULL, 1681835741, 1681835741),
('/debug/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/default/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/user/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/empresa/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/etapa/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/action', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/diff', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/preview', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/gii/default/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/programa/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/assignment/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/assignment/assign', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/assignment/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/assignment/revoke', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/assignment/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/default/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/default/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/menu/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/assign', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/remove', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/permission/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/assign', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/remove', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/role/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/assign', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/refresh', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/route/remove', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/rule/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/activate', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/change-password', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/login', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/logout', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/request-password-reset', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/reset-password', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/signup', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/rbac/user/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/about', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/captcha', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/contact', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/error', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/language', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/login', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/logout', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/request-password-reset', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/resend-verification-email', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/reset-password', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/signup', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/upload', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/site/verify-email', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user-etapa/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/*', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/create', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/delete', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/index', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/password', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/send', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/update', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('/user/view', 2, NULL, NULL, NULL, 1681835505, 1681835505),
('Administrador', 1, 'Acceso total al sistema', NULL, NULL, NULL, 1681835914),
('Empresa', 1, 'Acceso a empresa,usuarios que esten relacionados a sus comunas', NULL, NULL, 1681835788, 1681835788),
('rbac', 2, 'modulo RBAC', NULL, NULL, NULL, 1681835650),
('Solicitante', 1, 'solo ve info de su usuario y etapa', NULL, NULL, 1681835878, 1681835878);


        INSERT INTO auth_item_child VALUES
        ('Administrador', '/empresa/create'),
        ('Administrador', '/empresa/index'),
        ('Empresa', '/empresa/index'),
        ('Administrador', '/empresa/update'),
        ('Administrador', '/empresa/view'),
        ('Empresa', '/empresa/view'),
        ('Administrador', '/etapa/create'),
        ('Administrador', '/etapa/index'),
        ('Administrador', '/etapa/update'),
        ('Administrador', '/etapa/view'),
        ('Administrador', '/gii/*'),
        ('Administrador', '/programa/create'),
        ('Administrador', '/programa/index'),
        ('Administrador', '/programa/update'),
        ('Administrador', '/programa/view'),
        ('rbac', '/rbac/*'),
        ('Administrador', '/user-etapa/index'),
        ('Empresa', '/user-etapa/index'),
        ('Solicitante', '/user-etapa/index'),
        ('Administrador', '/user-etapa/update'),
        ('Administrador', '/user-etapa/view'),
        ('Empresa', '/user-etapa/view'),
        ('Solicitante', '/user-etapa/view'),
        ('Administrador', '/user/create'),
        ('Administrador', '/user/index'),
        ('Empresa', '/user/index'),
        ('Solicitante', '/user/index'),
        ('Administrador', '/user/password'),
        ('Empresa', '/user/password'),
        ('Solicitante', '/user/password'),
        ('Administrador', '/user/update'),
        ('Administrador', '/user/view'),
        ('Empresa', '/user/view');
        
-- 
-- Dumping data for table user
--
INSERT INTO user VALUES
(1, 'admin', 'Jiuly', 'Rojas', 'CW6QlYw851qDB4HZgC88mOrNAvyGwfeA', '$2y$13\$EdZq3doKmVlKxZV5YmC0aeA8igc4Nw7et20kdeeqT0vbuspW1VWvO', NULL, 'jiuly256@gmail.com', 10, 1580434012, 1681834923, NULL, '18043559', 1, NULL, NULL, NULL),
(3, 'lfanza', 'Luis', 'Fanza', 'XdB0sl_7FZ_vG3_VcnIstKOJ0jtdeJ28', '$2y$13\$Cm036ofIgZ8OIsc7YL53AedZBtNLHhkSFnTRj/NX1sT5Y.AXqgWLu', NULL, 'luisfanza@gmail.com', 10, 1681838073, 1681838073, 'V5RFqMgRRW_qjQ3mJ-c4Zt6Z5vOo_VdX_1681838073', '1548762', 3, 1, 1, NULL),
(4, 'pperez', 'Pedro', 'Perez', 'm3KzVZiGjhbSOIBDDB3uyILPmFnE-x_B', '$2y$13\$zBtLH33m23kK1qecNEOkwOUhprsdFs0TbqEiB5H6TS62ZubOEYkKW', NULL, 'perezg@gmail.com', 10, 1681838177, 1681840744, 'QaixqGOZE781xB-vk02WYCiLuHBfnM-B_1681838177', '1515185', 3, 4, 1, NULL),
(12, 'kdiaz', 'Karla', 'Diaz', 'oVPzXXp7nxmQQP6qrnUzA6EkhZWsIutu', '$2y$13\$Qdew9YoGwjK/VtgRtFfsmewrK4ypuKD3t1W7It8FzxX6F5ymYTjs.', NULL, 'kdiaz@gmail.com', 10, 1681838948, 1681838948, 'K4NYLVG31ZB6gm7Pl2-6HjsKbSFXGDDw_1681838948', '524163854', 3, 2, 1, NULL),
(15, 'empresa1', 'Carlos', 'Martinez', 'oettItJ6HU6RtylIrC4EMkyD_soOO2jZ', '$2y$13\$QZ0TPADnpt2KuTgYX/qIwufom3ghDZ1.24bN55pVdcp5HV/TWet/G', NULL, 'cmartinez@gmail.com', 10, 1681840347, 1681852215, '5_uynGkSauu_ps1Ee3LvGw_NyPkdkqwN_1681840347', '253614789', 2, NULL, NULL, 1),
(21, 'hfernandez', 'Hector', 'Hernandez', 'fri3bSLVA69txU-npNCBNCu5Q4QHOXG9', '$2y$13\$leK48Pn8QEhQpuGURADF/eRFECNVjA3/brSika0bG3a0xrNRSBZUW', NULL, 'hhernandez@gmail.com', 10, 1681843626, 1681843626, 'e2VqpJys4q4oPtatEP6kLnScSnMdrtqT_1681843626', '1515185', 3, 4, 1, NULL),
(22, 'jhernandez', 'Julia', 'Hernandez', 'WnvjKgqIg5w34Gkh4h1UEgR_gKgnrvFT', '$2y$13$7PXt8Dh7FZrlsTbYr0W7v.R1DqNtluIb8T3n/nPq7EvghtYm0lK/e', NULL, 'jhernandez3@gmail.com', 10, 1681844789, 1681844789, 'yWvTtFNsoaBWqVz4EGjyPdOkGjjVk16U_16818447', '2567851', 3, 1, 1, NULL);

    
        -- 

        -- 
        -- Dumping data for table auth_assignment
        --
        INSERT INTO auth_assignment VALUES
        ('Administrador', '1', 1681835923),
        ('Empresa', '15', 1681840347),
        ('rbac', '1', 1681840347),
        ('Solicitante', '12', 1681838948),
        ('Solicitante', '21', 1681843626),
        ('Solicitante', '22', 1681844789),
        ('Solicitante', '3', 1681841187),
        ('Solicitante', '4', 1681841228);
        
        
        
        ");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230418_005008_insert_tablas cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230418_005008_insert_tablas cannot be reverted.\n";

        return false;
    }
    */
}
