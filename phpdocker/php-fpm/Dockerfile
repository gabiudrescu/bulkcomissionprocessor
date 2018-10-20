FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

ENV APPLICATION_UID 1000
ENV APPLICATION_USER application
ENV APPLICATION_GID 1000
ENV APPLICATION_GROUP application

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php7.2-mysql php-redis \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# Install git
RUN apt-get update \
    && apt-get -y install git \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN groupadd -g "$APPLICATION_GID" "$APPLICATION_GROUP"
RUN useradd -u "$APPLICATION_UID" --home "/home/$APPLICATION_USER" --create-home --shell /bin/bash --no-user-group "$APPLICATION_GROUP" -g "$APPLICATION_GID"
