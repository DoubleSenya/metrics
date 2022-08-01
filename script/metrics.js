const requestUrl = "http://metrics/api/metrics";

function sendRequest(url, body) {
    return new Promise( (resolve, reject) => {
        const xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.responseType = 'json';
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.send(JSON.stringify(body))
    });
}

/* событие на клик 


*/