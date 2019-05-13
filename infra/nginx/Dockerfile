FROM nginx:latest

COPY wait-for-it.sh /wait-for-it.sh
RUN chmod +x /wait-for-it.sh

ADD default.conf /etc/nginx/conf.d/default.conf