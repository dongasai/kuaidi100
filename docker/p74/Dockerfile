
FROM php:7.4-cli


RUN sed -i "s@http://\(deb\|security\).debian.org@https://mirrors.aliyun.com@g" /etc/apt/sources.list


RUN apt-get update
RUN apt-get install -y vim wget zip zlib1g-dev autoconf automake libtool libzip-dev

WORKDIR /home

# 安装 oniguruma
ENV ORIGURUMA_VERSION=6.9.8

RUN wget https://github.com/kkos/oniguruma/archive/v${ORIGURUMA_VERSION}.tar.gz -O oniguruma-${ORIGURUMA_VERSION}.tar.gz \
    && tar -zxvf oniguruma-${ORIGURUMA_VERSION}.tar.gz \
    && cd oniguruma-${ORIGURUMA_VERSION} \
    && ./autogen.sh \
    && ./configure \
    && make \
    && make install
# 安装必要的扩展
RUN docker-php-ext-install bcmath mbstring  zip;docker-php-ext-enable bcmath mbstring  zip ;



# 安装composer
RUN wget https://mirrors.aliyun.com/composer/composer.phar \
	&& mv composer.phar /usr/local/bin/composer \
	&& chmod +x /usr/local/bin/composer && composer config -g repos.packagist composer https://mirrors.cloud.tencent.com/composer/


WORKDIR /var/www/html
