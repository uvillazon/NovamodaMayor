Ext.define("App.View.Proformas.Principal", {
    extend: "Ext.Viewport",
    requires: [
		"App.Config.Constantes",
        "App.Config.Funciones",
    ],
    title: 'Principal',
    layout: 'border',
    frame: false,
    defaults: {
        split: false
    },
    code: 'es',
    app : null,
    initComponent: function () {
        var me = this;

        //creamos un componente
        Constantes.CargarTamano();
        Constantes.CargarHost();
        Funciones.cargarValidaciones();
        me.bbar_pie = new Ext.Toolbar({
            iconCls: 'an-icon',
            statusAlign: 'right',
            items: [
                {
                    iconCls: 'calendar',
                    text: Ext.Date.format(new Date(), 'd/n/Y'),

                }, '-', {
                    id: 'clock',
                    //                iconCls         : 'time',
                    text: Ext.Date.format(new Date(), 'g:i:s A')
                },
                        {
                            xtype: 'label',
                            //width: 800,
                            padding: '0 100 0 0',
                            autoHeight: true,
                            html: Constantes.PIEPAGINA,
                            border: false

                        },

                         '->'
                        , me.progress

            ]

        });
        //me.panelProforma = Ext.create("App.View.Opciones.Principal");
        me.panel_centro = Ext.create("App.View.Proformas.Proformas",{
                region: 'center',
            }
        );
        //me.panel_cabecera = Ext.create("App.View.Principal.Cabecera", { tabPanel: me.panel_centro , app : me.app});
        me.panel_pie = new Ext.Panel({
            region: 'south',
            border: true,
            margins: '0 0 1 0',
            //height: 30,
            bbar: me.bbar_pie

        });

        me.items = [ me.panel_centro, me.panel_pie];
        me.InicializarRunner();

        this.callParent();
        //me.cargarController();
    },
    doLoad: function (url, successFn) {
        Ext.Ajax.request({
            url: url,
            disableCaching: false,
            success: successFn,
            failure: function () {
                Ext.Msg.alert('Failure', 'Failed to load locale file.');
                //renderUI();
            }
        });
    },
    InicializarRunner: function () {
        var me = this;
        me.runner = new Ext.util.TaskRunner();
        me.task = me.runner.newTask({
            run: Funciones.ActualizarReloj,
            interval: 1000
        });

        me.task.start();
    },
});














