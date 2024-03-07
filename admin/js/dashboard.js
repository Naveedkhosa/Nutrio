var r = document.querySelector(':root');

function getProp(vari) {
    var rs = getComputedStyle(r);
    return rs.getPropertyValue(`${vari}`);
}

function setProp(vari, value) {
    r.style.setProperty(`${vari}`, `${value}`);
}


document.getElementById("myNav").addEventListener("click", function () {
    if (getProp("--left-width") !== "0px") {
        setProp("--left-width", "0px");
    } else {
        var max_768 = window.matchMedia("(max-width: 768px)");
        var min_769 = window.matchMedia("(min-width: 769px)");
        if(max_768.matches){
            setProp("--left-width", "80px");
        }else if(min_769.matches){
            setProp("--left-width", "250px");
        }
    }
});