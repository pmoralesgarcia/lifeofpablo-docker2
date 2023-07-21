server {


        server_name copy.lifeofpablo.com;

  location / {
    proxy_set_header  Host $http_host;
    proxy_set_header  X-Forwarded-Proto http;
    proxy_pass        http://127.0.0.1:8080;
  }

}
