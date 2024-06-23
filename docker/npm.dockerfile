FROM node:current-alpine

RUN mkdir -p /var/www/html
WORKDIR /var/www/html

ENTRYPOINT ["npm"]