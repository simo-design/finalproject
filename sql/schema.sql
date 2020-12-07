    Create Database USERTABLES;
     
    USE USERTABLES;
     


    CREATE TABLE `users` (
        `ID` int(10) UNSIGNED NOT NULL,
        `firstname` varchar(20) NOT NULL,
        `lastname` varchar(20) NOT NULL,
        `password` varchar(20) NOT NULL,
        'email' varchar(50) NOT NULL,
        'date_joined' DATETIME NOT NULL,
        `Password_digest` varchar(64) NOT NULL,
        `salt` varchar(32) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    INSERT INTO users(email, password) values ('admin@project2.com', 'password123');

    CREATE TABLE `issues` (
        `ID` int(10) UNSIGNED NOT NULL,
        `title` varchar(20) UNSIGNED NOT NULL
        `description` text(300) NOT NULL,
        `type` varchar(30) NOT NULL,
        `priority` varchar(20) NOT NULL,
        'status' varchar(20) NOT NULL,
        `assigned_to` int(10) UNSIGNED NOT NULL,
        `created_by` int(10) UNSIGNED NOT NULL,
        `created` DATETIME UNSIGNED NOT NULL,
        `updated` DATETIME UNSIGNED NOT NULL,



        'date_joined' DATETIME NOT NULL,
        `Password_digest` varchar(64) NOT NULL,
        `salt` varchar(32) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8;