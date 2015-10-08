/**
 * Created by uvillazon on 04/09/2015.
 */
Ext.define("App.View.Proformas.FormProforma", {
    extend: "App.Config.Abstract.Form",
    title: "Datos de Proforma",
    cargarStores: true,
    //Observar el ultimo comentario de la transicion de ESTADO
    verObservacion: true,
    initComponent: function () {
        var me = this;
        me.cargarComponentes();
        this.callParent(arguments);
    },
    cargarComponentes: function () {
        var me = this;
        me.hid_id = Ext.widget('hiddenfield', {
            name: 'id_proforma',
        });

        me.txt_nombre = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Nombre Proformas",
            name: "nombre",
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            colspan: 2,
            width: 480,
            //mayus : false
        });
        me.txt_nroFactura = Ext.create("App.Config.Componente.TextFieldBase", {
            fieldLabel: "Nro Factura",
            name: "nro_factura",
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            mayus : false
        });
        me.date_fecha = Ext.create("App.Config.Componente.DateFieldBase", {
            maximo: 'no',
            opcion: 'no',
            fieldLabel: "Fecha Llegada",
            name: "fecha",
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
        });
        me.store_marca = Ext.create("App.Store.Proformas.Marcas");
        me.cbx_marca = Ext.create("App.Config.Componente.ComboBase", {
            fieldLabel: 'Marca',
            displayField: 'nombre',
            valueField: 'nombre',
            name: 'marca',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_marca
        });
        //App.Store.Proformas.Almacenes
        me.store_almacen = Ext.create("App.Store.Proformas.Almacenes");
        me.cbx_almacen = Ext.create("App.Config.Componente.ComboBase", {
            fieldLabel: 'Almacen',
            displayField: 'nombre',
            valueField: 'nombre',
            name: 'almacen',
            colspan: 2,
            width: 480,
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            store: me.store_almacen.load()
        });

        me.file = Ext.create("Ext.form.field.File",{
            name: 'archivo',
            fieldLabel: 'Archivo(CSV)',
            labelWidth: 110,
            colspan: 2,
            width: 480,
            msgTarget: 'side',
            afterLabelTextTpl: Constantes.REQUERIDO,
            allowBlank: false,
            anchor: '100%',
            buttonText: 'Seleccionar Archivo...'
        });

        me.items = [
            me.hid_id,
            me.txt_nombre,
            me.txt_nroFactura,me.date_fecha,
            me.cbx_marca,
            me.cbx_almacen,
            me.file

        ];
    }
});
