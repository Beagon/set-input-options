SetInputOptions.panel.Groups = function(config) {
    config = config || {};
    Ext.apply(config,{
        border: false
        ,baseCls: 'modx-formpanel'
        ,cls: 'container'
        ,items: [{
            html: '<h2>'+_('setinputoptions')+'</h2>'
            ,border: false
            ,cls: 'modx-page-header'
        },{
            xtype: 'modx-tabs'
            ,defaults: { border: false ,autoHeight: true }
            ,border: true
            ,activeItem: 0
            ,hideMode: 'offsets'
            ,items: [{
                title: _('setinputoptions.group.groups')
                ,items: [{
                    html: '<p>'+_('setinputoptions.group.intro_msg')+'</p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'setinputoptions-grid-groups'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                }]
            }]
        }]
    });
    SetInputOptions.panel.Groups.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.panel.Groups,MODx.Panel);
Ext.reg('setinputoptions-panel-groups',SetInputOptions.panel.Groups);