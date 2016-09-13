Sys.model('Model1',{
    init:function(){        
       Sys.requestModel('ddd.Model2', {}, 'model2Container', Sys.drawModes.AFTER);
    }
});
