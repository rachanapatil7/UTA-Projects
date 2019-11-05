import os
import ibm_db
from flask import Flask,redirect,render_template,request
import math
import numpy as np
import pytz
from pytz import UnknownTimeZoneError
#import tzlocal
from datetime import datetime
from timezonefinder import TimezoneFinder


app = Flask(__name__)
#port=int(os.getenv("VCAP_APP_PORT"))

@app.route('/')
def index():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")

    return render_template('assign2.html')

@app.route('/homepage')
def homepage():
    return render_template('homepage.html')

@app.route('/search_count',methods=['POST','GET'])
def search_count():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")

    if request.method=="POST":
        magni=request.form['m']
        query='select count(*) from quakes where "mag">\''+magni+'\''
        stmt=ibm_db.prepare(con,query)
        ibm_db.execute(stmt)
        result = ibm_db.fetch_tuple(stmt)
        return render_template('search_count_results.html', value=result[0])
    return render_template("search_count.html")


@app.route('/search_quakes',methods=['POST','GET'])
def search_quakes():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")

    if request.method=="POST":
        range1=request.form['r1']
        range2=request.form['r2']
        day1=request.form['d1']
        day2=request.form['d2']


        query = 'select * from quakes where "mag" between ' + range1 + ' and ' + range2 + ' AND ( "time" BETWEEN \''+day1+'\' AND \''+day2+'\')'

        stmt=ibm_db.prepare(con,query)
        ibm_db.execute(stmt)
        row=[]
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)
        return render_template('search_quakes_result.html', value=row)

    return render_template('search_quakes.html')

@app.route('/quake_location',methods=['POST','GET'])
def quake_location():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    R=6373

    if request.method=="POST":

        lat1 = request.form['lat']
        lon1 = request.form['lon']
        distance = request.form['dist']
        query ='SELECT * FROM (select *,(((acos(sin(('+lat1+'*0.017444)) * sin(("latitude"*0.017444))+cos(('+lat1+'*0.017444))*cos(("latitude"*0.017444))*cos((('+lon1+' - "longitude")*0.017444))))*57.3248)*60*1.1515*1.609344) as distance from quakes) where distance <= '+distance+''

        stmt=ibm_db.prepare(con,query)
        ibm_db.execute(stmt);
        row=[]
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)

        return render_template('quake_location_result.html', value=row)

    return render_template('quake_location.html')
    '''
    if request.method=="POST":
        lat1 = math.radians((float(request.form['lat'])))
        lon1 = math.radians(float(request.form['lon']))
        distance = request.form['dist']
        sql = 'SELECT * FROM quakes'
        stmt = ibm_db.prepare(con, sql)
        ibm_db.execute(stmt)
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row=[]
            lat2 = math.radians((float(result["latitude"])))
            lon2 = math.radians((float(result["longitude"])))
            dlong = lon2 - lon1
            dlat = lat2 - lat1
            a = (math.sin(dlat / 2)) * 2 + math.cos(lat1) * math.cos(lat2) * (math.sin(dlong / 2)) * 2
            c = 2 * math.atan2(math.sqrt(a), math.sqrt(1 - a))
            d = R * c

            if (d <= float(distance)):

                row.append(result.copy())
                result = ibm_db.fetch_assoc(stmt)



'''


@app.route('/quake_clusters',methods=['POST','GET'])
def quake_clusters():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    row=[]

    if request.method=="POST":
        lat1=float(request.form['lat1'])
        lat2=float(request.form['lat2'])
        lon1=float(request.form['lon1'])
        lon2=float(request.form['lon2'])
        grid=int(request.form['gs'])
        grid1=int(request.form['gs1'])
        for longi in np.arange(lon1,lon2,grid1):
            temp_longi = longi + grid1

            for lat in np.arange(lat1,lat2,grid):
                temp_lat = lat + grid


                query = 'select count(*) from quakes where "longitude" between '+str(longi)+' and '+ str(temp_longi) +' and "latitude" between '+str(lat)+' and '+str(temp_lat) + ''
                stmt=ibm_db.prepare(con,query)
                ibm_db.execute(stmt)

                result = ibm_db.fetch_assoc(stmt)
                '''
                while result != False:
                    row.append(result.copy())
                    result = ibm_db.fetch_assoc(stmt)'''
                row.append(result.copy())


        return render_template('quake_clusters_results.html', value=row,length=len(row))

    return render_template('quake_clusters.html')

@app.route('/count_night_quakes',methods=['POST','GET'])
def count_night_quakes():

    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    query = 'SELECT "mag","latitude","longitude", "time" FROM quakes where "mag"=8'
    rows_night = []
    rows_days = []
    stmt = ibm_db.prepare(con, query)
    ibm_db.execute(stmt)
    result = ibm_db.fetch_assoc(stmt)

    #timefield = []
    '''
    while result != False:
        #t=[]
        temp = result["time"]
        print("temp:"+temp)
        latitude = float(result["latitude"])

        longitude = float(result["longitude"])
        #print(latitude, longitude)
        timeb = temp[11:19]
        print(timeb)
        actualtime = datetime.strptime(timeb, '%H:%M:%S')
        print(actualtime)


        tf = TimezoneFinder()
        try:
            newtimezone = pytz.timezone(tf.timezone_at(lng=longitude, lat=latitude))

        except UnknownTimeZoneError:
            newtimezone=pytz.timezone("Greenwich")

        oldtimezone = pytz.timezone("Greenwich")

        mytimestamp = oldtimezone.localize(actualtime).astimezone(newtimezone)
        hours = int(mytimestamp.strftime('%H'))
        if (hours >= 21 and hours <= 23) or (hours >= 0 and hours <= 6):

            rows_night.append(result.copy())

        else:
            rows_days.append(result.copy())

        result = ibm_db.fetch_assoc(stmt)


    return render_template('count_night_quakes.html', data=rows_night, count_nights=len(rows_night), count_days=len(rows_days))

    '''

    while result != False:

        temp = result["time"]
        print("temp:"+temp)
        latitude = float(result["latitude"])
        longitude = float(result["longitude"])
        timeb = temp[11:19]         #pick the start and end   characters which consists of date format
        gmt_time = datetime.strptime(timeb, '%H:%M:%S')           # convert the given date string into given second parameter format
        print(gmt_time)                                             # date is in datetime   object type


        tf = TimezoneFinder()               # creating the object of timezonefinder
        present_timezone=tf.timezone_at(lng=longitude, lat=latitude)    #to find local timezone#output format will be string#checking which timezone the point lies in
        #print(present_timezone)
        newtimezone = pytz.timezone(tf.timezone_at(lng=longitude, lat=latitude))        #  converts from str to object
        print(newtimezone)



        gmtzone = pytz.timezone("Greenwich")

        #localtime = gmtzone.localize(gmt_time).astimezone(newtimezone)
        localtime=pytz.utc.localize(gmt_time).astimezone(newtimezone)
        hours = int(localtime.strftime('%H'))
        if (hours >= 21 and hours <= 23) or (hours >= 0 and hours <= 6):

            rows_night.append(result.copy())

        else:
            rows_days.append(result.copy())

        result = ibm_db.fetch_assoc(stmt)


    return render_template('count_night_quakes.html', data=rows_night, count_nights=len(rows_night), count_days=len(rows_days))

@app.route('/query5',methods=['POST','GET'])
def query5():
    #con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    row=[]
    if request.method=="POST":

        query='select count(*) from quakes where "mag">2'
        query1='select min("mag") from quakes where "mag">2'
        stmt=ibm_db.prepare(con,query)
        stmt1=ibm_db.prepare(con,query1)
        ibm_db.execute(stmt)
        ibm_db.execute(stmt1)
        result = ibm_db.fetch_assoc(stmt)
        result1 = ibm_db.fetch_assoc(stmt1)
        '''while result1 != False:
            row.append(result1.copy())
            result1 = ibm_db.fetch_assoc(stmt)'''
        return render_template('query5_result.html', value=result,value1=result1)


    return render_template('query5.html')


@app.route('/query6',methods=['POST','GET'])
def query6():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    row=[]

    if request.method=="POST":
        v1=float(request.form['v1'])
        v2=float(request.form['v2'])
        inc=int(request.form['in'])

        for i in np.arange(v1,v2,inc):
            temp=i+inc
            query = 'select count(*) from equakes where "mag" between '+str(i)+' and '+ str(temp) +''
            stmt=ibm_db.prepare(con,query)
            ibm_db.execute(stmt)

            result = ibm_db.fetch_assoc(stmt)

            while result != False:
                row.append(result.copy())
                result = ibm_db.fetch_assoc(stmt)


        return render_template('query6_result.html', value=row)




    return render_template('query6.html')



@app.route('/query7',methods=['POST','GET'])
def query7():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")

    row=[]

    if request.method=="POST":
        lat1=float(request.form['lat1'])
        lat2=float(request.form['lat2'])
        lon1=float(request.form['lon1'])
        lon2=float(request.form['lon2'])



        query = 'select "latitude","longitude","place" from equakes where "longitude" between '+str(lon2)+' and '+ str(lon1) +' and "latitude" between '+str(lat1)+' and '+str(lat2) + ''
        stmt=ibm_db.prepare(con,query)
        ibm_db.execute(stmt)

        result = ibm_db.fetch_assoc(stmt)

        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)



        return render_template('query7_result.html', value=row)



    return render_template('query7.html')


@app.route('/query9',methods=['POST','GET'])
def query9():
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    R=6373

    if request.method=="POST":

        lat1 = request.form['lat']
        lon1 = request.form['lon']
        distance = request.form['dist']
        query ='SELECT * FROM (select *,(((acos(sin(('+lat1+'*0.017444)) * sin(("latitude"*0.017444))+cos(('+lat1+'*0.017444))*cos(("latitude"*0.017444))*cos((('+lon1+' - "longitude")*0.017444))))*57.3248)*60*1.1515*1.609344) as distance from equakes) where distance <= '+distance+''

        stmt=ibm_db.prepare(con,query)
        ibm_db.execute(stmt);
        row=[]
        result = ibm_db.fetch_assoc(stmt)
        while result != False:
            row.append(result.copy())
            result = ibm_db.fetch_assoc(stmt)

        return render_template('query9_result.html', value=row)

    return render_template('query9.html')

@app.route('/modify', methods=['GET', 'POST'])
def modify():
    rows = []
    con = ibm_db.connect("DATABASE=BLUDB;HOSTNAME=dashdb-txn-sbox-yp-dal09-03.services.dal.bluemix.net;PORT=50000;PROTOCOL=TCPIP;UID=xmk81536;PWD=vxpl-2bhrdk8f9b6;","","")
    if request.method == 'POST':
        date1 = request.form['date1']
        date2 = request.form['date2']
        dep1 = request.form['dep1']
        dep2 = request.form['dep2']




        sql = 'Update equakes SET "mag" = 999 where "depth" between '+dep1+' and '+dep2+' and SUBSTR("time",1,10) between \''+date1+'\' and \''+date2+'\' '
        stmt4 = ibm_db.prepare(con, sql)
        ibm_db.execute(stmt4)
        #result = ibm_db.fetch_assoc(stmt4)
        #while result != False:
        #     rows.append(result.copy())
        #     result = ibm_db.fetch_assoc(stmt4)
        return "Success"

    return render_template("modify.html",value=rows)







port = os.getenv('PORT', '5000')
if __name__ == "__main__":
    app.run(host='0.0.0.0', port=port,debug=False)
    #app.run(host='127.0.0.1', port=port,debug=True)

