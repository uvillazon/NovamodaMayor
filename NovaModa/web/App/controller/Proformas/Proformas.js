/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.controller.Proformas.Proformas', {
    extend: "Ext.app.Controller",
    idProforma: 0,
    refs: [{
        ref: 'gridModelo',
        selector: '#grid_modelos'
    },
        {
            ref: 'grid',
            selector: '#gridPrincipalProforma'
        }
    ],
    init: function () {
        var me = this;
        me.control({
            '#btn_crearProforma': {
                click: me.winCrearProforma
            }
            ,
            '#btn_editarProforma': {
                click: me.cargarVentanaGridBoton
            },
            '#btn_eliminarProforma' :{
                click : me.winCrearProformaCabecera
            },

            '#btn_editarProformaCabecera': {
                click: me.winCrearProformaCabecera
            },
            '#btn_asignarCliente': {
                click: me.asignarClienteVendedor
            },
            '#btn_registrarCodigoBarra': {
                click: me.registarCodigoBarra
            }

        });

        this.callParent();
        //me.cargarEventos();
    },
    registarCodigoBarra: function () {
        var me = this;
        var me = this;
        var modified = me.getGridModelo().getSelectionModel().getSelection();
        var count = 0;
        if (!Ext.isEmpty(modified)) {
            if (fn.countObject(modified) == 1) {
                me.winRegistrarCodigoBarra(modified);
            }
            else {
                Ext.Msg.alert("Aviso", "Selecciono mas de un registro")
            }
        }
        else {
            Ext.Msg.alert("Aviso", "Seleccione solo un Registro");
        }

    },
    winRegistrarCodigoBarra: function (record) {
        var me = this;
        //console.dir(record);
        if (record[0].get('ESTADO') === '0') {
            var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
            var grid = Ext.create("App.View.Proformas.GridRegistroCodigoBarra", {botones: false});
            grid.getStore().setExtraParams({fila: record[0].get('fila'), id_proforma: me.idProforma});
            grid.getStore().load();
            win.add(grid);
            win.btn_guardar.on('click', function () {
                var recordsToSend = [];
                grid.getStore().each(function (record) {
                    recordsToSend.push(Ext.apply(record.data));
                });
                recordsToSend = Ext.JSON.encode(recordsToSend);
                Funciones.AjaxRequestGrid("proformas", "codigos", win, null, {
                    fila: record[0].get('fila'),
                    id_proforma: me.idProforma,
                    detalles: recordsToSend
                }, me.getGridModelo(), win, true);
            });
            win.show();
        }
        else {
            Ext.Msg.alert("Aviso", "ya fue registrado los codigos de barra. Seleccione otro");
        }


    },
    asignarClienteVendedor: function () {
        var me = this;
        var modified = me.getGridModelo().getSelectionModel().getSelection();
        var count = 0;
        if (!Ext.isEmpty(modified)) {
            me.winAsignarClienteVendedor(modified);

        }
        else {
            Ext.Msg.alert("Aviso", "Seleccione por lo menos un Registro");
        }
    },
    winAsignarClienteVendedor: function (records) {
        var me = this;

        var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormAsignarCliente", {botones: false});
        win.add(form);
        win.show();
        win.btn_guardar.on('click', function () {
            Funciones.AjaxRequestWin("proformas", "asignars", win, form, me.getGridModelo(), null, {
                detalles: Funciones.convertirJsonRecord(records),
                id_proforma: me.idProforma
            }, win);
        });
    }
    ,
    winCrearProformaCabecera: function () {
        var me = this;

        var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormProforma", {botones: false});
        win.add(form);
        win.show();
    }
    ,
    winCrearProforma: function () {
        var me = this;

        var win = Ext.create("App.Config.Abstract.Window", {botones: true, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormProforma", {botones: false});
        win.add(form);
        win.show();

        win.btn_guardar.on('click', function () {
            Funciones.AjaxRequestWinFn('proformas', 'proformas', win, form, null, null, null, win, function (str) {
                console.log(str.success);
                if (str.success) {
                    Ext.MessageBox.alert('Exito', str.msg, function () {
                        me.cargarVentanaGrid(str.id);
                    });
                }
                else {
                    Ext.MessageBox.alert('Error', str.msg);
                }

            });
        });
        //Funciones.AjaxRequestCargarStore( "Marca.php?funcion=BuscarMarca", win, form.cbx_marca, "marcaM", null);
        //alert("sasda");
        //App.View.Proformas.FormProformas
    }
    ,
    cargarVentanaGrid: function (id) {
        var me = this;
        var win = Ext.create("App.Config.Abstract.Window", {botones: false, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormEditarProforma", {botones: false});
        form.cargarDatos(id);
        me.idProforma = id;
        win.add(form);
        win.show();
    },
    cargarVentanaGridBoton: function () {
        var me = this;
        var win = Ext.create("App.Config.Abstract.Window", {botones: false, destruirWin: true});
        var form = Ext.create("App.View.Proformas.FormEditarProforma", {botones: false});
        form.cargarDatos(me.getGrid().record.get('id_proforma'));
        me.idProforma = me.getGrid().record.get('id_proforma');
        win.add(form);
        win.show();
    },

//cargarEventos: function () {
//    var me = this;
//    me.cmpPrincipal.grid.getSelectionModel().on('selectionchange', me.cargarDatosGrid, this);
//
//
//},
//cargarDatosGrid: function (selModel, selections) {
//    var me = this;
//    console.dir(selections);
//    disabled = selections.length === 0;
//    me.record = !disabled ? selections[0] : null;
//    //Funciones.DisabledButton('btn_editarApp', me.cmpPrincipal, disabled);
//    if (!disabled) {
//        me.cmpPrincipal.form.CargarDatos(me.record);
//        me.getGridUser().getStore().setExtraParams({id_aplic: me.record.get("id_aplic")});
//        me.getGridUser().getStore().load();
//    }
//    else {
//        me.cmpPrincipal.form.getForm().reset();
//        me.getGridUser().getStore().setExtraParams({id_aplic: 0});
//        me.getGridUser().getStore().load();
//    }
//},
//winCrearApp: function (btn) {
//    var me = this;
//    var win = Ext.create("App.Config.Abstract.Window", { botones: true, destruirWin: true });
//    var form = Ext.create("App.View.Aplicaciones.FormAplicacion",{botones : false});
//    win.add(form);
//    win.show();
//    if(btn.getItemId() === "btn_editarApp"){
//        form.getForm().loadRecord(me.record);
//    }
//    win.btn_guardar.on('click', function () {
//        Funciones.AjaxRequestWin('aplicaciones', 'aplicaciones', win, form, me.cmpPrincipal.grid, 'Esta Seguro de guardar?', null, win);
//    });
//}
})
;