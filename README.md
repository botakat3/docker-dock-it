# Author Site Demo
 
## Create .env file
```shell
cp -n .env.example .env
```
... and update variables. 

You should also create a __separate mount/volume__ to create a new database unless you have backup/init scripts setup.

## Launch environment

Execute the docker-compose.yml file: 
```shell
docker compose up -d
```

## Install and activate plugins
Replace author-final-wpcli-1 with your wpcli name
```shell
docker exec -it author-final-wpcli-1 bash -c " 
wp plugin delete hello akismet ; 
wp plugin install blockart-blocks --version=2.0.3 --activate
wp plugin install loco-translate --version=2.6.2 --activate
wp plugin install health-check query-monitor everest-forms --activate ;  
wp plugin activate kb-books ;
wp theme activate wpd_finalproject ;
wp theme delete twentytwentythree twentytwentyfour twentytwentyfive;"
```

### WordPress
<http://localhost>

### phpMyAdmin
<http://localhost:8081>


