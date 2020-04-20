var item=15;
Ext.define('MyApp.store.Personnel', {
    extend: 'Ext.data.Store',
    
    alias: 'store.personnel',
    

    // requires: [
    //     'Ext.data.proxy.Ajax',
    //     'Ext.data.reader.Json'
    // ],

    autoLoad:true,

    autoSync : true, // untuk memastikan, frontend sama backend sync selalu.. kasih tahhu yang lain dit

    fields: [
        'id','nama','birthplace','birthday', 'created_at', 'updated_at',
    ],

    pageSize:item,

    proxy: {
        type: 'rest',
        url: 'http://localhost/Belajar_Laravel/public/api/employess',
        reader: {
            type: 'json',
            rootProperty: 'data'
        }
    }
});
// store.load({
//     params:{
//         start:0,
//         limit:item
//     }
// });
