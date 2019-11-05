from flask import Flask,render_template,request
import mysql.connector
import time
import redis

import hashlib
import pickle
import random
application= Flask(__name__)

config = {
  'host':'mydb.c2q2jxhtggjb.us-west-2.rds.amazonaws.com',
  'user':'rachana',
  'password':'rachana168',
  'database':'rachanadb'
}

@application.route('/')
def index():



    return render_template("assign6.html")

@application.route('/display',methods=['POST','GET'])
def display():
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()
    print("Connection...")
    row10=[]
    row11=[]
    row12=[]
    row13=[]
    row14=[]
    row15=[]
    row16=[]
    row17=[]
    row18=[]
    start = time.time()
    if request.method=='POST':
        #num=request.form['num']
        #r1=request.form['r1']
        #r2=request.form['r2']
        #r3=request.form['r3']
        #r4=request.form['r4']


        #num=request.form['num']
        #for i in range(int(num)):
            #query="SELECT age,fare FROM titanic3 where age>'"+str(num)+"'"
            #query="select name from titanic3 where age between '"+str(r1)+"' and '"+str(r2)+"' and parch between '"+str(r3)+"' and '"+str(r4)+"'"
            #query="select count(*) from titanic3 where fare between '"+str(r1)+"' and '"+str(r2)+"'"
        #query="select min(fare) from titanic3 where fare>200"
        query='select ten, eleven, twelve, thirteen,fourteen,fifteen,sixteen,seventeen,eigtheen from population where States="Oklahoma" or States="Louisiana" or States="Tennessee" '
        print(query)
        cursor.execute(query)
        result = cursor.fetchall()

        for i in range(len(result)):
            row10.append(result[i][0])
            row11.append(result[i][1])
            row12.append(result[i][2])
            row13.append(result[i][3])
            row14.append(result[i][4])
            row15.append(result[i][5])
            row16.append(result[i][6])
            row17.append(result[i][7])
            row18.append(result[i][8])
    end = time.time()
    etime = end - start
    print(row10)

    return render_template("results.html",value0=row10,value1=row11,value2=row12,value3=row13,value4=row14,value5=row15,value6=row16,value7=row17,value8=row18,time=etime)


@application.route('/display1',methods=['POST','GET'])
def display1():
    conn = mysql.connector.connect(**config)
    cursor = conn.cursor()
    print("Connection...")
    row10=[]
    row11=[]
    row12=[]
    row13=[]
    row14=[]
    row15=[]
    row16=[]
    row17=[]
    row18=[]
    start = time.time()
    if request.method=='POST':
        #num=request.form['num']
        #r1=request.form['r1']
        #r2=request.form['r2']
        #r3=request.form['r3']
        #r4=request.form['r4']


        #num=request.form['num']
        #for i in range(int(num)):
            #query="SELECT age,fare FROM titanic3 where age>'"+str(num)+"'"
            #query="select name from titanic3 where age between '"+str(r1)+"' and '"+str(r2)+"' and parch between '"+str(r3)+"' and '"+str(r4)+"'"
            #query="select count(*) from titanic3 where fare between '"+str(r1)+"' and '"+str(r2)+"'"
        #query="select min(fare) from titanic3 where fare>200"
        query='select ten, eleven, twelve, thirteen,fourteen,fifteen,sixteen,seventeen,eigtheen from population where States="Oklahoma" or States="Louisiana" or States="Tennessee" '
        print(query)
        cursor.execute(query)
        result = cursor.fetchall()

        for i in range(len(result)):
            row10.append(result[i][0])
            row11.append(result[i][1])
            row12.append(result[i][2])
            row13.append(result[i][3])
            row14.append(result[i][4])
            row15.append(result[i][5])
            row16.append(result[i][6])
            row17.append(result[i][7])
            row18.append(result[i][8])
    end = time.time()
    etime = end - start
    print(row10)

    return render_template("results1.html",value0=row10,value1=row11,value2=row12,value3=row13,value4=row14,value5=row15,value6=row16,value7=row17,value8=row18,time=etime)



if __name__ == '__main__':

    application.run(debug='true')

