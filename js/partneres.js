function MicrosoftText(){
    const text = "For the trust and loyalty to our company and all the support given in funds and help to give us the opportunity to provide a better offer to our students in high quality software. <br> We greatly appreciate your work and may you continue to do what you do best. <br> Thanks again!";

    document.getElementById("partnerDescib").innerHTML = text;
    document.getElementById("thxPartner").innerHTML = "Thanks Microsoft,";
    document.getElementsByClassName("imgPartner")[0].src = "./img/Microsoft_image.png";
    document.getElementById("imgMicrosoft").classList.add("activePartner")
    document.getElementById("imgAutodesk").classList.remove("activePartner")
    document.getElementById("imgAdobe").classList.remove("activePartner")
    document.getElementById("imgCSM").classList.remove("activePartner")
}

function AdobeText(){
    const text = "For flexibility, trust, and all the support. <br> We are very happy to be able to have a more appealing offer of your products to all our students. <br> We really appreciate your work and hope you continue to evolve in the best possible way to continue to dominate the production art market. <br> Thanks again!";

    document.getElementById("partnerDescib").innerHTML = text;
    document.getElementById("thxPartner").innerHTML = "Thanks Adobe,";
    document.getElementsByClassName("imgPartner")[0].src = "./img/Adobe_image.png";
    document.getElementById("imgAdobe").classList.add("activePartner")
    document.getElementById("imgAutodesk").classList.remove("activePartner")
    document.getElementById("imgCSM").classList.remove("activePartner")
    document.getElementById("imgMicrosoft").classList.remove("activePartner")
}

function AutodeskText(){
    const text = "For the trust and loyalty to our company and all the support given in funds and help to give us the opportunity to provide a better offer to our students in high quality software. <br> We greatly appreciate your work and may you continue to do what you do best. <br> Thanks again!";

    document.getElementById("partnerDescib").innerHTML = text;
    document.getElementById("thxPartner").innerHTML = "Thanks Autodesk,";
    document.getElementsByClassName("imgPartner")[0].src = "./img/Autodesk_image.png";
    document.getElementById("imgAutodesk").classList.add("activePartner")
    document.getElementById("imgCSM").classList.remove("activePartner")
    document.getElementById("imgAdobe").classList.remove("activePartner")
    document.getElementById("imgMicrosoft").classList.remove("activePartner")
}

function CSMText(){
    const text = "There are no words to thank you. \n With your training, you have given us the ability to create great quality projects.<br> I hope that they continue to form great students and that they never give up on what they do, because great people come out of there. <br> Thanks again!"; 

    document.getElementById("thxPartner").innerHTML = "Thanks CSM,";
    document.getElementById("partnerDescib").innerHTML = text;
    document.getElementsByClassName("imgPartner")[0].src = "./img/CSM_image.png";
    document.getElementById("imgCSM").classList.add("activePartner")
    document.getElementById("imgAutodesk").classList.remove("activePartner")
    document.getElementById("imgAdobe").classList.remove("activePartner")
    document.getElementById("imgMicrosoft").classList.remove("activePartner")
}
