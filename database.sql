drop database if exists myhotel;
create database myhotel;
use myhotel;

create table Users(
	id int auto_increment primary key,
    fullName varchar(255),
    password varchar(255),
    email varchar(255),
    phone int,
    birthday int,
    roll varchar(255)
);

insert into Users values
	(1,"Nguyen Manh","12345","manh.nguyen21@gmail.com","0336908087","14/05/2000","admin"),
    (2,"Nguyen Van Linh","678910","linh@gmail.com","036745121","25/01/1998","HR");
  
  select * from Users;
    
    create table rooms(
		id int auto_increment primary key,
        image varchar(255),
		name varchar(255),
        price varchar(255),
        max varchar(255),
        rate varchar(255)
	);
    
    insert into rooms values
    (1,"https://media-cdn.tripadvisor.com/media/photo-s/09/70/7a/7e/muong-thanh-luxury-nhat.jpg","VIP","320000","3 person","5"),
(2,"http://landing.engotheme.com/html/skyline/demo/images/Home-2/rooms-1.jpg","VIP","320000","3 person","5"),
    (3,"","VIP","320000","4 person","5"),
    (4,"","VIP","320000","1 person","5"),
    (5,"","VIP","3245000","2 person","5"),
    (6,"","VIP","320000","2 person","5");
    
    
    create table about(
		id int auto_increment primary key,
        title varchar(255),
		content varchar(255)
        );
        
	insert into about values
    (1,"ABOUT US","Beautifully located by the My Khe beach, amongst the top six in the world, and about 5-minute away from the centre of Danang city, Grand Tourane Hotel welcomes all who are looking for the breathtaking – ocean view accommodation, finest facilities and warm service. 188 luxuriously appointed rooms and suites offering a stunning view over My Khe beach or the city skyline, from the well-equipped meeting rooms to the tennis court, make the hotel a perfect choice for business and leisure. Cap a day of exploration with beauty and wellness therapies at our hotel spa, savor the delicacies at an all-day dining restaurant Bella Vista, or soak up the sun while enjoying at the pool bar..."),
    (2,"WHY GUEST CHOOSE MY HOTEL?","Thich thi den thoi!");
    
    
