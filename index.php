<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
        
    <title>8x Qcuick Connect Generator</title>

 
</head>
<body>
    <div class="box">
        <input id="bt" type="text" placeholder="Input BlueTooth Address"/>
        <button onclick="generate()">Generate</button>
    </div>
    <div class="canvasdiv">
        <canvas id="mycanvas"></canvas>
    </div>
    
</body>
<script type="text/javascript" src="./node_modules/bwip-js/dist/bwip-js-min.js"></script>
<script type="text/javascript">
   
function generate(){
    const header = '\x01X\x1d\x02P\x081\x04\x01X\x1d\x02P\x1b4\x04\x01X\x1d\x02PB0\x04\x01X\x1d\x02:\x07'
    const footer = '\x04'
    let builder = []
    let btAddress = document.getElementById("bt").value.toUpperCase();
    for(let i = 0; i < btAddress.length; i++){
        if(btAddress[i]+btAddress[i+1] == '00'){
            builder.push('\x25'+'00')
            i++
        }else if(btAddress[i]+btAddress[i+1] == '04'){
            builder.push('\x25'+'04')
            i++
        }else{
            let addr = `${btAddress[i]+btAddress[i +1]}`
            builder.push('\x25'+addr)
            i++
        }
    }
    let mkrCode = `${header}${builder.join('')}${footer}`
   try {
// The return value is the canvas element
let canvas = bwipjs.toCanvas('mycanvas', {
        bcid:        'datamatrix',       // Barcode type
        text:mkrCode,    // Text to encode
        scale:       3,               // 3x scaling factor
        height:      10,              // Bar height, in millimeters
        includetext: true,            // Show human-readable text
        textxalign:  'center',        // Always good to set this
    });
} catch (e) {
// `e` may be a string or Error object
}
}



</script>

</html>

