function add_car(e) {
    n = $("#spinner").get(0);
    bootbox.dialog("¿Desea Agregar el Producto?", [{
        label: "Cancelar"
    }, {
        label: "Agregar",
        "class": "btn-success",
        callback: function() {
           t = (new Spinner(opts)).spin(n)
            $.ajax({
                type: "post",
                url: site + "home/add_car/",
                dataType: "json",
                data: {
                    product_id: e
                },
                success: function(e) {
                    bootbox.dialog("Producto Agregado", [{
                        label: "Cerrar"
                    }]);
                    t.stop();
                }
            })
        }
    }])
}

function empty_car() {
    var e = null;
    var t = 0;
    t = $("#spinner").get(0);
    bootbox.dialog("¿Desea limpiar el carrito?", [{
        label: "Cancelar"
    }, {
        label: "Limpiar",
        "class": "btn-danger",
        callback: function() {
            e = (new Spinner(opts)).spin(t);
            $.ajax({
                type: "post",
                url: site + "home/empty_car",
                dataType: "json",
                success: function() {
                    bootbox.dialog("Carrito Vacio", []);
                    location.reload()
                }
            })
        }
    }])
}

function delete_car(e) {
    bootbox.dialog("¿Confirma que desea Eliminar el Regístro?", [{
        label: "Cancelar"
    }, {
        label: "Eliminar",
        "class": "btn-danger",
        callback: function() {
            $.ajax({
                type: "post",
                url: site + "home/delete_car",
                dataType: "json",
                data: {
                    row_id: row_id
                },
                success: function(e) {
                    location.reload()
                }
            })
        }
    }])
}