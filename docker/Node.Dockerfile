FROM node

RUN apt-get update && apt-get install -y \
    vim \
    zip \
    unzip \
    curl

USER node

WORKDIR /var/www/trafficLightTest