###########################
# FrankenPHP builder
###########################
FROM dunglas/frankenphp:1.2.0-builder-php8.3.8 AS builder

# Installation de modules PHP
RUN install-php-extensions \
    #apcu \
    #intl \
    #opcache \
    #pdo \
    #pdo_mysql \
    zip

###########################
# FrankenPHP runner
###########################
FROM dunglas/frankenphp:1.2.0-php8.3.8 AS runner

ARG USER=www-data

WORKDIR /var/www/nyuw_dev

COPY --from=builder /usr/local/bin/frankenphp /usr/local/bin/frankenphp
COPY ./php/opcache.ini $PHP_INI_DIR/conf.d/opcache.ini
COPY ./Caddyfile /etc/caddy/Caddyfile

RUN mv $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini

RUN \
    useradd -D ${USER}; \
    setcap CAP_NET_BIND_SERVICE=+eip /usr/local/bin/frankenphp; \
    chown -R ${USER}:${USER} /data/caddy && chown -R ${USER}:${USER} /config/caddy

USER ${USER}
