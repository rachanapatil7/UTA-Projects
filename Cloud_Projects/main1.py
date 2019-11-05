import os
import ibm_db
from flask import Flask,redirect,render_template,request
import urllib
import datetime
import json

app = Flask(__name__)

port=int(os.getenv("VCAP_APP_PORT"))


@app.route('/')
def index():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")

    query="SELECT * FROM people"
    stmt=ibm_db.prepare(con,query)
    ibm_db.execute(stmt);
    row=[]

    result = ibm_db.fetch_assoc(stmt)
    while result != False:
        row.append(result.copy())
        result = ibm_db.fetch_assoc(stmt)

    ibm_db.close(con)

    return render_template('assign1.html', value=row)


@app.route('/search',methods=['POST','GET'])
def search():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")



    if request.method=="POST":
        name=request.form['n']
        query='select "Picture","Name" from people where "Name"=\''+name+'\''

        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);
        row=[]
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)
        return render_template('searchresult.html', value=row)

    return render_template("search.html")


@app.route('/displaypics',methods=['POST','GET'])

def displaypics():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6","","")

    if request.method=="POST":
        salary=request.form['s']

        query='select "Picture" from people where "Salary"<\''+salary+'\''
        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);
        row=[]
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)



        return render_template('displaypics.html', value=row)

    return render_template('display.html')


@app.route('/addpics',methods=['POST','GET'])
def addpics():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6","","")
    if request.method=="POST":
        name=request.form['n']
        picture=request.form['p']


        query='UPDATE  people SET "Picture"=\''+picture+'\' where "Name"=\''+name+'\''
        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);

        return "Success"
    return render_template('add.html')

@app.route('/keyupdate',methods=['POST','GET'])
def keyupdate():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6","","")
    if request.method=="POST":
        name=request.form['n']
        keyword=request.form['k']
        query='UPDATE people SET "Keywords"=\''+keyword+'\' where "Name"=\''+name+'\''

        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);

        return "Successffully Keyword Updated"
    return render_template('keyupdate.html')

@app.route('/salupdate',methods=['POST','GET'])
def salupdate():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6","","")
    if request.method=="POST":
        name=request.form['n']
        salary=request.form['s']
        query='UPDATE people SET "Salary"=\''+salary+'\' where "Name"=\''+name+'\''

        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);
        return "Successfully Salary Updated"
    return render_template('salupdate.html')

@app.route('/deleteperson',methods=['POST','GET'])
def deleteperson():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6","","")
    if request.method=="POST":
        name=request.form['n']
        query='DELETE from  people where "Name"=\''+name+'\''

        stmt=ibm_db.prepare(con,query)

        ibm_db.execute(stmt);

        return "Deleted Successfully"
    return render_template('deleteperson.html')


port = os.getenv('PORT', '5000')
if __name__ == "__main__":
    app.run(host='0.0.0.0', port=port,debug=False)



