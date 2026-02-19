# Use PHP 8.3 CLI as base image
FROM php:8.3-cli

# Install system dependencies and PHP extensions
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        curl \
        ca-certificates \
        libzip-dev \
        libicu-dev \
        libxml2-dev \
        default-jre \
        wget \
    && docker-php-ext-install intl zip dom xml \
    && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Install Saxon Home edition for Java
RUN wget -nv "https://github.com/Saxonica/Saxon-HE/releases/download/SaxonHE12-9/SaxonHE12-9J.zip" -O /tmp/saxon.zip && \
    unzip /tmp/saxon.zip -d /opt/saxon && \
    rm /tmp/saxon.zip

ENV PATH="/opt/saxon/bin:${PATH}"

ENV SAXON_JAR="/opt/saxon/saxon-he-12.9.jar"




