/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.controller.Proformas.Proformas', {
    extend: "Ext.app.Controller",
    idProforma: 0,
    idalmacen: 0,
    refs: [{
        ref: 'gridModelo',
        selector: '#grid_modelos'
    },
        {
            ref: 'grid',
            selector: '#gridPrincipalProforma'
        },
        {
            ref: 'buscar',
            selector: '#txt_buscar'
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
                '#btn_eliminarProforma': {
                    click: me.eliminarProforma
                },

                '#btn_editarProformaCabecera': {
                    click: me.winCrearProformaCabecera
                },
                '#btn_asignarCliente': {
                    click: me.asignarClienteVendedor
                },
                '#btn_registrarCodigoBarra': {
                    click: me.registarCodigoBarra
                },
                '#txt_buscar_color':{
                    change : me.buscarColor
                },
                '#txt_buscar_material':{
                    change : me.buscarMaterial
                },
                '#txt_buscar_modelo':{
                    change : me.buscarModelos
                }
            }
        );

        this.callParent();
        //me.cargarEventos();
    },
    buscarColor : function(field){
        var val = field.getValue();
        var store = this.getGridModelo().getStore();
        if (val.length === 0) {
            store.clearFilter();
        } else {
            store.clearFilter();
            store.filter([
                Ext.create('Ext.util.Filter', {property:"COLOR", value: val, anyMatch: true ,root: 'data'})
            ]);
        }
    },
    buscarMaterial : function(field){
        var val = field.getValue();
        var store = this.getGridModelo().getStore();
        if (val.length === 0) {
            store.clearFilter();
        } else {
            store.clearFilter();
            store.filter([
                Ext.create('Ext.util.Filter', {property:"MATERIAL", value: val, anyMatch: true ,root: 'data'})
            ]);
        }
    },
    buscarModelos: function (field) {
        var val = field.getValue();
        var store = this.getGridModelo().getStore();
        if (val.length === 0) {
            store.clearFilter();
        } else {
            store.clearFilter();
            store.filter([
                Ext.create('Ext.util.Filter', {property:"MODELO", value: val, anyMatch: true ,root: 'data'})
            ]);
        }

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
        form.aplicarfiltrosAlmacen(me.idalmacen);
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
                        console.dir(str.data);
                        me.cargarVentanaGrid(str.id, str.data.id_marca);
                        me.idalmacen = str.data.id_almacen;
                        //console.dir(str.data);
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
    cargarVentanaGrid: function (id, marca) {
        var me = this;
        var codigo = Funciones.obtenerTipoGridNovamoda(marca);
        if (Funciones.isEmpty(codigo)) {
            Ext.Msg.alert("Aviso", "La Marca no tiene Configurado un Modelo de Grid Consule con Administrador de Sistema");
        }
        else {
            var win = Ext.create("App.Config.Abstract.Window", {
                botones: false,
                destruirWin: true,
                gridLoads: [me.getGrid()]
            });
            var form = Ext.create("App.View.Proformas.FormEditarProforma", {codigoGrid: codigo, botones: false});
            form.cargarDatos(id);
            me.idProforma = id;
            win.add(form);
            win.show();
        }
    },
    cargarVentanaGridBoton: function () {
        var me = this;
        var codigo = Funciones.obtenerTipoGridNovamoda(me.getGrid().record.get('id_marca'));
        if (Funciones.isEmpty(codigo)) {
            Ext.Msg.alert("Aviso", "La Marca no tiene Configurado un Modelo de Grid Consule con Administrador de Sistema");
        }
        else {
            var win = Ext.create("App.Config.Abstract.Window", {
                botones: false,
                destruirWin: true,
                gridLoads: [me.getGrid()]
            });
            var form = Ext.create("App.View.Proformas.FormEditarProforma", {codigoGrid: codigo, botones: false});
            form.cargarDatos(me.getGrid().record.get('id_proforma'));
            me.idalmacen = me.getGrid().record.get('id_almacen');
            me.idProforma = me.getGrid().record.get('id_proforma');
            win.add(form);
            win.show();
        }
    },
    eliminarProforma: function () {
        var me = this;
        Funciones.AjaxRequestGrid('proformas', 'eliminars', me.getGrid(), 'Esta Seguro de Eliminar', {id_proforma: me.getGrid().record.get('id_proforma')}, me.getGrid());
    }
    //quitarBotonPerfil : function(){
    //    var me = this;
    //    Funciones.AjaxRequestGrid('opciones', 'quitars/botons', me.cmpPrincipal, 'Esta Seguro de Eliminar', {id_perfil : me.record.get('id_perfil'),id_boton : me.boton.get('id_boton')}, me.getGridBotones());
    //},

})
;