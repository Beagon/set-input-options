Ext.onReady(function() {
    MODx.load({ xtype: 'setinputoptions-page-groups'});
});

SetInputOptions.page.Groups = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        components: [{
            xtype: 'setinputoptions-panel-groups'
            ,renderTo: 'setinputoptions-panel-groups-div'
        }]
    });
    SetInputOptions.page.Groups.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.page.Groups,MODx.Component);
Ext.reg('setinputoptions-page-groups',SetInputOptions.page.Groups);