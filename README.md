# Reverse Engineering
This repository contains the code of "Reverse Engineering" event under DCOD. Reverse engineering is a competition through which, a developer can test his PHP decoding skills. This PHP code uses some simple (but complex looking) functions.

# Installation

## Ubuntu 

1. Update your system.
```
$ sudo apt-get update
```

2. Install Apache server
```
$ sudo apt-get install apache2
```

3. Install PHP 5.6
```
$ sudo apt-get install python-software-properties
$ sudo add-apt-repository ppa:ondrej/php
$ sudo apt-get update
$ sudo apt-get install -y php5.6
```

4. Copy the folder to /var/www/html

5. Install mysql

```
$ sudo apt-get install mysql-server
```

5. Configure mysql (setting up root password and other settings) by running the following command.
```
$ mysql_secure_installation
```

6. Install phpmyadmin.
```
$ sudo apt-get install phpmyadmin php-mbstring php-gettext
$ sudo phpenmod mcrypt
$ sudo phpenmod mbstring
```

7. Restart apache server.
```
$ sudo systemctl restart apache2
```
8. Goto localhost/phpmyadmin

9. Create a database named 'reverse-engineering-v2'.

10. Import the .sql file present in the git repository.

11. Goto localhost/reverse_engineering-dcod-mca-cet to view the site.

I added only ubuntu's detailed installation because, we used Ubuntu for setting up our server. For installing in other OS, refer [this link](https://www.sashwat.in/web/PHP-installation/).

# Contributors
1. [Sashwat K](https://www.sashwat.in)
2. [Tarun P Karun](https://www.tharunpkarun.com/)
