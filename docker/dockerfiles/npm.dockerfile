FROM node:current-alpine

RUN mkdir -p /var/www/app
WORKDIR /var/www/app

ENTRYPOINT ["npm"]