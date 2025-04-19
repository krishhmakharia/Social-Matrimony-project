console.log("Welcome");
let crossbtns=document.querySelectorAll(".crossbtn");
crossbtns.forEach((btn)=>{
    btn.addEventListener("click",()=>{
        let sn= btn.getAttribute("rel");
        let code= btn.getAttribute("id");
        fetch("del_image.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({ id: sn, code: code })
        })
        .then(response => response.text())  // Since PHP returns plain text
        .then(data => {
            if (data === "success") {
                let element = document.getElementById(sn);
                if (element) {
                    element.style.transition = "opacity 1s"; // Smooth fade-out
                    element.style.opacity = "0";
                    setTimeout(() => element.remove(), 1000);
                }
            }
        })
        .catch(error => console.error("Error:", error));
})
})

// let menu_btn=document.querySelectorAll(".menubtns");
// let menu_box=document.querySelector(".menuBox");
// let menu_open=false;
// menu_btn.forEach((btn)=>{
//     btn.addEventListener("click",()=>{
//         console.log("button clicked");
//         let x=btn.getAttribute("id");
                
//         //console.log(x);
//     })
// })
// menu_btn.forEach((btn)=>{
//     btn.addEventListener("click",()=>{
//         if(menu_open==false){
//             menu_box.classList.remove("tw-hidden");
//             menu_box.classList.add("tw-flex");
//             menu_open=true;
//         }
//         else{
//             menu_box.classList.remove("tw-flex");
//             menu_box.classList.add("tw-hidden");
//             menu_open=false;
//         }
//     })
// })
// menu_box.forEach((box)=>{
//     box.addEventListener("click",()=>{
//         console.log("box clicked");
//         let k=box.getAttribute("id");
//         console.log(k);
//     })
// })
// menubtn.addEventListener("click",()=>{
//     if(menu_open==false){
//         menu_box.classList.remove("tw-hidden");
//         menu_box.classList.add("tw-flex");
//         menu_open=true;
//     }
//     else{
//         menu_box.classList.remove("tw-flex");
//         menu_box.classList.add("tw-hidden");
//         menu_open=false;
//     }
// })
let album=document.querySelectorAll(".album");
let menu_btn=document.querySelectorAll(".menubtn");
let menu_box=document.querySelectorAll(".menuBox");


menu_btn.forEach((btn)=>{
    let menu_open=false;
    btn.addEventListener("click",()=>{
        let btn_id=btn.getAttribute("id");
        console.log(btn_id);
            menu_box.forEach((box)=>{
                let box_id=box.getAttribute("id");
                console.log(box_id);
                if(btn_id==box_id){
                    if(menu_open==false){
                        // src=btn.setAttribute("src","imgs/menus2.svg");
                        box.classList.remove("tw-hidden");
                        box.classList.add("tw-flex");
                        menu_open=true;
                        
                        }
                        else{
                            // btn.setAttribute("src","imgs/menu3.svg");
                            box.classList.remove("tw-flex");
                            box.classList.add("tw-hidden");
                            menu_open=false;
                        }
                    
                }
            })
    })
})
// album.forEach((al)=>{
//         album_name=al.getAttribute("id");
//         // console.log("Album clicked --> "+album_name);
//         menu_btn.forEach((btn)=>{
//             btn.addEventListener("click",()=>{
//                 console.dir(btn);
//                 if(menu_open==false){
//                                 menu_box.classList.remove("tw-hidden");
//                                 menu_box.classList.add("tw-flex");
//                                 menu_open=true;
//                             }
//                             else{
//                                 menu_box.classList.remove("tw-flex");
//                                 menu_box.classList.add("tw-hidden");
//                                 menu_open=false;
//                             }
//             })
//         })    
// })
// menu_btn.forEach((btn)=>{
//     btn.addEventListener("click",()=>{   
//         // console.dir(btn);
//         if(menu_open==false){
//             box.classList.remove("tw-hidden");
//             box.classList.add("tw-flex");
//             menu_open=true;
//         }
//         else{
//             box.classList.remove("tw-flex");
//             box.classList.add("tw-hidden");
//             menu_open=false;
//         }
//     })
// }) 
// menu_box.forEach((box)=>{
    
// })
// for (let i = 0; i < menu_btn.length; i++) {
//     let menu_open = false; // Each button gets its own flag
//     menu_btn[i].addEventListener("click", () => {
//         if (menu_open === false) {
//             menu_box[i].classList.remove("tw-hidden");
//             menu_box[i].classList.add("tw-flex");
//             console.log(menu_box[i]);
//             menu_open = true;
//         } else {
//             menu_box[i].classList.remove("tw-flex");
//             menu_box[i].classList.add("tw-hidden");
//             menu_open = false;
//         }
//         console.log("menu button clicked -->" + menu_btn[i].getAttribute("id"));
//     });
// }
let delete_btn=document.querySelectorAll(".delete");
delete_btn.forEach((btn)=>{
    btn.addEventListener("click",()=>{
        let id=btn.getAttribute("rel");
        let block=btn.getAttribute("id");
        console.log(id);
        fetch("del_album.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: new URLSearchParams({ id: id})
        })
        .then(response => response.text())  // Since PHP returns plain text
        .then(data => {
            if (data === "success") {
                let element = document.getElementById(block);
                if (element) {
                    element.style.transition = "opacity 1s"; // Smooth fade-out
                    element.style.opacity = "0";
                    setTimeout(() => element.remove(), 1000);
                }
            }
        })
        .catch(error => console.error("Error:", error));
    })
})