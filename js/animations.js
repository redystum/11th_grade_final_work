function wait(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

function sleep(milliseconds) {
    var start = new Date().getTime();
    for (var i = 0; i < 1e7; i++) {
      if ((new Date().getTime() - start) > milliseconds){
        break;
      }
    }
  }

function maininputfocos() {
    let text = document.getElementsByClassName("Stext")[0];
    let arrowb = document.getElementsByClassName("arrowb")[0];
    let arrowf = document.getElementsByClassName("arrowf")[0];

    text.classList.add("StextAtive");
    arrowb.classList.add("arrowbAtive");
    arrowf.classList.add("arrowfAtive");
}

function maininputfocoslost() {

    if (document.getElementsByClassName("maininput")[0].value.length == 0) {
        let text = document.getElementsByClassName("Stext")[0];
        let arrowb = document.getElementsByClassName("arrowb")[0];
        let arrowf = document.getElementsByClassName("arrowf")[0];

        wait(5000).then(() => {
            text.classList.remove("StextAtive");
            arrowb.classList.remove("arrowbAtive");
            arrowf.classList.remove("arrowfAtive");
        });
    }

}
