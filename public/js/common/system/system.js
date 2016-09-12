Sys = {'models': []};
Sys.ready = function ()
{    
};

Sys.model = function (modelName, modelInstance) {
    Sys.models.push({name: modelName, instance: modelInstance});
};
