/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Almacenes', {

    model: 'App.Model.Proformas.Almacenes',
    url: 'almacenes/almacenes',
    //url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'codigo',
    extend: 'App.Config.Abstract.Store'
    //extend: 'App.Config.Abstract.StoreJsonP'
});