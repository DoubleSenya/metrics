const requestUrl = "http://metrics/api/metrics";


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

    let height = Math.max(
        document.body.scrollHeight, document.documentElement.scrollHeight,
        document.body.offsetHeight, document.documentElement.offsetHeight,
        document.body.clientHeight, document.documentElement.clientHeight
    );

    let width = document.documentElement.clientWidth;

    var data = {
        url: url,
        x: event.pageX,
        y: event.pageY,
        window_width: width,
        window_height: height
    };

    sendRequest(requestUrl, data);
}