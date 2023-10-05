--user table-- 
CREATE TABLE `users` (
 `id` bigint(20) NOT NULL AUTO_INCREMENT,
 `UserId` bigint(20) NOT NULL,
 `username` varchar(100) NOT NULL,
 `email` varchar(100) NOT NULL,
 `passwordhash` varchar(255) NOT NULL,
 `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

--contactUs table--
CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phoneNumber` int(20) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


--Flights table with flights data--
CREATE TABLE `flights` (
  `flight_num` int(10) NOT NULL AUTO_INCREMENT,
  `flight_id` varchar(11) DEFAULT NULL,
  `origin` varchar(50) DEFAULT NULL,
  `destination` varchar(50) DEFAULT NULL,
  `depart_day` date DEFAULT NULL,
  `depart` time DEFAULT NULL,
  `arrival_day` date DEFAULT NULL,
  `arrival` time DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `seats_available` int(11) DEFAULT NULL,
  PRIMARY KEY (`flight_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `flights` 
(`flight_id`, `origin`, `destination`, `depart_day`, `depart`, `arrival_day`, `arrival`, `duration`, `price`, `seats_available`)
VALUES 
('FL001', 'Mumbai', 'Delhi', '2023-09-30', '12:00:00', '2023-09-30', '13:25:00', '2h25m', 2000, 120),
('FL002', 'Delhi', 'Bangalore', '2023-10-01', '19:30:00', '2023-10-01', '20:55:00', '2h25m', 1800, 100),
('FL003', 'Chennai', 'Mumbai', '2023-10-02', '08:45:00', '2023-10-02', '12:45:00', '15h00m', 2500, 150),
('FL004', 'Kolkata', 'Hyderabad', '2023-10-03', '10:30:00', '2023-10-03', '14:30:00', '15h00m', 1900, 80),
('FL005', 'Bengaluru', 'Chennai', '2023-10-04', '10:00:00', '2023-10-04', '11:15:00', '4h15m', 2000, 120),
('FL006', 'Hyderabad', 'Kolkata', '2023-10-05', '19:45:00', '2023-10-05', '21:00:00', '4h15m', 2100, 70),
('FL007', 'Chennai', 'Bengaluru', '2023-10-06', '08:30:00', '2023-10-06', '11:35:00', '2h05m', 1850, 100),
('FL008', 'Mumbai', 'Delhi', '2023-10-07', '15:30:00', '2023-10-07', '18:35:00', '2h05m', 2500, 90),
('FL009', 'Delhi', 'Mumbai', '2023-10-08', '14:00:00', '2023-10-08', '18:10:00', '14h10m', 2250, 120),
('FL010', 'Chennai', 'Mumbai', '2023-10-09', '16:30:00', '2023-10-09', '19:50:00', '13h20m', 2150, 45),
('FL011', 'Kolkata', 'Chennai', '2023-10-10', '06:00:00', '2023-10-10', '06:35:00', '2h35m', 2050, 120),
('FL012', 'Delhi', 'Bengaluru', '2023-10-11', '14:30:00', '2023-10-11', '15:05:00', '2h35m', 2300, 60),
('FL013', 'Mumbai', 'Delhi', '2023-10-12', '14:00:00', '2023-10-12', '14:40:00', '13h40m', 2350, 90),
('FL014', 'Chennai', 'Kolkata', '2023-10-13', '09:00:00', '2023-10-13', '07:55:00', '12h55m', 1950, 150),
('FL015', 'Bengaluru', 'Mumbai', '2023-10-14', '16:00:00', '2023-10-14', '15:20:00', '12h20m', 2450, 200),
('FL016', 'Mumbai', 'Delhi', '2023-10-15', '18:00:00', '2023-10-15', '15:50:00', '11h50m', 1800, 110),
('FL017', 'Delhi', 'Bangalore', '2023-10-16', '07:30:00', '2023-10-16', '14:05:00', '3h35m', 2100, 55),
('FL018', 'Chennai', 'Mumbai', '2023-10-17', '16:00:00', '2023-10-17', '22:35:00', '3h35m', 1850, 180),
('FL019', 'Kolkata', 'Hyderabad', '2023-10-18', '11:30:00', '2023-10-18', '14:50:00', '2h20m', 2150, 70),
('FL020', 'Bengaluru', 'Chennai', '2023-10-19', '20:00:00', '2023-10-19', '23:20:00', '2h20m', 2400, 130);


--Reservations Table---

CREATE TABLE `reservations` (
  `user_id` varchar(50) NOT NULL,
  `flight_id` varchar(50) NOT NULL,
  `passenger_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

---Hotel Table---

CREATE TABLE Hotels (
    hotel_id INT PRIMARY KEY,
    hotel_name VARCHAR(50),
    location VARCHAR(20),
    room_type VARCHAR(20),
    room_number INT,
    price_per_night INT,
    available_date DATE
);

INSERT INTO Hotels (hotel_id, hotel_name, location, room_type, room_number, price_per_night, available_date)
VALUES
    (1, 'Hotel A', 'Delhi', 'Single', 101, 3000, '2023-10-10'),
    (2, 'Hotel B', 'Bangalore', 'Double', 201, 4000, '2023-10-12'),
    (3, 'Hotel C', 'Hyderabad', 'Suite', 301, 6000, '2023-10-11'),
    (4, 'Hotel D', 'Chennai', 'Single', 102, 2500, '2023-10-09'),
    (5, 'Hotel E', 'Kolkata', 'Double', 202, 3500, '2023-10-14'),
    (6, 'Hotel F', 'Mumbai', 'Suite', 302, 8000, '2023-10-16'),
    (7, 'Hotel G', 'Delhi', 'Single', 103, 2800, '2023-10-13'),
    (8, 'Hotel H', 'Bangalore', 'Double', 203, 3800, '2023-10-15'),
    (9, 'Hotel I', 'Hyderabad', 'Suite', 303, 5500, '2023-10-17'),
    (10, 'Hotel J', 'Kolkata', 'Deluxe', 401, 4200, '2023-10-19'),
    (11, 'Hotel K', 'Mumbai', 'Deluxe', 402, 4700, '2023-10-21'),
    (12, 'Hotel L', 'Delhi', 'Single', 104, 3200, '2023-10-20'),
    (13, 'Hotel M', 'Bangalore', 'Double', 204, 4200, '2023-10-22'),
    (14, 'Hotel N', 'Hyderabad', 'Deluxe', 403, 5000, '2023-10-23'),
    (15, 'Hotel O', 'Chennai', 'Deluxe', 404, 3800, '2023-10-18'),
    (16, 'Hotel P', 'Kolkata', 'Single', 105, 2800, '2023-10-24'),
    (17, 'Hotel Q', 'Mumbai', 'Double', 205, 4100, '2023-10-26'),
    (18, 'Hotel R', 'Delhi', 'Deluxe', 405, 5200, '2023-10-25'),
    (19, 'Hotel S', 'Bangalore', 'Suite', 304, 6500, '2023-10-27'),
    (20, 'Hotel T', 'Hyderabad', 'Deluxe', 406, 4800, '2023-10-28');
