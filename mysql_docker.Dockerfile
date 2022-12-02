FROM mysql

#building mysql
RUN rm -rf mysql-data
COPY my.cnf /etc/mysql/my.cnf
COPY db.sql /docker-entrypoint-initdb.d/