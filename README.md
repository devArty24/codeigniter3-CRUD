# CRUD Codeigniter

* [About Project](#about-project)
* [Key Features](#key-features)
* [Installation](#installation)

## About Project

Code of a basic CRUD, to register doctors in a hospital, users are listed in a table and with paging in addition to a basic login

## Key Features

1. PHP
2. Codeigniter v3.1.11
3. Mysql
4. JavaScript
5. Jquery
6. Bootstrap 4
7. SweetAlert2

## Installation

First import the hospital.sql file

```sh
dataBaseBackup/hospital.sql
```
Adapt the variable `$config['base_url']` in `application/config/config.php` in case you occupy port and the name of the root folder changes

```sh
$config['base_url'] = 'http://localhost/nameOfProject/';
```
When a user is registered, simulate an email to the new user who has registered

The configuration for the mail server is in `application/config/emai.php` there you must put the information of your mail server

```sh
$config = Array(
    'protocol' => 'smtp', // Or pop3
    'smtp_host' => 'host', // Your mail server hostname
    'smtp_port' => 000, // Number port
    'smtp_user' => 'user', // Your mail server username
    'smtp_pass' => 'password', // Your mail server password
    'crlf' => "\r\n",
    'newline' => "\r\n",
    "mailtype"=>"html"
  );
```






