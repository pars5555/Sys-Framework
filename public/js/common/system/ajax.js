Sys.request = function (url, method, params, onDone, onError) {
    method = typeof method !== 'undefined' ? method : 'POST';
    params = typeof params !== 'undefined' ? params : {};
    onDone = typeof onDone !== 'undefined' ? onDone : function () {};
    onError = typeof onError !== 'undefined' ? onError : function () {};
    if (window.XMLHttpRequest) {
        var httpRequest = new XMLHttpRequest();
    } else {
        var httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
    }
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4) {
            if (httpRequest.status === 200) {
                onDone(httpRequest.responseText);
            } else if (httpRequest.status === 400) {
                onError(httpRequest.responseText);
            }
        }
    };
    var urlParams = this.serializeUrl(params);
    var sendingData = null;
    if (method.toUpperCase() === 'POST') {
        sendingData = urlParams;
    } else {
        if (urlParams) {
            url = url + "?" + urlParams;
        }
    }
    httpRequest.open(method.toUpperCase(), url, true);
    httpRequest.setRequestHeader("X-Requested-With", "XMLHttpRequest");
    httpRequest.setRequestHeader("Accept", "*");
    httpRequest.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    httpRequest.send(sendingData);
};
Sys.post = function (url, params, onDone, onError) {
    this.request(url, 'POST', params, onDone, onError);
};
Sys.get = function (url, params, onDone, onError) {
    this.request(url, 'GET', params, onDone, onError);
};
Sys.get = function (url, params, onDone, onError) {
    this.request(url, 'DELETE', params, onDone, onError);
};
Sys.get = function (url, params, onDone, onError) {
    this.request(url, 'PUT', params, onDone, onError);
};
Sys.requestModel = function (modelName, params, containerId, drawMode)
{
    var model = Sys.findModel(modelName);
    var onDone = typeof model.init !== 'undefined' ? model.init : function () {};
    var onError = typeof model.error !== 'undefined' ? model.error : function () {};
    var drawMode = typeof drawMode !== 'undefined' ? drawMode : Sys.drawModes.REPLACE;
    var url = '//' + Sys.host + '/_sys_/' + modelName.replace('.', '/');
    Sys.post(url, params, function (responseText) {
        var responseData;
        try {
            responseData = JSON.parse(responseText);
        } catch (e) {
            responseData = responseText;
        }
        var container = document.getElementById(containerId);
        if (typeof responseData === "object" && responseData !== null) {
            if ('html' in responseData && container !== null)
            {
                var html = responseData['html'];
                Sys._addHtmlInContainer(html, drawMode, container);
            }
        }
        onDone(responseData);
    }, function (res) {
        onError(res);
    });
};

Sys._addHtmlInContainer = function (html, drawMode, container) {
    switch (drawMode)
    {
        case Sys.drawModes.REPLACE:
            container.innerHTML = html;
            break;
        case Sys.drawModes.APPEND:
            container.insertAdjacentHTML('beforeend', html);
            break;
        case Sys.drawModes.PREPEND:
            container.insertAdjacentHTML('afterbegin', html);
            break;
        case Sys.drawModes.BEFORE:
            container.insertAdjacentHTML('beforebegin', html);
            break;
        case Sys.drawModes.AFTER:
            container.insertAdjacentHTML('afterend', html);
            break;
    }
}

Sys.serializeUrl = function (a) {
    var prefix, s, add, name, r20, output;
    s = [];
    r20 = /%20/g;
    add = function (key, value) {
        // If value is a function, invoke it and return its value
        value = (typeof value == 'function') ? value() : (value == null ? "" : value);
        s[s.length] = encodeURIComponent(key) + "=" + encodeURIComponent(value);
    };
    if (a instanceof Array) {
        for (name in a) {
            add(name, a[name]);
        }
    } else {
        for (prefix in a) {
            this.buildParams(prefix, a[prefix], add);
        }
    }
    output = s.join("&").replace(r20, "+");
    return output;
};