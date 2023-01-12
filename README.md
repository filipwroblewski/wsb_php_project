# Seedling Management System

## Overview

[![YouTube video](https://img.youtube.com/vi/vjTB9XMJVqM/0.jpg)](http://www.youtube.com/watch?feature=player_embedded&v=vjTB9XMJVqM)

## Users
- Admin
  - display users
  - remove users
  - change user data: name, email, role(_admin, employee, user_)
  - add new user (name, email, role)
- Employee
  - display seedlings
  - remove seedlings
  - change seedling data: name, description, price, quantity
  - add new seedling data: name, description, price, quantity
  - display orders
  - set order as sent + send email notification
- User (default)
  - display seedlings
  - place order (select seedlings, set quantity per seedling)
  - payment using PayPal
  - display orders
  - display ready orders

## Database structure

Users table

```sql
CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` set('user','admin','employee') NOT NULL DEFAULT 'user',
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

![users table](./img/db%20users.jpg)

Seedlings table

```sql
CREATE TABLE `seedlings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

![users table](./img/db%20seedlings.jpg)

Orders table

```sql
CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `seedling_id` int(10) UNSIGNED NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

![users table](./img/db%20orders.jpg)

Payments table

```sql
CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `full_price` float NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

![users table](./img/db%20payments.jpg)

## Functionalities

- passwords encrypted using argon
- user data sending by sessions
- after successful purchase data are insert into database
- payment realised using PayPal and sandbox account
- email notification realised by PHPMailer
- MySQL is used for database
