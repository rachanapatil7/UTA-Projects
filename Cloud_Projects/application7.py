from flask import Flask,render_template,request
import mysql.connector
#import sqlite3



config = {
  'host':'mydb.c2q2jxhtggjb.us-west-2.rds.amazonaws.com',
  'user':'rachana',
  'password':'rachana168',
  'database':'rachanadb'
}

application= Flask(__name__)



@application.route('/')
def index():
    return render_template("assign6.html")


@application.route('/update',methods=['POST','GET'])
def update():
    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]
    if request.method=='GET':
        d1=request.args.get('d1', '')
        d2=request.args.get('d2', '')
        que="SET SQL_SAFE_UPDATES = 0"
        tru=cur.execute(que)
        if(tru):
            print("sucess")
        else:
            print("No sucess")
        query="UPDATE students SET Age='"+str(d1)+"' where IdNum='"+str(d2)+"'"

        print(query)
        tr=cur.execute(query)
        if(tr):
            print("sucess")
        else:
            print("No sucess")

    return "Success"


@application.route('/display',methods=['POST','GET'])
def display():

    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]
    res=[]

    if request.method=='GET':


        d1=request.args.get('d1', '')

        d2=request.args.get('d2', '')

        query="SELECT * FROM students where IdNum='"+str(d1)+"' and Fname='"+str(d2)+"'"
        print(query)
        cur.execute(query)
        rows = cur.fetchall()
        if(query):
            {
                print("Existing")


            }
        else:
            {
                print("Not")

            }





        print(rows)


    return render_template("results.html",value=rows,value1=res)


@application.route('/insert',methods=['POST','GET'])
def insert():

    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]
    res=[]

    if request.method=='POST':

        d1 = request.form["d1"]

        d2 = request.form["d2"]

        d3 = request.form["d3"]




        query="INSERT INTO students(IdNum,Fname,Course) VALUES ('d1','d2','d3')"
        print(query)
        cur.execute(query)
        #rows = cur.fetchall()
        if(query):
            {
                print("Inserted")


            }
        else:
            {
                print("Not")

            }





        print(rows)


    return "Success"

@application.route('/display1',methods=['POST','GET'])
def display1():

    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]


    if request.method=='POST':


        query="SELECT * FROM students"
        print(query)

        cur.execute(query)
        rows = cur.fetchall()






        print(rows)


    return render_template("results.html",value=rows)


@application.route('/enroll',methods=['POST','GET'])
def enroll():

    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]
    res=[]

    if request.method=='POST':

        d1 = request.form["d1"]
        #d1=request.args.get('d1', '')
        #print(d1)
        d2 = request.form["d2"]
        #d2=request.args.get('d2', '')
        #d3=request.args.get('d3', '')
        d3 = request.form["d3"]


        #query="SELECT * FROM students where IdNum='"+str(d1)+"' and Fname='"+str(d2)+"'"
        query="SELECT * from  students where  Course='1105' and Idnum='10012'"
        print(query)
        cur.execute(query)
        #rows = cur.fetchall()
        if(query):
            {
                print("Enrolled")


            }
        else:
            {
                print("Not")

            }





        print(rows)


    return render_template("results.html",value=rows)
   

@application.route('/courseenroll',methods=['POST','GET'])
def courseenroll():

    connection = mysql.connector.connect(**config)
    cur = connection.cursor()
    rows=[]


    if request.method=='POST':

        d1 = request.form["d1"]

        print(d1)



        query="SELECT * FROM students where IdNum='"+str(d1)+"' and Fname='"+str(d2)+"'"
        query="SELECT count(*) from Fall2019 where Course='"+str(d1)+"'"
        print(query)
        cur.execute(query)
        rows = cur.fetchall()
        if(query):
            {
                print("Enrolled")


            }
        else:
            {
                print("Not")

            }





        print(rows)


    return render_template("results.html",value=rows)

if __name__ == '__main__':

    application.run(debug='true')



