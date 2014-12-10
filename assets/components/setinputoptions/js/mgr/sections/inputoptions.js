Ext.onReady(function() {
    MODx.load({ xtype: 'setinputoptions-page-inputoptions'});
});

SetInputOptions.page.Inputoptions = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'setinputoptions-panel-inputoptions'
            ,renderTo: 'setinputoptions-panel-inputoptions-div'
        }]
    });
    SetInputOptions.page.Inputoptions.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.page.Inputoptions,MODx.Component);
Ext.reg('setinputoptions-page-inputoptions',SetInputOptions.page.Inputoptions);