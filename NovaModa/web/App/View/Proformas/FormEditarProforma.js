/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define("App.View.Proformas.FormEditarProforma", {
    extend: "App.Config.Abstract.Form",
    title: "Datos de Proforma",
    columns : 3,
    initComponent: function () {
        var me = this;
        me.cargarComponentes();
        me.cargarEventos();
        this.callParent(arguments);
    },
    cargarEventos : function(){
      var me = this;
        me.grid.getStore().on('load',function(str,sucess){
                console.dir(str);
        });
    },
    cargarComponentes: function () {
        var me = this;
        me.hid_id = Ext.widget('hiddenfield', {
            name: 'id_proforma',
        });

        me.txt_nombre = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Nombre Proformas",
            name: "nombre",
            width: 240,
            readOnly : true
            //mayus : false
        });
        me.txt_nroFactura = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Nro Factura",
            name: "nro_factura",
            readOnly : true
        });
        me.date_fecha = Ext.create("App.Config.Componente.DateFieldBase", {
            maximo: 'no',
            opcion: 'no',
            fieldLabel: "Fecha Llegada",
            name: "fecha_string",
            readOnly : true
        });
        me.txt_marca = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Marca",
            name: "marca",
            width: 240,
            readOnly : true
            //mayus : false
        });
        me.txt_almacen = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Almacen",
            name: "almacen",
            width: 240,
            readOnly : true,
            colspan : 2
            //mayus : false
        });



        me.grid = Ext.create("App.View.Proformas.GridModelos",{
            colspan : 3,
            itemId : 'grid_modelos'
        });
        me.num_total_cajas = Ext.create("App.Config.Componente.NumberFieldBase", {
            fieldLabel: "Total Cajas",
            name: "total_cajas",
            allowNegative: false,
            allowDecimals: false,
            readOnly : true
        });
        me.num_total_pares = Ext.create("App.Config.Componente.NumberFieldBase", {
            fieldLabel: "Total Pares",
            name: "total_pares",
            allowNegative: false,
            allowDecimals: false,
            readOnly : true
        });
        me.num_total = Ext.create("App.Config.Componente.NumberFieldBase", {
            fieldLabel: "Total",
            name: "total",
            allowNegative: false,
            allowDecimals: false,
            readOnly : true
        });
        var cmpButton  = Ext.create("Ext.Toolbar",{
            width: '100%',
            height : 50,
            colspan : 3,
            layout: {
                overflowHandler: 'Menu'
            },
            items :[
                {
                    text : 'Editar',
                    scale: 'medium',
                    itemId : 'btn_editarProformaCabecera',
                    iconCls : 'box'
                },
                {
                    text : 'Asignar Cliente Vendedor',
                    scale: 'medium',
                    itemId : 'btn_asignarCliente',
                    iconCls : 'box'
                },{
                    text : 'Registrar Codigo de Barra',
                    scale: 'medium',
                    itemId : 'btn_registrarCodigoBarra',
                    iconCls : 'box'
                }

            ]
        });

        me.items = [
            me.hid_id,
            me.txt_nombre, me.txt_nroFactura,me.date_fecha,me.txt_marca,
            me.txt_almacen,
            me.grid,
            me.num_total_cajas,me.num_total_pares,me.num_total,
            cmpButton
        ];
    },
    cargarDatos : function (id) {
        var me = this;
        me.loadFormulario("proformas", "proformas/"+id, null,null);
        me.grid.getStore().setExtraParams({id_proforma : id});
        me.grid.getStore().load();
    }
});
