FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
    && php composer-setup.php \
    && php -r "unlink('composer-setup.php');"

# Install selected extensions and other stuff
#RUN apt-get update \
#    && apt-get -y --no-install-recommends install  php7.2-mysql php7.2-mongodb \
#    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

## Install git
#RUN apt-get update \
#    && apt-get -y install git \
#    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
#
## Install yarn
#RUN curl -sL https://deb.nodesource.com/setup_8.x | bash - && \
#    curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - && \
#    echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list && \
#    apt-get update && \
#    apt-get install -qq -y build-essential nodejs yarn \