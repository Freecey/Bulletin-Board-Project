# BBS-QUEEN Team

A simple bulletin board system based on ```PHP``` and ```MySQL```.

___

## Live Demo

 [https://bbs-queen.neant.be/](https://bbs-queen.neant.be/)
 
 [https://bbs-queen.herokuapp.com/](http://bbs-queen.neant.be/)

___

## Features

### Generals
- responsive design
- session browser
- Policy & Terms
- 404 & 50x page error
- Private messaging
- contact form
- multi theme

### User management
- register system
- Login system
- Password recovery (with secret question set in profile page)
- Profile pages(views and editing)
- user image using gravatar or personnal
- Admin Section
- User Permission lvl (user, moderator, admin, ...)
- Ban users system
- log failed login (store IP, Browser/OS, URLfrom, Datetime, email and password try)
- log login access

### Content
- Create & edit Board
- Create & edit Topic
- Post and reply to topic message
- Search in Topics name and messages content
- Markdown interpretation for content
- emojis supported
- Email notification
- Secret Boards (access with a special word in search bar)

### Admin Section
- only for moderator and admin
- Announces creation/edition
- boards creation/edition
- topics edition (creation link to create link normal user)
- Users edition (only for admin)
- Site Setting (only for admin)
- Email seting/Test page (for use with phpmailer)

___

## Technology used and specification

- html.
- css.
- php.
- mysql.
- sass.
- bootstrap.
- Javascript.
- phpmailer
- emojiReaction

___

## Screen Shot

![alt text](resources/Screenshot/SS_BSS-QUEEN-main.png "Main Theme" )

![alt text](resources/Screenshot/SS_BSS-QUEEN-main-blue.png "Dark Blue Theme" )

More See [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki) for screen shot

___
## Folder Structure

```
    .
    ├── .github/                    # .github
    ├── .sass-cache/                # sass cache folder
    ├── .vscode/                    # json file setting
    ├── admin/                      # Admin/Moderator Section management
    ├── assets/                     # folder for img
    │   ├── 404/
    │   ├── 500/
    │   ├── avatar/
    │   ├── pwdforgot/
    │   └── topics/
    ├── css/                        # folder for CSS files
    ├── includes/                   # folder for All php content 
    │   ├── admin/
    │   ├── emojiReaction/
    │   ├── function/
    │   ├── getdata/
    │   ├── modal/
    │   └── pvmsg/
    ├── js/                         # folder for JS script
    ├── node_modules/               # folder for all node modules
    ├── resources/
    ├── sass/                       # SASS lib
    ├── uploaded/
    │   └── users/                  # Upload folders for user avatar
    └── vendor/
        ├── composer/
        └── phpmailer/
            ├──language
            └── src
```    
more info on Files & Folders Structure See [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki/Files-Folder-Structure)
___

## Database Structure

For explaine of tables see [Wiki](https://github.com/Freecey/Bulletin-Board-Project/wiki/DataBase-Structure)

![alt text](resources/db_structure.png?raw=true "Database Structure" )

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
        
        ErrorDocument 404 /404.php
        ErrorDocument 500 /500.php
        ErrorDocument 502 /500.php
        ErrorDocument 503 /500.php
        ErrorDocument 504 /500.php
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


![alt text](resources/team-5p.jpg?raw=true "Team Pictures" )


* Tanya Leenders    [@Tanya-Amber-L](https://github.com/Tanya-Amber-L)
* Aline-Daems       [@Aline-Daems](https://github.com/Aline-Daems)
* Alan Massaro      [@macmowl](https://github.com/macmowl/)
* Kevin CASSART     [@KevKsar](https://github.com/KevKsar/)
* Cedric AUDRIT     [@freecey](https://github.com/freecey/)

___

## License
Please see [LICENSE](https://raw.githubusercontent.com/Freecey/Bulletin-Board-Project/master/LICENSE) file for more details.
