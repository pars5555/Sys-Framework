Sys.model('Model1', {
    init: function () {
        console.log('model1');
        Sys.requestModel('Model2', {}, 'model2Container', null, function (data) {
            console.log('inline model2');
            console.log(data);
        });
    }
});
