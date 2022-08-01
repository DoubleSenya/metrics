require('./bootstrap');

const requestUrl = "/api/metrics";


function sendRequest(url, data) {
    return new Promise( (resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onload = () => {
            console.log(xhr.status);
        }

        xhr.onerror = () => {
            console.log(xhr.response);
        }

        xhr.send(JSON.stringify(data));
    });
}

document.body.onclick = (event) => {

    var url = window.location.toString();
    var data = {
        url: url,
        x: event.pageX,
        y: event.pageY
    };
    sendRequest(requestUrl, data);
    console.log(event.pageX + ':' + event.pageY);
    console.log(url);
}