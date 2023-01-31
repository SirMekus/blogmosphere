//import { on, showSpinner, removeSpinner, showCanvass } from "mmuo"
import axios from 'axios';

window.addEventListener("DOMContentLoaded", function() {

    setTimeout(function () {
        const id = location.href.split("/")[4]

        axios.request({
            url: `/api/articles/${id}/view`,
            headers: {'X-Requested-With': 'XMLHttpRequest'},
            withCredentials: true,
          }).then((response) => {
            document.querySelector("#views").innerHTML = response.data;
        }).catch((error) => {
            //showCanvass("<div class='text-danger'>"+error.response.data.message +"</div>")
        }).then(() => {
            //removeSpinner()
        })

        }, 5000)
    
}, false);