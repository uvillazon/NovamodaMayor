/**
 * Created by uvillazon on 30/07/2015.
 */
Ext.define('App.Store.Proformas.Proformas', {

    model: 'App.Model.Proformas.Proformas',
    //url: 'proformas/proformas',
    url : 'http://sistema.novamoda-bo.com/mayor/php/Almacen.php?funcion=ListarAlmacen',
    sortProperty: 'id_proforma',
    extend: 'App.Config.Abstract.StoreJsonP'
});