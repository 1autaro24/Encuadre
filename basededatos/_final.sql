/*
 Navicat Premium Data Transfer

 Source Server         : efew
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : _final

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 21/12/2021 21:53:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for calificaciones
-- ----------------------------
DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `FK_TRABAJO_CALIFICACION` int UNSIGNED NULL DEFAULT NULL,
  `FK_USUARIO` int UNSIGNED NULL DEFAULT NULL,
  `CALIFICACION` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `CALIFICACION_TRABAJO`(`FK_TRABAJO_CALIFICACION`) USING BTREE,
  INDEX `USUARIO_CALIFICA`(`FK_USUARIO`) USING BTREE,
  CONSTRAINT `CALIFICACION_TRABAJO` FOREIGN KEY (`FK_TRABAJO_CALIFICACION`) REFERENCES `trabajos` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `USUARIO_CALIFICA` FOREIGN KEY (`FK_USUARIO`) REFERENCES `usuarios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of calificaciones
-- ----------------------------
INSERT INTO `calificaciones` VALUES (4, 4, 15, 5);
INSERT INTO `calificaciones` VALUES (9, 9, 15, 4);
INSERT INTO `calificaciones` VALUES (10, 10, 15, 2);
INSERT INTO `calificaciones` VALUES (12, 4, 20, 5);
INSERT INTO `calificaciones` VALUES (13, 8, 20, 4);
INSERT INTO `calificaciones` VALUES (14, 2, 15, 4);
INSERT INTO `calificaciones` VALUES (15, 2, 13, 3);
INSERT INTO `calificaciones` VALUES (16, 6, 13, 3);
INSERT INTO `calificaciones` VALUES (17, 3, 15, 1);

-- ----------------------------
-- Table structure for contacto_agencia
-- ----------------------------
DROP TABLE IF EXISTS `contacto_agencia`;
CREATE TABLE `contacto_agencia`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `UBICACION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TELEFONO` int NULL DEFAULT NULL,
  `MAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `FK_REDES` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `CONTACTO_REDES`(`FK_REDES`) USING BTREE,
  CONSTRAINT `CONTACTO_REDES` FOREIGN KEY (`FK_REDES`) REFERENCES `redes_sociales` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacto_agencia
-- ----------------------------
INSERT INTO `contacto_agencia` VALUES (1, 'Av. Avenue 123', 1148925763, 'abstract@gmail.com', 2);

-- ----------------------------
-- Table structure for contacto_form
-- ----------------------------
DROP TABLE IF EXISTS `contacto_form`;
CREATE TABLE `contacto_form`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `NOMBRE_FORM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `EMAIL_FORM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ASUNTO_FORM` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `MENSAJE_FORM` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `FK_EMPLEADO_MAIL` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `MAIL_EMPLEADO_CONTACTO`(`FK_EMPLEADO_MAIL`) USING BTREE,
  CONSTRAINT `MAIL_EMPLEADO_CONTACTO` FOREIGN KEY (`FK_EMPLEADO_MAIL`) REFERENCES `empleados` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contacto_form
-- ----------------------------
INSERT INTO `contacto_form` VALUES (17, 'pepito', 'pepi@gmail.com', 'diseño', 'quiero un diseño de un teclado', 3);
INSERT INTO `contacto_form` VALUES (18, 'elzapallito', 'elzatodozapallos@hotmail.com', 'branding', 'quiero que me hagan el branding de mi super hiper mega genial empredimiento de venta de todo tipo de zapallos, zapallitos, zuchinis y mas', 1);
INSERT INTO `contacto_form` VALUES (19, 'peppa', 'peppapigoficial@outlook.com', 'animacion de un episodio', 'holaquiero que me animen un episodio de mi serie famosisima peppa pig chau x', 5);
INSERT INTO `contacto_form` VALUES (20, 'sportsfan', 'sortsfan777@yahoo.com', 'sports sports sports', 'hola quiero community manager para que me maneje las redes sociales, soy un influencer deportista', 4);
INSERT INTO `contacto_form` VALUES (21, 'casper ', 'caspereselemejor@yahoo.com', 'pagina web', 'quierp que me diseñen una pagina web dedicada al mejor fanstama amigable que existe', 2);

-- ----------------------------
-- Table structure for empleados
-- ----------------------------
DROP TABLE IF EXISTS `empleados`;
CREATE TABLE `empleados`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `FOTO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `NOMBRE` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `APELLIDO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL DEFAULT NULL,
  `EMAIL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TELEFONO` int NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ID`(`ID`, `EMAIL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of empleados
-- ----------------------------
INSERT INTO `empleados` VALUES (1, 'lautaro.jpg', 'Lautaro', 'Ponce', 'lauti@gmail.com', 1188563200);
INSERT INTO `empleados` VALUES (2, 'sofia.jpg', 'Sofia', 'Rodriguez', 'sofi@gmail.com', 1188773695);
INSERT INTO `empleados` VALUES (3, 'alex.jpg', 'Alex', 'Alexander', 'alex@gmail.com', 1147483647);
INSERT INTO `empleados` VALUES (4, 'sam.jpg', 'Sam', 'Samantha', 'sam@gmail.com', 1197503940);
INSERT INTO `empleados` VALUES (5, 'thomas.jpg', 'Thomas', 'Polo', 'tom@gmail.com', 1149586203);

-- ----------------------------
-- Table structure for redes_sociales
-- ----------------------------
DROP TABLE IF EXISTS `redes_sociales`;
CREATE TABLE `redes_sociales`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `REDES_SOCIALES` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `USERNAME` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of redes_sociales
-- ----------------------------
INSERT INTO `redes_sociales` VALUES (1, 'Instagram', '@asbtract_ig');
INSERT INTO `redes_sociales` VALUES (2, 'Twitter', '@abstract_tw');
INSERT INTO `redes_sociales` VALUES (3, 'Facebook', '@abstract_fb');

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `ID` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `ROL` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES (1, 'ADMIN');
INSERT INTO `roles` VALUES (2, 'USUARIO COMUN');

-- ----------------------------
-- Table structure for servicios
-- ----------------------------
DROP TABLE IF EXISTS `servicios`;
CREATE TABLE `servicios`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `SERVICIO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DESCRIPCION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ICON` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of servicios
-- ----------------------------
INSERT INTO `servicios` VALUES (1, 'Modelado 3D', 'Modelado de objetos, productos, animaciones para todo tipo de necesidad.', 'modelado.png');
INSERT INTO `servicios` VALUES (2, 'Animacion 2D y 3D', 'Motion graphics, edición de video, gráfica para televisión.', 'animacion.png');
INSERT INTO `servicios` VALUES (3, 'Diseño Web', 'Sitios autoadministrables, HTML5, WordPress, banners, newsletters.', 'diseñoweb.png');
INSERT INTO `servicios` VALUES (4, 'Identidad de Marca', 'Diseño de logotipos, identidad visual, papelería, vidrieras y stands.', 'identidadmarca.png');
INSERT INTO `servicios` VALUES (5, 'Community Manager', 'Fan pages, diseño de post, campañas promocionales, todo paratus redes sociales.', 'communitymanager.png');

-- ----------------------------
-- Table structure for trabajos
-- ----------------------------
DROP TABLE IF EXISTS `trabajos`;
CREATE TABLE `trabajos`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `TITULO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `FOTO` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `DESCRIPCION` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `FK_SERVICIO_UTILIZADO` int UNSIGNED NULL DEFAULT NULL,
  `FK_EMPLEADO` int UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `SERVICIO_UTILIZADO`(`FK_SERVICIO_UTILIZADO`) USING BTREE,
  INDEX `EMPLEADO_TRABAJO`(`FK_EMPLEADO`) USING BTREE,
  CONSTRAINT `EMPLEADO_TRABAJO` FOREIGN KEY (`FK_EMPLEADO`) REFERENCES `empleados` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `SERVICIO_UTILIZADO` FOREIGN KEY (`FK_SERVICIO_UTILIZADO`) REFERENCES `servicios` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of trabajos
-- ----------------------------
INSERT INTO `trabajos` VALUES (1, 'RELOJ', 'reloj.jpg', 'Diseño en 3D, de un producto, en este caso un reloj, usando 3DsMax y KeyShot para lograr su calidad visual.', 1, 4);
INSERT INTO `trabajos` VALUES (2, 'MINI ANIMACIÓN', 'after.gif', 'Animacion estilo Motion Graphics para el spot publicitario dela Universidad Pepito de Pepitolandia.', 2, 2);
INSERT INTO `trabajos` VALUES (3, 'ARNET', 'arnet.jpg', 'Diseño de un post creativo y llamativo para la compañia telefonica Arnet, para sus redes sociales, especificamente Twitter.', 5, 5);
INSERT INTO `trabajos` VALUES (4, 'WEBSITE', 'dw.jpg', 'Programacion de una  pagina web responsive con una estetica floral, usando Wordpress para su creacion. ', 3, 4);
INSERT INTO `trabajos` VALUES (5, 'BOOM COFFEE', 'boom.jpg', 'Branding completo para cadena de cafe \'Boom Coffee\', diseño de logo, packaging, merch y mas.', 4, 3);
INSERT INTO `trabajos` VALUES (6, 'AURICULARES', 'auriculares.jpg', 'Diseño en 3D, de un producto, en este caso unos auriculares, usando Cinema4D y Arnold para lograr su calidad visual.', 1, 2);
INSERT INTO `trabajos` VALUES (7, 'ANIMACION CYBORG', '_cyborg.gif', 'Animacion de un personaje cyborg, para el cortometraje de \'Un Cyborg muy malo\' hecho por la increible Elza Pato.', 2, 4);
INSERT INTO `trabajos` VALUES (8, 'CELIVERY', 'celivery.jpg', 'Diseño de un post creativo y llamativo para la tienda de celulares Celivery, para sus redes sociales, especificamente Facebook.', 5, 1);
INSERT INTO `trabajos` VALUES (9, 'WEBSITE', 'dw2.jpg', 'Programacion de una  pagina web responsive con una estetica profesional, usando Wordpress para su creacion. ', 3, 3);
INSERT INTO `trabajos` VALUES (10, 'AFTER CAFÉ', 'cafe.jpg', 'Branding completo para cadena de cafe \'After Cafe\', diseño de logo, packaging, merch y mas.', 4, 5);

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `ID` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `NOMBRE_DE_USUARIO` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EMAIL` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `CONTRASENIA` varchar(65) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `FK_ROL` tinyint UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE,
  INDEX `ROLES_DE_USUARIOS`(`FK_ROL`) USING BTREE,
  CONSTRAINT `ROLES_DE_USUARIOS` FOREIGN KEY (`FK_ROL`) REFERENCES `roles` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (11, 'sofia', 'sofirv1406@gmail.com', '$2y$10$OjijrJhKHoBrq4o0pB39JehZ4JJBLJ8zRBvN9DYEbGHOhlpSqCPwy', 1);
INSERT INTO `usuarios` VALUES (13, 'sofiarodriguez', 'sofirvspam@gmail.com', '$2y$10$04Qy4iLvo.FbMRGjQbVXbeUkkjqRVKlq8MGrpvpP3csdIJEwDcsd2', 2);
INSERT INTO `usuarios` VALUES (14, 'lautaro', 'lauti@gmail.com', '$2y$10$JhCvGf3V1ALeXaTV3w194uEddQTfKaBCrjdn/vVagCDtRaQ5zXXqG', 1);
INSERT INTO `usuarios` VALUES (15, 'sdv', 'andrews_2005@hotmail.com', '$2y$10$jppDh8BaMOtgbJA.DxKsf.yUKTCgHJYqparWRNkGCE.Dz0DKBH9qe', 1);
INSERT INTO `usuarios` VALUES (16, '1234', 'andres_2005@hotmail.com', '$2y$10$m.IxvVSUlgmb10Z7Te5lGeCNAf5ymr7oLVUdDfn7FQD5Gh3EBUiou', 2);
INSERT INTO `usuarios` VALUES (17, '1111', 'sofispam@gmail.com', '$2y$10$SOnsw.S40zwaZ3y1I1ZQ/u0ugpuBM6ub9B4XzQa0MgpYjxmKpW11m', 2);
INSERT INTO `usuarios` VALUES (18, '5678', 'pepito@gmail.com', '$2y$10$r8pXaoBfnlTyGtp0hzC2We4nqgyuZJxkr6avXj9zhu9ihNkI7hPui', 2);
INSERT INTO `usuarios` VALUES (20, '9632', 'so06@gmail.com', '$2y$10$ooD3Dlj3qiuzsjEXtvfcROj8ImK711Mgr6ceyScv4V7Iuhb2NDbjq', 1);
INSERT INTO `usuarios` VALUES (21, 'sofiarodriguez', 'sofia.rodriguez@davinci.edu.ar', '$2y$10$unTvqIRuhS1hRyvApi7nteqO..IIS/5wN8TiS01aLo5YWTfozuDnW', 2);

SET FOREIGN_KEY_CHECKS = 1;
