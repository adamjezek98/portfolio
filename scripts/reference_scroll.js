/**
 * Created by jezek on 15.04.2017.
 */
var refElements = document.querySelectorAll('*[id^="referencecontent"]');
var count = Math.round(refElements.length / 2);
var index = 0;
var loop = true;
var looptimer = null;
var delay = 10 * 1000;
function shift(right) {
    el1 = refElements[index * 2];
    el2 = refElements[index * 2 + 1];
    if (el2 == undefined) {
        el2 = el1;
    }


    op = 1;
    hidden = false;
    var timer = setInterval(function () {
        if (!hidden) {
            if (op <= 0.3) {

                el1.style.visibility = "hidden";
                el1.style.position = "absolute";
                el2.style.visibility = "hidden";
                el2.style.position = "absolute";
                hidden = true;
                if (right) {
                    index += 1;
                    if (index >= count) {
                        index = 0;
                    }
                } else {
                    index -= 1;
                    if (index < 0) {
                        index = count - 1;
                    }
                }
                el1 = refElements[index * 2];
                el2 = refElements[index * 2 + 1];
                if (el2 == undefined) {
                    el2 = el1;
                }
                el1.style.visibility = "visible";
                el1.style.position = "inherit";
                el2.style.visibility = "visible";
                el2.style.position = "inherit";
            }

            el1.style.opacity = op;
            el2.style.opacity = op;
            op -= 0.1
        } else {
            if (op >= 1) {
                clearInterval(timer);
            }
            el1.style.opacity = op;
            el2.style.opacity = op;
            op += 0.1
        }
    }, 100);

}
function shiftRight(c = false) {

    if (loop || c) {
        shift(true);
    }
    if (c) {
        loop = false;
        document.getElementById("playpausebutton").className = "play";

    }


    looptimer = setTimeout(shiftRight, delay);

}
function shiftLeft(c) {
    if (c) {
        loop = false;
        document.getElementById("playpausebutton").className = "play";

    } else {
        loop = true;
    }
    shift(false);


}

function playpause() {
    if (loop) {
        clearTimeout(looptimer);
        document.getElementById("playpausebutton").className = "play";

    } else {
        document.getElementById("playpausebutton").className = "pause";


    }
    loop = !loop;
}
