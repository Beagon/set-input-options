var SetInputOptions = function(config) {
    config = config || {};
SetInputOptions.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions,Ext.Component,{
    page:{},window:{},grid:{},tree:{},panel:{},combo:{},config: {}
});
Ext.reg('setinputoptions',SetInputOptions);
SetInputOptions = new SetInputOptions();