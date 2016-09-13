For Linux users:  
    - To connect to Postgresql from terminal:  
		`sudo psql -U [username] -h localhost -p 5432 --dbname=[dbname]`
  
  
How to deploy:   
    - Start server: `[bitnami-lamp-folder]/.ctlscript.sh start`  
    - Clone Git folder: `git clone [gitlab-link] [bitnami-lamp-folder]/apache2/htdocs/` 
    - Change password in `php/connect_database.php`
    - Create `USER` table: `http://localhost:8080/php/user_query_handler.php?query=init`  
    - Create `PROJECT` table: `http://localhost:8080/php/project_query_handler.php?query=init`  
