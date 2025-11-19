from flask import Flask, render_template, session,redirect,request,jsonify
import mysql.connector, string, hashlib

app = Flask(__name__)
app.secret_key = "asdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewfasdfffewf"


def get_mysql_con():
    con = mysql.connector.connect(
    host = "mysss",
    user = "root",
    password = "qwer1234!",
    database="guild"
    
    )
    return con


def IPS(user_id, user_password):
    filter_str = string.ascii_lowercase+string.ascii_uppercase+string.digits+"!@$%`~-=_+ "
    for _ in user_id:
        if _ not in filter_str:
            return 1
        
    for _ in user_password:
        if _ not in filter_str:
            return 1
    return 0
    

def Update_solves(name,point):
    
    con = get_mysql_con()
    sql = "SELECT EXP,solves FROM player WHERE user_id=%s"
    cur = con.cursor(prepared=True)
    con.ping(reconnect=True)
    cur.execute(sql,(session["islogin"],))

    result = cur.fetchone()

    cur.close()
    con.close()

    EXP = result[0]
    solves = result[1]
    if solves == None:
        solves = ""

    if name not in solves:
        solves = solves+name
        EXP = EXP + point

        con = get_mysql_con()
        sql = "UPDATE player SET solves=%s,EXP=%s WHERE user_id=%s"
        cur = con.cursor(prepared=True)

        cur.execute(sql,(solves,EXP,session["islogin"]))
        con.commit()
        cur.close()

    con.close()
    return 1

    

# ================================== Pub =========================================



@app.route("/")
def index():

    return render_template("guild.html")

@app.route("/myinfo")
def myinfo():
    if session.get("islogin") == None:
        return "<script>alert('Login First');history.back();</script>"
    con = get_mysql_con()
    sql = "SELECT EXP,solves FROM player WHERE user_id=%s"
    cur = con.cursor(prepared=True)

    cur.execute(sql,(session["islogin"],))
    r = cur.fetchone()
    cur.close()
    con.close()
    return jsonify({"name":session.get("islogin"),"solves":r[1],"EXP":r[0]})


@app.route("/info/<id>")
def info(id):
    if session.get("islogin") == None or id == None:
        return "<script>alert('Login First');history.back();</script>"
    con = get_mysql_con()
    sql = "SELECT EXP,solves FROM player WHERE user_id=%s"
    cur = con.cursor(prepared=True)

    cur.execute(sql,(id,))
    r = cur.fetchone()
    cur.close()
    con.close()
    return jsonify({"name":session.get("islogin"),"solves":r[1],"EXP":r[0]})

@app.route("/rank")
def r():
    return render_template("score.html")

@app.route("/get_rank")
def a():

    con = get_mysql_con()
    sql = "SELECT user_id,EXP FROM player ORDER BY EXP ASC"
    cur = con.cursor()
    con.ping(reconnect=True)
    cur.execute(sql)

    result = cur.fetchall()
    all_list = []

    for _ in result:
        tmp = {}
        tmp["name"] = _[0]
        tmp["score"] = int(_[1])
        all_list.append(tmp)


    return { "players": all_list}

@app.route("/login", methods=["POST"])
def login():
    if request.method == "POST":
        if not request.form.get("id") or not request.form.get("pw"):
            return "<script>alert('Invalid value');history.back();</script>"
        
        user_id = request.form.get("id")
        user_password = request.form.get("pw")

        if IPS(user_id,user_password):
            return "<script>alert('a-zA-Z0-9!@$%`~-=_ +');history.back();</script>"

        h = hashlib.sha256()
        h.update(user_password.encode())
        user_password = h.hexdigest()

        con = get_mysql_con()
        sql = "SELECT * FROM player WHERE user_id=%s AND user_password=%s"
        cur = con.cursor(prepared=True)
        con.ping(reconnect=True)
        cur.execute(sql, (user_id,user_password))

        result = cur.fetchone()
        
        if result == None:
            return "<script>alert('Player Not FOUND');history.back();</script>"

        
        session["islogin"] = user_id
        session["EXP"] = result[3]
        return "<script>location.href='/';</script>"



@app.route("/sign_up", methods=["POST"])
def regis():
    if request.method == "POST":
        if not request.form.get("id") or not request.form.get("pw"):
            return "<script>alert('Invalid value');history.back();</script>"
        
        user_id = request.form.get("id")
        user_password = request.form.get("pw")

        if IPS(user_id,user_password):
            return "<script>alert('a-zA-Z0-9!@$%`~-=_ +');history.back();</script>"

        h = hashlib.sha256()
        h.update(user_password.encode())
        user_password = h.hexdigest()

        con = get_mysql_con()
        sql = "SELECT * FROM player WHERE user_id=%s"
        cur = con.cursor(prepared=True)
        con.ping(reconnect=True)
        cur.execute(sql, (user_id,))

        result = cur.fetchone()
        
        if result == None:
            sql = "INSERT INTO player (user_id, user_password) VALUES(%s,%s)"
            cur = con.cursor(prepared=True)
            con.ping(reconnect=True)
            cur.execute(sql, (user_id,user_password))
            con.commit()
            cur.close()
            con.close()
            return "<script>alert('Done!');history.back();</script>"
        else:
            con.close()
            return "<script>alert('Already Exists');history.back();</script>"
            
        

        
@app.route("/flag")
def flag():
    if session.get("islogin") == None:
        return "<script>alert('Login First');history.back();</script>"
    
    flag_List ={
        "XSS_Lv1":"WHD{Lv1_clear!_y0u_ge$_1xp}",
        "XSS_Lv2":"WHD{Lv2_clear!_y0u_ge$_2xp}",
        "XSS_Lv3":"WHD{Lv3_clear!_Congrats!_Leve1_up!_u_ge$_5xp}",
        "XSS_Lv4":"WHD{Lv4_clear!_u_ge$_8xp}",
        "XSS_Lv5":"WHD{Lv5_clear!_u_ge$_10xp}",
        "XSS_Lv6":"WHD{Lv6_clear!_CSP_Bypassed!_u_ge$_13xp}",
        "XSS_Lv7":"WHD{Lv7_clear!_u_wi11_Be_S$ronger!_ge$_15xp}",
        "XSS_Lv8":"WHD{Lv8_clear!_nahhhhh_e@s!er_$han_bef0rE_huh?_u_ge$_26xp}",
        "XSS_Lv9":"WHD{Lv9_clear!_N0_OnE_C@n't_s$op_u_Bro!_u_ge$_31xp}",
    }

    point_List={
        "XSS_Lv1":1,
        "XSS_Lv2":2,
        "XSS_Lv3":5,
        "XSS_Lv4":8,
        "XSS_Lv5":10,
        "XSS_Lv6":13,
        "XSS_Lv7":15,
        "XSS_Lv8":26,
        "XSS_Lv9":31,
    }

    if request.args.get("flag") == None:
        return "?flag={YOUR FLAG}"
    
    flag = request.args.get("flag")
#    print(flag)
    r = 0
    for _ in flag_List:
        if flag_List[_] == flag:
            r = Update_solves(_,point_List[_])
    
    if r == 1:
        return "<script>alert('Well Done!');history.back();</script>"
    else:
        return "<script>alert('Invalid value');history.back();</script>"



@app.route("/logout")
def logout():
    session.pop("islogin")
    session.pop("EXP")
    return "<script>location.href='/';</script>"


app.run(host='0.0.0.0',port=9999,debug=True)
