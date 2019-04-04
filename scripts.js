
// function hide_frm(i) {
//     var ck = document.getElementById('hide1');
//     if (ck.checked == true) {
//         document.getElementById('frm_hide1').style.display = "";
//     } else {
//         document.getElementById('frm_hide1').style.display = "none";
//     }
//
//     var ck = document.getElementById('hide2');
//     if (ck.checked == true) {
//         document.getElementById('frm_hide2').style.display = "";
//     } else {
//         document.getElementById('frm_hide2').style.display = "none";
//     }
//
//     var ck = document.getElementById('hide'+i);
//     if (ck.checked == true) {
//         document.getElementById('frm_hide'+i).style.display = "";
//     } else {
//         document.getElementById('frm_hide'+i).style.display = "none";
//     }
// }



//disabled textbox อื่นๆโปรดระบุ
// function myFunction(i) {
//     var checkBox = document.getElementById("myCheck"+i);
//     var text = document.getElementById("text"+i);
//     if (checkBox.checked == true){
//         text.disabled = false;
//     } else {
//         text.disabled = true;
//     }
// }
//Input Numeric Only
function keyintdot() {
    var key = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if ((key<46 || key>57 || key == 47) && (key != 13)) {
      event.returnValue = false;
   }
}
//enable or disable textbox 7.1
function enabletxt() {
    var chk_1= document.getElementById("hide1");
    var text = document.getElementById("txt1");
    if (chk_1.checked == true){
        text.disabled = false;
    }
    else {
        text.disabled = true;
    }
}
//show or hide upload
function hide_upload() {
    var x = document.getElementById("myFile");
    x.disabled = true;
}
function show_upload() {
    var x = document.getElementById("myFile");
    x.disabled = false;
}

// disable input
/*    var nodes1 = document.getElementById("dis1").getElementsByTagName('*');
    for(var i = 0; i < nodes1.length; i++){
        nodes1[i].disabled = true;
    }
    var nodes2 = document.getElementById("dis2").getElementsByTagName('*');
    for(var i = 0; i < nodes2.length; i++){
        nodes2[i].disabled = true;
    }
*/
// enable or disable many input tag
    // function enableinput(j){
    //     //nodes = eval(`nodes${j}`);
    //     //nodes = eval("nodes"+j);
    //     //console.log(`nodes${j}`); /* => v0;   v1;  */
    //    // console.log(nodes);  /* => Variable Naught; Variable One;  */
    //     var nodes = document.getElementById("dis"+j).getElementsByTagName('*');
    //     var dis = document.getElementById("discheck"+j);
    //     for(var i = 0; i < nodes.length; i++){
    //         if(dis.checked == true){
    //             nodes[i].disabled = false;
    //             nodes[i].required= true;
    //
    //         }
    //         else{
    //             nodes[i].disabled = true;
    //             nodes[i].required= false;
    //         }
    //     }
    // }
