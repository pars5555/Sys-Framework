Sys = {
    models: [],
    host: window.location.hostname,
    drawModes: {REPLACE : 0,    APPEND : 1,    PREPEND : 2, BEFORE:3, AFTER:4},
    ready: function (modelArray)
    {
        for (var i = 0; i < modelArray.length; i++) {
            var modelInstance = this.findModel(modelArray[i].name);
            if (modelInstance !== null)
            {
                modelInstance.init(modelArray[i].params);
            }
        }
    },
    model: function (modelName, modelInstance) {
        Sys.models.push({name: modelName, instance: modelInstance});
    },
    findModel: function (modelName) {
        for (var i = 0; i < Sys.models.length; i++)
        {
            if (Sys.models[i].name === modelName)
            {
                return Sys.models[i].instance;
            }
        }
        return null;
    }
};


