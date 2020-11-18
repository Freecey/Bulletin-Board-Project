# Bulletin-Board-Project

A simple bulletin board system based on PHP and MySQL.


## Features

- register system
- Login system
- Post and reply

## Technology used and specification


- html.
- css.
- php.
- mysql.
- sass.
- bootstrap.

___
## Folder Structure

    .
    ├── .sass-cache/                # sass cache folder
    ├── css/                        # folder for CSS files
    │   ├── main.css 
    │   └── main.css.map 
    ├── includes/                   # folder for All php content 
    │   ├── boards.php 
    │   ├── breadcrumb.php
    │   ├── connect.php
    │   ├── footer.php
    │   ├── header.php
    │   ├── profile.php
    │   ├── search.php
    │   ├── signin.php
    │   ├── signup.php
    │   ├── topics.php
    │   └── topics.php
    ├── node_modules/               # folder for all node modules
    │   ├── .bin 
    │   ├── anymatch 
    │   ├── binary-extentions 
    │   ├── bootstrap 
    │   ├── braces 
    │   ├── chokidar 
    │   ├── fill-range 
    │   ├── fsevents 
    │   ├── glob-parent
    │   ├── is-binary-path
    │   ├── is-extglob
    │   ├── is-number
    │   ├── normalize-path
    │   ├── picomatch
    │   ├── readdirp
    │   ├── sass
    │   └── to-regex-range
    ├── sass/    
    ├── index.php
    ├── LICENSE
    ├── package-lock.json
    ├── package.json
    └── README.md
    

___

## Installation (debian base)

1. Install `Apache`, `PHP` and `MySQL`.
```
sudo apt install apache2
sudo apt install php libapache2-mod-php php-mysql php-mbstring 
sudo apt install mysql-server mysql-client
```
MySQL will require a password for the root during the installation.

2. You may also install `phpmyadmin` if you want to visualize the database.
```
sudo apt install phpmyadmin
sudo ln -s /usr/share/phpmyadmin /path/to/site
```
Choose apache2 as the web server, and enter your root password for MySQL.

3. Add the following lines to `/etc/apache2/sites-enabled/000-default.conf` to configure the site.
```
DocumentRoot /path/to/site
<Directory /path/to/site/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
```
And restart your apache by
```
sudo systemctl restart apache2
```

4. Modify `includes/connect.php` with your root password and your database name.

5. Reset the database through `localhost

## Contributor


![alt text](https://i.redd.it/9mz53k9vxyy01.jpg "Team Pictures" )


* Tanya Leenders    [@Tanya-Amber-L](https://github.com/Tanya-Amber-L)
* Alan Massaro      [@macmowl](https://github.com/macmowl/)
* Kevin CASSART     [@KevKsar](https://github.com/KevKsar/)
* Cedric AUDRIT     [@freecey](https://github.com/freecey/)


## License
Please see [LICENSE](https://raw.githubusercontent.com/Freecey/Bulletin-Board-Project/master/LICENSE) file for more details.