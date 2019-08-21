            function number_format (number, decimals, decPoint, thousandsSep) { 
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
            var n = !isFinite(+number) ? 0 : +number
            var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
            var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
            var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
            var s = ''

                var toFixedFix = function (n, prec) {
                 var k = Math.pow(10, prec)
            return '' + (Math.round(n * k) / k)
            .toFixed(prec)
            }

 // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.')
                if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
                    }
                    if ((s[1] || '').length < prec) {
                     s[1] = s[1] || ''
                     s[1] += new Array(prec - s[1].length + 1).join('0')
                    }

             return s.join(dec)
                }

          function tandaPemisahTitik(b){
                var _minus = false;
                    if (b<0) _minus = true;
                    b = b.toString();
                    b=b.replace(".","");
                    b=b.replace("-","");
                    c = "";
                    panjang = b.length;
                    j = 0;
                    for (i = panjang; i > 0; i--){
                        j = j + 1;
                        if (((j % 3) == 1) && (j != 1)){
                        c = b.substr(i-1,1) + "." + c;
                        } else {
                        c = b.substr(i-1,1) + c;
                                }
                    }
              if (_minus) c = "-" + c ;
              return c;
        }
        function numbersonly(ini, e){
            if (e.keyCode>=49){
            if(e.keyCode<=57){
                a = ini.value.toString().replace(".","");
                b = a.replace(/[^\d]/g,"");
                b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
                ini.value = tandaPemisahTitik(b);
            return false;
        }
            else if(e.keyCode<=105){
            if(e.keyCode>=96){
        //e.keycode = e.keycode - 47;
            a = ini.value.toString().replace(".","");
            b = a.replace(/[^\d]/g,"");
            b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
            ini.value = tandaPemisahTitik(b);
            //alert(e.keycode);
            return false;
            }
            else {return false;}
            }
            else {
            return false; }
            }else if (e.keyCode==48){
            a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
            b = a.replace(/[^\d]/g,"");
            if (parseFloat(b)!=0){
            ini.value = tandaPemisahTitik(b);
            return false;
                } else {
            return false;
            }
            }else if (e.keyCode==95){
            a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
            b = a.replace(/[^\d]/g,"");
            if (parseFloat(b)!=0){
            ini.value = tandaPemisahTitik(b);
            return false;
            } else {
            return false;
            }
            }else if (e.keyCode==8 || e.keycode==46){
            a = ini.value.replace(".","");
            b = a.replace(/[^\d]/g,"");
            b = b.substr(0,b.length -1);
            if (tandaPemisahTitik(b)!=""){
            ini.value = tandaPemisahTitik(b);
            } else {
            ini.value = "";
            }

            return false;
            } else if (e.keyCode==9){
            return true;
            } else if (e.keyCode==17){
            return true;
            } else {
            //alert (e.keyCode);
            return false;
            }

        }
