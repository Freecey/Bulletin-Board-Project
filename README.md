# BBS-QUEEN Team

A simple bulletin board system based on ```PHP``` and ```MySQL```.

___
## Live Demo

http://bbs-queen.neant.be/
https://bbs-queen.herokuapp.com/

___
## Features

### Generals
- responsive design
- session with cookies
- Policy & Terms
- 404 & 50x page error

### User management
- register system
- Login system
- Password recovery (with secret question set in profile page)
- Profile pages(views and editing)
- user image using gravatar
- Admin Section
- User Permission lvl

### Content
- Create & edit Board
- Create & edit Topic
- Post and reply to topic message
- Search in Topics name and messages content

### Soon
- Markdown interpretation for content (in post/sign/desciption)
- emojis supported

___
## Technology used and specification

- html.
- css.
- php.
- mysql.
- sass.
- bootstrap.
- Javascript.

___
## Screen Shot

See [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki) for screen shot
___
## Folder Structure

```
    .
    ├── .sass-cache/                # sass cache folder
    ├── admin/                      # Admin/Moderator Section management
    ├── assets/                     # folder for
    ├── css/                        # folder for CSS files
    ├── includes/                   # folder for All php content 
    │   ├── admin/
    │   └── function/
    ├── js/                         # folder for JS script
    ├── node_modules/               # folder for all node modules
    ├── resources/
    └── sass/                       # SASS lib
```    
more info on Files & Folders Structure See [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki/Files-Folder-Structure)
___

## Database Structure

For explaine of tables see [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki/DataBase-Structure)

![alt text](resources/db_strucure.jpg?raw=true "Database Structure" )

(pvmsg table is not used at this time, create for future feature)

___

## Installation (Debian-based Linux Distributions)

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

4. Modify `includes/connect.php` with the wanted user and password and your database name.

5. Modify `resources/bbs-queen.sql` Line 5 with the wanted user and password and your database name (same user/pass of `includes/connect.php`).

6. Import Database + table structure ( bbs-queen.sql is in resources folder )bbs-queen.sql
```
mysql -u username -p < bbs-queen.sql
```
or
```
sudo mysql < bbs-queen.sql
```

___
## Wiki

More info see Wiki [Click Here](https://github.com/Freecey/Bulletin-Board-Project/wiki)

___
## Contributor


![alt text](resources/tream-4p.jpg?raw=true "Team Pictures" )


* Tanya Leenders    [@Tanya-Amber-L](https://github.com/Tanya-Amber-L)
* Alan Massaro      [@macmowl](https://github.com/macmowl/)
* Kevin CASSART     [@KevKsar](https://github.com/KevKsar/)
* Cedric AUDRIT     [@freecey](https://github.com/freecey/)

___
## License
Please see [LICENSE](https://raw.githubusercontent.com/Freecey/Bulletin-Board-Project/master/LICENSE) file for more details.
