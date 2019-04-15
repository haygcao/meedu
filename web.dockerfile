FROM nginx:1.13-alpine
MAINTAINER azure<https://baiyue.one>
#web服务器 larve框架base
ENV TZ=Asia/Shanghai

ADD vhost.conf /etc/nginx/conf.d/default.conf
