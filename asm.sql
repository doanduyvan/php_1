-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: localhost    Database: asm_php1
-- ------------------------------------------------------
-- Server version	8.0.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chitietgiohang`
--

DROP TABLE IF EXISTS `chitietgiohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 /*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietgiohang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `soluong` int DEFAULT NULL,
  `id_sanpham` int DEFAULT NULL,
  `id_giohang` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_chitietgiohang_giohang_up` (`id_giohang`),
  KEY `id_sanpham` (`id_sanpham`),
  CONSTRAINT `chitietgiohang_ibfk_1` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chitietgiohang_ibfk_2` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_chitietgiohang_giohang_up` FOREIGN KEY (`id_giohang`) REFERENCES `giohang` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietgiohang`
--

LOCK TABLES `chitietgiohang` WRITE;
/*!40000 ALTER TABLE `chitietgiohang` DISABLE KEYS */;
INSERT INTO `chitietgiohang` VALUES (67,1,27,10),(68,1,28,10),(69,1,29,11),(72,1,30,9),(76,1,28,9);
/*!40000 ALTER TABLE `chitietgiohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmucsp`
--

DROP TABLE IF EXISTS `danhmucsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmucsp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmucsp`
--

LOCK TABLES `danhmucsp` WRITE;
/*!40000 ALTER TABLE `danhmucsp` DISABLE KEYS */;
INSERT INTO `danhmucsp` VALUES (1,'Máy tính'),(2,'Điện thoại'),(3,'Tablet'),(4,'Phụ Kiện'),(5,'Máy ảnh');
/*!40000 ALTER TABLE `danhmucsp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `giohang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `soluong` int DEFAULT NULL,
  `id_taikhoan` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `giohang_taikhoan_ondel` (`id_taikhoan`),
  CONSTRAINT `giohang_taikhoan_ondel` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (9,0,80),(10,0,81),(11,0,82);
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hinhsp`
--

DROP TABLE IF EXISTS `hinhsp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hinhsp` (
  `id` int NOT NULL AUTO_INCREMENT,
  `hinh` varchar(200) DEFAULT NULL,
  `id_sanpham` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_hinhsp_sanpham` (`id_sanpham`),
  CONSTRAINT `FK_hinhsp_sanpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hinhsp`
--

LOCK TABLES `hinhsp` WRITE;
/*!40000 ALTER TABLE `hinhsp` DISABLE KEYS */;
INSERT INTO `hinhsp` VALUES (24,'h5.jpg',24),(25,'h4.png',24),(26,'h3.png',24),(27,'2.jpg',24),(28,'h9.png',25),(29,'h8.jpg',25),(30,'h7.jpg',25),(31,'h6.jpg',25),(32,'h13.jpg',26),(33,'h12.jpg',26),(34,'h11.jpg',26),(35,'h10.jpg',26),(36,'thumb_11-ProMAX_2.jpg',27),(37,'thumb_11-ProMAX_1.jpg',27),(38,'thumb_11-ProMAX_3.jpg',27),(39,'thumb_11-ProMAX_4.jpg',27),(40,'avt-xperia-1-mark-3-den.png',28),(41,'avt-xperia-1-mark-3-tim.png',28),(42,'avt-xperia-1-mark-3-xam.png',28),(43,'HP-240-G8-2_2_1_2.jpg',29),(44,'HP-240-G8-3_1_1_2.jpg',29),(45,'HP-240-G8.jpg',29),(46,'HP-240-G8-1_1_1_2.jpg',29),(47,'macbook-air-2023-silver.jpg',30),(48,'macbook-air-2023-gray.jpg',30),(49,'macbook_air_m2_2023-gold.jpg',30),(50,'macbook-air-2023-mignight.jpg',30),(51,'61150_laptop_dell_vostro_5515_52.jpg',31),(52,'61150_laptop_dell_vostro_5515_53.jpg',31),(53,'61150_laptop_dell_vostro_5515_55.jpg',31),(54,'61150_laptop_dell_vostro_5515_54.jpg',31),(55,'HP-240-G8-5_1.jpg',32),(56,'HP-240-G8 (1).jpg',32),(57,'HP-240-G8-1-1.jpg',32),(58,'HP-240-G8-2_1.jpg',32);
/*!40000 ALTER TABLE `hinhsp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) DEFAULT NULL,
  `giagoc` int DEFAULT NULL,
  `giakm` int DEFAULT NULL,
  `motangan` text,
  `motadai` longtext,
  `soluong` int DEFAULT NULL,
  `hinh` varchar(200) DEFAULT NULL,
  `id_danhmucsp` int DEFAULT NULL,
  `masp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `masp` (`masp`),
  KEY `FK_sanpham_danhmucsp` (`id_danhmucsp`),
  CONSTRAINT `FK_sanpham_danhmucsp` FOREIGN KEY (`id_danhmucsp`) REFERENCES `danhmucsp` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (24,'iPhone 14 Pro Max 128GB cũ đẹp 99%',33990000,21490000,'Máy cũ đẹp như mới, hình thức đẹp 99% chưa sửa chữa','iPhone 14 Pro Max cũ - Cam kết không zin tặng máy, iPhone 14 Pro Max cũ là một trong những sản phẩm smartphone được nhiều người quan tâm hiện nay. Nếu bạn đang tìm kiếm thông tin về sản phẩm này, bài viết này sẽ giúp bạn hiểu rõ hơn về iPhone 14 Pro Max cũ, từ giá cả, chất lượng sản phẩm, đánh giá của người dùng và nơi mua hàng đảm bảo chất lượng. Hiện tại iPhone 14 Pro Max cũ giá rẻ đang bán trên thị trường chủ yếu là hàng chính hãng VNA thu mua lại từ khách hàng và còn bảo hành chính hãng.\r\n\r\nKhi mua iPhone 14 Pro Max 128G cũ giá rẻ tại Clickbuy quý khách sẽ cam kết bằng những hình ảnh, giấy tờ được thể hiện trên website và tại các cửa hàng.\r\n\r\nMáy hình thức đẹp 99%, như mớ!\r\n\r\nBảo hành 1 đổi 1, Hỗ trợ rơi vỡ, vào nước 12 tháng.\r\nCam kết máy nguyên bản, chưa sửa chữa.\r\nCam kết máy chưa ép kính, chưa thay vỏ.\r\nPin zin theo máy hoặc đã được thay pin mới, Pin mới sẽ tính giá bằng pin zin 8X.\r\nMỗi máy bán ra Clickbuy đều có giấy tờ cam kết chất lượng sản phẩm, nếu phát hiện máy bán ra Không đúng cam kết sẽ được tặng máy!',100,'61150_laptop_dell_vostro_5515_55.jpg',2,'DT01'),(25,'iPhone 14 128GB Cũ đẹp 99%',17990000,14190000,'Máy hình thức đẹp 99%, như mới\r\nBảo hành 1 đổi 1, Hỗ trợ rơi vỡ, vào nước 12 tháng\r\nCam kết máy nguyên bản, chưa sửa chữa\r\nCam kết máy chưa ép kính, chưa thay vỏ\r\nPin zin theo máy hoặc đã được thay pin mới, Pin mới sẽ tính giá bằng pin zin 8X\r\nMỗi máy bán ra Clickbuy đều có giấy tờ cam kết chất lượng sản phẩm, nếu phát hiện máy bán ra không đúng cam kết sẽ tặng máy','iPhone 14 Cũ đẹp 99% - Cam kết không zin tặng máy\r\n\r\niPhone 14 là một trong những dòng sản phẩm điện thoại thông minh nổi tiếng của Apple, một thương hiệu công nghệ hàng đầu trên thế giới. Với tính năng vượt trội, thiết kế đẹp mắt và hiệu suất mạnh mẽ, iPhone 14 đã thu hút sự quan tâm của rất nhiều người dùng trên toàn cầu. Tuy nhiên, với giá cả cao và sự ra mắt liên tục của các phiên bản mới, việc sở hữu một chiếc iPhone 14 mới là điều không phải ai cũng đủ điều kiện. Vì vậy, việc lựa chọn mua iPhone 14 cũ giá rẻ là một lựa chọn phổ biến cho nhiều người dùng. iPhone 14 là sản phẩm mới nhất của Apple năm 2022. Hiện tại giá iphone 14 cũ rẻ hơn máy mới 3-4 triệu, trong khi đa số các máy iphone 14 cũ đều mới được sử dụng trong thời gian ngắn. Nên đây là sản phẩm rất đáng mua. Nguồn gốc iphone 14 cũ hiện tại đều là thu mua của người dùng, hình thức còn đẹp như mới.',800,'h6.jpg',2,'TD02'),(26,'iPhone 12 Pro Max 128GB cũ đẹp 99%',18990000,14190000,'Máy cũ nguyên bản, chưa sửa chữa hình thức đẹp 99% như mới. Cam kết không bán hàng thay vỏ, ép kính. Máy trần chưa phụ kiện','Khi mua iPhone 12 Pro Max cũ sẽ được Clickbuy cam kết như thế nào?\r\nHiện tại tính tới thời điểm này trên thị trường đã không còn iPhone 12 Pro Max hàng chính hãng, mà thay vào đó là chỉ còn những dòng máy iPhone 12 Pro Max cũ với chất lượng và hình thức khác nhau. Đây là những cam kết bằng những hình ảnh, giấy tờ được thể hiện trên website và tại các cửa hàng của Clickbuy.\r\n\r\nMáy hình thức đẹp 99%, như mớ!\r\nBảo hành 1 đổi 1, Hỗ trợ rơi vỡ, vào nước 12 tháng.\r\nCam kết máy nguyên bản, chưa sửa chữa.\r\nCam kết máy chưa ép kính, chưa thay vỏ.\r\nMỗi sản phẩm bán ra Clickbuy sẽ có video mở máy đầy đủ\r\nPin zin theo máy hoặc đã được thay pin mới, Pin mới sẽ tính giá bằng pin zin 8X.\r\nMỗi máy bán ra Clickbuy đều có giấy tờ cam kết chất lượng sản phẩm, nếu phát hiện máy bán ra Không đúng cam kết sẽ được tặng máy!\r\nĐây là hình ảnh Giấy tờ cam kết rõ ràng khi khách hàng mua hàng tại Clickbuy!',120,'h12.jpg',4,'TD03'),(27,'iPhone 11 Pro Max 64GB cũ đẹp 99%',20400000,10590000,'Máy cũ nguyên bản, chưa sửa chữa hình thức đẹp 99% như mới. Cam kết không bán hàng thay vỏ, ép kính. Máy trần chưa phụ kiện','Mua iPhone 11 Pro Max cũ tại Clickbuy, khách hàng khi mua sẽ luôn được hài lòng!\r\n\r\nHiện tại tính tới thời điểm này trên thị trường đã không còn iPhone 11 Pro Max hàng chính hãng, mà thay vào đó là chỉ còn những dòng máy iPhone 11 Pro Max cũ với chất lượng, bảo hành và giá cả khác nhau tùy thuộc vào những nơi bán khác nhau. Mua iPhone 11 Pro Max cũ được Clickbuy cam kết như thế nào. Đây là những cam kết bằng những hình ảnh, giấy tờ được thể hiện trên website và tại các cửa hàng.\r\n\r\nMáy hình thức đẹp 99%, như mớ!\r\nBảo hành 1 đổi 1, Hỗ trợ rơi vỡ, vào nước 12 tháng.\r\nCam kết máy nguyên bản, chưa sửa chữa.\r\nCam kết máy chưa ép kính, chưa thay vỏ.\r\nPin zin theo máy hoặc đã được thay pin mới, Pin mới sẽ tính giá bằng pin zin 8X.\r\nMỗi máy bán ra Clickbuy đều có giấy tờ cam kết chất lượng sản phẩm, nếu phát hiện máy bán ra Không đúng cam kết sẽ được tặng máy!\r\nĐiện thoại iPhone 11 Pro max cũ, zin nguyên bản, không zin tặng máy.\r\nVới mỗi sản phẩm iPhone 11 Pro max cũ bán ra thị trường, clickbuy đều xuất kèm biên bản cam kết chất lượng theo từng IMEI máy, Nếu khách hàng mua phải máy KHÔNG ĐÚNG CAM KẾT trên biên bản sẽ được TẶNG MÁY.',200,'thumb_11-ProMAX_2.jpg',2,'DT03'),(28,'Sony Xperia 1 III (Mark 3) 12GB|256GB Nhật Cũ 99%',15990000,7990000,'Máy đã qua sử dụng còn mới 99%, được bảo hành 6 tháng, 1 đổi 1 trong 15 ngày.\r\n\r\nHỗ trợ trả góp lãi suất 0%, nhiều quà tặng kèm hấp dẫn','Là một trong những điểm thu hút chính của chiếc điện thoại này. Với khung kim loại và lưng kính, nó mang đến một vẻ ngoài sang trọng và chắc chắn. Màn hình OLED 6.5 inch với tỷ lệ khung hình 21:9 tạo ra một trải nghiệm xem phim và chơi game rộng lớn. Độ phân giải 4K của màn hình cung cấp hình ảnh sắc nét và màu sắc sống động. Bên cạnh đó, các chi tiết như nút tăng giảm âm lượng phía bên, cảm biến vân tay tích hợp trong màn hình và cổng tai nghe 3.5mm cho thấy sự chăm chút và sự tiện lợi của Sony trong thiết kế. Tổng thể, thiết kế của Sony Xperia 1 III (Mark 3) là hiện đại, sang trọng và nhất quán với những tính năng và công nghệ hàng đầu.\r\n\r\nHiệu năng của Sony Xperia 1 III (Mark 3) là rất ấn tượng.\r\nVới vi xử lý Snapdragon 888 và RAM 12GB, điện thoại này có khả năng xử lý nhanh chóng các tác vụ đa nhiệm và chơi game mượt mà. Bạn có thể trải nghiệm một trải nghiệm sử dụng mượt mà và không gặp trục trặc trong quá trình sử dụng. Điện thoại cũng được trang bị pin dung lượng 4,500mAh, cho phép sử dụng trong một khoảng thời gian dài trước khi cần sạc lại. Tổng thể, hiệu năng của Sony Xperia 1 III (Mark 3) là rất ấn tượng và phù hợp với những người dùng đòi hỏi hiệu suất cao trên một chiếc điện thoại di động.\r\n\r\nCamera của Sony Xperia 1 III (Mark 3) được chuyên gia đánh giá rất cao\r\nVới hệ thống ba ống kính sau gồm một cảm biến chính 12MP, một ống kính telephoto 12MP và một ống kính siêu rộng 12MP, nó mang lại khả năng chụp ảnh chất lượng cao và đa dạng. Với cảm biến chính, bạn có thể chụp ảnh sắc nét và rõ ràng, với màu sắc tự nhiên và chi tiết tốt. Ống kính telephoto cho phép bạn zoom quang học lên đến 2.9x mà không mất đi chất lượng ảnh. Ống kính siêu rộng cung cấp góc nhìn rộng hơn, giúp bạn chụp cảnh quan và bức ảnh nhóm. Bên cạnh đó, Xperia 1 III cũng hỗ trợ nhiều tính năng chụp chuyên nghiệp như chụp chân dung, chụp bản đồ màu và chế độ quay video chất lượng cao. Chiếc điện thoại này có thể quay video độ phân giải 4K với tốc độ khung hình cao, mang lại hình ảnh sắc nét và chi tiết. Bạn cũng có thể tận hưởng chế độ quay video chuyên nghiệp với khả năng điều chỉnh tối đa các thiết lập như ISO, tốc độ màn trập và cân bằng trắng. Ngoài ra, Xperia 1 III hỗ trợ chế độ chậm và chế độ quay video siêu chậm, giúp bạn ghi lại những khoảnh khắc động đáng nhớ. Với khả năng quay video ấn tượng của mình, Sony Xperia 1 Mark 3 là lựa chọn tuyệt vời cho những người yêu thích chụp và quay video chất lượng cao.\r\n\r\nÂm thanh\r\nSony Xperia 1 III (Mark 3) được trang bị công nghệ âm thanh 360 Reality Audio của Sony, đem đến trải nghiệm âm thanh sống động và đa chiều. Bạn có thể tận hưởng âm thanh chi tiết, rõ ràng và cân bằng từ loa âm thanh kép trên thiết bị. Ngoài ra, Xperia 1 III hỗ trợ cổng tai nghe 3.5mm, cho phép bạn sử dụng tai nghe không dây hoặc sử dụng các thiết bị âm thanh khác. Tổng thể, âm thanh của Xperia 1 III mang lại trải nghiệm nghe nhạc và xem phim tốt, đặc biệt đối với những người yêu thích âm thanh chất lượng cao.\r\n\r\nKhả năng kết nối\r\nChiếc điện thoại này hỗ trợ kết nối 5G, cho phép bạn truy cập internet với tốc độ nhanh hơn và trải nghiệm mượt mà hơn. Ngoài ra, nó cũng hỗ trợ kết nối Wi-Fi, Bluetooth và NFC, cho phép bạn kết nối với các thiết bị khác và chia sẻ dữ liệu dễ dàng. Xperia 1 III cũng có cổng USB-C tiện lợi cho việc sạc và truyền dữ liệu. Tổng thể, khả năng kết nối của Sony Xperia 1 III (Mark 3) là rất đáng chú ý và đáp ứng tốt nhu cầu kết nối hiện đại của người dùng. Sony Xperia 1 III (Mark 3) là một chiếc điện thoại cao cấp với thiết kế sang trọng, hiệu năng mạnh mẽ, camera chất lượng cao và khả năng quay video ấn tượng. Nếu bạn là một người yêu công nghệ, đặc biệt bạn là Fan của Sony và muốn trải nghiệm những tính năng hàng đầu, Xperia 1 III là sự lựa chọn tuyệt vời.  \r\n\r\n',50,'avt-xperia-1-mark-3-den.png',2,'DT04'),(29,'Laptop HP 340S G7 36A35PA (Core i5-1035G1 | 8GB | 512GB | Intel UHD | 14.0 inch FHD | Win 10 | Xám)',18990000,12290000,'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất. Phân phối chính hãng, bảo hành tại trung tâm bảo hành ủy quyền chính hãng','Thiết kế\r\nCó thiết kế trang nhã sang trọng khi được phủ một lớp màu bạc bóng bẩy, những đường nét tinh tế cao cấp đảm bảo tính thẩm mĩ cao. Với trọng lượng chỉ 1.47kg có thể dễ dàng để  trong ba lô hay túi xách của bạn để mang theo khắp nơi.\r\nHiệu năng\r\nSở hữu hiệu năng tuyệt vời, cho khả năng xử lý đa nhiệm và các ứng dụng mượt mà với bộ vi xử lý  Intel® Core™ i3/i5/i7 thế hệ thứ 10 cùng bộ nhớ 4gb/8GB DDR4-2666Mhz, ổ cứng 256/512GB PCIe® NVMe™ SSD. Với cấu hình này, bạn có thể chỉnh sửa ảnh, video, chạy các chương trình đồ họa và chơi những tựa game nhẹ nhàng yêu thích. Ngoài ra, máy trang bị card đồ họa Intel® UHD Graphics tăng cường khả năng làm đồ họa, chơi game phổ thông.\r\nMàn hình\r\nLaptop trang bị màn hình 14 inch  với độ phân giải HD với viền siêu mỏng cho tỉ lệ màn hình chiếm tới 81% diện tích thân máy, cho hình ảnh hiển thị mượt mà, sắc nét. Tuy chỉ HD nhưng với các thông số  250 nits, 45% NTSC bạn hoàn toàn yên tâm với chất lượng hình ảnh được trải nghiệm trên Hp 340S G7.\r\nCổng kết nối\r\nTrang bị đầy đủ những kết nối tiên tiến nhất hiện nay. Chúng ta có 2 cổng USB 3.1 Gen 1; HDMI; jack tai nghe 3.5mm và đặc biệt là cổng USB Type-C 3.1 Gen 1, cho tốc độ truyền dữ liệu nhanh vượt trội.',120,'HP-240-G8-1_1_1_2.jpg',1,'LT01'),(30,'Macbook Air 2023 15 inch Apple M2 8GB 256GB Chính Hãng Việt Nam',32990000,29490000,'- Sản phẩm Chính hãng Apple Việt Nam.\r\n\r\n- Máy mới New seal – chưa Active.\r\n\r\n- Giá đã bao gồm VAT.\r\n\r\n- Hỗ trợ trả góp 0%.\r\n\r\n- Miễn phí vận chuyển toàn quốc.','Macbook Air M2 15 inch 2023 - To hơn, mạnh hơn\r\nSở hữu hiệu năng vượt trội từ chipset Apple M2 và màn hình lên đến 15 inch, Macbook Air M2 15 inch 2023 đem đến sự đột phá cho thị trường máy tính xách tay. Viên pin Lithium-Polymer 66.5Wh tích hợp trong máy, kết hợp với công nghệ sạc công suất lên tới 70W, mang đến thời lượng sử dụng suốt ngày dài chỉ sau một lần sạc. Với nhiều cải tiến vượt trội so với các thế hệ tiền nhiệm, đây là một sản phẩm Macbook Air mới nhất mà bạn nên trải nghiệm.\r\n\r\nThiết kế tinh tế, đa dạng phiên bản sắc màu\r\nMacbook Air M2 15 inch 2023 nổi bật với thiết kế siêu mỏng nhẹ giống như người tiền nhiệm cùng độ bền bỉ tuyệt vời. Khi thân máy chỉ khoảng nửa inch, bạn có thể dễ dàng cất gọn và mang theo bên mình mọi nơi.\r\nApple cho ra mắt thế hệ mới của Mac Air với 4 phiên bản màu sắc đặc biệt: Silver, Starlight, Space Gray và Midnight. Đây là những sự lựa chọn mang lại màu sắc sáng và đẹp cho Macbook Air M2 15 inch 2023. Không chỉ làm tăng vẻ đẹp của sản phẩm, màu sắc này còn tạo cảm giác sang trọng và chuyên nghiệp cho người sử dụng mỗi khi sử dụng.\r\nHiệu năng vượt trội và tiết kiệm năng lượng, Chip Apple M2 vẫn quá mạnh\r\nMacbook Air M2 15 inch 2023, từ những tác vụ quá cơ bản như lướt web, xem phim, đến những tác vụ nặng như trích xuất video hoặc thiết kế đồ họa chỉ là chuyện nhỏ trong tầm tay.',201,'macbook-air-2023-mignight.jpg',1,'LT02'),(31,'Laptop Dell Vostro 5515 (R5 5500U/ 8GB RAM/256GB SSD/15.6 inch FHD/Win10/Xám/Nhập Khẩu) (2021)',14990000,11490000,'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất. Hàng Nhập Khẩu, Bảo hành 12 tháng  tại các trung tâm bảo hành hoặc cửa hàng Clickbuy  toàn quốc. Đổi mới trong 15 ngày đầu nếu bị lỗi phần cứng nhà sản xuất.','Nếu bạn đang tìm kiếm một chiếc laptop có màn hình 15.6 inch FHD và bao gồm các tiêu chí: mỏng nhẹ, sang trọng, tinh tế và đặc biệt là khả năng phản hồi nhanh như chớp và thời lượng pin siêu tiết kiệm giúp bạn làm việc hiệu quả ở mọi nơi thì xin chúc mừng bạn! Chiếc laptop Dell Vostro 15 5515 là lựa chọn không thể tốt hơn dành cho bạn.\r\nThiết kế sáng tạo\r\nDell Vostro 5515 có thiết kế cao cấp và sang trọng không thua kém gì so với dòng XPS. Được làm từ hợp kim nhôm nguyên khối, các đường cắt CNC tinh xảo toat lên vẻ cao cấp. Đường viền hẹp và kích thước nhỏ gọn của máy tính xách tay của bạn dẫn đến tỷ lệ màn hình trên thân máy mở rộng và trải nghiệm xem thú vị. Từng chi tiết trên Dell Vostro 5515 đều được chế tác một cách tỉ mỉ, tinh tế, đẹp mắt. Bản lề nâng thông minh sẽ nâng nhẹ nhàng một góc nhỏ khi các bạn mở máy. Hơn nữa, chiếc laptop còn trở nên hiện đại, mỏng nhẹ hơn nhờ màn hình mỏng cả 4 cạnh. Dell Vostro 5515 có trọng lượng chỉ 1.6kg và mỏng 18mm rất nhỏ gọn để các bạn dễ dàng mang đi khắp mọi nơi.\r\nHiệu năng vượt trội khi sử dụng\r\nDell Vostro 5515 được trang bị vi xử lý mới nhất của nhà AMD. Với số đơn nhân và đa nhân lớn, đảm bảo cho quá trình sử dụng ổn định hơn và mượt mà mà hơn. Các tác vụ văn phòng với những file Excel nặng, các ứng dụng đồ họa 2D như PTS, LR, AI,…. đều hoạt động ổn định trên chiếc Dell 5515 này. Cùng với 8GB Ram và SSD tốc độ cao. Đảm bảo quá trình sử dụng không bị giật lag và trích xuất dữ liệu nhanh chóng hơn.\r\nMàn hình lớn, sắc nét\r\nDell Vostro 5515 có màn hình 15.6 inch khá lớn. Có tấm nền chống chói, dễ dàng làm việc ở nhiều điều kiện ánh sáng khác nhau. Độ phân giải FHD, cho hình ảnh sắc nét. Viền màn hình rất mỏng cho không gian hiển thị lớn hơn. Cạnh trên của màn hình đặt camera và micro thoại, dễ dàng gọi điện và họp online.',200,'61150_laptop_dell_vostro_5515_54.jpg',1,'TL03'),(32,'Laptop HP 240 G8 (3D0E1PA) (i5 1135G7/8GB RAM/256GB SSD/14 FHD/FP/Win10/Bạc)',12990000,8990000,'Nguyên hộp, đầy đủ phụ kiện từ nhà sản xuất. Phân phối chính hãng, bảo hành tại trung tâm bảo hành ủy quyền chính hãng','Laptop HP 240 G8 mang kiểu dáng trang nhã, thanh lịch. Ngoài ra, máy chỉ có trọng lượng nhẹ khoảng 1.47 kg tiện lợi bỏ vào balo hoặc túi xách lớn thoải mái mang mọi lúc, mọi nơi để học tập và làm việc linh động. Vỏ ngoài được làm từ chất liệu nhựa mang màu xám bạc nhưng tổng thể sang trọng và độ bền đạt mức hoàn thiện cao.\r\nHP 240 G8 được trang bị bộ vi xử lý Intel Core i3-1005G1 1.2 GHz up to 3.4 GHz 4 MB , RAM 4GB với cấu hình ổn định này bạn có thể yên tâm học tập, làm việc và lướt web để nghe nhạc, xem phim, giải trí thoải mái. Card đồ họa tích hợp Intel UHD Graphics giúp xử lý các vấn đề về hình ảnh, độ phân giải và các phần mềm liên quan đến đồ họa như Photoshop cơ bản\r\nBàn phím được thiết kết chắc chắn có bề mặt phủ nhám giúp chống bám mồ hôi, chống phai khi sử dụng thời gian dài và mang màu đen chung tông với viền màn hình làm tăng thêm độ thẩm mỹ. Đặc biệt chiếc máy tính này còn được điểm xuyến thêm một chi tiết rất tinh tế đó là gờ nổi ngay trên HD webcam giúp việc mở nắp gập trở nên dễ dàng hơn.\r\nLaptop được trang bị đầy đủ các cổng kết nối phổ biến như cổng SuperSpeed USB A, USB Type-C, HDMI, Jack cắm sạc, Jack tai nghe,... cho phép liên kết và truyền dữ liệu dễ dàng với các thiết bị tương thích khác.',100,'HP-240-G8 (1).jpg',1,'TL04');
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taikhoan`
--

DROP TABLE IF EXISTS `taikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taikhoan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tentaikhoan` varchar(100) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `matkhau` varchar(100) DEFAULT NULL,
  `vaitro` tinyint(1) DEFAULT NULL,
  `ngaytao` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taikhoan`
--

LOCK TABLES `taikhoan` WRITE;
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
INSERT INTO `taikhoan` VALUES (79,'admin','admin@gmail.com','123',1,'2023-12-02 07:00:00'),(80,'duyvan','vanddps37009@gmail.com','123',0,'2023-12-02 15:59:02'),(81,'hieu','hieuptpd09653@fpt.edu.vn','123',0,'2023-12-02 17:07:04'),(82,'duyvantest','111.duyvan@gmail.com','123',0,'2023-12-03 15:13:48');
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongtintaikhoan`
--

DROP TABLE IF EXISTS `thongtintaikhoan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thongtintaikhoan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ten` varchar(100) DEFAULT NULL,
  `dienthoai` varchar(15) DEFAULT NULL,
  `diachi` text,
  `id_taikhoan` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thongtintaikhoan_taikhoan_ondel` (`id_taikhoan`),
  CONSTRAINT `thongtintaikhoan_taikhoan_ondel` FOREIGN KEY (`id_taikhoan`) REFERENCES `taikhoan` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4  ;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongtintaikhoan`
--

LOCK TABLES `thongtintaikhoan` WRITE;
/*!40000 ALTER TABLE `thongtintaikhoan` DISABLE KEYS */;
INSERT INTO `thongtintaikhoan` VALUES (9,'duyvan','','fdfd',81),(10,'duyvan','0932202921','35 - Hồ Quý Ly - Thanh Khê - Đà Nẵng',82);
/*!40000 ALTER TABLE `thongtintaikhoan` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-07 20:41:43
