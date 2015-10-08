/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Almacenes', {

    model: 'App.Model.Proformas.Almacenes',
    //url: 'proformas/proformas',
    url : 'Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'codigo',
    extend: 'App.Config.Abstract.StoreJsonP'
});