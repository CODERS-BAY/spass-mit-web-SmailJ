CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `admins` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$BybrSaC5s9Q6eJSoZ6wv3eGYaUQJaAe8/tjj2SS.TEbQDCWbbu6Pq', '2020-10-23 17:49:29');

CREATE TABLE `members` (
  `name` varchar(50) NOT NULL,
  `late` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `members` (`name`, `late`) VALUES
('Alex', 1),
('Georg', 0),
('Jakob', 3),
('Karim', 2),
('Marco', 3),
('Pia', 0),
('Rashad', 0),
('Rebecca', 0),
('Robert', 6),
('Smail', 0),
('Stefan', 0),
('Vanessa', 1);

CREATE TABLE `sponsors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `money` int(11) DEFAULT NULL,
  `donated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `sponsors` (`id`, `name`, `money`, `donated_at`) VALUES
(1, 'Peter', 2, '2020-10-23 17:37:29');

ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

ALTER TABLE `members`
  ADD PRIMARY KEY (`name`);

ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `sponsors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
