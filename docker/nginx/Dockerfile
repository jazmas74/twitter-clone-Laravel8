FROM nginx:1.21.3-alpine

ENV TZ=UTC

# nginx config file
COPY ./*.conf /etc/nginx/conf.d/

WORKDIR /var/www/html