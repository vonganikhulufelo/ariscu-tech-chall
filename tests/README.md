## Softwares

- php 7.4 (You could download xamp)
- Mysql
- Composer (https://getcomposer.org/) 
- codeigniter settings (http://codeigniter.com/)

## Database preparation

- Create database on local environment and update DB settings on /app/config/database.php

## Application preparation 

	# Run this commands bellow:
	- composer install
	- php spark migrate
	- php spark command:GenerateStoriesAndComments (This will take a while and while is it busy running, you can start app on another terminal)
	- php spark serve

The app will will up and running. Type "http://localhost:8080/" on your browser

NB: I dicided to use command to populate DB because the data was too big and the browser were timed out. 

