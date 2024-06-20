FROM nginx:stable-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

# MacOS staff group's gid is 20, so is the dialout group in alpine linux. We're not using it, let's just remove it.
RUN delgroup dialout

RUN addgroup -g ${GID} --system fenix_cinema_network
RUN adduser -G fenix_cinema_network --system -D -s /bin/sh -u ${UID} fenix_cinema_network
RUN sed -i "s/user  nginx/user fenix_cinema_network/g" /etc/nginx/nginx.conf

ADD ./configs/nginx/default.conf /etc/nginx/conf.d

RUN mkdir -p /var/www/html
