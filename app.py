from flask import Flask,request,session
from flask import render_template
from flask_mail import Mail
from flask_sqlalchemy import SQLAlchemy
import random
from werkzeug.utils import secure_filename
import os
import threading


app=Flask(__name__)
app.config['SQLALCHEMY_DATABASE_URI'] = 'mysql://root:@127.0.0.1/login'  # database address

db = SQLAlchemy(app)


# mail configuration

app.config.update(                                          
    MAIL_SERVER='smtp.gmail.com',
    MAIL_PORT='465',
    MAIL_USE_SSL=True,
    MAIL_USERNAME='jeevitv@gmail.com',
    MAIL_PASSWORD='ramjeevITV'


)
mail=Mail(app)

app.secret_key ='techshweta2609'


@app.route('/register',methods=['GET','POST'])
def signup_confirm():
    global usermail
    global signup_password
    global OTPA
    OTPA=random.randint(100000,999999)
    otpa=OTPA
    if(request.method=='POST'):
        usermail=request.form.get('email')
        signup_password=request.form.get('password')
        msg="Thank you for registering in our Student Information Website for Gehu. We are looking forward to cater you in all possible ways. Providing Correct information is our concern. Hope you are getting proper information of University. \nFrom,\nStudent Information System Gehu \n Developed by - Shweta Gaur\nB.Tech C.S.E (2019-23).\n\nThis is your otp for registartion"  <b>+str(otpa)</b>
        mail.send_message("Registration OTP",
        sender="jeevitv@gmail.com",
        recipients=[usermail],
        body=msg)
        return render_template('otp.html',param="")

    # msg="this is your otp for registartion" +str(otpa)
    mail.send_message("Registration OTP",
    sender="jeevitv@gmail.com",
    recipients=[usermail],
    body=msg)
    return render_template('otp.html',param="OTP resended successfully")




@app.route('/otp_confirm',methods=['POST'])
def otpa():
    userotp=request.form.get('otp')
    userotp=int(userotp)
    if(OTPA==userotp):
        return render_template('welcome.php')
    else:
        return render_template('otp.html',param="Entered wrong OTP.Please try again")

app.run()