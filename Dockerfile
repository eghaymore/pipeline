# Use the official PostgreSQL image as the base image
FROM postgres:latest

# Set the locale
RUN apt-get update && apt-get install -y locales locales-all
ENV LANG en_US.utf8
ENV LC_ALL en_US.utf8

# Install Python and any required dependencies
#RUN apt-get update && apt-get install -y python3 python3-pip

# Install psycopg2
#RUN apt-get update && apt install python3-psycopg2

# Copy Python program into the container
#COPY app.py /app.py

# Setup backup directory
RUN mkdir /backup/

# Copy database backups into container
COPY customers_backup.sql /backup/

