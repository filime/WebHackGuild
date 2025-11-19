const express = require('express');
const cookieParser= require('cookie-parser');
const session = require('express-session');
const tools = require('./config');


const app = express();




app.set('view engine', 'ejs');
app.use(express.urlencoded({extended:true,}));
app.use(cookieParser());

app.use(session({
    secret: '##@#@#@#@##@#@#@##@',
    resave:false,
    saveUninitialized:true
}));

if(!process.argv[2]){
    console.log("ERROR");
    return -1;
}

const port = process.argv[2];
const bot_URL = 'http://127.0.0.1:'+port;




var db = [
    {'row':0, 'id': 'admin','title':'TEST','contents':'test'}

]

app.get('/', (req, res) =>{
    
    res.render('index')
})



app.get('/echo',(req,res)=>{

    if(!req.query.echo || !req.query.lv)
        return tools.echo_r(req,res,"?echo={input string}&lv=[1|2|3|4|5|6|7|8|9]");

    let f_nonce = req.query.f_nonce ? req.query.f_nonce : "1234";

    var {echo, lv} = req.query
    let r = tools.xss_filter(echo,lv);
    
    if(r !== 0)
        return tools.echo_r(req,res,r);

    if(lv == 5)
        return tools.echo_r(req,res,'<input type="hidden" value="'+echo+'">');

    if(lv == 6)
        res.header("Content-Security-Policy","default-src 'self'; script-src 'self';");

    if(lv == 7){ // Dom clobbering
        echo = echo.replaceAll("\"",'');
        echo = echo.replaceAll("*",'');
        echo = echo.replaceAll("/",'');
        let c = `<html><head><script src="https://cdnjs.cloudflare.com/ajax/libs/dompurify/3.2.3/purify.min.js"></script></head><body><div id="result"></div>
        <script>let r = "${echo}"
        let puried = DOMPurify.sanitize(r);
        document.getElementById('result').innerHTML = puried;

        if(!window.dev)
            window.dev = false;

        if(!window.dev){
            document.getElementById('result').innerHTML = puried;
        }else{
            document.getElementById('result').innerHTML = r;
        }
        </script></body></html>`;
        return tools.echo_r(req,res,c);
    }

    if(lv == 8){ // XS search
	 
        if(req.ip == "127.0.0.1"){
            if("WHD{Lv8_clear!_nahhhhh_e@s!er_$han_bef0rE_huh?_u_ge$_26xp}".indexOf(req.query.echo) !== -1){
                return res.send(200,"YES");
            }else{
                return res.send(404,"YES");
            }
        }else{
            if("WHD{**REDACTED**}".indexOf(req.query.echo) !== -1){
                return res.send(200,"YES");
            }else{
                let c = `if(req.ip == "127.0.0.1"){
            if("WHD{**REALFLAG_BUT_REDATED**}".indexOf(req.query.echo) !== -1){
                return res.send(200,"YES");
            }else{
                return res.send(404,"YES");
            }
        }else{
            if("WHD{FAKEFLAG}".indexOf(req.query.echo) !== -1){
                return res.send(200,"YES");
            }else{
            return res.send(404,"YES <br>Here is source code:"+c);
            }`
                return res.send(404,"YES <br>Here is source code:"+c);
            }
        }
    }

    if(lv == 9){ // Cached nonce
        // 1. get nonce and execute js(first)
        // 2. local login with express session
        // it can be accessed by localhost(bot);
        // 3. execute more code


        
        

        

        let c = `<html><head>
        </head><body>
        <a href="/echo9?echo=a&f_nonce=1">Play Here Plz</a>
        <a href="/bot9">Submit(bot) Here Plz</a>
        <strong>Bot will visit ur URL with cookie that has flag.</strong>
        <br>
        P.S. The Server has opened "http://127.0.0.1:9999".
        
        </body></html>`; 

        return tools.echo_r(req,res,c);
    }
    
        

    return tools.echo_r(req,res,echo);


})

app.get('/echo9',(req,res)=>{

    if(!req.query.echo || !req.query.lv)
        return tools.echo_r(req,res,"?echo={input string}&lv=9");

    let f_nonce = req.query.f_nonce ? req.query.f_nonce : "1234";

    var {echo, lv} = req.query
    let r = tools.xss_filter(echo,lv);


    if(lv == 9){ // Cached nonce
        // 1. get nonce and execute js(first)
        // 2. local login with express session
        // it can be accessed by localhost(bot);
        // 3. execute more code
        echo = echo.replaceAll("\"",'');
        echo = echo.replaceAll("*",'');
        echo = echo.replaceAll("\n",'');
        echo = echo.replaceAll("<",'');
       


        f_nonce = parseInt(f_nonce);


        let c = `<html><head>
        </head><body>
        <p id="result"></p>
        <script>
        
        function delay(time) {
            return new Promise(function(resolve) { 
                setTimeout(resolve, time)
            });
        }

        async function process(){
            let im_GOOD_GOOD_GOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOOD_nonce = await(await fetch("/nonce")).text();

            await delay(1000);
            document.head.innerHTML +=  \`<meta http-equiv="Content-Security-Policy" content="script-src 'nonce-\`+im_GOOD_GOOD_GOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOODGOOD_GOOD_GOOD_GOOD_GOOD_nonce+\`'">\`

            let n = new URLSearchParams(window.location.search)
		    let echo = decodeURIComponent(n.get("echo"));

            const script = document.createElement("script")
            text = document.createTextNode(echo);
            script.nonce = ${f_nonce};
            script.appendChild(text);
            document.body.appendChild(script);

            // Ex) Go To ->  /echo9?echo=1&lv=9&f_nonce=1
        }
        process();


        
        </script>
        </body></html>`;

        return tools.echo_r(req,res,c);
    }
    
        

    return tools.echo_r(req,res,echo);


})

app.get('/nonce',(req,res)=>{ // for Lv9
    let nonce = Math.floor(Math.random() * 1000)+100;
    res.header("Cache-Control","max-age=300");

    return res.send((nonce).toString());
});

app.get("/bot9", (req,res)=>{
    if(!req.query.url)
        return res.send("/bot9?url={ur URL}");
    let FLAG = "WHD{Lv9_clear!_N0_OnE_C@n't_s$op_u_Bro!_u_ge$_31xp}";
    
    tools.bot(req.query.url,FLAG,port).then(()=>{
        res.send("<script>alert('GOOD!');history.back();</script>");
    }).catch((e)=>{
        console.log(e)
        res.send("<script>alert('NOPE!');history.back();</script>");
    })
})



app.post('/bot', (req,res)=>{
    if(!req.body.report){
        res.render('bot');
        return 0;
    }

    let se = new URLSearchParams(req.body.report);
    let lv = se.get('lv');

    if(!lv){
        res.render('bot');
        return 0;
    }
    lv= parseInt(lv);

    let FLAG = "";
    switch(lv){
        case 1:
            FLAG = "WHD{Lv1_clear!_y0u_ge$_1xp}";
            break;

        case 2:
            FLAG = "WHD{Lv2_clear!_y0u_ge$_2xp}";
            break;
        case 3:
            FLAG = "WHD{Lv3_clear!_Congrats!_Leve1_up!_u_ge$_5xp}";
            break;
        case 4:
            FLAG = "WHD{Lv4_clear!_u_ge$_8xp}";
            break;
        case 5:
            FLAG = "WHD{Lv5_clear!_u_ge$_10xp}";
            break;
        case 6:
            FLAG = "WHD{Lv6_clear!_CSP_Bypassed!_u_ge$_13xp}";
            break;
        case 7:
            FLAG = "WHD{Lv7_clear!_u_wi11_Be_S$ronger!_ge$_15xp}";
            break;
        case 8:
            FLAG = "Not Here Bro.";
            break;
        case 9:
            FLAG = "None";
            break;

            
    }

    tools.bot(req.body.report,FLAG,port).then(()=>{
        res.send("<script>alert('GOOD!');history.back();</script>");
    }).catch((e)=>{
        console.log(e)
        res.send("<script>alert('NOPE!');history.back();</script>");
    })
    
})

app.get('/bot',(req,res)=>{
    res.render('bot');
})


app.listen(port,"0.0.0.0", ()=>{
    console.log("Server started:"+port)
})
