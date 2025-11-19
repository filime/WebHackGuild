const puppeteer = require('puppeteer');

function delay(time) {
    return new Promise(function(resolve) { 
        setTimeout(resolve, time)
    });
 }

const xss_filter = (str, lv) => {
    if(!lv || !str)
        return "404 Not FOUND";
    lv = parseInt(lv);
    var reg = "";
    var reg_s = "";

    if(lv === 1){ // Level1
        reg = /\t|eval|src|`|!|\$/ig;
        reg_s = `/\\t|eval|src|\`|!|\$/ig`;

    }else if(lv === 2){ // Level2
        reg = /\t|eval|src|`|\(|!|\$|frame|document|cookie|\\u|\/u/ig;
        reg_s = `/\\t|eval|src|\`|\(|!|\$|frame|document|cookie|\\u|\/u/ig`;

    }else if(lv === 3){ // Level3
        reg = /\t|eval|src|`|\(|!|\$|frame|img|onerror|alert|onload|onclick|\\u|\/u/ig;
        reg_s = `/\\t|eval|src|\`|\(|!|\$|frame|img|onerror|alert|onload|onclick|\\u|\/u/ig`;

    }else if(lv === 4){ // Level4
        reg = /\t|eval|`|\(|!|\$|img|onerror|alert|onload|onclick|onfocus|autofocus|script|on|\\u|\/u/ig;
        reg_s = `/\\t|eval|\`|\(|!|\$|img|onerror|alert|onload|onclick|onfocus|autofocus|script|on|\\u|\/u/ig`;

    }else if(lv === 5){ // Level5 / Todo: add Hidden Tag
        reg = /\t|eval|`|\(|!|\$|\n|>|script/ig;
        reg_s = `/\\t|eval|\`|\(|!|\$|\\n|>|script/ig`;
    }else {
        return 0;
    }

    if(str.match(reg)){
        return reg_s;
    }else{
        return 0;
    }

}

const bot = async (report, flag,port) => {
    var bot_URL = 'http://127.0.0.1:'+port;
    
    if(flag == "WHD{Lv9_clear!_N0_OnE_C@n't_s$op_u_Bro!_u_ge$_31xp}"){
        var cookies=[
            {name: "flag", value: flag, domain: "127.0.0.1:"+port,path:"/echo9"}
        ]
        var visit = report;

    }else{

        var cookies=[
            {name: "flag", value: flag, domain: "127.0.0.1:"+port}
        ]
        var visit =bot_URL+'/echo'+report;
    }

    try{
    var browser = await puppeteer.launch({
        headless: "new",
        //executablePath: "/usr/bin/google-chrome-stable",
        args: ["--no-sandbox", "--disable-setuid-sandbox"],
      });
    
    var page = await browser.newPage();
    await page.setCookie(...cookies);
    
    console.log("Bot visited URL : "+visit);
    await page.goto(visit);
    
    await delay(2000)

    await page.close();
    await browser.close();
    return 1;
    }catch(e){
        console.log(e)
        await page.close();
        await browser.close();
    }

}

const echo_r = (req,res,str_e)=>{
    return res.send(200, str_e);
}

module.exports={
    bot,
    echo_r,
    xss_filter
}