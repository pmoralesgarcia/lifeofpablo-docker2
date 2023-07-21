server {


        root /var/www/docs.saccds.org/BookStack/public;
        index index.php index.html index.htm;

        server_name reader.lifeofpablo.com;
client_body_timeout 360s;

  location / {
    try_files $uri $uri/ /index.php?$query_string;
  }

  location ~ \.php$ {
    include snippets/fastcgi-php.conf;
    fastcgi_pass unix:/run/php/php8.2-fpm.sock;
  }

client_max_body_size 64M;


}
