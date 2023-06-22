"use strict";
document.addEventListener("DOMContentLoaded", function(e) {
    {
        const t = document.querySelector("#selectAll"),
            o = document.querySelectorAll('[type="checkbox"]');
        t.addEventListener("change", t => {
            o.forEach(e => {
                e.checked = t.target.checked
            })
        })
    }
});