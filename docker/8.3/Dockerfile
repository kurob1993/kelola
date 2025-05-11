FROM ubuntu:24.04 as builder

ARG NODE_VERSION=20
ARG MYSQL_CLIENT="mysql-client"
ARG POSTGRES_VERSION=17

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND=noninteractive

# Tambahkan konfigurasi apt yang diperlukan
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && echo "Acquire::http::Pipeline-Depth 0;" > /etc/apt/apt.conf.d/99custom \
    && echo "Acquire::http::No-Cache true;" >> /etc/apt/apt.conf.d/99custom \
    && echo "Acquire::BrokenProxy true;" >> /etc/apt/apt.conf.d/99custom

# Install paket yang dibutuhkan saja untuk build
RUN apt-get update && apt-get upgrade -y gnupg curl ca-certificates \
    && mkdir -p /etc/apt/keyrings \
    && apt-get install -y curl ca-certificates zip unzip git \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.3-cli php8.3-dev \
       php8.3-pgsql php8.3-gd php8.3-curl php8.3-imap php8.3-mysql php8.3-mbstring \
       php8.3-xml php8.3-zip php8.3-bcmath php8.3-intl php8.3-readline php8.3-ldap \
       php8.3-msgpack php8.3-igbinary php8.3-redis php8.3-memcached php8.3-pcov php8.3-imagick \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

    # Install Node.js dan npm dari NodeSource
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION}.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Salin aplikasi
COPY . /var/www/html
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN php artisan key:generate \
    && php artisan config:cache \
    && php artisan route:cache \
    && php artisan view:cache

RUN npm install && npm run build
    
# Aplikasi yang sebenarnya
FROM ubuntu:24.04

LABEL maintainer="https://okuru.id"

ARG WWWGROUP
ARG WWWUSER

WORKDIR /var/www/html

ENV TZ=Asia/Jakarta
ENV DEBIAN_FRONTEND=noninteractive
ENV SUPERVISOR_PHP_COMMAND="/usr/bin/php -d variables_order=EGPCS /var/www/html/artisan serve --host=0.0.0.0 --port=80"
ENV SUPERVISOR_PHP_USER='sail'

# Konfigurasi timezone
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Install paket yang diperlukan untuk runtime saja
RUN apt-get update && apt-get upgrade -y \
    && mkdir -p /etc/apt/keyrings \
    && apt-get install -y gnupg gosu curl ca-certificates supervisor libcap2-bin \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0x14aa40ec0831756756d7f66c4f4ea0aae5267a6c' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.3-cli \
       php8.3-pgsql php8.3-mysql php8.3-gd php8.3-curl php8.3-mbstring \
       php8.3-xml php8.3-zip php8.3-bcmath php8.3-intl \
       php8.3-redis php8.3-msgpack php8.3-igbinary \
       ncdu vim \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Konfigurasi PHP untuk production
RUN mkdir -p /etc/php/8.3/cli/conf.d/
COPY ./docker/8.3/php.ini /etc/php/8.3/cli/conf.d/99-sail.ini

# Tambahkan konfigurasi OPcache untuk produksi
RUN echo "opcache.enable=1" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.enable_cli=1" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.jit=1255" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.jit_buffer_size=100M" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.memory_consumption=256" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.interned_strings_buffer=16" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.max_accelerated_files=20000" >> /etc/php/8.3/cli/conf.d/10-opcache.ini \
    && echo "opcache.validate_timestamps=0" >> /etc/php/8.3/cli/conf.d/10-opcache.ini

# Berikan izin binding ke port rendah
RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.3

# Buat user non-root untuk menjalankan aplikasi
RUN groupadd --force -g ${WWWGROUP} sail
RUN useradd -ms /bin/bash --no-user-group -g ${WWWGROUP} -u ${WWWUSER} sail

# Salin script dan konfigurasi supervisor
COPY ./docker/8.3/start-container /usr/local/bin/start-container
COPY ./docker/8.3/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
RUN chmod +x /usr/local/bin/start-container

# Salin aplikasi
COPY --from=builder /var/www/html /var/www/html

RUN chown -R sail:sail /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Ports
EXPOSE 80/tcp

# Jalankan container
ENTRYPOINT ["start-container"]