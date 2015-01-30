SetInputOptions.grid.Inputoptions = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'setinputoptions-grid-inputoptions'
        ,url: SetInputOptions.config.connectorUrl
        ,baseParams: {
            action: 'mgr/inputoption/getlist',
            id: addGroupId,
        }
        ,save_action: 'mgr/inputoption/updatefromgrid'
        ,autosave: true
        ,fields: ['id','name', 'alias', 'position']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,ddGroup: 'setinputoptionsItemDDInputoption'
        ,enableDragDrop: true
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 20
        },{
            header: _('setinputoptions.inputoption.name')
            ,dataIndex: 'name'
            ,width: 200
            ,editor: { xtype: 'textfield' }
        },{
            header: _('setinputoptions.inputoption.alias')
            ,dataIndex: 'alias'
            ,width: 200
            ,editor: { xtype: 'textfield' }
        },{
            header: _('setinputoptions.inputoption.position')
            ,dataIndex: 'position'
            ,width: 20
        }]
        ,tbar: [{
            text: _('setinputoptions.inputoption.create')
            ,handler: this.createItem
            ,scope: this
        },'->',{
            xtype: 'textfield'
            ,emptyText: _('setinputoptions.global.search') + '...'
            ,listeners: {
                'change': {fn:this.search,scope:this}
                ,'render': {fn: function(cmp) {
                    new Ext.KeyMap(cmp.getEl(), {
                        key: Ext.EventObject.ENTER
                        ,fn: function() {
                            this.fireEvent('change',this);
                            this.blur();
                            return true;
                        }
                        ,scope: cmp
                    });
                },scope:this}
            }
        }]
        ,listeners: {
            'render': function(g) {
                var ddrow = new Ext.ux.dd.GridReorderDropTarget(g, {
                    copy: false
                    ,listeners: {
                        'beforerowmove': function(objThis, oldIndex, newIndex, records) {
                        }

                        ,'afterrowmove': function(objThis, oldIndex, newIndex, records) {

                            MODx.Ajax.request({
                                url: SetInputOptions.config.connectorUrl
                                ,params: {
                                    action: 'mgr/inputoption/reorder'
                                    ,idItem: records.pop().id
                                    ,oldIndex: oldIndex
                                    ,newIndex: newIndex
                                }
                                ,listeners: {

                                }
                            });
                        }

                        ,'beforerowcopy': function(objThis, oldIndex, newIndex, records) {
                        }

                        ,'afterrowcopy': function(objThis, oldIndex, newIndex, records) {
                        }
                    }
                });

                Ext.dd.ScrollManager.register(g.getView().getEditorParent());
            }
            ,beforedestroy: function(g) {
                Ext.dd.ScrollManager.unregister(g.getView().getEditorParent());
            }

        }
    });
    SetInputOptions.grid.Inputoptions.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.grid.Inputoptions,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('setinputoptions.inputoption.remove')
            ,handler: this.removeItem
        }, {
            text: _('setinputoptions.inputoption.duplicate')
            ,handler: this.duplicateItem
        });
        this.addContextMenuItem(m);
    }
    
    ,createItem: function(btn,e) {

        var createItem = MODx.load({
            xtype: 'setinputoptions-window-item'
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        createItem.show(e.target);
    }

    ,editOptions: function(btn,e) {

        var createItem = MODx.load({
            xtype: 'setinputoptions-window-item'
            ,listeners: {
                'success': {fn:function() { this.refresh(); },scope:this}
            }
        });

        createItem.show(e.target);
    }

    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('setinputoptions.inputoption.remove')
            ,text: _('setinputoptions.inputoption.remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/inputoption/remove'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    },
    duplicateItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('setinputoptions.inputoption.duplicate')
            ,text: _('setinputoptions.inputoption.duplicate_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/inputoption/duplicate'
                ,id: this.menu.record.id
            }
            ,listeners: {
                'success': {fn:function(r) { this.refresh(); },scope:this}
            }
        });
    }

    ,search: function(tf,nv,ov) {
        var s = this.getStore();
        s.baseParams.query = tf.getValue();
        this.getBottomToolbar().changePage(1);
        this.refresh();
    }
    
    ,getDragDropText: function(){
        return this.selModel.selections.items[0].data.name;
    }
});
Ext.reg('setinputoptions-grid-inputoptions',SetInputOptions.grid.Inputoptions);

SetInputOptions.window.Item = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('setinputoptions.inputoption.create')
        ,closeAction: 'close'
        ,url: SetInputOptions.config.connectorUrl
        ,action: 'mgr/inputoption/create'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,name: 'group'
            ,value: addGroupId
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('name')
            ,name: 'name'
            ,anchor: '100%'
        },{
            xtype: 'textfield'
            ,fieldLabel: _('alias')
            ,name: 'alias'
            ,anchor: '100%'
        }]
    });
    SetInputOptions.window.Item.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.window.Item,MODx.Window);
Ext.reg('setinputoptions-window-item',SetInputOptions.window.Item);

