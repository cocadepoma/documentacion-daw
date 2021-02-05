    FROM node:14
    RUN useradd --user-group --create-home --shell /bin/false app
    RUN mkdir /usr/src/app
    WORKDIR /usr/src/app
    RUN npm install -g @angular/cli
    EXPOSE 4200
