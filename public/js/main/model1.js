Sys.model('Model1', {
    init: function () {
        Sys.requestModel('Model2', {}, 'model2Container', Sys.drawModes.REPLACE, function (data) {
        });
    }
});
