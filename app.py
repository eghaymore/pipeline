#!/usr/bin/env python3
# -*- coding: utf-8 -*-
import psycopg2
import sys
import csv
import json

db_host = 'localhost'
db_port = '5432'
db_name = 'customers'
db_user = 'dba'
db_password = 'haha'

inpt=None
while(inpt != '0'):
    # Menu
    inpt = input("(0) Exit\n(1) Query by last name\n(2) Query by area code\n(3) Query by phone number\nEnter your selection:")

    # Form query
    match inpt:
        case '0':
            break
        case '1':
            lname = input("Enter lastname to query by:")
            query = f"SELECT * from customers WHERE lastname = '{lname}';"
        case '2':
            acode = input("Enter areacode to query by:")
            query = f"SELECT * from customers WHERE areacode = '{acode}';"
        case '3':
            phonenum = input("Enter phone number to query by:")
            query = f"SELECT * from customers WHERE phonenumber = '{phonenum}';"

    try:
        # Establish a connection to the PostgreSQL database
        connection = psycopg2.connect(
            host=db_host,
            port=db_port,
            database=db_name,
            user=db_user,
            password=db_password
        )

        # Create a cursor object to interact with the database
        cursor = connection.cursor()
        
        # Execute a SQL query to get the PostgreSQL server version
        cursor.execute(query)

        # Fetch the result and output
        result = cursor.fetchall()
        
        # Report
    # =============================================================================
        print("PostgreSQL:\n",'(order_id, firstname, lastname, areacode, phone, email, total)')
        for item in result:
            print(item)
    # =============================================================================
        
        # with open('query-demo-data.csv', mode='w', newline='') as file:
        #     writer = csv.writer(file, delimiter = '~')
        #     for item in result:
        #         writer.writerow(item)
        
        # with open("query-demo-data.json", "w") as outfile:
        #     json.dump(result, outfile)
        
    except psycopg2.Error as e:
        print("Error connecting to the database:", e)

    finally:
        # Close the cursor and connection
        if cursor:
            cursor.close()
        if connection:
            connection.close()
