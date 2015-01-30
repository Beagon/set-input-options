SetInputOptions.panel.Inputoptions = function(config) {
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
                title: _('setinputoptions.inputoption.inputoption')
                ,items: [{
                    html: '<p>'+_('setinputoptions.inputoption.intro_msg') + '<b>' + (pageTitle || "") +'</b></p>'
                    ,border: false
                    ,bodyCssClass: 'panel-desc'
                },{
                    xtype: 'setinputoptions-grid-inputoptions'
                    ,preventRender: true
                    ,cls: 'main-wrapper'
                },{
                    id: "modx-action-buttons",
                    buttons: [{
                        text: _('setinputoptions.inputoption.goBack'),
                        id: 'modx-abtn-goBack',
                        handler: function() {
                            MODx.loadPage(window.location.search.split("&")[0]);
                        }
                    }],
                }]
            }]
        }]
    });
    SetInputOptions.panel.Inputoptions.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.panel.Inputoptions,MODx.Panel);
Ext.reg('setinputoptions-panel-inputoptions',SetInputOptions.panel.Inputoptions);