-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 29, 2021 lúc 09:03 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `notashop`
--

DELIMITER $$
--
-- Thủ tục
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `Pc_cat` (IN `id` INT)  BEGIN
SELECT catname from category where catid = id LIMIT 1;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Pc_seecate` (IN `id` INT)  BEGIN
select catname from category where id = @id limit 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(151, 'mrhoang', '123456'),
(152, 'Sephoang', '123456'),
(153, 'anhhoang', '123456'),
(154, 'levanchoi', '123456'),
(155, 'hoang123', '123456');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CatId` int(11) NOT NULL,
  `CatName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CatId`, `CatName`) VALUES
(1, 'Decorative items'),
(2, 'Candy ke'),
(3, 'Accesories'),
(5, 'Jewelry'),
(6, 'Floral & Botanical');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CusId` int(11) NOT NULL,
  `FullName` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CusId`, `FullName`, `Address`, `Phone`) VALUES
(1, 'Sep Hoang', '26 son la', '0123456789'),
(152, 'bo hoang', '0987654321', '15 newgioc'),
(153, 'unknown', '11 newgioc', '0333222111'),
(154, 'unknown', '', ''),
(155, 'unknown', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderId` int(10) NOT NULL,
  `ProductId` int(10) NOT NULL,
  `Quantitty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderId`, `ProductId`, `Quantitty`) VALUES
(4, 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `orderlist`
-- (See below for the actual view)
--
CREATE TABLE `orderlist` (
`cusid` int(11)
,`FullName` varchar(100)
,`Address` varchar(100)
,`OrderID` int(10)
,`OrderDate` timestamp
,`Total` decimal(10,0)
,`Productid` int(10)
,`Quantitty` int(11)
,`photo` varchar(500)
,`price` decimal(10,0)
,`Subprice` decimal(20,0)
,`Name` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderId` int(10) NOT NULL,
  `OrderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `CusId` int(11) NOT NULL,
  `Total` decimal(10,0) NOT NULL,
  `Address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderId`, `OrderDate`, `CusId`, `Total`, `Address`) VALUES
(1, '2021-12-25 09:32:29', 1, '726', ''),
(2, '2021-12-25 09:33:36', 1, '734', ''),
(3, '2021-12-25 09:34:42', 1, '774', ''),
(4, '2021-12-25 09:39:15', 1, '814', ''),
(5, '2021-12-26 02:23:25', 153, '803', '11 newgioc'),
(6, '2021-12-28 02:43:20', 155, '1797', '26 son la'),
(7, '2021-12-28 03:43:07', 152, '89', '0987654321');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `Productid` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `Price` decimal(10,0) NOT NULL DEFAULT 0,
  `Note` text NOT NULL,
  `InStock` int(11) NOT NULL DEFAULT 50,
  `photo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`Productid`, `Name`, `CategoryID`, `Price`, `Note`, `InStock`, `photo`) VALUES
(1, 'Colorful lozenges', 2, '19', 'New arrival fruit flavored smiley face candy. Inside there are many convenient small packages that are easy to use. NSX and HSD printed on the package. The candy is delicious. The candy has 2 parts: the white part below has a cool mint taste, the upper part, depending on the color, has a fruity smell according to the color: melon, orange, strawberry, ..... open the candy box, it\'s fragrant. I\'m an adult, but I also love children. Goods arrive in batch, so the shop will ship the sample at random.', 50, 'https://www.metronieuws.nl/wp-content/uploads/2020/09/XTC.png'),
(2, 'gas 5kg balloons:)', 1, '40', 'Among all kinds of smiley bottles, the 5kg smiley ball is the most suitable size for groups from 10 to less than 20 people. Currently, there are many places that sell wholesale and retail 5kg smiley balloons, however, to find a reputable, quality address with quality laughing gas is not at all simple. Read the article below to get some more experience in choosing to buy wholesale and retail 5kg smiley balls.\r\n1. Specifications of 5kg smiley ball\r\n- Diameter 15cm\r\n- Height 40cm\r\nWith such rare parameters, you are completely assured in carrying it in your backpack or handbag when you have a trip or use it at home.\r\n2. How many balls can a 3kg smiley balloon pump?\r\nDepending on the size of the ball, the 3kg ball can pump from 25 to 30 large balls. The 3kg smiley ball bottle is the first choice for individuals.\r\nIn case if the individual needs to use in a larger quantity, there will be options for you such as:\r\n- 5kg smiley ball\r\n- 6kg smiley ball\r\n- 20kg smiley ball', 50, 'https://cdn.vietnammoi.vn/stores/news_dataimages/hanhnth/072017/13/15/0725_bong-cuoi3.jpg'),
(3, 'Doremom cake', 2, '1', '🍣 Mini DORAEMON CAKE, super hot cake of cherry blossom country\r\nSuper delicious cake, soft and fragrant\r\n🍣 Guarantee the product to be delivered immediately within 2 days after placing the order.\r\n\r\n🍣Production date: printed on the packaging\r\n\r\n🍣Expiry date: 3 months from date of manufacture\r\n\r\n🍣Weight: 14g/piece\r\n\r\nMade in China\r\n\r\n🍣 Snack Seeker has Doraemon cake with 2 flavors:\r\n1. Taro flavor\r\n2. Red bean taste\r\n3. Chocolate flavor\r\n\r\nSurely our childhoods are all familiar with the image of the robot cat Doraemon with a donut 😘 Snack Seeker will bring that cake to our dear customers 😘', 50, 'https://cf.shopee.vn/file/a89162ab60215178b1835bef7873b65b'),
(4, 'Noel accessories', 1, '5', '1. 100% brand new and high quality product\r\n \r\n 2. There are 2 switching modes: strobe and steady. The string is flexible and bendable, which means you can face it or adjust it to any shape to meet your decor requirements. To open the battery compartment cover: Look for the \"Obra\" sign and note the two locks.\r\n \r\n 3. Tap \"Work\" lightly with your thumb and slide it in the direction of the arrow.\r\n \r\n 4. Made of epoxy resin material. Each snowflake-shaped string is heated at high temperature, giving the snowflake a high degree of hardness. Snow lights are durable and safe. Energy saving and low consumption. You can decorate and hang it anywhere with a power supply battery instead of a plug.\r\n \r\n 5. Fit for Christmas tree / capsule / doorway / window / balustrade / garden / peeling / peeling holiday outdoor indoor decoration. This is also a festive gift for your friends or family.', 50, 'https://cf.shopee.vn/file/54a0b01e0250e984e423c1d6c77e5584'),
(5, 'Small bag', 1, '8', 'Note:\r\nThere is 2-3% difference according to manual measurement.  Please check the size carefully before you buy the item.\r\nThank you for your kindly understanding!\r\nThe minature bag is the cutest accessory to add to your brunch date look or even interview attire if you\'re dressed to impress. Channel runway vibes with a jelly mini bag, style it with something neon and you\'re literally killing the season\'s trends. If standing out ain\'t your thing, keep things simple with a classic mini handbag, just pair with your AM to PM look and you\'re sorted. Make the itsy bitsy mini bag your go-to this season and we can promise you, it won\'t disappoint.', 50, 'https://cf.shopee.vn/file/38c041bdede6b8bb1fc2886a89cba314'),
(6, 'Gingerbon Ginger', 2, '9', 'Gingerbon candies have a light sweetness of sugar and a spicy taste of ginger to create sweet, fragrant candies with a strong scent of ginger. Easy-to-eat marshmallows help users reduce feelings of nausea, discomfort, and headaches when suffering from motion sickness. Thanks to the effect of ginger, the candy has a warming effect on the abdomen, keeping warm in winter\r\nIngredients: Sugar, Tapioca Starch, Ginger, Vegetable Fat\r\nInstructions for use: Direct use\r\nSpecification: Pack 125g\r\nExpiry date: 24 months\r\n_____________\r\n \" \"\r\n\r\n- Real product images. Free return and exchange if the product information is not correct.\r\n\r\n- Please record a clip of the process of opening the box, opening the goods, and please stay calm if there is a problem >_< inb so that the shop can solve it as quickly as possible.\r\n\r\n- When the product is satisfactory to you, expect to receive a 5-star rating so that we can serve more people.\r\n\r\n- Need more advice, inbox the shop, the shop will reply as soon as online.\r\n__________________\r\n\r\n113-114', 50, 'https://cf.shopee.vn/file/e4589504d2c74110dae7c1f48fdf25fc'),
(7, 'Flower Vase', 6, '26', 'A flower vase is an opened  decorative container commonly made of ceramic materials such as clay or glass for ornamentation purposes. Modern vases are widely decorated and used to hold artificial flowers.\r\n\r\nThe purpose of flower vase is still as important as it used to be in the ancient time.\r\n\r\nIt can be made from a number of materials, such as ceramics, glass, non-rusting metals, such as aluminum, brass, bronze or stainless steel. Wood has been used\r\n\r\nto make vases, either by using tree species that naturally resist rot, such as teak, or by applying a protective coating to conventional wood.\r\n\r\nThey come in so many different forms that trying to find the perfect one for your space can sometimes become a herculen task but the best strategy is to have a set of criteria to help one make a decision.\r\n', 50, 'https://du85s6yu4vjql.cloudfront.net/fit-in/1000x1000/pictures/images/000/760/298/original/d859aef23b3605d50c88c11fa429a9f4.jpeg'),
(8, 'Speacial Vase', 6, '35', 'With the original Superheros® vase by Jasmin Djerzic, you introduce a decorative piece symbolizing power. The staging of your flower arrangements will never be the same. Each vase is finished by hand, and the decor of each piece is unique in the 24K Gold edition. THE DESIGNER’S HISTORY I was born and raised in Sarajevo, Bosnia. During the Civil War, I could only play with a superhero figure. This strong memory of my childhood was the source of inspiration to create an object that perpetuates this memory, and gives me the strength to keep moving forward.\r\nDECORATIVE ITEM FLORAL AND BOTANICAL DECOR VASES JASMIN DJERZIC MODERN JASMIN DJERZIC', 50, 'https://du85s6yu4vjql.cloudfront.net/fit-in/1000x1000/pictures/images/000/772/336/original/ba8f1b25855f9a93a02d0fe154c45908.jpg'),
(9, 'Ice out combo', 5, '126', 'Ice out men\'s gold CZ watch & full ice necklace and bracelet combination set Jewelry gifts Bracelet: celebrity Cuban CZ full iced out bracelet 14K gold plating for a premium quality finish that will turn heads. Massive 15mm wide fully iced-out Cuban link bracelet is 8.5\" inches long. Luxury clasp to lock your Cuban Link bracelet easily and securely. Our quality bracelets lock-on and stay on. \r\nWatch: 100% brand new Finish: 18K Gold Plated Case Size : 38mm (Diameter) Strap size: width 18mm, total length about 24CM Watch weight: 92g Case Back: Stainless Steel Lab Simulated Diamonds on the Bezel & Band Movement: Quartz Japan Battery included. \r\nLock: Fold Over (Wallet Clasp) Gender: Men\'s Removable Links (Adjustable) Luxury style. \r\nNecklace : Chain : cuban Chain Chain Length : 24\" Chain Width : 5mm Pendant weight: 45g COLOR: 18K Gold Plated PENDANT SIZE : 37mm x 32mm Combo Set weightï¼216g/set\r\n\r\n', 50, 'https://img.staticdj.com/2d109b51b46e45c5df6e1be207db2973.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `orderlist`
--
DROP TABLE IF EXISTS `orderlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `orderlist`  AS SELECT `c`.`CusId` AS `cusid`, `c`.`FullName` AS `FullName`, `c`.`Address` AS `Address`, `o1`.`OrderId` AS `OrderID`, `o1`.`OrderDate` AS `OrderDate`, `o1`.`Total` AS `Total`, `o2`.`ProductId` AS `Productid`, `o2`.`Quantitty` AS `Quantitty`, `p`.`photo` AS `photo`, `p`.`Price` AS `price`, `o2`.`Quantitty`* `p`.`Price` AS `Subprice`, `p`.`Name` AS `Name` FROM (((`customer` `c` join `orders` `o1` on(`o1`.`CusId` = `c`.`CusId`)) join `orderdetail` `o2` on(`o1`.`OrderId` = `o2`.`OrderId`)) join `products` `p` on(`p`.`Productid` = `o2`.`ProductId`)) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CatId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CusId`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderId`,`ProductId`),
  ADD KEY `OrderId` (`OrderId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderId`),
  ADD KEY `CusId` (`CusId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Productid`),
  ADD UNIQUE KEY `uniquephotolink` (`photo`),
  ADD KEY `fk_catid` (`CategoryID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `CatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `Productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_acc` FOREIGN KEY (`CusId`) REFERENCES `account` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`ProductId`) REFERENCES `products` (`Productid`),
  ADD CONSTRAINT `pk_order` FOREIGN KEY (`OrderId`) REFERENCES `orders` (`OrderId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CusId`) REFERENCES `customer` (`CusId`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_catid` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CatId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
