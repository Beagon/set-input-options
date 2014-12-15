SetInputOptions.grid.Groups = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        id: 'setinputoptions-grid-groups'
        ,url: SetInputOptions.config.connectorUrl
        ,baseParams: {
            action: 'mgr/group/getlist'
        }
        ,save_action: 'mgr/group/updatefromgrid'
        ,autosave: true
        ,fields: ['id','name']
        ,autoHeight: true
        ,paging: true
        ,remoteSort: true
        ,ddGroup: 'setinputoptionsItemDDGroup'
        ,columns: [{
            header: _('id')
            ,dataIndex: 'id'
            ,width: 20
        },{
            header: _('setinputoptions.group.name')
            ,dataIndex: 'name'
            ,width: 200
            ,editor: { xtype: 'textfield' }
        }]
        ,tbar: [{
            text: _('setinputoptions.group.create')
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
                                    action: 'mgr/group/reorder'
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
    SetInputOptions.grid.Groups.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.grid.Groups,MODx.grid.Grid,{
    windows: {}

    ,getMenu: function() {
        var m = [];
        m.push({
            text: _('setinputoptions.group.edit_options')
            ,handler: this.editOptions
        });
        m.push('-');
        m.push({
            text: _('setinputoptions.group.remove')
            ,handler: this.removeItem
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
        MODx.loadPage(window.location.search.replace("?a=", ""), 'id='+this.menu.record.id);
    }

    ,removeItem: function(btn,e) {
        if (!this.menu.record) return false;
        
        MODx.msg.confirm({
            title: _('setinputoptions.group.remove')
            ,text: _('setinputoptions.group.remove_confirm')
            ,url: this.config.url
            ,params: {
                action: 'mgr/group/remove'
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
});
Ext.reg('setinputoptions-grid-groups',SetInputOptions.grid.Groups);

SetInputOptions.window.Item = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        title: _('setinputoptions.group.create')
        ,closeAction: 'close'
        ,url: SetInputOptions.config.connectorUrl
        ,action: 'mgr/group/create'
        ,fields: [{
            xtype: 'textfield'
            ,name: 'id'
            ,hidden: true
        },{
            xtype: 'textfield'
            ,fieldLabel: _('name')
            ,name: 'name'
            ,anchor: '100%'
        }]
    });
    SetInputOptions.window.Item.superclass.constructor.call(this,config);
};
Ext.extend(SetInputOptions.window.Item,MODx.Window);
Ext.reg('setinputoptions-window-item',SetInputOptions.window.Item);

