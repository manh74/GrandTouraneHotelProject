drop database if exists myhotel;
create database myhotel;
use myhotel;

create table user(
id int auto_increment primary key,
fullName varchar(255),
password varchar(255),
email varchar(255),
phone int,
birthday date,
roll varchar(255) default "user"
);

insert into user values
(1,"Nguyen Manh","12345","manh.nguyen21@gmail.com","0336908087","2000/05/14","admin"),
(2,"Phan Van Linh","678910","linh@gmail.com","036745121","1997/12/14","admin"),
(3,"Tran Ngoc Minh","678910","minh@gmail.com","0765212321","1999/02/14","user");

select * from User;




create table room(
	id int auto_increment primary key,
	image varchar(255),
	name varchar(255),
	price double,
	max varchar(255),
	rate varchar(255)
);

insert into room values
(1,"https://media-cdn.tripadvisor.com/media/photo-s/09/70/7a/7e/muong-thanh-luxury-nhat.jpg","VIP",320000,"4 person","5"),
(2,"http://landing.engotheme.com/html/skyline/demo/images/Home-2/rooms-1.jpg","VIP",320000,"4 person","5"),
(3,"https://www.chudu43.com/wp-content/uploads/2019/03/Grand-Tourane-Hotel-Da-Nang-1.jpg","VIP",320000,"2 person","5"),
(4,"https://aff.bstatic.com/images/hotel/max500/166/166181203.jpg","VIP",320000,"1 person","5"),
(5,"https://m.justgola.com/media/a/00/19/105495_og_1.jpeg","VIP",3245000,"2 person","5"),
(6,"http://villadulich.vn/public/uploads/du-an/chi-tiet/Kh%C3%A1ch%20s%E1%BA%A1n%20Grand%20Tourane/111216833.jpg","VIP",320000,"2 person","5"),
(7,"http://villadulich.vn/public/uploads/du-an/chi-tiet/Kh%C3%A1ch%20s%E1%BA%A1n%20Grand%20Tourane/111216833.jpg","a",1210000,"24 person","5");

select * from room;
create table about(
	id int auto_increment primary key,
	title varchar(1500),
	content varchar(1500)
);
	
insert into about values
(1,"About us","<p>Beautifully located by the My Khe beach, amongst the top six in the world, and about 5-minute away from the centre of Danang city, Grand Tourane Hotel welcomes all who are looking for the breathtaking – ocean view accommodation, finest facilities and warm service.</p>
				<br>

				<p>188 contemporary rooms and suites offering a stunning view over My Khe beach or the city skyline, from the well-equipped meeting rooms to the tennis court, make the hotel a perfect choice for business and leisure. Cap a day of exploration with beauty and wellness therapies at our hotel spa, savor the delicacies at an all-day dining restaurant Bella Vista, or soak up the sun while enjoying at the pool bar.</p>
				<br>

				<p>
				If you are dreaming of a vacation just a few steps from the beach, but still within a distance to all major sights and attractions of the Central Vietnam, you can open your eyes. Touch your dream in Grand Tourane and enjoy every moment. 
				</p>"),
(2,"WHY GUEST CHOOSE MY HOTEL?","To establish a cutting-edge hospitality brand in the area through wide range of services, minute care in favor of attracting and bringing feeling, satisfaction to customers via theirs senses; by having a more nimble and flexible model, that preserves proven operating disciplines and standards.<br>We are trying to: 
<br>
- Provide a great work atmosphere by treating each other with dignity and respect.
<br>
-Encourage debate & diversity as a key ingredient in the way we manage & do hotel business.
<br>
- Apply the highest standards of excellence to each service we bring to customers."),
(3,"Mission","- To establish <strong>Grand Tourane Hotel</strong> as a premier hospitality property while maintaining our consistent principles as we grow.<br>- Develop enthusiastically&nbsp;satisfied and loyal customers&nbsp;at every contact.<br>- Recognize that&nbsp;profitability&nbsp;is essential to our future success.<br>- Contribute positively to our team development & their pride of the Owning Company, Property.");

create table food(
 id int auto_increment primary key,
 name varchar(255),
 image varchar(255),
 price int,
 info varchar(255)
 );
 
 
 insert into food values 
 (3,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (6,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (5,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (8,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (9,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (7,"Chicken3","https://dtlscuh0h90jk.cloudfront.net/seller/photos/VNGFVN0000004c_8a9a80ff994847f8a6369060880a22c2.jpg",190000,"ABCVAVVAV"),
 (2,"Chicken2","https://i.ndtvimg.com/i/2016-07/chicken-korma_625x350_71467713811.jpg",190000,"ABCVAVVAV"),
 (4,"Chicken4","https://donchicken.vn/pub/media/wysiwyg/home_page/friedchicken.png",190000,"ABCVAVVAV"),
 (1,"Chicken1","https://www.cdc.gov/foodsafety/images/SalmonellaChicken_456px.jpg",190000,"ABCVAVVAV");
create table cart(
	 id int auto_increment primary key,
	 userId int,
	 productId int,
	 productName varchar(255),
	 quantity int,
	 time datetime,
	 price int,
	 type varchar(255),
	 foreign key (userId) references user(id)
 );
SELECT cart.id, user.fullName, cart.productId, cart.type, cart.productName,cart.quantity,cart.price FROM cart, user WHERE user.id = cart.userId;
select * from cart;
 
create table forgive(
	id int auto_increment primary key,
	title varchar(255),
	content varchar(255)
 );
 
insert into forgive values
(1,"Best price guarantee","We guarantee our customers will get the best service, the most attractive promotions"),
(2,"Trust service - True value","Putting our customers' interests first, we support our customers the fastest and most accurate service with reliable and authentic value services."),
(3,"Quality assurance","We work closely with our partners, conducting periodic surveys to ensure the best quality of service");
create table comment(
 id int auto_increment primary key,
 name varchar(255),
 email varchar(255),
 content varchar(255)
);
 
 insert into comment values
 (1,"Pham Van Hai","haivan@gmail.com","The best hotel that I have been");
 
 select * from comment;
 
 create table gallery(
	id int auto_increment primary key,
	title varchar(255),
	image varchar(255),
	timeUpdate date
);
	
insert into gallery values
(1,"Grand","https://pix5.agoda.net/hotelimages/115/1158339/1158339_16092913540047106093.jpg?s=800x","2019-12-16"),
(2,"Grand","https://dinco.com.vn/wp-content/uploads/2019/03/28.jpg","2019-12-26"),
(3,"Grand","https://i.vnbooking.com/optimg/hotel/2535_99117.jpg","2019-02-16"),
(4,"Grand","https://media-cdn.tripadvisor.com/media/photo-s/0a/fd/ee/94/photo2jpg.jpg","2019-02-16"),
(5,"Grand","https://m.justgola.com/media/a/00/19/105496_og_1.jpeg","2019-02-16"),
(6,"Grand","https://r-cf.bstatic.com/images/hotel/max1024x768/193/193416484.jpg","2019-02-16");

create table tour(
	id int auto_increment primary key,
	 name varchar(255),
	 image varchar(255),
	 start varchar(255),
	 time varchar(255),
	 price double
);
	
	insert into tour values
	(1,"Travel to Italia","//bizweb.dktcdn.net/thumb/large/100/372/532/products/vistas-canal-venecia.jpg?v=1575555979000","On Monday everday week","6 days 5 nights",16000000),
	(2,"Travel to Da Nang","https://mytourcdn.com/upload_images/Image/Location/24_10_2016/11/du-lich-quan-3-da-nang-mytour-1.jpg","On Monday everday week","6 days 5 nights",3500000);
	
	
	create table favorite(
	 id int auto_increment primary key,
	 name varchar(255),
	 image varchar(255)
	 );
	 
	 create table booking(
	 id int auto_increment primary key,
	 checkIn date,
	 checkOut date,
	 type varchar(255),
	 adults int,
	 children int,
	 userId int 
	 );
	 select * from booking;
         
delimiter $$		
	CREATE TRIGGER date_check
	BEFORE INSERT ON booking
	FOR EACH ROW
	BEGIN
	IF NEW.checkIn < CURDATE() OR NEW.checkOut < CURDATE() OR NEW.checkOut < NEW.checkIn THEN
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid date!';
	END IF;
END $$

select * from messenger;
delimiter $$		
	CREATE TRIGGER date_cart_check
	BEFORE INSERT ON cart
	FOR EACH ROW
	BEGIN
	IF NEW.time < NOW() OR NEW.time > NOW() + INTERVAL 1000 YEAR THEN
	SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Invalid date!';
	END IF;
END $$   